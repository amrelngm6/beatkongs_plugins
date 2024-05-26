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
            var selectedId = $(this).attr('data-id');
            $(categoryInput).val(selectedId);
            $(categoryText).html(selectedCategory);
            modal.hide();
        });


        
        jQuery('#picture_media_manager').click(function(e) {

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
                jQuery('#beat-preview-image').attr('src', selected );
                jQuery('input#beat_image_id').val(ids);
                jQuery('#upload-cover-button').html(' ');
            });

            image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            var ids = jQuery('input#beat_image_id').val().split(',');
            ids.forEach(function(id) {
                var attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

            });

            image_frame.open();
        });

        jQuery('#mp3_media_manager').click(function(e) {

            e.preventDefault();
            var previewElement = $(this).attr('data-preview')
            var inputElement = $(this).attr('data-input')
            var btnElement = $(this).attr('data-btn')

            var mp3_frame;
            if(mp3_frame){
                mp3_frame.open();
            }
            // Define mp3_frame as wp.media object
            mp3_frame = wp.media({
                title: 'Select Media',
                multiple : false,
                library : {
                    type : 'audio',
                }
            });

            mp3_frame.on('close',function() {
                // On close, get selections and save to the hidden input
                // plus other AJAX stuff to refresh the image preview
                var selection =  mp3_frame.state().get('selection');
                var ids = '';
                var selected = '';
                selection.each(function(attachment) {
                    selected = attachment.attributes.url;
                    ids = attachment['id'];
                });
                if(ids == '') return true;//if closed withput selecting an image
                jQuery(btnElement).html(' ');
                jQuery(inputElement).val(ids);
                selected ? jQuery(previewElement).html( $('<audio src="'+selected+'"  controls />')) : '';
            });

            mp3_frame.on('open',function() {
                jQuery(previewElement).html(' ');
                // On open, get the id from the hidden input
                // and select the appropiate images in the media manager
                var selection =  mp3_frame.state().get('selection');
                var id = jQuery(inputElement).val();
                var attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

            mp3_frame.open();
        });

        jQuery('#toggle-mobile-menu').attr('checked','checked');
        if (window.screen.availWidth < 800)
        {
            jQuery('#vendor-main-sidebar').addClass('hidden')
        }

        jQuery(document).on('click', '.dokan-section-toggle', function(e){
            e.preventDefault();
            let targetId = jQuery(this).attr('data-target');
            jQuery(targetId).toggleClass('hidden')
        })
        
        jQuery(document).on('change', '.genre-checkbox', function(e){
            let parent = jQuery(this).parent().parent();
            console.log(parent);
            parent.find("input:checkbox:checked").each(function(){
                console.log($(this).val());
            });
        })

        

    });
})(jQuery);


