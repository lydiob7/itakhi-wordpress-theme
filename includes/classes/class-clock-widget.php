<?php
/**
 * Clock widget
 *
 * @package Itakhi
 */

namespace ITAKHI\Includes;

use ITAKHI\Includes\Traits\Singleton;
use WP_Widget;

class Clock_Widget extends WP_Widget {
	use Singleton;

	public function __construct() {
		parent::__construct(
			'clock_widget',
			'Clock', 
			[ 'description' => __( 'Clock widget', 'itakhitheme' ) ]
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<section class="p-4 border border-gray-300 rounded-md">
			<div class="clock card-body">
				<span id="time"></span>
				<span id="ampm"></span>
				<span id="time-emoji"></span>
			</div>
		</section>
		<?php
		echo $after_widget;
	}
	
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Clock', 'itakhitheme' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		 </p>
		<?php
	}
		public function update( $new_instance, $old_instance ) {
		$instance          = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}