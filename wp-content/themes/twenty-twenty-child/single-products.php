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


/**
* product page display the product data 
* (title, description, price, sale price if on sale and image gallery
*/



class Single_Products {

    public $product_id;
    public $terms;
    public $product_title;
    public $product_image;
    public $product_gallery;
    public $product_description;
    public $product_price;
    public $product_sale_price;
    public $product_onsale;
    private $product_youtube;
    public $product_youtube_url;

    function __construct() {
        $this->product_id = get_the_ID();
        $this->terms = wp_get_post_terms($this->product_id, 'products_category', array( 'fields' => 'all' ) );
        $this->product_title = get_the_title($this->product_id);
        $this->product_image = get_the_post_thumbnail($this->product_id);
        $this->product_gallery = get_post_meta($this->product_id, 'image_src');
        $this->product_description = get_post_meta($this->product_id, '_description_textarea_field');
        $this->product_price =  get_post_meta($this->product_id, '_price_number');
        $this->product_sale_price = get_post_meta($this->product_id, '_sale_price_number');
        $this->product_onsale = get_post_meta($this->product_id, '_on_sale_checkbox_field');
        $this->product_youtube = get_post_meta($this->product_id, '_youtube_video_text_field');
        $this->product_youtube_url = str_replace("watch?v=","embed/", $this->product_youtube); 
    }


}

$single_product = new Single_Products();



?>

<main id="site-content" role="main">

    <div class="container-fluid">
        <div class="row bg-light">
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-6">

                        <?php
    
    if(!$single_product->product_gallery){
        echo $single_product->product_image;
    }

    else{ ?>

                        <div class="product-slider">
                            <?php foreach ($single_product->product_gallery as $key => $image) { ?>
                            <div class="image">
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <?php } ?>
                        </div>

                        <?php } ?>

                        <?php if($single_product->product_onsale[0]){?>
                        <span
                            class="badge badge-secondary badge-slider"><?php echo __('On Sale', 'twentytwenty_child') ?></span>
                        <?php } ?>

                    </div>

                    <div class="col-lg-6">
                        <h1 class="mb-5 entry-title"><?php echo $single_product->product_title ?></h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <?php if($single_product->product_price[0]){ ?>
                                    <h2
                                        class="col-6 price my-0 <?php echo $single_product->product_sale_price[0] ? 'disabled' : 'ml-0' ?>">
                                        <?php echo $single_product->product_price[0] . '$'; ?></h2>
                                    <?php } ?>

                                    <?php if($single_product->product_sale_price[0]){ ?>
                                    <h2 class="col-6 price my-0">
                                        <?php echo $single_product->product_sale_price[0] . '$'; ?></h2>
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
                    <p><?php echo $single_product->product_description[0]; ?></p>
                    <?php if($single_product->product_youtube_url[0]){ ?>
                    <div class="embed-container"><iframe src="<?php echo $single_product->product_youtube_url[0]; ?>"
                            frameborder="0" allowfullscreen></iframe></div>
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
                                'taxonomy' => $single_product->terms[0]->taxonomy,
                                'field' => 'slug',
                                'terms' => $single_product->terms[0]->slug,
                            )
                        )
                    )
                );

                if($posts_array){
                foreach ($posts_array as $key => $post) {
                    
                    if($post->ID === $single_product->product_id){
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