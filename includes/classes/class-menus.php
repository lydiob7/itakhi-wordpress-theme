<?php
/**
 * Register Menus
 *
 * @package Itakhi
 */

namespace Itakhi\Includes;

use Itakhi\Includes\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions.
		 */
        add_action( 'init', [ $this, 'register_menus' ] );
	}

    public function register_menus() {
        register_nav_menus([
            'itakhi-header-menu' => esc_html__( 'Header Menu', 'itakhitheme' ),
            'itakhi-footer-menu' => esc_html__( 'Footer Menu', 'itakhitheme' )
        ]);
    }

	public function get_menu_id( $location ) {
		$locations = get_nav_menu_locations();

		$menu_id = $locations[$location];

		return !empty($menu_id) ? $menu_id : '';
	}

	public function get_child_menu_items( $menu_array, $parent_id ) {
		$child_menus = [];

		if (!empty($menu_array) && is_array($menu_array)) {
			foreach($menu_array as $menu_item) {
				if (intval($menu_item->menu_item_parent) === $parent_id) {
					array_push($child_menus, $menu_item);
				}
			}
		}

		return $child_menus;
	}
}
