<?php
/**
 * Settings page for the plugin.
 *
 * @package    demo_temp_plugin
 * @subpackage Common
 */

namespace demo_temp_plugin;

// Register a WordPress admin settings page with a single text field named "API_KEY".
add_action(
	'admin_menu',
	function () {
		add_options_page(
			'demo-temp-plugin Settings',
			'demo-temp-plugin',
			'manage_options',
			'demotempplugin',
			function () {
				?>
				<div class="wrap">
					<h1><?php esc_html_e( 'demo-temp-plugin Settings', 'demotempplugin-textdomain' ); ?></h1>
					<form method="post" action="options.php">
						<?php
						settings_fields( 'demotempplugin-settings' );
						do_settings_sections( 'demotempplugin-settings' );
						submit_button();
						?>
					</form>
				</div>
				<?php
			}
		);
	}
);

// Register a WordPress settings field and section for the API_KEY field.
add_action(
	'admin_init',
	function () {
		register_setting(
			'demotempplugin-settings',
			'demotempplugin-settings',
			function ( $input ) {
				$input['api_key'] = sanitize_text_field( $input['api_key'] );
				return $input;
			}
		);
		add_settings_section(
			'demotempplugin-settings',
			'demo-temp-plugin Settings',
			function () {
				esc_html_e( 'Enter your API key below.', 'demotempplugin-textdomain' );
			},
			'demotempplugin-settings'
		);
		add_settings_field(
			'api_key',
			'API Key',
			function () {
				$options = get_option( 'demotempplugin-settings' );
				?>
				<input type="text" name="demotempplugin-settings[api_key]" value="<?php echo esc_attr( $options['api_key'] ?? '' ); ?>" />
				<?php
			},
			'demotempplugin-settings',
			'demotempplugin-settings'
		);
	}
);
