<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
<section class="sleeptest_lost_info">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php wc_print_notice( __( 'Password reset email has been sent.', 'woocommerce' ) ); ?>
				<p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', __( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'woocommerce' ) ) ); ?></p>
			</div>
		</div>
	</div>
</section>

