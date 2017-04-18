<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xyz
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="site-header">
			<section class="hero-area image-as-background" style="background-image: url(/wp-content/uploads/2017/04/hero-biz.jpg );" role="dialog" aria-labelledby="hero-title" aria-describedby="hero-description">
				<div class="hero-content">
					<h1 class="site-title hero-title site-branding"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="hero-description">We bring you the finest in XYZ techonology</p>
					<a href="#" class="hero-button" title="Click to see more">Click Me</a>
				</div><!-- .hero-content -->
			</section><!-- .hero-area -->
				<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu dropdown',
					) );
				?>
			</nav><!-- #site-navigation -->
	</header><!-- .site-header -->
	<div id="content" class="site-content">
