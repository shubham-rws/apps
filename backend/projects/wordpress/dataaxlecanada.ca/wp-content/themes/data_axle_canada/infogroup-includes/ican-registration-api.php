<?php 

function iusa_register_or_login_user($validation_result) {

	$form = $validation_result['form'];

	if ($validation_result['is_valid'] == false) {
		$validation_result['form'] = $form;
		return $validation_result;
	}

	$entry = GFFormsModel::get_current_lead();

	$regFirstName = $entry['1'];
	$regLastName = $entry['2'];
	$regCompany = $entry['3'];
	$regPhone = $entry['4'];
	$regEmail = $entry['5'];
	$regAccountId = $entry['5'];
	$regMediaCode = $entry['30'];
	$regDivision = $entry['19'];
	$regPassword = $entry['21'];
	$regPageURL = $entry['22'];
	$regIPaddress = $entry['23'];
	$regBasPhone = $entry['26'];
	$regDeviceType = $entry['27'];


	// check if the password is at least 8 characters with 1 number
	$isPasswordValid = preg_match('/^(?=.*\d).{8,}$/', $regPassword);

	if (!$isPasswordValid) {
			
		$validation_result['is_valid'] = false;

		foreach ($form['fields'] as &$field) {

           	if ($field->id == '21') {
               	$field->failed_validation  = true;
               	$field->validation_message = 'Your password must contain at least eight (8) characters including at least one (1) number.';
               	break;
           	}

       	}

       	$validation_result['form'] = $form;
 
    	return $validation_result;
    		
	} else {		
			
		if (CMS_ENVIRONMENT == 'DEV') {
		
			$iusaRegistrationAPIendpoint = 'http://dev-drone-srv.intra.infousa.com/infousadataservice.svc/RegisterUser';
		
			$iusaRegistrationAPIcredentials = base64_encode('cmsuserdev:login4DEV');

			$iusaAppEnvironmentDomain = 'dev-account-app.infousa.com';
		
		} elseif (CMS_ENVIRONMENT == 'TEST') {
		
			$iusaRegistrationAPIendpoint = 'http://test-drone-srv.infousa.com/infousadataservice.svc/RegisterUser';
		
			$iusaRegistrationAPIcredentials = base64_encode('cmsusertest:login4TEST');

			$iusaAppEnvironmentDomain = 'test-account-app.infousa.com';
		
		} elseif (CMS_ENVIRONMENT == 'PROD') {
		
			$iusaRegistrationAPIendpoint = 'http://drone-srv.infousa.com/infousadataservice.svc/RegisterUser';
		
			$iusaRegistrationAPIcredentials = base64_encode('cmsuser:login4PROD');

			$iusaAppEnvironmentDomain = 'account-app.infousa.com';
		
		} else {
		
			return false;
		
		}

		$appSessionID = $_COOKIE['Sms_SessionId'];
		
		// build an array of data registration form fields
		$regFormData = array(
			'FirstName' => $regFirstName,
			'LastName' => $regLastName,
			'Company' => $regCompany,
			'Phone' => $regPhone,
			'Email' => $regEmail,
			'AccountId' => $regEmail,
			'MediaCode' => $regMediaCode,		
			'Division' => $regDivision,
			'Password' => $regPassword,
			'DeviceType' => $regDeviceType,
			'SmsSessionId' => $appSessionID,
			'VendorId' => '99911'
		);
		
		// convert above PHP array of data to JSON
		$regFormDataJSON = json_encode($regFormData);
		
		// init cURL
		$ch = curl_init();
		
		// cURL headers for IUSA Registration API
		$headers = array(
			'Authorization: Basic ' . $iusaRegistrationAPIcredentials,
			'Content-Type: application/json',
		);
		
		// set cURL options in array for IUSA Registration API
		$options = array(
			CURLOPT_URL => $iusaRegistrationAPIendpoint,
			CURLOPT_HTTPHEADER => $headers,    	   
    	    CURLOPT_POST => true,
    	    CURLOPT_POSTFIELDS => $regFormDataJSON,
    	    CURLOPT_RETURNTRANSFER => true,
    	    CURLOPT_HEADER => false
    	);
			
		// use above array of options in cURL request
		curl_setopt_array($ch, $options);
		
		// execute the cURL request
		$result = curl_exec($ch);
			
		$XMLresponse = new SimpleXMLElement($result);

		if ($XMLresponse->Status == 'UserExists') {

			$validation_result['is_valid'] = false;

			foreach ($form['fields'] as &$field) {

           		if ($field->id == '5') {
            	   	$field->failed_validation  = true;
            	   	$field->validation_message = $regEmail . ' is already a registered user. Please <a href="https://' . $iusaAppEnvironmentDomain . '/Authentication/SignInIndex">sign in</a> or <a href="http://' . $iusaAppEnvironmentDomain . '/Authentication/ForgotPassword?bas_vendor=190000">reset your password</a>.';
            	   	break;
           		}           		

    		}

    		$validation_result['form'] = $form;
 
    		return $validation_result;

		} elseif ($XMLresponse->Status == 'EmailAddressBlocked' || $XMLresponse->Status == 'EmailDomainBlocked') {

			$validation_result['is_valid'] = false;

			foreach ($form['fields'] as &$field) {

           		if ($field->id == '5') {
            	   	$field->failed_validation  = true;
            	   	$field->validation_message = 'Please enter a valid email address.';
            	   	break;
           		}           		

    		}

    		$validation_result['form'] = $form;
 
    		return $validation_result;

		} elseif ($XMLresponse->Status == 'Success') {

			setcookie('Sms.SessionId', $XMLresponse->SessionId, 0, '/', COOKIEDOMAIN, 0);
			setcookie('account_id', $regFormData['AccountId'], 0, '/', COOKIEDOMAIN, 0);
			
			$_POST['input_31'] = $XMLresponse->IsCanadian;

		}
					
		//close connection
		curl_close($ch);

		$validation_result['form'] = $form;

		add_action('gform_pre_submission', function() {
    		$_POST['input_21'] = password_hash($regPassword, PASSWORD_DEFAULT);
		});
 
    	return $validation_result;

	}

}
// english registration form
add_action('gform_validation_2', 'iusa_register_or_login_user', 10, 2);
// english registration form - modal
add_action('gform_validation_8', 'iusa_register_or_login_user', 10, 2);

