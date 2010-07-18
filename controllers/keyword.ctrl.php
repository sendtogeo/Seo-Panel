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

# class defines all keyword controller functions
class KeywordController extends Controller{

	# func to show keywords
	function listKeywords($info=''){		
		$this->set('sectionHead', 'Keywords Manager');
		$userId = isLoggedIn();
		$websiteController = New WebsiteController();
		
		$websiteId = empty($info['website_id']) ? "" : $info['website_id'];
		$this->set('websiteList', $websiteController->__getAllWebsites($userId, true));
		$this->set('websiteId', $websiteId);
		$conditions = empty($websiteId) ? "" : " and k.website_id=$websiteId";
		$sql = "select k.*,w.name website,w.status webstatus from keywords k,websites w where k.website_id=w.id";
		$sql .= isAdmin() ? "" : " and w.user_id=$userId";
		$sql .= " $conditions order by k.name";
		
		# pagination setup		
		$this->db->query($sql, true);
		$this->paging->setDivClass('pagingdiv');
		$this->paging->loadPaging($this->db->noRows, SP_PAGINGNO);
		$pagingDiv = $this->paging->printPages('keywords.php', '', 'scriptDoLoad', 'content', 'website_id='.$websiteId);		
		$this->set('pagingDiv', $pagingDiv);
		$sql .= " limit ".$this->paging->start .",". $this->paging->per_page;
		
		# set keywords list
		$keywordList = $this->db->select($sql);
		$this->set('pageNo', $_GET['pageno']);
		$this->set('list', $keywordList);
		$this->render('keyword/list');
	}

	# func to show keyword select box
	function showKeywordSelectBox($userId='', $websiteId='', $keywordId=''){
		$this->set('keywordList', $this->__getAllKeywords($userId, $websiteId, true));
		$this->set('wkeywordId', $keywordId);
		$this->render('keyword/keywordselectbox');
	}
	
	# func to change status
	function __changeStatus($keywordId, $status){
		$sql = "update keywords set status=$status where id=$keywordId";
		$this->db->query($sql);
	}

	# func to change status
	function __deleteKeyword($keywordId){
		$sql = "delete from keywords where id=$keywordId";
		$this->db->query($sql);
		
		$sql = "select id from searchresults where keyword_id=$keywordId";
		$recordList = $this->db->select($sql);
		
		if(count($recordList) > 0){
			foreach($recordList as $recordInfo){
				$sql = "delete from searchresultdetails where searchresult_id=".$recordInfo['id'];
				$this->db->query($sql);
			}
			
			$sql = "delete from searchresults where keyword_id=$keywordId";
			$this->db->query($sql);
		}
	}

	function newKeyword(){		
		$this->set('sectionHead', 'New Keyword');
		$userId = isLoggedIn();
		$websiteController = New WebsiteController();
		$this->set('websiteList', $websiteController->__getAllWebsites($userId, true));
		$langController = New LanguageController();
		$this->set('langList', $langController->__getAllLanguages());
		$this->set('langNull', true);
		$countryController = New CountryController();
		$this->set('countryList', $countryController->__getAllCountries());
		$this->set('countryNull', true);
		$seController = New SearchEngineController();
		$this->set('seList', $seController->__getAllSearchEngines());
		$this->render('keyword/new');
	}

	function createKeyword($listInfo){
		$userId = isLoggedIn();
		$this->set('post', $listInfo);
		$errMsg['name'] = formatErrorMsg($this->validate->checkBlank($listInfo['name']));		
		$errMsg['searchengines'] = formatErrorMsg($this->validate->checkBlank(implode('', $listInfo['searchengines'])));
		
		if(!$this->validate->flagErr){
			if (!$this->__checkName($listInfo['name'], $listInfo['website_id'])) {
				$listInfo['searchengines'] = is_array($listInfo['searchengines']) ? $listInfo['searchengines'] : array();
				$sql = "insert into keywords(name,lang_code,country_code,website_id,searchengines,status)
							values('{$listInfo['name']}','{$listInfo['lang_code']}','{$listInfo['country_code']}',{$listInfo['website_id']},'".implode(':', $listInfo['searchengines'])."',1)";
				$this->db->query($sql);
				$this->listKeywords();
				exit;
			}else{
				$errMsg['name'] = formatErrorMsg('Keyword already exist!');
			}
		}
		$this->set('errMsg', $errMsg);
		$this->newKeyword();
	}

