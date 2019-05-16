<?php
/**
 * Template Name: Template page "About US"
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
        <section class="page_template" style="background-image: url('<?php echo  $background_url ?>');">
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
        <section class="about_content">
            <div class="container">
                <div class="row">
                    <div class="col-12 about_text_top">
                        <?php echo get_field('about_content_block_top');?>
                    </div>
                    <div class="col-12">
                        <div class="row about_specifications ">
                        <?php if( have_rows('about_specifications') ): 
                                 while( have_rows('about_specifications') ): the_row(); 
                                 
                                    $icon = get_sub_field('about_sp_icon');
                                    $label = get_sub_field('about_sp_name');
                                    $decs = get_sub_field('abaut_sp_description');
                        ?>
                            <div class="col-md-6">
                                <div class="about_sp_icon">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
                                </div>
                                <div class="about_sp_content">
                                    <h3><?php echo $label; ?></h3>
                                    <p> <?php echo $decs; ?></p>
                                </div>
                            </div>
                        <?php   
                                endwhile;
                            endif;
                        ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="about_text_bottom">
                            <?php echo get_field('about_content_block_bottom');?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require get_template_directory() . '/latest_articles.php'; ?>
        <?php echo do_shortcode('[contact_form]'); ?>
    </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();
