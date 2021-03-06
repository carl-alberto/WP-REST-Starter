<?php # -*- coding: utf-8 -*-

namespace Inpsyde\WPRESTStarter\Core\Endpoint;

use Inpsyde\WPRESTStarter\Common;
use Inpsyde\WPRESTStarter\Core;

/**
 * Simple field processor implementation.
 *
 * @package Inpsyde\WPRESTStarter\Core\Endpoint
 * @since   2.0.0
 */
class FieldProcessor implements Common\Endpoint\FieldProcessor {

	/**
	 * @var Common\Field\Access
	 */
	private $field_access;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 2.0.0
	 *
	 * @param Common\Field\Access $field_access Optional. Field access object. Defaults to null.
	 */
	public function __construct( Common\Field\Access $field_access = null ) {

		$this->field_access = $field_access ?: new Core\Field\Access();
	}

	/**
	 * Returns the given properties with added data of all schema-aware fields registered for the given object type.
	 *
	 * @since 2.0.0
	 *
	 * @param array  $properties  Schema properties definition.
	 * @param string $object_type Object type.
	 *
	 * @return array Properties with added data of all schema-aware fields registered for the given object type.
	 */
	public function get_extended_properties( array $properties, $object_type ) {

		$fields = $this->field_access->get_fields( $object_type );
		foreach ( $fields as $name => $definition ) {
			if ( empty( $definition['schema'] ) ) {
				continue;
			}

			$properties['properties'][ $name ] = $definition['schema'];
		}

		return $properties;
	}
}
