<?php
/**
 * Template Name: Template page "Obstrucrive Sleep Apnoea"
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        <section class="page_template" style="background-image: url('<?php echo  $background_url ?>');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 breadcrumb_wrap">
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
        <section class="obs_sl_content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text_block">
                        <h2><?php the_title(); ?></h2>
                        <?php echo apply_filters('the_content', get_post()->post_content); ?>
                    </div>
                    <!-- Accordion -->
                    <div class="col-12">
                        <div class="row accordion_box">
                            <div class="col-12">
                                <div class="obs_accordion" id="accordion">
                                <?php 
                                    if( have_rows('accordion_information') ): 
                                        while( have_rows('accordion_information') ): the_row(); 
                                            $accordion_header = get_sub_field('accordion_header');
                                            
                                ?>
                                        <div class="obs_header"><h2><?php echo $accordion_header; ?></h2></div>
                                        <div class="obs_accordion_content">
                                        <?php 
                                            if( have_rows('accordion_content_item') ): 
                                                while( have_rows('accordion_content_item') ): the_row(); 
                                                    $accordion_content = get_sub_field('accordion_content');
                                        ?>
                                                    <?php echo $accordion_content; ?>
                                        <?php   
                                                endwhile;
                                            endif;
                                        ?>
                                        </div>
                                <?php 
                                        endwhile;
                                    endif;
                                ?>
                                </div>
                            </div>
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
