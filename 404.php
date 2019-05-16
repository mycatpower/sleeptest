<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package sleeptest
 */
get_header();
?>
<?php 
	 $background = get_field('checkout_backround','option');
?>
<section class="sleeptest_notfound" style="background-image: url(<?php echo $background['url']; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>404</h1>
				<p>Page Not Found</p>
                <a class="btn_more_articles" href="<?php echo esc_url( home_url( '/' ) ); ?>">But try again ....</a>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();