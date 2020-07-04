<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
    /**
     * product page display the product data 
     * (title, description, price, sale price if on sale and image gallery
     */
    $product_id = get_the_ID();
    $terms = wp_get_post_terms($product_id, 'products_category', array( 'fields' => 'all' ) ); 
    $product_title = get_the_title($product_id);
    $product_image = get_the_post_thumbnail($product_id);
    $product_gallery = get_post_meta($product_id, 'image_src');
    $product_description = get_post_meta($product_id, '_description_textarea_field');
    $product_price = get_post_meta($product_id, '_price_number');
    $product_sale_price = get_post_meta($product_id, '_sale_price_number');
    $product_onsale = get_post_meta($product_id, '_on_sale_checkbox_field');
    $product_youtube = get_post_meta($product_id, '_youtube_video_text_field');
    $product_youtube = str_replace("watch?v=","embed/", $product_youtube);


    ?>

    <div class="container-fluid">
    <div class="row bg-light">
        <div class="container my-5">
            <div class="row">
            <div class="col-lg-6">

<?php
    
    if(!$product_gallery){
        echo $product_image;
    }

    else{ ?>

<div class="product-slider">

    <?php foreach ($product_gallery as $key => $image) { ?>
    <div class="image">
        <img src="<?php echo $image; ?>" alt="">
    </div>

    <?php } ?>

</div>


<?php } ?>


<?php if($product_onsale[0]){?>
<span class="badge badge-secondary badge-slider"><?php echo __('On Sale', 'twentytwenty_child') ?></span>
<?php } ?>

</div>



<div class="col-lg-6">
<h1 class="mb-5 entry-title"><?php echo $product_title ?></h1>
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <?php if($product_price[0]){ ?>
            <h2 class="col-6 price my-0 <?php echo $product_sale_price[0] ? 'disabled' : 'ml-0' ?>">
                <?php echo $product_price[0] . ' $'; ?></h2>
            <?php } ?>

            <?php if($product_sale_price[0]){ ?>
            <h2 class="col-6 price my-0"><?php echo $product_sale_price[0] . ' $'; ?></h2>
            <?php } ?>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
            
        </div>
    </div>

    <div class="container">
        





        <div class="row my-5">
            <div class="col-md-12">
                <div class="desc mt-4">
                    <p><?php echo $product_description[0]; ?></p>
                    <?php if($product_youtube[0]){ ?>
                    <div class="embed-container"><iframe src="<?php echo $product_youtube[0]; ?>" frameborder="0"
                            allowfullscreen></iframe></div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- related products from the same category -->
        <div class="row my-5">
            <div class="col-md-12">
                <h2><?php echo __('Related Products', 'twentytwenty_child') ?></h2>

                <div class="row">

                    <?php
                

                $posts_array = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'products',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $terms[0]->taxonomy,
                                'field' => 'slug',
                                'terms' => $terms[0]->slug,
                            )
                        )
                    )
                );

                if($posts_array){
                foreach ($posts_array as $key => $post) {
                    
                    if($post->ID === $product_id){
                        continue;
                    }
                    
                    ?>


                    <a href="<?php echo get_the_permalink($post->ID); ?>"
                        class="product-link col-md-4 col-md-6 col-xs-12 mb-4">

                        <div class="card h-100">
                            <div class="card-header">
                                <?php echo get_the_post_thumbnail($post->ID) ?>
                                <?php if(get_post_meta($post->ID, '_on_sale_checkbox_field')[0]){ ?>

                                <span
                                    class="badge badge-secondary"><?php echo __('On Sale', 'twentytwenty_child') ?></span>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo get_the_title($post->ID); ?></h5>

                            </div>
                        </div>
                    </a>





                    <?php }} ?>

                </div>
            </div>
        </div>
    </div>

</main><!-- #site-content -->


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>