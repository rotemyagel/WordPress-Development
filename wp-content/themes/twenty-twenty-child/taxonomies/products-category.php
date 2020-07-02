<?php

/**
 * Registers the `products_category` taxonomy,
 * for use with 'products'.
 */
function products_category_init() {
	register_taxonomy( 'products_category', array( 'products' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Categories', 'twentytwenty_child' ),
			'singular_name'              => _x( 'Category', 'taxonomy general name', 'twentytwenty_child' ),
			'search_items'               => __( 'Search Categories', 'twentytwenty_child' ),
			'popular_items'              => __( 'Popular Categories', 'twentytwenty_child' ),
			'all_items'                  => __( 'All Categories', 'twentytwenty_child' ),
			'parent_item'                => __( 'Parent Category', 'twentytwenty_child' ),
			'parent_item_colon'          => __( 'Parent Category:', 'twentytwenty_child' ),
			'edit_item'                  => __( 'Edit Category', 'twentytwenty_child' ),
			'update_item'                => __( 'Update Category', 'twentytwenty_child' ),
			'view_item'                  => __( 'View Category', 'twentytwenty_child' ),
			'add_new_item'               => __( 'Add New Category', 'twentytwenty_child' ),
			'new_item_name'              => __( 'New Category', 'twentytwenty_child' ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', 'twentytwenty_child' ),
			'add_or_remove_items'        => __( 'Add or remove Categories', 'twentytwenty_child' ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', 'twentytwenty_child' ),
			'not_found'                  => __( 'No Categories found.', 'twentytwenty_child' ),
			'no_terms'                   => __( 'No Categories', 'twentytwenty_child' ),
			'menu_name'                  => __( 'Categories', 'twentytwenty_child' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'twentytwenty_child' ),
			'items_list'                 => __( 'Categories list', 'twentytwenty_child' ),
			'most_used'                  => _x( 'Most Used', 'products_category', 'twentytwenty_child' ),
			'back_to_items'              => __( '&larr; Back to Categories', 'twentytwenty_child' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'products_category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'products_category_init' );


