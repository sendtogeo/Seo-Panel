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

// class defines all google analytics api controller functions
class AnalyticsController extends GoogleAPIController {
	
	var $spTextGA;
	var $metricList;
	var $defaultMetricName = "users";
	var $dimensionName = "source";
	
	function AnalyticsController() {
		parent::__construct();
		$this->spTextGA = $this->getLanguageTexts('analytics', $_SESSION['lang_code']);
		$this->set('spTextGA', $this->spTextGA);
		$this->metricList = array(
			'users',
			'sessions',
		);
	}
	
	/*
	 * function to get analytics query result
	 */
	function getAnalyticsResults($userId, $VIEW_ID, $startDate, $endDate) {
		$result = array('status' => false);
		
		try {
			
    		$client = $this->getAuthClient($userId);
    		
    		// check whether client created successfully
    		if (!is_object($client)) {
    		    $result['msg'] = $client;
    		    return $result;
    		}
    		
    		$analytics = new Google_Service_AnalyticsReporting($client);
    		
    		// Create the DateRange object.
    		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
    		$dateRange->setStartDate($startDate);
    		$dateRange->setEndDate($endDate);
    		
//     		// Create the Metrics object.
//     		$sessions = new Google_Service_AnalyticsReporting_Metric();
//     		$sessions->setExpression("ga:$metricName");
//     		$sessions->setAlias($metricName);
    		
//     		$sessions2 = new Google_Service_AnalyticsReporting_Metric();
//     		$sessions2->setExpression("ga:sessions");
//     		$sessions2->setAlias("sessions");
    		
    		// Create the Metrics object list
    		$metricObjList = [];
    		foreach ($this->metricList as $metricName) {
	    		$sessions = new Google_Service_AnalyticsReporting_Metric();
	    		$sessions->setExpression("ga:$metricName");
	    		$sessions->setAlias($metricName);
	    		$metricObjList[] = $sessions;
    		}
    		
    		// Create the dimension.
    		$dimension = new Google_Service_AnalyticsReporting_Dimension();
    		$dimension->setName("ga:$this->dimensionName");
    		
    		// Create the Ordering.    		
    		$ordering = new Google_Service_AnalyticsReporting_OrderBy();
    		$ordering->setFieldName("ga:$this->defaultMetricName");
    		$ordering->setOrderType("VALUE");
    		$ordering->setSortOrder("DESCENDING");
    		
    		// Create the ReportRequest object.
    		$request = new Google_Service_AnalyticsReporting_ReportRequest();
    		$request->setViewId($VIEW_ID);
    		$request->setDateRanges($dateRange);
    		$request->setMetrics($metricObjList);
    		$request->setDimensions(array($dimension));
    		$request->setOrderBys($ordering);
    		
    		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
    		$body->setReportRequests( array( $request) );
    		$res = $analytics->reports->batchGet( $body );
    		
    		
//     		debugVar($res);
    		
    		$resultList = $this->fromatResults($res);
    		
    		$result['status'] = true;
    		$result['resultList'] = $resultList;
    		
		} catch (Exception $e) {
		    $err = $e->getMessage();
		    $result['msg'] = "Error: search query analytics - $err";
		}
		
		debugVar($resultList);
		
		return $result;
		
	}	
	
	function fromatResults($reports) {
		$resultList = array();
		
		// loop through the reports
		for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
			$report = $reports[ $reportIndex ];
			
			// get total value
			$totals = $report->getData()->getTotals();
			$values = $totals[0]->getValues();
			$resultList['total'] = [];
			foreach ($this->metricList as $i => $metricName) {
				$resultList['total'][$metricName] = $values[$i];
			}
			
			// get dimension type value
			$rows = $report->getData()->getRows();
			for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
				$row = $rows[$rowIndex];
				$dimensions = $row->getDimensions();
				$metrics = $row->getMetrics();
				$values = $metrics[0]->getValues();
				
				// find metric values
				$resultList[$dimensions[0]] = [];
				foreach ($this->metricList as $i => $metricName) {
					$resultList[$dimensions[0]][$metricName] = $values[$i];
				}
			}
		}
		
		return $resultList;
	}
	
	/*
	 * function to store website results
	 */
	function storeWebsiteAnalytics($websiteId, $reportDate) {
		$websiteId = intval($websiteId);
		$websiteCtrler = new WebsiteController();
		$websiteInfo = $websiteCtrler->__getWebsiteInfo($websiteId);
		$list = $this->__getWebmasterKeywords("website_id=$websiteId and status=1");
		$keywordList = array();
		if (!empty($list)) {foreach ($list as $info) $keywordList[$info['name']] = $info;}
		$result['status'] = true;
			
		$paramList = array(
				'startDate' => $reportDate,
				'endDate' => $reportDate,
				'dimensions' => ['query'],
		);
	
		// query results from api and verify no error occured
		$result = $this->getQueryResults($websiteInfo['user_id'], $websiteInfo['url'], $paramList);
		if ($result['status']) {
				
			// loop through the result list
			foreach ($result['resultList'] as $reportInfo) {
				$keywordName = $reportInfo['keys'][0];
	
				// check if keyword is already existing in the db table, else insert it
				$keywordId = isset($keywordList[$keywordName]) ? intval($keywordList[$keywordName]['id']) : 0;
				if ($keywordId == 0) {$keywordId = $this->__generateKeywordId($websiteInfo['id'], $keywordName);}
	
				$info = array(
						'clicks' => $reportInfo['clicks'],
						'impressions' => $reportInfo['impressions'],
						'ctr' => round($reportInfo['ctr'] * 100, 2),
						'average_position' => $reportInfo['position'],
						'report_date' => $reportDate,
						'source' => $source,
				);
	
				$this->insertKeywordAnalytics($keywordId, $info);
	
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
	
}
?>