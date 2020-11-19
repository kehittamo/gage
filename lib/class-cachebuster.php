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
			if ( in_array( 'development', array( getenv( 'WP_ENV' ), getenv( 'WP_ENVIRONMENT' ) ), true ) ) {
				$new_version = time();
			} elseif ( getenv( 'BITBUCKET_BUILD_NUMBER' ) ) {
				$new_version = getenv( 'BITBUCKET_BUILD_NUMBER' );
			} else {
				$git_version = exec( 'git describe --tags --abbrev=0 2>/dev/null' );
				$new_version = $git_version ? $git_version : '0.0.0';
			}
			self::$version = $new_version;
		}
		return self::$version;
	}
}
