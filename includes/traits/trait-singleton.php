<?php
/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 * 
 * @package Itakhi
 */

namespace ITAKHI\Includes\Traits;

trait Singleton {

	protected function __construct() {
	}

	final protected function __clone() {
	}

	/**
	 * @return object Singleton instance of the class.
	 */
	final public static function get_instance() {

		/**
		 * @var array
		 */
		static $instance = [];

		$called_class = get_called_class();

		if ( ! isset( $instance[ $called_class ] ) ) {

			$instance[ $called_class ] = new $called_class();

			do_action( sprintf( 'itakhi_theme_singleton_init_%s', $called_class ) );

		}

		return $instance[ $called_class ];

	}

}
