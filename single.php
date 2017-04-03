<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package xyz
 */

get_header(); 
while ( have_posts() ) : the_post(); 
?>
	<div class="wrap">
		<div class="primary content-area">
			<main id="main" class="site-main" role="main">

				<?php
				get_template_part( 'template-parts/content', get_post_format() );
				?>
			</main><!-- #main -->
		</div><!-- .primary -->
	</div><!-- .wrap -->
	<nav class="navigation post-navigation load-previous" role="navigation">
		<div class="btn-wrap">
		<span class="nav-subtitle">Previous post</span>
		<div class="nav-links">
			<div class="nav-previous">
				<?php $previous_post = get_previous_post(); ?>
				<a href="<?php echo get_permalink($previous_post->ID); ?>" data-id="<?php echo $previous_post->ID; ?>">
					<?php echo $previous_post->post_title; ?>
				</a>
				<div class="ajax-loader">
					<img src="<?= get_theme_file_uri('/assets/images/svg-icons/spinner.svg') ?>" width="32" height="32" />
				</div>
			</div>
		</div>
	</div>
</nav>	
<?php
endwhile; // End of the loop.

get_footer(); ?>
