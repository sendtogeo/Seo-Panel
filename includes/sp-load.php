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

$abspath = getcwd();
$abspath = preg_replace('/\/includes$/', '', $abspath);
if (!file_exists($abspath."/config/sp-config.php")) {
   $abspath = dirname ( realpath ( __FILE__ ) );
   $abspath = preg_replace('/\/includes$/', '', $abspath);
}
define( 'SP_ABSPATH', $abspath );


if(file_exists(SP_ABSPATH."/config/sp-config.php")){
	
	# loads seo panel main config file
	include_once(SP_ABSPATH."/config/sp-config.php");
	
	if(!defined('SP_INSTALLED')){
		header('Location: install/');
		exit;
	}
	
	# check for curl with php 
	if (!function_exists('curl_init')) {
		print "
			<div style='margin:50px 250px;font-size:13px;border:1px solid black;padding:5px;line-height:30px;background-color:#f4f7fa;color:#da3838'>
			The <b>CURL is not Installed with PHP</b> in your <b>Server</b>.<br>
			Please <b>INSTALL</b> it by referring <br><a href='http://php.net/manual/en/curl.setup.php'>http://php.net/manual/en/curl.setup.php</a>  
			<br>or <br>Please <b>contact your web hosting provider to INSTALL</b> it.</div>";
		exit;
	}
	
	# checks for php short_open_tag 
	if (!ini_get('short_open_tag')) {
		print "
			<div style='margin:50px 200px;font-size:14px;border:1px solid black;padding:5px;line-height:30px;background-color:#f4f7fa;background-color:#f4f7fa;color:#da3838'>
			The <b>php.ini directive 'short_open_tag' is not enabled</b> in your Server.<br> 
			Please <b>enable</b> it from <b>php.ini</b> file by referring <br><a href='http://php.net/manual/en/ini.core.php'>http://php.net/manual/en/ini.core.php</a>  
			<br>or<br> Please <b>contact your web hosting provider to Enable</b> it.</div>";
		exit;
	}	
	
	# load seo panel extra config variables
	if(file_exists(SP_ABSPATH."/config/sp-config-extra.php")){
		include_once(SP_ABSPATH."/config/sp-config-extra.php");
	}

	# debug settings
	if (SP_DEBUG){
		@ini_set("display_erros", "On");
		@ini_set("display_startup_errors", "On");
		error_reporting(E_ALL ^ E_NOTICE);
	} else {
		@ini_set("display_erros", "Off");
		@ini_set("display_startup_errors", "Off");
		error_reporting(0);
	}

	# system settings
	define('SP_CONFPATH', SP_ABSPATH."/config");
	define('SP_CTRLPATH', SP_ABSPATH."/controllers");
	define('SP_INCPATH', SP_ABSPATH."/includes");
	define('SP_LIBPATH', SP_ABSPATH."/libs");
	define('SP_TMPPATH', SP_ABSPATH."/tmp");	
	define('SP_PLUGINPATH', SP_ABSPATH."/plugins");	
	define('SP_THEMEPATH', SP_ABSPATH."/themes");
	define('SP_DATAPATH', SP_ABSPATH."/install/data");
	define('SP_JSPATH', SP_WEBPATH."/js");
	define('SP_IMGPATH', SP_WEBPATH."/images");	
	
	#create database object	
	include_once(SP_LIBPATH."/database.class.php");
	$dbObj = New Database(DB_ENGINE);
	$dbConn = $dbObj->dbConnect();
	
	# web settings
	$sql = "select * from themes where status=1 order by id";
	$themeInfo = $dbConn->select($sql, true);
	$themeLocation = empty($themeInfo['folder']) ? "themes/classic" : "themes/".$themeInfo['folder'];
	define('SP_VIEWPATH', SP_ABSPATH."/$themeLocation/views");
	define('SP_CSSPATH', SP_WEBPATH."/$themeLocation/css");

	# to prevent sql injection
	if(!empty($_SERVER['REQUEST_METHOD']) && SP_PREVENT_SQL_INJECTION){
	    
	    # merge all post and get elements
        foreach (array_merge($_GET, $_POST) AS $name => $value) {
            
            # if not a numeric parameter
            if (is_string($value) && !empty($value) && !is_numeric($value)) {
               
                # Search for patterns in the value of the parameter that indicate an SQL injection
                $pattern = '/(and|or)[\s\(\)\/\*]+(update|delete|select)\W|(select|update).+\.(password|email)|(select|update|delete).+users|<script>|<\/script>/im';
                
                # replace all matched strings
                while (preg_match($pattern, $value)) {
                    if (isset($_GET[$name])) {
                        $value = $_GET[$name] = $_REQUEST[$name] = preg_replace($pattern, '', $value);
                    } else {
                        $value = $_POST[$name] = $_REQUEST[$name] = preg_replace($pattern, '', $value);
                    }
                }
            }
        }
    }
    
	# create super class object
	include_once(SP_LIBPATH."/seopanel.class.php");
	$seopanel = New Seopanel();
	$seopanel->loadSeoPanel();
		
}else{
	die("<p>The config file could not be found.</p><p><a href=\"install/index.php\">Click here to install Seo Panel.</a></p>");
}

?>
