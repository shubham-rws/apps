<?php

get_header(); ?>

<section class="vc_section">

	<div class="row container1140">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class('main-content-wrapper'); ?>  role="main" style="padding-top:40px;padding-bottom:40px;">
				
				<?php the_content(); ?>
		
			</div>
		
		<?php endwhile;?>

	</div>

</section>

<?php get_footer(); ?>