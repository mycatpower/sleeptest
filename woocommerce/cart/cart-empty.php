<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>
<?php 
    $post_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    $background_url = $post_img[0];
?>
<section class="page_template" style="background-image: url('<?php echo  $background_url ?>');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
            <div class="col-12 breadcrumb_wrap">
                <ul class="breadcrumb_nav">
                    <?php if (function_exists('bcn_display')) { bcn_display(); } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="sleeptest_cart_empty">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php
				/*
				* @hooked wc_empty_cart_message - 10
				*/
				do_action( 'woocommerce_cart_is_empty' );

				if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
					<p class="return-to-shop">
						<?php 
                            $link_product = get_field('link_product_promo','option');
                             if( isset($link_product[0]) ) : ?>
								<a class="wc-backward" href="<?php echo get_the_permalink($link_product[0]->ID); ?>">

									<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
								</a>
                        <?php endif; ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php echo do_shortcode('[contact_form]'); ?>