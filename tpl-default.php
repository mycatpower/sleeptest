<?php
/**
 * Template Name: Template page "Default Template"
 * Template Post Type: page
 *
 * @package sleeptest
 */
 get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
        <?php 
            $background = get_field('checkout_backround','option');
        ?>
        <section class="page_template" style="background-image: url('<?php echo $background['url']; ?>');">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12"> <h1><?php the_title(); ?></h1></div>
                    <div class="col-12 breadcrumb_wrap">
                        <ul class="breadcrumb_nav">
                            <?php if (function_exists('bcn_display')) { bcn_display(); } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="default_content">
            <div class="container">
                <div class="row">
                    <div class="col-12 about_text_top">
                    <?php while (have_posts()): 
                        the_post();
                        $post_cat = get_the_category();  
                    ?>
                        <?php the_content(); ?>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </section>
        <?php echo do_shortcode('[contact_form]'); ?>
    </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();
