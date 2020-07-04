<?php

 // product shortcode with multiple attributes
 function product_shortcode($attr){

	ob_start();
 
    $args = shortcode_atts( array(
     
            'product_id' => 1,
            'bg_color' => '#000',
            
 
		), $attr );

		$product_id = $args['product_id'];
		$product_bg = $args['bg_color'];
		$product_image = get_the_post_thumbnail($product_id);
		$product_title = get_the_title($product_id);
		$product_price = get_post_meta($product_id, '_price_number');
		$product_price = $product_price[0] ? $product_price[0].'$' : '';
		$product_sale_price = get_post_meta($product_id, '_sale_price_number');
		$product_sale_price = $product_sale_price[0] ? $product_sale_price[0].'$' : '';
		$product_onsale = get_post_meta($product_id, '_on_sale_checkbox_field');
		$product_onsale = $product_onsale[0] ? '<span class="badge badge-secondary">'. __("On Sale", "twentytwenty_child").'</span>' : '';
		$price_delete = $product_sale_price[0] ? 'disabled' : ''; ?>
 
	
	
	<div class="mb-4">
	<div class="card card-shortcode" style="background-color: <?php echo $product_bg; ?>">
	<div class="card-header">
	<?php echo $product_image; ?>
	<?php echo $product_onsale; ?>
	</div>
	<div class="card-body"><h5 class="card-title my-3"><?php echo $product_title; ?></h5>
	<div class="row">
	<h3 class="col-6 my-3 <?php echo $price_delete; ?>"><?php echo $product_price; ?></h3>
	<h3 class="col-6 my-3"><?php echo $product_sale_price; ?></h3>
	</div>
	</div>
	</div>
    </div>
    
    <?php 
    $output = ob_get_contents();    
	ob_get_clean();

    return apply_filters( 'product_shortcode_extension', $output );
 
}
 
add_shortcode( 'product' , 'product_shortcode' );