// french registration form
add_action('gform_validation_6', 'iusa_register_or_login_user', 10, 2);

//SimpleXMLElement Object ( [GlobalId] => 0 [Message] => Registartion Success [SessionId] => S47039574512681 [Status] => Success )

function iusa_registration_confirmation($confirmation, $form, $entry, $ajax) {

	$appReturnURL = $entry['29'];

	$canadianUser = $entry['31'];

	if (!empty($appReturnURL)) {

		$iusaRegRedirectURL = $appReturnURL;

	} else if (CMS_ENVIRONMENT == 'DEV') {
		
		$iusaRegRedirectURL = 'https://dev.dataaxlecanada.ca/registration-thank-you'  . ($canadianUser ? '-c' : '') . '/';
		
	} elseif (CMS_ENVIRONMENT == 'TEST') {
		
		$iusaRegRedirectURL = 'https://test.dataaxlecanada.ca/registration-thank-you'  . ($canadianUser ? '-c' : '') . '/';	
		
	} elseif (CMS_ENVIRONMENT == 'PROD') {
		
		$iusaRegRedirectURL = 'https://www.dataaxlecanada.ca/registration-thank-you'  . ($canadianUser ? '-c' : '') . '/';
		
	} else {
		
		return false;
		
	}

	// if (!empty($appReturnURL)) {

	// 	$iusaRegRedirectURL = $appReturnURL;

	// } else if (CMS_ENVIRONMENT == 'DEV') {

	// 	if ($form['id'] === 1) {
		
	// 		$iusaRegRedirectURL = 'https://dev-infogroup.infocanada.ca/lp/registration-thank-you/';

	// 	} elseif ($form['id'] === 5) {

	// 		$iusaRegRedirectURL = 'https://dev-infogroup.infocanada.ca/lp/registration-thank-you-fr/';

	// 	}
		
	// } elseif (CMS_ENVIRONMENT == 'TEST') {

	// 	if ($form['id'] === 1) {
		
	// 		$iusaRegRedirectURL = 'https://test-infogroup.infocanada.ca/lp/registration-thank-you/';

	// 	} elseif ($form['id'] === 5) {

	// 		$iusaRegRedirectURL = 'https://test-infogroup.infocanada.ca/lp/registration-thank-you-fr/';
			
	// 	}		
		
	// } elseif (CMS_ENVIRONMENT == 'PROD') {

	// 	if ($form['id'] === 1) {
		
	// 		$iusaRegRedirectURL = 'https://canadiandata.data-axle.com/lp/registration-thank-you/';

	// 	} elseif ($form['id'] === 5) {

	// 		$iusaRegRedirectURL = 'https://canadiandata.data-axle.com/lp/registration-thank-you-fr/';
			
	// 	}		
		
	// } else {
		
	// 	return false;
		
	// }

	$confirmation = array('redirect' => $iusaRegRedirectURL);

	return $confirmation;

}
// english registration form
add_filter('gform_confirmation_2', 'iusa_registration_confirmation', 10, 4);

