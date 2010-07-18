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

# class defines all index controller functions
class IndexController extends Controller{
	
	# index function
	function index(){
		if(isLoggedIn()){
			$userId = isLoggedIn();
			/*$userCtrler = New UserController();
			$userInfo = $userCtrler->__getUserInfo($userId);
			$this->set('userInfo', $userInfo);*/
			
			$websiteCtrler = New WebsiteController();
			$list = $websiteCtrler->__getAllWebsites($userId, true);
			
			include_once(SP_CTRLPATH."/saturationchecker.ctrl.php");
			include_once(SP_CTRLPATH."/rank.ctrl.php");
			include_once(SP_CTRLPATH."/backlink.ctrl.php");
			$rankCtrler = New RankController();
			$backlinlCtrler = New BacklinkController();
			$saturationCtrler = New SaturationCheckerController();			
			$dirCtrler = New DirectoryController();
			
			$websiteList = array();
			foreach($list as $listInfo){
				
				# rank reports
				$report = $rankCtrler->__getWebsiteRankReport($listInfo['id']);
				$report = $report[0];
				$listInfo['alexarank'] = empty($report['alexa_rank']) ? "-" : $report['alexa_rank']." ".$report['rank_diff_alexa'];
				$listInfo['googlerank'] = empty($report['google_pagerank']) ? "-" : $report['google_pagerank']." ".$report['rank_diff_google'];
				
				# back links reports
				$report = $backlinlCtrler->__getWebsitebacklinkReport($listInfo['id']);
				$report = $report[0];
				$listInfo['google']['backlinks'] = empty($report['google']) ? "-" : $report['google']." ".$report['rank_diff_google'];
				$listInfo['yahoo']['backlinks'] = empty($report['yahoo']) ? "-" : $report['yahoo']." ".$report['rank_diff_yahoo'];
				$listInfo['msn']['backlinks'] = empty($report['msn']) ? "-" : $report['msn']." ".$report['rank_diff_msn'];
				
				# rank reports
				$report = $saturationCtrler->__getWebsiteSaturationReport($listInfo['id']);
				$report = $report[0];				
				$listInfo['google']['indexed'] = empty($report['google']) ? "-" : $report['google']." ".$report['rank_diff_google'];
				$listInfo['yahoo']['indexed'] = empty($report['yahoo']) ? "-" : $report['yahoo']." ".$report['rank_diff_yahoo'];
				$listInfo['msn']['indexed'] = empty($report['msn']) ? "-" : $report['msn']." ".$report['rank_diff_msn'];
				
				$listInfo['dirsub']['total'] = $dirCtrler->__getTotalSubmitInfo($listInfo['id']);
				$listInfo['dirsub']['active'] = $dirCtrler->__getTotalSubmitInfo($listInfo['id'], true);
				$websiteList[] = $listInfo;
			}			
			$this->set('websiteList', $websiteList);
			
			$this->render('user/userhome');
		}else{
			$this->render('home');
		}
	}
	
	# show login form
	function showLoginForm(){		
		$this->render('common/login');
	}
	
	# function to show support page
	function showSupport() {
		$this->render('support');
	}
	
	# function to show news boxes
	function showNews($secInfo='') {
		switch($secInfo['sec_name']){
			
			default:
				if(empty($_COOKIE['default_news'])){
					$ret = $this->spider->getContent(SP_NEWS_PAGE);
					setcookie("default_news", $ret['page'], time()+ (60*60*24));
				}
				
				if(!empty($_COOKIE['default_news'])){				
					$this->set('newsContent', stripslashes($_COOKIE['default_news']));
					$this->render('common/topnewsbox', 'ajax');
				}
		}
		
	}
}
?>