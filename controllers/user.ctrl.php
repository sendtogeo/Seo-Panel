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

# class defines all user controller functions
class UserController extends Controller{	
	
	# index function
	function index($info=''){
		
		if(!isset($info['referer'])) {
			$info['referer'] = isValidReferer($_SERVER['HTTP_REFERER']);
			$this->set('post', $info);
		}
				
		$this->render('common/login');
	}
	
	# login function
	function login(){	    
	    
	    $_POST['userName'] = sanitizeData($_POST['userName']);
		$this->set('post', $_POST);
		$errMsg['userName'] = formatErrorMsg($this->validate->checkBlank($_POST['userName']));
		$errMsg['password'] = formatErrorMsg($this->validate->checkBlank($_POST['password']));
		if(!$this->validate->flagErr){
			$sql = "select u.*,ut.user_type from users u,usertypes ut where u.utype_id=ut.id and u.username='".addslashes($_POST['userName'])."'";
			$userInfo = $this->db->select($sql, true);
			if(!empty($userInfo['id'])){
				if($userInfo['password'] == md5($_POST['password'])){
					if($userInfo['status'] == 1){
					    
    					// if login after first installation
                	    if (!empty($_POST['lang_code']) && ($_POST['lang_code'] != 'en')) {
                	        $sql = "UPDATE `settings` SET set_val='".addslashes($_POST['lang_code'])."' WHERE set_name='SP_DEFAULTLANG'";
                	        $this->db->query($sql);
                	        
                	        $sql = "UPDATE users SET lang_code='".addslashes($_POST['lang_code'])."' WHERE id=1";
                	        $this->db->query($sql);
                	        
                	        $userInfo['lang_code'] = $_POST['lang_code'];
                	    }
					    
						$uInfo['userId'] = $userInfo['id'];
						$uInfo['userType'] = $userInfo['user_type']; 
						Session::setSession('userInfo', $uInfo);
						Session::setSession('lang_code', $userInfo['lang_code']);
                	    Session::setSession('text', '');
						if ($referer = isValidReferer($_POST['referer'])) {
							redirectUrl($referer);
						} else {
							redirectUrl(SP_WEBPATH."/");	
						}						
					}else{
						$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']["User inactive"]);
					}
				}else{
					$errMsg['password'] = formatErrorMsg($_SESSION['text']['login']["Password incorrect"]);
				}
			}else{
				$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']["Login incorrect"]);
			}
		}
		$this->set('errMsg', $errMsg);
		$this->index();
	}
	
	# register function
	function register(){		
		$this->render('common/register');
	}
	
	# function to start registration
	function startRegistration(){
	    $_POST = sanitizeData($_POST);
		$this->set('post', $_POST);
		$userInfo = $_POST;
		$errMsg['userName'] = formatErrorMsg($this->validate->checkUname($userInfo['userName']));
		$errMsg['password'] = formatErrorMsg($this->validate->checkPasswords($userInfo['password'], $userInfo['confirmPassword']));
		$errMsg['firstName'] = formatErrorMsg($this->validate->checkBlank($userInfo['firstName']));
		$errMsg['lastName'] = formatErrorMsg($this->validate->checkBlank($userInfo['lastName']));
		$errMsg['email'] = formatErrorMsg($this->validate->checkEmail($userInfo['email']));
		$errMsg['code'] = formatErrorMsg($this->validate->checkCaptcha($userInfo['code']));
		if(!$this->validate->flagErr){
			if (!$this->__checkUserName($userInfo['userName'])) {
				if (!$this->__checkEmail($userInfo['email'])) {
										
					# format values					
					$sql = "insert into users
							(utype_id,username,password,first_name,last_name,email,created,status) 
							values
							(2,'".addslashes($userInfo['userName'])."','".md5($userInfo['password'])."',
							'".addslashes($userInfo['firstName'])."','".addslashes($userInfo['lastName'])."','".addslashes($userInfo['email'])."',UNIX_TIMESTAMP(),1)";
					$this->db->query($sql);					
					$this->render('common/registerconfirm');
					exit;
				}else{
					$errMsg['email'] = formatErrorMsg($_SESSION['text']['login']['emailexist']);
				}
			}else{
				$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']['usernameexist']);
			}
		}
		$this->set('errMsg', $errMsg);
		$this->register();
	}
	
	# function for logout
	function logout(){
	    Session::destroySession();
		redirectUrl(SP_WEBPATH."/login.php");
	}
	
	# func to show users
	function listUsers($info=''){
		
	    $info['pageno'] = intval($info['pageno']);
		$sql = "select * from users where utype_id=2 order by username";
		
		# pagination setup		
		$this->db->query($sql, true);
		$this->paging->setDivClass('pagingdiv');
		$this->paging->loadPaging($this->db->noRows, SP_PAGINGNO);
		$pagingDiv = $this->paging->printPages('users.php', '', 'scriptDoLoad', 'content', 'layout=ajax');		
		$this->set('pagingDiv', $pagingDiv);
		$sql .= " limit ".$this->paging->start .",". $this->paging->per_page;
		
		$userList = $this->db->select($sql);
		$this->set('userList', $userList);
		$this->set('pageNo', $info['pageno']);			
		$this->render('user/list', 'ajax');
	}
	
