<?php

function redux_refresh_local_gtm_file() {

	// set GTM ID constant based on environment
	$awDomain = $_SERVER['SERVER_NAME'];

	if ($awDomain ==  'dev-infogroup.infocanada.ca' || $awDomain == 'test-infogroup.infocanada.ca') {

		$gtmContainerID = 'TS6DWW'; // Dev/Test Container ID

	} elseif ($awDomain == 'www.infocanada.ca') {

		$gtmContainerID = 'SVXLW'; // Prod Container ID

	} else {
		
		$gtmContainerID = 'TSDS95'; // "GTM Testing" container ID

	}

	$absoluteThemePath = dirname(__FILE__, 3);

	$remoteGTM = file_get_contents('https://www.googletagmanager.com/gtm.js?id=GTM-' . $gtmContainerID);
	
	$remoteGTMnoScript = file_get_contents('https://www.googletagmanager.com/ns.html?id=GTM-' . $gtmContainerID);
	
	file_put_contents($absoluteThemePath . '/gtm/gtm.js', $remoteGTM);
	
	file_put_contents($absoluteThemePath . '/gtm/ns.html', $remoteGTMnoScript);
	
	echo $absoluteThemePath . '/gtm/gtm.js has been SUCCESSFULLY refreshed with latest from Tag Manager container ' . $gtmContainerID;

}

redux_refresh_local_gtm_file();

?>