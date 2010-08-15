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

# class defines all backlink controller functions
class BacklinkController extends Controller{
	var $url;
	var $colList = array('google' => 'google', 'yahoo' => 'yahoo', 'msn' => 'msn', 'altavista' => 'altavista', 'alltheweb' => 'alltheweb');
	
	function showBacklink() {
		$this->set('sectionHead', 'Quick Backlinks Checker');
		
		$this->render('backlink/showbacklink');
	}
	
	function findBacklink($searchInfo) {
		$urlList = explode("\n", $searchInfo['website_urls']);
		$list = array();
		foreach ($urlList as $url) {
			if(!preg_match('/\w+/', $url)) continue;
			if(!stristr($url, 'http://')) $url = "http://".$url;
			$list[] = $url;
		}

		$this->set('list', $list);
		$this->render('backlink/findbacklink');
	}
	
	function printBacklink($backlinkInfo){
		$this->url = $backlinkInfo['url'];
		print $this->__getBacklinks($backlinkInfo['engine']);
	}
	
	function __getBacklinks ($engine) {
		
		switch ($engine) {
			
			#google
			case 'google':
				$url = 'http://www.google.com/search?q=link%3A' . urlencode($this->url);			
				$v = $this->spider->getContent($url);
				$v = empty($v['page']) ? '' :  $v['page'];
				if(preg_match('/about ([0-9\,]+) results/si', $v, $r)){					
				}elseif(preg_match('/<div id=resultStats>([0-9\,]+) results/si', $v, $r)){					
				}elseif(preg_match('/([0-9\,]+) results/si', $v, $r)){					
				}elseif(preg_match('/about <b>([0-9\,]+)<\/b> linking/si', $v, $r)){					
				}
				return ($r[1]) ? str_replace(',', '', $r[1]) : 0;
				break;
				
			#yahoo
			case 'yahoo':
				$url = 'http://search.yahoo.com/search?p=links%3A' . urlencode($this->url);
				$v = $this->spider->getContent($url);
				$v = empty($v['page']) ? '' :  $v['page'];
				preg_match('/([0-9\,]+)<\/strong> results for/si', $v, $r);
				return ($r[1]) ? str_replace(',', '', $r[1]) : 0;
				break;
				
			#msn
			case 'msn':
				$url = 'http://www.bing.com/search?q=link%3A' . urlencode($this->url);
				$v = $this->spider->getContent($url);
				$v = empty($v['page']) ? '' :  $v['page'];				
				preg_match('/of ([0-9\,]+) results/si', $v, $r);
				return ($r[1]) ? str_replace(',', '', $r[1]) : 0;
				break;
				
			#altavista
			case 'altavista':
				$url = 'http://www.altavista.com/web/results?q=link%3A' . urlencode($this->url);
				$v = $this->spider->getContent($url);
				$v = empty($v['page']) ? '' :  $v['page'];
				preg_match('/found ([0-9\,]+) results/si', $v, $r);
				return ($r[1]) ? str_replace(',', '', $r[1]) : 0;
				break;
				
			#alltheweb
			case 'alltheweb':
				$url = 'http://www.alltheweb.com/search?q=link%3A' . urlencode($this->url);
				$v = $this->spider->getContent($url);
				$v = empty($v['page']) ? '' :  $v['page'];
				preg_match('/\<span class\="ofSoMany"\>([0-9\,]+)\<\/span\>/si', $v, $r);
				return ($r[1]) ? str_replace(',', '', $r[1]) : 0;
				break;
		}
		
		return 0;
	}
	
	# func to show genearte reports interface
	function showGenerateReports($searchInfo = '') {
		$this->set('sectionHead', 'Generate Backlinks Reports');
				
		$userId = isLoggedIn();
		$websiteController = New WebsiteController();
		$websiteList = $websiteController->__getAllWebsites($userId, true);
		$this->set('websiteList', $websiteList);
						
		$this->render('backlink/generatereport');
	}
	
	# func to generate reports
	function generateReports( $searchInfo='' ) {		
		$userId = isLoggedIn();		
		$websiteId = empty ($searchInfo['website_id']) ? '' : $searchInfo['website_id'];
		
		$sql = "select id,url from websites where status=1";
		if(!empty($userId) && !isAdmin()) $sql .= " and user_id=$userId";
		if(!empty($websiteId)) $sql .= " and id=$websiteId";
		$sql .= " order by name";
		$websiteList = $this->db->select($sql);		
		
		if(count($websiteList) <= 0){
			echo "<p class='note'>No Websites found!!!</p>";
			exit;
		}
		
		# loop through each websites			
		foreach ( $websiteList as $websiteInfo ) {
			$this->url = $websiteUrl = addHttpToUrl($websiteInfo['url']);			
			foreach ($this->colList as $col => $dbCol) {
				$websiteInfo[$col] = $this->__getBacklinks($col);
			}
			
			$this->saveRankResults($websiteInfo, true);			
			echo "<p class='note notesuccess'>Saved backlink results of <b>$websiteUrl</b>.....</p>";
		}	
	}
	
