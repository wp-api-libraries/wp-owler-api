<?php
/**
 * WP-Owler-API (https://developers.owler.com/docs)
 *
 * @package WP-Owle-API
 */
/*
* Plugin Name: WP Owle API
* Plugin URI: https://github.com/wp-api-libraries/wp-owler-api
* Description: Perform API requests to Owle in WordPress.
* Author: WP API Libraries
* Version: 1.0.2
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-zillow-api
* GitHub Branch: master
*/
/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if class exists. */
if ( ! class_exists( 'ZillowAPI' ) ) {
	
	/**
	 * Owler API Class.
	 */
	class OwlerAPI {

		/**
		 * Owler BaseAPI Endpoint
		 *
		 * @var string
		 * @access protected
		 */
		protected $base_uri = 'https://api.owler.com';
		
		/**
		 * Return format. XML or JSON.
		 *
		 * @var [string
		 */
	 	static private $output;
		
		/**
		 * Construct.
		 *
		 * @access public
		 * @param mixed $output Output.
		 * @return void
		 */
		public function __construct( $output = 'json' ) {

			static::$output = $output;
		}
		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-owler-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}
		
		/* COMPANY. */
		
		public function basic_company_search() {
			
		}
				
	} // End OwlerAPI().
} // Endif.