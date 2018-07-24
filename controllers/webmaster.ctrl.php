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

// include google api module
include_once(SP_CTRLPATH . "/googleapi.ctrl.php");

// class defines all google webmaster tool api controller functions
class WebMasterController extends GoogleAPIController {
	
	var $rowLimit = 5000;
	var $sourceList = array('google');
	var $colList = array();	
	
	function WebMasterController() {
		parent::Controller();

		$this->spTextWB = $this->getLanguageTexts('webmaster', $_SESSION['lang_code']);
		$this->set('spTextWB', $this->spTextWB);
		
		$this->colList = array(
			'name' => $_SESSION['text']['common']['Keyword'],
			'clicks' => $_SESSION['text']['label']['Clicks'],
			'impressions' => $_SESSION['text']['label']['Impressions'],
			'ctr' => "CTR",
			'average_position' => $this->spTextWB['Average Position'],
		);
		
	}
	
	/*
	 * function to get webmaster tool query search result
	 */
	function getQueryResults($userId, $siteUrl, $paramList, $limit = false) {
		$result = array('status' => false);
		
		try {
			
			$client = $this->getAuthClient($userId);
			
			// check whether client created successfully
			if (!is_object($client)) {
				$result['msg'] = $client;
				return $result;
			}
			
			$service = new Google_Service_Webmasters($client);
			$serviceRquest = new Google_Service_Webmasters_SearchAnalyticsQueryRequest();
			$serviceRquest->startDate = $paramList['startDate'];
			$serviceRquest->endDate = $paramList['endDate'];
			
			if (!empty($paramList['dimensions'])) {
				$serviceRquest->dimensions = $paramList['dimensions'];
			}
			
			if (!empty($paramList['dimensionFilterGroups'])) {
				$serviceRquest->dimensionFilterGroups = $paramList['dimensionFilterGroups'];
			}
			
			$resultList = array();
			$startRow = 0;
			$limit = $limit ? $limit : $this->rowLimit;
			
			while (count($resultList) < $limit) {
				$serviceRquest->startRow = $startRow;
				$serviceRquest->rowLimit = $this->rowLimit;
				$statRes = $service->searchanalytics->query($siteUrl, $serviceRquest);
				$rowList = $statRes->getRows();
				$resultList = array_merge($resultList, $rowList);
				
				// if the result count is less than expected in a call
				if (count($rowList) < $this->rowLimit) {
					break;
				}
				
				$startRow += $this->rowLimit;
			}
			
			$result['status'] = true;
			$result['resultList'] = $resultList;
			
		}  catch (Exception $e) {
			$err = $e->getMessage();
			$result['msg'] = "Error: search query analytics - $err";
		}
		
		return $result;
		
	}

	/*
	 * function to store website results
	 */
	function storeWebsiteAnalytics($websiteId, $reportDate, $source = "google") {		
		$websiteId = intval($websiteId);
		$websiteCtrler = new WebsiteController();
		$websiteInfo = $websiteCtrler->__getWebsiteInfo($websiteId);		
		$wherecond = "website_id=$websiteId and status=1";
		$keywordList = $this->dbHelper->getAllRows('keywords', $wherecond);
		$result['status'] = true;
		
		// if keyword existing
		if (!empty($keywordList)) {
			
			$paramList = array(
				'startDate' => $reportDate,
				'endDate' => $reportDate,
				'dimensions' => ['query'],
			);
			
			// query results from api and verify no error occured
			$result = $this->getQueryResults($websiteInfo['user_id'], $websiteInfo['url'], $paramList);
			if ($result['status']) {
				
				$keywordAnalytics = array();
				foreach ($result['resultList'] as $resInfo) {
					$keywordAnalytics[$resInfo['keys'][0]] = $resInfo;
				}
				
				// for each keyword list
				foreach ($keywordList as $keywordInfo) {
					
					// if keyword present in api response results
					if (isset($keywordAnalytics[$keywordInfo['name']])) {
						$reportInfo = $keywordAnalytics[$keywordInfo['name']];
						$info = array(
							'clicks' => $reportInfo['clicks'],
							'impressions' => $reportInfo['impressions'],
							'ctr' => $reportInfo['ctr'] * 100,
							'average_position' => $reportInfo['position'],
							'report_date' => $reportDate,
							'source' => $source,
						);
						
						$this->insertKeywordAnalytics($keywordInfo['id'], $info);
						
					}
					
				}				
			}
			
		}

		// if keyword report generated successfully
		if ($result['status']) {
			
			// store website analytics
			$paramList = array(
				'startDate' => $reportDate,
				'endDate' => $reportDate,
			);
				
			// query results from api and verify no error occured
			$result = $this->getQueryResults($websiteInfo['user_id'], $websiteInfo['url'], $paramList);
			
			// if status is success
			if ($result['status']) {
				$reportInfo = !empty($result['resultList'][0]) ? $result['resultList'][0] : array();
				$info = array(
					'clicks' => !empty($reportInfo->clicks) ? $reportInfo->clicks : 0,
					'impressions' => !empty($reportInfo->impressions) ? $reportInfo->impressions : 0,
					'ctr' => !empty($reportInfo->ctr) ? $reportInfo->ctr * 100 : 0,
					'average_position' => !empty($reportInfo->position) ? $reportInfo->position : 0,
					'report_date' => $reportDate,
					'source' => $source,
				);
					
				$this->insertWebsiteAnalytics($websiteId, $info);
			}
			
		}
		
		return $result;
		
	}
	
