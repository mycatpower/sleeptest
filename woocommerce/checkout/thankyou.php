<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php 
	 $background = get_field('checkout_backround','option');
?>
<section class="sleeptest_thankyou" style="background-image: url(<?php echo $background['url']; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="woocommerce-order">
                <?php if ( $order ) : ?>
                    <?php if ( $order->has_status( 'failed' ) ) : ?>
                        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>
                    <?php else : ?>
                        <h2>Thank you!</h2>
                        <p>Our Manager will Contact You!</p>
                        <div class="sleeptest_btn">
                            <?php if (is_user_logged_in()) {?>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e( 'Main Page', 'woocommerce' ); ?></a>
                            <?php } else {?>
                                <a href="" id="show_login"><?php _e( 'Main Page', 'woocommerce' ); ?></a>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
