<?php

class RewriteUrls{
	 public static $urlArray = '';
}

function setEnvironment() {
	if ($_SERVER['SERVER_ENVIRONMENT'] =='dev') {
		RewriteUrls::$urlArray = array(			
			'/http[s]?:\\/\\/(infocanada|testinfocanada|devinfocanada)?\\.?wpengine\\.com/i' => get_site_url(),
			'/http[s]?:\\/\\/(infogroup|test-infogroup|dev-infogroup)\\.infocanada\\.ca/i' => 'http://dev-infogroup.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.infocanada\\.ca/i' => 'https://dev.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.salesgenie\\.com/i' => 'https://dev.salesgenie.com',
			'/http[s]?:\\/\\/(www|test|dev|home)\\.infousa\\.com/i' => 'https://dev-cms.infousa.com'
		);
	} elseif ($_SERVER['SERVER_ENVIRONMENT'] =='test'){
		RewriteUrls::$urlArray = array(			
			'/http[s]?:\\/\\/(infocanada|testinfocanada|devinfocanada)?\\.?wpengine\\.com/i' => get_site_url(),
			'/http[s]?:\\/\\/(infogroup|test-infogroup|dev-infogroup)\\.infocanada\\.ca/i' => 'https://test-infogroup.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.infocanada\\.ca/i' => 'https://test.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.salesgenie\\.com/i' => 'https://test.salesgenie.com',
			'/http[s]?:\\/\\/(www|test|dev|home)\\.infousa\\.com/i' => 'https://test-cms.infousa.com'
		);
	} elseif ($_SERVER['SERVER_ENVIRONMENT'] =='prod') {
		RewriteUrls::$urlArray = array(			
			'/http[s]?:\\/\\/(infocanada|testinfocanada|devinfocanada)?\\.?wpengine\\.com/i' => get_site_url(),
			'/http[s]?:\\/\\/(infogroup|test-infogroup|dev-infogroup)\\.infocanada\\.ca/i' => 'https://www.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.infocanada\\.ca/i' => 'https://www.infocanada.ca',
			'/http[s]?:\\/\\/(www|test|dev)\\.salesgenie\\.com/i' => 'https://www.salesgenie.com',
			'/http[s]?:\\/\\/(www|test|dev|home)\\.infousa\\.com/i' => 'https://www.infousa.com'
		);
	}
}

if (DB_NAME == 'db3951761922') {
	$_SERVER['SERVER_ENVIRONMENT'] = 'dev';
} elseif (DB_NAME == 'db6111235593') {
	$_SERVER['SERVER_ENVIRONMENT'] = 'test';
} else {
	$_SERVER['SERVER_ENVIRONMENT'] = 'prod';
}

setEnvironment();

function my_the_content_filter($content) {
	foreach(RewriteUrls::$urlArray as $k => $v) {
//		log_to_console('k  ' . $k);
//		log_to_console('V  ' . $v);
//		log_to_console($content);
		
		if (strcmp($k[0],'/')==0) {
			$content = preg_replace($k, $v, $content);				
		}
		else {
			$content = str_replace($k, $v, $content);
		}
		
//		log_to_console('output ' . $content);
	}

	return $content;
}

add_filter('the_content', 'my_the_content_filter');
add_filter('walker_nav_menu_start_el' , 'my_the_content_filter');

function log_to_console($text){	
     echo "<script>console.log( 'Debug Objects: " . $text . "' );</script>";
	 	 
//	if ( is_array( $data ) )
//        $output = "<script>console.log( 'Debug Objects Array: " . implode( ',', $data) . "' );</script>";
//    else
//        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
//	echo $output;
		 
//	foreach($args as $k => $v) {
//			$output .= "<script>console.log( 'Debug Objects: " . $k . "=" . $v . "' );</script>";
//			echo $k . '==' . $v . ';';
//		}	
		 
     return $item_output;
}

function new_excerpt_more( ) {
			return ' ... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More &raquo;</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function infogroup_scripts() {
	wp_enqueue_script( 'email', get_template_directory_uri() . '/js/email.js');
	wp_enqueue_script( 'search', get_template_directory_uri() . '/js/search.js');
	wp_enqueue_script('js-cookie', get_template_directory_uri() . '/js/js.cookie.js', array('jquery'), null, true);
	wp_enqueue_script('infogroup', get_template_directory_uri() . '/js/infogroup-custom.js', array('jquery', 'js-cookie'), null, true);
}
add_action( 'wp_enqueue_scripts', 'infogroup_scripts' );