	/*
	 * function to insert keyword analytics
	 */
	function insertKeywordAnalytics($keywordId, $reportInfo, $clearExisting = true) {
		$keywordId = intval($keywordId);
		$source = addslashes($reportInfo['source']);
		$resultDate = addslashes($reportInfo['report_date']);		
		
		if ($clearExisting) {
			$whereCond = "keyword_id=$keywordId and report_date='$resultDate' and source='$source'";
			$this->dbHelper->deleteRows('keyword_analytics', $whereCond);
		}
		
		$dataList = array(
			'keyword_id' => $keywordId,
			'clicks|int' => $reportInfo['clicks'],
			'impressions|int' => $reportInfo['impressions'],
			'ctr|float' => round($reportInfo['ctr'], 2),
			'average_position|float' => round($reportInfo['average_position'], 2),
			'report_date' => $resultDate,
			'source' => $source,
		);
		
		$this->dbHelper->insertRow('keyword_analytics', $dataList);
		
	}
	
	/*
	 * function to insert website analytics
	 */
	function insertWebsiteAnalytics($websiteId, $reportInfo, $clearExisting = true) {
		$websiteId = intval($websiteId);
		$source = addslashes($reportInfo['source']);
		$resultDate = addslashes($reportInfo['report_date']);
		
		if ($clearExisting) {
			$whereCond = "website_id=$websiteId and report_date='$resultDate' and source='$source'";
			$this->dbHelper->deleteRows('website_search_analytics', $whereCond);
		}
		
		$dataList = array(
			'website_id' => $websiteId,
			'clicks|int' => $reportInfo['clicks'],
			'impressions|int' => $reportInfo['impressions'],
			'ctr|float' => round($reportInfo['ctr'], 2),
			'average_position|float' => round($reportInfo['average_position'], 2),
			'report_date' => $resultDate,
			'source' => $source,
		);
		
		$this->dbHelper->insertRow('website_search_analytics', $dataList);
		
	}

	# function check whether webmaster reports already saved
	function isReportsExists($websiteId, $resultDate, $source = "google") {
		$websiteId = intval($websiteId);
		$source = addslashes($source);
		$resultDate = addslashes($resultDate);
		$whereCond = "website_id=$websiteId and report_date='$resultDate' and source='$source'";
		$info = $this->dbHelper->getRow("website_search_analytics", $whereCond, "website_id");
		return !empty($info['website_id']) ? true : false;
	}
	
