<?php

function infogroup_enqueue() {

	/************************************************************
		Stylesheets
	************************************************************/

	// the main compiled stylesheet
	wp_enqueue_style('main-compiled-styles', THEMEDIRECTORYURI . '/css/app.css', '', null, 'all');

	/************************************************************
		Scripts
	************************************************************/

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script('jquery');

	// the main concatinated and minified script file
    wp_enqueue_script('header-compiled-script', THEMEDIRECTORYURI . '/js-dist/header/header-distribution.js', array('jquery'), null, false);

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4', true);

	// the main concatinated and minified script file using the last modified time as a version number
    wp_enqueue_script('main-compiled-script', THEMEDIRECTORYURI . '/js-dist/distribution.js', array('jquery'), null, true);

    // jQuery Hover Intent plugin
	wp_enqueue_script('hoverIntent', '', array('jquery'), null, true);

    // dequeue and deregister embed script - we don't use or need it
    wp_dequeue_script('wp-embed');
    wp_deregister_script('wp-embed');
    
}

add_action('wp_enqueue_scripts', 'infogroup_enqueue');

// add defer/async attribute to scripts
function infogroup_script_tag_filter($tag, $handle) {
   
	// add enqueued script tags to array to add the defer attribute to them      
	$scripts_to_defer = array();
	//$scripts_to_defer = array('wpb_composer_front_js', 'main-compiled-script');

	// add enqueued script tags to array to add the async attribute to them      
	$scripts_to_async = array();
   
	foreach ($scripts_to_defer as $defer_script) {

		if ($defer_script === $handle) {

        	return str_replace(' src', ' defer="defer" src', $tag);

    	}

 	}

 	foreach ($scripts_to_async as $async_script) {

		if ($async_script === $handle) {

        	return str_replace(' src', ' async="async" src', $tag);

    	}

 	}

   	return $tag;

}

add_filter('script_loader_tag', 'infogroup_script_tag_filter', 10, 2);

// remove query strings from static files
function remove_query_strings() {

	if(!is_admin()) {

    	add_filter('script_loader_src', function($src) {

    		$output = preg_split("/(&ver|\?ver)/", $src);

   			return $output[0];

    	}, 15);

    	add_filter('style_loader_src', function($src) {

    		$output = preg_split("/(&ver|\?ver)/", $src);
    		
   			return $output[0];

    	}, 15);

   }

}

add_action('init', 'remove_query_strings');

?>