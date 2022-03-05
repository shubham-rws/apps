<?php

// build the content modal shortcode
function ig_bio_modal($atts, $content = null) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'name' => '',
		'title' => '',
		'photo' => ''
	), $atts, 'ig_bio_modal');

	$name = $a['name'];

	$title = $a['title'];

	$photo = $a['photo'];

	$modalID = uniqid();

	if (is_numeric($photo)) {

		$photoSrc = wp_get_attachment_url($photo, 'full');

	} else {

		$photoSrc = $photo;

	}

	$igModal = '';

	$igModal .= '<div class="bio-visible">';

	$igModal .= '<img data-open="bio-' . $modalID . '" src="' . $photoSrc . '" alt="' . $name . ' - ' . $title . '" />';

	$igModal .= '<p data-open="bio-' . $modalID . '"><strong>' . $name . '</strong><br/>' . $title . '</p>';

	$igModal .= '</div>';

	$igModal .= '<div class="bio-modal-hidden reveal row" id="bio-' . $modalID . '" data-reveal>';

	$igModal .= '<div class="column small-12 medium-4">';

	$igModal .= '<img src="' . $photoSrc . '" alt="' . $name . ' - ' . $title . '" />';

	$igModal .= '</div>';

	$igModal .= '<div class="column small-12 medium-8">';

	$igModal .= '<p><strong style="font-size:20px;">' . $name . '</strong><br/>' . $title . '</p>';

	$igModal .= wpautop($content);

	$igModal .= '</div>';

	$igModal .= '<button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>';

	$igModal .= '</div>';

	return $igModal;

}

add_shortcode('ig_bio_modal', 'ig_bio_modal');


// map the shortcode to Visual Composer if Visual Composer exists
function ig_bio_modal_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Bio Modal',
			'base' => 'ig_bio_modal',
			'class' => '',
			'content_element' => true,			
			'category' => 'Infogroup',
			'icon' => get_template_directory_uri() . '/img/i.png',
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Name',
					'param_name' => 'name',        
					'description' => 'Enter the person\'s name here.',
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Title',
					'param_name' => 'title',        
					'description' => 'Enter the person\'s title here.',
				),
				array(
                	'type' => 'attach_image',
                	'heading' => 'Bio Photo',
                	'holder' => '',
                	'class' => '',
                	'param_name' => 'photo',
                	'description' => 'Upload the person\'s bio photo here.',
            	),
            	array(
					'type' => 'textarea_html',
					'heading' => 'Bio Copy',
					'param_name' => 'content',
					'description' => 'Enter the person\'s bio copy here.',		
				),
			),
		));

	}

}

add_action('vc_before_init', 'ig_bio_modal_vc');
			
?>