<?php
/**
 * Setup
 *
 * Basic theme setup.
 *
 * @package gage
 * @since 1.0.0
 */

namespace Kehittamo\Gage\Setup;

/**
 * Theme setup
 */
function setup() {
	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/sage-translations .
	load_theme_textdomain( 'gage', get_template_directory() . '/lang' );

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag .
	add_theme_support( 'title-tag' );

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus .
	register_nav_menus(
		[
			'primary_navigation' => pll__( 'Primary Navigation', 'gage' ),
		]
	);

	// Enable post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size .
	add_theme_support( 'post-thumbnails' );

	// Enable HTML5 markup support
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5 .
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
