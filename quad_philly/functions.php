<?php
/**
 * quad_philly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package quad_philly
 */

if ( ! function_exists( 'quad_philly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function quad_philly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on quad_philly, use a find and replace
		 * to change 'quad_philly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'quad_philly', get_template_directory() . '/languages' );

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
			'main-navigation-left' => esc_html__( 'main-navigation-left', 'quad_philly' ),
			'main-navigation-right' => esc_html__( 'main-navigation-right', 'quad_philly' ),
			'features-menu' => esc_html__( 'Features Menu', 'quad_philly' ),
			'application-menu' => esc_html__( 'Application Menu', 'quad_philly' ),
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
	}
endif;
add_action( 'after_setup_theme', 'quad_philly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function quad_philly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'quad_philly_content_width', 640 );
}
add_action( 'after_setup_theme', 'quad_philly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quad_philly_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'quad_philly' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'quad_philly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'quad_philly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function quad_philly_scripts() {
	wp_enqueue_style( 'lightslider', get_template_directory_uri() .'/assets/vendor/lightslider-master/dist/css/lightslider.min.css' );
	wp_enqueue_style( 'app', get_template_directory_uri() .'/assets/css/app.css' );

	wp_enqueue_script( 'uikit', get_template_directory_uri() .'/assets/vendor/uikit/js/uikit.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-switcher', get_template_directory_uri() .'/assets/vendor/uikit/js/core/switcher.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-dropdown', get_template_directory_uri() .'/assets/vendor/uikit/js/core/dropdown.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-toggle', get_template_directory_uri() .'/assets/vendor/uikit/js/core/toggle.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-accordion', get_template_directory_uri() .'/assets/vendor/uikit/js/components/accordion.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-slideset', get_template_directory_uri() .'/assets/vendor/uikit/js/components/slideset.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-switcher', get_template_directory_uri() .'/assets/vendor/uikit/js/core/switcher.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-grid', get_template_directory_uri() .'/assets/vendor/uikit/js/components/grid.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-sticky', get_template_directory_uri() .'/assets/vendor/uikit/js/components/sticky.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'uikit-lightbox', get_template_directory_uri() .'/assets/vendor/uikit/js/components/lightbox.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'lightslider', get_template_directory_uri() .'/assets/vendor/lightslider-master/dist/js/lightslider.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'app', get_template_directory_uri() .'/assets/js/app.js', array('jquery'), '', true );
	wp_enqueue_script( 'maps', get_template_directory_uri() .'/assets/js/map.js', array('jquery'), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() .'/assets/js/custom.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'quad_philly_scripts' );

/**
 * Load jQuery datepicker.
 *
 * By using the correct hook you don't need to check `is_admin()` first.
 * If jQuery hasn't already been loaded it will be when we request the
 * datepicker script.
 */
function wpse_enqueue_datepicker() {

    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAzlV2H6dGbxL10HnU5hYZDdONqJSeSvfE');
}
add_action('acf/init', 'my_acf_init');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
