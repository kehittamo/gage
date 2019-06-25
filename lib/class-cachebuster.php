<?php
/**
 * CacheBuster
 *
 * Busts cache for assets.
 *
 * @package gage
 * @since 1.0.0
 */

namespace Kehittamo\Gage;

class CacheBuster {
	private static $version = '';
	public static function bust( $force_version = '' ) {
		if ( $force_version ) {
			self::$version = $force_version;
		} elseif ( ! self::$version ) {
			$new_version = '';
			// Use time as buster in dev environment.
			if ( in_array( 'development', [ getenv( 'WP_ENV' ), getenv( 'WP_ENVIRONMENT' ) ], true ) ) {
				$new_version = time();
			} else {
				$bbn         = getenv( 'BITBUCKET_BUILD_NUMBER' );
				$new_version = $bbn ?: ( exec( 'git describe --tags --abbrev=0 2>/dev/null' ) ?: '0.0.0' );
			}
			self::$version = $new_version;
		}
		return self::$version;
	}
}
