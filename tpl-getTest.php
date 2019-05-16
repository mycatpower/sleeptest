<?php
/**
 * Template Name: Template page "Why Get Test"
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
                <div class="col-12"> <h1><?php the_title(); ?></h1></div>
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
        <section class="get_test_content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text_top">
                        <?php echo get_field('way_get_content_block_top');?>
                    </div>
                    <!-- post-blog -->
                    <div class="col-12">
                        <div class="row get_info_post">
                            <?php
                                $args = [
                                    'category_name' => 'snoring',
                                    'posts_per_page' => 3,
                                    'orderby' => 'date'
                                ];
                                $query = new WP_Query($args);
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();                       
                            ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="get_info_box">
                                        <?php echo get_the_post_thumbnail(); ?>
                                        <h3 class="latest_title"><?php the_title(); ?></h3>
                                        <a href="<?php echo get_permalink(); ?>">More info</a>
                                    </div>
                                </div>
                        
                            <?php 
                                    endwhile;
                                endif;
                                unset($args);
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text_bottom">
                            <?php echo get_field('way_get_content_block_bottom');?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo do_shortcode('[contact_form]'); ?>
    </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();
