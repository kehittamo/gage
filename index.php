<?php
/**
 * Index
 *
 * Default entry point for pages, posts and archives.
 *
 * @package gage
 * @since 1.0.0
 */

$is_404     = is_404() ? '404' : '';
$is_archive = is_archive() || is_search() || ( is_home() && ! is_front_page() )
	? 'archive'
	: '';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/head' ); ?>
	<body <?php body_class(); ?>>
		<?php
			get_template_part( 'templates/warnings' );
			get_template_part( 'templates/header' );
			get_template_part( 'templates/main', $is_404 ?: $is_archive );
			get_template_part( 'templates/footer' );
		?>
	</body>
</html>
