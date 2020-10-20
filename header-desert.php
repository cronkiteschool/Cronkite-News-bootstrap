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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



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
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre:700|Taviraj:400,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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
			$output = "ga('set', 'contentGroup1', 'Borderlands');";
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
		<script src="<?php bloginfo('template_directory');?>/js/plugins/jquery.scrolldepth.js"></script>

    <script>
      $(document).ready(function() { 
        $('.dropdown-toggle').dropdown();
        });
    </script>


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
     <nav class="navbar navbar-fixed-top" style="background-color:#F68821;">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <a href="https://cronkitenews.azpbs.org/"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2017/04/CN_TRANSPARENT2.png" style="margin-top:10px;width:80px;height:50px;"></a>
    <a href='https://cronkitenews.azpbs.org/2017/04/28/development-in-the-desert/'> <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2017/04/Grad-Project-Logo-1.png" style="width:250px;height:100px;" id="dd_logo"></a>
    <div class="navbar-right">

    <button type="button" class="btn dropdown-toggle" id="ddmenubtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#F68821;margin-right:20px;">
    Stories <span class="glyphicon glyphicon-menu-hamburger" style="margin-left:5px;"></span>
      </button>
  <ul class="dropdown-menu">
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/development-in-the-desert/">Home</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/growing-pains-roads-across-state/">Growing Pains on Roads</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/diversity-senior-living-retirement/">Senior Living Development</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/arizonas-tech-sector-taking-steps-to-rise-to-prominence/">Valley Tech Trends</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/art-changes-phoenix/">Phoenix and the Arts</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/light-rail-expansion-2/">Light Rail Expansion Concerns</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/brain-drain-persisting-problem-for-arizona/">Arizona's Brain Drain</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/status-check-of-arizonas-copper-mine/">Arizona Copper Mine</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/urban-heat-island/">Urban Heat Island</a></li>
    <li><a href="https://cronkitenews.azpbs.org/2017/04/28/about-development-in-the-desert/"> About the Project </a> </li>
  </ul>
</div>

  </div><!-- /.container-fluid -->
</nav>
    </header>
