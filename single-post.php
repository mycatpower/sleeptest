<?php
/**
 * The template for displaying all single posts
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
            $background_url = get_field('post_background');
        ?>
        <section class="single_post_header" style="background-image: url(<?php echo $background_url['url'] ?>);">
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
        <section class="single_post_wrap">
            <div class="container">
                <div class="row">
                    <?php while (have_posts()): 
                        the_post();
                        $post_cat = get_the_category();  
                    ?>
                        <div class="col-12 single_post_contant">
                            <h1><?php the_title(); ?></h1>
                            <div class="single_post_img">
                                <?php echo get_the_post_thumbnail(); ?>
                                <?php if(!empty($post_cat) and $post_cat[0]->name !='Uncategorized' ): ?> 
                                    <span class="latest_label"><?php echo $post_cat[0]->name;?></span>
                                <?php endif; ?> 
                            </div>
                            <div class="single_post_date">
                                <span><?php echo get_the_date('d/m/Y g:i '); ?></span>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <div class="single_post_text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
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
