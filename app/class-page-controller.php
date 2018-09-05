<?php

namespace Stripe_Payments_Custom_Fields;

use Stripe_Payments_Custom_Fields\Interfaces\Singleton;
use Stripe_Payments_Custom_Fields\Traits\Singleton as SingletonTrait;



/**
 * Class Page_Controller
 * @package Stripe_Payments_Custom_Fields
 */
class Page_Controller implements Singleton {

	use SingletonTrait;

	const ASSETS_VERSION = '0.1';

	public function init() {
		if ( is_admin() ) {
			return;
		}

		add_action( 'init', [ $this, 'enqueue_styles' ] );
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'stripe-payments-custom-fields.css',
			SPCF_PLUGIN_URL . '/assets/css/stripe-payments-custom-fields.css', [],
			self::ASSETS_VERSION
		);
	}
}
