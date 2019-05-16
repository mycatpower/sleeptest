<?php
/**
 * Template Name: Template page "Thank page"
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sleeptest
 */
 get_header();
?>
<?php 
	 $background = get_field('checkout_backround','option');
?>
<section class="sleeptest_thankyou" style="background-image: url(<?php echo $background['url']; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="woocommerce-order">
                        <h2>Thank you!</h2>
                        <p>Your test with be dispatched to you shortly!</p>
                        <div class="sleeptest_btn">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Main Page', 'woocommerce' ); ?></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
