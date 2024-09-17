<?php
/**
 * Enqueue theme assets
 *
 * @package Itakhi
 */

namespace ITAKHI\Includes;

use ITAKHI\Includes\Traits\Resolver;
use ITAKHI\Includes\Traits\Singleton;

class Assets {
	use Resolver;
	use Singleton;

	protected function __construct() {
		$this->load();

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
		wp_enqueue_style('dev-css', ITAKHI_ASSETS_URI . '/src/output.css', [], false, 'all');
		// $this->enqueue('src/output.css', 'style');
		wp_enqueue_style('main-style-css', ITAKHI_DIR_URI . '/style.css', [], false, 'all');
	}

	public function register_scripts() {
		$this->enqueue('src/main.ts', 'script', ['jquery']);
	}

}
