<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sleeptest
 */

?>
<footer class="footer">
	<div class="container">
		<div class="row footer_wrap">
			<div class="footer-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">			
					<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/03/logo.png" alt="Logo" width="245px" height="93px" class="sleep-logo-footer-img"/>
				</a>
			</div>
			<div class="col-md-3 col-6">
				<?php if ( is_active_sidebar( 'footer_service' ) ) : ?>
                    <div id="footer_service" class="footer_item">
                        <?php dynamic_sidebar( 'footer_service' ); ?>
                    </div>
                 <?php endif; ?>
			</div>
			<div class="col-md-3 col-6">
				<?php if ( is_active_sidebar( 'footer_abaut' ) ) : ?>
                    <div id="footer_abaut" class="footer_item">
                        <?php dynamic_sidebar( 'footer_abaut' ); ?>
                    </div>
                 <?php endif; ?>
			</div>
			<div class="col-md-3 col-6">
				<?php if ( is_active_sidebar( 'footer_blog' ) ) : ?>
                    <div id="footer_blog" class="footer_item footer_blog">
                        <?php dynamic_sidebar( 'footer_blog' ); ?>
                    </div>
                 <?php endif; ?>
			</div>
			<div class="col-md-3 col-6">
				<div id="footer_social_networks" class="social-networks footer_item">
                    <div id="custom_html-2" class="widget_text foot widget widget_custom_html">
						<h3 class="widget-title">Contact Us</h3>
						<div class="textwidget custom-html-widget">
							<ul>
								<li><a href="<?php echo get_field('facebook','option');?>"><i class="fab fa-facebook"></i></a></li>
								<li><a href="<?php echo get_field('twitter','option');?>"><i class="fab fa-twitter"></i></a></li>
								<li><a href="<?php echo get_field('instagram','option');?>"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>                    
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid copyright">
		<div class="col-12 ">
			<p>&copy; 2019 All Rights Reserved.</p>
		</div>
	</div>
</footer>
	<?php wp_footer(); ?>
</body>
</html>
