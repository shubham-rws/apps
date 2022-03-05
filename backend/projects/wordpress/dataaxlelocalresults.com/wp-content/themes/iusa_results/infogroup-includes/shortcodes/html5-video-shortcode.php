<?php

function html5_video_shortcode($atts) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'title' => 'Infogroup Video',
		'src' => '',
		'poster' => '',
		'modal' => 'false',
		'button_style' => 'primary',
		'button_size' => 'large',
		//'button_color' => 'green',
		'button_text' => 'Click to Play Video',
		'button_align' => 'none/inline',
		'modal_image' => '',
		'modal_image_align' => 'inline',
		'width' => ''
	), $atts, 'ig_video');

	// set variable from the src shortcode attribute to be used as the video file url
	$videoSrc = $a['src'];

	// set variable from the post shortcode attribute to be used in the slide image tag source attribute
	$posterAttr = $a['poster'];

	// set boolean variable based on the modal video choice
	$modalVideo = $a['modal'];

	$videoTitle = $a['title'];

	switch ($a['button_style']) {
		case 'primary':
			$buttonStyle = 'da-primary-button';
			break;
		case 'secondary':
			$buttonStyle = 'da-secondary-button';
			break;
		case 'tertiary':
			$buttonStyle = 'da-tertiary-button';
			break;
		case 'quaternary':
			$buttonStyle = 'da-quaternary-button';
			break;
	}

	switch ($a['button_align']) {
		case 'none/inline':
			$buttonAlignment = '';
			break;
		case 'left':
			$buttonAlignment = 'float-left';
			break;
		case 'center':
			$buttonAlignment = 'float-center';
			break;
		case 'right':
			$buttonAlignment = 'float-right';
			break;
	}

	$centeredButtonWidth = $a['width'];
	
	$modalImageAttr = $a['modal_image'];

	if (is_numeric($posterAttr)) {

		$posterSrc = wp_get_attachment_image_src($posterAttr, 'full')[0];

	} else {

		$posterSrc = $posterAttr;

	}

	if (is_numeric($modalImageAttr)) {

		$modalImageSrc = wp_get_attachment_image_src($modalImageAttr, 'full')[0];

	} else {

		$modalImageSrc = $modalImageAttr;

	}

	switch ($a['modal_image_align']) {
		case 'inline':
			$modalImageAlignment = '';
			break;
		case 'alignleft':
			$modalImageAlignment = 'alignleft';
			break;
		case 'centered':
			$modalImageAlignment = 'centered';
			break;
		case 'alignright':
			$modalImageAlignment = 'alignright';
			break;
	}

	$video = '';

	if ($modalVideo != 'false') {
		
		// create a unique ID
		$modalID = uniqid();

		$video .= '<div class="reveal modal-video" id="modal-video-' . $modalID . '" data-reveal data-reset-on-close="true">';

	}

	$video .= '<!-- ' . $videoTitle . ' --><video data-title="' . $videoTitle . '" onplay="sendVideoEvent(\'Play\', this)" onended="sendVideoEvent(\'Ended\', this)" class="infogroupVideo" src="' . $videoSrc . '" controls poster="' . $posterSrc . '" preload="none">Sorry, your browser doesn\'t support embedded videos, but don\'t worry, you can <a href="' . $videoSrc . '">download it</a> and watch it with your favorite video player!</video>';

	if ($modalVideo != 'false') {

		$video .= '<button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>';		

		$video .= '</div>';

		if ($modalVideo == 'true-button') {

			$video .= '<a' . ($centeredButtonWidth != '' ? ' style="width:' . $centeredButtonWidth . ';text-align:center;"' : '') . ' href="#" class="da-button ' . $buttonStyle . ' da-' . $a['button_size'] . '-button ' . ($buttonAlignment != 'none/inline' ? $buttonAlignment : '') . '" data-open="modal-video-' . $modalID . '">' . $a['button_text'] . '</a>';
		
		} else if ($modalVideo == 'true-image') {

			$video .= '<a href="#" data-open="modal-video-' . $modalID . '"><img class="' . $modalImageAlignment . '" src="' . $modalImageSrc . '" alt="Click to open the ' . $videoTitle . ' video." /></a>';

		}

	}

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
			'icon' => get_template_directory_uri() . '/img/icon-da.png',
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'p',
					'class' => '',
					'heading' => 'Video Title',
					'param_name' => 'title',        
					'description' => 'Enter the video title here. Is not displayed, for reference only.',
					'admin_label' => false,
				),
				array(
					'type' => 'textfield',
					'holder' => 'p',
					'class' => '',
					'heading' => 'Video Media Library URL',
					'param_name' => 'src',        
					'description' => 'Enter the video URL here after uploading it to the media library. <a href="' . get_site_url() . '/wp-admin/media-new.php" target="_blank">Click here</a> to upload the video file, or <a href="' . get_site_url() . '/wp-admin/upload.php" target="_blank">click here</a> to select an already uploaded video\'s URL.',
					'admin_label' => false,
				),			
            	array(
                	'type' => 'attach_image',
                	'heading' => 'Placeholder Poster Image',
                	'holder' => '',
                	'class' => '',
                	'param_name' => 'poster',
                	'description' => 'Upload the image here that will be used as the placeholder poster.',
            	),
            	array(
					'type' => 'dropdown',
					'heading' => 'Video Modal',
					'value' => array(
						'False' => 'false',
						'True - Button Click' => 'true-button',
						'True - Image Click' => 'true-image',
					),
					'admin_label' => false,
					'param_name' => 'modal',
					'description' => 'Choose whether or not the video should be in a modal, or directly embeded on the page.',
					'std' => 'false',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Modal Open Button Style',
					'value' => array(
						'Primary' => 'primary',
						'Secondary' => 'secondary',
						'Tertiary' => 'tertiary',
						'Quaternary' => 'quaternary',
					),
					'admin_label' => false,
					'param_name' => 'button_style',
					'description' => 'Choose the modal button style.',
					'std' => 'primary',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-button',
            		),
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Modal Open Button Size',
					'value' => array(
						'Large' => 'large',
						'Medium' => 'medium',
						'Small' => 'small',						
					),
					'admin_label' => false,
					'param_name' => 'button_size',
					'description' => 'Choose the modal button size.',
					'std' => 'large',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-button',
            		),
				),
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Modal Open Button Text',
					'param_name' => 'button_text',        
					'description' => 'Enter the modal open button text.',
					'admin_label' => false,
					'std' => 'Click to Play Video',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-button',
            		),
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Button Alignment',
					'value' => array(
						'None/Inline' => 'none/inline',
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'admin_label' => false,
					'param_name' => 'button_align',
					'description' => 'Choose the button alignment. Defaults to inline.',
					'std' => 'none/inline',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-button',
            		),					
				),
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Button Width',
					'param_name' => 'width',        
					'description' => 'Enter the button\'s width. Use either percent or pixel, and include the trailing "%" or "px". Example: 225px or 75%. This is only used with a centered button.',
					'admin_label' => false,
					'dependency' => array(
						'element' => 'button_align',
						'value' => 'center',
					),				
				),
				array(
                	'type' => 'attach_image',
                	'heading' => 'Modal Click Image',
                	'holder' => '',
                	'class' => '',
                	'param_name' => 'modal_image',
					'description' => 'Upload the image here that will be used to click on to open the video modal.',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-image',
            		),
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Modal Image Alignment',
					'value' => array(
						'None/Inline' => 'inline',
						'Left' => 'alignleft',
						'Center' => 'centered',
						'Right' => 'alignright',
					),
					'admin_label' => false,
					'param_name' => 'modal_image_align',
					'description' => 'Choose the modal image alignment. Defaults to inline.',
					'std' => 'inline',
					'dependency' => array(
            			'element' => 'modal',
            			'value' => 'true-image',
            		),					
				),
			),
		));

	}

}

add_action('vc_before_init', 'html5_video_shortcode_vc');

?>