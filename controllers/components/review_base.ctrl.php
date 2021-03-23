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

# class defines all review base service configurations
class ReviewBase extends Controller {
    
    var $serviceList;
    
    function __construct() {
        $engineList = Spider::getCrawlEngineCategoryList("review");
    	$this->serviceList = [
    		"google" => [
    			"label" => "Google My Business",
    			"regex" => [
    			    "reviews" => $engineList['google']['regex1'],
    			    "rating" => $engineList['google']['regex2'],
    			],
    		    "url_part" => '?hl=en',
    		    'example' => ['https://www.google.com/search?q=kfc+Damrak']
    		],
    	    "glassdoor" => [
    	        "label" => "Glassdoor",
    	        "regex" => [
    	            "reviews" => $engineList['glassdoor']['regex1'],
    	            "rating" => $engineList['glassdoor']['regex2'],
    	        ],
    		    'example' => ['https://www.glassdoor.com/Overview/Working-at-Google-EI_IE9079.11,17.htm']
    	    ],
    	];
    	
    	parent::__construct();
    }
    
}
?>