    <div class="footer text-white">
    	<div class="container">
        	<div class="row">
                <div class="col-md-3 footer-info">
                    <h4 class="heading-footer">Contact InfoCanada</h4>                                                  
                    <p>1290 Central Parkway West,<br/>Suite 500<br/>
                    Mississauga, Ontario, L5C 4R9<br/>
                    800.565.7224<br/>
                    Fax: 905.803.7195<br/>
                    <a class="mailto-link" href="mailto:info.infocanada.infocanada@infocanada.ca">info@infocanada.ca</a>
                    </p>
                    <ul>
                        <li><a href="https://www.facebook.com/Infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-fb.png" alt="Facebook" /></a></li>  
                        <li><a href="https://twitter.com/infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-twt.png" alt="Twitter" /></a></li>  
                        <li><a href="https://www.linkedin.com/company/infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-lnkd.png" alt="LinkedIn" /></a></li>  
                        <li><a href="https://plus.google.com/u/0/+infogroup/posts" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-goog.png" alt="Google" /></a></li>  
                    </ul>
                    <?php // wp_nav_menu( array('theme_location' => 'footer-menu-3', 'container' =>'nav')); ?>
              
		</div>
                <div class="col-md-3">
                    <h4 class="heading-footer">Business Solutions</h4>
                    <?php wp_nav_menu( array('theme_location' => 'footer-menu-1', 'container' =>'nav')); ?>
                </div>
                <div class="col-md-3">
                    <h4 class="heading-footer">Other Products</h4>
                    <?php wp_nav_menu( array('theme_location' => 'footer-menu-2', 'container' =>'nav')); ?>
                </div> 
				<div class="col-md-3">
                    <h4 class="heading-footer">Corporate</h4>
                    <?php wp_nav_menu( array('theme_location' => 'footer-menu-3', 'container' =>'nav')); ?>
                </div>  

            </div>                
        </div>
        <div class="container">
            <div class="footer-corp">
                <div class="row">
                    <!-- 
<div class="col-md-12">
                        <p class="float-l"><span class="copyright-text">&copy; 2014 InfoCanada, All Rights Reserved.</span> <?php wp_nav_menu( array('theme_location' => 'footer-menu-3', 'container' =>'nav')); ?></p>
                    </div>
 -->
                    <div class="col-md-12">
                    	<p class="text-sm">&copy; <?php echo date("Y") ?> InfoCanada, All Rights Reserved. No confidential information about an individual, family, household, organization or business has been obtained from Statistics Canada.<br />Copyright, Her Majesty The Queen in right of CANADA, as represented by the Minister of Industry, Statistics Canada 2002.</p>
                    </div>
                </div>
            </div><!-- end .footer-corp-->
        </div>
    </div><!-- end .footer -->
    <?php wp_footer(); ?>
  </body>
</html>