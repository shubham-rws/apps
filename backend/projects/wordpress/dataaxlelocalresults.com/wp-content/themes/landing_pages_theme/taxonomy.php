<?php get_header(); ?>

<section id="url-bucket-section" class="vc_section">

	<div id="url-bucket-row-first" class="row container1140 url-bucket-row" data-equalizer >

		<h1><?php echo get_the_archive_title(); ?></h1>

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(array('column', 'small-12', 'medium-6', 'large-4', 'url-bucket-post')); ?>>

				<div class="url-bucket-post-inner" data-equalizer-watch >

					<?php if (has_post_thumbnail()) { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('archive-page-featured', array('class' => 'url-bucket-post-featured')); ?>
						</a>
					<?php }	?>
			
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	
					<?php if (get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)) { ?>
	
						<p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', 	true); ?></p>
	
					<?php } ?>
	
					<p><a href="<?php the_permalink(); ?>">Read More</a></p>
	
				</div>

			</div>

		<?php endwhile;	?>

	</div>

	<div class="row container1140 url-bucket-row">
			
		<?php
			the_posts_pagination(array(
   				'mid_size' => 3,
    			'screen_reader_text' => 'Page Navigation Links'
			));
		?>

	</div>

</section>	

<?php get_footer(); ?>