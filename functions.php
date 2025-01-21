<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 *
 * @package WordPress
 * @subpackage Pinked
 * @since Pinked 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'pinked_post_format_setup' ) ) :
	function pinked_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'pinked_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'pinked_editor_style' ) ) :
	function pinked_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'pinked_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'pinked_enqueue_styles' ) ) :
	function pinked_enqueue_styles() {
		wp_enqueue_style(
			'pinked-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'pinked_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'pinked_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function pinked_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'pinked' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'pinked_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'pinked_pattern_categories' ) ) :
	function pinked_pattern_categories() {

		register_block_pattern_category(
			'pinked_page',
			array(
				'label'       => __( 'Pages', 'pinked' ),
				'description' => __( 'A collection of full page layouts.', 'pinked' ),
			)
		);

		register_block_pattern_category(
			'pinked_post-format',
			array(
				'label'       => __( 'Post formats', 'pinked' ),
				'description' => __( 'A collection of post format patterns.', 'pinked' ),
			)
		);
	}
endif;
add_action( 'init', 'pinked_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'pinked_register_block_bindings' ) ) :
	function pinked_register_block_bindings() {
		register_block_bindings_source(
			'pinked/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'pinked' ),
				'get_value_callback' => 'pinked_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'pinked_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'pinked_format_binding' ) ) :
	function pinked_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;
