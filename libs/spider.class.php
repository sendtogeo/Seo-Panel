<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	           *
 *   sendtogeo@gmail.com   												   *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/

include_once(SP_CTRLPATH."/proxy.ctrl.php");

class Spider{

	# settings of the spider
	var $_CURL_RESOURCE = null;	
	var $_CURLOPT_FAILONERROR = false;	
	var $_CURLOPT_FOLLOWLOCATION = true;	
	var $_CURLOPT_RETURNTRANSFER = true;	
	var $_CURLOPT_TIMEOUT = 15;	
	var $_CURLOPT_POST = true;
	var $_CURLOPT_POSTFIELDS = null;
	var $_CURLOPT_USERAGENT = "Mozilla/5.0 (Windows; U; MSIE 9.0; WIndows NT 9.0; en-US))";
	var $_CURLOPT_USERPWD = null;
	var $_CURLOPT_COOKIEJAR = '';
	var $_CURLOPT_COOKIEFILE = '';
	var $_CURLOPT_REFERER = "";
	var $_CURL_sleep = 1;
	var $_CURLOPT_COOKIE = "";
	var $_CURLOPT_HEADER = 0;

	# spider constructor
	function Spider()	{			
		$this -> _CURLOPT_COOKIEJAR = SP_TMPPATH.'/'.$this -> _CURLOPT_COOKIEJAR;
		$this -> _CURLOPT_COOKIEFILE = SP_TMPPATH.'/'.$this -> _CURLOPT_COOKIEFILE;		
		$this -> _CURL_RESOURCE = curl_init( );
		if(!empty($_SERVER['HTTP_USER_AGENT'])) $this->_CURLOPT_USERAGENT = $_SERVER['HTTP_USER_AGENT'];  				
	}	
	
	# func to format urls
	public static function formatUrl($url){	    
	    $scheme = "";
		if(stristr($url,'http://')){
			$scheme = "http://";
		}elseif(stristr($url,'https://')){
			$scheme = "https://";			
		}
		$url = str_replace(array('http://','https://', '"', '"'), '',$url);
		$url = preg_replace('/\/{2,}/', '/', $url);
		$url = preg_replace('/&{2,}/', '&', $url);
		$url = preg_replace('/#{2,}/', '#', $url);
		$url = Spider::removeTrailingSlash($url);
		return $scheme.$url;
	}
	
    # func to get backlink page info
	function getPageInfo($url, $domainUrl, $returnUrls=false){
	    
		$ret = $this->getContent($url);
		$pageInfo = array();
		$checkUrl = formatUrl($domainUrl);
		
		if( !empty($ret['page'])){
			$string = str_replace(array("\n",'\n\r','\r\n','\r'), "", strtolower($ret['page']));			
			$pageInfo = WebsiteController::crawlMetaData($url, '', $string, true);
					
			$pattern = "/<a(.*?)>(.*?)<\/a>/is";	
			preg_match_all($pattern, $string, $matches, PREG_PATTERN_ORDER);
			for($i=0;$i<count($matches[1]);$i++){
				$href = $this->__getTagParam("href",$matches[1][$i]);
				if ( !empty($href) || !empty($matches[2][$i])) {
    				if( !preg_match( '/mailto:/', $href ) && !preg_match( '/javascript:|;/', $href ) ){
    				    
    				    $pageInfo['total_links'] += 1;
    				    $external = 0;
    				    if (stristr($href, 'http://') ||  stristr($href, 'https://')) {
    					    if (!preg_match("/^".preg_quote($checkUrl, '/')."/", formatUrl($href))) {
    					        $external = 1;
    					        $pageInfo['external'] += 1;
    					    }					        
    				    } else {
    				        $href = $domainUrl."/".$href;
    				    }
    				    
    				    // if details of urls to be checked
    				    if($returnUrls){
    				        $linkInfo['link_url'] = $href;
    						if(stristr($matches[2][$i], '<img')) {
    							$linkInfo['link_anchor'] = $this->__getTagParam("alt", $matches[2][$i]);
    						} else {
    							$linkInfo['link_anchor'] = strip_tags($matches[2][$i]);
    						}										
    						$linkInfo['nofollow'] = stristr($matches[1][$i], 'nofollow') ? 1 : 0;
    						$linkInfo['link_title'] = $this->__getTagParam("title", $matches[1][$i]);
    						if ($external) {
    						    $pageInfo['external_links'][] = $linkInfo;
    						} else {
    						    $pageInfo['site_links'][] = $linkInfo;
    						}
    				    }
    				}
				}
			}			
		}
		return $pageInfo;
	}
	
	# function to remove last trailing slash
	public static function removeTrailingSlash($url) {		
		$url = preg_replace('/\/$/', '', $url);
		return $url;
	}
	
    # function to remove last trailing slash
	public static function addTrailingSlash($url) {		
		if (!preg_match('/\/$/', $url)) {
		    $url .= "/";
		}
		return $url;
	}
	
	# func to get unique urls of a page
	function getUniqueUrls($url){
				
		$ret = $this->getContent($url);
		$urlList = array();
		
		if( !empty($ret['page'])){
			$string = strtolower($ret['page']);
			$string = str_replace("\n","",$string);
					
			$pattern = "/<a (.*)>(.*\n*.*|.*\n*)<\/a>/U";	
			preg_match_all($pattern,$string,$matches, PREG_PATTERN_ORDER);
			for($i=0;$i<count($matches[1]);$i++){
				$href = $this->getTagParam("href",$matches[1][$i]);
				$href = preg_replace('/\/{3}/', '/', $href);
				if(!empty($href)){
					if( !preg_match( '/mailto:/', $href ) && ($href!="#") && !preg_match( '/javascript:|;/', $href ) ){
						if($href != "/"){
							$urlList[] = $href;							
						}
					}
				}
			}			
		}
		return $urlList;
	}

