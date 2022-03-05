<?php
/******************************
Front Page Template
******************************/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="homepage-sections-wrapper" <?php post_class('main-content-wrapper'); ?>  role="main">
		
		<?php the_content(); ?>

	</div>

<?php endwhile;?>

<?php get_footer(); ?>