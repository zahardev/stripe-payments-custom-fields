<?php
/*
 Plugin Name: Stripe Payments Custom Fields
 Author: Sergey Zaharchenko <zaharchenko.dev@gmail.com>
 Author URI:  https://github.com/zahardoc
 Description: This plugin adds additional fields for plugin Stripe Payments ( https://wordpress.org/plugins/stripe-payments/ )
 License:     GPL2

Stripe Payments Custom Fields is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Stripe Payments Custom Fields is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Stripe Payments Custom Fields. If not, see {License URI}.

*/

if ( ! function_exists( 'add_action' ) ) {
    exit;
}

define( 'SPCF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SPCF_PLUGIN_BASENAME', plugin_basename(__FILE__));
define( 'SPCF_PLUGIN_URL', plugins_url('', __FILE__));

require_once __DIR__ . '/app/interfaces/interface-singleton.php';
require_once __DIR__ . '/app/traits/trait-singleton.php';
require_once __DIR__ . '/app/class-page-controller.php';
require_once __DIR__ . '/app/class-field-model.php';
require_once __DIR__ . '/app/class-form-customizer.php';

Stripe_Payments_Custom_Fields\Page_Controller::instance()->init();
Stripe_Payments_Custom_Fields\Form_Customizer::instance()->init();
