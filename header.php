<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sleeptest
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!is_user_logged_in()) { ?>
	<?php get_template_part('ajax', 'auth'); 
}?>     
<header class="header">
	<nav id='cssmenu'>
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">			
				<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/03/logo.png" alt="Logo" width="245px" height="93px" class="sleep-logo-img"/>
			</a>
		</div>
		<div id="head-mobile"></div>
		
			<a class="a-cart"  href="<?php echo wc_get_cart_url(); ?>">
		<div class="widget_shopping_cart_content mini-cart-items"></div>
			<div class="cart-contents" >
				<span class="header-cart-count">0</span>
				<!-- <div id="mini-cart-count"></div> -->
				</div><span class="sp-for-cart">Cart</span> 			
		</a>
		<div class="button-sleep"></div>
		<?php   wp_nav_menu(array( 'container' => false ,'menu' => 'Header menu')); ?>
	</nav>
	<div class="second-header">
		<div class="header-phone">
			08000 024 8050
		</div>
		<div class="header-login">
		<?php if (is_user_logged_in()) { ?>
	<?php 
		global $current_user;
		$current_user=wp_get_current_user();  
		// echo 'Username: ' . $current_user->user_login . "\n"; ?>
		Hi, <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>" class="header-acc"><?php echo $current_user->user_login; ?></a>
		<!-- <a href=""></a> -->
		 <a href="<?php echo wp_logout_url( home_url() ); ?>" class="logout-header">Logout</a>
		<?php } else {  ?>             
				<a  id="show_login" href="">Log In</a>
				<!-- <a  id="show_signup" href="">Signup</a> -->
		<?php } ?>
			
		</div>
	</div>
	
</header>

	