	# func to show webmasterkeyword report summary
	function viewKeywordSearchSummary($searchInfo = '') {
	
		$userId = isLoggedIn();
		$keywordController = New KeywordController();
		$exportVersion = false;
		switch($searchInfo['doc_type']){
	
			case "export":
				$exportVersion = true;
				$exportContent = "";
				break;
					
			case "pdf":
				$this->set('pdfVersion', true);
				break;
					
			case "print":
				$this->set('printVersion', true);
				break;
		}
	
		if (!empty ($searchInfo['from_time'])) {
			$fromTime = strtotime($searchInfo['from_time'] . ' 00:00:00');
		} else {
			$fromTime = mktime(0, 0, 0, date('m'), date('d') - 3, date('Y'));
		}		
	
		if (!empty ($searchInfo['to_time'])) {
			$toTime = strtotime($searchInfo['to_time'] . ' 00:00:00');
		} else {
			$toTime = mktime(0, 0, 0, date('m'), date('d') - 2, date('Y'));
		}
	
		$fromTimeTxt = date('Y-m-d', $fromTime);
		$toTimeTxt = date('Y-m-d', $toTime);
		$this->set('fromTime', $fromTimeTxt);
		$this->set('toTime', $toTimeTxt);
	
		$websiteController = New WebsiteController();
		$websiteList = $websiteController->__getAllWebsitesWithActiveKeywords($userId, true);
		$this->set('websiteList', $websiteList);
		$websiteId = isset($searchInfo['website_id']) ? intval($searchInfo['website_id']) : $websiteList[0]['id'];
		$this->set('websiteId', $websiteId);
		
		$websiteInfo = $websiteController->__getWebsiteInfo($websiteId);
		$this->set('websiteInfo', $websiteInfo);
		$source = $this->sourceList[0];
		$this->set('source', $source);
	
		// to find order col
		if (!empty($searchInfo['order_col'])) {
			$orderCol = $searchInfo['order_col'];
			$orderVal = getOrderByVal($searchInfo['order_val']);
		} else {
			$orderCol = "clicks";
			$orderVal = 'DESC';
		}
	
		$this->set('orderCol', $orderCol);
		$this->set('orderVal', $orderVal);
		$scriptPath = SP_WEBPATH . "/webmaster-tools.php?sec=viewKeywordReports&website_id=$websiteId";
		$scriptPath .= "&from_time=$fromTimeTxt&to_time=$toTimeTxt&search_name=" . $searchInfo['search_name'];
		$scriptPath .= "&order_col=$orderCol&order_val=$orderVal";
		
		$conditions = !empty($websiteId) ? " and k.website_id=$websiteId" : "";
		$conditions .= !empty($searchInfo['search_name']) ? " and k.name like '%".addslashes($searchInfo['search_name'])."%'" : "";
		
		$subSql = "select [cols] from keywords k, keyword_analytics r where k.id=r.keyword_id
		and k.status=1 $conditions and r.source='$source' and r.report_date='$fromTimeTxt'";
		
		$sql = "
		(" . str_replace("[cols]", "k.id,k.name,r.clicks,r.impressions,r.ctr,r.average_position", $subSql) . ")
		UNION
		(select k.id,k.name,0,0,0,0 from keywords k where k.status=1 $conditions 
		and k.id not in (". str_replace("[cols]", "distinct(k.id)", $subSql) ."))
		order by " . addslashes($orderCol) . " " . addslashes($orderVal);
		
		if ($orderVal != 'name') $sql .= ", name";
		
		# pagination setup
		$this->db->query($sql, true);
		$this->paging->setDivClass('pagingdiv');
		$this->paging->loadPaging($this->db->noRows, SP_PAGINGNO);
		$pagingDiv = $this->paging->printPages($scriptPath, '', 'scriptDoLoad', 'content', "");
		$this->set('pagingDiv', $pagingDiv);
		$this->set('pageNo', $searchInfo['pageno']);
		
		if (!in_array($searchInfo['doc_type'], array("pdf", "export"))) {
			$sql .= " limit ".$this->paging->start .",". $this->paging->per_page;
		}
		
		# set report list
		$baseReportList = $this->db->select($sql);
		$this->set('baseReportList', $baseReportList);
		$this->set('colList', $this->colList);
		
		// if keywords existing
		if (!empty($baseReportList)) {
			
			$keywordIdList = array();
			foreach ($baseReportList as $info) {
				$keywordIdList[] = $info['id'];
			}

			$sql = "select k.id,k.name,r.clicks,r.impressions,r.ctr,r.average_position 
			from keywords k, keyword_analytics r where k.id=r.keyword_id
			and k.status=1 $conditions and r.source='$source' and r.report_date='$toTimeTxt'";
			$sql .= " and k.id in(" . implode(",", $keywordIdList) . ")";
			$reportList = $this->db->select($sql);
			$compareReportList = array();
			
			foreach ($reportList as $info) {
				$compareReportList[$info['id']] = $info;	
			}
			
			$this->set('compareReportList', $compareReportList);
			
		}
	
		if ($exportVersion) {
			$spText = $_SESSION['text'];
			$reportHeading =  $this->spTextTools['Keyword Search Summary']."(".date('Y-m-d', $fromTime)." - ".date('Y-m-d', $toTime).")";
			$exportContent .= createExportContent( array('', $reportHeading, ''));
			$exportContent .= createExportContent( array());
			$headList = array($spText['common']['Website'], $spText['common']['Keyword']);
	
			$pTxt = str_replace("-", "/", substr($fromTimeTxt, -5));
			$cTxt = str_replace("-", "/", substr($toTimeTxt, -5));
			foreach ($this->colList as $colKey => $colLabel) {
				if ($colKey == 'name') continue;
				$headList[] = $colLabel . "($cTxt)";
				$headList[] = $colLabel . "($pTxt)";
				$headList[] = $colLabel . "(+/-)";
			}
	
			$exportContent .= createExportContent($headList);
			foreach($baseReportList as $listInfo){
	
				$valueList = array($websiteInfo['url'], $listInfo['name']);
				foreach ($this->colList as $colName => $colVal) {
					if ($colName == 'name') continue;
					
					$prevRank = isset($listInfo[$colName]) ? $listInfo[$colName] : 0;
					$currRank = isset($compareReportList[$keywordId][$colName]) ? $compareReportList[$keywordId][$colName] : 0;
					$rankDiff = "";
	
					// if both ranks are existing
					if ($prevRank != '' && $currRank != '') {
						$rankDiff = $prevRank - $currRank;
					}
						
					$valueList[] = $currRank;
					$valueList[] = $prevRank;
					$valueList[] = $rankDiff;
				}
	
				$exportContent .= createExportContent( $valueList);
			}
			
			exportToCsv('keyword_search_summary', $exportContent);
		} else {
				
			// if pdf export
			if ($searchInfo['doc_type'] == "pdf") {
				exportToPdf($this->getViewContent('webmaster/keyword_search_analytics_summary'), "keyword_search_summary_$fromTimeTxt-$toTimeTxt.pdf");
			} else {
				$this->set('searchInfo', $searchInfo);
				$this->render('webmaster/keyword_search_analytics_summary');
			}
			
		}
	}
	
