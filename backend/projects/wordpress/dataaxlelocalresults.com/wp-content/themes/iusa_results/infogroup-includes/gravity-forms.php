<?php

	session_start();	
	
	$currentURL = 'https://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
	
	if (!isset($_SESSION['initial_page_ID'])) {
	
		$_SESSION['initial_page_ID'] = url_to_postid($currentURL);
	
	}
	
	function custom_gravity_form_email_notification($notification, $form, $entry) {
	
		$notification['to'] .= ',' . get_post_meta($_SESSION['initial_page_ID'], 'ecpt_w2lccemailaddresses', true);
	
		return $notification;
	
	}
	
	if (get_post_meta($_SESSION['initial_page_ID'], 'ecpt_w2lccemailaddresses', true)) {
	
		add_filter('gform_notification_3', 'custom_gravity_form_email_notification', 10, 3);
	
	}	

?>