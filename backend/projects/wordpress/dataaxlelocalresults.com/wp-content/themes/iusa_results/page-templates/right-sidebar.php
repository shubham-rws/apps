<?php
/*********************************************
Template Name: Right Sidebar 2/3 + 1/3
*********************************************/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class('main-content-wrapper'); ?>  role="main">

		<div class="row">

  			<div class="large-8 column">
  				
				<?php the_content(); ?>

  			</div>

  			<div class="large-4 column">
  				
				<?php dynamic_sidebar('sidebar-widgets'); ?>

  			</div>

		</div>

	</div>

<?php endwhile; ?>

<?php get_footer(); ?>