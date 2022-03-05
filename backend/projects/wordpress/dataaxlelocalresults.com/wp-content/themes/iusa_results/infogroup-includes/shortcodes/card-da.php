<?php 

function data_axle_card($atts) {

    // set the shortcode attributes
	$a = shortcode_atts(array(
		'target' => '_self',
        'link' => '',
        'primary_image' => '',
        'header' => '',
        'copy' => '',
		'link_text' => '',
		'class' => ''
    ), $atts, 'da_card');

    $primaryImage = $a['primary_image'];

    $a['link'] = vc_build_link($a['link']);

	$headerCopy = $a['header'];
	
	$linkText = $a['link_text'];

	if (is_numeric($primaryImage)) {

		$primaryImageSrc = wp_get_attachment_url($primaryImage, 'data-axle-card-image');

	} else {

		$primaryImageSrc = $primaryImage;

    }
    
    $daCard = '<div class="data-axle-card ' . $a['class'] . '" data-equalizer-watch>';
    
    if (!empty($primaryImage)) {

        $daCard .= '<img class="da-card-primary-image" src="' . $primaryImageSrc . '" alt="" />';

    }

    $daCard .= '<div class="da-card-bottom-container">';

    if (!empty($headerCopy)) {

        $daCard .= '<h3>' . $a['header'] . '</h3>';

    }
    
	$daCard .= '<p>' . $a['copy'] . '</p>';
	
	if (!empty($linkText)) {

		$daCard .= '<a href="' . $a['link']['url'] . '" target="' . $a['target'] . '" class="da-button da-quinary-button">' . $linkText . '</a>';

	}
    
    $daCard .= '</div></div>';

    return $daCard;

}

// add the Data Axle Card shortcode
add_shortcode('da_card', 'data_axle_card');

// map the shortcode to Visual Composer if Visual Composer exists
function data_axle_card_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Data Axle Card',
			'base' => 'da_card',
			'class' => '',
			'content_element' => true,			
			'category' => 'Data Axle',
			'icon' => get_template_directory_uri() . '/img/icon-da.png',
			'params' => array(

                array(
					'type' => 'dropdown',
					'heading' => 'Card Link Target',
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
					'heading' => 'Card Link URL',
					'param_name' => 'link',        
					'description' => 'Choose the card\'s anchor URL.',
					'admin_label' => false,				
                ),
                
                array(
                	'type' => 'attach_image',
                	'heading' => 'Primary Image',
                	'holder' => '',
                	'class' => '',
                	'param_name' => 'primary_image',
                	'description' => 'Upload the card\'s primary image here. <strong>Upload 400x350 only.</strong>',
                ),

                array(
					'type' => 'textarea',
					'heading' => 'Header Copy',
					'param_name' => 'header',
					'description' => 'Enter the card\'s header copy here. - Optional',
                ),

                array(
					'type' => 'textarea',
					'heading' => 'Card Copy',
					'param_name' => 'copy',
					'description' => 'Enter the card\'s copy here.',
                ),

                array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Card Link Text',
					'param_name' => 'link_text',        
					'description' => 'Enter the text for the card\'s link.',					
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

add_action('vc_before_init', 'data_axle_card_vc');
			
?>