<?php

namespace Stripe_Payments_Custom_Fields;


/**
 * Class Form_Customizer
 * @package Stripe_Payments_Custom_Fields
 */
class Field_Model {

	/**
	 * @var string
	 */
	public $id;

	/**
	 * @var string
	 */
	public $placeholder;

	/**
	 * @var string
	 */
	public $label;


	public function __construct( $data ) {
		foreach ( $data as $item_name => $item_value ) {
			if ( property_exists( $this, $item_name ) ) {
				$this->$item_name = $item_value;
			}
		}
	}
}