	# function to save rank details
	function saveRankResults($matchInfo, $remove=false) {
		$time = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		
		if($remove){				
			$sql = "delete from backlinkresults where website_id={$matchInfo['id']} and result_time=$time";
			$this->db->query($sql);
		}
		
		$sql = "insert into backlinkresults(website_id,google,yahoo,msn,altavista,alltheweb,result_time)
				values({$matchInfo['id']},{$matchInfo['google']},{$matchInfo['yahoo']},{$matchInfo['msn']},{$matchInfo['altavista']},{$matchInfo['alltheweb']},$time)";
		$this->db->query($sql);
	}
	
	# func to show reports
	function showReports($searchInfo = '') {
		$this->set('sectionHead', 'Backlinks Reports');
		$userId = isLoggedIn();
		if (!empty ($searchInfo['from_time'])) {
			$fromTime = strtotime($searchInfo['from_time'] . ' 00:00:00');
		} else {
			$fromTime = mktime(0, 0, 0, date('m'), date('d') - 30, date('Y'));
		}
		if (!empty ($searchInfo['to_time'])) {
			$toTime = strtotime($searchInfo['to_time'] . ' 23:59:59');
		} else {
			$toTime = mktime();
		}
		$this->set('fromTime', date('Y-m-d', $fromTime));
		$this->set('toTime', date('Y-m-d', $toTime));

		$websiteController = New WebsiteController();
		$websiteList = $websiteController->__getAllWebsites($userId, true);
		$this->set('websiteList', $websiteList);
		$websiteId = empty ($searchInfo['website_id']) ? $websiteList[0]['id'] : $searchInfo['website_id'];
		$this->set('websiteId', $websiteId);
		
		$conditions = empty ($websiteId) ? "" : " and s.website_id=$websiteId";		
		$sql = "select s.* ,w.name
								from backlinkresults s,websites w 
								where s.website_id=w.id 
								and result_time>= $fromTime and result_time<=$toTime $conditions  
								order by result_time";
		$reportList = $this->db->select($sql);
		
		$i = 0;
		$colList = $this->colList;
		foreach ($colList as $col => $dbCol) {
			$prevRank[$col] = 0;
		}
		
		# loop throgh rank
		foreach ($reportList as $key => $repInfo) {
			foreach ($colList as $col => $dbCol) {
				$rankDiff[$col] = '';
			}			
			
			foreach ($colList as $col => $dbCol) {
				if ($i > 0) {
					$rankDiff[$col] = ($prevRank[$col] - $repInfo[$dbCol]) * -1;
					if ($rankDiff[$col] > 0) {
						$rankDiff[$col] = "<font class='green'>($rankDiff[$col])</font>";
					}elseif ($rankDiff[$col] < 0) {
						$rankDiff[$col] = "<font class='red'>($rankDiff[$col])</font>";
					}
				}
				$reportList[$key]['rank_diff_'.$col] = empty ($rankDiff[$col]) ? '' : $rankDiff[$col];
			}
			
			foreach ($colList as $col => $dbCol) {
				$prevRank[$col] = $repInfo[$dbCol];
			}
			
			$i++;
		}

		$this->set('list', array_reverse($reportList, true));
		$this->render('backlink/backlinkreport');
	}
	
	# func to get backlink report for a website
	function __getWebsitebacklinkReport($websiteId, $limit=1) {
		
		$conditions = empty ($websiteId) ? "" : " and s.website_id=$websiteId";		
		$sql = "select s.* ,w.name
				from backlinkresults s,websites w 
				where s.website_id=w.id 
				and s.website_id=$websiteId   
				order by result_time DESC
				Limit 0, ".($limit+1);
		$reportList = $this->db->select($sql);
		$reportList = array_reverse($reportList);
		
		$i = 0;
		$colList = $this->colList;
		foreach ($colList as $col => $dbCol) {
			$prevRank[$col] = 0;
		}
		
		# loop throgh rank
		foreach ($reportList as $key => $repInfo) {
			foreach ($colList as $col => $dbCol) {
				$rankDiff[$col] = '';
			}			
			
			foreach ($colList as $col => $dbCol) {
				if ($i > 0) {
					$rankDiff[$col] = ($prevRank[$col] - $repInfo[$dbCol]) * -1;
					if ($rankDiff[$col] > 0) {
						$rankDiff[$col] = "<font class='green'>($rankDiff[$col])</font>";
					}elseif ($rankDiff[$col] < 0) {
						$rankDiff[$col] = "<font class='red'>($rankDiff[$col])</font>";
					}
				}
				$reportList[$key]['rank_diff_'.$col] = empty ($rankDiff[$col]) ? '' : $rankDiff[$col];
			}
			
			foreach ($colList as $col => $dbCol) {
				$prevRank[$col] = $repInfo[$dbCol];
			}
			
			$i++;
		}

		$reportList = array_reverse(array_slice($reportList, count($reportList) - $limit));
		return $reportList;
	}
	
}
?>