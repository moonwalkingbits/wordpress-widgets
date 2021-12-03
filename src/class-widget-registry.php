<?php
/**
 * Widgets: Widget registry class
 *
 * @package Moonwalking_Bits\Widgets
 * @author Martin Pettersson
 * @license GPL-2.0
 * @since 0.1.0
 */

namespace Moonwalking_Bits\Widgets;

use InvalidArgumentException;
use WP_Widget;

/**
 * A widget registry class.
 *
 * @since 0.1.0
 */
class Widget_Registry {

	/**
	 * Registers a given widget class.
	 *
	 * @since 0.1.0
	 * @param string $widget Widget class.
	 * @throws \InvalidArgumentException If the given class is not a valid WordPress widget.
	 */
	public function register( string $widget ): void {
		if ( ! class_exists( $widget ) || ! in_array( WP_Widget::class, class_parents( $widget ), true ) ) {
			throw new InvalidArgumentException( 'The widget must be an existing class extending WP_Widget' );
		}

		add_action( 'widgets_init', fn() => register_widget( $widget ) );
	}
}
