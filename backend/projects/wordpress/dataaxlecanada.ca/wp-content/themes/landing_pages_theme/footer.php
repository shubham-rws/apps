 <?php
/******************************
The template for displaying
the footer on all pages
******************************/
 
global $infogroup_options;
?>   
    <footer id="site-footer" role="contentinfo">

    	<div id="footer-content" class="row small-up-1 medium-up-5 large-up-5 container1140">

  			<div id="footer-logo-block" class="column-block column">
          <img id="footer-logo" src="<?php echo $infogroup_options['footer-logo']['url']; ?>" alt="<?php echo get_bloginfo('name');?>&reg; from infogroup">
          <p>Questions: <a class="bas-phone" href="tel:800.565.7224">800.565.7224</a></p>
  			</div>

  			<div id="contact-info-block" class="column-block column">
  				<?php 
            if (is_active_sidebar('footer-widget-1')) {
              dynamic_sidebar('footer-widget-1');
            }
          ?>
  			</div>

  			<div class="column-block column">
          <?php 
            if (is_active_sidebar('footer-widget-2')) {
              dynamic_sidebar('footer-widget-2');
            }
          ?>
  			</div>

  			<div class="column-block column">
          <?php 
            if (is_active_sidebar('footer-widget-3')) {
              dynamic_sidebar('footer-widget-3');
            }
          ?>
  			</div>

  			<div class="column-block column">
          <?php 
            if (is_active_sidebar('footer-widget-4')) {
              dynamic_sidebar('footer-widget-4');
            }
          ?>          
  			</div>

		  </div>

      <div id="site-copyright">

        <div class="row container1140">

          <div class="small-12">
        
            <p class="small-text-center medium-text-left">Copyright &copy;<?php echo date('Y'); ?> Data Axle, Inc, All Rights Reserved.</p>

          </div>

        </div>

      </div>

      <div id="floating-contact-methods" class="show-for-large">
        
        <div id="floating-call">
    
          <p><span>Talk To A Marketing Expert Now</span><br>Call <a href="tel:800.565.7224" class="bas-phone">800.565.7224</a></p>
    
        </div>

        <div id="floating-chat">
          
          <a class="iusa-live-chat" href="#"><img src="<?php echo THEMEDIRECTORYURI . '/img/floatingChat.png' ?>" alt="Click for live chat."></a>

        </div>

      </div>

      <?php if ($infogroup_options['chat-phone-slide'] == '1') { ?>

        <div id="slide-up-contact-window">

          <h6>Need Help? Have a Question?</h6>

          <p>Talk to a live marketing expert.</p>
        
          <a style="width:100%;" href="tel:800.565.7224" class="ig-button ig-button-solid ig-green-button float-center bas-phone"><i class="fa fa-phone"></i> 800.565.7224</a>

          <a style="width:100%;" href="#" class="ig-button ig-button-solid ig-green-button float-center iusa-live-chat"><i class="fa fa-comments"></i> Let's Chat</a>

          <a style="width:100%;" href="#" target="_self" class="ig-button ig-button-solid ig-green-button float-center no-thanks-close">No Thanks</a>

          <i id="close-sliding-contact-window" class="fa fa-times-circle"></i>

        </div>

        <script type="text/javascript">

          setTimeout(function() {

            var slideContactWindow = Cookies.get('slideContactWindow');

            if (slideContactWindow !== 'false') {          

              jQuery('#slide-up-contact-window').animate({
                bottom: 50,                
              }, 1500, function() {
                // after animation
              });
  
              jQuery('.no-thanks-close, #close-sliding-contact-window').click(function(event) {
  
                event.preventDefault();
  
                jQuery('#slide-up-contact-window').animate({
                  bottom: -325,                
                }, 1000, function() {
                  Cookies.set('slideContactWindow', false, { domain: cookieDomain, expires: 1, path: '/' });
                });
  
              });
  
              }

          }, 20000);          

        </script>

    <?php } ?>
    	
    </footer>

    <div class="tiny reveal" id="footer-w2l-modal" data-reveal>
      <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
      <button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="tiny reveal" id="footer-registration-modal" data-reveal>
      <?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>
      <button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>
    </div>
    
    <?php if ($infogroup_options['off-canvas-yes-no'] == '1') { ?>
      <?php // close the content wrapper needed for the off canvas functionality ?>
      <div>
    <?php } ?>
    
    <?php
      
      wp_footer();

      // run function that will check if a promo modal is active and should be displayed to users
      infogroup_modal();

    ?>
    <script type="text/javascript">
      jQuery(window).load(function() {
        jQuery('#igLoaderCover').remove();
      });
    </script>
  </body>
</html>