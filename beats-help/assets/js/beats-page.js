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
        
        var modal, span,categoryText;
        var span = $('.fbu-close');
        
        $('#open-category-modal').on('click', function(e) {
            modal = $($(this).data('modal'));
            categoryText = $($(this).data('text'));
            handleCheckboxes(modal)
            modal.show();
        });

        $('#open-station-modal').on('click', function(e) {
            
            modal = $($(this).data('modal'));
            categoryText = $($(this).data('text'));
            modal.show();
        });

        // Close the modal
        span.on('click', function(e) {
            e.preventDefault();
            modal.hide();
        });
    
        // Close the modal when clicking outside of the modal content
        $(window).on('click', function(event) {
            if ($(event.target).is(modal)) {
                modal.hide();
            }
        });
        
        // Handle category selection
        jQuery(document).on('click', 'button.choose-genre', function(e) {
            e.preventDefault();
            let target  = jQuery(this).attr('data-target');
            let selectedNames = '';
            let checked = jQuery(target).find("input:checkbox:checked");
            checked.each(function(){
                selectedNames +=  ', ' + $(this).attr('data-title');
            });
            $(categoryText).html(selectedNames.slice(1));
            modal.hide();
        });


        // Open media library for uploading beat picture
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


        // Open media library for uploading beat MP3 file
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


        // Open media library for uploading beat Licenses downloads
        jQuery(document).on('click', '.downloads_media_manager', function(e) {

            e.preventDefault();
            let parent = $(this).parent();
            var urlElement = $(this).attr('data-url')
            var inputElement = $(this).attr('data-input')

            var mp3_frame;
            if(mp3_frame){
                mp3_frame.open();
            }
            // Define mp3_frame as wp.media object
            mp3_frame = wp.media({
                title: 'Select Media',
                multiple : false,
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
                selected ? (
                    parent.find(urlElement).each(function(e){
                        jQuery(this).val( selected )
                    }),
                    
                    parent.find(inputElement).each(function(e){
                        jQuery(this).val( ids )
                    })
                ) : '';
            });

            mp3_frame.on('open',function() {
                
                parent.find(inputElement).each(function(e){
                    console.log(e);
                    // On open, get the id from the hidden input
                    // and select the appropiate images in the media manager
                    var selection =  mp3_frame.state().get('selection');
                    var id = jQuery(e).val();
                    var attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add( attachment ? [ attachment ] : [] );
                });

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
        
        jQuery(document).on('click', '.insert-file-row', function(e){
            e.preventDefault();
            let row = jQuery(this).data('row');
            let target = jQuery(this).data('target');
            jQuery(target).append(row);
        });
        
        jQuery(document).on('click', '.dokan-cat-search-res-li', function(e){
            e.preventDefault();
            let checked =  modal.find('input:checkbox:checked')
            if (checked.length > 2) {
                alert('You can select up to 3 only'); 
            } else {
                let termId = jQuery(this).data('termid');
                jQuery('#checkbox-cat-'+termId).attr('checked',true);
            }
            jQuery(this).parent().parent().addClass('dokan-hide');
            handleCheckboxes(modal)

        });

        jQuery(document).on('change', '#beat_type', function(e){
            console.log(e)
            jQuery('form.dokan-beat-edit-form').toggleClass('sell')
        });

        // On change category checkbox
        jQuery(document).on('change', '.genre-checkbox', function(e){
            handleCheckboxes(modal)
        })


        
        jQuery(document).on('input', '#dokan-single-cat-search-input', function(e){

            let text = jQuery(this).val();
            
            let listEle = jQuery(jQuery(this).attr('data-list'));
            let list = JSON.parse(listEle.val());
            let result = jQuery(jQuery(this).attr('data-result'));
            if (!text) {
                result.parent().addClass('dokan-hide'); return;
            }
            let output = '';
            for (let i = 0; i < list.length; i++) {
                const element = list[i];
                output += searchResultLi(element.name, element.term_id, text);
            }

            if (output != '' ) {
                result.html(output)            
                result.parent().removeClass('dokan-hide')            
            } else {
                result.html(' ')            
                result.parent().addClass('dokan-hide')            
            }
            
        })

        jQuery(document).on('click', '#activate-permalink', function(){
            jQuery(this).hide()
            jQuery('#validate-permalink').show()
        })
        

    });
})(jQuery);

function searchResultLi(title, id, text = '')
{
    let selectedText = document.getElementById('checkbox-cat-'+id).checked ? '<b> Selected </b>' : '';
    return title.toLowerCase().search(text.toLowerCase()) > -1 ? '<li data-name="'+title+'" data-termid="'+id+'" data-index="0" class="dokan-cat-search-res-li">'+
    '<div class="dokan-cat-search-res-item">'+title+'</div>'+
    '<div class="dokan-cat-search-res-history">'+
    '<span class="dokan-cat-search-res-suggestion-selected"><span>'+title+' '+selectedText+'</span></span>'+
    '</div></li>' : '';
}

function handleCheckboxes(modal)
{
    let unchecked = modal.find("input:checkbox:not(:checked)");
    let checked = modal.find("input:checkbox:checked");
    
    modal.find("input:text").val('');
    
    if (checked.length > 2) {
        unchecked.each(function(){
            $(this).attr('disabled', true);
        });
    } else {
        unchecked.each(function(){
            $(this).attr('disabled', false);
        });
    }

    let selectedIems = '';
    let selectedSpan = jQuery(modal.attr('data-span'));
    checked.each(function(){
        selectedIems +=  ', ' + $(this).attr('data-title');
    });
    $(selectedSpan).html(selectedIems.slice(1));


}