	# func to show website search reports
	function viewWebsiteSearchReports($searchInfo = '') {
	
		$userId = isLoggedIn();
		if (!empty ($searchInfo['from_time'])) {
			$fromTime = $searchInfo['from_time'];
		} else {
			$fromTime = date('Y-m-d', strtotime('-17 days'));
		}
	
		if (!empty ($searchInfo['to_time'])) {
			$toTime = $searchInfo['to_time'];
		} else {
			$toTime = date('Y-m-d', strtotime('-2 days'));
		}
	
		$fromTime = addslashes($fromTime);
		$toTime = addslashes($toTime);
		$this->set('fromTime', $fromTime);
		$this->set('toTime', $toTime);
		
		$source = $this->sourceList[0];
		$this->set('source', $source);
	
		$websiteController = New WebsiteController();
		$websiteList = $websiteController->__getAllWebsites($userId, true);
		$this->set('websiteList', $websiteList);
		$websiteId = empty($searchInfo['website_id']) ? $websiteList[0]['id'] : intval($searchInfo['website_id']);
		$this->set('websiteId', $websiteId);
	
		$conditions = empty($websiteId) ? "" : " and s.website_id=$websiteId";
		$sql = "select s.* ,w.name from website_search_analytics s,websites w  where s.website_id=w.id
		and report_date >= '$fromTime' and report_date <= '$toTime' and source='$source' $conditions order by report_date";
		$reportList = $this->db->select($sql);
		
		$colList = array_keys($this->colList);
		array_shift($colList);
		foreach ($colList as $col) $prevRank[$col] = 0;
	
		# loop through rank
		foreach ($reportList as $key => $repInfo) {
			
			foreach ($colList as $col) $rankDiff[$col] = '';
			
			foreach ($colList as $col) {
				$rankDiff[$col] = $repInfo[$col] - $prevRank[$col];
				
				if ($rankDiff[$col] > 0) {
					$rankDiff[$col] = "<font class='green'>($rankDiff[$col])</font>";
				} elseif ($rankDiff[$col] < 0) {
					$rankDiff[$col] = "<font class='red'>($rankDiff[$col])</font>";
				}
					
				$reportList[$key]['rank_diff_'.$col] = empty($rankDiff[$col]) ? '' : $rankDiff[$col];
				
			}
			
			foreach ($colList as $col) $prevRank[$col] = $repInfo[$col];

		}
		
		$this->set('list', array_reverse($reportList, true));
		$this->render('webmaster/website_search_reports');
	}
	
