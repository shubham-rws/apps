<?php 
/********************************************************************
Keep this clean, use includes and
and a folder structure for functions
********************************************************************/

// php constants
include_once 'infogroup-includes/constants.php';

// enqueue scripts and styles
include_once 'infogroup-includes/enqueue-scripts-styles.php';

// clean up the head - borrowed from FoundationPress 
// https://github.com/olefredrik/FoundationPress/blob/master/library/cleanup.php
include_once 'infogroup-includes/cleanup.php';

// theme support (thumbnails, sidebars, etc) 
include_once 'infogroup-includes/theme-support.php';

// navigation menus 
include_once 'infogroup-includes/navigation-menus.php';

// widget areas 
include_once 'infogroup-includes/widget-areas.php';

// Visual Composer Mods
include_once 'infogroup-includes/visual-composer-mods/visual-composer-mods.php';

// Redux Framework for theme options
include_once 'infogroup-includes/theme-options.php';

// Mobile Detect - http://mobiledetect.net/
include_once 'infogroup-includes/mobile-detect.php';

// Post status change email
//include 'infogroup-includes/post-status-change-email.php';

// dev/test/prod environment url swapping
include_once 'infogroup-includes/environment-url-swap.php';

// include all shortcode files in shortcodes directory
foreach (glob(THEMEDIRECTORYPATH . '/infogroup-includes/shortcodes/*.php') as $shortcodeFile) {
    include_once $shortcodeFile;
}

// local GTM file update with cron job
include 'infogroup-includes/gtm/gtm-cron.php';

// include the IUSA registration api call and custom form validation
include_once 'infogroup-includes/ican-registration-api.php';

// include the alter to the main query for only url bucket archives
include_once 'infogroup-includes/url-bucket-archive-loop-alter.php';

// include the IUSA login API call - Gravity Form #5
include_once 'infogroup-includes/ican-login-api.php';

// include the promo modal
include_once 'infogroup-includes/easy-content-types.php';

// include the promo modal
include_once 'infogroup-includes/modal.php';

// include the promo modal
include_once 'infogroup-includes/gravity-forms.php';

function dataaxle_cdn_attachments_urls($url, $post_id) {

  return str_replace($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/lp/wp-content/uploads', 'https://cdn.dataaxlecanada.ca/dev/wp-content/uploads', $url);
}
add_filter('wp_get_attachment_url', 'dataaxle_cdn_attachments_urls', 10, 2);


function to_cdn($src) {
    $dslash_pos = strpos($src, '//') + 2;
    $src_pre  = substr($src, 0, $dslash_pos); // http:// or https://
    $src_post = substr($src, $dslash_pos); // The rest after http:// or https://
   /* return $src_pre . 'cdn.' . $src_post;*/
    return str_replace($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/lp/wp-content/uploads', 'https://cdn.dataaxlecanada.ca/dev/wp-content/uploads', $src);
}


function dataaxle_calculate_image_srcset($sources, $size_array, $image_src, $image_meta, $attachment_id) {
    if(!is_admin()) {
        $images = [];
        foreach($sources as $source) {
            $src = to_cdn($source['url']); // To CDN
            $images[] = [
                'url' => $src,
                'descriptor' => $source['descriptor'],
                'value' => $source['value']
            ];
        }
        return $images;
    }
  return $sources;
}
add_filter('wp_calculate_image_srcset', 'dataaxle_calculate_image_srcset', 10, 5);

?>