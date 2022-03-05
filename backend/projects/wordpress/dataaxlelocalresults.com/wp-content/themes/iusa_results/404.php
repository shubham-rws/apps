<?php
/******************************
The template for displaying 404
pages (Not Found)
******************************/

get_header(); ?>
	
<?php
	$post_4952 = get_post(4952);
	$post_4952_content = $post_4952->post_content;
	$post_4952_content = apply_filters('the_content', $post_4952_content);
	$post_4952_content = str_replace(']]>', ']]>', $post_4952_content);
	echo $post_4952_content;
?>

<?php get_footer(); ?>