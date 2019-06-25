<?php
/**
 * Main
 *
 * Main content, usually includes Gutenberg Blocks.
 *
 * @package gage
 * @since 1.0.0
 */

while ( have_posts() ) :
	the_post();
	?>
	<main class="main">
		<div class="main__content">
			<?php the_content(); ?>
		</div>
	</main>
	<?php
endwhile;
