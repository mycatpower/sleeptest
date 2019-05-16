<?php
/**
 * sleeptest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sleeptest
 */

if ( ! function_exists( 'sleeptest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sleeptest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sleeptest, use a find and replace
		 * to change 'sleeptest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sleeptest', get_template_directory() . '/languages' );

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
		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'sleeptest' ),
		// ) );

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
		add_theme_support( 'custom-background', apply_filters( 'sleeptest_custom_background_args', array(
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
add_action( 'after_setup_theme', 'sleeptest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sleeptest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sleeptest_content_width', 640 );
}
add_action( 'after_setup_theme', 'sleeptest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sleeptest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sleeptest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sleeptest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sleeptest_widgets_init' );





/**
 * Enqueue scripts and styles.
 */
function sleeptest_scripts() {
	wp_enqueue_style( 'sleeptest-style', get_stylesheet_uri() );
	
	wp_register_style( 'app-styles', get_template_directory_uri().'/assets/dist/css/app.css',array(), '1.1');
	wp_enqueue_style( 'app-styles');
	
	// wp_enqueue_style('sleeptest-app', get_template_directory_uri() . '/assets/dist/css/app.css');
	// wp_enqueue_script( 'sleeptest-navigation', get_template_directory_uri() . '/assets/dist/js/app.js');
	
	//wp_enqueue_script( 'sleeptest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'sleeptest_scripts' );

function smallenvelop_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Sidebar', 'smallenvelop' ),
        'id' => 'header-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'smallenvelop_widgets_init' );



add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments' );

function iconic_cart_count_fragments( $fragments ) {

	
	// $cartitem = WC()->cart->get_cart_contents_count();
	// if($cartitem){
	// 	$fragments['span.header-cart-count'] = '<span class="header-cart-count">' . $cartitem . '</span>';
		
	// }
	// // else {
	// // 	$fragments['span.header-cart-count'] = '<span class="header-cart-count">' . $cartitem . '</span>';
	// // }   
    
	// return $fragments;
	ob_start();
    ?>
	<span class="header-cart-count"><?php
		$count=  WC()->cart->get_cart_contents_count();
		echo $count; 
	?></span>
    <?php
		$fragments['.header-cart-count'] = ob_get_clean();
		// file_put_contents(__DIR__.'/data.log', print_r($fragments, true));
    return $fragments;
    
}

// add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

// function iconic_cart_count_fragments( $fragments ) {
// 	$cartitem = WC()->cart->get_cart_contents_count();
// 	if($cartitem>=2){
// 		$fragments['span.header-cart-count'] = '<span class="header-cart-count as">' . $cartitem . '</span>';
// 	}
// 	else {
// 		$fragments['span.header-cart-count'] = '<span class="header-cart-count">' . $cartitem . '</span>';
// 	}
    
    
//     return $fragments;
    
// }

/**
 * Developer functions.
 */
add_action( 'woocommerce_widget_shopping_cart_buttons', function(){
    // Removing Buttons
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

    // Adding customized Buttons
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_button_view_cart', 10 );
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_proceed_to_checkout', 20 );
}, 1 );

// Custom cart button
function custom_widget_shopping_cart_button_view_cart() {
    $original_link = wc_get_cart_url();
    $custom_link = home_url( '/cart/?id=1' ); // HERE replacing cart link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button wc-forward mini-view-cart-btn">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}

// Custom Checkout button
function custom_widget_shopping_cart_proceed_to_checkout() {
    $original_link = wc_get_checkout_url();
    $custom_link = home_url( '/checkout/?id=1' ); // HERE replacing checkout link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button checkout wc-forward mini-checkout-btn">' . esc_html__( 'Proceed to Checkout', 'woocommerce' ) . '</a>';
}





function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );

  
require get_template_directory() . '/custom-ajax-auth.php';

require get_template_directory() . '/dev_functions.php';




