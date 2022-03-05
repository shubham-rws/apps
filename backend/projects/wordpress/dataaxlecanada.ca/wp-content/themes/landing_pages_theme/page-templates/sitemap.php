<?php
/*********************************************
Template Name: Sitemap
*********************************************/

get_header(); ?>

<?php get_header(); ?>

<section id="url-bucket-section" class="vc_section">

	<div id="url-bucket-row-first" class="row container1140 url-bucket-row small-up-1 medium-up-3 large-up-3">

		<h1>Sitemap</h1>
		
		<?php 
	
			$iusaURLBuckets = get_post_types(array( 
    			'public' => true,
    			'_builtin'   => false
			), 'objects');

			foreach ($iusaURLBuckets as $iusaURLBucket) {

				$iusaURLBucketPostCount = wp_count_posts($iusaURLBucket->name);

				if ($iusaURLBucketPostCount->publish > 0 && $iusaURLBucket->name != 'faq') {

					echo '<div class="column column-block">';
					
					echo '<h3>' . $iusaURLBucket->label . '</h3>';
	
					echo '<ul class="infogroup-sitemap">';
	
						$args = array(
							'post_type' => $iusaURLBucket->name,
							'order' => 'ASC',
							'orderby' => 'name',
							'posts_per_page' => -1,
							'post_status' => 'publish'						
						);
						
						$query = new WP_Query($args);
		
						while ($query->have_posts()) : $query->the_post();
		
							echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';					
		
						endwhile; wp_reset_postdata();
	
					echo '</ul></div>';

				}

			}			

		?>

	</div>

</section>	

<?php get_footer(); ?>

<?php get_footer(); ?>