<!DOCTYPE html>
<!-- Browser Sniffing -->
<!--[if lt IE 7]><html class="ie6" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]><html class="ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]><html class="ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"><!--<![endif]-->
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
    <title>InfoGroup Canada</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/favicon.ico"/>

<!--
	<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open Sans:300,400,500,600,700' rel='stylesheet' type='text/css'>
 -->
    <!-- Bootstrap -->
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/js/bootstrap.min.js"></script>

  </head>
  <body>
	  
  		<!-- Google Tag Manager (noscript) -->
  		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo $awGTM_ID; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  		<!-- End Google Tag Manager (noscript) -->	  

    <div class="top-nav">
    	<div class="container">
            <div class="row">
            	<div class="col-md-4">
                	<ul class="top-nav-left">
                    	<li><a href="#">EN</a></li>
                        <li><a href="#">866.373.2066</a></li>
                    </ul>
                </div>
                <div class="col-md-8 text-right">
                	<ul class="top-nav-right">
                    	<li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Client Access</a></li>
                    </ul>
                    <ul class="top-nav-icons">
                    	<li class="ico ico-first"><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-fb.png" /></a></li>
                        <li class="ico"><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-twt.png" /></a></li>
                        <li class="ico"><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-lnkd.png" /></a></li>
                        <li class="ico"><a href="#"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/ico-sm-goog.png" /></a></li>
                    </ul>
                </div>
            </div>
	</div>
     </div>
    <div class="intro <?php if(!$isHome) { ?>intro-section<?php } ?>">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 text-left">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/themes/infogroup/images/logo.png" class="img-responsive logo" alt="InfoCanada" /></a>
                </div>
            	<div class="col-md-4"></div>
            	<div class="col-md-4 text-right">
                    <form class="form-search" role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                    	<input type="text" placeholder="search" name="s" id="s">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        	<div class="row">
            	<div class="col-lg-12">
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
                                <ul class="nav navbar-nav">

									<?php $siblings = get_children(array('post_parent'=>0,'post_type'=>'page','order'=>'ASC'));
  									foreach ($siblings as $sib) { if($sib->post_title != 'Home') { ?>
											<li><a href="<?php echo get_permalink($sib->ID); ?>"><?php echo $sib->post_title; ?></a></li>
									<?php }} ?>
									<li><a href="">Client Access Tool</a></li>
                                </ul>
                            </div>
                    	</div>
                    </nav>
                </div>
            </div><!-- end .row -->
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
            	<div class="col-md-6 text-center">
                	<h1>Grow your Business</h1>
                    <h2>Build a Telemarketing or Direct Mail list online instantly</h2>
                    <a href="#" class="btn btn-lg">Get Started</a>
                </div>
            	<div class="col-md-6 text-center">
                	<img src="<?php get_bloginfo('url'); ?>/wp-content/themes/infogroup/images/computer.png" class="img-responsive computer" alt="" />
                </div>
            </div>
	   <?php } ?>
        </div>
    </div><!-- end .intro -->
