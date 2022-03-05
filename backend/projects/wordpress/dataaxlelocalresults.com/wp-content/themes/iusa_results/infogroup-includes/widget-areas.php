<?php

// register widget areas
if (!function_exists('infogroup_widgets')) {

	function infogroup_widgets() {
		
		register_sidebar(array(
		  'id' => 'sidebar-widgets',
		  'name' => 'Sidebar Widgets',
		  'description' => 'Drag widgets to this sidebar container.',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));
		
		// footer widget one
		register_sidebar(array(
		  'id' => 'footer-widget-1',
		  'name' => 'Footer Widget 1',
		  'description' => 'Drag widgets to this footer container',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));

		//footer widget two
		register_sidebar(array(
		  'id' => 'footer-widget-2',
		  'name' => 'Footer Widget 2',
		  'description' => 'Drag widgets to this footer container',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));

		// footer widget three
		register_sidebar(array(
		  'id' => 'footer-widget-3',
		  'name' => 'Footer Widget 3',
		  'description' => 'Drag widgets to this footer container',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));

		// footer widget four
		register_sidebar(array(
		  'id' => 'footer-widget-4',
		  'name' => 'Footer Widget 4',
		  'description' => 'Drag widgets to this footer container',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));

		// footer widget four
		register_sidebar(array(
		  'id' => 'blog-sidebar',
		  'name' => 'Blog Archive/Single Sidebar',
		  'description' => 'Drag widgets to this sidebar container',
		  'before_widget' => '<article id="%1$s" class="widget %2$s">',
		  'after_widget' => '</article>',
		  'before_title' => '<h6>',
		  'after_title' => '</h6>',
		));

	}

	add_action( 'widgets_init', 'infogroup_widgets' );
}

?>