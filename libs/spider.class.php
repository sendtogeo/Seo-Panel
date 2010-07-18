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

class Spider{

	# settings of the spider
	var $_CURL_RESOURCE = null;	
	var $_CURLOPT_FAILONERROR = false;	
	var $_CURLOPT_FOLLOWLOCATION = true;	
	var $_CURLOPT_RETURNTRANSFER = true;	
	var $_CURLOPT_TIMEOUT = 15;	
	var $_CURLOPT_POST = true;
	var $_CURLOPT_POSTFIELDS = null;
	var $_CURLOPT_USERAGENT = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)";
	var $_CURLOPT_USERPWD = null;
	var $_CURLOPT_COOKIEJAR = '';
	var $_CURLOPT_COOKIEFILE = '';
	var $_CURLOPT_REFERER = "";
	var $_CURL_sleep = 1;
	var $_CURLOPT_COOKIE = "";
	var $_CURLOPT_HEADER = 0;

	# spider constructor
	function Spider()	{			
		$this -> _CURLOPT_COOKIEJAR = SP_TMPPATH.'/'.$this -> _CURLOPT_COOKIEJAR;
		$this -> _CURLOPT_COOKIEFILE = SP_TMPPATH.'/'.$this -> _CURLOPT_COOKIEFILE;		
		$this -> _CURL_RESOURCE = curl_init( );
		if(!empty($_SERVER['HTTP_USER_AGENT'])) $this->_CURLOPT_USERAGENT = $_SERVER['HTTP_USER_AGENT'];  				
	}	
	
	# func to format urls
	function formatUrl($url){
		$scheme = "";
		if(stristr($url,'http://')){
			$scheme = "http://";
		}elseif(stristr($url,'https://')){
			$scheme = "https://";			
		}
		$url = str_replace(array('http://','https://'), '',$url);
		$url = preg_replace('/\/{2,}/', '/', $url);
		$url = preg_replace('/&{2,}/', '&', $url);
		$url = preg_replace('/#{2,}/', '#', $url);
		return $scheme.$url;
	}
	
	# func to get unique urls of a page
	function getUniqueUrls($url){
				
		$ret = $this->getContent($url);
		$urlList = array();
		
		if( !empty($ret['page'])){
			$string = strtolower($ret['page']);
			$string = str_replace("\n","",$string);
					
			$pattern = "/<a (.*)>(.*\n*.*|.*\n*)<\/a>/U";	
			preg_match_all($pattern,$string,$matches, PREG_PATTERN_ORDER);
			for($i=0;$i<count($matches[1]);$i++){
				$href = $this->getTagParam("href",$matches[1][$i]);
				$href = preg_replace('/\/{3}/', '/', $href);
				if(!empty($href)){
					if( !preg_match( '/mailto:/', $href ) && ($href!="#") && !preg_match( '/javascript:|;/', $href ) ){
						if($href != "/"){
							$urlList[] = $href;							
						}
					}
				}
			}			
		}
		return $urlList;
	}

	# function to get value of a parameter in a tag
	function getTagParam($param, $tag){
		preg_match_all("|$param\=\"(.*)\"|U",$tag,$matches, PREG_PATTERN_ORDER);
		if(isset($matches[1][0])  && $matches[1][0] == ""){
			preg_match_all("|$param\=(.*)|U",$tag,$matches, PREG_PATTERN_ORDER);
		}
		if( isset($matches[1][0]) &&  $matches[1][0]=="" ){
			preg_match_all("|$param\=\'(.*)\'|U",$tag,$matches, PREG_PATTERN_ORDER);
		}
		if(isset($matches[1][0])) return $matches[1][0] ;
	}
	
	# get contents of a web page	
	function getContent( $url )	{
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_URL , $url );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_FAILONERROR , $this -> _CURLOPT_FAILONERROR );
		#curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_FOLLOWLOCATION , $this -> _CURLOPT_FOLLOWLOCATION );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_RETURNTRANSFER , $this -> _CURLOPT_RETURNTRANSFER );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_TIMEOUT , $this -> _CURLOPT_TIMEOUT );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_COOKIEJAR , $this -> _CURLOPT_COOKIEJAR );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_COOKIEFILE , $this -> _CURLOPT_COOKIEFILE );
		curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_HEADER , $this -> _CURLOPT_HEADER);
		if(!empty($this -> _CURLOPT_COOKIE)) curl_setopt( $this -> _CURL_RESOURCE, CURLOPT_COOKIE , $this -> _CURLOPT_COOKIE );
		if(!empty($this-> _CURLOPT_REFERER)){
			curl_setopt($this -> _CURL_RESOURCE, CURLOPT_REFERER, $this-> _CURLOPT_REFERER); 
		}
		
		
		if( strlen( $this -> _CURLOPT_POSTFIELDS ) > 1 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_POST , $this -> _CURLOPT_POST );
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_POSTFIELDS , $this -> _CURLOPT_POSTFIELDS );
		}

		if( strlen( $this -> _CURLOPT_USERAGENT ) > 0 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_USERAGENT, $this -> _CURLOPT_USERAGENT );
		}

		if( strlen( $this -> _CURLOPT_USERPWD ) > 2 ) {
			curl_setopt( $this -> _CURL_RESOURCE , CURLOPT_USERPWD, $this -> _CURLOPT_USERPWD );
		}
			
		$ret['page'] = curl_exec( $this -> _CURL_RESOURCE );
		$ret['error'] = curl_errno( $this -> _CURL_RESOURCE );
		$ret['errmsg'] = curl_error( $this -> _CURL_RESOURCE );

		return $ret;
	}
	
	# func to get session id
	function getSessionId($page){
		if (preg_match('/PHPSESSID=(.*?);/', $page, $result)) {
			return $result[1];
		} else {
			return false;
		}
	}
}
?>
