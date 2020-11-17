<?php
/**
 * Functions
 */

/******************************************************************************
                        Global Functions
******************************************************************************/


// Enable shortcodes
require_once('lib/shortcodes.php');

//  Add widget support shortcodes
add_filter('widget_text', 'do_shortcode');

// Custom Editor Style Support
add_editor_style();

// Support for Featured Images
add_theme_support( 'post-thumbnails' );

// Support for Post Formats
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

// Custom Background
add_theme_support( 'custom-background', array('default-color' => 'fff'));

// Custom Header
add_theme_support( 'custom-header', array(
    'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
    'height'        => '200',
    'flex-height'    => true,
    'uploads'       => true,
    'header-text'   => false
) );

// custom image sizes
add_image_size('related-story-photo', 400, 400);
add_image_size('awards_logo', 540, 304 );
add_image_size('slider', 208, 180);

// Register Navigation Menu
register_nav_menus( array(
    'header-menu' => 'Header Menu',
    'footer-menu' => 'Footer Menu'
) );

/* Added: Sunday, Nov. 3rd, 2020 - Custom rss feed */
add_action( 'init', 'newRSSFeed' );
function newRSSFeed() {
   add_feed( 'cronkitenewsfeed', 'newRSSFeedCallback' );
}

/* This code seeks the template for your RSS feed */
function newRSSFeedCallback(){
    get_template_part( 'rss', 'cronkitenewsfeed' ); // need to be in small case.
}

// get author for stories
function getStoryAuthors($getPID) {
  $finalAuthors = '';
  $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                         'colorado-public-radio' => "https://www.cpr.org/",
                         'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                         'elemental-reports' => "https://www.elementalreports.com/",
                         'globalsport-matters' => "https://www.globalsportmatters.com/",
                         'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                         'KJZZ' => "https://www.kjzz.org",
                         'KPCC' => "https://www.scpr.org/",
                         'KUNC' => "https://www.kunc.org/",
                         'KUER' => "https://www.kunc.org/post/one-got-away-look-glen-canyon-40-years-after-it-was-filled#stream/0",
                         'LAIST' => "https://laist.com/",
                         'PBS-SoCal' => "https://www.pbssocal.org/",
                         'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                         'special-to-cronkite-news' => ""
                        );
  $externalAuthorCount = 1;
  $internalAuthorCount = 0;
  $commaSeparator = ',';
  $andSeparator = ' and ';
  $cnStaffCount = 0;
  $newCheck = 0;

  // bypass group not showing repeater field issue
  $groupFields = get_field('byline_info', $getPID);
  $externalAuthorRepeater = $groupFields['external_authors_repeater'];

  $normalizeChars = array(
     'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
     'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
     'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
     'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
     'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
     'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
     'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
     'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
 );

 if (have_rows('byline_info', $getPID)) {
    $sepCounter = 0;
    while (have_rows('byline_info', $getPID)) {
      the_row();
      $staffID = get_sub_field('cn_staff');
      $cnStaffCount = count($staffID);

      foreach ($staffID as $key => $val) {
        $args = array(
                      'post_type'   => 'students',
                      'post_status' => 'publish',
                      'p' => $val
                    );

        $staffDetails = new WP_Query( $args );
        if ($staffDetails->have_posts()) {
          while ($staffDetails->have_posts()) {
            $staffDetails->the_post();
            $sepCounter++;

            $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));
            $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

            $finalAuthors .= get_the_title($val);
            if ($sepCounter != $cnStaffCount) {
              if ($sepCounter == ($cnStaffCount - 1)) {
                $finalAuthors .= $andSeparator.' ';
              } else {
                $finalAuthors .=  $commaSeparator.' ';
              }
            }
          }
        }
        $newCheck++;
      }
    }


    if (count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
      $extStaffCount = count($externalAuthorRepeater);
      if ($groupFields['cn_staff'] != '') {
        $finalAuthors .= ' and ';
      }
      $sepCounter = 0;
      foreach ($externalAuthorRepeater as $key => $val ) {
        $sepCounter++;
        $finalAuthors .= $val['external_authors'];

        if ($sepCounter != $extStaffCount) {
          if ($sepCounter == ($extStaffCount - 1)) {
            $finalAuthors .= $andSeparator.' ';
          } else {
            $finalAuthors .= $commaSeparator.' ';
          }
        }
      }
      $newCheck++;
    }
  }

  if ($newCheck == 0 && get_field('post_author') != '') {
    //echo '<!--HERE BYLINE OLD-->';
    //echo '<span class="author_name">By ';
    if ($postAuthor = get_field('post_author')) {
      $finalAuthors .= $postAuthor;
    }
  }
  wp_reset_query();
  return $finalAuthors;
}

