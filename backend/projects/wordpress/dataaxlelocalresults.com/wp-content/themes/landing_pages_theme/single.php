<?php
/******************************
Template file for displaying
single posts
******************************/

get_header(); ?>

<div class="row outside-wrapper-row container1140">

	<div class="medium-8 column">

		<div id="single-post-container">
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  role="main">
					
					<? if (has_post_thumbnail()) {
	
						the_post_thumbnail('blog-featured', array('class' => 'single-post-image'));
	
					} ?>

					<div id="single-post-title">

						<h1>
							<?php the_title(); ?>
						</h1>

					</div>

					<div id="single-post-social">

						<?php include 'infogroup-includes/social-share.php'; ?>	

					</div>
	
					<div class="single-post-content">

						<?php the_content(); ?>

					</div>
			
				</div>

				<div id="single-post-nav" class="row collapse">

					<div class="small-6 column">
						
						<?php previous_post_link('<i class="fa fa-arrow-left" aria-hidden="true"></i> %link
', 'Previous Post', true); ?>	

					</div>

					<div class="small-6 column text-right">
				
						<?php next_post_link('%link <i class="fa fa-arrow-right" aria-hidden="true"></i>
', 'Next Post', true); ?>		

					</div>					

				</div>
		
			<?php endwhile; endif; ?>

		</div>

	</div>
	
	<div class="medium-4 column" id="archive-sidebar">
		
		<?php 
            if (is_active_sidebar('archive-sidebar')) {
              dynamic_sidebar('archive-sidebar');
            }
        ?>
	
	</div>

</div>

<?php get_footer(); ?>