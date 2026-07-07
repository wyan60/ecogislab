<?php
/**
 * Worldwide functions and definitions
 *
 * @package Worldwide
 */

if ( ! function_exists( 'worldwide_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function worldwide_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 670; /* pixels */

	load_theme_textdomain( 'worldwide', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'worldwide' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif; // worldwide_setup
add_action( 'after_setup_theme', 'worldwide_setup' );
function worldwide_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'worldwide' ),
		'description'   => __( 'Appears on blog page sidebar', 'worldwide' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'worldwide' ),
		'description'   => __( 'Appears on footer', 'worldwide' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="threebox footer-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'worldwide' ),
		'description'   => __( 'Appears on footer', 'worldwide' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="threebox footer-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'worldwide' ),
		'description'   => __( 'Appears on footer', 'worldwide' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="threebox footer-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'worldwide_widgets_init' );
function worldwide_font_url(){
	$font_url = '';
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','robotocondensed:on or off','worldwide');
		if('off' !== $robotocondensed ){
			$font_family = array();
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
	return $font_url;
}

function worldwide_scripts() {
	wp_enqueue_style('worldwide-font', worldwide_font_url(), array());
	wp_enqueue_style( 'worldwide-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'worldwide-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_style( 'worldwide-basic', get_template_directory_uri()."/css/basic.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'worldwide_scripts' );

function worldwide_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('worldwide-ie', get_template_directory_uri().'/css/ie.css', array( 'worldwide-style' ), '20161511' );
	wp_style_add_data('worldwide-ie','conditional','lt IE 10');

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'worldwide-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'worldwide-style' ), '20161511' );
	wp_style_add_data( 'worldwide-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'worldwide-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'worldwide-style' ), '20161511' );
	wp_style_add_data( 'worldwide-ie7', 'conditional', 'lt IE 8' );
	}
add_action('wp_enqueue_scripts','worldwide_ie_stylesheet');

/**
 * Webfont-Loader.
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

 if ( ! function_exists( 'worldwide_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since  worldwide 1.0
 */
function worldwide_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
