<?php
/******************************
Template default template for 
displaying Pages in WordPress
******************************/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class('main-content-wrapper'); ?>  role="main">
		
		<?php the_content(); ?>

	</div>

<?php endwhile;?>

<?php get_footer(); ?>