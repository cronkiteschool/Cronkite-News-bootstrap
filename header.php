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
	<meta name="theme-color" content="#216CB7">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Add Favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>"  rel="apple-touch-icon">

    <!-- Load Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">
    <!-- Set the viewport width to device width for mobile -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- ============================================================= HEADER ============================================================= -->

    <header>
        <div class="navbar">
            <div class="navbar-header">
                <div class="container">
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

                    <!-- /.social -->

                    <!-- ============================================================= LOGO MOBILE ============================================================= -->

                    <a class="navbar-brand logo"  href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php echo get_header_image(); ?>" /></a>

                    <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                    <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
                </div><!-- /.container -->
            </div>
            <!-- /.navbar-header -->

            <div class="yamm">
                <div class="navbar-collapse collapse">
                    <div class="container">

                                <!-- ============================================================= LOGO ============================================================= -->

                                <a class="navbar-brand"  href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php echo get_header_image(); ?>" /></a>

                                <!-- ============================================================= LOGO : END ============================================================= -->

                                <!-- ============================================================= MAIN NAVIGATION ============================================================= -->

                                  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => 'bootstrap_menu', 'menu_class' => 'nav navbar-nav', 'walker' => new bootstrap_navigation() ) ); ?>

                                <!-- ============================================================= MAIN NAVIGATION : END ============================================================= -->
                      <div class="search-parent">
                           <div class="searchbox">
                               <i class="icon-search"></i>
                                <div class="dropdown-menu">
                                   <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                       <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Type to search' ); ?>" />
                                       <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                   </form>
                                </div>
                           </div>
                      </div>
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

