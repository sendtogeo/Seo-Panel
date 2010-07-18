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

# class defines all settings controller functions
class SettingsController extends Controller{
	
	var $layout = 'ajax';
	
	function showSystemSettings() {
		$this->set('sectionHead', 'System Settings');
		
		$this->set('list', $this->__getAllSettings());
		$this->render('settings/showsettings');
	}
	
	function updateSystemSettings($postInfo) {
		$this->set('sectionHead', 'System Settings');
		
		$setList = $this->__getAllSettings();
		foreach($setList as $setInfo){

			switch($setInfo['set_name']){
				
				case "SP_PAGINGNO":
					$postInfo[$setInfo['set_name']] = intval($postInfo[$setInfo['set_name']]);
					$postInfo[$setInfo['set_name']] = empty($postInfo[$setInfo['set_name']]) ? SP_PAGINGNO_DEFAULT : $postInfo[$setInfo['set_name']];				
					break;
				
				case "SP_CRAWL_DELAY":
				case "SP_USER_GEN_REPORT":
					$postInfo[$setInfo['set_name']] = intval($postInfo[$setInfo['set_name']]);
					break;
					
			}
			
			$sql = "update settings set set_val='".addslashes($postInfo[$setInfo['set_name']])."' where set_name='{$setInfo['set_name']}'";
			$this->db->query($sql);
		}
		
		$this->set('list', $this->__getAllSettings());
		$this->set('saved', 1);
		$this->render('settings/showsettings');
	}
	
}
?>