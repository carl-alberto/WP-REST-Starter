<?php # -*- coding: utf-8 -*-

namespace Inpsyde\WPRESTStarter\Core\Field;

use Inpsyde\WPRESTStarter\Common;

/**
 * Non-caching field access implementation.
 *
 * @package Inpsyde\WPRESTStarter\Core\Field
 * @since   1.0.0
 * @since   2.0.0 Made the class final.
 */
final class Access implements Common\Field\Access {

	/**
	 * Returns the definition of all registered fields for the given resource.
	 *
	 * @since 1.0.0
	 *
	 * @param string $resource Optional. Resource name (e.g., post). Defaults to empty string.
	 *
	 * @return array[] Field definitions.
	 */
	public function get_fields( $resource = '' ) {

		if ( empty( $GLOBALS['wp_rest_additional_fields'][ $resource ] ) ) {
			return [];
		}

		return $GLOBALS['wp_rest_additional_fields'][ $resource ];
	}
}
