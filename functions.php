<?php
/**
 * Functions
 */

/******************************************************************************
                        Global Functions
******************************************************************************/

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
	$thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
	return $thedate;
}
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

// Register Navigation Menu
    register_nav_menus( array(
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu'
    ) );

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

        $pagination = str_replace('page-numbers','pagination',$links);
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
	        $content = implode(" ",$content).'...<a href="'. get_permalink($post->ID) . '" class="read_more">Read More</a>';
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

// Load JavaScripts
    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/plugins/bootstrap.min.js', null, null, true );
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true );
    wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/plugins/respond.js', null, null, true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, null, true );
    wp_enqueue_script( 'image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, null, true );

    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow.min.js', null, null, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true );
    wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true );
    wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, null, true );


      //Custom Scripts
    wp_enqueue_script( 'viewport', get_template_directory_uri() . '/js/plugins/viewport-units-buggyfill.js', null, null, true );
//    wp_enqueue_script( 'google', get_template_directory_uri() . '/js/plugins/_google.maps.api.v3.js', null, null, true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/plugins/jquery.easing.1.3.min.js', null, null, true );
    wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/plugins/skrollr.min.js', null, null, true );
    wp_enqueue_script( 'scroll_style', get_template_directory_uri() . '/js/plugins/skrollr.stylesheets.min.js', null, null, true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/plugins/waypoints.min.js', null, null, true );
    wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/js/plugins/waypoints-sticky.min.js', null, null, true );


    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/plugins/jquery.isotope.min.js', null, null, true );
     wp_enqueue_script( 'remodal', get_template_directory_uri() . '/js/plugins/jquery.remodal.js', null, null, true );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/plugins/bootstrap-hover-dropdown.min.js', null, null, true );


// Load Stylesheets
    //core
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.min.css', null, null );
    wp_enqueue_style( 'slick', get_template_directory_uri().'/css/plugins/slick.css', null, null );
    wp_enqueue_style( 'bootstrap-customizer', get_template_directory_uri().'/css/core/customizer.css', null, null );
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/core/normalize.css', null, null );
    //plugins
    wp_enqueue_style( 'font-awesome.min', get_template_directory_uri().'/css/plugins/font-awesome.min.css', null, null );
    wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.css', null, null );
    wp_enqueue_style( 'hover', get_template_directory_uri().'/css/plugins/hover.css', null, null );
    wp_enqueue_style( 'owl', get_template_directory_uri().'/css/plugins/owl.carousel.css', null, null );
    wp_enqueue_style( 'owl-trans', get_template_directory_uri().'/css/plugins/owl.transitions.css', null, null );
    wp_enqueue_style( 'remodal', get_template_directory_uri().'/css/plugins/jquery.remodal.css', null, null );


    //Custom Styles
    wp_enqueue_style( 'fontello', get_template_directory_uri().'/css/plugins/fontello.css', null, null );

    //system
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*2nd priority*/


  }
  add_action( 'wp_enqueue_scripts', 'bootstrap_scripts_and_styles' );

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

/*********************** PUT YOU FUNCTIONS BELOW ********************************/

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


add_image_size('awards_logo', 540, 304 );
add_image_size('slider', 208, 180);

function new_excerpt_more( $more ) {
    return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');




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

/* Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats */

/*
 * Add custom stylesheet to the website front-end with hook 'wp_enqueue_scripts'
 */
add_action('wp_enqueue_scripts', 'tuts_mcekit_editor_enqueue');


    
/*******************************************************************************/
    
    
?>