	# function to get value of a parameter in a tag
    function __getTagParam($param, $tag){
		preg_match('/'.$param.'="(.*?)"/is', $tag, $matches);
		if(empty($matches[1])){
			preg_match("/$param='(.*?)'/is", $tag, $matches);
			if(empty($matches[1])){
				preg_match("/$param=(.*?) /is", $tag, $matches);
			}		
		}				
		if(isset($matches[1])) return trim($matches[1]) ;
	}
	
	# get contents of a web page	
	function getContent( $url, $enableProxy=true)	{
		
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_URL , $url );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_FAILONERROR , $this -> _CURLOPT_FAILONERROR );
		@curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_FOLLOWLOCATION , $this -> _CURLOPT_FOLLOWLOCATION );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_RETURNTRANSFER , $this -> _CURLOPT_RETURNTRANSFER );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_TIMEOUT , $this -> _CURLOPT_TIMEOUT );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_COOKIEJAR , $this -> _CURLOPT_COOKIEJAR );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_COOKIEFILE , $this -> _CURLOPT_COOKIEFILE );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_HEADER , $this -> _CURLOPT_HEADER);
		if(!empty($this -> _CURLOPT_COOKIE)) curl_setopt( $this -> _CURL_RESOURCE, CURLOPT_COOKIE , $this -> _CURLOPT_COOKIE );
		if(!empty($this-> _CURLOPT_REFERER)){
			curl_setopt($this -> _CURL_RESOURCE, CURLOPT_REFERER, $this-> _CURLOPT_REFERER); 
		}		
		
		if( strlen( $this -> _CURLOPT_POSTFIELDS ) > 1 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_POST , $this -> _CURLOPT_POST );
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_POSTFIELDS , $this -> _CURLOPT_POSTFIELDS );
		}

		$this->_CURLOPT_USERAGENT = defined('SP_USER_AGENT') ? SP_USER_AGENT : $this->_CURLOPT_USERAGENT;
		if( strlen( $this -> _CURLOPT_USERAGENT ) > 0 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_USERAGENT, $this -> _CURLOPT_USERAGENT );
		}

		if( strlen( $this -> _CURLOPT_USERPWD ) > 2 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_USERPWD, $this -> _CURLOPT_USERPWD );
		}
		
		// to use proxy if proxy enabled
		if (SP_ENABLE_PROXY && $enableProxy) {
			$proxyCtrler = New ProxyController();
			if ($proxyInfo = $proxyCtrler->getRandomProxy()) {
				curl_setopt($this -> _CURL_RESOURCE, CURLOPT_PROXY, $proxyInfo['proxy'].":".$proxyInfo['port']);
				curl_setopt($this -> _CURL_RESOURCE, CURLOPT_HTTPPROXYTUNNEL, 1);		
				if (!empty($proxyInfo['proxy_auth'])) {
					curl_setopt ($this -> _CURL_RESOURCE, CURLOPT_PROXYUSERPWD, $proxyInfo['proxy_username'].":".$proxyInfo['proxy_password']);
				}
			} else {
			    showErrorMsg("No active proxies found!! Please check your proxy settings from Admin Panel.");
			}
		}
			
		$ret['page'] = curl_exec( $this -> _CURL_RESOURCE );
		$ret['error'] = curl_errno( $this -> _CURL_RESOURCE );
		$ret['errmsg'] = curl_error( $this -> _CURL_RESOURCE );

		return $ret;
	}
	
	# func to get session id
	function getSessionId($page){
		if (preg_match('/PHPSESSID=(.*?);/', $page, $result)) {
			return $result[1];
		} else {
			return false;
		}
	}
	
	# func to check proxy 
	function checkProxy($proxyInfo) {
		
		$this->_CURLOPT_USERAGENT = defined('SP_USER_AGENT') ? SP_USER_AGENT : $this->_CURLOPT_USERAGENT;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXY, $proxyInfo['proxy'].":".$proxyInfo['port']);
		
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
		curl_setopt($ch, CURLOPT_HEADER, $this->_CURLOPT_HEADER);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->_CURLOPT_USERAGENT);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);		
		
		if (!empty($proxyInfo['proxy_auth'])) {
			curl_setopt ($ch, CURLOPT_PROXYUSERPWD, $proxyInfo['proxy_username'].":".$proxyInfo['proxy_password']);
		}
				
		curl_setopt($ch, CURLOPT_URL, "http://www.google.com/search?q=twitter");
		$ret['page'] = curl_exec( $ch );
		$ret['error'] = curl_errno( $ch );
		$ret['errmsg'] = curl_error( $ch );
		curl_close($ch);
		return $ret;
	}
	
	// function to get the header of url
    public static function getHeader($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, SP_USER_AGENT);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
		
		// Only calling the head
		curl_setopt($ch, CURLOPT_HEADER, true); // header will be at output
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD'); // HTTP request is 'HEAD'
		
		$content = curl_exec ($ch);
		curl_close ($ch);
		return $content;
	}
	
	// function to check whether link is brocke
	public static function isLInkBrocken($url) {
	    $header = Spider::getHeader($url);
	    if (stristr($header, '404 Not Found')) {
	        return true;
	    } else {
	        return false; 
	    }
	}
}
?>
