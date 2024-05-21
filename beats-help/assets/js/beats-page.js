(function ($) {
    $(document).ready(function () {
        $('body').addClass('dokan-dashboard');
        if ($('.vendor-toggle-menu'))
        {
            jQuery(document).on('click', '.vendor-toggle-menu', function (e) {
                jQuery('#vendor-main-sidebar').toggleClass('hidden')
                console.log(e)
            })   
        }
        
        var modal, span,categoryInput,categoryText;
        var span = $('.fbu-close');
        
        $('#open-category-modal').on('click', function(e) {
            
            modal = $($(this).data('modal'));
            categoryInput = $($(this).data('input'));
            categoryText = $($(this).data('text'));
            console.log(modal, categoryInput, categoryText)
            modal.show();
        });

        $('#open-station-modal').on('click', function(e) {
            
            modal = $($(this).data('modal'));
            categoryInput = $($(this).data('input'));
            categoryText = $($(this).data('text'));
            console.log(modal, categoryInput, categoryText)
            modal.show();
        });

        // Close the modal
        span.on('click', function() {
            modal.hide();
        });
    
        // Close the modal when clicking outside of the modal content
        $(window).on('click', function(event) {
            if ($(event.target).is(modal)) {
                modal.hide();
            }
        });
        
        // Handle category selection
        jQuery(document).on('click', 'li.choose-genre', function() {
            console.log(this)
            var selectedCategory = $(this).text();
            $(categoryInput).val(selectedCategory);
            $(categoryText).html(selectedCategory);
            modal.hide();
        });


        
      jQuery('input#myprefix_media_manager').click(function(e) {

        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
                      title: 'Select Media',
                      multiple : false,
                      library : {
                           type : 'image',
                       }
                  });

                  image_frame.on('close',function() {
                     // On close, get selections and save to the hidden input
                     // plus other AJAX stuff to refresh the image preview
                     var selection =  image_frame.state().get('selection');
                     var gallery_ids = new Array();
                     var selected = new Array();
                     var i = 0;
                     selection.each(function(attachment) {
                        selected[i] = attachment.attributes.url;
                        gallery_ids[i] = attachment['id'];
                        i++;
                     });
                     var ids = gallery_ids.join(",");
                     if(ids.length === 0) return true;//if closed withput selecting an image
                     console.log(selected)
                     console.log(gallery_ids)
                     jQuery('input#myprefix_image_id').val(ids);
                     Refresh_Image(selected[]);
                  });

                 image_frame.on('open',function() {
                   // On open, get the id from the hidden input
                   // and select the appropiate images in the media manager
                   var selection =  image_frame.state().get('selection');
                   var ids = jQuery('input#myprefix_image_id').val().split(',');
                   ids.forEach(function(id) {
                     var attachment = wp.media.attachment(id);
                     attachment.fetch();
                     selection.add( attachment ? [ attachment ] : [] );
                   });

                 });

               image_frame.open();

        });

        // Ajax request to refresh the image preview
        function Refresh_Image(src){
            console.log(src)
            jQuery('#myprefix-preview-image').attr('src', src );
        }


    });
})(jQuery);


