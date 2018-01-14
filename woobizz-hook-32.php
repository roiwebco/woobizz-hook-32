<?php
/*
Plugin Name: Woobizz Hook 32 
Plugin URI: http://woobizz.com
Description: Custom Bank Transfer Text Button on Checkout page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook32
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook32_load_textdomain' );
function woobizzhook32_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook32', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Hook 32
function woobizzhook32_custom_bacs_text_button( $available_gateways_bacs ) {
    if (! is_checkout() ) return $available_gateways_bacs;  // stop doing anything if we're not on checkout page.
		if (array_key_exists('bacs',$available_gateways_bacs)) {
			
			$available_gateways_bacs['bacs']->order_button_text = __('Pay by Bank Transfer', 'woobizzhook32' );
			
		}
		return $available_gateways_bacs;
}
add_filter( 'woocommerce_available_payment_gateways', 'woobizzhook32_custom_bacs_text_button' );