	# func to show keyword search reports
	function viewKeywordSearchReports($searchInfo = '') {
	
		$userId = isLoggedIn();

		if (!empty ($searchInfo['from_time'])) {
			$fromTimeDate = $searchInfo['from_time'];
		} else {
			$fromTimeDate = date('Y-m-d', strtotime('-17 days'));
		}
		
		if (!empty ($searchInfo['to_time'])) {
			$fromTimeDate = $searchInfo['to_time'];
		} else {
			$fromTimeDate = date('Y-m-d', strtotime('-2 days'));
		}
		
		$this->set('fromTime', $fromTimeDate);
		$this->set('toTime', $toTimeDate);
	
		$keywordController = New KeywordController();
		if(!empty($searchInfo['keyword_id']) && !empty($searchInfo['rep'])){				
			$searchInfo['keyword_id'] = intval($searchInfo['keyword_id']);
			$keywordInfo = $keywordController->__getKeywordInfo($searchInfo['keyword_id']);
			$searchInfo['website_id'] = $keywordInfo['website_id'];
		}
	
		$websiteController = New WebsiteController();
		$websiteList = $websiteController->__getAllWebsitesWithActiveKeywords($userId, true);
		$this->set('websiteList', $websiteList);
		$websiteId = empty ($searchInfo['website_id']) ? $websiteList[0]['id'] : intval($searchInfo['website_id']);
		$this->set('websiteId', $websiteId);
	
		$keywordList = $keywordController->__getAllKeywords($userId, $websiteId, true);
		$this->set('keywordList', $keywordList);
		$keywordId = empty ($searchInfo['keyword_id']) ? $keywordList[0]['id'] : $searchInfo['keyword_id'];
		$this->set('keywordId', $keywordId);
	
		$seController = New SearchEngineController();
		$seList = $seController->__getAllSearchEngines();
		$this->set('seList', $seList);
		$seId = empty ($searchInfo['se_id']) ? $seList[0]['id'] : intval($searchInfo['se_id']);
		$this->set('seId', $seId);
		$this->set('seInfo', $seController->__getsearchEngineInfo($seId));
	
		$conditions = empty ($keywordId) ? "" : " and s.keyword_id=$keywordId";
		$conditions .= empty ($seId) ? "" : " and s.searchengine_id=$seId";
		$sql = "select s.*,sd.url,sd.title,sd.description from searchresults s,searchresultdetails sd
		where s.id=sd.searchresult_id and result_date>='$fromTimeDate' and result_date<='$toTimeDate' $conditions
		order by s.result_date";
		$repList = $this->db->select($sql);
	
		$reportList = array ();
		foreach ($repList as $repInfo) {
			$var = 'se' . $seId . $repInfo['keyword_id'] . $repInfo['result_date'];
			
			if (empty ($reportList[$var])) {
				$reportList[$var] = $repInfo;
			} else {
				if ($repInfo['rank'] < $reportList[$var]['rank']) {
					$reportList[$var] = $repInfo;
				}
			}

		}

		$prevRank = 0;
		$i = 0;
		foreach ($reportList as $key => $repInfo) {
			$rankDiff = '';
			if ($i > 0) {
				$rankDiff = $prevRank - $repInfo['rank'];
				if ($rankDiff > 0) {
					$rankDiff = "<font class='green'>($rankDiff)</font>";
				} elseif ($rankDiff < 0) {
					$rankDiff = "<font class='red'>($rankDiff)</font>";
				}
			}
			
			$reportList[$key]['rank_diff'] = empty ($rankDiff) ? '' : $rankDiff;
			$prevRank = $repInfo['rank'];
			$i++;
		}

		$this->set('list', array_reverse($reportList, true));		
		$this->render('webmaster/keyword_search_reports');
		
	}
	
}
?>