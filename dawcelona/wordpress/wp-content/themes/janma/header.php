<?php
/**
 * The template for displaying the header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php do_action( 'janma_body_schema_init' ); ?> <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
    <div class="janma-body-padding-content">
    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'janma' ); ?></a>
			<?php
			do_action( 'janma_top_bar' );
		
			do_action( 'janma_before_header' );

			do_action( 'janma_header' );

			do_action( 'janma_after_header' );
			?>
		<div id="page">
            <div id="content" class="site-content">
                <?php
                // janma_inside_container hook.
                do_action( 'janma_inside_container' );
