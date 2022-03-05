<!DOCTYPE html>
<!-- Browser Sniffing -->
<!--[if lt IE 7]><html class="ie6" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]><html class="ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]><html class="ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><!--><html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"><!--<![endif]-->
  <head>

<?php if (is_page(9999999999999)) { // if is X page add the Google Exp code ?>

	<!-- Add Google Analytics Content Experiment code -->

<?php }

	$awDomain = $_SERVER['SERVER_NAME'];

	global $icanEnvironment, $sgCMS, $iusaCMS;

	if ($awDomain ==  'test-infogroup.infocanada.ca') {
		
		$awGTM_ID = 'TS6DWW';

		$icanEnvironment = 'test-leads-app';

		$sgCMS = 'test.salesgenie.com';

		$iusaCMS = 'test-cms.infousa.com';
		
	} elseif ($awDomain == 'canadiandata.data-axle.com') {
		
		$awGTM_ID = 'SVXLW';

		$icanEnvironment = 'leads-app';

		$sgCMS = 'www.salesgenie.com';

		$iusaCMS = 'www.infousa.com';
		
	}

?>

<!-- Google Tag Manager -->
<script type="text/javascript">

	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-<?php echo $awGTM_ID; ?>');

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

</script>
<!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/favicon.ico"/>
	<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open Sans:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lte IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <?php if($isHome) { ?>
    	<script src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/js/jquery.flexverticalcenter.js"></script>
    <?php } ?>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/js/nav.js"></script>

	<?php wp_head(); ?>

<div style="display:none;">
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
</div>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1052623392/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

  </head>
  <body class="home-fr">
  
  	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo $awGTM_ID; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <div class="top-nav">
    	<div class="container">
			<div class="row">
				<div class="col-md-4 text-left">
					<a href="<?php bloginfo('url'); ?>/accueil/"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/InfoCanada_fr.png" class="logo" height="75" alt="InfoCanada" title="InfoCanada" /></a>
				</div>
				<!--
<div class="col-md-2 text-right">

				</div>
 -->
				<div class="col-md-8 text-right">
					<h3 id="awPhoneCTA">Parlez-en à dos experts: <a href="tel:800.565.7224">800.565.7224</a></h3>

					<!--
					<ul class="top-nav-icons">
						<li class="ico ico-first"><a href="https://www.facebook.com/Infogroup" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-fb.png" /></a></li>
						<li class="ico"><a href="https://twitter.com/infogroup" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-twt.png" /></a></li>
						<li class="ico"><a href="https://www.linkedin.com/company/infogroup" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-lnkd.png" /></a></li>
						<li class="ico"><a href="https://plus.google.com/u/0/+infogroup/posts" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-goog.png" /></a></li>
					</ul>
					-->
					<ul class="top-nav-right clearfix">
						<?php wp_nav_menu( array('theme_location' => 'fr-header-menu', 'container' =>'nav', 'menu_class' => 'menu header-menu')); ?>
					</ul>

					<form class="form-search" role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
						<input type="text" placeholder="RECHERCHE" name="s" id="s" />
						<input type="submit" value="" />
					</form>
					<?php //wp_nav_menu( array('theme_location' => 'fr-top-2', 'container' =>'nav', 'menu_class' => 'nav2 navbar-nav')); ?>
				</div>
			</div>
		</div>
    </div>
    <div class="intro <?php if(!$isHome) { ?>intro-section<?php } ?>">
    	<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<!-- <ul class="nav navbar-nav"> -->
						<?php wp_nav_menu( array('theme_location' => 'fr-main-menu', 'container' =>'nav', 'menu_class' => 'nav navbar-nav')); ?>
				</div>
			</div>
		</nav>
    	<div class="container">


	    <?php if(!$isHome) {
		    /*
			$ancestors = get_post_ancestors( $post );
			$sectionTitle = get_the_title($ancestors[count($ancestors)-1]);
			*/
		?>
            <div class="row">
            	<div class="col-md-12">
				<h1>
					<?php 
						
						if (get_post_meta($post->ID, 'CustomH1', true)) {
							echo get_post_meta($post->ID, 'CustomH1', true);
						} else {
							the_title();
						}
						
					?>
				</h1>
                </div>
            </div>
	    <?php } else { ?>
            <div class="row">
            	<div>

    <div class="brand-spotlight">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
                    <div id="myCarousel" class="container carousel carousel-bottom slide">
                        <div class="carousel-inner text-center">
                            <div class="active item tall">
                                <div style="max-width: 700px;">
                                <h3>Pr&eacute;parez-vous &agrave; faire<br />cro&icirc;tre vos affaires</h3>
                                <p>Vous souhaitez agir rapidement, augmenter vos profits et r&eacute;duire vos co&ucirc;ts? Nous avons les donn&eacute;es qu&#x2019;il vous faut en mati&egrave;re de marketing direct, de t&eacute;l&eacute;marketing, de pistes de vente et de gestion des donn&eacute;es.</p ><br />
                                <a href="<?php get_bloginfo('url'); ?>/clients-potentiels-et-listes-de-diffusion/" class="btn btn-lg">En apprendre plus</a>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                <h3>Obtenez des donn&eacute;es astucieuses pour cibler les bons prospects</h3>
								<div style="max-width: 630px;"><p>Ciblez de nouveaux march&eacute;s &agrave; l&#x2019;aide de donn&eacute;es d&eacute;taill&eacute;es sur les consommateurs : mode de vie, comportement, habitudes d&#x2019;achat, mod&egrave;les de transactions et bien plus</p></div><br />
                                <a href="<?php echo site_url(); ?>/donnees-services-et-solutions/analytique-et-information-utile/" class="btn btn-lg">En apprendre plus</a>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                <h3>Pour une campagne de marketing par courriel superpuissante</h3>
                                <p>Gr&acirc;ce &agrave; la combinaison de nos services multicanaux cibl&eacute;s et de notre technologie de niveau entreprise en mati&egrave;re de marketing par courriel, vous aurez tous les outils pour trouver, r&eacute;orienter et conserver les clients qui repr&eacute;sentent le plus grand potentiel &agrave; long terme.</p><br />
                                <a href="<?php echo site_url(); ?>/marketing-numerique/plateforme-de-marketing-par-courriel/" class="btn btn-lg">En apprendre plus</a>
                                </div>
                            </div>
                            <div class="item">
                                <div style="max-width: 650px;">
                                <h3>Optimisez vos efforts strat&eacute;giques</h3>
                                <p>Cr&eacute;ez une campagne cibl&eacute;e en vue de lancer des initiatives marketing &agrave; haut rendement, &agrave; l&#x2019;aide de pr&eacute;cieux renseignements sur la concurrence.</p><br />
                                <a href="<?php echo site_url(); ?>/marketing-numerique/analyse-de-donnees/" class="btn btn-lg">En apprendre plus</a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&nbsp;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&nbsp;</a>
                        <script type="text/javascript">
							var myCarousel = $(".carousel");
							myCarousel.append("<ol class='carousel-indicators'></ol>");
							var indicators = $(".carousel-indicators");
							myCarousel.find(".carousel-inner").children(".item").each(function(index) {
								(index === 0) ?
								indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"' class='active'></li>") :
								indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"'></li>");
							});
                            $('.carousel').carousel({
                              interval:10000 // Carousel Speed
                            })

							$(document).ready(function() {
								$('.item').flexVerticalCenter();
							});

                        </script>
                    </div><!-- end .carousel -->
    			</div>
            </div>
        </div>
    </div><!-- end .brand-spotlight -->
                </div>
            </div>
	   <?php } ?>
        </div>
    </div><!-- end .intro -->
