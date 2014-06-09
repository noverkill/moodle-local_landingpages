<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Inatall script for landingpage
 * Landing Pages needs a user profile field called landingpage which is used to setup where a user is redirected to
 * i.e 
 * @package      local
 * @subpackage   landingpage
 * @license      http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


function xmldb_local_landingpages_upgrade($oldversion =0) {
	
	GLOBAL $DB;
	if(!$DB->record_exists('user_info_field', array('shortname' => 'landingpage'))) {
		$dataobject = new stdClass();
		$dataobject->shortname = 'landingpage';
		$dataobject->name = 'Landing Page';
		$dataobject->datatype = 'menu';
		$dataobject->description = '';
		$dataobject->descriptionformat = 1;
		$dataobject->categoryid = 1;
		$dataobject->sortorder = 1;
		$dataobject->required = 0;
		$dataobject->locked = 0;
		$dataobject->visible = 2;
		$dataobject->forceunique = 0;
		$dataobject->signup = 1;
		$dataobject->defaultdata = '';
		$dataobject->defaultdataformat =0; 
		$dataobject->param1 = "\nSBCS\nEECS";	
		$DB->insert_record('user_info_field', $dataobject); 
	}
	return true;


}
