<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php do_action( 'janma_content_class_init' ); ?>>
		<main id="main" <?php do_action( 'janma_main_class_init' ); ?>>
			<?php
			// janma_before_main_content hook.
			do_action( 'janma_before_main_content' );
			
			block_template_part( '404' );
			
			// janma_after_main_content hook.
			do_action( 'janma_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	// janma_after_primary_content_area hook.
	 do_action( 'janma_after_primary_content_area' );

get_footer();
