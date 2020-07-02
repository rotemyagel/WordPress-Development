<?php

 
function products_metabox(){
 
    add_meta_box(
            'products_fields',
            __( 'Products', 'twentytwenty_child' ),
            'products_add_fields',
            'products',
            'normal',
            'default'
        );
}
 
add_action('add_meta_boxes', 'products_metabox');
 
function products_add_fields(){
 
    global $post;

    
 
    // Get Value of Fields From Database
    $description_textareafield = get_post_meta( $post->ID, '_description_textarea_field', true);
    $price_numberfield = get_post_meta( $post->ID, '_price_number', true);
    $sale_price_numberfield = get_post_meta( $post->ID, '_sale_price_number', true);
    $youtube_video_textfield = get_post_meta( $post->ID, '_youtube_video_text_field', true);
    $checkbox_stored_meta = get_post_meta( $post->ID );

      // Get WordPress' media upload URL
    $upload_link = esc_url( get_upload_iframe_src() );
    
    // See if there's a media id already saved as post meta
    $your_img_id = get_post_meta( get_the_ID(), '_your_img_id', true );
    
    // Get the image src
    $your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );
    
    // For convenience, see if the array is valid
    $you_have_img = is_array( $your_img_src );
    
    
     
?>


<form class="w-full max-w-lg">






  <div class="flex flex-wrap -mx-3 my-6">
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        <?php echo __('Price', 'twentytwenty_child') ?>
      </label>
      <input
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        type="number" min="0" name="_price_number" value="<?php echo $price_numberfield; ?>" placeholder="Price">
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        <?php echo __('Sale price', 'twentytwenty_child') ?>
      </label>
      <input
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        type="number" min="0" name="_sale_price_number" value="<?php echo $sale_price_numberfield; ?>"
        placeholder="Sale price">
    </div>

    <div class="w-full md:w-1/2 px-3 mt-6">
      <div class="md:w-1/3"></div> <label class="md:w-2/3 block text-gray-500 font-bold">
        <input class="mr-2 leading-tight" type="checkbox" name="_on_sale_checkbox_field" value="yes"
          <?php if ( isset ( $checkbox_stored_meta ['_on_sale_checkbox_field'] ) ) checked( $checkbox_stored_meta['_on_sale_checkbox_field'][0], 'yes' ); ?>>
        <span class="text-sm">
          <?php echo __('Is on sale?', 'twentytwenty_child') ?>
        </span>
      </label>
    </div>

  </div>


  <div id="custom-images">

    <div class="custom-img-container flex flex-wrap -mx-3 my-6">

      <?php 
        $meta_values = get_post_meta( get_the_ID(), 'image_src', false );
        
        
				
				foreach ($meta_values as $key=> $value){
          
			?>


      <div class="image-wrapper w-full lg:w-1/3 sm:w-1/2 xs:w-1/1 px-3 flex flex-wrap -mx-3 my-6">

        <div class="image-wrapper w-full md:w-1/2 pl-3">
          <img style="width:100%;height:150px;object-fit:cover;border:none;" src="<?php echo $value;?>" alt="">
        </div>
        <div class="image-wrapper w-full md:w-1/2 px-3">
          <input class="w-full" type="text" name="image_src[]" value="<?php echo $value;?>">
          <div class="flex flex-wrap my-3">
            <a class="delete-custom-img bg-red-500 hover:bg-red-700 text-white hover:text-white font-bold py-2 px-4 rounded"
              href="#">
              <?php echo __('Remove this image', 'twentytwenty_child'); ?>
            </a>
          </div>
        </div>
      </div>

      <?php }?>

    </div>

  </div>

  <div class="flex flex-wrap mb-3">

    <a class="upload-custom-img bg-blue-500 hover:bg-blue-700 text-white hover:text-white font-bold py-2 px-4 rounded <?php if ( $you_have_img  ) { echo 'hidden'; } ?>"
      href="<?php echo $upload_link; ?>">
      <?php echo __('Add custom image', 'twentytwenty_child'); ?>
    </a>

  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">

      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        <?php echo __('Description', 'twentytwenty_child') ?>
      </label>
      <textarea style="resize: none;" rows="5"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        name="_description_textarea_field"
        placeholder="Description"><?php echo $description_textareafield; ?></textarea>

    </div>
  </div>



  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        <?php echo __('YouTube video', 'twentytwenty_child') ?>
      </label>
      <input
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        type="text" name="_youtube_video_text_field" value="<?php echo $youtube_video_textfield; ?>"
        placeholder="YouTube video">
    </div>
  </div>



</form>


<?php    
}



// Now Save these multiple fields value in the Database
 
function brand_payment_save_fields_metabox(){
 
    global $post;
 
 
    if(isset($_POST["_description_textarea_field"])){
    update_post_meta($post->ID, '_description_textarea_field', $_POST["_description_textarea_field"]);
    }

    if(isset($_POST["_price_number"])){
    update_post_meta($post->ID, '_price_number', $_POST["_price_number"]);
     }

    if(isset($_POST["_sale_price_number"])) {
    update_post_meta($post->ID, '_sale_price_number', $_POST["_sale_price_number"]);
    }

    // Checks for input and saves
  if( isset( $_POST[ '_on_sale_checkbox_field' ] ) ) {
    update_post_meta( $post->ID, '_on_sale_checkbox_field', 'yes');
}
else {
    update_post_meta( $post->ID, '_on_sale_checkbox_field', '' );
}

    

    if(isset($_POST["_youtube_video_text_field"])) {
    update_post_meta($post->ID, '_youtube_video_text_field', $_POST["_youtube_video_text_field"]);
    }

    
    
		
    /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post->ID, 'image_src', false );
      
    /* For looping all meta values */
      foreach ($meta_value as $value){
        delete_post_meta( $post->ID, 'image_src', $value );
      }
      
    /* Get the posted data and sanitize it for use as an HTML class. */
    if(isset($_POST["image_src"])) {
      foreach($_POST['image_src'] as $value){	
        add_post_meta( $post->ID, 'image_src', $value, false );
      }

    }
 
 
 
}
 
add_action('save_post', 'brand_payment_save_fields_metabox');