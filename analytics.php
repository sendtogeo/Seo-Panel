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

include_once("includes/sp-load.php");
checkLoggedIn();

// check for access to seo tool
// isUserHaveAccessToSeoTool("webmaster-tools");

include_once(SP_CTRLPATH."/analytics.ctrl.php");
$controller = New AnalyticsController();
$controller->view->menu = 'seotools';
$controller->layout = 'ajax';
$controller->spTextTools = $controller->getLanguageTexts('seotools', $_SESSION['lang_code']);
$controller->set('spTextTools', $controller->spTextTools);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['sec']) {
	}
	
} else {
	
	switch($_GET['sec']) {

	    case "report_generate":
		    $userId = isLoggedIn();
			//$controller->getAnalyticsResults($userId, "", "2019-08-22", "2019-08-22");
			
		    //$controller->getAnalyticsResults($userId, "", "2018-05-24", "2018-05-24");
		    
		    //$result = $controller->storeWebsiteAnalytics(20, "2018-05-23");
		    
		    $result = $controller->storeWebsiteAnalytics(10, "2019-08-22");
		    
            debugVar($result);		   
		    
			break;
			
		default:
		    print "Inn";
		    
	}
	
}
?>