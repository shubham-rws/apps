    <div class="footer text-white">
    	<div class="container">
        	<div class="row">
                <div class="col-md-3 footer-info">
                    <h4 class="heading-footer">Contactez InfoCanada</h4>                                                  
                    <p>1290 Central Parkway West,<br />Suite 500<br/>
                    Mississauga, Ontario, L5C 4R9<br/>
                    800.565.7224<br/>
                    T&eacute;l&eacute;copie : 905.803.7195<br/>
                    <a class="mailto-link" href="mailto:info.infocanada.infocanada@infocanada.ca">info@infocanada.ca</a>
                    </p>
                    <ul>
                        <li><a href="https://www.facebook.com/Infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-fb.png" alt="Facebook" /></a></li>  
                        <li><a href="https://twitter.com/infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-twt.png" alt="Twitter" /></a></li>  
                        <li><a href="https://www.linkedin.com/company/infogroup" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-lnkd.png" alt="LinkedIn" /></a></li>  
                        <li><a href="https://plus.google.com/u/0/+infogroup/posts" target="_blank"><img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-lg-goog.png" alt="Google" /></a></li>  
                    </ul>
                    <?php // wp_nav_menu( array('theme_location' => 'fr-footer-menu-3', 'container' =>'nav')); ?>
                </div>
                <div class="col-md-3">
                    <h4 class="heading-footer">Solutions d'affaires</h4>
                    <?php wp_nav_menu( array('theme_location' => 'fr-footer-menu-1', 'container' =>'nav')); ?>
                </div>
				<div class="col-md-3">
                    <h4 class="heading-footer">Autres produits</h4>
                    <?php wp_nav_menu( array('theme_location' => 'fr-footer-menu-2', 'container' =>'nav')); ?>
                </div> 
                <div class="col-md-3">
                    <h4 class="heading-footer">Entreprises</h4>
                    <?php wp_nav_menu( array('theme_location' => 'fr-footer-menu-3', 'container' =>'nav')); ?>
                </div>   
            </div>                
        </div>
        <div class="container">
            <div class="footer-corp">
                <div class="row">
                    <div class="col-md-12">
                    	<p class="text-sm">&copy; <?php echo date("Y") ?> InfoCanada, Tous droits r&eacute;serv&eacute;s. Aucune information confidentielle concernant une personne, une famille, un m&eacute;nage, une organisation ou une entreprise n'a &eacute;t&eacute; obtenue de Statistique Canada.<br />&copy; Sa Majest&eacute; la Reine du chef du Canada, repr&eacute;sent&eacute;e par le ministre de l'Industrie, Statistique Canada 2002.</p>
                    </div>
                </div>
            </div><!-- end .footer-corp-->
        </div>
    </div><!-- end .footer -->
    <?php wp_footer(); ?>
  </body>
</html>