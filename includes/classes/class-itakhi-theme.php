<?php
/**
 * Bootstraps the Theme.
 *
 * @package Itakhi
 */

namespace ITAKHI\Includes;

use ITAKHI\Includes\Traits\Singleton;

class ITAKHI_THEME {
	use Singleton;

	protected function __construct() {

		// Load class.
		Assets::get_instance();
		Clock_Widget::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

	}

	/**
	 * Setup theme.
	 *
	 * @return void
	 */
	public function setup_theme() {
		add_theme_support( 'title-tag' );

		/*
		** Trim excerpt length
		*/
		add_filter( 'excerpt_length', [$this, 'itakhi_custom_excerpt_length'], 999 );

		/**
		 * @see Adding custom logo
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/#adding-custom-logo-support-to-your-theme
		 */
		add_theme_support(
			'custom-logo',
			[
				'header-text' => [
					'site-title',
					'site-description',
				],
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
			]
		);

		/**
		 * @see Enable Custom Backgrounds
		 * @link https://developer.wordpress.org/themes/functionality/custom-backgrounds/#enable-custom-backgrounds
		 */
		add_theme_support(
			'custom-background',
			[
				'default-color' => 'ffffff',
				'default-image' => '',
				'default-repeat' => 'no-repeat',
			]
		);

		/**
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

		add_image_size( 'featured-thumbnail', 390, 292.5, true );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			]
		);

		// Gutenberg theme support.

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		/**
		 * Loads the editor styles in the Gutenberg editor.
		 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
		 */
		add_theme_support( 'editor-styles' );

		// Remove the core block patterns
		remove_theme_support( 'core-block-patterns' );

		/**
		 * @see Content Width
		 * @link https://codex.wordpress.org/Content_Width
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
	}

	function itakhi_custom_excerpt_length( $length ) {
		return 22;
	}

}
