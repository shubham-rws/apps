<?php // Facebook Open Graph Meta Tags

$yoastSocial = get_option('wpseo_social');

global $post;

$excerptOutsideLoop = wp_trim_words(apply_filters('the_content', $post->post_content));

if (is_single()) {

	$featuredImageData = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

	$socialShareImage = $featuredImageData[0];

} else {

	global $infogroup_options;

	$socialShareImage = $infogroup_options['header-logo']['url'];

}

// if Yoast SEO is not active, or if Yoast SEO is active, but Facebook Open Graph option is turned off
if ((!defined('WPSEO_VERSION')) || (defined('WPSEO_VERSION') && !$yoastSocial['opengraph'])) { ?>

	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php the_title(); ?> - <?php echo get_bloginfo('name');?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo $socialShareImage; ?>" />
	<?php if (is_single()) { ?>
		<meta property="og:image:width" content="<?php echo $featuredImageData[1]; ?>" />
		<meta property="og:image:height" content="<?php echo $featuredImageData[2]; ?>" />
	<?php } ?>
	<meta property="og:description" content="<?php echo $excerptOutsideLoop; ?>">

<?php }

// if Yoast SEO is not active, or if Yoast SEO is active, but Twitter Card option is turned off
if ((!defined('WPSEO_VERSION')) || (defined('WPSEO_VERSION') && !$yoastSocial['twitter'])) { ?>

	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@Infogroup">
	<meta name="twitter:title" content="<?php the_title(); ?> - <?php echo get_bloginfo('name');?>" />
	<meta name="twitter:description" content="<?php echo $excerptOutsideLoop; ?>" />
	<meta name="twitter:image" content="<?php echo $socialShareImage . '?' . uniqid(); ?>" />

<?php } ?>