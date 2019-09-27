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
		register_post_meta(
			'post',
			'text_metafield',
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		register_post_meta(
			'post',
			'myguten_meta_block_field',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);

		$labels = array(
			'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		);

		register_post_type( 'book', $args );
	}
);
