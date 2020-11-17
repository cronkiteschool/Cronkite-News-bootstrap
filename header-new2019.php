<?php
/**
 * Header
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">
  <head>

	<?php
	// get the category for GA
	$post       = get_post();
	$categories = get_the_category( $post->ID );
	$output     = '';

	if ( ! empty( $categories ) ) {
		foreach ( $categories as $category ) {

			if ( $output == '' ) {
				if ( $category->name == 'Borderlands' ) {
					// $output = "ga('set', 'Borderlands', '"  . esc_html( $category->name ) . "');";
					// $output = "ga('set', 'contentGroup1', 'Borderlands');";
					$output = "gtag('set', {'contentGroup1': 'Borderlands'});";
				}
				if ( $category->name == 'Sustainability' ) {
					// $output = "ga('set', 'contentGroup2', 'Sustainability');";
					$output = "gtag('set', {'contentGroup2': 'Sustainability'});";
				}
				if ( $category->name == 'Education' ) {
					// $output = "ga('set', 'contentGroup3', 'Education');";
					$output = "gtag('set', {'contentGroup3': 'Education'});";
				}
				if ( $category->name == 'Consumer' ) {
					// $output = "ga('set', 'contentGroup4', 'Consumer');";
					$output = "gtag('set', {'contentGroup4': 'Consumer'});";
				}
				if ( $category->name == 'Future' ) {
					$output = "ga('set', 'contentGroup5', 'Future');";
				}
			}
		}
	}

	?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3145657-18"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			<?php // echo $output ?>
			gtag('config', 'UA-3145657-18');
		</script>

	<!-- Google Optimize -->
	<script src="https://www.googleoptimize.com/optimize.js?id=OPT-KJHZKHH"></script>

		<!-- Chartbeat Analytics  -->
		<script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
	  <script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery-3.2.1.min.js"></script>


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#216CB7">
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Add Favicon -->
	<link type="image/png" href="<?php the_field( 'favicon', 'options' ); ?>" rel="icon">
	<link type="image/png" href="<?php the_field( 'favicon', 'options' ); ?>" rel="shortcut icon">
	<link type="image/png" href="<?php the_field( 'favicon', 'options' ); ?>"  rel="apple-touch-icon">


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

		<!-- NEW NAV - 12/12/19 -->
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/foundation.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

		<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/hamburgers.css" rel="stylesheet">
		<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/all.min.css" rel="stylesheet"> <!--load all styles -->
		<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/print.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/tooltipster.bundle.min.css" />

		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/app.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/youth-suicide.css">
	<?php if ( get_the_ID() == 143506 || get_the_ID() == 127403 ) { ?>
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/youth-suicide/youth-suicide.css">
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/slick/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/impeachment.css">
	<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/nav.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/single-story-post.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/about-us.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/404.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/plyr-master/dist/plyr.css" />
	<!--<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/liveblog.css">-->

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

	<!-- start header -->
		<nav class="cn_navigation" role="navigation" aria-label="Cronkite News - Navigation">
	  <!-- navigation container -->
	  <div class="main_nav_container">
		<!-- main navigation -->
		<div class="main_nav">
		  <!-- logo -->
		  <div class="logo">
			<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/CN-PBS-EPS.svg" alt="Cronkite News" title="Cronkite News" /></a>
		  </div>
		  <!-- main navigation -->
		  <div class="nav_links">
			<!-- language and search -->
			<ul class="lang_search">
			  <li>
				<div class="search-box">
				  <form method="get" class="navbar-form search" id="searchform" action="https://cronkitenews.azpbs.org/">
					<input type="text" placeholder="Search" name="s" autocomplete="off" />
					<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/search.svg" width="16" height="16" />
				  </form>
				</div>
			  </li>
			</ul>
			<!-- top navigation -->
			<ul class="top_links">
							<?php
								$args = array(
									'menu'        => 'Header Nav - 2019',
									'container'   => false,
									'items_wrap'  => '%3$s',
									'depth'       => 1,
									'fallback_cb' => false,
									'menu_id'     => '',
									'menu_class'  => '',
								);
								wp_nav_menu( $args );
								?>
			  <li><a href="https://cronkitenews.azpbs.org/election-2020"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2020/10/election2020-small-1-logo.png" alt="Election 2020" title="Election 2020" style="vertical-align:baseline;height:16px;" /></a></li>
			</ul>
		  </div>
		  <!-- hamburger icon -->
		  <div class="nav-hamburger animated slideInRight">
			<button class="hamburger hamburger--collapse" type="button">
			  <div class="hamburger-box">
				<div class="hamburger-inner"></div>
			  </div>
			</button>
		  </div>
		</div>
	  </div>
	  <!-- verticals navigation -->
	  <div id="sub_nav" class="sub_nav drop-shadow animated slideInDown">
		<ul>
		  <li class="misc_links_m">
			<form method="get" class="navbar-form search" id="searchform" action="https://cronkitenews.azpbs.org/">
			  <input type="text" placeholder="Search" name="s" autocomplete="off" />
			  <img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/search.svg" width="16" height="16" />
			</form>
		  </li>
		  <?php
						$args = array(
							'menu'        => 'Subnav - 2019',
							'container'   => false,
							'items_wrap'  => '%3$s',
							'depth'       => 1,
							'fallback_cb' => false,
							'menu_id'     => '',
							'menu_class'  => '',
						);
						wp_nav_menu( $args );
						?>
		  <li class="top_links_m first"><a href="https://cronkitenews.azpbs.org/election-2020"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2020/10/election2020-small-1-logo.png" alt="Election 2020" title="Election 2020" style="vertical-align:baseline;height:16px;" /></a></li>
					<li class="top_links_m"><a href="https://cronkitenews.azpbs.org/sitenewscast/">Newscast</a></li>
		  <li class="top_links_m"><a href="https://cronkitenews.azpbs.org/audio/">Audio</a></li>
		  <li class="top_links_m last"><a href="https://cronkitenews.azpbs.org/daily-newsletter-signup/">Subscribe</a></li>
		  <li class="misc_links_m first"><a href="https://cronkitenews.azpbs.org/about-us/">About</a></li>
		  <li class="misc_links_m"><a href="https://cronkitenews.azpbs.org/what-we-do/" target="_blank">What we do</a></li>
		  <li class="misc_links_m"><a href="https://www.azpbs.org/" target="_blank">Arizona PBS</a></li>
		  <li class="misc_links_m"><a href="https://cronkite.asu.edu/" target="_blank">Walter Cronkite School of Journalism<br />and Mass Communication</a></li>
		  <li class="social_links_m"><a href="https://twitter.com/cronkitenews" target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://www.facebook.com/cronkitenewsazpbs" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/user/cronkitenewswatch" target="_blank"><i class="fab fa-youtube"></i></a></li>
		  <li class="copyright_m">&copy; <?php echo date( 'Y' ); ?> Cronkite News. All rights reserved. Creative Commons.</li>
		</ul>
	  </div>
	</nav>

	<!-- end start -->
