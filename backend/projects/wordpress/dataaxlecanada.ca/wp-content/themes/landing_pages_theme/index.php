<?php
/******************************
Overall default template for 
displaying Posts/Pages in WordPress
******************************/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  role="main">
		
		<?php the_content(); ?>

	</div>

<?php endwhile;?>

<?php get_footer(); ?>