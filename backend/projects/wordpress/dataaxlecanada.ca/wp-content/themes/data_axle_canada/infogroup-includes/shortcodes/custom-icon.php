<?php 

function custom_icon($atts) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'type' => 'fontawesome',
		'icon_fontawesome' => 'fa fa-check',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_color' => '#fa6b07',
		'link' => '',
		'icon_size' => '16',
		'align' => 'center',
		'class' => '',
	), $atts, 'ig_icon');

	$iconLink = vc_build_link($a['link']);



	$iconLibrary = $a['type'];

	switch ($iconLibrary) {

		case '':
			$iconClass = $a['icon_fontawesome'];
			break;
    	case 'fontawesome':
    	    $iconClass = $a['icon_fontawesome'];
    	    break;
    	case 'openiconic':
    	    $iconClass = $a['icon_openiconic'];
    	    break;
    	case 'typicons':
    	    $iconClass = $a['icon_typicons'];
    	    break;
    	    
	}

	$iconAlign = $a['align'];

	$centerIcon = false;

	switch ($iconAlign) {

		case 'none':
			$iconAlignment = '';
			break;
    	case 'left':
    	    $iconAlignment = 'display:block;float:left;';
    	    break;
    	case 'center':
    		$centerIcon = true;
    	    $iconAlignment = '';
    	    break;
    	case 'right':
    	    $iconAlignment = 'display:block;float:right;';
    	    break;
    	    
	}

	

	$icon = ($centerIcon ? '<span style="margin-left:auto;margin-right:auto;display:block;width:' . $a['icon_size'] . 'px;">' : '') . (!empty($iconLink['url']) ? '<a class="' . $a['class'] . '" href="' . $iconLink['url'] . '">' : '') . '<i style="color:' . $a['icon_color'] . ';font-size:' . $a['icon_size'] . 'px;' . $iconAlignment . '" class="igIcon ' . $iconClass . '"></i>' . (!empty($iconLink['url']) ? '</a>' : '') . ($centerIcon ? '</span>' : '');

	return $icon;

}

add_shortcode('ig_icon', 'custom_icon');

// map the shortcode to Visual Composer if Visual Composer exists
function custom_icon_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Single Custom Icon',
			'base' => 'ig_icon',
			'class' => '',
			'content_element' => true,			
			'category' => 'Infogroup',
			'icon' => get_template_directory_uri() . '/img/icon-da.png',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Icon library', 'js_composer' ),
					'value' => array(
						__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
						__( 'Open Iconic', 'js_composer' ) => 'openiconic',
						__( 'Typicons', 'js_composer' ) => 'typicons',											
					),
					'admin_label' => true,
					'param_name' => 'type',
					'description' => __( 'Select icon library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-check',
					// default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single 	page
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'fontawesome',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial',
					// default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'openiconic',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness',
					// default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),								
				array(
					'type' => 'colorpicker',
					'heading' => 'Icon Color',
					'param_name' => 'icon_color',
					'description' => 'Select custom icon color.',					
				),
				array(
					'type' => 'vc_link',
					'holder' => '',
					'class' => '',
					'heading' => 'Icon Link URL',
					'param_name' => 'link',        
					'description' => 'Choose the icon\'s anchor URL.',
					'admin_label' => false,				
				),
				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Icon Size',
					'param_name' => 'icon_size',        
					'description' => 'Enter the icon\'s size here. Enter only numbers, no em, px, rem, etc.',
					'admin_label' => true,
					'value' => '16',
				),
				array(
            		'type' => 'dropdown',
            		'holder' => '',
            		'class' => '',
            		'heading' => 'Icon Alignment',
            		'param_name' => 'align',        
            		'value' => array(
                  		'None' => 'none',
            			'Left' => 'left',
            			'Center' => 'center',
            			'Right' => 'right',
  					),
  					'std' => 'center',
  					'description' => 'Choose the icon alignment. Default is none.',
  				),
  				array(
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'Custom Class',
					'param_name' => 'class',        
					'description' => 'Enter a custom class name here. - Optional',
					'admin_label' => false,					
				),
				
			),
		));

	}

}

add_action('vc_before_init', 'custom_icon_vc');

?>