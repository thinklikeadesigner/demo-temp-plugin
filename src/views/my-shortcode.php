<?php
/**
 * Shortcode content for [my-shortcode].
 * $props is provided to this file by the `render()` function.
 *
 * @package demo_temp_plugin
 */

namespace demo_temp_plugin;

if ( ! defined( 'WPINC' ) ) {
	die( 'Access denied.' );
}

wp_enqueue_script(
	PLUGIN_KEY . '-my-shortcode-script',
	PLUGIN_SRC_URL . 'assets/js/my-shortcode.js',
	array(),
	filemtime( PLUGIN_SRC_DIR . 'assets/js/my-shortcode.js' ),
	true
);
wp_enqueue_style(
	PLUGIN_KEY . '-my-shortcode-style',
	PLUGIN_SRC_URL . 'assets/css/my-shortcode.css',
	array(),
	filemtime( PLUGIN_SRC_DIR . 'assets/css/my-shortcode.css' )
);

?><div id="<?= esc_attr( $props->id ) ?>">Hello, WordPress!</div>
<p>Would you like to see some API data?</p>
<?php
$url = 'https://api.sampleapis.com/coffee/hot';

// https://developer.wordpress.org/reference/functions/wp_remote_get/.
$response = wp_remote_get( $url );
$message  = 'Here\'s the API response:';
if ( is_wp_error( $response ) ) {
	$message = 'Sorry, but it\'s an error:';
	$content = $response->get_error_message();
} else {
	$content = wp_remote_retrieve_body( $response );
	$content = wp_json_encode( json_decode( $body ), JSON_PRETTY_PRINT );
}

?>
<p><?= esc_html( $message ) ?></p>
<pre><?= esc_html( $content ) ?></pre>
<?php
