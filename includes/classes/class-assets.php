<?php
/**
 * Enqueue theme assets
 *
 * @package Itakhi
 */

namespace Itakhi\Includes;

use Itakhi\Includes\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	public function register_styles() {
		// Register styles.
		wp_register_style( 'tailwind-css', ITAKHI_BUILD_URI . '/css/output.css', [], false, 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'tailwind-css' );

	}

	public function register_scripts() {
		// Register scripts.

		// Enqueue Scripts.

		// If single post page.

		// If author archive page.

		// If search page.

	}

}
