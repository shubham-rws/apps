<?php

// set GTM ID constant based on environment
$awDomain = $_SERVER['SERVER_NAME'];

if ($awDomain ==  'dev.dataaxlecanada.ca') {

	// Dev GTM Container ID
	define('GTMID', 'TS6DWW');

	// current CMS environment
	define('CMS_ENVIRONMENT', 'DEV');

} elseif ($awDomain == 'test.dataaxlecanada.ca') {

	// Test GTM Container ID
	define('GTMID', 'TS6DWW');

	// current CMS environment
	define('CMS_ENVIRONMENT', 'TEST');

} elseif ($awDomain == 'www.dataaxlecanada.ca') {

	// Prod GTM Container ID
	define('GTMID', 'SVXLW');

	// current CMS environment
	define('CMS_ENVIRONMENT', 'PROD');

} else {

	// "GTM Testing" container ID
	define('GTMID', 'TSDS95');

	// current CMS environment
	define('CMS_ENVIRONMENT', 'DEV');

}

define('COOKIEDOMAIN', '.dataaxlecanada.ca');

// theme directory uri - does not include trailing slash
define('THEMEDIRECTORYURI', get_template_directory_uri());

// theme directory path - does not include trailing slash
define('THEMEDIRECTORYPATH', get_template_directory());

// plugins directory url - does not include trailing slash
define('PLUGINSDIRECTORYURL', plugins_url());

?>