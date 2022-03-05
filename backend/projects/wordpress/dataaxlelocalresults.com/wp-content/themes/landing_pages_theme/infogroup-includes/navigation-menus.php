<?php

// add navigation menu support
function register_navigation_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'The Main Navigation Menu' ),
      'footer-menu-1' => __( 'The First Footer Menu' ),
      'footer-menu-2' => __( 'The Second Footer Menu' ),
      'footer-menu-3' => __( 'The Third Footer Menu' ),
      'footer-menu-4' => __( 'The Fourth Footer Menu' ),
      'footer-menu-5' => __( 'The Fifth Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_navigation_menus' );

// walker to extend nave and change the submenu class
if (!class_exists('Infogroup_Mobile_Walker')) {
	class Infogroup_Mobile_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"vertical submenu menu nested\" data-submenu>\n";
		}
	}
}

// the main navigation
if ( ! function_exists('infogroup_main_navigation')) {
	function infogroup_main_navigation() {
		wp_nav_menu( array(
			'container'      => false,
			'menu'  		 => 'The Main Navigation Menu',
			'menu_id'		 => 'infogroup-main-nav',
			'menu_class'     => 'menu vertical large-horizontal',
			'items_wrap'     => '<ul id="%1$s" class="%2$s "data-responsive-menu="accordion large-dropdown" data-animate="fade-in fade-out">%3$s</ul>',
			'theme_location' => 'main-menu',
			'depth'          => 3,
			'fallback_cb'    => false,
			'walker'         => new Infogroup_Mobile_Walker(),
		));
	}
}

// add custom class to main navigation anchor links
function add_menu_atts($atts, $item, $args){
	
	// your check for primary menu location
	if( $args->theme_location == 'main-menu' ) {

		$atts['class'] = 'da-main-nav-anchor';

	}     
  
	return $atts;

  }

  add_filter('nav_menu_link_attributes', 'add_menu_atts', 10, 3);

?>