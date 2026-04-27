<?php
/**
 * Janma WordPress theme.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'JANMA_VERSION', '1.0.0' );

if ( ! function_exists( 'janma_setup' ) ) {
	add_action( 'after_setup_theme', 'janma_setup' );
	// Sets up theme defaults and registers support for various WordPress features.
	function janma_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'janma' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-spacing' );
		add_theme_support( 'block-template-parts' );
		add_theme_support( 'editor-styles' );
		
		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'janma' ),
			)
		);
			
		// Sets up background defaults and registers support for WordPress features.	
		add_theme_support( 'custom-background',
			array(
				'default-color' 		 => 'cee1cc',
				'default-image'          => '',
				'default-repeat'         => 'repeat',
				'default-position-x'     => 'left',
				'default-position-y'     => 'top',
				'default-size'           => 'auto',
				'default-attachment'     => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			)
		);
		
	}
}

// Get all necessary theme files
get_template_part( 'inc/header' );
get_template_part( 'inc/defaults' );
get_template_part( 'inc/class-tgm-plugin', 'activation' );


if ( ! function_exists( 'janma_main_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'janma_main_scripts' );
	/**
	 * Enqueue scripts and styles
	 */
	function janma_main_scripts() {
		
		wp_enqueue_style( 'janma-defaults', get_template_directory_uri() . '/css/defaults.css', '', JANMA_VERSION, 'all' );
		wp_enqueue_style( 'janma-style', get_template_directory_uri() . '/style.min.css', array( 'wp-block-library' ), JANMA_VERSION, 'all' );

		if ( is_child_theme() ) {
			wp_enqueue_style( 'janma-child', get_stylesheet_uri(), array( 'janma-style' ), filemtime( get_stylesheet_directory() . '/style.min.css' ), 'all' );
		}
	}
}

if ( ! function_exists( 'janma_enqueue_editor_styles' ) ) {
	// Enqueue editor styles.
	function janma_enqueue_editor_styles() {
		// Add styles
		$janma_defaults = esc_url( get_template_directory_uri() ) . '/css/defaults.css';
		$janma_style = esc_url( get_template_directory_uri() ) . '/style.min.css';
		add_editor_style( $janma_defaults );
		add_editor_style( $janma_style );
		
		// Get the custom background settings
		$background_color = get_theme_mod( 'background_color', 'ffffff' );
		$background_image = get_theme_mod( 'background_image', '' );
		$background_repeat = get_theme_mod( 'background_repeat', 'repeat' );
		$background_position_x = get_theme_mod( 'background_position_x', 'left' );
		$background_position_y = get_theme_mod( 'background_position_y', 'top' );
		$background_size = get_theme_mod( 'background_size', 'auto' );

		// Prepare the CSS
		$editor_css = "
			body {
				background-color: #" . esc_attr( $background_color ) . ";
				background-image: url('" . esc_url( $background_image ) . "');
				background-repeat: " . esc_attr( $background_repeat ) . ";
				background-position: " . esc_attr( $background_position_x ) . " " . esc_attr( $background_position_y ) . ";
				background-size: " . esc_attr( $background_size ) . ";
			}
		";

		// Inject the CSS into the block editor
		wp_add_inline_style( 'wp-block-editor', $editor_css );
	}
}
add_action( 'admin_init', 'janma_enqueue_editor_styles', 8 );
