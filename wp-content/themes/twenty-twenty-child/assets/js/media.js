jQuery(function($){
    
    // Set all variables to be used in scope
    var frame,
        metaBox = $('#products_fields.postbox'); // Your meta box id here
        addImgLink = metaBox.find('.upload-custom-img');
        imgContainer = metaBox.find( '.custom-img-container');
        imgIdInput = metaBox.find( '.custom-img-id' );
        customImgDiv = metaBox.find( '#custom-images' );


    
    // ADD IMAGE LINK
    addImgLink.on( 'click', function( event ){
      
      event.preventDefault();
      
      // If the media frame already exists, reopen it.
      if ( frame ) {
        frame.open();
        return;
      }
      
      // Create a new media frame
      frame = wp.media({
        title: 'Select or Upload Media to Gallery',
        button: {
          text: 'Add to Gallery'
        },
        multiple: false  // Set to true to allow multiple files to be selected
      });

      
      // When an image is selected in the media frame...
      frame.on( 'select', function() {
        
        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();
        
        // Send the attachment URL to our custom image input field.
        imgContainer.append( `<div class="image-wrapper w-full md:w-1/3 px-3 flex flex-wrap -mx-3 my-6">
        
        <div class="image-wrapper w-full md:w-1/2 pl-3">
        <img style="width:100%;height:150px;object-fit:cover;border:none" src="${attachment.url}" alt="">
        </div>

         <div class="image-wrapper w-full md:w-1/2 px-3">
         <input type="text" name="image_src[]" value="${attachment.url}">
         <div class="flex flex-wrap my-3">
          <a class="delete-custom-img bg-red-500 hover:bg-red-700 text-white hover:text-white font-bold py-2 px-4 rounded" href="#">Remove THIS IMAGE</a>
          </div>
         </div>` );
        
      });

      // Finally, open the modal on click
      frame.open();
    });

    
      customImgDiv.on ( 'click', '.delete-custom-img', function (event){		
          event.preventDefault();
          jQuery(event.target).parent().remove();		

      });


  });