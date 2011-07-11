<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)			   *
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

# class defines all proxy controller functions
class ProxyController extends Controller{

	# func to show proxy list
	function listProxy($info=''){
		$userId = isLoggedIn();
		
		$sql = "select * from proxylist order by id";		
		
		# pagination setup		
		$this->db->query($sql, true);
		$this->paging->setDivClass('pagingdiv');
		$this->paging->loadPaging($this->db->noRows, SP_PAGINGNO);
		$pagingDiv = $this->paging->printPages('proxy.php');		
		$this->set('pagingDiv', $pagingDiv);
		$sql .= " limit ".$this->paging->start .",". $this->paging->per_page;
				
		$proxyList = $this->db->select($sql);	
		$this->set('pageNo', $info['pageno']);		
		$this->set('list', $proxyList);
		$this->render('proxy/proxylist');
	}

	# func to get all Proxys
	function __getAllProxys($isStatusCheck=true, $status=1){
		$sql = "select * from proxylist";
		if($isStatusCheck){
			$sql .= " and status=$status";
		} 
		$sql .= " order by name";
		$proxyList = $this->db->select($sql);
		return $proxyList;
	}

	# func to change status
	function __changeStatus($proxyId, $status){
		$sql = "update proxylist set status=$status where id=$proxyId";
		$this->db->query($sql);
	}

	# func to change status
	function __deleteProxy($proxyId){
		$sql = "delete from proxylist where id=$proxyId";
		$this->db->query($sql);
	}

	function __checkProxy($name, $port=80){
		$sql = "select id from proxylist where proxy='$name' and port=$port";
		$listInfo = $this->db->select($sql, true);
		return empty($listInfo['id']) ? false :  $listInfo['id'];
	}
	
	
	function newProxy($listInfo=''){
		if (!isset($listInfo['port'])) {
			$listInfo['port'] = 80;
		}
				
		$this->set('post', $listInfo);		
		$this->render('proxy/newproxy');
	}

	function createProxy($listInfo){
				
		$errMsg['proxy'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy']));
		$errMsg['port'] = formatErrorMsg($this->validate->checkNumber($listInfo['port']));
		if (!empty($listInfo['proxy_auth'])) {
			$errMsg['proxy_username'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy_username']));
			$errMsg['proxy_password'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy_password']));
		}
		if(!$this->validate->flagErr){
			if (!$this->__checkProxy($listInfo['proxy'], $listInfo['port'])) {
				$proxyAuth = empty($listInfo['proxy_auth']) ? 0 : 1;
				$sql = "insert into proxylist(proxy,port,proxy_auth,proxy_username,proxy_password,status)
							values('{$listInfo['proxy']}','{$listInfo['port']}',$proxyAuth,'{$listInfo['proxy_username']}','{$listInfo['proxy_password']}',0)";
				$this->db->query($sql);
				$this->listProxy();
				exit;
			}else{
				$errMsg['proxy'] = formatErrorMsg($this->spTextProxy['Proxyalreadyexist']);
			}
		}
		$this->set('errMsg', $errMsg);
		$this->newProxy($listInfo);
	}

	function __getProxyInfo($proxyId){
		$sql = "select * from proxylist where id=$proxyId";
		$listInfo = $this->db->select($sql, true);
		return empty($listInfo['id']) ? false :  $listInfo;
	}

	function editProxy($proxyId, $listInfo=''){
		
		if(!empty($proxyId)){
			if(empty($listInfo)){
				$listInfo = $this->__getProxyInfo($proxyId);
				$listInfo['oldProxy'] = $listInfo['proxy'];
			}
			$this->set('post', $listInfo);
			
			$this->render('proxy/editproxy');
			exit;
		}
		$this->listProxy();
	}

	function updateProxy($listInfo){
		
		$this->set('post', $listInfo);
		$errMsg['proxy'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy']));
		$errMsg['port'] = formatErrorMsg($this->validate->checkNumber($listInfo['port']));
		if (!empty($listInfo['proxy_auth'])) {
			$errMsg['proxy_username'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy_username']));
			$errMsg['proxy_password'] = formatErrorMsg($this->validate->checkBlank($listInfo['proxy_password']));
		}
		if(!$this->validate->flagErr){

			if($listInfo['proxy'] != $listInfo['oldProxy']){
				if ($this->__checkProxy($listInfo['proxy'], $listInfo['port'])) {
					$errMsg['proxy'] = formatErrorMsg($this->spTextProxy['Proxyalreadyexist']);
					$this->validate->flagErr = true;
				}
			}

			if (!$this->validate->flagErr) {
				$proxyAuth = empty($listInfo['proxy_auth']) ? 0 : 1;
				$sql = "update proxylist set
						proxy = '{$listInfo['proxy']}',
						port = '{$listInfo['port']}',
						proxy_auth = $proxyAuth,
						proxy_username = '{$listInfo['proxy_username']}',
						proxy_password = '{$listInfo['proxy_password']}'
						where id={$listInfo['id']}";
				$this->db->query($sql);
				$this->listProxy();
				exit;
			}
		}
		$this->set('errMsg', $errMsg);
		$this->editProxy($listInfo['id'], $listInfo);
	}
	
	# func to check whether proxy is active or not
	function __isProxyActive($proxyId) {
		
		$proxyInfo = $this->__getProxyInfo($proxyId);
		$ret = $this->spider->checkProxy($proxyInfo);		
		return empty($ret['error']) ? 1 : 0; 
		
	}
	
	function checkStatus($proxyId) {
		$status = $this->__isProxyActive($proxyId);
		$this->__changeStatus($proxyId, $status);
	}
	
	function getRandomProxy() {
		$sql = "SELECT * FROM proxylist where status=1 ORDER BY RAND() LIMIT 1";
		$listInfo = $this->db->select($sql, true);
		return empty($listInfo['id']) ? false :  $listInfo;
	}	
}
?>