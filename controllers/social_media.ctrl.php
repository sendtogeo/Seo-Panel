<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	           *
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

# class defines all social media controller functions
class SocialMediaController extends Controller{
    
    var $linkTable = "social_media_links";
    var $linkReportTable = "social_media_link_results";
    var $layout = "ajax";
    var $pageScriptPath = 'social_media.php';
    var $serviceList;
    
    function __construct() {
    	 
    	$this->serviceList = [
    		"facebook" => [
    			"label" => "Facebook",
    			"regex" => "",
    		],
    		"twitter" => [
    			"label" => "Twitter",
    			"regex" => "",
    		],
    		"instagram" => [
    			"label" => "Instagram",
    			"regex" => "",
    		],
    		"linkedin" => [
    			"label" => "LinkedIn",
    			"regex" => "",
    		],
    		"pinterest" => [
    			"label" => "Pinterest",
    			"regex" => "",
    		],
    		"youtube" => [
    			"label" => "Youtube",
    			"regex" => "",
    		],
    	];
    
    	$this->set('pageScriptPath', $this->pageScriptPath);
    	$this->set( 'serviceList', $this->serviceList );
    	
    	parent::__construct();
    }
    
    function showSocialMediaLinks($searchInfo = '') {

    	$userId = isLoggedIn();
    	$this->set('searchInfo', $searchInfo);
    	$sql = "select l.*, w.name as website_name from $this->linkTable l, websites w where l.website_id=w.id";
    	
    	// search conditions
    	$sql .= !empty($searchInfo['name']) ? " and l.name like '%".addslashes($searchInfo['name'])."%'" : "";
    	$sql .= !empty($searchInfo['website_id']) ? " and l.website_id=".intval($searchInfo['website_id']) : "";
    	$sql .= !empty($searchInfo['service_name']) ? " and `type`='".addslashes($searchInfo['service_name'])."'" : "";
    	
    	if (!empty($searchInfo['status'])) {
    	    $sql .= ($searchInfo['status'] == 'active') ? " and l.status=1" : " and l.status=0"; 
    	}
    	
    	$webSiteCtrler = new WebsiteController();
    	$websiteList = $webSiteCtrler->__getAllWebsites($userId, true);
    	$this->set( 'websiteList', $websiteList );
    	 
    	// pagination setup
    	$this->db->query( $sql, true );
    	$this->paging->setDivClass( 'pagingdiv' );
    	$this->paging->loadPaging( $this->db->noRows, SP_PAGINGNO );
    	$pagingDiv = $this->paging->printPages( $this->pageScriptPath, 'searchForm', 'scriptDoLoadPost', 'content', '' );
    	$this->set( 'pagingDiv', $pagingDiv );
    	$sql .= " limit " . $this->paging->start . "," . $this->paging->per_page;
    	 
    	$linkList = $this->db->select( $sql );
    	$this->set( 'list', $linkList );
    	$this->set( 'pageNo', $_GET ['pageno'] );
    	$this->render( 'socialmedia/show_social_media_links');
    }
    
    function newSocialMediaLink($info = '') {        
        $this->set('post', $info);
        $webSiteCtrler = new WebsiteController();
        $websiteList = $webSiteCtrler->__getAllWebsites($userId, true);
        $this->set( 'websiteList', $websiteList );
                
        $this->set('editAction', 'createSocialMediaLink');
        $this->render( 'socialmedia/edit_social_media_link');        
    }
    
    function createSocialMediaLink($info = '') {
        
        $this->newSocialMediaLink($info);
        
    }
	
}
?>