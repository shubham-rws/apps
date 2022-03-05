<?php
/*
Template Name: Home
*/
get_header('home'); ?>

    <div class="home-col-list home-section">
        <div class="container">
            <div id="five-columns" class="row row-centered">

                <div class="col-md-3 text-center col-centered">
                    <section>
                    	<h3 class="h3-sml">
                            Canadian<br />Business Lists
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_CAN_BUSINESS_LIST-01.png" class="img-responsive main-img" alt="Canadian Business List" />
                        <p>
                            Search by type of business, size of business, executive title, geography, and more. Start your next B2B telemarketing or direct mail campaign right here.
                        </p>
						<a href="https://<?php echo $icanEnvironment; ?>.infousa.com/Landing/CustomSearch.aspx?Module=CanadaBusiness&ListApplication=Mailing:0&bas_vendor=99911" class="btn btn-md" target="_blank">Get Started</a>
                    </section>
                </div>

		<div class="col-md-3 text-center col-centered">
                    <section>
                    	<h3 class="h3-sml">
                            Canadian<br />Consumer Lists
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_CAN_CONSUMERS_LIST-01.png" class="img-responsive main-img" alt="Canadian Consumer List" />
                        <p>
                            Build telemarketing lists and direct mailing lists real-time online with many helpful selections like age, income, home value, and more.
                        </p>
						<a href="https://<?php echo $icanEnvironment; ?>.infousa.com/Landing/CustomSearch.aspx?Module=CanadaConsumer&bas_vendor=99911" class="btn btn-md" target="_blank">Get Started</a>
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
                            U.S. Business and<br />Consumer Lists
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_USA_BUS_CONSUMERS_LIST-01.png" class="img-responsive main-img" alt="U.S. Business and Consumer List" />
                        <p>
                            Expand into the U.S. market. Search the largest and most accurate U.S. databases available.
                        </p>
						<a href="https://<?php echo $iusaCMS; ?>/product/business-lists/" class="btn btn-md" target="_blank">Get Started</a>
                    </section>
                </div>

                <div class="col-md-3 text-center col-centered last">
                    <section>
                    	<h3 class="h3-sml">
                            Salesgenie<br />Sales Leads
                        </h3>
                        <img src="<?php get_bloginfo('url'); ?>/wp-content/uploads/2014/09/MAIN_SALESGENIE-01.png" class="img-responsive main-img" alt="Salesgenie" />
                        <p>
                                Get targeted online access to the highest-quality business and consumer sales leads in the industry.
                        </p>
						<a href="https://<?php echo $sgCMS; ?>/" class="btn btn-md" target="_blank">Get Started</a>
                    </section>
                </div>

            </div>
        </div>
    </div><!-- end .home-col-list -->

<?php get_footer(); ?>
