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

# class defines all search engine controller functions
class SearchEngineController extends Controller{
	
	# func to get all search engines
	function __getAllSearchEngines(){
		$sql = "select * from searchengines where status=1";
		$seList = $this->db->select($sql);
		return $seList;
	}
	
	# func to get search engine info
	function __getsearchEngineInfo($seId){
		$sql = "select * from searchengines where id=$seId";
		$seList = $this->db->select($sql, true);
		return $seList;
	}
	
	# func to get all search engines
	function __getAllCrawlFormatedSearchEngines(){
		$sql = "select * from searchengines where status=1";
		$list = $this->db->select($sql);
		$seList = array();
		foreach($list as $seInfo){
			$seId = $seInfo['id'];
			$seInfo['regex'] = "/".$seInfo['regex']."/is";
			$search = array('[--num--]');
			$replace = array($seInfo['no_of_results_page']);
			$seInfo['url'] = str_replace($search, $replace, $seInfo['url']);
			$seList[$seId] = $seInfo;
		}	
		return $seList;
	}
}
?>