<?php

namespace Stripe_Payments_Custom_Fields\Traits;


/**
 * Trait Singleton
 * @package Importer_From_Maxsite
 */
trait Singleton {

	private static $instance;

	/**
	 * API constructor.
	 */
	private function __construct() {
	}

	public static function instance() {
		if ( empty( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}
}
