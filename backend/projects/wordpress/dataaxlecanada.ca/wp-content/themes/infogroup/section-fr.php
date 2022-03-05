<?php 
/*
Template Name: Section-FR
*/
get_header('section-fr'); ?>
   
    <div class="section-main">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4">
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FR Sidebar Widgets 1') ) : ?><?php endif; ?>

                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FR Sidebar Widgets 2') ) : ?><?php endif; ?>
                </div>
                <div class="col-md-8 content">
		
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				the_post();
				get_template_part( 'content', 'section' );
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			
		//	the_meta();
		?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer('fr'); ?>
