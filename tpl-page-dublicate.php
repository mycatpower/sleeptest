<?php
/**
 * Template Name: Template page "Template dublicate Pages"
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
        <section class="dublicate_p_header" style="background-image: url(<?php echo  $background_url ?>);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb_nav">
                            <?php
                                if (function_exists('bcn_display')) {
                                    bcn_display();
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="dublicate_p_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12 dublicate_p_content">
                        <h2><?php the_title(); ?></h2>
                        <div class="single_post_text">
                            <?php echo apply_filters('the_content', get_post()->post_content); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-sec">    
            <?php echo do_shortcode( '[products limit="1"]' );?> 
        </section>
        <?php require get_template_directory() . '/latest_articles.php'; ?>
        <?php echo do_shortcode('[contact_form]'); ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
