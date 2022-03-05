<?php

function gravity_form_3_to_hubspot($entry, $form) {

	// Web to Lead | Contact Us - Gravity Form #3

	$firstName = $entry['1'];
	$lastName = $entry['2'];
	$businessName = $entry['3'];
	$businessPhone = $entry['4'];
	$emailAddress = $entry['5'];
	$howDidYouHearAboutUs = $entry['13'];
	$whatAreYouInterestedIn = $entry['7'];
	$createdBySystem = $entry['8'];
	$basDivision = $entry['10'];
	$pageURL = $entry['11'];

	// set HubSpot Forms API POST data
	$hs_context = array(
    	'hutk' => $_COOKIE['hubspotutk'],
    	'ipAddress' => $_SERVER['REMOTE_ADDR'],
    	'pageName' => get_the_title(url_to_postid($pageUrl))
	);

	$hs_context_json = json_encode($hs_context);	

	// init cURL
	$ch = curl_init();

	// set cURL options in array
	$options = array(
		CURLOPT_URL => 'https://forms.hubspot.com/uploads/form/v2/5267700/b3dd7ad8-b5c0-4f25-a51e-7ef44b63aeee',
		CURLOPT_POSTFIELDS => 'first_name=' . urlencode($firstName) . '&last_name=' . urlencode($lastName) . '&company=' . urlencode($businessName) . '&phone=' . urlencode($businessPhone) . '&email=' . urlencode($emailAddress) . '&what_are_you_interested_in_=' . urlencode($whatAreYouInterestedIn) . '&how_did_you_hear_about_us_' . urlencode($howDidYouHearAboutUs) . '&bas_division=' . urlencode($basDivision) . '&page_url=' . urlencode($pageUrl) . '&originating_system=iusa' . '&hs_context=' . urlencode($hs_context_json),
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => array(
        	'Content-Type: application/x-www-form-urlencoded'
        ),
        CURLOPT_RETURNTRANSFER => true,
    );
	
	// use above array of options in cURL request
	curl_setopt_array($ch, $options);

	// execute the cURL request
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);

}

if (CMS_ENVIRONMENT == 'PROD') {

	add_action('gform_after_submission_3', 'gravity_form_3_to_hubspot', 10, 2);

}

?>