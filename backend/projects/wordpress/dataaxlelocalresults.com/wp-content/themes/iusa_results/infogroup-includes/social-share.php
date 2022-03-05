<?php 
/******************************
Use PHP include to display the
social share icons on posts - 
Accompanying JS in js/infogroup

Facebook still requires the Open Graph 
meta tags to populate the correct content
in the share window. This is included by Yoast SEO,
otherwise the OG meta tags need to be manually included
******************************/
?>

<ul id="post-social-share">

	<li>
		<a href="#" class="facebook-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</a>
	</li>


	<li>
		<a href="#" class="twitter-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
	</li>

	<li>
		<a href="#" class="linkedin-share" data-desc="<?php echo esc_attr(get_the_excerpt()); ?>" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>">
			<i class="fa fa-linkedin" aria-hidden="true"></i>
		</a>
	</li>

	<!--
	<li>
		<a href="#" class="googleplus-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>">
			<i class="fa fa-google-plus" aria-hidden="true"></i>
		</a>
	</li>


	<li>
		<a href="#" class="pinterest-share" data-image="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id() , 'full', true) [0]; ?>" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>">
			<i class="fa fa-pinterest-p" aria-hidden="true"></i>
		</a>
	</li>
	-->

</ul>