// english registration form - modal
add_filter('gform_confirmation_8', 'iusa_registration_confirmation', 10, 4);

// french registration form
add_filter('gform_confirmation_6', 'iusa_registration_confirmation', 10, 4);

// email opt in consent for Canadian users
function canadian_email_consent($validation_result) {

	$form = $validation_result['form'];

	if ($validation_result['is_valid'] == false) {
		$validation_result['form'] = $form;
		return $validation_result;
	}

	$entry = GFFormsModel::get_current_lead();

	if ($entry['2'] == 'Yes') {

		$emailConsent = true;

	} else {

		$emailConsent = false;

	}
			
	if (CMS_ENVIRONMENT == 'DEV') {
	
		$usaEmailConsentEndpoint = 'http://dev-drone-srv.infousa.com/InfoUsaDataService.svc/UpdateEmailOptIn';
	
	} elseif (CMS_ENVIRONMENT == 'TEST') {
	
		$usaEmailConsentEndpoint = 'http://test-drone-srv.infousa.com/InfoUsaDataService.svc/UpdateEmailOptIn';
	
	} elseif (CMS_ENVIRONMENT == 'PROD') {
	
		$usaEmailConsentEndpoint = 'http://drone-srv.infousa.com/InfoUsaDataService.svc/UpdateEmailOptIn';
	
	} else {
	
		return false;
	
	}
		
	// build an array of data registration form fields
	$emailConsentData = array(
		'SessionId' => $_COOKIE['Sms.SessionId'],
		'AccountId' => $_COOKIE['account_id'],
		'OptIn' => $emailConsent
	);
	
	// convert above PHP array of data to JSON
	$emailConsentDataJSON = json_encode($emailConsentData);
	
	// init cURL
	$ch = curl_init();
	
	// cURL headers for sg Registration API
	$headers = array( 
		'Content-Type: application/json',
	);
	
	// set cURL options in array for sg Registration API
	$options = array(
		CURLOPT_URL => $usaEmailConsentEndpoint,
		CURLOPT_HTTPHEADER => $headers,    	   
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $emailConsentDataJSON,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false    	    
    );
		
	// use above array of options in cURL request
	curl_setopt_array($ch, $options);
	
	// execute the cURL request
	$result = curl_exec($ch);

	$XMLresponse = new SimpleXMLElement($result);
		
	if ($XMLresponse->boolean === false) {		

		$validation_result['is_valid'] = false;

		foreach ($form['fields'] as &$field) {
	
        	if ($field->id == '2') {
           		$field->failed_validation  = true;
           		$field->validation_message = 'Oops. Something went wrong. You\'re opted out by default. If you\'d like to opt in, please contact us.';
           		break;
       		}           		
	
    	}

    	$validation_result['form'] = $form;
 
    	return $validation_result;

	}		
				
	//close connection
	curl_close($ch);

	$validation_result['form'] = $form;
 
    return $validation_result;

}

add_action('gform_validation_7', 'canadian_email_consent', 10, 2);

?>