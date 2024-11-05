<?php
/**
 * Theme Functions.
 *
 * @package Itakhi
 */


if ( ! defined( 'WP_HOTRELOAD' ) ) {
	define( 'WP_HOTRELOAD', true );
}

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

function rss_feed() {
	$rss = fetch_feed( 'https://www.itakhidigital.com/feed/' );
	if (! is_wp_error( $rss )) {
		$maxitems = $rss->get_item_quantity( 5 );
		$rss_items = $rss->get_items( 0, $maxitems );
		foreach ( $rss_items as $item ) {
			get_template_part( 'template-parts/components/blog/rss-feed-blog-post-card', null, [ 'item' => $item ] );
		}
	}
}

add_shortcode('rss_feed', 'rss_feed');