<?php

$visualComposerActive = is_plugin_active('js_composer/js_composer.php');

function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {

  if ($tag == 'vc_row' || $tag == 'vc_row_inner') {

  	if (strpos($class_string, 'row-o-equal-height') !== false) {

 	   return $class_string;

	} else {

		$class_string = str_replace('vc_row', 'row', $class_string); // This will replace "vc_row-fluid" with "row"

	}

  }  

  return $class_string; // Important: you should always return modified or original $class_string

}

// add new parameter to the full visual composer row shortcode
// that allows the shortcode to respect the main center column
// and not be full width
$attributes = array(
	'type' => 'dropdown',
    'holder' => '',
    'class' => '',
    'heading' => 'Full Width Row',
	'param_name' => 'full_width_row',        
	'value' => array(
        'False' => 'false',
        'True' => 'true',            			            	
	),
  	'std' => 'false',
  	'description' => 'Select True to make the row be full width. Default is False, and that will make the row resect the main center column\'s width.',
  	'weight' => 9999,
);

if ($visualComposerActive) {

	// change CSS class on VC row element
	add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

	// add param to VC row shortcode
	vc_add_param('vc_row', $attributes);

	// change the visual composer shortcode template directory
	vc_set_shortcodes_templates_dir(THEMEDIRECTORYPATH . '/infogroup-includes/visual-composer-mods/shortcode-templates');

	// remove the row_stretch parameter from visual composer row shortcode
	// as it didnt' work with our theme front end framework (Foundation 6)
	vc_remove_param('vc_row', 'full_width');

	//array of visual composer shortcodes we want to remove
	$vcShortcodes = array('vc_icon', 'vc_btn');

	//remove visual composer shortcodes that are defined in the above array
	foreach ($vcShortcodes as $vcShortcode) {
		vc_remove_element($vcShortcode);
	}

	// add new parameter to [gravityform] shortcode for custom button text	
	$gravityFormAttributes = array(
    	array(
        	'type' => 'textfield',
      		'holder' => '',
      		'class' => '',
      		'heading' => 'Custom Submit Button Text',
      		'param_name' => 'button_text',        
      		'description' => 'Enter custom text for the submit button here. - Optional, defaults to form default copy.',
      		'admin_label' => true
    	),
    	array(
      		'type' => 'dropdown',
            'holder' => '',
            'class' => '',
            'heading' => 'Single Full Name Field',
            'param_name' => 'single_full_name',        
            'value' => array(
              'True' => 'true',
              'False' => 'false',             
        	),
        	'std' => 'false',
        	'description' => 'True to have a single full name field, false to have first and last name fields.',
      		'dependency' => array(
        		'element' => 'id',
        		'value' => '1',
      		),  
    	)
  	);

	vc_add_params('gravityform', $gravityFormAttributes);

	// define the shortcode_atts_gravityform callback 
	function filter_gravity_form_shortcode_atts($out, $pairs, $atts, $shortcode) {

    	if (array_key_exists('button_text', $atts)) {
  		    		
    		//print_r($atts);

    		$currentGravityForm = 'gform_submit_button_' . $atts['id'];

    		$GLOBALS['gravityFormButtonText'] = $atts['button_text'];

    		$changeGravityFormButton = function($button, $form) {

    			$newButton = preg_replace('/\svalue=.*?\s/', 'value="' . $GLOBALS['gravityFormButtonText'] . '"', $button);

    			return $newButton;

    		};

    		add_filter($currentGravityForm, $changeGravityFormButton, 10, 2);
    		
    	}

    	if (array_key_exists('single_full_name', $atts) && $atts['single_full_name'] == 'true') {

        $singleFullName = function($form) {         

          foreach ($form['fields'] as &$field) {

            if ($field->id == '1') {
                
                $field->placeholder = 'First and Last Name';
              
              } else if ($field->id == '2') {
                
                $field->visibility = 'hidden';

                $field->isRequired = '0';

                $field->defaultValue = 'See First Name Field';
              
              }

            }

          return $form;

        };

        add_filter('gform_pre_render_1', $singleFullName);        

      }

    	return $out; 

	}; 
         
	// add the filter 
	add_filter('shortcode_atts_gravityforms', 'filter_gravity_form_shortcode_atts', 10, 4);

}

?>