<?php 

function custom_icon_list($atts, $content = null) {

	// set the shortcode attributes
	$a = shortcode_atts(array(
		'type' => 'fontawesome',
		'icon_fontawesome' => 'fa fa-arrow-right',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_color' => '#fa6b07',
		'font_size' => '16',
		'margin_bottom' => 'true'
	), $atts, 'ig_list');

	$iconLibrary = $a['type'];

	$fontSize = $a['font_size'];

	$marginBottom = filter_var($a['margin_bottom'], FILTER_VALIDATE_BOOLEAN);

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

	$iconColor = $a['icon_color'];

	$listItemIconColumnWidth = $fontSize + 6;

	// enter strings to find - MUST HAVE A MATCHING REPLACE STRING IN THE NEXT ARRAY
	$find = array(
		'<ul>',
		'<li>',
		'</li>'
	);
	
	// enter strings to replace - MUST HAVE CORRESPONDING FIND STRING IN ABOVE ARRAY
	$replace = array(
		'<ul class="igIconList" style="font-size:' . $fontSize . 'px;list-style:none;' . (!$marginBottom ? 'margin-bottom:0' : '') . '">',
		'<li class="clearfix"><span style="margin-right:6px;width:' . $fontSize . ';" class="float-left"><i style="color:' . $iconColor . '" class="igIconListItem ' . $iconClass . '"></i></span><span style="width:calc(100% - ' . $listItemIconColumnWidth . 'px)" class="igIconListItemContent float-left">',
		'</span></li>'
	);

	$content = str_replace($find, $replace, $content);

	return $content;

}

add_shortcode('ig_list', 'custom_icon_list');

// map the shortcode to Visual Composer if Visual Composer exists
function custom_icon_list_vc() {

	if (defined('WPB_VC_VERSION')) {

		vc_map(array(
			'name' => 'Custom List with Icons',
			'base' => 'ig_list',
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
					'value' => 'fa fa-arrow-right',
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
					'type' => 'textfield',
					'holder' => '',
					'class' => '',
					'heading' => 'List Font Size',
					'param_name' => 'font_size',        
					'description' => 'Enter the list item\'s font size here. Enter only numbers, no em, px, rem, etc.',
					'admin_label' => true,
					'value' => '16',
				),
				array(
            		'type' => 'dropdown',
            		'holder' => '',
            		'class' => '',
            		'heading' => 'Allow Default Bottom Margin? - 1rem',
            		'param_name' => 'margin_bottom',        
            		'value' => array(
                  		'True' => 'true',
            			'False' => 'false',            	
  					),
  					'std' => 'true',
  					'description' => 'True to allow the list to have defautl bottom margin, False to remove it.',
  				),
				array(
					'type' => 'textarea_html',
					'heading' => 'Unordered List Only',
					'param_name' => 'content',
					'description' => 'Enter an unordered list in the editor below.',	
					'value' => '<ul><li>List Item</li></ul>',				
				),
			),
			//'js_view' => 'VcIconElementView_Backend',
		));

	}

}

add_action('vc_before_init', 'custom_icon_list_vc');

?>