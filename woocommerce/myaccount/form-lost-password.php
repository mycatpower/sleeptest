<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
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
<section class="sleeptest_lost_password">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php do_action( 'woocommerce_before_lost_password_form' ); ?>
				<form method="post" class="woocommerce-ResetPassword lost_reset_password">

					<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
					</p>

					<div class="clear"></div>

					<?php do_action( 'woocommerce_lostpassword_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<input type="hidden" name="wc_reset_password" value="true" />
						<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
					</p>

					<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

				</form>
				<?php
				do_action( 'woocommerce_after_lost_password_form' );?>
			</div>
		</div>
	</div>
</section>

