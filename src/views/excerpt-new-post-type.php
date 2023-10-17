<?php
/**
 * Custom post type excerpt, typically shown on archive pages and for search results.
 * phpcs:ignorefile WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
 *
 * @package demo_temp_plugin
 */

namespace demo_temp_plugin;

if ( ! defined( 'WPINC' ) ) {
	die( 'Access denied.' );
}

// $props is provided to this file by the `render()` function.
if ( function_exists( 'get_field' ) ) {
	// Get the Advanced Custom Fields values for the demo post.
	$props->post_field_1 = get_field( 'post_field_1' );
	$props->post_field_2 = get_field( 'post_field_2' );
	$props->post_field_3 = get_field( 'post_field_3' );
} else {
	// Fall back to post meta since it's just a demo.
	$props->post_field_1 = get_post_meta( $props->id, 'post_field_1', true );
	$props->post_field_2 = get_post_meta( $props->id, 'post_field_2', true );
	$props->post_field_3 = get_post_meta( $props->id, 'post_field_3', true );
}
if ( null === $props->post_field_1 ) {
	$props->post_field_1 = '(empty)';
}
if ( null === $props->post_field_2 ) {
	$props->post_field_2 = '(empty)';
}
if ( null === $props->post_field_3 ) {
	$props->post_field_3 = '(empty)';
}

?><table class="new-post-type fields" width="100%">
	<thead>
		<tr>
			<td colspan="3">Advanced Custom Fields values</td>
		</tr>
		<tr>
			<td>Field 1</td>
			<td>Field 2</td>
			<td>Field 3</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?= $props->post_field_1; ?></td>
			<td><?= $props->post_field_2; ?></td>
			<td><?= $props->post_field_3; ?></td>
		</tr>
	</tbody>
</table>
<?= $props->excerpt ?>
