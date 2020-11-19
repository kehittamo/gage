<?php
/**
 * Gage includes and constants
 *
 * The $gage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed.
 *
 * Please note that missing files will produce a fatal error.
 *
 * Also add any constants here.
 *
 * @package gage
 */

// Includes.
$gage_includes = array(
	'lib/class-cachebuster.php', // Cache busting.
	'lib/extras.php',            // Custom functions.
	'lib/localization.php',      // Polylang fallback.
	'lib/setup.php',             // Theme setup.
	'lib/assets.php',            // Assets inclusion.
	'lib/blocks.php',            // Gutenberg blocks.
);

foreach ( $gage_includes as $file ) {
	$filepath = locate_template( $file );
	if ( ! $filepath ) {
			trigger_error( sprintf( wp_kses_data( pll__( 'Error locating %s for inclusion', 'gage' ) ), $file ), E_USER_ERROR );
	}
	include_once $filepath;
}
unset( $file, $filepath );
