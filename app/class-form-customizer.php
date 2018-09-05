<?php

namespace Stripe_Payments_Custom_Fields;

use Stripe_Payments_Custom_Fields\Interfaces\Singleton;
use Stripe_Payments_Custom_Fields\Traits\Singleton as SingletonTrait;


/**
 * Class Form_Customizer
 * @package Stripe_Payments_Custom_Fields
 */
class Form_Customizer implements Singleton {

	use SingletonTrait;

	/**
	 *
	 */
	public function init() {
		if ( is_admin() ) {
			return;
		}

		$this->customize_form();
	}

	/**
	 *
	 */
	public function customize_form() {
		//Adding fields using this filter because other filters don't work.
		//Please check this issue: https://github.com/Arsenal21/stripe-payments/issues/54
		add_filter(
			'asp_button_output_before_button',
			function ( $output ) {
				$custom_stripe_fields = '';

				foreach ( $this->get_fields() as $field ) {
					$custom_stripe_fields .= $this->render_field( $field );
				}

				$pos = strpos( $output, '<input type=\'hidden\'' );

				$output = substr_replace( $output, $custom_stripe_fields, $pos, 0 );

				return $output;
			}
		);

		add_filter( 'asp_order_before_insert', [ $this, 'save' ] );
	}

	/**
	 * @param $field
	 *
	 * @return string
	 */
	public function render_field( Field_Model $field ) {
		ob_start();
		include SPCF_PLUGIN_DIR . '/templates/field.php';

		return ob_get_clean();
	}

	/**
	 *
	 */
	public function save() {

	}

	/**
	 * @return Field_Model[]
	 */
	private function get_fields() {
		$settings = [
			[
				'id'          => 'spcf-age',
				'placeholder' => 'Alter',
				'label'       => 'Alter',
			],
			[
				'id'          => 'spcf-phone',
				'placeholder' => 'Mobiltelefon',
				'label'       => 'Mobiltelefon',
			],
		];

		$fields = [];

		foreach ( $settings as $field_data ) {
			array_push( $fields, new Field_Model( $field_data ) );
		}

		return $fields;
	}

}