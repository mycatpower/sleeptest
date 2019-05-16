<?php
/**
 * Template Name: Template page "Blog"
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
        <section class="blog_wrap" >
            <div class="container">
            <div class="row">
                    <?php
                        global $paged;
                        // var_dump(get_query_var('paged')).die();
                        if (get_query_var('paged')) {
                            $paged = get_query_var('paged');
                        } elseif (get_query_var('page')) {
                            $paged = get_query_var('page');
                        } else {
                            $paged = 1;
                        }
                        $args = [
                            'posts_per_page' => 8,
                            'orderby' => 'date',
                            'paged' => $paged
                        ];
                        $query = new WP_Query($args);
                        $count = 1;
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $post_cat = get_the_category();
                                if($count == 1):       
                    ?>
                                    <div class="col-lg-8 col-md-6 blog_item ">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <div class="blog_img">
                                                <?php echo get_the_post_thumbnail(); ?>
                                                <?php if(!empty($post_cat) and $post_cat[0]->name =='lifestory' ): ?>  
                                                    <span class="latest_label"><?php echo $post_cat[0]->name;?></span>
                                                <?php endif; ?> 
                                            </div>
                                            <div class="blog_content">
                                                <h3 class="blog_title"><?php the_title(); ?></h3>
                                                <div class="blog_text"> 
                                                    <?php 
                                                    echo wp_trim_words( get_the_content(), 31, '...' );
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="blog_info">
                                                <span>More info</span>    
                                            </div>
                                        </a>
                                    </div>
                                <?php elseif($count ==5) : ?>
                                    <div class="col-lg-4 col-md-6 blog_item blog_item_product ">
                                    <?php 
                                    $link_product = get_field('link_product_promo','option');
                                    // var_dump( $link_product[0]->guid).die();
                                    if( isset($link_product[0]) ) : ?>
                                            <a href="<?php echo get_the_permalink($link_product[0]->ID); ?>">
                                    <?php endif; ?>
                                            <img src="<?php echo get_field('image_product_promo','option')['url'];?>" alt="<?php echo get_field('image_product_promo','option')['alt'];?>">
                                            <div class="blog_product_content">
                                                <p><?php echo get_field('label_product_promo','option');?></p>
                                                <h3><?php echo get_field('name_product_promo','option');?></h3>
                                            </div>
                                            <span class="more_info">More Info</span>
                                        </a>
                                    </div>
                                    <?php else:?>
                                    <div class="col-lg-4 col-md-6 blog_item ">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <div class="blog_img">
                                                <?php echo get_the_post_thumbnail(); ?>
                                                <?php if(!empty($post_cat) and $post_cat[0]->name =='lifestory' ): ?> 
                                                    <span class="latest_label"><?php echo $post_cat[0]->name;?></span>
                                                <?php endif; ?> 
                                            </div>
                                            <div class="blog_content">
                                                <h3 class="blog_title"><?php the_title(); ?></h3>
                                                <div class="blog_text"> 
                                                    <?php 
                                                    echo wp_trim_words( get_the_content(), 31, '...' );
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="blog_info">
                                                <span>More info</span>    
                                            </div>
                                        </a>
                                    </div>
                                    <?php endif; $count++;  ?>
                                <?php endwhile; ?>
                        <?php else : ?>
                        <p><?php __('No News'); ?></p>
                        
                        <?php endif; ?>
                        <div class="pagination col-12">
                            <nav class="navigation" role="navigation">
                                    <?php
                                        if ($paged >= 1) :
                                            global $query;
                                            $pages = '';
                                            $pages_for_pg = $query->max_num_pages;
                                            if (isset($pages_for_pg)) :
                                                $count_pg = 1;
                                                echo get_previous_posts_link(__('Preview Page'));
                                                while ($count_pg <= $pages_for_pg) :
                                                    if (!($count_pg == $paged)) {
                                                        echo '<a class="page_numbers" href="' . get_home_url() . '/blog/page/' . $count_pg . '">' . $count_pg . '</a>';
                                                    } else {
                                                        echo '<span aria-current="page" class="page_numbers current">' . $count_pg . '</span>';
                                                    };
                                                    $count_pg++;
                                                endwhile;
                                                    echo get_next_posts_link(__('Next page'), $query->max_num_pages);
                                            endif;
                                        endif;
                                    ?>
                            </nav>
                        </div> 
                        <?php
                                unset($args);
                                wp_reset_postdata(); 
                        ?>
                    </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();