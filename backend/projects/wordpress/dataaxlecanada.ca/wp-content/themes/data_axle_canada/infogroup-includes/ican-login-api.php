<?php

// set global variables to application URLs based on environment
if (CMS_ENVIRONMENT == 'DEV') {

	$iusaLoginAPIendpoint = 'http://dev-drone-srv.intra.infousa.com/SignIn';	

	$iusaAppEnvironmentDomain = 'dev-account-app.infousa.com';

} elseif (CMS_ENVIRONMENT == 'TEST') {

	$iusaLoginAPIendpoint = 'http://test-drone-srv.infousa.com/InfoUsaDataService.svc/SignIn';

	$iusaAppEnvironmentDomain = 'test-account-app.infousa.com';

} elseif (CMS_ENVIRONMENT == 'PROD') {

	$iusaLoginAPIendpoint = 'http://drone-srv.infousa.com/InfoUsaDataService.svc/SignIn';			

	$iusaAppEnvironmentDomain = 'account-app.infousa.com';

} else {

	return false;

}

// dynamically populate the password reset link
// field based on the current CMS environment
function iusa_login_password_reset_field($form) {

	global $iusaAppEnvironmentDomain;

	$fields = $form['fields'];

    foreach($form['fields'] as &$field) {

      if ($field->id == 4) {

        $field->content = '<a href="https://' . $iusaAppEnvironmentDomain . '/Authentication/ForgotPassword?bas_vendor=99911">Forgot your password?</a>';

      }

    }

    return $form;

}

add_filter('gform_pre_render_4', 'iusa_login_password_reset_field');

// check user's login credentials and login to IUSA
// if they are valid, otherwise return error message
function iusa_login_user($validation_result) {

	global $iusaLoginAPIendpoint;

	$form = $validation_result['form'];

	if ($validation_result['is_valid'] == false) {
		$validation_result['form'] = $form;
		return $validation_result;
	}

	// get the form fields data
	$entry = GFFormsModel::get_current_lead();		
		
	// build an array of data registration form fields
	$loginFormData = array(
		'AccountId' => $entry['1'],
		'Password' => $entry['2'],
		'VendorId' => $entry['3']
	);
		
	// convert above PHP array of data to JSON
	$loginFormDataJSON = json_encode($loginFormData);
		
	// init cURL
	$ch = curl_init();
	
	// cURL headers for IUSA Registration API
	$headers = array(
		'Content-Type: application/json'
	);
	
	// set cURL options in array for IUSA Registration API
	$options = array(
		CURLOPT_URL => $iusaLoginAPIendpoint,
		CURLOPT_HTTPHEADER => $headers,    	   
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $loginFormDataJSON,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false
    );
		
	// use above array of options in cURL request
	curl_setopt_array($ch, $options);
	
	// execute the cURL request
	$result = curl_exec($ch);
		
	$XMLresponse = new SimpleXMLElement($result);

	if ($XMLresponse->Status == 'UserDoesNotExist') {

		$validation_result['is_valid'] = false;

		foreach ($form['fields'] as &$field) {

	   		if ($field->id == '1') {
	    	   	$field->failed_validation  = true;
	    	   	$field->validation_message = 'The email address entered does not match a registered user. Please try again.';
	    	   	break;
	   		}           		

		}

		$validation_result['form'] = $form;
	
		return $validation_result;

	} elseif ($XMLresponse->Status == 'InvalidPassword') {

		$validation_result['is_valid'] = false;

		foreach ($form['fields'] as &$field) {

        	if ($field->id == '2') {
        	   	$field->failed_validation  = true;
        	   	$field->validation_message = 'Password does not match the username. Please try again or click the "Forgot your password?" link below to reset your password.';
        	   	break;
        	}           		

    	}

    	$validation_result['form'] = $form;
 
    	return $validation_result;

	} elseif ($XMLresponse->Status == 'Success') {

		setcookie('Sms.SessionId', $XMLresponse->SessionId, 0, '/', COOKIEDOMAIN, 0);

	}
					
	//close connection
	curl_close($ch);

	$validation_result['form'] = $form;
 
    return $validation_result;

}

add_action('gform_validation_4', 'iusa_login_user', 10, 2);

function iusa_login_confirmation($confirmation) {

	global $iusaAppEnvironmentDomain;

	if (CMS_ENVIRONMENT == 'DEV') {
		
		$iusaLoginRedirectURL = 'https://dev-core.infousa.com/MyAccount';
		
	} elseif (CMS_ENVIRONMENT == 'TEST') {
		
		$iusaLoginRedirectURL = 'https://test-core.infousa.com/MyAccount';		
		
	} elseif (CMS_ENVIRONMENT == 'PROD') {
		
		$iusaLoginRedirectURL = 'https://core.infousa.com/MyAccount';
		
	} else {
		
		return false;
		
	}

	$confirmation = array('redirect' => $iusaLoginRedirectURL);

	return $confirmation;

}

add_filter('gform_confirmation_4', 'iusa_login_confirmation', 10, 4);

// change the main error message
function iusa_login_error_message($message) {

    return '<div class="validation_error">Incorrect information has been entered. Please see below.</div>';

}

add_filter('gform_validation_message_4', 'iusa_login_error_message', 10, 2);

?>