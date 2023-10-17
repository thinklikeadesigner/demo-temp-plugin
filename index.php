<?php
/**
 * demo-temp-plugin
 *
 * @package   demo_temp_plugin
 * @copyright 2023 Texas A&M Transportation Institute
 * @author    Texas A&M Transportation Institute, Communications Division <webmaster@tti.tamu.edu>
 * @license   GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       demo-temp-plugin
 * Plugin URI:        https://github.com/ttitamu/com-wp-plugin-template
 * Description:       A template WordPress plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.1
 * Author:            Texas A&M Transportation Institute, Communications Division
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       demotempplugin-textdomain
 * Update URI:        https://github.com/ttitamu/com-wp-plugin-template
 */

namespace demo_temp_plugin;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

// These constants are used by source files.
const PLUGIN_KEY     = 'demotempplugin';
const POST_TYPE_KEY  = 'new_post_type';
const PLUGIN_FILE    = __FILE__;
const PLUGIN_SRC_DIR = __DIR__ . '/src/';
// Using a function to define a constant. Only supported by the `define()` function.
define( 'demo_temp_plugin\PLUGIN_SRC_URL', plugins_url( 'src', __FILE__ ) . '/' );

// Alert the user if Advanced Custom Fields is not installed.
if ( ! class_exists( 'acf' ) ) {
	add_action(
		'admin_notices',
		function () {
			?><div class="notice notice-error">
				<p><?php esc_html_e( 'demo-temp-plugin requires Advanced Custom Fields to be installed and activated.', 'demotempplugin-textdomain' ); ?></p>
			</div>
			<?php
		}
	);
}

require 'src/assets.php';
require 'src/demo.php';
require 'src/new-post-type.php';
require 'src/settings-page.php';
require 'src/shortcodes.php';
