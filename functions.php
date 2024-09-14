<?php
/**
 * Theme Functions.
 *
 * @package Itakhi
 */


if ( ! defined( 'ITAKHI_DIR_PATH' ) ) {
	define( 'ITAKHI_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'ITAKHI_DIR_URI' ) ) {
	define( 'ITAKHI_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'ITAKHI_BUILD_URI' ) ) {
	define( 'ITAKHI_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'ITAKHI_BUILD_PATH' ) ) {
	define( 'ITAKHI_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
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