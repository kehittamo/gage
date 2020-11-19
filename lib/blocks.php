<?php
/**
 * Blocks
 *
 * Auto-includes Kehittamö's Gutenberg blocks.
 *
 * @package gage
 * @since 1.0.0
 */

namespace Kehittamo\Gage\Block;
use Kehittamo\Gage\CacheBuster;

// These will be auto-allowed
$kehittamo_gage_allowed_blocks = array();

$blocks_dir = new \DirectoryIterator( __DIR__ . '/../blocks' );
foreach ( $blocks_dir as $fileinfo ) {
	// Loop through directories that are not hidden.
	if (
		$fileinfo->isDir() &&
		! $fileinfo->isDot()
	) {
		$block_plugin = $fileinfo->getPathname() . '/plugin.php';
		// If directory is found, check if it has a plugin.php, else trigger error.
		if ( file_exists( $block_plugin ) ) {
			// Assume the dir is a block and include.
			require_once( $block_plugin );
			$block_name = $fileinfo->getFilename();
			// If block is named by Kehittämö's convention, auto add to allowed blocks.
			if ( substr( $block_name, 0, 16 ) === 'kehittamo-block-' ) {
				$kehittamo_gage_allowed_blocks [] =
					preg_replace( '/-/', '/', $block_name, 1 ); // kehittamo/block-*
			}
		} else {
			trigger_error( sprintf( wp_kses_data( pll__( 'Error locating %s for inclusion', 'gage' ) ), $block_plugin ), E_USER_ERROR );
		}
	}
}

/**
 * Allow only predefined certain block types in Gutenberg editor
 */
function gage_allowed_block_types( $allowed_blocks ) {
	global $kehittamo_gage_allowed_blocks;

	return array_merge(
		$kehittamo_gage_allowed_blocks,
		array(
			/*
			* Common
			*/
			'core/paragraph',
			'core/image',
			'core/heading',
			// 'core/subhead',
			// 'core/gallery',
			'core/list',
			'core/quote',
			// 'core/audio',
			// 'core/cover-image',
			// 'core/file',
			// 'core/video',
			/*
			* Formatting
			*/
			// 'core/table',
			// 'core/verse',
			// 'core/code',
			// 'core/freeform' // Classic,
			// 'core/html' // Custom HTML,
			// 'core/preformatted',
			'core/pullquote',
			/*
			* Layout
			*/
			// 'core/button',
			// 'core/text-columns', // Columns,
			'core/columns', // Columns,
			// 'core/more',
			// 'core/nextpage' // Page break,
			'core/separator',
			'core/spacer',
			/*
			* Widgets
			*/
			// 'core/shortcode',
			// 'core/archives',
			// 'core/categories',
			// 'core/latest-comments',
			// 'core/latest-posts',
			/*
			* Embeds
			*/
			// 'core/embed',
			// 'core-embed/twitter',
			// 'core-embed/youtube',
			// 'core-embed/facebook',
			// 'core-embed/instagram',
			// 'core-embed/wordpress',
			// 'core-embed/soundcloud',
			// 'core-embed/spotify',
			// 'core-embed/flickr',
			// 'core-embed/vimeo',
			// 'core-embed/animoto',
			// 'core-embed/cloudup',
			// 'core-embed/collegehumor',
			// 'core-embed/dailymotion',
			// 'core-embed/funnyordie',
			// 'core-embed/hulu',
			// 'core-embed/imgur',
			// 'core-embed/issuu',
			// 'core-embed/kickstarter',
			// 'core-embed/meetup-com',
			// 'core-embed/mixcloud',
			// 'core-embed/photobucket',
			// 'core-embed/polldaddy',
			// 'core-embed/reddit',
			// 'core-embed/reverbnation',
			// 'core-embed/screencast',
			// 'core-embed/scribd',
			// 'core-embed/slideshare',
			// 'core-embed/smugmug',
			// 'core-embed/speaker',
			// 'core-embed/ted',
			// 'core-embed/tumblr',
			// 'core-embed/videopress',
			// 'core-embed/wordpress-tv',
		)
	);
}
add_filter( 'allowed_block_types', __NAMESPACE__ . '\\gage_allowed_block_types' );

// Remove default Gutenberg block styles
add_action(
	'enqueue_block_editor_assets',
	function() {
		// Main block styles.
		wp_enqueue_style( 'gage-blocks', get_template_directory_uri() . '/dist/styles/editor.min.css', false, CacheBuster::bust() );
		// Overwrite Core block styles with empty styles.
		wp_deregister_style( 'wp-block-library' );
		wp_register_style( 'wp-block-library', '' );
		// Overwrite Core theme styles with empty styles.
		wp_deregister_style( 'wp-block-library-theme' );
		wp_register_style( 'wp-block-library-theme', '' );
		// Disable extra block editor styles
		wp_deregister_style( 'wp-edit-blocks' );
		wp_register_style( 'wp-edit-blocks', '' );
		// Disable extra button editor styles
		wp_deregister_style( 'buttons' );
		wp_register_style( 'buttons', '' );
	},
	10
);
