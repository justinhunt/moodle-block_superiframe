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
 * Block SuperiFrame renderer.
 * @package   block_superiframe
 * @copyright 2016 Justin Hunt (poodllsupport@gmail.com)
 * @author    Justin Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_superiframe_renderer extends plugin_renderer_base {	

	//In this function we fetch all the content that the goes in the block
	// and return it.
	function fetch_block_content(){
		global $CFG,$USER;
	 
		 $content = '';
		 $content .= '<br />' . get_string('welcomeuser','block_superiframe',$USER) . '<br />';
	
		$link = new moodle_url('/blocks/superiframe/view.php',array());
		$content .= html_writer::link($link, get_string('gotosuperiframe', 'block_superiframe'));

		return $content;
	}

    //this function aggregates all the pieces of content of the view page and displays them
    function display_view_page($url, $width, $height){
    	global $USER;
    	
		// start output to browser
		//always display the header first. 
		echo $this->output->header();
	
		//lets spice this top part up a bit soon
		echo '<br>' . fullname($USER);
		echo '<br>' . $this->output->user_picture($USER);

		//prepare our frame
		$iframe_atts = array();
        $iframe_atts['src']=$url;
        $iframe_atts['height']=$height;
        $iframe_atts['width']=$width;
        $iframe_atts['class']='block_superiframe_iframe';
        $iframe = html_writer::tag('iframe', '', $iframe_atts);
		echo '<br>' . $iframe;

		//send footer out to browser
		//never forget to do this ...!
		echo $this->output->footer();
    
    }

}
