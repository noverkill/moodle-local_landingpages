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
 * Global settings form.
 *
 * @package    local
 * @subpackage landingpages
 * @copyright  2013 Gerry G Hall
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/lib/formslib.php');


class local_landingpages_form extends moodleform {

    // Define the form
    public function definition () {
        $mform =& $this->_form;
        
        $mform->addElement('checkbox', 'enabled', null, get_string('enabled', 'local_landingpages'));
        $mform->setDefault('enabled', 1);

		$mform->addElement('checkbox', 'showredirecterror', null, get_string('showredirecterror', 'local_landingpages'));
	    $mform->setDefault('showredirecterror', 1);	
		$mform->addHelpButton('showredirecterror', 'showredirecterror', 'local_landingpages');
		
		$mform->addElement('text', 'userlogindelay', get_string('userlogindelay', 'local_landingpages'));
		$mform->addHelpButton('userlogindelay', 'userlogindelay', 'local_landingpages');
		$mform->setType('userlogindelay', PARAM_INT);
        $mform->addRule('userlogindelay', null, 'required');
		$mform->setDefault('userlogindelay', 5);	
        $this->add_action_buttons();
    }

    public function validation($data, $files) {
        global $COURSE, $DB, $CFG;

        $errors = parent::validation($data, $files);

        return $errors;
    }

}
