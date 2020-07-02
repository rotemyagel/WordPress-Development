<?php


function tt_child_enqueue_styles() {
	wp_enqueue_style('bootstrap4-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
	wp_enqueue_style('slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
	wp_enqueue_style('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/assets/css/style.css' );
	wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'script-js', get_stylesheet_directory_uri() . '/assets/js/script.js' , array( 'jquery' ), false, true );

}
add_action( 'wp_enqueue_scripts', 'tt_child_enqueue_styles', 20 );


//JavaScript Code for opening uploader and copying the link of the uploaded image to a textbox

function include_js_code_for_uploader(){

	global $post;
    
            if ( $post->post_type === 'products'  ) {     
                wp_enqueue_style( 'tailwind-style' , 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css' );
            }

	wp_enqueue_script( 'media-js', get_stylesheet_directory_uri() . '/assets/js/media.js' , array( 'jquery' ), false, true );

     }



add_action( 'admin_enqueue_scripts', 'include_js_code_for_uploader' );


	$user_login = wp_get_current_user()->user_login;

	//Disable wp admin bar for this user by Username
	if (  $user_login === 'wp-test' ) {
		add_filter('show_admin_bar', '__return_false');
	   }

	include (STYLESHEETPATH . '/post-types/products.php');
	include (STYLESHEETPATH . '/includes/wp-metabox.php');
	include (STYLESHEETPATH . '/taxonomies/products-category.php');
