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
	
	var $rowLimit = 5000;
	var $sourceList = array('google');
	var $colList = array();	
	
	function WebMasterController() {
		parent::__construct();

		$this->spTextWB = $this->getLanguageTexts('webmaster', $_SESSION['lang_code']);
		$this->set('spTextWB', $this->spTextWB);
		$this->tokenCtrler = new UserTokenController();
		
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
	function getAnalyticsResults($userId, $siteUrl, $paramList=[], $limit = false) {
		$result = array('status' => false);
		
		
		try {
    		$client = $this->getAuthClient($userId);
    		
    		// check whether client created successfully
    		if (!is_object($client)) {
    		    $result['msg'] = $client;
    		    return $result;
    		}   		
    		
    		
    		$analytics = new Google_Service_AnalyticsReporting($client);
    		
    		
    		
    		// Replace with your view ID, for example XXXX.
    		$VIEW_ID = "196625427";
    		
    		// Create the DateRange object.
    		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
    		$dateRange->setStartDate("today");
    		$dateRange->setEndDate("today");
    		
    		// Create the Metrics object.
    		$sessions = new Google_Service_AnalyticsReporting_Metric();
    		$sessions->setExpression("ga:users");
    		$sessions->setAlias("users");
    		
    		//Create the browser dimension.
    		$browser = new Google_Service_AnalyticsReporting_Dimension();
    		$browser->setName("ga:source");
    		
//     		// Create the Ordering.
//     		$ordering = new Google_Service_AnalyticsReporting_OrderBy();
//     		$ordering->setOrderType("HISTOGRAM_BUCKET");
//     		$ordering->setFieldName("ga:sessionCount");
    		
    		
    		// Create the ReportRequest object.
    		$request = new Google_Service_AnalyticsReporting_ReportRequest();
    		$request->setViewId($VIEW_ID);
    		$request->setDateRanges($dateRange);
    		$request->setMetrics(array($sessions));
    		$request->setDimensions(array($browser));
//     		$request->setOrderBys($ordering);
    		
    		
    		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
    		$body->setReportRequests( array( $request) );
    		$res = $analytics->reports->batchGet( $body );
		} catch (Exception $e) {
		    $err = $e->getMessage();
		    print "Error: search query analytics - $err";
		}
		echo "<pre>";
		print_r($res);
		exit;
		
		
		
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
	
}
?>