<?php
use PHPUnit\Framework\TestCase;
if (!defined('SP_CTRLPATH')) {
    define('SP_CTRLPATH', __DIR__ . '/stubs');
}
if (!defined('SP_TMPPATH')) {
    define('SP_TMPPATH', sys_get_temp_dir());
}
if (!defined('SP_RELATIVE_LINK_CRAWL')) {
    define('SP_RELATIVE_LINK_CRAWL', false);
}
if (!defined('SP_ENABLE_PROXY')) {
    define('SP_ENABLE_PROXY', false);
}
require_once __DIR__ . '/../libs/spider.class.php';

class SpiderTest extends TestCase {
    public function testFormatUrlRemovesExtraSlashes() {
        $url = 'http://example.com//foo//bar/';
        $this->assertSame('http://example.com/foo/bar', Spider::formatUrl($url));
    }
}
