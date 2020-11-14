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

include_once(SP_LIBPATH."/dataforseo/RestClient.php");

/**
 * Class defines all details about managing DataForSEO API
 */
class DataForSEOController extends Controller {
    
    var $restClient;
//     var $apiUrl = 'https://api.dataforseo.com/';
    var $apiUrl = 'https://sandbox.dataforseo.com/';
    
    function __construct() {
        parent::__construct();
        $this->restClient = new RestClient($this->apiUrl, null, SP_DFS_API_LOGIN, SP_DFS_API_PASSWORD);
    }
    
    function __checkAPIConnection($apiLogin, $apiPassword) {
        
        $connResult = [
            'status' => false, 
            'message' => $_SESSION['text']['common']['Internal error occured'], 
            'balance' => 0,
        ];
        
        if (!empty($apiLogin) && !empty($apiPassword)) {
            $this->restClient = new RestClient($this->apiUrl, null, $apiLogin, $apiPassword);
            $connResult = $this->getUserAccountDetails();
            
            if ($connResult['status']) {
                $result = $connResult['data'];
                if ($result['status_code'] == 20000) {
                    foreach ($result['tasks'] as $taskInfo) {
                        if ($taskInfo['status_code'] == 20000 && $taskInfo['data']['function'] == 'user_data') {
                            $balance = isset($taskInfo['result'][0]['money']['balance']) ? $taskInfo['result'][0]['money']['balance'] : 0;
                            $connResult['balance'] = $balance;
                            $this->updateAPIBalance($balance);
                            break;
                        }
                    }
                } else {
                    $connResult['status'] = false;
                    $connResult['message'] = $result['status_message'];
                }
            }            
        }
        
        return $connResult;        
    }
    
    function getUserAccountDetails() {
        $res = ['status' => false, 'message' => $_SESSION['text']['common']['Internal error occured']];
        
        try {
            $result = $this->restClient->get('/v3/appendix/user_data');
            $res['status'] = true;
            $res['data'] = $result;
        } catch (RestClientException $e) {
            $msg = "HTTP code: {$e->getHttpCode()}\n";
            $msg .= "Error code: {$e->getCode()}\n";
            $msg .= "Message: {$e->getMessage()}\n";
            $res['message'] = $msg;
        }
            
        return $res;
    }
    
    function updateAPIBalance($balance) {
        $res = $this->dbHelper->updateRow('settings', ['set_val' => $balance], "set_name='SP_DFS_BALANCE'");
        return $res;
    }
    
    function __getSERPResults($keywordInfo, $showAll = false, $seId = false, $cron = false) {
        
        $crawlResult = array();
        $seFound = false;
        $websiteUrl = formatUrl($keywordInfo['url'], false);
        if(empty($websiteUrl)) return $crawlResult;
        if(empty($keywordInfo['name'])) return $crawlResult;
        
        $time = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $seController = New SearchEngineController();
        $seList = $seController->__getAllCrawlFormatedSearchEngines();
        $websiteOtherUrl = SettingsController::getWebsiteOtherUrl($websiteUrl);
        
        $keySeList = explode(':', $keywordInfo['searchengines']);
        foreach($keySeList as $seInfoId) {
            
            // function to execute only passed search engine
            if(!empty($seId) && ($seInfoId != $seId)) continue;
            
            // if search engine not found continue
            if (empty($seList[$seInfoId])) continue;
            
            $seFound = true;
            $crawlLogCtrl = new CrawlLogController();
            $crawlInfo = [];
            $crawlInfo['crawl_type'] = 'keyword';
            $crawlInfo['ref_id'] = empty($keywordInfo['id']) ? $keywordInfo['name'] : $keywordInfo['id'];
            $crawlInfo['subject'] = $seInfoId;
            
            $crawlStatus = 0;
            if(empty($result['error'])){
                
                // to update cron that report executed for akeyword on a search engine
                if ($cron) {
                    $this->saveCronTrackInfo($keywordInfo['id'], $seInfoId, $time);
                }
                
                // verify the urls existing in the result
                preg_match_all($seList[$seInfoId]['regex'], $pageContent, $matches);
                if (!empty($matches[$seList[$seInfoId]['url_index']])) {
                    
                    $urlList = $matches[$seList[$seInfoId]['url_index']];
                    $crawlResult[$seInfoId]['matched'] = array();
                    $rank = 1;
                    foreach($urlList as $i => $url){
                                                
                        if($showAll || (
                            stristr($url, "http://" . $websiteUrl) || stristr($url, "https://" . $websiteUrl) ||
                            stristr($url, "http://" . $websiteOtherUrl) || stristr($url, "https://" . $websiteOtherUrl)
                            )) {
                                
                            if ($showAll && (
                                stristr($url, "http://" . $websiteUrl) || stristr($url, "https://" . $websiteUrl) ||
                                stristr($url, "http://" . $websiteOtherUrl) || stristr($url, "https://" . $websiteOtherUrl)
                                )) {
                                    $matchInfo['found'] = 1;
                            } else {
                                    $matchInfo['found'] = 0;
                            }
                                    
                            $matchInfo['url'] = $url;
                            $matchInfo['title'] = strip_tags($matches[$seList[$seInfoId]['title_index']][$i]);
                            $matchInfo['description'] = strip_tags($matches[$seList[$seInfoId]['description_index']][$i]);
                            $matchInfo['rank'] = $rank;
                            $crawlResult[$seInfoId]['matched'][] = $matchInfo;
                        }
                        
                        $rank++;
                    }
                    
                    $crawlStatus = 1;                    
                } else {
                    
                    // set crawl log info
                    $crawlInfo['crawl_status'] = 0;
                    $crawlInfo['log_message'] = SearchEngineController::isCaptchInSearchResults($pageContent) ? "<font class=error>Captcha found</font> in search result page" : "Regex not matched error occured while parsing search results!";
                    
                    if(SP_DEBUG){
                        echo "<p class='note' style='text-align:left;'>Error occured while parsing $seUrl ".formatErrorMsg("Regex not matched <br>\n")."</p>";
                    }
                }
            } else {
                if (SP_DEBUG) {
                    echo "<p class='note' style='text-align:left;'>Error occured while crawling $seUrl ".formatErrorMsg($result['errmsg']."<br>\n")."</p>";
                }
            }
            
            $crawlResult[$seInfoId]['seFound'] = $seFound;
            $crawlResult[$seInfoId]['status'] = $crawlStatus;
            
            // update crawl log
            $logId = $result['log_id'];
            $crawlLogCtrl->updateCrawlLog($logId, $crawlInfo);
            
        }
        
        return  $crawlResult;        
    }
    
}
?>