add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'header-menu' => 'Header Menu',
          'top-2' => 'Nav2 Menu',	
          'main-menu' => 'Main Menu',
          'footer-menu-1' => 'Footer Menu Col 1',
          'footer-menu-2' => 'Footer Menu Col 2',
          'footer-menu-3' => 'Footer Menu 3',
          
          'fr-header-menu' => 'FR Header Menu',
          'fr-top-2' => 'FR Nav2 Menu',	
          'fr-main-menu' => 'FR Main Menu',
          'fr-footer-menu-1' => 'FR Footer Menu Col 1',
          'fr-footer-menu-2' => 'FR Footer Menu Col 2',
          'fr-footer-menu-3' => 'FR Footer Menu Col 3'
        )
    );
}

add_filter('nav_menu_css_class', 'ss_nav_menu_css_class', 10, 3);

function ss_nav_menu_css_class($classes, $item, $args) {
    if (array_search('menu-item-has-children', $classes) !== false) {
        $classes[] = 'dropdown';
    }
    return $classes;
}

// add_filter('nav_menu_link_attributes', 'ss_nav_menu_link_attributes', 10, 3);
// function ss_nav_menu_link_attributes($atts, $item, $args) {
//     if (array_search('menu-item-has-children', $item->classes) === false) return $atts;
//     $atts['data-toggle'] = 'dropdown';
//     $atts['class'] = 'dropdown-toggle';
//     return $atts;
// }

class SS_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="dropdown-menu">';
    }   
}
function change_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','change_submenu_class');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets 1',
		'id'   => 'sidebar-widgets-1',
		'description'   => 'Widget Area 1',
		'before_widget' => '<div id="sidebar-widget-1" class="">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 style="display: none">',
		'after_title'   => '</h2>'
	));
}
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets 2',
		'id'   => 'sidebar-widgets-2',
		'description'   => 'Widget Area 2',
		'before_widget' => '<div id="sidebar-widget-2" class="">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 style="display: none">',
		'after_title'   => '</h2>'
	));
}
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'FR Sidebar Widgets 1',
		'id'   => 'fr-sidebar-widgets-1',
		'description'   => 'FR Widget Area 1',
		'before_widget' => '<div id="sidebar-widget-1" class="">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 style="display: none">',
		'after_title'   => '</h2>'
	));
}
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'FR Sidebar Widgets 2',
		'id'   => 'fr-sidebar-widgets-2',
		'description'   => 'FR Widget Area 2',
		'before_widget' => '<div id="sidebar-widget-2" class="">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 style="display: none">',
		'after_title'   => '</h2>'
	));
}

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

if(!function_exists('infocanada_check_locale')){
  function infocanada_check_locale($locale) {
    global $post;
    global $lang;
    global $companion_page;
    $lang = get_post_meta($post->ID, 'lang',true);
    $companion_page = get_post_meta($post->ID, 'page',true);
    if($lang == 'FR') {
      $locale = "fr_FR";
    }
    return $locale;
  }
}
add_filter('locale', 'infocanada_check_locale', 10);


//'theme_location' => 'header-menu', 'container' =>'nav', 'menu_class' => 'menu header-menu'
// function new_nav_menu_items($items, $args) {
//     if( ($args->menu->name == 'header-menu')  || ($args->menu->name == 'fr-header-menu') )  {
//         $langlink = infocanada_language_link();
//         $items = $langlink . $items;
//     }
//     return $items;
// }
// add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );

function your_custom_menu_item ( $items, $args ) {
	
	// if(!function_exists('infocanada_language_link')){
// 	  function infocanada_language_link() {
		global $lang;
		global $companion_page;
		if ($lang && $companion_page) {
			if ($args->theme_location == 'header-menu') {
				$items .= '<li><a href="' . $companion_page . '">Fran&ccedil;ais</a></li>';
			} else if ($args->theme_location == 'fr-header-menu') {
				$items .= '<li><a href="' . $companion_page . '">English</a></li>';
			}
		}
		return $items;
	}


?>
