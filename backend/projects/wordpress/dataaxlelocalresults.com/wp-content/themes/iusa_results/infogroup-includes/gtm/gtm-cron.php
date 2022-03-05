<?php

// add new cron intervals
function add_new_intervals($schedules) {

	$schedules['weekly'] = array(
		'interval' => 604800,
		'display' => __('Weekly')
	);

	$schedules['monthly'] = array(
		'interval' => 2635200,
		'display' => __('Monthly')
	);

	return $schedules;
}

add_filter('cron_schedules', 'add_new_intervals');


//schedule cron event to update local GTM file
function cron_schedule_activation() {

	if (!wp_next_scheduled('refresh_local_gtm')) {

		wp_schedule_event(current_time('timestamp'), 'hourly', 'refresh_local_gtm');

	}

}

add_action('wp', 'cron_schedule_activation');

// fetch remote gtm.js and create a local, cachable copy of it
function refresh_local_gtm_file() {

	$remoteGTM = file_get_contents('https://www.googletagmanager.com/gtm.js?id=GTM-' . GTMID);

	$remoteGTMnoScript = file_get_contents('https://www.googletagmanager.com/ns.html?id=GTM-' . GTMID);

	file_put_contents(get_template_directory() . '/gtm/gtm.js', $remoteGTM);

	file_put_contents(get_template_directory() . '/gtm/ns.html', $remoteGTMnoScript);
	
}

add_action('refresh_local_gtm', 'refresh_local_gtm_file');

?>