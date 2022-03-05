<?php 
/*
Template Name: Section
*/
get_header('section'); ?>
   
    <div class="section-main">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4">
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets 1') ) : ?><?php endif; ?>

                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets 2') ) : ?><?php endif; ?>
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
			
			// the_meta();
		?>
<?php /* ?>
                	<section>
                    	<a name="enterprise-solutions"></a>
                    	<h3>Enterprise Solutions</h3>
                        <h4>We can help you identify your target market and provide you with the support and multichannel solutions you need.</h4>
                        <p>Complete direct marketing services from one partner for fast action, higher profit and reduced cost. Infogroup leverages the strength our network of companies to better serve our customers. Our companies and divisions include some of the best known names in direct marketing: </p>
                    </section>
                    <section>
                    	<a name="lead-gen"></a>
                        <h3>Lead Generation Solutions</h3>
                        <h4>We can help your enterprise business through database analysis, marketing, customer profiling, and modeling and analysis.</h4>
                        <p>Our Database Marketing team gives businesses a powerful ally in anticipating customer 
behavior, pinpointing likely responders quickly and increasing response rates above the 
competition. We help you transform educated guesses into true insights so you can target 
more effectively and better manage the entire marketing lifecycle with our advanced 
analytics and actionable insights. </p>
<p>
From a simple customer profile analysis to sophisticated double matrix modeling, our 
Modeling and Analytics can help you find and acquire new customers faster, deepen your 
relationships with existing ones and more effectively leverage your direct marketing dollars.</p>
                    </section>
                    <section>
                    	<a name="multi-channel"></a>
                    	<h3>Multi-channel Digital Marketing</h3>
                        <h4>We help you connect with your target audience through our award winning Email Marketing solutions.</h4>
                        <p>Our Database Marketing team gives businesses a powerful ally in anticipating customer 
behavior, pinpointing likely responders quickly and increasing response rates above the 
competition. We help you transform educated guesses into true insights so you can target 
more effectively and better manage the entire marketing lifecycle with our advanced 
analytics and actionable insights. 
</p>
<p>
From a simple customer profile analysis to sophisticated double matrix modeling, our 
Modeling and Analytics can help you find and acquire new customers faster, deepen your 
relationships with existing ones and more effectively leverage your direct marketing dollars.</p>
                    </section>
 */ ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer(); ?>
