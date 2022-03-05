<?php 

function environment_url_swap($items = false, $content = false) {

	$environment = $_SERVER['SERVER_NAME'];

	// set $haystack to passed in function parameter
	if ($items) {

		$haystack = $items;

	} elseif ($content) {

		$haystack = $content;

	} else {

		$haystack = '';

	}

	// DEV environment search and replace
	if ($environment ==  'dev-infogroup.infocanada.ca') {

		// enter strings to find - MUST HAVE A MATCHING REPLACE STRING IN THE NEXT ARRAY
		$find = array(		
			'https://account-app.infousa.com/Authentication/Registration',
			'leads-app.infousa.com',
			'https://customeranalyzer-app.infousa.com/CA/default.aspx',
			'https://customeranalyzer-app.infousa.com/',
			'http://Shared.sub.infousa.com/Chat/Chat.aspx',
			'http://www.infocanada.ca/businesses.aspx',
			'https://core.infousa.com/MyAccount',
			'https://account-app.infousa.com/common/logout.aspx',
			'https://www.infousa.com',
			'https://account-app.infousa.com/Authentication/SignInIndex'
		);
	
		// enter strings to replace - MUST HAVE CORRESPONDING FIND STRING IN ABOVE ARRAY
		$replace = array(
			'http://dev-account-app.intra.infousa.com/Authentication/Registration',
			'dev-leads-app.intra.infousa.com',
			'https://test-customeranalyzer-app.infousa.com/CA/default.aspx',
			'https://test-customeranalyzer-app.infousa.com/',
			'http://test-chat.dmz.infousa.com/i3root/infousa/',
			'http://test.infocanada.ca/businesses.aspx',
			'https://dev-core.infousa.com/MyAccount',
			'https://dev-account-app.infousa.com/common/logout.aspx',
			'https://dev-cms.infousa.com',
			'https://dev-account-app.infousa.com/Authentication/SignInIndex'
		);

	}

	// TEST environment search and replace
	elseif ($environment ==  'test-infogroup.infocanada.ca') {

		// enter strings to find - MUST HAVE A MATCHING REPLACE STRING IN THE NEXT ARRAY
		$find = array(
			'https://account-app.infousa.com/Authentication/Registration',
			'leads-app.infousa.com',
			'https://customeranalyzer-app.infousa.com/CA/default.aspx',
			'https://customeranalyzer-app.infousa.com/',
			'http://Shared.sub.infousa.com/Chat/Chat.aspx',
			'http://www.infocanada.ca/businesses.aspx',
			'https://core.infousa.com/MyAccount',
			'https://account-app.infousa.com/common/logout.aspx',
			'https://www.infousa.com',
			'https://account-app.infousa.com/Authentication/SignInIndex'
		);
	
		// enter strings to replace - MUST HAVE CORRESPONDING FIND STRING IN ABOVE ARRAY
		$replace = array(
			'https://test-account-app.infousa.com/Authentication/Registration',
			'test-leads-app.infousa.com',
			'https://test-customeranalyzer-app.infousa.com/CA/default.aspx',
			'https://test-customeranalyzer-app.infousa.com/',
			'http://test-chat.dmz.infousa.com/i3root/infousa/',
			'http://test.infocanada.ca/businesses.aspx',
			'https://test-core.infousa.com/MyAccount',
			'https://test-account-app.infousa.com/common/logout.aspx',
			'https://test-cms.infousa.com',
			'https://test-account-app.infousa.com/Authentication/SignInIndex'
		);

	}

	// PROD environment search and replace
	elseif ($environment ==  'www.infocanada.ca') {

		// enter strings to find - MUST HAVE A MATCHING REPLACE STRING IN THE NEXT ARRAY
		$find = array(
		);
	
		// enter strings to replace - MUST HAVE CORRESPONDING FIND STRING IN ABOVE ARRAY
		$replace = array(
		);

	}

	if (isset($find) && isset($replace)) {

		return str_replace($find, $replace, $haystack);

	} else {

		return $haystack;

	}

}

// filter all nav menus for environment url swapping
add_filter('wp_nav_menu_items', 'environment_url_swap');

// filter the content for environment url swapping
add_filter('the_content', 'environment_url_swap');

?>