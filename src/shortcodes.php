<?php
/**
 * Register shortcodes.
 *
 * @see https://codex.wordpress.org/Shortcode_API
 *
 * @package demo_temp_plugin
 */

namespace demo_temp_plugin;

add_shortcode(
	'my-shortcode',
	function ( $atts ): string {

		$supported_shortcode_attributes = array( 'id' => 'my-shortcode' );

		$props = (object) shortcode_atts( $supported_shortcode_attributes, $atts );

		ob_start();
		include 'views/my-shortcode.php';
		$html = ob_get_clean();

		return $html;
	}
);
