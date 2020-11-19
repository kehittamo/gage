<?php
/**
 * Header
 *
 * Holds the site's header.
 *
 * @package gage
 * @since 1.0.0
 */

do_action( 'get_header' );
?>

<header class="header">
	<div class="header__content">
		<a class="header__home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<nav class="header__nav nav-primary">
			<?php
			if ( has_nav_menu( 'primary_navigation' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'primary_navigation',
						'menu_class'     => 'nav',
					)
				);
			endif;
			?>
		</nav>
	</div>
</header>
