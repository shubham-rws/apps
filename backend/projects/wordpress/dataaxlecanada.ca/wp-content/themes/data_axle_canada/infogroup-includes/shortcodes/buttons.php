<?php 

function infogroup_button($atts) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'target' => '_self',
		'link' => '',
		'color' => 'green',
		'style' => 'solid',
		'width' => 'auto',
		'button_text' => 'Learn More',
		'align' => 'none',
		'class' => ''
	), $atts, 'ig_button');

	$a['link'] = vc_build_link($a['link']);

	$buttonColor = $a['color'];

	$customCSSclass = $a['class'];

	if ($buttonColor == 'green') {
		$colorClass = 'ig-green-button';
	} elseif ($buttonColor == 'darkgreen') {
		$colorClass = 'ig-darkgreen-button';
	} elseif ($buttonColor == 'orange') {
		$colorClass = 'ig-orange-button';
	} elseif ($buttonColor == 'white') {
		$colorClass = 'ig-white-button';
	}

	$buttonAlignment = $a['align'];

	if ($buttonAlignment == 'left') {
		$alignmentClass = 'float-left';
	} elseif ($buttonAlignment == 'center') {
		$alignmentClass = 'float-center';
	} elseif ($buttonAlignment == 'right') {
		$alignmentClass = 'float-right';
	} else {
		$alignmentClass = '';
	}

	$igButton = '<a style="width:' . $a['width'] . ';" href="' . $a['link']['url'] . '" target="' . $a['target'] . '" class="' . (!empty($customCSSclass) ? $customCSSclass . ' ' : '') . 'ig-button ' . ($a['style'] == 'solid' ? 'ig-button-solid ' : 'ig-button-outline ') . $colorClass . ' ' . $alignmentClass . '">' . $a['button_text'] . '</a>';

	return $igButton;

}

add_shortcode('ig_button', 'infogroup_button');

// map the shortcode to Visual Composer if Visual Composer exists
function infogroup_button_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Button',
			'base' => 'ig_button',
			'class' => '',
			'content_element' => true,			
			'category' => 'Infogroup',
			'icon' => get_template_directory_uri() . '/img/i.png',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Button URL Target',
					'value' => array(
						'Same Window' => '_self',
						'New Window' => '_blank',
					),
					'admin_label' => false,
					'param_name' => 'target',
					'description' => 'Choose to open the link in the same or new window.',
					'std' => '_self',
				),
				
				array(
					'type' => 'vc_link',
					'holder' => '',
					'class' => '',
					'heading' => 'Button URL',
					'param_name' => 'link',        
					'description' => 'Choose the button\'s anchor URL.',
					'admin_label' => false,				
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Button Color',
					'value' => array(
						'Green' => 'green',
						'Dark Green' => 'darkgreen',
						'Orange' => 'orange',
						'White' => 'white',
					),
					'admin_label' => false,
					'param_name' => 'color',
					'description' => 'Choose the button\'s color.',
					'std' => 'green',
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Button Style',
					'value' => array(
						'Solid' => 'solid',
						'Outline' => 'outline',
					),
					'admin_label' => false,
					'param_name' => 'style',
					'description' => 'Choose button\'s style.',
					'std' => 'solid',
				),

				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Button Width',
					'param_name' => 'width',        
					'description' => 'Enter the button\'s width. Use either percent or pixel, and include the trailing "%" or "px". Example: 225px or 75%. Defaults to auto width based on text length.',
					'admin_label' => false,				
				),

				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Button Text',
					'param_name' => 'button_text',        
					'description' => 'Enter the button\'s text.',
					'admin_label' => true,
					'value' => 'Learn More'			
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Button Alignment',
					'value' => array(
						'None/Inline' => 'none',
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'admin_label' => false,
					'param_name' => 'align',
					'description' => 'Choose the button\'s alignment. Defaults to inline.',
					'std' => 'green',
				),

				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Custom Class',
					'param_name' => 'class',        
					'description' => 'Optional - Enter a custom CSS class name here.',
					'admin_label' => false,								
				),
				
			),
		));

	}

}

add_action('vc_before_init', 'infogroup_button_vc');

?>