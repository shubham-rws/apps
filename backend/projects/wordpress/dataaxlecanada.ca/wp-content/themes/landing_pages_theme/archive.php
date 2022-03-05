<?php
/******************************
Template file for displaying
post archives
******************************/

get_header(); ?>

<div class="row outside-wrapper-row">

	<div class="medium-8 column">

		<h1><?php echo get_bloginfo('name'); ?>: <?php the_archive_title(); ?></h1>

		<div id="masonry-container" class="row small-up-1 large-up-2 collapse">

			<div class="gutter-sizer-3-percent"></div>
	
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class('column column-block masonry-item blog-post-wrapper'); ?>  role="main">
					
					<? if (has_post_thumbnail()) { ?>
	
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-featured', array('class' => 'masonry-item-post-image blog-featured-image')); ?></a>	
	
					<?php } ?>
	
					<div class="masonry-item-post-content">

						<h5 class="masonry-item-post-title">
							<?php the_title(); ?>
						</h5>

						<?php
							$content_pre_more_tag = get_extended($post->post_content);
							$content_pre_more_tag = apply_filters('the_content', $content_pre_more_tag['main']);
							echo $content_pre_more_tag;
						?>

					</div>

					<div class="masonry-item-post-read-more">
						
						<a href="<?php the_permalink(); ?>">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

					</div>
			
				</div>
		
			<?php endwhile;?>

		</div>

		<div id="post-pagination-wrapper">

			<?php echo paginate_links(); ?>

		</div>
	
	</div>
	
	<div id="archive-sidebar" class="medium-4 column">
		
		<?php 
            if (is_active_sidebar('archive-sidebar')) {
              dynamic_sidebar('archive-sidebar');
            }
        ?>
	
	</div>

</div>

<?php get_footer(); ?>