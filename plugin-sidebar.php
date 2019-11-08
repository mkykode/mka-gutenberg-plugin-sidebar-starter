<?php
/**
 * Plugin Name: MK Gutenberg blocks
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


// enqueue assets for bloCk editor.


add_action(
	'init',
	function () {
		$assets = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
		wp_enqueue_script(
			'mk-blocks',
			plugins_url( 'build/index.js', __FILE__ ),
			$assets['dependencies'],
			$assets['version'],
			false
		);

		register_block_type(
			'mk-gutenberg',
			array(
				'editor_script' => 'mk-blocks',
			)
		);

	}
);