function hook_parselyJSON() {
    if (is_page()) {
      $pageType = 'WebPage';
      $headline = get_the_title(get_the_ID());
      $storyURL = addcslashes(get_the_permalink(get_the_ID()), '/');
      $imgURL = '';
  ?>

    <!-- BEGIN Parsely JSON-LD -->
    <meta name="wp-parsely_version" id="wp-parsely_version" content="2.2"/>
    <script type="application/ld+json">
      {"@context":"http:\/\/schema.org","@type":"<? echo $pageType; ?>","headline":"<? echo $headline; ?>","url":"<? echo $storyURL; ?>"}
    </script>

  <?php
    } else if (is_single()) {
      $pageType = 'NewsArticle';
      $publisher = 'Cronkite News - Arizona PBS';
      $headline = html_entity_decode(get_the_title(get_the_ID()));
      $storyURL = addcslashes(get_the_permalink(get_the_ID()), '/');
      $dateCreated = '';
      $datePublished = get_the_time('c', get_the_ID());
      $datePublished = new DateTime($datePublished);
      $dateCreated = $datePublished->format(DateTime::ATOM);
      $dateModified = $dateCreated;

      // keywords
      $rawKeywords = get_the_tags(get_the_ID());
      if ($rawKeywords) {
        foreach($rawKeywords as $tag) {
          $keywords .= '"'.$tag->name.'",';
        }
      }
      $keywords = substr($keywords, 0, -1);

      // categories
      $rawCats = wp_get_post_categories(get_the_ID());
      foreach($rawCats as $cid){
        $cat = get_category( $cid );
        if ($cat->name != 'New Long Form' || $cat->name != "Editor's Picks" || $cat->name != "Big Boy" || $cat->name != "Longform hero image slim") {
          $articleSection = $cat->name;
        }
      }

      // get authors
      $rawAuthors = str_replace(' and ', ',', getStoryAuthors(get_the_ID()));
      $splitAuthors = explode(',', $rawAuthors);
      foreach ($splitAuthors as $k => $v) {
        $creators .= '"'.trim($v).'",';
        $authors .= '{"@type":"Person","name":"'. trim($v) . '"},';
      }
      $creators = substr($creators, 0, -1);
      $authors = substr($authors, 0, -1);

      // get image url
      $imgURL = addcslashes(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'), '/');
  ?>
      <!-- BEGIN Parsely JSON-LD -->
    	<script type="application/ld+json">
    		{"@context":"http:\/\/schema.org",
        "@type":"<? echo $pageType; ?>",
        "mainEntityOfPage":{"@type":"WebPage","@id":"<? echo $storyURL; ?>"},
        "headline":"<? echo $headline; ?>",
        "url":"<? echo $storyURL; ?>",
        "thumbnailUrl":"<? echo $imgURL; ?>",
        "image":{"@type":"ImageObject","url":"<? echo $imgURL; ?>"},
        "dateCreated":"<? echo $dateCreated; ?>",
        "datePublished":"<? echo $dateCreated; ?>",
        "dateModified":"<? echo $dateModified; ?>",
        "articleSection":"<? echo $articleSection; ?>",
        "author":[<? echo $authors; ?>],
        "creator":[<? echo $creators; ?>],
        "publisher":{"@type":"Organization","name":"<? echo $publisher; ?>"},
        "keywords":[<? echo $keywords; ?>]}
    	</script>
  <?php
    }
}
add_action('wp_head', 'hook_parselyJSON');


function hook_parselyTrack() {
  ?>
  <!-- START Parse.ly Include: Standard -->
  <script data-cfasync="false" id="parsely-cfg" data-parsely-site="cronkitenews.azpbs.org" src="//cdn.parsely.com/keys/cronkitenews.azpbs.org/p.js"></script>
  <!-- END Parse.ly Include: Standard -->
  <?
}
add_action('wp_footer', 'hook_parselyTrack');


// Navigation Menu Adjustments

    /* Add class to navigation sub-menu */
    class bootstrap_navigation extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth = 0, $args = array()) {
	   $output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    $item_html = '';
	    parent::start_el($item_html, $item, $depth, $args);

	    if ( $item->is_dropdown && $depth === 0 ) {
            $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
            $item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
	    }
	    $output .= $item_html;
	 }

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
	    if ( $element->current )
            $element->classes[] = 'active';
            $element->is_dropdown = !empty( $children_elements[$element->ID] );

            if ( $element->is_dropdown ) {
                if ( $depth === 0 ) {
                    $element->classes[] = 'dropdown';
                } elseif ( $depth === 1 ) {
                    // Extra level of dropdown menu,
                    // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                    $element->classes[] = 'dropdown-submenu';
                }
            }
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	    }
    }

    /* Display Pages In Navigation Menu */
    if ( ! function_exists( 'bootstrap_menu' ) ) :
	function bootstrap_menu() {
		$pages_args = array(
		    'sort_column' => 'menu_order, post_title',
		    'menu_class'  => '',
		    'include'     => '',
		    'exclude'     => '',
		    'echo'        => true,
		    'show_home'   => false,
		    'link_before' => '',
		    'link_after'  => ''
		);

		wp_page_menu($pages_args);
	}
    endif;

    /* Add CLASS attributes to the first <ul> occurence in wp_page_menu */
    function add_menuclass( $ulclass ) {
	    return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $ulclass, 1 );
    }
    add_filter( 'wp_page_menu', 'add_menuclass' );

