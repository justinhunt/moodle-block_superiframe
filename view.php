<?php

///////////////////////////////////////////////////////////////////////////
//                                                                       //
// This file is part of Moodle - http://moodle.org/                      //
// Moodle - Modular Object-Oriented Dynamic Learning Environment         //
//                                                                       //
// Moodle is free software: you can redistribute it and/or modify        //
// it under the terms of the GNU General Public License as published by  //
// the Free Software Foundation, either version 3 of the License, or     //
// (at your option) any later version.                                   //
//                                                                       //
// Moodle is distributed in the hope that it will be useful,             //
// but WITHOUT ANY WARRANTY; without even the implied warranty of        //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         //
// GNU General Public License for more details.                          //
//                                                                       //
// You should have received a copy of the GNU General Public License     //
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.       //
//                                                                       //
///////////////////////////////////////////////////////////////////////////

/**
 * Block SuperiFrame view.php
 * @package   block_superiframe
 * @copyright 2016 Justin Hunt (poodllsupport@gmail.com)
 * @author    Justin Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
require('../../config.php');
require_once('../../lib/moodlelib.php');

//fetch the size of the iframe
$size = optional_param('size','medium',PARAM_TEXT);

//set the url of the $PAGE
//note we do this before require_login preferably
$PAGE->set_url('/blocks/superiframe/view.php',array('size'=>$size));
require_login();

//get our config
$def_config = get_config('block_superiframe');

$usercontext = context_user::instance($USER->id);
$PAGE->set_course($COURSE);

$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout($def_config->pagelayout);
$PAGE->set_title(get_string('pluginname', 'block_superiframe'));
$PAGE->navbar->add(get_string('pluginname', 'block_superiframe'));

$renderer = $PAGE->get_renderer('block_superiframe');

switch($size){
	case 'custom':  
		$width = $def_config->width; 
		$height = $def_config->height;
		break;
	case 'small':
		$width = 360; 
		$height = 240;
		break;
	case 'medium':
		$width = 800; 
		$height = 600;
		break;
	case 'big':
		$width = 1024; 
		$height = 768;
		break;
	


}

$renderer->display_view_page($def_config->url, $width, $height);

return;


	