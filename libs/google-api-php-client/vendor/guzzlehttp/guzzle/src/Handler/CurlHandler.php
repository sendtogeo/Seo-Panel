<?php
namespace GuzzleHttp\Handler;

use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * HTTP handler that uses cURL easy handles as a transport layer.
 *
 * When using the CurlHandler, custom curl options can be specified as an
 * associative array of curl option constants mapping to values in the
 * **curl** key of the "client" key of the request.
 */
class CurlHandler
{
    /** @var CurlFactoryInterface */
    private $factory;

    /**
     * Accepts an associative array of options:
     *
     * - factory: Optional curl factory used to create cURL handles.
     *
     * @param array $options Array of options to use with the handler
     */
    public function __construct(array $options = [])
    {
        $this->factory = isset($options['handle_factory'])
            ? $options['handle_factory']
            : new CurlFactory(3);
    }

    public function __invoke(RequestInterface $request, array $options)
    {
        if (isset($options['delay'])) {
            usleep($options['delay'] * 1000);
        }

        $easy = $this->factory->create($request, $options);
        
        /////////////////////////////////// StartCustom code by seo panel////////////////////////
        // add proxy details to handle. Custom code added by seo panel team
        list($easy->handle, $proxyId) = \ProxyController::addProxyToCurlHandle($easy->handle, SP_ENABLE_PROXY_GOOGLE_API);
        
        // Custom code added by seo panel team
        $ret['page'] = curl_exec( $easy->handle );
        $ret['error'] = curl_errno( $easy->handle );
        $ret['errmsg'] = curl_error( $easy->handle );
        $easy->errno = $ret['error'];
        
        // update crawl log in database for future reference
        $effectiveUrl = curl_getinfo($easy->handle, CURLINFO_EFFECTIVE_URL);
        $effectiveUrl = preg_replace('/&key=(.*)/', '&key=XXX', $effectiveUrl);
        $crawlLogCtrl = new \CrawlLogController();
        $crawlInfo['crawl_status'] = $ret['error'] ? 0 : 1;
        $crawlInfo['crawl_link'] = $effectiveUrl;
        $crawlInfo['ref_id'] = $crawlInfo['crawl_link'];
        $crawlInfo['crawl_referer'] = $crawlInfo['crawl_link'];
        $crawlInfo['proxy_id'] = intval($proxyInfo['id']);
        $crawlInfo['log_message'] = addslashes($ret['errmsg']);
        $ret['log_id'] = $crawlLogCtrl->createCrawlLog($crawlInfo);
        
        // save proxy status according to the results
        \ProxyController::processProxyStatus($ret, $proxyId);
        
        //curl_exec($easy->handle);
        //$easy->errno = curl_errno($easy->handle);
        ///////////////////////////////////End Custom code by seo panel////////////////////////       
        

        return CurlFactory::finish($this, $easy, $this->factory);
    }
}
