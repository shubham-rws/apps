<?php 

/*******************************************************
	This code only works with the
	Easy Content Types plugin
	https://themeisle.com/plugins/easy-content-types/
	We use it to build custom post types and meta fields
*******************************************************/

// include plugins.php so we can check if a plugin 
// is active from the front end of the site
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

$easyContentTypesActive = is_plugin_active('easy-content-types/easy-content-types.php');

// if Easy Content Types is active
if ($easyContentTypesActive) {

	// append custom fields types to $field_types array
	function infogroup_ecpt_field_types($field_types) {
		
		$field_types[] = 'modals';
		$field_types[] = 'activegravityforms';
 
		return $field_types;

	}

	add_filter('ecpt_field_types', 'infogroup_ecpt_field_types');

	// output the HTML for the custom field types
	function infogroup_ecpt_fields_html($field_html, $field, $meta) {
	
		switch($field['type']) :
 
			case 'modals' :

				$modalPages = get_posts(array(
    				'post_type'      => 'modals',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
				));

				if (isset($_GET['post'])) {

					$currentPostID = $_GET['post'];

					if (get_post_meta($currentPostID, 'ecpt_custommodal', true)) {
					
						$savedMetaValue = get_post_meta($currentPostID, 'ecpt_custommodal', true);

					} else {

						$savedMetaValue = 'none';

					}

				}

				$field_html = '<select id="' . $field['id'] . '" name="' . $field['id'] . '">';

				foreach ($modalPages as $modalPage) {

					$meta = $modalPage->ID;

					$selected = '';

					if ($savedMetaValue == $meta) {

						$selected = 'selected';

					}
					
					$field_html .= '<option ' . $selected . ' value="' . $meta . '">' . $modalPage->post_title . '</option>';

				}

				$field_html .= '</select>';

				$field_html .= '<br/>' . $field['desc'];
				
			break;

			case 'activegravityforms' :

				$gravityForms = GFAPI::get_forms();

				$pageModalSelectForms = array();

				foreach ($gravityForms as $gravityForm) {

    				$pageModalSelectForms[$gravityForm['id']] = $gravityForm['title'];
        
				}

				if (isset($_GET['post'])) {

					$currentPostID = $_GET['post'];

					if (get_post_meta($currentPostID, 'ecpt_activegravityforms', true)) {
					
						$savedMetaValue = get_post_meta($currentPostID, 'ecpt_activegravityforms', true);

					} else {

						$savedMetaValue = 'none';

					}

				}

				$field_html = '<select id="' . $field['id'] . '" name="' . $field['id'] . '">';			

				foreach ($pageModalSelectForms as $pageModalSelectFormKey => $pageModalSelectForm) {
					
					$meta = $pageModalSelectFormKey;

					$selected = '';

					if ($savedMetaValue == $meta) {

						$selected = 'selected';

					}
					
					$field_html .= '<option ' . $selected . ' value="' . $meta . '">' . $pageModalSelectForm . '</option>';

				}

				$field_html .= '</select>';

				$field_html .= '<br/>' . $field['desc'];
				
			break;
 
		endswitch;
 
		return $field_html;

	}

	add_filter('ecpt_fields_html', 'infogroup_ecpt_fields_html', 10, 3);		

}

?>