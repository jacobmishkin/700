<?php
/**
 * Action hooks and filters.
 *
 * A place to put hooks and filters that aren't necessarily template tags.
 *
 * @package xyz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _body_classes( $classes ) {

	// @codingStandardsIgnoreStart
	// Allows for incorrect snake case like is_IE to be used without throwing errors.
	global $is_IE;

	// If it's IE, add a class.
	if ( $is_IE ) {
		$classes[] = 'ie';
	}
	// @codingStandardsIgnoreEnd

	// Give all pages a unique class.
	if ( is_page() ) {
		$classes[] = 'page-' . basename( get_permalink() );
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Are we on mobile?
	// PHP CS wants us to use jetpack_is_mobile instead, but what if we don't have Jetpack installed?
	// Allows for using wp_is_mobile without throwing an error.
	// @codingStandardsIgnoreStart
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}
	// @codingStandardsIgnoreEnd

	// Adds "no-js" class. If JS is enabled, this will be replaced (by javascript) to "js".
	$classes[] = 'no-js';

	return $classes;
}
add_filter( 'body_class', '_body_classes' );

/**
 * Flush out the transients used in _categorized_blog.
 */
function _category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}
	// Like, beat it. Dig?
	delete_transient( '_categories' );
}
add_action( 'delete_category', '_category_transient_flusher' );
add_action( 'save_post',     '_category_transient_flusher' );

/**
 * Customize "Read More" string on <!-- more --> with the_content();
 */
function _content_more_link() {
	return ' <a class="more-link" href="' . get_permalink() . '">' . esc_html__( 'Read More', 'xyz' ) . '...</a>';
}
add_filter( 'the_content_more_link', '_content_more_link' );

/**
 * Customize the [...] on the_excerpt();
 *
 * @param string $more The current $more string.
 * @return string Replace with "Read More..."
 */
function _excerpt_more( $more ) {
	return sprintf( ' <a class="more-link" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), esc_html__( 'Read more...', 'xyz' ) );
}
add_filter( 'excerpt_more', '_excerpt_more' );

/**
 * Enable custom mime types.
 *
 * @param array $mimes Current allowed mime types.
 * @return array Updated allowed mime types.
 */
function _custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', '_custom_mime_types' );
