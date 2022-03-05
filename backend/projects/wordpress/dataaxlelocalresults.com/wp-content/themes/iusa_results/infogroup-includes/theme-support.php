<?php

// add theme support for post/page featured image
add_theme_support( 'post-thumbnails' );

// add custom image sizes
add_image_size( 'blog-featured', 800, 350, true );
add_image_size( 'archive-page-featured', 400, 200, true );
add_image_size( 'data-axle-card-image', 400, 350, true ); 

// Let WordPress manage the document title
add_theme_support( 'title-tag' );

// Add foundation.css as editor style https://codex.wordpress.org/Editor_Style
add_editor_style( 'css/app.css' );

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// get rid of the “Category:”, “Tag:”, “Author:”, “Archives:”
// and “Other taxonomy name:” in the archive title
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

// allow gravity forms field labels to be hidden
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

?>