<?php

// require Redux Framework
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/config.php' );
}

// function to retrieve the off canvas postion from Redux
// and set the option postion on the frontend
function offCanvasPosition() {

	// set the Redux global variable
	global $infogroup_options;

	// get the direction option for the off canvas functionality
	// and set a variable with it.
	if ($infogroup_options['off-canvas-position'] == '1') {
	
		$offCanvasPosition = 'position-left';
	
	} elseif ($infogroup_options['off-canvas-position'] == '2') {
	
		$offCanvasPosition = 'position-right';
	
	} elseif ($infogroup_options['off-canvas-position'] == '3') {
	
		$offCanvasPosition = 'position-top';
	
	} elseif ($infogroup_options['off-canvas-position'] == '4') {
	
		$offCanvasPosition = 'position-bottom';
	
	}

	echo $offCanvasPosition;
	
}

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {

    global $post;

	return '<a class="moretag" href="'. get_permalink($post->ID) . '">...Read More</a>';

}

add_filter('excerpt_more', 'new_excerpt_more');

// remove admin menu pages
function remove_admin_menu_pages() {

	// Andy's User ID - remove these pages for all other users
	if (!current_user_can('activate_plugins')) {

    	remove_menu_page('tools.php'); // Tools
    	remove_menu_page('edit-comments.php'); // Comments
    	remove_menu_page('vc-welcome'); // Visual Composer Welcome Screen

	}

}

add_action( 'admin_menu', 'remove_admin_menu_pages' );

// disable wpautop from shortcodes
//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

?>