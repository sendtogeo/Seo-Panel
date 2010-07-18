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
include_once(SP_CTRLPATH."/directory.ctrl.php");
$controller = New DirectoryController();
$controller->view->menu = 'seotools';
$controller->layout = 'ajax';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['sec']){
		
		case "updatesiteinfo":
			$controller->saveSubmissiondata($_POST);
			break;
			
		case "submitsite":
			$controller->submitSite($_POST);
			break;		
			
		case "skipped":
			$controller->showSkippedDirectories($_POST);
			break;
			
		case "reports":
			$controller->showSubmissionReports($_POST);
			break;
			
		case "checksub":
			$controller->generateSubmissionReports($_POST);
			break;
			
		case "directorymgr":			
			$controller->showDirectoryManager($_POST);
			break;
			
		case "startdircheck":			
			$controller->startDirectoryCheckStatus($_POST);
			break;
		
		default:
			$controller->showWebsiteSubmissionPage($_POST);
			break;
	}
	
}else{
	switch($_GET['sec']){
		
		case "skip":
			$controller->skipSubmission($_GET);
			break;
		
		case "unskip":
			$controller->unSkipSubmission($_GET['id']);
			$controller->showSkippedDirectories($_GET);
			break;
		
		case "reload":
			$controller->startSubmission($_GET['website_id'], $_GET['dir_id']);
			break;
			
		case "reports":
			$controller->showSubmissionReports($_GET);
			break;
			
		case "skipped":
			$controller->showSkippedDirectories($_GET);
			break;
			
		case "checksub":
			$controller->checkSubmissionReports($_GET);
			break;
			
		case "delete":
			$controller->deleteSubmissionReports($_GET['id']);
			break;
		
		case "changeconfirm":
			$controller->changeConfirmStatus($_GET);
			$controller->showConfirmStatus($_GET['id']);
			break;
			
		case "checkstatus":
			$status = $controller->checkSubmissionStatus($_GET);
			$controller->updateSubmissionStatus($_GET['id'], $status);
			$controller->showSubmissionStatus($_GET['id']);
			break;
			
		case "featured":
			$controller->showFeaturedSubmission();
			break;
			
		case "directorymgr":			
			$controller->showDirectoryManager($_GET);
			break;
			
		case "dirstatus":			
			$controller->changeStatusDirectory($_GET['dir_id'], $_GET['status'], true);
			break;
			
		case "showcheckdir":			
			$controller->showCheckDirectory();
			break;
			
		case "startdircheck":			
			$controller->startDirectoryCheckStatus($_GET);
			break;
			
		case "checkdir":			
			$controller->checkDirectoryStatus($_GET['dir_id'], $_GET['nodebug']);
			break;
			
		case "checkcaptcha":
			$_SESSION['no_captcha'] = $_GET['no_captcha'];
			break;
		
		default:
			$controller->showSubmissionPage();
			break;
	}
}

?>