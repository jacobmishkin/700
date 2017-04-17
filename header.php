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
					<h2 class="hero-title">Video Hero Title</h2>
					<p class="hero-description">This is the description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si longus, levis; An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat?</p>
					<a href="#" class="hero-button" title="Click to see more">Click Me</a>
				</div><!-- .hero-content -->
			</section><!-- .hero-area -->
			<div class="site-branding">

				<?php the_custom_logo(); ?>

				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif;

				$description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; // WPCS: xss ok. ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu dropdown',
					) );
				?>
			</nav><!-- #site-navigation -->
			</div><!-- .wrap -->
	</header><!-- .site-header -->
	<div id="content" class="site-content">
