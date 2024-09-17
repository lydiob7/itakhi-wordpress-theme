<?php
/**
 * Theme Functions.
 *
 * @package Itakhi
 */


if ( ! defined( 'ITAKHI_VERSION' ) ) {
	define( 'ITAKHI_VERSION', time() );
}

if ( ! defined( 'ITAKHI_DIR_PATH' ) ) {
	define( 'ITAKHI_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'ITAKHI_DIR_URI' ) ) {
	define( 'ITAKHI_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'ITAKHI_BUILD_URI' ) ) {
	define( 'ITAKHI_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/dist' );
}

if ( ! defined( 'ITAKHI_BUILD_PATH' ) ) {
	define( 'ITAKHI_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/dist' );
}

if ( ! defined( 'ITAKHI_ASSETS_URI' ) ) {
	define( 'ITAKHI_ASSETS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets' );
}

if ( ! defined( 'ITAKHI_ASSETS_PATH' ) ) {
	define( 'ITAKHI_ASSETS_PATH', untrailingslashit( get_template_directory() ) . '/assets' );
}

if ( ! defined( 'ITAKHI_HMR_HOST' ) ) {
	define('ITAKHI_HMR_HOST', 'http://localhost:5173');
}

require_once ITAKHI_DIR_PATH . '/includes/helpers/autoloader.php';
require_once ITAKHI_DIR_PATH . '/includes/helpers/template-tags.php';

function itakhi_get_theme_instance() {
	\ITAKHI\Includes\ITAKHI_THEME::get_instance();
}

itakhi_get_theme_instance();

function test_shortcode() {
	echo "Hello";
}

add_shortcode('test_shortcode', 'test_shortcode');