<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
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

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
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
<section class="sleeptest_myaccount">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<?php do_action( 'woocommerce_account_navigation' ); ?>
			</div>
			<div class="col-lg-9">
				<div class="sleeptest_MyAccount_content">
					<?php
						/**
						 * My Account content.
						 *
						 * @since 2.6.0
						 */
						do_action( 'woocommerce_account_content' );
					?>
				</div>
			</div>
		</div>
	</div>
</section>


