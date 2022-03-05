<?php
/*
Template Name: Home-FR
*/
get_header('home-fr'); ?>

    <div class="home-col-list home-section">
        <div class="container">
            <div id="five-columns" class="row row-centered">


                <div class="col-md-3 text-center col-centered">
                    <section>
                    	<h3 class="h3-sml">
                            Listes d&#39;entreprises canadiennes
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_CAN_BUSINESS_LIST-01.png" class="img-responsive main-img" alt="Listes d&#39;entreprises canadiennes" />
                        <p>
                            Effectuez des recherches par type d&#x2019;entreprise, taille d&#x2019;entreprise, poste de cadre dirigeant, emplacement g&eacute;ographique et plus. D&eacute;marrez votre prochaine campagne de t&eacute;l&eacute;marketing ou de publipostage B2B ici m&ecirc;me.
                        </p>
						<a href="https://<?php echo $icanEnvironment; ?>.infousa.com/Landing/CustomSearch.aspx?Module=CanadaBusiness&ListApplication=Mailing:0&bas_vendor=99911" class="btn btn-md" target="_blank">Pour commencer</a>
                    </section>
                </div>

		<div class="col-md-3 text-center col-centered">
                    <section>
                    	<h3 class="h3-sml">
                            Listes de<br />consommateurs canadiens
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_CAN_CONSUMERS_LIST-01.png" class="img-responsive main-img" alt="Listes de consommateurs canadiens" />
                        <p>
                            Cr&eacute;ez des listes de t&eacute;l&eacute;marketing et de publipostage en temps r&eacute;el et en ligne, &agrave; partir de nombreux crit&egrave;res pratiques tels que l&#x2019;&acirc;ge, le revenu, la valeur de la propri&eacute;t&eacute; et bien plus.
                        </p>
						<a href="https://<?php echo $icanEnvironment; ?>.infousa.com/Landing/CustomSearch.aspx?Module=CanadaConsumer&bas_vendor=99911" class="btn btn-md" target="_blank">Pour commencer</a>
                    </section>
                </div>

                <div class="col-md-3 text-center col-centered">
                    <section>
                        <h3 class="h3-sml">
                            Marketing<br />Solutions
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/ic-market-solutions.jpg" class="img-responsive main-img" alt="Canadian Business List" />
                        <p>
                            Target your audience with full-service marketing campaigns including direct mail, telemarketing, digital marketing, and more.
                        </p>
                        <a href="<?php echo site_url(); ?>/digital-marketing/" class="btn btn-md">Get Started</a>
                    </section>
                </div>

                <div class="col-md-3 text-center col-centered">
                    <section>
                    	<h3 class="h3-sml">
                            Listes d&#x2019;entreprises et de consommateurs am&eacute;ricains
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_USA_BUS_CONSUMERS_LIST-01.png" class="img-responsive main-img" alt="Listes d&#x2019;entreprises et de consommateurs am&eacute;ricains" />
                        <p>
                            &Eacute;tendez vos activit&eacute;s au march&eacute; am&eacute;ricain. Effectuez vos recherches dans les bases de donn&eacute;es am&eacute;ricaines les plus grandes et les plus exactes.
                        </p>
						<a href="https://<?php echo $iusaCMS; ?>/" class="btn btn-md" target="_blank">Pour commencer</a>
                    </section>
                </div>



                <div class="col-md-3 text-center col-centered last">
                    <section>
                    	<h3 class="h3-sml">
                            Pistes de vente Salesgenie<br /><br />
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_SALESGENIE-01.png" class="img-responsive main-img" alt="Pistes de vente Salesgenie" />
                        <p>
                                Obtenez un acc&egrave;s en ligne cibl&eacute; aux prospects &#x2013; entreprises et consommateurs &#x2013; les plus prometteurs de l&#x2019;industrie.
                        </p>
						<a href="http://<?php echo $sgCMS; ?>/" class="btn btn-md" target="_blank">Pour commencer</a>
                    </section>
                </div>

            </div>
        </div>
    </div><!-- end .home-col-list -->

<?php get_footer('fr'); ?>