	function __checkName($name, $websiteId){
		$sql = "select id from keywords where name='$name' and website_id=$websiteId";
		$listInfo = $this->db->select($sql, true);
		return empty($listInfo['id']) ? false :  $listInfo['id'];
	}

	# func to get all keywords
	function __getAllKeywords($userId='', $websiteId='', $isAdminCheck=false){
		$sql = "select k.*,w.name website from keywords k,websites w where k.website_id=w.id and k.status=1";		
		if(!$isAdminCheck || !isAdmin() ){
			if(!empty($userId)) $sql .= " and w.user_id=$userId";
		}
		if(!empty($websiteId)) $sql .= " and k.website_id=$websiteId";
		$sql .= " order by k.name";
		$keywordList = $this->db->select($sql);
		return $keywordList;
	}

	function __getKeywordInfo($keywordId){
		$sql = "select * from keywords where id=$keywordId";
		$listInfo = $this->db->select($sql, true);
		return empty($listInfo['id']) ? false :  $listInfo;
	}

	function editKeyword($keywordId, $listInfo=''){				
		$this->set('sectionHead', 'Edit Keyword');
		$userId = isLoggedIn();
		$websiteController = New WebsiteController();
		$this->set('websiteList', $websiteController->__getAllWebsites($userId, true));
		$langController = New LanguageController();
		$this->set('langList', $langController->__getAllLanguages());
		$this->set('langNull', true);
		$countryController = New CountryController();
		$this->set('countryList', $countryController->__getAllCountries());
		$this->set('countryNull', true);
		$seController = New SearchEngineController();
		$this->set('seList', $seController->__getAllSearchEngines());
		if(!empty($keywordId)){
			if(empty($listInfo)){
				$listInfo = $this->__getKeywordInfo($keywordId);
				$listInfo['oldName'] = $listInfo['name'];
				$listInfo['searchengines'] = explode(':', $listInfo['searchengines']);
			}
			$this->set('post', $listInfo);
			$this->render('keyword/edit');
			exit;
		}
		$this->listKeywords();
	}

	function updateKeyword($listInfo){
		$userId = isLoggedIn();
		$this->set('post', $listInfo);
		$errMsg['name'] = formatErrorMsg($this->validate->checkBlank($listInfo['name']));
		$errMsg['searchengines'] = formatErrorMsg($this->validate->checkBlank(implode('', $listInfo['searchengines'])));
		if(!$this->validate->flagErr){

			if($listInfo['name'] != $listInfo['oldName']){
				if ($this->__checkName($listInfo['name'], $listInfo['website_id'])) {
					$errMsg['name'] = formatErrorMsg('Keyword already exist!');
					$this->validate->flagErr = true;
				}
			}

			if (!$this->validate->flagErr) {
				$listInfo['searchengines'] = is_array($listInfo['searchengines']) ? $listInfo['searchengines'] : array();
				$sql = "update keywords set
						name = '{$listInfo['name']}',
						lang_code = '{$listInfo['lang_code']}',
						country_code = '{$listInfo['country_code']}',
						website_id = {$listInfo['website_id']},
						searchengines = '".implode(':', $listInfo['searchengines'])."'
						where id={$listInfo['id']}";
				$this->db->query($sql);
				$this->listKeywords();
				exit;
			}
		}
		$this->set('errMsg', $errMsg);
		$this->editKeyword($listInfo['id'], $listInfo);
	}
	
	function showKeywordReports($keywordId) {
		echo "<script>scriptDoLoad('reports.php', 'content', 'keyword_id=$keywordId&rep=1')</script>";
	}
}
?>