<?php

namespace Stripe_Payments_Custom_Fields\Interfaces;

interface Singleton {
	public function init();

	public static function instance();
}
