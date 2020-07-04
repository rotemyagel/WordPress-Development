<?php

$query_args = array( 
    'post_type'     => 'products', 
    'post_status'   => 'publish',
    'orderby'       => 'menu',
    'order'         => 'asc',
    'nopaging'      => true
);

$query = new WP_Query($query_args);

// Check that we found some products to display
if ($query->posts) { ?>

<div class="container my-4">
    <div class="row">


        <?php foreach ($query->posts as $key => $product) { 
            
        $product_id = $product->ID;
        //product title    
        $product_title = get_the_title($product_id);
        //product link   
        $product_link = get_the_permalink($product_id);
        //product on sale    
        $product_onsale = get_post_meta($product_id, '_on_sale_checkbox_field');
        //product main image
        $product_image  = get_the_post_thumbnail($product_id);
?>




        <a href="<?php echo $product_link; ?>" class="product-link col-lg-4 col-md-6 col-xs-12 mb-4">

            <div class="card h-100">
                <div class="card-header">
                    <?php echo $product_image; ?>
                    <?php if($product_onsale[0]){?>
                    <span class="badge badge-secondary"><?php echo __('On Sale', 'twentytwenty_child') ?></span>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product_title; ?></h5>

                </div>
            </div>
        </a>



        <?php } ?>

    </div>
</div>

<?php } 

// Restore original Post Data
wp_reset_postdata();