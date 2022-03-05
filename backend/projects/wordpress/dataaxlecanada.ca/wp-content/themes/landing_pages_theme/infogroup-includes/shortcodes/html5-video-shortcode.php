<?php

function html5_video_shortcode($atts) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'title' => 'Infogroup Video',
		'src' => '',
		'poster' => '',
	), $atts, 'ig_video');

	// set variable from the src shortcode attribute to be used in the slide image tag source attribute
	$videoSrc = $a['src'];

	// set variable from the src shortcode attribute to be used in the slide image tag source attribute
	$posterAttr = $a['poster'];

	if (is_numeric($posterAttr)) {

		$posterSrc = wp_get_attachment_image_src($posterAttr, 'full')[0];

	} else {

		$posterSrc = $posterAttr;

	}

	$video = '<!-- ' . $a['title'] . ' --><video class="infogroupVideo" src="' . $videoSrc . '" controls poster="' . $posterSrc . '" preload="none">Sorry, your browser doesn\'t support embedded videos, but don\'t worry, you can <a href="' . $videoSrc . '">download it</a> and watch it with your favorite video player!</video>';

	return $video;

}

add_shortcode('ig_video', 'html5_video_shortcode');

// map the shortcode to Visual Composer if Visual Composer exists
function html5_video_shortcode_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'HTML 5 Video Embed',
			'base' => 'ig_video',
			'class' => '',
			'content_element' => true,			
			'category' => 'Infogroup',
			'icon' => get_template_directory_uri() . '/img/i.png',
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Video Title',
					'param_name' => 'title',        
					'description' => 'Enter the video title here. Is not displayed, for reference only.',
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Video Media Library URL',
					'param_name' => 'src',        
					'description' => 'Enter the video URL here after uploading it to the media library. <a href="' . get_site_url() . '/wp-admin/media-new.php" target="_blank">Click here</a> to upload the video file, or <a href="' . get_site_url() . '/wp-admin/upload.php" target="_blank">click here</a> to select an already uploaded video\'s URL.',
					'admin_label' => true,
				),			
            	array(
                	'type' => 'attach_image',
                	'heading' => 'Placeholder Poster Image',
                	'holder' => '',
                	'class' => '',
                	'param_name' => 'poster',
                	'description' => 'Upload the image here that will be used as the placeholder poster.',
            	),
			),
		));

	}

}

add_action('vc_before_init', 'html5_video_shortcode_vc');

?>