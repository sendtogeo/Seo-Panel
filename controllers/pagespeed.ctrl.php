<?php
/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	   *
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

# class defines all moz api controller functions
class PageSpeedController extends Controller{
	
	// function to get moz rank
	function __getPageSpeedInfo ($url, $params = array(), $apiKey = '', $returnLog = false) {
		
		include_once(SP_LIBPATH . "/google-api-php-client/vendor/autoload.php");
		$pageSpeedInfo = array();
		$crawlInfo = array();
		
		$apiKey = !empty($apiKey) ? $apiKey : SP_GOOGLE_API_KEY;
		
		// if empty no need to crawl
		if (!empty($apiKey)) {
		
			$client = new Google_Client();
			$client->setApplicationName("SP_CHECKER");		
			$client->setDeveloperKey($apiKey);		
			
			try {
				$service = new Google_Service_Pagespeedonline($client);
				$pageSpeedInfo = $service->pagespeedapi->runpagespeed($url, $params);
				$pageSpeedInfo = self::formatPageSpeedData($pageSpeedInfo);
			} catch (Exception $e) {
				$err = $e->getMessage();
				$errData = json_decode($err);
				$crawlInfo['crawl_status'] = 0;
				$crawlInfo['log_message'] = $_SESSION['text']['label']['Fail'];
				$crawlInfo['log_message'] .= !empty($errData->error->errors[0]->reason) ? ": " . $errData->error->errors[0]->reason . " :: " . $errData->error->errors[0]->message : "";
			}
			
		} else {
			$crawlInfo['crawl_status'] = 0;
			$crawlInfo['log_message'] = "Google api key not set.";
		}
		
		return $returnLog ? array($pageSpeedInfo, $crawlInfo) : $pageSpeedInfo;
		
	}
	
	public static function formatPageSpeedData($pageSpeedInfo) {

		$pageSpeedData = array(
			'speed_score' => !empty($pageSpeedInfo['ruleGroups']['SPEED']['score'])	? $pageSpeedInfo['ruleGroups']['SPEED']['score'] : 0,
			'usability_score' => !empty($pageSpeedInfo['ruleGroups']['USABILITY']['score'])	? $pageSpeedInfo['ruleGroups']['USABILITY']['score'] : 0,
		);
		
		$detailsInfo = array();
		foreach ($pageSpeedInfo['formattedResults']['ruleResults'] as $ruleSet => $ruleSetInfo) {
		
			$detailsInfo[$ruleSet] = array(
				'localizedRuleName' => $ruleSetInfo['localizedRuleName'],
				'ruleImpact' => $ruleSetInfo['ruleImpact'],
				'impactGroup' => implode(',', $ruleSetInfo['groups']),
				'summary' => self::formatSummaryText($ruleSetInfo['summary']),
				'urlBlocks' => self::formatUrlBlock($ruleSetInfo['urlBlocks']),
			);		
		
		}
		
		$pageSpeedData['details'] = $detailsInfo;
		return $pageSpeedData;
		
	}
	
	public static function formatUrlBlock($urlBlockList) {
		$urlList = array();
	
		foreach ($urlBlockList as $urlBlockInfo) {
			$info['header'] = self::formatSummaryText($urlBlockInfo['header']);
			$info['urls'] = array();
				
			foreach ($urlBlockInfo['urls'] as $urlInfo) {
				$info['urls'][] = self::formatSummaryText($urlInfo['result']);
			}
				
			$urlList[] = $info;
				
		}
	
		return $urlList;
	
	}
	
	public static function formatSummaryText($summaryInfo) {
	
		$formatTxt = $summaryInfo['format'];
	
		// loop through arg information list
		foreach ($summaryInfo['args'] as $argInfo) {
				
			switch ($argInfo['type']) {
	
				case "HYPERLINK":
					$formatTxt = str_replace('{{BEGIN_LINK}}', "<a href='{$argInfo['value']}' target='_blank'>", $formatTxt);
					$formatTxt = str_replace('{{END_LINK}}', "</a>", $formatTxt);
					break;
	
				default:
					$formatTxt = str_replace('{{' . $argInfo['key'] . '}}', $argInfo['value'], $formatTxt);
					break;
	
			}
				
		}
	
		return $formatTxt;
	
	}	
	
	// function to show pagespeed checker
	function showQuickChecker() {
		$this->render('pagespeed/showquickchecker');
	}
	
	function findPageSpeedInfo($searchInfo) {
		$urlList = explode("\n", $searchInfo['website_urls']);
		$list = array();
		$reportList = array();
		
		$i = 1;
		foreach ($urlList as $url) {
			$url = sanitizeData($url);
			if(!preg_match('/\w+/', $url)) continue;
			if ($i++ > 5) break;
			$url = addHttpToUrl($url);
			$list[] = str_replace(array("\n", "\r", "\r\n", "\n\r"), "", trim($url));
		}
		
// 		// loop through the list
// 		foreach ($list as $url) {
// 			$reportList[$url] = array();
// 			$params = array('screenshot' => false, 'strategy' => 'desktop');
// 			$reportList[$url]['desktop'] = $this->__getPageSpeedInfo($url, $params);
// 			$params = array('screenshot' => false, 'strategy' => 'mobile');
// 			$reportList[$url]['mobile'] = $this->__getPageSpeedInfo($url, $params);
// 		}

		include_once(SP_ABSPATH . "/data/pagespeed.php");
		
		$url = "http://www.seopanel.in";
		$this->set('url', $url);
// 		debugVar($reportList);
		
		$this->set('reportList', $reportList);
		$this->set('list', $list);
// 		$this->render('pagespeed/findpagespeedinfo');

		$this->render('pagespeed/pagespeeddetails');
		
	}	
	
}
?>