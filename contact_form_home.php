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

<!-- general ContactForm -->
<section class="home_contact">
	<div class="container">
		<div class="row contact_us">
				<div class="col-12">
					<div class="box">
						<h2>Contact Us</h2>
					</div>
					<h3><?php echo get_field('label-contact','option');?></h3>
				</div>
				<div class="col-lg-6 col-md-12 col-12 order-lg-2 order-lx-2 order-md-2 order-2 contact_information">
					<div class="telephone items">
						<span>Telephone:</span>
						<p><?php echo get_field('telephone-contact','option');?></p>
					</div>
					<div class="fax items">
						<span>Fax:</span>
						<p><?php echo get_field('fax-contact','option');?>)</p>
					</div>
					<div class="email items">
						<span>E-mail:</span>
						<p><?php echo get_field('e-mail-contact','option');?></p>
					</div>
					<div class="head items">
						<span>Head Office Address:</span>
						<p><?php echo get_field('head_office_address-contact','option');?></p>
					</div>
				</div>
				<?php 
                    $cf = get_field('contact_form_id-contact','option');
                    if( isset($cf[0]) ) : ?>
                        <div class="col-lg-6 col-md-12 col-12 order-lg-2 order-lx-2 order-md-1 order-1 contact_form">
                            <?php echo do_shortcode('[contact-form-7 id="'.$cf[0].'" title="Contact form"]');?>
                        </div>
                <?php endif; ?>		
		</div>
	</div>
</section> <!-- general ContactForm -->
<?php 
	 $background_home = get_field('background-home-page','option');
?>
<section class="baner_footer">
	<img src="<?php echo $background_home['url'];?>" alt="<?php echo $background_home['alt'];?>">
</section>