	# func to change status
	function __changeStatus($userId, $status){
		
		$userId = intval($userId);
		$sql = "update users set status=$status where id=$userId";
		$this->db->query($sql);
		
		# deaactivate all websites under this user
		if(empty($status)){
			$websiteCtrler = New WebsiteController();
			$websiteList = $websiteCtrler->__getAllWebsites($userId);
			foreach ($websiteList as $websiteInfo){
				$websiteCtrler->__changeStatus($websiteInfo['id'], 0);
			}
		}
	}
	
	# func to change status
	function __deleteUser($userId){
		
		$userId = intval($userId);
		$sql = "delete from users where id=$userId";
		$this->db->query($sql);
		
		$sql = "select id from websites where user_id=$userId";
		$webisteList = $this->db->select($sql);
		$webisteCtrler = New WebsiteController();
		foreach($webisteList as $webisteInfo){
			$webisteCtrler->__deleteWebsite($webisteInfo['id']);
		}
	}
	
	function newUser(){		
		
		$this->render('user/new', 'ajax');
	}
	
	function __checkUserName($username){
		$sql = "select id from users where username='$username'";
		$userInfo = $this->db->select($sql, true);
		return empty($userInfo['id']) ? false :  $userInfo['id'];
	}
	
	function __checkEmail($email){
		
		$sql = "select id from users where email='".addslashes($email)."'";
		$userInfo = $this->db->select($sql, true);
		return empty($userInfo['id']) ? false :  $userInfo['id'];
	}
	
	function __getUserInfo($userId){
		
		$userId = intval($userId);
		$sql = "select * from users where id=$userId";
		$userInfo = $this->db->select($sql, true);
		return empty($userInfo['id']) ? false :  $userInfo;
	}
	
	# get admin user details
	function __getAdminInfo(){
		$sql = "select * from users where utype_id=1";
		$userInfo = $this->db->select($sql, true);
		return empty($userInfo['id']) ? false :  $userInfo;
	}
	
	#function to get all users	
	function __getAllUsers($active=1,$admin=true){
		$sql = "select * from users where status=$active";
		$sql .= $admin ? "" : " and utype_id!=1";
		$sql .= " order by username"; 
		$userList = $this->db->select($sql);
		return $userList;
	}
	
	#function to get all users having website	
	function __getAllUsersHavingWebsite($active=1,$admin=true){
		$sql = "select u.* from users u,websites w where w.user_id=u.id and u.status=$active and w.status=1";
		$sql .= $admin ? "" : " and utype_id!=1";
		$sql .= " group by u.id order by username"; 
		$userList = $this->db->select($sql);
		return $userList;
	}
	
	function createUser($userInfo){
	    $userInfo = sanitizeData($userInfo);
		$this->set('post', $userInfo);
		$errMsg['userName'] = formatErrorMsg($this->validate->checkUname($userInfo['userName']));
		$errMsg['password'] = formatErrorMsg($this->validate->checkPasswords($userInfo['password'], $userInfo['confirmPassword']));
		$errMsg['firstName'] = formatErrorMsg($this->validate->checkBlank($userInfo['firstName']));
		$errMsg['lastName'] = formatErrorMsg($this->validate->checkBlank($userInfo['lastName']));
		$errMsg['email'] = formatErrorMsg($this->validate->checkEmail($userInfo['email']));
		if(!$this->validate->flagErr){
			if (!$this->__checkUserName($userInfo['userName'])) {
				if (!$this->__checkEmail($userInfo['email'])) {
					$sql = "insert into users(utype_id,username,password,first_name,last_name,email,created,status) 
							values(2,'".addslashes($userInfo['userName'])."','".md5($userInfo['password'])."','".addslashes($userInfo['firstName'])."','".addslashes($userInfo['lastName'])."','".addslashes($userInfo['email'])."',UNIX_TIMESTAMP(),1)";
					$this->db->query($sql);
					$this->listUsers('ajax');
					exit;
				}else{
					$errMsg['email'] = formatErrorMsg($_SESSION['text']['login']['emailexist']);
				}
			}else{
				$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']['usernameexist']);
			}
		}
		$this->set('errMsg', $errMsg);
		$this->newUser();
	}
	
	function editUser($userId, $userInfo=''){		
		
		if(!empty($userId)){
			if(empty($userInfo)){
				$userInfo = $this->__getUserInfo($userId);
				$userInfo['userName'] = $userInfo['username'];
				$userInfo['firstName'] = $userInfo['first_name'];
				$userInfo['lastName'] = $userInfo['last_name'];
				$userInfo['oldName'] = $userInfo['username'];
				$userInfo['oldEmail'] = $userInfo['email'];
			}
			
			$userInfo['password'] = '';					
			$this->set('post', $userInfo);			
			$this->render('user/edit', 'ajax');
			exit;
		}
		$this->listUsers('ajax');		
	}
	
