<?php
/**
 * Happy Cafe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Happy_Cafe
 */

if ( ! function_exists( 'happy_cafe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function happy_cafe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Happy Cafe, use a find and replace
		 * to change 'happy-cafe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'happy-cafe', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'happy-cafe' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'happy_cafe_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'happy_cafe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function happy_cafe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'happy_cafe_content_width', 640 );
}
add_action( 'after_setup_theme', 'happy_cafe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function happy_cafe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'happy-cafe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'happy-cafe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Col 1', 'happy-cafe' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'happy-cafe' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Col 2', 'happy-cafe' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'happy-cafe' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Col 3', 'happy-cafe' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'happy-cafe' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Col 4', 'happy-cafe' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'happy-cafe' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'happy_cafe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function happy_cafe_scripts() {

    /*--------------------------------------------------------------
    # Bootstrap 4 framework integration
    --------------------------------------------------------------*/

    wp_enqueue_script('tether.min.js', get_template_directory_uri() . '/vendor/scripts/tether.min.js', array(), '20151215', true);

    wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/vendor/scripts/bootstrap.min.js', array('jquery'), '20151215', true);

    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/vendor/styles/bootstrap.min.css', array(), '20151215');

    wp_enqueue_style('bootstrap-grid.min.css', get_template_directory_uri() . '/vendor/styles/bootstrap-grid.min.css', array(), '20151215');

    wp_enqueue_style('bootstrap-reboot.min.css', get_template_directory_uri() . '/vendor/styles/bootstrap-reboot.min.css', array(), '20151215');

    /*--------------------------------------------------------------
    # Slick Slider integration
    --------------------------------------------------------------*/

    wp_enqueue_script('slick.min.js', get_template_directory_uri() . '/vendor/scripts/slick.min.js', array(), '20151215', true);

    wp_enqueue_style('slick.css', get_template_directory_uri() . '/vendor/styles/slick.css', array(), '20151215');

    /*--------------------------------------------------------------
    # Font Awesome integration
    --------------------------------------------------------------*/

    wp_enqueue_style('font-awesome.min.css', get_template_directory_uri() . '/vendor/styles/font-awesome.min.css', array(), '20151215');

    /*--------------------------------------------------------------
    # Google Fonts integration
    --------------------------------------------------------------*/


    wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans:400,700&subset=latin,latin-ext');

    /*--------------------------------------------------------------
   # Fancybox lightbox integration
   --------------------------------------------------------------*/

    wp_enqueue_script('jquery.fancybox.min.js', get_template_directory_uri() . '/vendor/scripts/jquery.fancybox.min.js', array(), '20151215', true);

    wp_enqueue_style('jquery.fancybox.min.css', get_template_directory_uri() . '/vendor/styles/jquery.fancybox.min.css', array(), '20151215');

    /*--------------------------------------------------------------
   # Custom JS integration
   --------------------------------------------------------------*/

    wp_enqueue_script('scripts.js', get_template_directory_uri() . '/assets/scripts/scripts.js', array('jquery'), '20151215', true);

	wp_enqueue_script( 'happy-cafe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'happy-cafe-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_style( 'happy-cafe-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'happy_cafe_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


/**
 * Remove emojis
 */
function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

function my_footer_sidebar() {

    register_sidebar(array(
        'name'          => 'Blog Post',  // Widget area title
        'id'            => 'blogpostsidebar',  // system name
        'description'   => 'Vertical Sidebar in the footer', // desc
        'before_widget' => '<div id="%1$s" class="%2$s nst-widget">',  // markup that appears before each widget
        'after_widget'  => '</div>', // 
        'before_title'  => '<h2>', // widget title markup
        'after_title'   => '</h2>'
    ));

}

add_action( 'widgets_init', 'my_footer_sidebar' );

/* Register single menu */
function register_my_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );

function my_shortcode_function() {
   return 'Hello World';
   }

add_shortcode ('hello_world', 'my_shortcode_function');

function basic_info( $atts = '') {
    $value = shortcode_atts( array (
        'name' => '',
        'age' => '',
    ), $atts );

    return 'This is '. $value['name'] . ', he is ' .  $value['age'] . ' years old.';
}

add_shortcode('basic-info', 'basic_info');

function dynamic_placeholder_image( $atts = ''){
    $value = shortcode_atts( array(
        'width' => 300,
        'height' => 250,
    ), $atts );

    return '<img src="https://via.placeholder.com/' . $value['width'] . 'x' . $value['height'] . '" />';
}

add_shortcode( 'placeholder-image', 'dynamic_placeholder_image');

function caption_shortcode( $atts, $content = null){
    return '<span class="caption">' . $content . '</span>';
}

add_shortcode( 'caption', 'caption_shortcode');

function bootstrap_row( $atts, $content = null){
    return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'row', 'bootstrap_row');

function bootstrap_column($atts = '', $content = null){
    
    $value = shortcode_atts( array(
        'cols' => 6,
    ), $atts );
    
    return '<div class="col-md-' . $value['cols'] . '">' . $content . '</div>';
}

add_shortcode('column', 'bootstrap_column');
