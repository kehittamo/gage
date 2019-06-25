<?php
/**
 * Main/arhive
 *
 * Main content for archives, may be customized with blocks.
 *
 * @package gage
 * @since 1.0.0
 */

$args = [
	'post_type'      => 'page',
	'post_status'    => [ 'publish', 'private' ],
	'fields'         => 'ids',
	'posts_per_page' => 1,
	'no_found_rows'  => true,
	'meta_key'       => '_wp_page_template',
	'meta_value'     => 'templates/template-archive.php',
];

$archive_id = get_posts( $args )[0] ?? 0;
?>
	<main class="main main--archive">
		<div class="main__content">
			<?php
			if ( $archive_id ) :
				echo apply_filters( 'the_content', get_post_field( 'post_content', $archive_id ) );
			else :
				if ( ! have_posts() ) :
					?>
					<h1 class="main__title">
						<?php pll_esc_html_e( 'Sorry, no results were found.', 'kage' ); ?>
					</h1>
					<?php
				endif;
				while ( have_posts() ) :
					the_post();
					?>
					<article class="main__article">
						<div class="main__articleInner">
							<h1 class="main__articleTitle">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h1>
							<div class="main__articleExcerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</article>
					<?php
				endwhile;
			endif;
			?>
	</div>
</main>
