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
 * Settings details.
 *
 * @package    local
 * @subpackage landingpages
 * @copyright  Gerry G Hall
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

global $PAGE;

if ($hassiteconfig) { // needs this condition or there is error on login page
    

$ADMIN->add('appearance', new admin_category('landingsettings_category', get_string('landingsettings_category', 'local_landingpages')));

	$ADMIN->add('landingsettings_category', new admin_externalpage('local_landingpages',get_string('redirect_setting', 'local_landingpages'),new moodle_url('/local/landingpages/index.php')));


}

