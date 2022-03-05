<?php
function ig_change_main_query($query) {

	$currentPostType = get_query_var('post_type');

	// array of posts types alter the query
	// use any URL bucket post type names only
	// exclude blog and faq post types
	$urlBucketPostTypes = array();

    if ($query->is_archive() && $query->is_main_query() && in_array($currentPostType, $urlBucketPostTypes)) {

        $query->set('orderby', 'title');
        $query->set('order', 'asc');
        $query->set('posts_per_page', '9');

    }
}

add_action('pre_get_posts', 'ig_change_main_query');
?>