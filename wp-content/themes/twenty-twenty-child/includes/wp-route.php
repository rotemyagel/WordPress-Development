<?php

add_action('rest_api_init', 'products_rest');

function products_rest(){
    
   register_rest_route('products/v1', 'cat/(?P<category_id>\d+)',  array(

    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'products_output'

   ));
}



function products_output($data){

    $query_args = array( 
    'post_type'     => 'products', 
    'post_status'   => 'publish',
    'tax_query' => array(
        array(
        'taxonomy' => 'products_category',
        'field' => 'term_id',
        'terms' => $data['category_id']
         )
        ),
    'orderby'       => 'menu',
    'order'         => 'asc',
    'nopaging'      => true
);

$products = new WP_Query($query_args);

    $products_output = array();


    foreach ($products->posts as $product) {

        $product_id = $product->ID;
        $product_title = get_the_title($product_id);
        $product_image = get_the_post_thumbnail_url($product_id);
        $product_description = get_post_meta($product_id, '_description_textarea_field');
        $product_price = get_post_meta($product_id, '_price_number');
        $product_onsale = get_post_meta($product_id, '_on_sale_checkbox_field');
        $product_sale_price = get_post_meta($product_id, '_sale_price_number');
        
        array_push($products_output, array(

            'title' => $product_title ,
            'description' => $product_description[0],
            'image' => $product_image,
            'price' => $product_price[0],
            'is_on_sale' => $product_onsale[0],
            'sale_price' => $product_sale_price[0],

        ));

    }

 return $products_output;

 wp_reset_postdata();

}

