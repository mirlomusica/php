<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
            </div><!-- #content -->
		</div><!-- #page -->
        
        <?php
        // janma_before_footer hook.
        do_action( 'janma_before_footer' );
        ?>

        <div <?php do_action( 'janma_footer_class_init' ); ?>>
            <?php
            // janma_before_footer_content hook.
            do_action( 'janma_before_footer_content' );
        
			do_action( 'janma_footer_widgets' );
		
			// janma_after_footer_widgets hook.
			do_action( 'janma_after_footer_widgets' );
			
			// janma_footer hook.
            do_action( 'janma_footer' );
        
            // janma_after_footer_content hook.
            do_action( 'janma_after_footer_content' );
            ?>
        </div><!-- .site-footer -->
        
        <?php
        // janma_after_footer hook.
        do_action( 'janma_after_footer' );
        
        wp_footer();
        ?>
	</div><!-- .janma-body-padding-content -->
</body>
</html>
