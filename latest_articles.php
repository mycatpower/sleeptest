<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sleeptest
 */
?>

<section class="latest_articles" >
<div class="container">
    <div class="row">
        <div class="col-12 latest_header">
            <div class="row">
                <div class="col-md-6">
                    <span>Blog</span>
                    <h2>Latest articles</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/blog" class="btn_more_articles">More Articles</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row latest_wrap_art">
        <?php
            $args = [
                'posts_per_page' => 3,
                'orderby' => 'date'
            ];
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    $post_cat = get_the_category();                 
        ?>
                    <div class="col-md-4 latest_item ">
                        <a href="<?php echo get_permalink(); ?>">
                            <div class="latest_img">
                                <?php echo get_the_post_thumbnail(); ?>
                                <?php if(!empty($post_cat) and $post_cat[0]->name =='lifestory' ): ?> 
                                    <span class="latest_label"><?php echo $post_cat[0]->name;?></span>
                                <?php endif; ?> 
                            </div>
                            <div class="latest_content">
                                <h3 class="latest_title"><?php the_title(); ?></h3>
                                <div class="latest_text"> 
                                    <?php 
                                       echo wp_trim_words( get_the_content(), 31, '...' );
                                    ?>
                                </div>
                            </div>
                            <div class="latest_info">
                                <span>More info</span>    
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
            <?php else : ?>
            <p><?php __('No News'); ?></p>
            <?php        
                    endif;
                    unset($args);
                    wp_reset_postdata(); 
            ?>
         </div>
        </div>
    </div>
</div>
</section>