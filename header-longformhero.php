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

    <script src="<?php bloginfo('template_directory');?>/js/jquery-3.2.1.min.js"></script>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#216CB7">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php the_field('favicon', 'options'); ?>" rel="icon">
    <link type="image/png" href="<?php the_field('favicon', 'options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php the_field('favicon', 'options'); ?>"  rel="apple-touch-icon">

		<!-- font awesome -->
		<script src="https://use.fontawesome.com/9e4502c156.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">

    <!-- Load Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre:700|Taviraj:400,700" rel="stylesheet">

    <!-- Google Analytics Tracking Code  -->

		<?php
    // get the category for GA
        $post = get_post();
        $categories = get_the_category($post -> ID);
        $output = '';

        if (! empty($categories)) {
            foreach ($categories as $category) {
                if ($output == '') {
                    if ($category->name == "Borderlands") {
                        //$output = "ga('set', 'Borderlands', '"  . esc_html( $category->name ) . "');";
                        $output = "ga('set', 'contentGroup1', 'Borderlands');";
                    }
                    if ($category->name == "Sustainability") {
                        $output = "ga('set', 'contentGroup2', 'Sustainability');";
                    }
                    if ($category->name == "Education") {
                        $output = "ga('set', 'contentGroup3', 'Education');";
                    }
                    if ($category->name == "Consumer") {
                        $output = "ga('set', 'contentGroup4', 'Consumer');";
                    }
                    if ($category->name == "Future") {
                        $output = "ga('set', 'contentGroup5', 'Future');";
                    }
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
           <?php echo $output ?>
           ga('send', 'pageview');



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
	 /*jQuery(function() {
		 jQuery.scrollDepth({
		  minHeight: 1000,
		  userTiming: false
		});
});*/
	 </script>
	 <link rel='stylesheet' id='normalize-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/core/normalize.css' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/bootstrap.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/slick.css' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-customizer-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/core/customizer.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/font-awesome.css' type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/animate.css' type='text/css' media='all' />
<link rel='stylesheet' id='hover-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/hover.css' type='text/css' media='all' />
<link rel='stylesheet' id='owl-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/owl.carousel.css' type='text/css' media='all' />
<link rel='stylesheet' id='owl-trans-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/owl.transitions.css' type='text/css' media='all' />
<link rel='stylesheet' id='remodal-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/jquery.remodal.css' type='text/css' media='all' />
<link rel='stylesheet' id='fontello-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/css/plugins/fontello.css' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/style.css' type='text/css' media='all' />


</head>

<body <?php body_class(); ?>>

   <!-- Add This Social Sharing -->
   <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>


<!--
    <!-- ============================================================= HEADER ============================================================= -->

    <header>
         <div class="navbar navbar fixed-top">
            <div class="navbar-header" style="border-bottom:0px; opaccity:0.9 !important;background: #234384;">
                <div class="container-fluid">
         <a href="https://cronkitenews.azpbs.org/">
            <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2017/04/CN_TRANSPARENT2.png" style="width:80px;height:50px; z-index:1000; margin-top:10px;"></a>


        <div class="dropdown  pull-right" style="margin-top:-60px;">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class='icon-menu-1'></i></button>
 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="z-index:999;">
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/borderlands/" style="display:block;">Borderlands</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/consumer/" style="display:block;">Consumer</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/education/" style="display:block;">Education</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/future/" style="display:block;">Future</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/government/" style="display:block;">Government</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/health/" style="display:block;">Health</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/indian-country/" style="display:block;">Indian Country</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/justice/" style="display:block;">Justice</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/money/" style="display:block;">Money</a></li>
   <li style="display:block;"><a href="https://cronkitenews.azpbs.org/category/sustainability/" style="display:block;">Sustainability</a></li>

  </ul>
        </div><!--      Dropdown  -->

     </div><!--      Container-fluid  -->

</div>    <!--      Navbar-header  -->

</div>
    </header>
    <!-- ============================================================= HEADER : END ============================================================= -->
