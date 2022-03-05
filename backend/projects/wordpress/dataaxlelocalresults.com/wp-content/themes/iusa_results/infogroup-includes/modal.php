<?php

function infogroup_modal() {

	// make available the global variable 
    // from Redux Framework Options panel
	global $infogroup_options;

	// check if the modal should be displayed to users
	if ($infogroup_options['modal-yes-no'] == '1') {

        $currentPage = get_permalink();

        $excludedPages = $infogroup_options['modal-exlude-urls'];

        if (empty($excludedPages)) {

            $excludedPages = array();

        }

        if (!in_array($currentPage, $excludedPages)) {

		   // Get the Off Canvas content
    	   // Use the theme options for Off Canvas to set this
    	   $modalPage = get_post($infogroup_options['modal-content-page']);
	   
    	   $modalPageContent = $modalPage->post_content;
	   
    	   $modalPageContent = apply_filters('the_content', $modalPageContent);
	   
    	   $modalPageContent = str_replace(']]>', ']]>', $modalPageContent);
    
    	   echo '<div class="reveal" id="infogroup-modal" data-reveal>';
	   
    	   echo $modalPageContent;
    
           echo '<i id="closeInfogroupModal" class="fa fa-times-circle" data-close aria-label="Close modal"></i>';

           echo '<img id="areYouSure" src="' . THEMEDIRECTORYURI . '/img/areYouSure.png" alt="Are you sure? Once you close this the offer is gone for good!" />';
    
    	   echo '</div>';
    
    	   // get any custom styles set in Visual Composer on the modal content page
    	   // and write out a style sheet if any custom styles exist
    	   $shortcodes_custom_css = get_post_meta($modalPage->ID, '_wpb_shortcodes_custom_css', true);
            
            if (!empty($shortcodes_custom_css)) {
              
              $shortcodes_custom_css = strip_tags($shortcodes_custom_css);
              
              echo '<style type="text/css" data-type="vc_shortcodes-custom-css">' . $shortcodes_custom_css . '</style>';
              
            }

            if ($infogroup_options['modal-on-mobile'] == '2') {
                $modalOnMobileIf = 'if (Foundation.MediaQuery.atLeast("large")) {';
                $modalOnMobileIfClose = '}';
            } else {
                $modalOnMobileIf = '';
                $modalOnMobileIfClose = '';
            }

    
            // open the modal after specified number of seconds
            echo 
    
                '<script type="text/javascript">
                    var igModalCookie = Cookies.get("infogroup_modal");
                    if (igModalCookie !== "false") {
                        ' . $modalOnMobileIf . '
            		      setTimeout(function() {
                            var igModal = new Foundation.Reveal(jQuery("#infogroup-modal"));
            		  	    igModal.open();
            		      },' . $infogroup_options['modal-timer'] * 1000 . ');
                        ' . $modalOnMobileIfClose . '
                    }
                    jQuery("#closeInfogroupModal").click(function() {
                        console.log("Test close click");
                        Cookies.set("infogroup_modal", "false", {domain: cookieDomain, expires: 30, path: "/" });
                    });
                    jQuery("#closeInfogroupModal").hoverIntent(
                        function() {
                            jQuery("#areYouSure").fadeIn(100);
                        },
                        function() {
                            jQuery("#areYouSure").fadeOut(100);
                        }
                    );
            	</script>';
        }

    } // close if statement that checks if the modal should be displayed to users

}

?>