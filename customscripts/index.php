<?php
$config = get_config('local_landingpages');
if(isset($USER->profile['landingpage'])){
	if($config->enabled == 1) { 
		$landingpage = $USER->profile['landingpage'];
		if (($USER->currentlogin + $config->userlogindelay) > time()){
			if(!empty($landingpage)){
				if($course = $DB->get_record('course', array('idnumber' => $landingpage) ) ) {
					if(is_enrolled(get_context_instance(CONTEXT_COURSE, $course->id), $USER->id)) {
						redirect(new moodle_url('/course/view.php', array('id' => $course->id)));
					} else {
						if($config->showredirecterror) {
							echo $OUTPUT->header();
							echo $OUTPUT->heading(get_string('user_redirect_enrol_error_title', 'local_landingpages'), 2);
							echo $OUTPUT->box_start();
							echo html_writer::tag('p');
							echo get_string('user_redirect_enrol_error_desc', 'local_landingpages');
							echo html_writer::end_tag('p');
							echo $OUTPUT->box_end();
							echo $OUTPUT->footer();
						exit;
						}
					}

				}
			}	
		}
	}
}