// Create pagination
    function bootstrap_pagination() {
        global $wp_query;
        $big = 999999999;

        $links = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_next' => true,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type' => 'list'
            )
        );

        $pagination = str_replace("<ul class='page-numbers'>","<ul class='pagination text-center'>",$links);
        echo $pagination;
    }

// Register Sidebars

    /* Sidebar Right */
        register_sidebar( array(
            'id' => 'sidebar_right',
            'name' => __( 'Sidebar Right' ),
            'description' => __( 'This sidebar is located on the right-hand side of each page.'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

        /* Sidebar Archive */
        register_sidebar( array(
            'id' => 'sidebar_archive',
            'name' => __( 'Sidebar Archive' ),
            'description' => __( 'This sidebar is located on the right-hand side of each page.'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

        /* Sidebar Category */
        register_sidebar( array(
            'id' => 'sidebar_category',
            'name' => __( 'Sidebar Category' ),
            'description' => __( 'This sidebar is located on the right-hand side of each page.'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

		   register_sidebar( array(
            'id' => 'sidebar_newscast',
            'name' => __( 'Sidebar Archive Newscast' ),
            'description' => __( ''),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

        register_sidebar( array(
           'id' => 'sidebar_new_story',
           'name' => __( 'Sidebar New Story Template - 2020' ),
           'description' => __( ''),
           'before_widget' => '<aside id="%1$s" class="widget %2$s">',
           'after_widget' => '</aside>',
           'before_title' => '<h5>',
           'after_title' => '</h5>',
        ));

        register_sidebar( array(
           'id' => 'sidebar_author',
           'name' => __( 'Sidebar Author - 2020' ),
           'description' => __( ''),
           'before_widget' => '<aside id="%1$s" class="widget %2$s">',
           'after_widget' => '</aside>',
           'before_title' => '<h5>',
           'after_title' => '</h5>',
        ));



// Remove #more anchor from posts
    function remove_more_jump_link($link) {
        $offset = strpos($link, '#more-');
        if ($offset) { $end = strpos($link, '"',$offset); }
        if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
        return $link;
    }
    add_filter('the_content_more_link', 'remove_more_jump_link');


// Custom Post Excerpt
    if ( ! function_exists( 'bootstrap_excerpt' ) ) :

    function content($limit) {
	    $content = explode(' ', get_the_content(), $limit);
	    if (count($content)>=$limit) {
	        array_pop($content);
	        $content = implode(" ",$content).'...<a href="'. get_permalink($post->ID) . '" class="read_more">The Latest</a>';
	    } else {
	        $content = implode(" ",$content);
	    }

	    $content = preg_replace('/\[.+\]/','', $content);
	    $content = apply_filters('the_content', $content);
	    $content = str_replace(']]>', ']]&gt;', $content);
	    return $content;
	}

    endif;

/*Disable Theme Updates # 3.0+*/
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
    wp_clear_scheduled_hook( 'wp_update_themes' );


// Disable wordpress jQuery
    function modify_jquery() {
        if (!is_admin()) {
            wp_enqueue_script('jquery');
        }
    }
    add_action('init', 'modify_jquery');

/******************************************************************************************************************************
			    Enqueue Scripts and Styles for Front-End
*******************************************************************************************************************************/
if (!is_admin()) {

  function bootstrap_scripts_and_styles() {
    if (!is_page( 'youth-suicide' ) && !is_page( 'impeachment-sentiment' ) && !is_single() && !is_search()) {
      // Load JavaScripts
      wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.js', array( 'jquery' ), '3.3.1', true );
      if (!is_single (132417)) {
        wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true );
      }
      wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/plugins/respond.js', null, '1.4.0', true );
      wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, '2.6.2', true );
      wp_enqueue_script( 'image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, null, true );

      wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/plugins/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
      wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/plugins/jquery.isotope.js', array( 'jquery' ), '1.5.25', true );
      wp_enqueue_script( 'jquery-remodal', get_template_directory_uri() . '/js/plugins/jquery.remodal.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'jquery-scrolldepth', get_template_directory_uri() . '/js/plugins/jquery.scrolldepth.js', array( 'jquery' ), '0.9.1', true );

      wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow.js', null, '0.1.6', true );
      wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.js', null, '1.4.1', true );
      wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true );
      wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight.js', null, '0.5.2', true );

      //Custom Scripts
      if (!is_single (132417)) {
        wp_enqueue_script( 'viewport', get_template_directory_uri() . '/js/plugins/viewport-units-buggyfill.js', null, '0.4.2', true );
        // wp_enqueue_script( 'google', get_template_directory_uri() . '/js/plugins/_google.maps.api.v3.js', null, null, true );
        wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/plugins/skrollr.js', null, '0.6.29', true );
        wp_enqueue_script( 'scroll_style', get_template_directory_uri() . '/js/plugins/skrollr.stylesheets.js', null, '0.0.4', true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/plugins/waypoints.js', null, '2.0.3', true );
        wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/js/plugins/waypoints-sticky.js', null, '2.0.3', true );

        wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/plugins/bootstrap-hover-dropdown.min.js', null, null, true );
      }

  // Load Stylesheets
      //core
      wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/core/normalize.css', null, '3.0.1' );
      if (is_single( 131130 )) {

      } else {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.css', null, '3.3.1' );
      }
      wp_enqueue_style( 'slick', get_template_directory_uri().'/css/plugins/slick.css', null, null );
      wp_enqueue_style( 'bootstrap-customizer', get_template_directory_uri().'/css/core/customizer.css', null, null );
      //plugins
      //wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/plugins/font-awesome.css', null, '4.2.0' );
      wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.css', null, null );
      wp_enqueue_style( 'hover', get_template_directory_uri().'/css/plugins/hover.css', null, '1.0.8' );
      wp_enqueue_style( 'owl', get_template_directory_uri().'/css/plugins/owl.carousel.css', null, '1.3.2' );
      wp_enqueue_style( 'owl', get_template_directory_uri().'/css/plugins/owl.theme.default.css', null, 'null' );
      wp_enqueue_style( 'owl-trans', get_template_directory_uri().'/css/plugins/owl.transitions.css', null, '1.3.2' );
      wp_enqueue_style( 'remodal', get_template_directory_uri().'/css/plugins/jquery.remodal.css', null, null );


      //Custom Styles
      wp_enqueue_style( 'fontello', get_template_directory_uri().'/css/plugins/fontello.css', null, null );

      //system
      if (!is_page( 119949 ) || !is_page(146950)) {
        wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*2nd priority*/
      }
    }
  }

  $checkPeoplePage = explode('/', $_SERVER[REQUEST_URI]);

  if (!is_search() && !is_single() && $checkPeoplePage[1] != 'people' && $checkPeoplePage[1] != 'category') {
    add_action( 'wp_enqueue_scripts', 'bootstrap_scripts_and_styles' );
  }

  function bootstrap_scripts_and_styles_old() {
      // Load JavaScripts
      wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.js', array( 'jquery' ), '3.3.1', true );
      wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true );
      wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/plugins/respond.js', null, '1.4.0', true );
      wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, '2.6.2', true );
      wp_enqueue_script( 'image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, null, true );

      wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/plugins/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
      wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/plugins/jquery.isotope.js', array( 'jquery' ), '1.5.25', true );
      wp_enqueue_script( 'jquery-remodal', get_template_directory_uri() . '/js/plugins/jquery.remodal.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'jquery-scrolldepth', get_template_directory_uri() . '/js/plugins/jquery.scrolldepth.js', array( 'jquery' ), '0.9.1', true );

      wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow.js', null, '0.1.6', true );
      wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.js', null, '1.4.1', true );
      wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true );
      wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight.js', null, '0.5.2', true );

      //Custom Scripts
      wp_enqueue_script( 'viewport', get_template_directory_uri() . '/js/plugins/viewport-units-buggyfill.js', null, '0.4.2', true );
      // wp_enqueue_script( 'google', get_template_directory_uri() . '/js/plugins/_google.maps.api.v3.js', null, null, true );
      wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/plugins/skrollr.js', null, '0.6.29', true );
      wp_enqueue_script( 'scroll_style', get_template_directory_uri() . '/js/plugins/skrollr.stylesheets.js', null, '0.0.4', true );
      wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/plugins/waypoints.js', null, '2.0.3', true );
      wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/js/plugins/waypoints-sticky.js', null, '2.0.3', true );
      wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/plugins/bootstrap-hover-dropdown.min.js', null, null, true );

      // Load Stylesheets
      //core
      wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/core/normalize.css', null, '3.0.1' );
      wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.css', null, '3.3.1' );
      wp_enqueue_style( 'slick', get_template_directory_uri().'/css/plugins/slick.css', null, null );
      wp_enqueue_style( 'bootstrap-customizer', get_template_directory_uri().'/css/core/customizer.css', null, null );
      //plugins
      //wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/plugins/font-awesome.css', null, '4.2.0' );
      wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.css', null, null );
      wp_enqueue_style( 'hover', get_template_directory_uri().'/css/plugins/hover.css', null, '1.0.8' );
      wp_enqueue_style( 'owl', get_template_directory_uri().'/css/plugins/owl.carousel.css', null, '1.3.2' );
      wp_enqueue_style( 'owl', get_template_directory_uri().'/css/plugins/owl.theme.default.css', null, 'null' );
      wp_enqueue_style( 'owl-trans', get_template_directory_uri().'/css/plugins/owl.transitions.css', null, '1.3.2' );
      wp_enqueue_style( 'remodal', get_template_directory_uri().'/css/plugins/jquery.remodal.css', null, null );

      //Custom Styles
      wp_enqueue_style( 'fontello', get_template_directory_uri().'/css/plugins/fontello.css', null, null );

      //system
      wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*2nd priority*/
  }

  if (is_single(114724)) {
    add_action( 'wp_enqueue_scripts', 'bootstrap_scripts_and_styles_old' );
  }

}



/******************************************************************************
			    Additional Functions
*******************************************************************************/
// Register Post Type Slider
    function post_type_slider() {
        $post_type_slider_labels = array(
            'name'               => _x( 'Slider', 'post type general name' ),
            'singular_name'      => _x( 'Slide', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'slide' ),
            'add_new_item'       => __( 'Add New' ),
            'edit_item'          => __( 'Edit' ),
            'new_item'           => __( 'New ' ),
            'all_items'          => __( 'All' ),
            'view_item'          => __( 'View' ),
            'search_items'       => __( 'Search for a slide' ),
            'not_found'          => __( 'No slides found' ),
            'not_found_in_trash' => __( 'No slides found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Slider'
        );
        $post_type_slider_args = array(
            'labels'        => $post_type_slider_labels,
            'description'   => 'Display Slider',
            'public'        => true,
            'menu_icon'	=> false,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
            'has_archive'   => true,
            'hierarchical'  => true
        );
        register_post_type( 'slider', $post_type_slider_args );
    }
    add_action( 'init', 'post_type_slider' );


// For ACF: Options add-on
    add_filter('acf/options_page/settings', 'my_options_page_settings');
    function my_options_page_settings($options) {
        $options['title'] = __('Theme Settings');
        $options['pages'] = array(
            __('Header'),
            __('Footer'),
            //__('Home Slider')
        );
        return $options;
    }

/*********************** PUT YOUR FUNCTIONS BELOW ********************************/

// Stick Admin Bar To The Top
if (!is_admin()) {
    add_action('get_header', 'my_filter_head');

    function my_filter_head() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    function stick_admin_bar() {
        echo "
            <style type='text/css'>
                body.admin-bar {margin-top:32px !important}
                @media screen and (max-width: 782px) {
                    body.admin-bar { margin-top:46px !important }
                }
                @media screen and (max-width: 600px) {
                    body.admin-bar { margin-top:46px !important }
                    html #wpadminbar{ margin-top: -46px; }
                }
            </style>
            ";
    }

    add_action('admin_head', 'stick_admin_bar');
    add_action('wp_head', 'stick_admin_bar');
}

// Customize Login Screen
function wordpress_login_styling() { ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url('<?php echo get_header_image(); ?>');
            background-size: contain;
            width: auto;
            height: 100px;
        }
        body.login{
            background-color: #<?php echo get_background_color(); ?>;
            background-image: url('<?php echo get_background_image(); ?>') !important;
            background-repeat: repeat;
            background-position: center center;
        };

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

function admin_logo_custom_url(){
    $site_url = get_bloginfo('url');
    return ($site_url);
}
add_filter('login_headerurl', 'admin_logo_custom_url');

function new_excerpt_more( $more ) {
    return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

//http://cronkitenews.azpbs.org/category/education/


add_filter('mce_css', 'tuts_mcekit_editor_style');
function tuts_mcekit_editor_style($url) {

    if ( !empty($url) )
        $url .= ',';

    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url(__FILE__) ) . '/editor-styles.css';

    return $url;
}

/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );

function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 */
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );

function tuts_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Title with transparent background',
            'block' => 'h1',
            'classes' => 'fadeInDown-1 light-color'
        ),

        array(
            'title' => 'Title with background',
            'block' => 'h1',
            'classes' => 'fadeInDown-1 dark-bg light-color'
        ),


        array(
            'title' => 'Link Button',
            'block' => 'div',
            'classes' => 'fadeInDown-3 btn-slider'
        ),

        array(
            'title' => 'Other Text',
            'block' => 'div',
            'classes' => 'fadeInDown-2 light-color'
        ),
        array(
            'title' => 'Red Uppercase Text',
            'inline' => 'span',
            'classes' => 'spanh1 fadeInDown-1 light-color',

        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}


// Turn off visual editor for everything but sliders
add_filter( 'user_can_richedit', 'disable_visual_editor' );
function disable_visual_editor() {
  if ( 'slider' == get_post_type() ) {
      return true;
  }
  return false;
}

// Make months AP style
function ap_date() {
    if (get_the_time('m')=='01') :
        $apmonth = 'Jan. ';
    elseif (get_the_time('m')=='02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m')=='08') :
        $apmonth = 'Aug. ';
    elseif (get_the_time('m')=='09') :
        $apmonth = 'Sept. ';
    elseif (get_the_time('m')=='10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m')=='11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m')=='12') :
        $apmonth = 'Dec. ';
    else:
        $apmonth = (get_the_time('F'));
    endif;
    //$thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    $thedate = $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    return $thedate;
}

add_image_size( 'single-post', 840, 560, true );

// Enable single category custom template. Currently for Big Boy template but others can be added
// To use: Create a category, then name the template file single-cat-slug.php
// From http://justintadlock.com/archives/2008/12/06/creating-single-post-templates-in-wordpress
define('SINGLE_PATH', TEMPLATEPATH . '/templates');
add_filter('single_template', 'my_single_template');
function my_single_template($single) {
	global $wp_query, $post;
	foreach((array)get_the_category() as $cat) :
		if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
			return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
	endforeach;
	return $single;
}
// Remove auto generated feed links
function my_remove_feeds() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
}
add_action( 'after_setup_theme', 'my_remove_feeds' );

/*******************************************************************************/


// AMP functions

add_filter( 'amp_customizer_is_enabled', '__return_false' );


add_filter( 'amp_post_template_file', 'xyz_amp_set_custom_template', 10, 3 );

function xyz_amp_set_custom_template( $file, $type, $post ) {
	if ( 'single' === $type ) {
		$file = dirname( __FILE__ ) . '/templates/template-amp.php';
	}
	return $file;
}

add_action( 'amp_post_template_css', 'xyz_amp_additional_css_styles' );

function xyz_amp_additional_css_styles( $amp_template ) {
	// only CSS here please...
	?>
	header.amp-wp-header {
		padding: 0;
		background: #234384;
	}
	header.amp-wp-header a {
		background-image: url( 'https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/FB_logo.png' );
		background-repeat: no-repeat;
		background-size: contain;
		display: block;
		height: 60px;
		width: 300px;
		margin: 0 auto;
		text-indent: -9999px;
	}

    .amp-wp-byline amp-img {
		display: none;
	}

    .amp-wp-footer div p
    {
    display: none;
    }

    .amp-wp-article-content div,   .amp-wp-article-content iframe
    {
        width: 100%;
    }

    .amp-wp-article-content div img
    {
        width: 100%;
        height: 100%;
    }
    .embed-responsive-item
    {
        width: 100%;
        height: 300px;
    }
    #amp-related-posts p amp-img {
        margin-right:1em;
        vertical-align: middle;
    }
    #amp-related-posts p {
    padding-bottom: 10px;
    }
    #amp-related-posts p a, #amp-related-posts p a:visited
    {
        color: rgb(0, 0, 238);
    }
     #amp-related-posts p span
    {
        float: right;
        width: 50%;
    }
    .master-slider-parent
    {
        display: none;
    }
    .amp-wp-footer div a, .amp-wp-footer div a:visited
    {
        color: rgb(0,0,238);
    }
    .menu-button
    {
    display: inline-block;
    float:right;
    margin-top: -60px;
    }
    #sidebar
    {
    background-color: #234384;
    }
    #sidebar ul li a
    {
    color: white;
    text-decoration: none;
    text-transform: uppercase;


    }
    #sidebar ul li
    {
    padding: 10px;
    border-bottom: 1px solid white;
    }
     #sidebar ul li:last-child
    {
    background-color: red;
    }
    .amp-wp-footer
    {
    background: #234384;
    }
    .amp-wp-footer a, .amp-wp-footer div h2, .amp-wp-footer .back-to-top
    {
        color: white;
    }
    .no-amp
    {
        display:none;
    }
	<?php
}

add_filter( 'amp_post_template_analytics', 'xyz_amp_add_custom_analytics' );
function xyz_amp_add_custom_analytics( $analytics ) {
	if ( ! is_array( $analytics ) ) {
		$analytics = array();
	}

	// https://developers.google.com/analytics/devguides/collection/amp-analytics/
	$analytics['xyz-googleanalytics'] = array(
		'type' => 'googleanalytics',
		'attributes' => array(
			// 'data-credentials' => 'include',
		),
		'config_data' => array(
			'vars' => array(
				'account' => "UA-3145657-18"
			),
			'triggers' => array(
				'trackPageview' => array(
					'on' => 'visible',
					'request' => 'pageview',
				),
			),
		),
	);

	// https://www.parsely.com/docs/integration/tracking/google-amp.html
	$analytics['xyz-parsely'] = array(
		'type' => 'parsely',
		'attributes' => array(),
		'config_data' => array(
			'vars' => array(
				'apikey' => 'cronkitenews.azpbs.org',
			)
		),
	);

	return $analytics;
}

/**
 * Add related posts to AMP amp_post_article_footer_meta
 */
function my_amp_post_article_footer_meta( $parts ) {

    $index = 1;

    array_splice( $parts, $index, 0, array( 'my-related-posts' ) );

    return $parts;
}
add_filter( 'amp_post_article_footer_meta', 'my_amp_post_article_footer_meta' );

/**
 * Designate the template file for related posts
 */
function my_amp_related_posts_path( $file, $template_type, $post ) {

    if ( 'my-related-posts' === $template_type ) {
        $file = get_stylesheet_directory() . '/templates/amp-related-posts.php';
    }
    return $file;
}
add_filter( 'amp_post_template_file', 'my_amp_related_posts_path', 10, 3 );


// Move Yoast to bottom
function wpcover_move_yoast() {
    return 'high';
}
add_filter( 'wpseo_metabox_prio', 'wpcover_move_yoast');



// custom post type for students
function students_CPT() {
    $cpt_students_labels = array(
        'name'               => _x( 'Students', 'post type general name' ),
        'singular_name'      => _x( 'Student', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Student' ),
        'add_new_item'       => __( 'Add New' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a student' ),
        'not_found'          => __( 'No student found' ),
        'not_found_in_trash' => __( 'No student found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Students'
    );
    $cpt_students_args = array(
        'labels'        => $cpt_students_labels,
        'description'   => 'Display Student',
        'public'        => true,
        'menu_icon'	=> false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields', 'post-formats')
    );
    register_post_type( 'students', $cpt_students_args );
}
add_action( 'init', 'students_CPT' );

if ( function_exists( 'acf_add_options_sub_page' ) ){
	acf_add_options_sub_page(array(
		'title'      => 'Student Settings',
		'parent'     => 'edit.php?post_type=students',
		'capability' => 'manage_options'
	));
}

// custom post type for staff
function staff_CPT() {
    $cpt_staff_labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Staff' ),
        'add_new_item'       => __( 'Add New' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a staff' ),
        'not_found'          => __( 'No student found' ),
        'not_found_in_trash' => __( 'No student found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Cronkite Staff'
    );
    $cpt_staff_args = array(
        'labels'        => $cpt_staff_labels,
        'description'   => 'Display Staff',
        'public'        => true,
        'menu_icon'	=> false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields', 'post-formats')
    );
    register_post_type( 'cn_staff', $cpt_staff_args );
}
add_action( 'init', 'staff_CPT' );


// custom tags for stories
function storytags_CPT() {
    $storytags_labels = array(
        'name'               => _x( 'Story Tags', 'post type general name' ),
        'singular_name'      => _x( 'Story Tag', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Story Tag' ),
        'add_new_item'       => __( 'Add New' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a story tag' ),
        'not_found'          => __( 'No story tag found' ),
        'not_found_in_trash' => __( 'No story tag found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Story Tags'
    );
    $storytags_args = array(
        'labels'        => $storytags_labels,
        'description'   => 'Display Story Tags',
        'public'        => true,
        'menu_icon'	=> false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields', 'post-formats')
    );
    register_post_type( 'storytags', $storytags_args );
}
add_action( 'init', 'storytags_CPT' );


// custom post type for staff
function explore_CPT() {
    $cpt_explore_labels = array(
        'name'               => _x( 'Explores', 'post type general name' ),
        'singular_name'      => _x( 'Explore', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Story' ),
        'add_new_item'       => __( 'Add New' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a story' ),
        'not_found'          => __( 'No student found' ),
        'not_found_in_trash' => __( 'No student found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Explore Section'
    );
    $cpt_explore_args = array(
        'labels'        => $cpt_explore_labels,
        'description'   => 'Display Stories',
        'public'        => true,
        'menu_icon'	=> false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields', 'post-formats')
    );
    register_post_type( 'explore_stories', $cpt_explore_args );
}
add_action( 'init', 'explore_CPT' );



// custom post type for election2020
function election2020_CPT() {
    $cpt_election2020_labels = array(
        'name'               => _x( 'Election 2020', 'post type general name' ),
        'singular_name'      => _x( 'Election 2020', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Election Post' ),
        'add_new_item'       => __( 'Add New' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a Election Post' ),
        'not_found'          => __( 'No posts found' ),
        'not_found_in_trash' => __( 'No posts found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Election 2020'
    );
    $cpt_election2020_args = array(
        'labels'        => $cpt_election2020_labels,
        'description'   => 'All Posts',
        'public'        => true,
        'menu_icon'	=> false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields', 'post-formats')
    );
    register_post_type( 'election2020', $cpt_election2020_args );
}
add_action( 'init', 'election2020_CPT' );

if ( function_exists( 'acf_add_options_sub_page' ) ){
	acf_add_options_sub_page(array(
		'title'      => 'Election Homepage',
		'parent'     => 'edit.php?post_type=election2020',
		'capability' => 'manage_options'
	));
}


function cn_search_query( $query ) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_search() ) {
			$query->set( 'orderby', 'date' );
		}
	}
}
add_action( 'pre_get_posts', 'cn_search_query' );

function add_file_types_to_uploads($file_types) {
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_action( 'init', 'custom_init_storytags' );
function custom_init_storytags() {
	remove_post_type_support( 'storytags', 'comments' );
}

/* URL rewrite rule for CN staff people page */
add_filter('query_vars', 'add_staff_name_var', 0, 1);
function add_staff_name_var($vars){
    $vars[] = 'staffname';
    return $vars;
}

add_rewrite_rule('^people/([^/]+)/?$','index.php?pagename=people&staffname=$matches[1]','top');

?>
