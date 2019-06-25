<?php
/**
 * Assets
 *
 * For asset enqueueing.
 *
 * @package gage
 * @since 1.0.0
 */

namespace Kehittamo\Gage\Assets;
use Kehittamo\Gage\CacheBuster;


/**
 * Theme assets
 */
function assets() {

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Remove Gutenberg front-end styles
	wp_deregister_style( 'wp-block-library' );
	wp_register_style( 'wp-block-library', '' );

	wp_enqueue_style( 'gage/css', get_template_directory_uri() . '/dist/styles/main.min.css', false, CacheBuster::bust(), 'all' );
	wp_enqueue_script( 'gage/js', get_template_directory_uri() . '/dist/scripts/main.min.js', [ 'jquery' ], CacheBuster::bust(), true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100 );
