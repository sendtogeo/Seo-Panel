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

# class defines all seo tools controller functions
class AdminPanelController extends Controller{	
	
	# index function
	function index($info = ""){
		
		$menuList[] = array(
						'id' => 1,
            			'name' => 'Website Manager',
            			'url_section' => 'websites'						
						);		
		if(isAdmin()){
			$menuList[] = array(
						'id' => 2,
            			'name' => 'User Manager',
            			'url_section' => 'users'						
						);
						
			$menuList[] = array(
						'id' => 3,
            			'name' => 'Reports Manager',
            			'url_section' => 'report-manager'						
						);			
			
			$menuList[] = array(
						'id' => 4,
            			'name' => 'Seo Tools Manager',
            			'url_section' => 'seo-tools-manager'						
						);
			
			$menuList[] = array(
						'id' => 5,
            			'name' => 'Seo Plugins Manager',
            			'url_section' => 'seo-plugin-manager'						
						);
						
			$menuList[] = array(
						'id' => 6,
            			'name' => 'Directory Manager',
            			'url_section' => 'directory-manager'						
						);
			$menuList[] = array(
						'id' => 7,
            			'name' => 'System Settings',
            			'url_section' => 'settings'						
						);
		}
		$menuList[] = array(
						'id' => 8,
            			'name' => 'My Profile',
            			'url_section' => 'my-profile'						
						);
		
		$menuSelected = empty($info['menu_selected']) ? 'websites' : $info['menu_selected']; 
		$this->set('menuList', $menuList);
		$this->set('menuSelected', $menuSelected);
		$startScript = empty($info['start_script']) ? "websites.php" : $info['start_script'];
		$this->set('startFunction', "scriptDoLoad('$startScript', 'content')");
		
		$this->render('adminpanel/adminpanel');
	}
}
?>