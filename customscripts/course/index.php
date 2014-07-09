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
 * Use custom My Moodle page instead of the standard one
 *
 * note that in order for this to execute correctly the following line is required in config.php
 * $CFG->customscripts = '/yourmoodlepath/local/customscripts/';
 *
 */
$config = get_config('local_landingpages');
//make sure the redirect is enabled
if(	$config->enabled == 1 ) {
	$id = optional_param('categoryid', NULL, PARAM_INT); // Category id
	GlOBAL $DB;
	// make sure we have a caegory id
    if (!empty($id)) {
	// if the user has landingpage:categoryedit then do nothing allowing them to access the normal category layout  
		if(!has_capability('local/landingpage:categoryedit', context_coursecat::instance($id))) {		
			$sql = 
				'SELECT
					`c`.`id`,
					`c`.`idnumber`
				FROM 
					mdl_course_categories cat
				INNER JOIN 
					mdl_course c  
				ON 
					`cat`.`idnumber` = `c`.`idnumber` 
				WHERE 
					`cat`.`id` = ?
				LIMIT 1';

			$result =reset($DB->get_records_sql_menu($sql,array($id)));
			if (!empty($result)){
				//redirect to a course as a matching has been found
				redirect(new moodle_url('/course/view.php', array('idnumber' => $result)));
			}
		}
	}
}

?>
