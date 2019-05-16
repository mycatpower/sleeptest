<?php
/**
 * Template Name: Template page "Contact Us"
 * Template Post Type: page
 *
 * @package sleeptest
 */
 get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
        <?php 
            $post_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $background_url = $post_img[0];
        ?>
        <section class="page_contact_us" style="background-image: url('<?php echo  $background_url ?>');">
            <div class="container-fluid">
                <div class="row contact_us">
                    <div class="col-12">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 order-lg-2 order-lx-2 order-md-2 order-2 contact_information">
                        <div class="telephone items">
                            <span>Telephone:</span>
                            <p><?php echo get_field('telephone-contact','option');?></p>
                        </div>
                        <div class="fax items">
                            <span>Fax:</span>
                            <p><?php echo get_field('fax-contact','option');?>)</p>
                        </div>
                        <div class="email items">
                            <span>E-mail:</span>
                            <p><?php echo get_field('e-mail-contact','option');?></p>
                        </div>
                        <div class="head items">
                            <span>Head Office Address:</span>
                            <p><?php echo get_field('head_office_address-contact','option');?></p>
                        </div>
                    </div>
                    <?php 
                        $posts = get_field('contact_form_id-contact','option');
                        if( $posts ): ?>
                        <?php foreach( $posts as $post): ?>
                            <?php setup_postdata($post); ?>
                                <div class="col-lg-6 col-md-12 col-12 order-lg-2 order-lx-2 order-md-1 order-1 contact_form">
                                    <?php echo do_shortcode('[contact-form-7 id="<?php echo $post; ?>" title="Contact form"]'); ?>
                                </div>	
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
             </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();