<?php

/**
 * Registers custom post type called Products.
 */
function products_init() {
	register_post_type( 'products', array(
		'labels'                => array(
			'name'                  => __( 'Products', 'twentytwenty_child' ),
			'singular_name'         => __( 'Products', 'twentytwenty_child' ),
			'all_items'             => __( 'All Products', 'twentytwenty_child' ),
			'archives'              => __( 'Products Archives', 'twentytwenty_child' ),
			'attributes'            => __( 'Products Attributes', 'twentytwenty_child' ),
			'insert_into_item'      => __( 'Insert into Products', 'twentytwenty_child' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Products', 'twentytwenty_child' ),
			'featured_image'        => _x( 'Featured Image', 'products', 'twentytwenty_child' ),
			'set_featured_image'    => _x( 'Set featured image', 'products', 'twentytwenty_child' ),
			'remove_featured_image' => _x( 'Remove featured image', 'products', 'twentytwenty_child' ),
			'use_featured_image'    => _x( 'Use as featured image', 'products', 'twentytwenty_child' ),
			'filter_items_list'     => __( 'Filter Products list', 'twentytwenty_child' ),
			'items_list_navigation' => __( 'Products list navigation', 'twentytwenty_child' ),
			'items_list'            => __( 'Products list', 'twentytwenty_child' ),
			'new_item'              => __( 'New Products', 'twentytwenty_child' ),
			'add_new'               => __( 'Add New', 'twentytwenty_child' ),
			'add_new_item'          => __( 'Add New Products', 'twentytwenty_child' ),
			'edit_item'             => __( 'Edit Products', 'twentytwenty_child' ),
			'view_item'             => __( 'View Products', 'twentytwenty_child' ),
			'view_items'            => __( 'View Products', 'twentytwenty_child' ),
			'search_items'          => __( 'Search Products', 'twentytwenty_child' ),
			'not_found'             => __( 'No Products found', 'twentytwenty_child' ),
			'not_found_in_trash'    => __( 'No Products found in trash', 'twentytwenty_child' ),
			'parent_item_colon'     => __( 'Parent Products:', 'twentytwenty_child' ),
			'menu_name'             => __( 'Products', 'twentytwenty_child' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'products',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'products_init' );


