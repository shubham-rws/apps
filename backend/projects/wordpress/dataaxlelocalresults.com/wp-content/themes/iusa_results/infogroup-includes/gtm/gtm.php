<?php
    
    // make redux theme options available to file
    global $infogroup_options;

    $postTypeObject = get_post_type_object(get_post_type($post->ID));

    // categories from "Post" post type to GTM for content grouping
    $currentPostType = (is_archive() ? post_type_archive_title('', false) . ' Archive Page' : $postTypeObject->labels->singular_name);
    
    $currentPostTaxonomy = (!is_archive() ? get_post_taxonomies($post->ID) : '');
    
    $sendTermToGTM = false;
    
    if (($currentPostType == 'blog') && (is_single($post->ID))) {
    
    	$sendTermToGTM = true;
    
        $currentPostTerms = get_the_terms($post->ID, $currentPostTaxonomy['0']);
    
        $firstOrOnlyPostTerm = $currentPostTerms['0']->name;
    
    }

    // GTM Live (local gtm.js) or preview (external gtm.js)
    // if ($infogroup_options['gtm-live-or-preview'] == '1') {

    //     // preview GTM on
    //     $gtmSrcURL = 'https://www.googletagmanager.com/gtm.js';

    // } else {

    //     // live GTM
    //     $gtmSrcURL = THEMEDIRECTORYURI . '/gtm/gtm.js';

    // }

?>    

<!-- Google Tag Manager -->
<script type="text/javascript">
  
    var dataLayer = window.dataLayer = window.dataLayer || [];
    
    // use this format: 'key':'value',
    dataLayer.push({
        'contentGroup': 'Landing Page',
	    'postCategory': '<?php echo ($sendTermToGTM ? $firstOrOnlyPostTerm : ''); ?>',
    });

    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-<?php echo GTMID; ?>');
  
</script>
<!-- End Google Tag Manager -->