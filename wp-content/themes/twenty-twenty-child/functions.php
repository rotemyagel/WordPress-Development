<?php

add_action( 'wp_enqueue_scripts', 'tt_child_enqueue_parent_styles' );

	function tt_child_enqueue_parent_styles() {
	   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}
	


	$user_login = wp_get_current_user()->user_login;

	//Disable wp admin bar for this user by Username
	if (  $user_login === 'wp-test' ) {
		add_filter('show_admin_bar', '__return_false');
	   }