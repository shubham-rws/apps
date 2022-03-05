<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h4><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
	<?php the_excerpt(); ?>
</section><!-- #post-## -->
