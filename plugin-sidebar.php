<?php
/**
 * Plugin Name: gutenberg-sidebar
 * Plugin URI: https://monkeykodeagency.com/
 * Description: Sidebar for the block editor.
 * Author: Jull weber
 * Author URI: https://monkeykodeagency.com/
 *
 * @package MK Plugins
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// enqueue assets for blovk editor.

add_action(
	'enqueue_block_editor_assets',
	function() {
		$assets = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
		wp_enqueue_script(
			'mk-gutenberg-sidebar',
			plugins_url( 'build/index.js', __FILE__ ),
			$assets['dependencies'],
			$assets['version'],
			false
		);

	}
);





add_action(
	'init',
	function () {

	}
);
