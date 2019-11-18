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
    	 
    	$this->serviceList = [
    		"google" => [
    			"label" => "Google My Business",
    			"regex" => [
    				"reviews" => '/<ol><div class="g.*> ([0-9.,]+) reviews<\/span>/is',
    				"rating" => '/<ol><div class="g.*>(\d+\.\d+)<\/span>/is',
    			],
    		    "url_part" => '?hl=en',
    		    'example' => ['https://www.google.com/search?q=kfc+Damrak']
    		],
    	    "glassdoor" => [
    	        "label" => "Glassdoor",
    	        "regex" => [
    	            "reviews" => '/(\d.*?)/is',
    	            "rating" => '/(\d.*?)/is',
    	        ],
    	    ],
    	];
    	
    	parent::__construct();
    }
    
}
?>