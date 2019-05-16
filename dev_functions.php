<?php
/**
 * dev_lyuda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sleeptest
 */


 /**
 * Enqueue scripts and styles.
 */
function sleeptest_scripts_new() {

     wp_enqueue_script( 'jquery-ui');
     wp_enqueue_script( 'jquery-ui-accordion');

    wp_enqueue_script( 'carusel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_style( 'carusel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
    wp_enqueue_script( 'sleeptest-appjs', get_template_directory_uri() . '/assets/dist/js/app.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'sleeptest_scripts_new' );

 /**
 * Custom Shortcode Create
 */
function shortcode_contact_form_home(){
    require get_template_directory() . '/contact_form_home.php';
}
add_shortcode('contact_form_home', 'shortcode_contact_form_home');

function shortcode_contact_form(){
    require get_template_directory() . '/contact_form.php';
}
add_shortcode('contact_form', 'shortcode_contact_form');


// widget FOOTER
function true_register_wp_sidebars() {
   
    register_sidebar(
            array(
                'id' => 'footer_service', 
                'name' => 'Footer Widget 1', 
                'description' => 'Add widgets here.',
                'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
    );
    register_sidebar(
        array(
            'id' => 'footer_abaut', 
            'name' => 'Footer Widget 2', 
            'description' => 'Add widgets here.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">', 
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'id' => 'footer_blog', 
            'name' => 'Footer Widget 3', 
            'description' => 'Add widgets here.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">', 
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'id' => 'footer_blog', 
            'name' => 'Footer Widget 3', 
            'description' => 'Add widgets here.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">', 
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'id' => 'footer_contact_us', 
            'name' => 'Footer Widget 4', 
            'description' => 'Add widgets here.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">', 
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'true_register_wp_sidebars');

/**
 * Declare WooCommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/**
 * Remove uncategorized from the WooCommerce breadcrumb.
 * 
 * @param  Array $crumbs    Breadcrumb crumbs for WooCommerce breadcrumb.
 * @return Array   WooCommerce Breadcrumb crumbs with default category removed.
 */
function sleeptest_wc_remove_uncategorized_from_breadcrumb( $crumbs ) {
	$category 	= get_option( 'default_product_cat' );
	$caregory_link 	= get_category_link( $category );
	foreach ( $crumbs as $key => $crumb ) {
		if ( in_array( $caregory_link, $crumb ) ) {
			unset( $crumbs[ $key ] );
		}
	}
	return array_values( $crumbs );
}
add_filter( 'woocommerce_get_breadcrumb', 'sleeptest_wc_remove_uncategorized_from_breadcrumb' );
/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'sleeptest_wcc_change_breadcrumb_home_text' );
function sleeptest_wcc_change_breadcrumb_home_text( $defaults ) {
	$defaults['home'] = 'Main Page';
	return $defaults;
}
/**
 * Сhange the output order woocommerce_single_product_summary
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
        unset( $tabs['reviews'] ); 
    return $tabs;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Product Description' );		// Rename the description tab
	//$tabs['additional_information']['title'] = __( 'Product Data' );	// Rename the additional information tab

	return $tabs;

}

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'How does the service work?', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'product_new_tab_content'
	);

	return $tabs;
}
function product_new_tab_content() {
	// The new tab content
    $prod_id = get_the_ID();
    
    echo '<div>'.get_field( 'product_descr', get_the_ID()).'</div>';
}

/**
 * Reorder product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['description']['priority'] = 15;			// Description second
	$tabs['additional_information']['priority'] = 10;	// Additional information third

	return $tabs;
}
// product gallery
function wc_get_gallery_image_template( $attachment_id, $main_image = false ) {
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$image             = wp_get_attachment_image(
		$attachment_id,
		false,
		apply_filters(
			'woocommerce_gallery_image_html_attachment_image_params',
			array(
				'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
			),
			$attachment_id,
			$main_image
		)
	);
	return $image;
}

// plagin breadcrumb
add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
	if ($type[0] === 'home') {
		$title = 'Main page';
	}
	return $title;
}, 42, 3);

// add theme options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'sleep_theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_filter('next_posts_link_attributes', 'sleeptest_posts_link_next_attributes');
function sleeptest_posts_link_next_attributes() {
    return 'class="link_next"';
}

add_filter('previous_posts_link_attributes', 'sleeptest_posts_link_prev_attributes');
function sleeptest_posts_link_prev_attributes() {
    return 'class="link_prev"';
}


// Creare custom widget
class post_blog_WP_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'widget_post_blog', 'description' => __( "Sleeptest custom widget") );
        parent::__construct('widget_post_blog', __('Blog Widget'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');
        if ( !is_array($cache) )
            $cache = array();
        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }
        ob_start();
        extract($args);
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if (!$number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
    ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) echo wp_trim_words(get_the_title(),3,'...'); else the_ID(); ?></a>
                    <?php if ( $show_date ) : ?>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
    <?php
        wp_reset_postdata();
        endif;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');
        return $instance;
    }
    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
    }
}

function post_blog_register_example_widget() { 
    register_widget( 'post_blog_WP_Widget' );
  }
  add_action( 'widgets_init', 'post_blog_register_example_widget' );
  
 add_action( 'wp_footer', 'redirect_cf7' );
 
function redirect_cf7() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = 'http://sleeptest.loc/thank-page/';
}, false );
</script>
<?php
}