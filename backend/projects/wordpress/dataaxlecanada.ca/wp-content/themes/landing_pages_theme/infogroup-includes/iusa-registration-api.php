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
	$regMediaCode = $entry['8'];
	$regInterestedIn = $entry['11'];
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
			'InterestedIn' => $regInterestedIn,		
			'Division' => $regDivision,
			'Password' => $regPassword,
			'DeviceType' => $regDeviceType,
			'SmsSessionId' => $appSessionID
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

		} elseif ($XMLresponse->Status == 'Success') {

			setcookie('Sms.SessionId', $XMLresponse->SessionId, 0, '/', COOKIEDOMAIN, 0);
			setcookie('account_id', $regFormData['AccountId'], 0, '/', COOKIEDOMAIN, 0);

			if (CMS_ENVIRONMENT == 'PROD') {

				// set HubSpot Forms API POST data
				$hs_context = array(
    				'hutk' => $_COOKIE['hubspotutk'],
    				'ipAddress' => $regIPaddress,
    				'pageName' => get_the_title(url_to_postid($regPageURL))
				);

				$hs_context_json = json_encode($hs_context);

				$cmsRegFormFields = 'firstname=' . urlencode($regFirstName) . '&lastname=' . urlencode($regLastName) . '&company=' . urlencode($regCompany) . '&email=' . urlencode($regEmail) . '&phone=' . urlencode($regPhone) . '&device_type=' . urlencode($regDeviceType) . '&how_did_you_hear_about_us_=' . urlencode($regMediaCode) . '&what_are_you_interested_in_=' . urlencode($regInterestedIn) . '&bas_division=' . $regDivision . '&bas_phone=' . urldecode($regBasPhone) . '&page_url=' . urlencode($regPageURL) . '&originating_system=iusa' . '&hs_context=' . urlencode($hs_context_json);
		
				// set cURL options in array for sending the data to Pardot
				// after successful IUSA registration
				$options = array(
					CURLOPT_URL => 'https://forms.hubspot.com/uploads/form/v2/5267700/a609f374-7413-47f8-9fff-f52f863180ae',
    			    CURLOPT_POST => true,
    			    CURLOPT_HTTPHEADER => array(
        				'Content-Type: application/x-www-form-urlencoded'
        			),
    			    CURLOPT_POSTFIELDS => $cmsRegFormFields,
    			    CURLOPT_RETURNTRANSFER => true,    		    
    			);
				
				// use above array of options in cURL request
				curl_setopt_array($ch, $options);
			
				// execute the cURL request
				$result = curl_exec($ch);

			}

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

add_action('gform_validation_1', 'iusa_register_or_login_user', 10, 2);

//https://core.infousa.com/MyAccount - bas_phone={bas_phone:26}&bas_offer={bas_offer:25}&InterestedIn={Interest:11}&cmsreg=t

//SimpleXMLElement Object ( [GlobalId] => 0 [Message] => Registartion Success [SessionId] => S47039574512681 [Status] => Success )

function iusa_registration_confirmation($confirmation, $form, $entry, $ajax) {

	//$iusaConfirmationQSP = '?bas_phone=' . $entry['26']; . '&bas_offer=' . $entry['25']; . '&InterestedIn=' . $entry['11']; . '&cmsreg=t';

	$appReturnURL = $entry['29'];

	if (!empty($appReturnURL)) {

		$iusaRegRedirectURL = $appReturnURL;

	} else if (CMS_ENVIRONMENT == 'DEV') {
		
		$iusaRegRedirectURL = 'https://dev-core.infousa.com/MyAccount';
		
	} elseif (CMS_ENVIRONMENT == 'TEST') {
		
		$iusaRegRedirectURL = 'https://test-core.infousa.com/MyAccount';		
		
	} elseif (CMS_ENVIRONMENT == 'PROD') {
		
		$iusaRegRedirectURL = 'https://core.infousa.com/MyAccount';
		
	} else {
		
		return false;
		
	}

	$confirmation = array('redirect' => $iusaRegRedirectURL);

	return $confirmation;

}

add_filter('gform_confirmation_1', 'iusa_registration_confirmation', 10, 4);

?>