	function updateUser($userInfo){
	    $userInfo = sanitizeData($userInfo);
		$userInfo['id'] = intval($userInfo['id']);
		$this->set('post', $userInfo);
		$errMsg['userName'] = formatErrorMsg($this->validate->checkUname($userInfo['userName']));
		if(!empty($userInfo['password'])){
			$errMsg['password'] = formatErrorMsg($this->validate->checkPasswords($userInfo['password'], $userInfo['confirmPassword']));
			$passStr = "password = '".md5($userInfo['password'])."',";
		}
		$errMsg['firstName'] = formatErrorMsg($this->validate->checkBlank($userInfo['firstName']));
		$errMsg['lastName'] = formatErrorMsg($this->validate->checkBlank($userInfo['lastName']));
		$errMsg['email'] = formatErrorMsg($this->validate->checkEmail($userInfo['email']));
		if(!$this->validate->flagErr){
			
			if($userInfo['userName'] != $userInfo['oldName']){
				if ($this->__checkUserName($userInfo['userName'])) {
					$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']['usernameexist']);
					$this->validate->flagErr = true;
				}
			}
			
			if($userInfo['email'] != $userInfo['oldEmail']){
				if ($this->__checkEmail($userInfo['email'])) {
					$errMsg['email'] = formatErrorMsg($_SESSION['text']['login']['emailexist']);
					$this->validate->flagErr = true;
				}
			}
			
			if (!$this->validate->flagErr) {
				$sql = "update users set
						username = '".addslashes($userInfo['userName'])."',
						first_name = '".addslashes($userInfo['firstName'])."',
						last_name = '".addslashes($userInfo['lastName'])."',
						$passStr
						email = '".addslashes($userInfo['email'])."'
						where id={$userInfo['id']}";
				$this->db->query($sql);
				$this->listUsers('ajax');
				exit;
			}
		}
		$this->set('errMsg', $errMsg);
		$this->editUser($userInfo['id'], $userInfo);
	}
	
	function showMyProfile($userInfo=''){
		$userId = isLoggedIn();		
		if(!empty($userId)){
			if(empty($userInfo)){
				$userInfo = $this->__getUserInfo($userId);
				
				$userInfo['userName'] = $userInfo['username'];
				$userInfo['firstName'] = $userInfo['first_name'];
				$userInfo['lastName'] = $userInfo['last_name'];
				$userInfo['oldName'] = $userInfo['username'];
				$userInfo['oldEmail'] = $userInfo['email'];
			}
			
			$userInfo['password'] = '';					
			$this->set('post', $userInfo);			
			$this->render('user/editmyprofile', 'ajax');
			exit;
		}	
	}
	
	function updateMyProfile($userInfo){
		$userInfo = sanitizeData($userInfo);
		$userId = isLoggedIn();	
		$this->set('post', $userInfo);
		$errMsg['userName'] = formatErrorMsg($this->validate->checkUname($userInfo['userName']));
		if(!empty($userInfo['password'])){
			$errMsg['password'] = formatErrorMsg($this->validate->checkPasswords($userInfo['password'], $userInfo['confirmPassword']));
			$passStr = "password = '".md5($userInfo['password'])."',";
		}
		$errMsg['firstName'] = formatErrorMsg($this->validate->checkBlank($userInfo['firstName']));
		$errMsg['lastName'] = formatErrorMsg($this->validate->checkBlank($userInfo['lastName']));
		$errMsg['email'] = formatErrorMsg($this->validate->checkEmail($userInfo['email']));
		if(!$this->validate->flagErr){
			
			if($userInfo['userName'] != $userInfo['oldName']){
				if ($this->__checkUserName($userInfo['userName'])) {
					$errMsg['userName'] = formatErrorMsg($_SESSION['text']['login']['usernameexist']);
					$this->validate->flagErr = true;
				}
			}
			
			if($userInfo['email'] != $userInfo['oldEmail']){
				if ($this->__checkEmail($userInfo['email'])) {
					$errMsg['email'] = formatErrorMsg($_SESSION['text']['login']['emailexist']);
					$this->validate->flagErr = true;
				}
			}
			
			if (!$this->validate->flagErr) {
				$sql = "update users set
						username = '".addslashes($userInfo['userName'])."',
						first_name = '".addslashes($userInfo['firstName'])."',
						last_name = '".addslashes($userInfo['lastName'])."',
						$passStr
						email = '".addslashes($userInfo['email'])."'
						where id=$userId";
				$this->db->query($sql);
				$this->set('msg', $this->spTextUser['Saved My Profile Details']);
				$this->showMyProfile();
				exit;
			}
		}
		$this->set('errMsg', $errMsg);
		$this->showMyProfile($userInfo);
	}
}
?>