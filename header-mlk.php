<?php
/**
 * Header
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>"  rel="apple-touch-icon">

    <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3145657-18"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			<?php //echo $output ?>
			gtag('config', 'UA-3145657-18');
		</script>

    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KJHZKHH"></script>

    <!-- Chartbeat Analytics  -->
    <script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery-3.2.1.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/9e4502c156.js"></script>
    <!-- AMP Analytics -->
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <!-- FB App Configuration for Comment Moderation   -->
		<script>
			window.fbAsyncInit = function() {
			FB.init({
				appId      : '511732915827177',
				xfbml      : true,
				version    : 'v2.11'
				});
				FB.AppEvents.logPageView();
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

    <meta property="fb:app_id" content="511732915827177" />

		<!-- FB instant articles -->
		<meta property="fb:pages" content="305166330794" />

    <?php wp_head(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&family=Taviraj:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/mlk/css/foundation.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/mlk/css/app.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/mlk/css/mlk.css">
    <script src="https://kit.fontawesome.com/d3e0178cac.js" crossorigin="anonymous"></script>

    <style type='text/css'>
  	    body.admin-bar {margin-top:32px !important}
  	    @media screen and (max-width: 782px) {
  	        body.admin-bar { margin-top:0px !important }
  	    }
  	    @media screen and (max-width: 600px) {
  	        body.admin-bar { margin-top:0px !important }
  	        html #wpadminbar{ margin-top: -46px; }
  	    }
  	</style>

  </head>

  <body <?php body_class(); ?>>
