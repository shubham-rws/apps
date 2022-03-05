<?php
/******************************
The template for displaying
the header on all pages
******************************/
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>

    <?php 

      // Google Experiments
      if (get_post_meta($post->ID, 'ecpt_experimentkey', true)) { ?>
        
        <!-- Google Analytics Content Experiment code -->
        <script>function utmx_section(){}function utmx(){}(function(){var
        k='<?php echo get_post_meta($post->ID, 'ecpt_experimentkey', true); ?>',d=document,l=d.location,c=d.cookie;
        if(l.search.indexOf('utm_expid='+k)>0)return;
        function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
        indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
        length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
        '<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
        '://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
        '&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
        valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
        '" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
        </script><script>utmx('url','A/B');</script>
        <!-- End of Google Analytics Content Experiment code -->

      <?php }

      // instantiate Mobile Detect Class
      $detect = new Mobile_Detect;

      // make available the global variable 
      // from Redux Framework Options panel
      global $infogroup_options;

      // get metabox option for nav menus
      $showNavMenu = get_post_meta($post->ID, 'ecpt_showmainnavmenu');
    
    ?>

    <script type="text/javascript">
      // Get query string parameters by name
      function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
        if (!results) return '';
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }

      // Usage for above getParameterByName() function - USE AS REFERENCE, DO NOT DELETE
      // query string: ?foo=lorem&bar=&baz
      // var foo = getParameterByName('foo'); // "lorem"
      // var bar = getParameterByName('bar'); // "" (present with empty value)
      // var baz = getParameterByName('baz'); // "" (present with no value)
      // var qux = getParameterByName('qux'); // "" (absent)

      // set js variable to use as cookie domain
      var cookieDomain = '<?php echo COOKIEDOMAIN; ?>';

      // set js variable that contains the page/post ID
      var WordPressPageID = '<?php echo get_the_ID(); ?>';

      var iusaEnvironment = '<?php echo CMS_ENVIRONMENT; ?>';

      var iusaThemeDirectoryURI = '<?php echo THEMEDIRECTORYURI; ?>';

      <?php if ($detect->isMobile() && !$detect->isTablet()) { ?>
    
        var detectedDevice = 'm';

      <?php } elseif ($detect->isTablet()) { ?>
    
        var detectedDevice = 't';

      <?php } else { ?>

        var detectedDevice = 'd';

      <?php } ?>

    </script>

    <?php include 'infogroup-includes/gtm/gtm.php'; ?>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      // Check whether or not Yoast SEO plugin is including
      // Facebook and Twitter meta tags, and if not, include them
      include 'infogroup-includes/social-meta-tags.php';
    ?>

    <?php if (!defined('WPSEO_VERSION')) { ?>

      <title><?php bloginfo('name'); ?> | <?php the_title(); ?></title>
      
    <?php } ?>

    <link rel="shortcut icon" href="<?php echo THEMEDIRECTORYURI; ?>/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo THEMEDIRECTORYURI; ?>/img/favicon.ico" type="image/x-icon">

    <?php

      // enqueue gravity forms scripts in head due to modal forms in footer
      gravity_form_enqueue_scripts(1, true);
      gravity_form_enqueue_scripts(3, true);

      wp_head();

    ?>

  </head>    

  <body <?php body_class(); ?>>

    <div id="igLoaderCover" style="position:absolute;width:100%;height:100%;background:#ffffff;z-index:9999999999;"></div>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo GTMID; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php if ($infogroup_options['off-canvas-yes-no'] == '1') { ?>
  
    <div class="off-canvas <?php offCanvasPosition(); ?>" id="offCanvas" data-off-canvas data-transition="overlap" style="background-color:<?php echo $infogroup_options['off-canvas-background-color']; ?>">

      <?php

        $offCanvasPage = get_post($infogroup_options['off-canvas-content-page']);

        $shortcodes_custom_css = get_post_meta($offCanvasPage->ID, '_wpb_shortcodes_custom_css', true);
        
        if (!empty($shortcodes_custom_css)) {
          
          $shortcodes_custom_css = strip_tags($shortcodes_custom_css);
          
          echo '<style type="text/css" data-type="vc_shortcodes-custom-css">' . $shortcodes_custom_css . '</style>';
          
        }

        // Get the Off Canvas content
        // Use the theme options for Off Canvas to set this
        $offCanvasPageContent = $offCanvasPage->post_content;

        $offCanvasPageContent = apply_filters('the_content', $offCanvasPageContent);

        $offCanvasPageContent = str_replace(']]>', ']]>', $offCanvasPageContent);

        echo $offCanvasPageContent;

      ?>

      <a href="#" class="close-deal" data-close>Close Deal</a>

    </div>
  
  <?php // open the content wrapper needed for the off canvas functionality ?>
  <div class="off-canvas-content" data-off-canvas-content>

  <?php } ?>

  <header id="site-header" role="banner" data-sticky-container>

  <?php
      
      $globalSiteStripe = $infogroup_options['global-site-stripe'];

      $siteStripe = get_post_meta($post->ID, 'ecpt_sitestripemessage');

      if (get_post_meta($post->ID, 'ecpt_sitestripemessage') || !empty($globalSiteStripe)) {
        
    ?>

      <div id="site-stripe">

        <di class="row clearfix container1140">

          <div class="small-12 column">
      
            <?php              

              if (!empty($globalSiteStripe)) {

                echo $globalSiteStripe;

              } else {                
              
                echo $siteStripe[0];

              }
              
            ?>
            
          </div>

        </div>

      </div>

    <?php } ?>

    <div id="logobar" class="row clearfix container1140">
  
      <div id="logo-left" class="small-12 medium-12 large-4 column">      

        <a id="main-logo-anchor" href="<?php echo site_url(); ?>"><img id="main-logo" src="<?php echo $infogroup_options['header-logo']['url']; ?>" alt="<?php echo get_bloginfo('name');?>&reg; from infogroup"></a>

        <div class="title-bar float-right" data-responsive-toggle="infogroup-main-nav" data-hide-for="large">          

          <button class="menu-icon" type="button" data-toggle="infogroup-main-nav"></button>

        </div>

      </div>      

      <div id="logo-right" class="small-12 medium-12 large-8 column">

        <div id="main-navbar">

          <?php
          
          main_navigation_menu();

          ?>
        
        </div>

      </div>
  
    </div>

  </header> <!-- end #site-header -->