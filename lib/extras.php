<?php
/**
 * Extras
 *
 * Extra functionality for the current theme.
 *
 * @package gage
 * @since 1.0.0
 */

namespace Kehittamo\Gage\Extras;

use Kehittamo\Gage\Setup;

/**
 * Body class
 *
 * Add body classes.
 *
 * @param mixed $classes Class names.
 */
function body_class( $classes ) {

	// Add page slug if it doesn't exist.
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes, true ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {

	return ' &hellip; <a href="' . get_permalink() . '">' . pll__( 'Continued', 'gage' ) . '</a>';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );
