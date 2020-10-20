<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if IE]>
	<script src="<?php bloginfo('template_url'); ?>/js/plugins/html5shiv.js"></script>
<![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {filter: none;}
  </style>
<![endif]-->

<head>

	<!-- Chartbeat Analytics  -->
	<script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
<!--     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#216CB7">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>"  rel="apple-touch-icon">

    <!-- Load Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">

    <!-- Google Analytics Tracking Code  -->

		<?php
	// get the category for GA
		$post = get_post();
		$categories = get_the_category ($post -> ID);
		$output = '';

		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {

			if ($category->name == "Borderlands") {
			// $output = "ga('set', 'contentGroup1', '"  . esc_html( $category->name ) . "');";
			$output = "ga('set', 'contentGroup1', 'My Group Name');";
		}
		if ($category->name == "Sustainability") {
		// $output = "ga('set', 'contentGroup2', '"  . esc_html( $category->name ) . "');";
		$output = "ga('set', 'contentGroup2', 'My Group Name');";
	}
	}
}

		?>

	<script>
           (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
           (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
           m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
           })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

           ga('create', 'UA-3145657-18', 'auto');
           ga('send', 'pageview');
					 <?php
					 if ($output) {
						 echo $output;
					 }
					 ?>

       </script>

       <!-- Hotjar Tracking Code for http://cronkitenews.azpbs.org -->
       <script>
           (function(h,o,t,j,a,r){
               h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
               h._hjSettings={hjid:247844,hjsv:5};
               a=o.getElementsByTagName('head')[0];
               r=o.createElement('script');r.async=1;
               r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
               a.appendChild(r);
           })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
       </script>
	<!-- FB instant articles -->
	<meta property="fb:pages" content="305166330794" />

    <?php wp_head(); ?>
<!-- 		<script src="<?php bloginfo('template_directory');?>/js/plugins/jquery.scrolldepth.js"></script> -->
	 <script>
	 jQuery(function() {
		 jQuery.scrollDepth({
		  minHeight: 1000,
		  userTiming: false
		});
});
	 </script>

</head>

<body <?php body_class(); ?>>

   <!-- Add This Social Sharing -->
   <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>



    <!-- ============================================================= HEADER ============================================================= -->

    <header>
        <div class="navbar">
            <div class="navbar-header">
                <div class="container">


<!--
                    <ul class="social pull-right">

                    <?php if( have_rows('social_box','options') ): ?>
                        <?php while( have_rows('social_box','options') ): the_row();
                            // Declare variables below
                            $icon = get_sub_field('social_icon','options');
                            $link = get_sub_field('social_link','options');
                            // Use variables below ?>
                            <li>
                                <a target="_blank" href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" /></a>
                            </li>
<?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>

                    </ul>
-->


                    <!-- /.social -->

                    <!-- ============================================================= LOGO MOBILE ============================================================= -->

                    <a class="navbar-brand logo"  href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="https://cronkitenews.azpbs.org/wp-content/uploads/2016/10/election_stretched.gif" /></a>

                    <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                    <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
                </div><!-- /.container -->
            </div>
            <!-- /.navbar-header -->

            <div class="yamm">
                <div class="navbar-collapse collapse">
                    <div class="container-fluid">

                                <!-- ============================================================= LOGO ============================================================= -->

                                <a style="margin-top:40px;" class="navbar-brand" id='election_logo' href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="https://cronkitenews.azpbs.org/wp-content/uploads/2016/10/election_stretched.gif" /></a>

                                <!-- ============================================================= LOGO : END ============================================================= -->

                                <!-- ============================================================= MAIN NAVIGATION ============================================================= -->
                        <div class="menuClass">
                          <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => 'bootstrap_menu', 'menu_class' => 'nav navbar-nav', 'walker' => new bootstrap_navigation() ) ); ?>
                                 </div>
                                <!-- ============================================================= MAIN NAVIGATION : END ============================================================= -->
                      <div class="search-parent" id="header-search-parent">
                           <div class="searchbox">
<!--
                               <i class="icon-search"></i>
                                <div class="dropdown-menu">
-->
                                   <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                       <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Type to search' ); ?>" />
                                       <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                   </form>
<!--                                </div>-->
                           </div>
                      </div>
                        <div class="sectionDropDown">
                            <button class="dbtn"><span class="glyphicon glyphicon-ok"></span> </button>
                            <div class="d-content">
                          <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => 'bootstrap_menu', 'menu_class' => 'nav navbar-nav', 'walker' => new bootstrap_navigation() ) ); ?>
                        </div></div>

                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.yamm -->
        </div>
        <!-- /.navbar -->
    </header>

    <!-- ============================================================= HEADER : END ============================================================= -->
