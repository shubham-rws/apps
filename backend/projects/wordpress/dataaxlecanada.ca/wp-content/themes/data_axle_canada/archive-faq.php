<?php get_header(); ?>

<section id="url-bucket-section" class="vc_section">

	<div id="url-bucket-row-first" class="row container1140 url-bucket-row" style="padding-left:15px;padding-right:15px;" data-equalizer >

		<h1><?php post_type_archive_title(); ?></h1>

		<h2>We Answered Your Most Frequently Asked Questions</h2>
		
		<?php 
	
			$iusaFAQterms = get_terms(array( 
    			'taxonomy' => 'faqcategories',
    			'parent'   => 0
			));

			foreach ($iusaFAQterms as $iusaFAQterm) {			
				
				echo '<h3>' . $iusaFAQterm->name . '</h3>';

				echo '<ul class="accordion" data-accordion>';

					$args = array(
						'post_type' => 'faq',
						'order' => 'ASC',
						'orderby' => 'title',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'faqcategories',
								'field'    => 'name',
								'terms'    => $iusaFAQterm->name,
							),
						),
					);
					
					$query = new WP_Query($args);
	
					while ($query->have_posts()) : $query->the_post();
	
						echo '<li class="accordion-item" data-accordion-item>';
	
						echo '<a href="#" class="accordion-title">' . get_the_title() . '</a><div class="accordion-content" data-tab-content>';
	
    					the_content();
	
						echo '</div></li>';
	
					endwhile; wp_reset_postdata();

				echo '</ul>';

			}

		?>

	</div>

</section>	

<?php get_footer(); ?>