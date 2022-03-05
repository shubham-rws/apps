<?php 

function text_rotator_shortcode($atts, $content = null) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'class' => ''		
	), $atts, 'text_rotator');

	$textRotator = '<div class="orbit ' . $a['class'] . '" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;"><ul class="orbit-container">';

	$textRotator .= do_shortcode($content);

	$textRotator .= '</ul></div>';

	return $textRotator;

}

add_shortcode('text_rotator', 'text_rotator_shortcode');

function text_rotator_slide_shortcode($atts, $content = null) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
			
	), $atts, 'text_rotator_slide_shortcode');

	$textRotatorSlide = '<li class="orbit-slide"><div>';

	$textRotatorSlide .= wpb_js_remove_wpautop($content, true);

	$textRotatorSlide .= '</div></li>';

	return $textRotatorSlide;

}

add_shortcode('text_rotator_slide', 'text_rotator_slide_shortcode');

function text_rotator_shortcode_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Text Rotator',
			'base' => 'text_rotator',
			'class' => '',
			'content_element' => true,			
			'category' => 'Infogroup',
			'as_parent' => array('only' => 'text_rotator_slide'),
			'is_container' => true,
			'js_view' => 'VcColumnView',
			'icon' => get_template_directory_uri() . '/img/i.png',
			'default_content' => '[text_rotator_slide][/text_rotator_slide]',
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Custom Class',
					'param_name' => 'class',
					'description' => 'Enter a custom class here - optional.',
					'admin_label' => true,
				)
			),
		));

		vc_map(array(
			'name' => 'Text Rotator Slide',
			'base' => 'text_rotator_slide',
			'class' => '',
			'content_element' => true,
			'as_child' => array('only' => 'text_rotator'),			
			'category' => 'Infogroup',
			'icon' => get_template_directory_uri() . '/img/i.png',
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'textarea_html',
					'heading' => 'Slide Text Copy',
					'param_name' => 'content',
					'description' => 'Enter the text copy for the slide here.',
					'admin_label' => true,				
				),
			),
		));

		if (class_exists('WPBakeryShortCodesContainer')) {
	
    		class WPBakeryShortCode_text_rotator extends WPBakeryShortCodesContainer {}
	
		}
	
		if (class_exists('WPBakeryShortCode')) {
	
    		class WPBakeryShortCode_text_rotator_slide extends WPBakeryShortCode {}
	
		}	
	
	}

}

add_action('vc_before_init', 'text_rotator_shortcode_vc');

?>