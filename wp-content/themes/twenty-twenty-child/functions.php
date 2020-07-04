<?php

	
	include (STYLESHEETPATH . '/post-types/products.php');
	include (STYLESHEETPATH . '/taxonomies/products-category.php');
	include (STYLESHEETPATH . '/includes/wp-enqueue.php');
	include (STYLESHEETPATH . '/includes/wp-metabox.php');
	include (STYLESHEETPATH . '/includes/wp-shortcode.php');
	include (STYLESHEETPATH . '/includes/wp-route.php');


	function tt_child_activate() {
		flush_rewrite_rules();
	  }
	  
	  add_action( 'after_switch_theme', 'tt_child_activate' );
	

	$user_login = wp_get_current_user()->user_login;

	//Disable wp admin bar for this user
	if (  $user_login === 'wp-test' ) {
		add_filter('show_admin_bar', '__return_false');
	   }

