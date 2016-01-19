<?php

/**
* Resume page functions
*/

// Professional experience function for the Resume page template
if ( ! function_exists( 'amplify_pro_exp' ) ) :
function amplify_pro_exp() {
	global $cfs;
	$jobs = $cfs->get('jobs');
	echo '<div class="jobs">';
	foreach ($jobs as $job) {
		echo '<div class="job clearfix">';	

				echo '<div class="clearfix">';	
				//Job info
				echo 	'<div class="job-info col-md-6 col-sm-6 col-xs-6">';
					if ( $job['position'] !='') {
						echo '<span class="job-position">';
						echo esc_html($job['position']);
						echo '</span>';
					}
					if ( $job['company_name']) {
						echo '<span class="company-name">';
						echo esc_html($job['company_name']);
						echo '</span>';
					}
					echo '</div>';

					//Job period
					echo '<div class="job-date col-md-6 col-sm-6 col-xs-6">';
					if ( $job['job_start_date'] ) {
						echo '<span class="animated zoomInUp">';
						echo esc_html($job['job_start_date']);
						echo '&nbsp;&#8594;&nbsp;';
						echo '</span>';
					}
					if ( $job['job_end_date']) {
						echo '<span>';
						echo esc_html($job['job_end_date']);
						echo '</span>';
					}
				echo 	'</div>';	
				echo '</div>';

				//Job description
				if ( $job['job_description']) {
					echo '<div class="job-description">';
					echo esc_textarea($job['job_description']);
					echo '</div>';
				}

		echo '</div>';
	}
	echo '</div>';
}
endif;

//Education function for the Resume page template
if ( ! function_exists( 'amplify_edu' ) ) :
function amplify_edu() {
	global $cfs;
	$schools = $cfs->get('education');
	echo '<div class="schools">';
	foreach ($schools as $school) {
		echo '<div class="school clearfix">';

			echo '<div class="clearfix">';	
				echo '<div class="school-info col-md-6 col-sm-6 col-xs-6">';
					if ( $school['school_name'] !='') {
						echo '<span class="school-name">';
						echo esc_html($school['school_name']);
						echo '</span>';
					}
					if ( $school['degree']) {
						echo '<span class="school-degree">';
						echo esc_html($school['degree']);
						echo '</span>';
					}
				echo '</div>';

				echo '<div class="school-date col-md-6 col-sm-6 col-xs-6">';
					if ( $school['school_start_date'] ) {
						echo '<span>';
						echo esc_html($school['school_start_date']);
						echo '&nbsp;<i class="fa fa-long-arrow-right"></i>&nbsp;';
						echo '</span>';
					}
					if ( $school['school_end_date']) {
						echo '<span>';
						echo esc_html($school['school_end_date']);
						echo '</span>';
					}
				echo '</div>';	
			echo '</div>';	

			if ( $school['school_description']) {
				echo '<div class="school-description">';
				echo esc_textarea($school['school_description']);
				echo '</div>';
			}				

		echo '</div>';
	}
	echo '</div>';	
}
endif;

//Skills function for the Resume page template
if ( ! function_exists( 'amplify_skills' ) ) :
function amplify_skills() {
	global $cfs;
	$skills = $cfs->get('skills');
	echo '<div class="skills">';
	foreach ($skills as $skill) {
		echo '<div class="skill clearfix">';
				if ( $skill['skill_name'] !='' || $skill['skill_value'] ) {
					echo '<div class="skillbar clearfix " data-percent="' . esc_html($skill['skill_value']) . '">';
						echo '<div class="skillbar-title"><span>' . esc_html($skill['skill_name']) . '</span></div>';
						echo '<div class="skillbar-bar"></div>';
						echo '<div class="skill-bar-percent">' . esc_html($skill['skill_value']) . '</div>';
					echo '</div>';
				}
		echo '</div>';
	}
	echo '</div>';	
}
endif;