<?php 

function data_axle_button($atts) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'target' => '_self',
		'link' => '',		
		'style' => 'primary',
		'text_link_color' => '',
		'size' => '',
		'button_text' => 'Learn More',
		'align' => 'none',
		'width' => '',
		'class' => ''
	), $atts, 'da_button');

	$a['link'] = vc_build_link($a['link']);

	$buttonStyle = $a['style'];

	$centeredButtonWidth = $a['width'];

	if ($buttonStyle == 'primary') {
		$daButtonClass = 'da-primary-button';
	} elseif ($buttonStyle == 'secondary') {
		$daButtonClass = 'da-secondary-button';
	} elseif ($buttonStyle == 'tertiary') {
		$daButtonClass = 'da-tertiary-button';
	} elseif ($buttonStyle == 'quaternary') {
		$daButtonClass = 'da-quaternary-button';
	} elseif ($buttonStyle == 'quinary') {
		$daButtonClass = 'da-quinary-button';
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

	$buttonSize = $a['size'];

	if ($buttonSize == 'large') {
		$daButtonSize = 'da-large-button';
	} elseif ($buttonSize == 'medium') {
		$daButtonSize = 'da-medium-button';
	} elseif ($buttonSize == 'small') {
		$daButtonSize = 'da-small-button';
	} elseif ($buttonSize == '') {
		$daButtonSize = '';
	}

	$daButton = '<a ' . ($centeredButtonWidth != '' ? 'style="width:' . $centeredButtonWidth . ';text-align:center;"' : '') . ' href="' . $a['link']['url'] . '" target="' . $a['target'] . '" class="da-button ' . $daButtonClass . ' ' . $alignmentClass . ' ' . $a['class'] . ' ' . ($daButtonSize != '' ? $daButtonSize : '') . ($a['text_link_color'] == 'white' ? ' white-text-link' : '') . '">' . $a['button_text'] . '</a>';

	return $daButton;

}

add_shortcode('da_button', 'data_axle_button');

// map the shortcode to Visual Composer if Visual Composer exists
function data_axle_button_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Button',
			'base' => 'da_button',
			'class' => '',
			'content_element' => true,			
			'category' => 'Data Axle',
			'icon' => get_template_directory_uri() . '/img/icon-da.png',
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
					'heading' => 'Button Style',
					'value' => array(
						'Primary Yellow' => 'primary',
						'Secondary Grey' => 'secondary',
						'Blue Outline - Black Text' => 'tertiary',
						'Blue Outline - White Text' => 'quaternary',
						'Text Link with Arrow' => 'quinary',
					),
					'admin_label' => false,
					'param_name' => 'style',
					'description' => 'Choose the button style.',
					'std' => 'primary',
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Text Link Copy Color',
					'value' => array(
						'Black' => 'black',
						'White' => 'white',
					),
					'admin_label' => false,
					'param_name' => 'text_link_color',
					'description' => 'Choose the color for the copy of a text only link.',
					'std' => 'black',
					'dependency' => array(
						'element' => 'style',
						'value' => 'quinary',
					),
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Button Size',
					'value' => array(
						'No Size - Text Link' => '',
						'Large' => 'large',
						'Medium' => 'medium',
						'Small' => 'small',
					),
					'admin_label' => false,
					'param_name' => 'size',
					'description' => 'Choose the button size.',
					'std' => '',
				),

				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Button Text',
					'param_name' => 'button_text',        
					'description' => 'Enter the button text.',
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
					'description' => 'Choose the button alignment. Defaults to inline.',
					'std' => 'none',
					'dependency' => array(
						'element' => 'style',
						'value' => array('primary','secondary','tertiary','quaternary'),
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
						'element' => 'align',
						'value' => 'center',
					),				
				),

				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Custom Class',
					'param_name' => 'class',        
					'description' => 'Enter an optional custom class or classes here.',
					'admin_label' => false,				
				),
				
			),
		));

	}

}

add_action('vc_before_init', 'data_axle_button_vc');

?>