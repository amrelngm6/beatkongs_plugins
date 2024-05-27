jQuery(document).ready(function($) {
    jQuery('#validate-permalink').on('click', function() {
        var loader = $('#ajax-span-loader');
        loader.show()
        var slug = $('#beat_slug').val();

        // Validate slug format (optional)
        if (!slug) {
            $('#slug-validation-message').text('Slug cannot be empty.');
            return;
        }

        var data = {
            action: 'check_post_slug',
            security: ajax_object.security,
            slug: slug
        };

        $.post(ajax_object.ajax_url, data, function(response) {
            loader.hide()

            if (response.success) {
                $('#slug-validation-message').css('color','green').text(response.data);
            } else {
                $('#slug-validation-message').css('color','red').text(response.data);
            }
        });
    });

    jQuery(document).on('click', '#activate-permalink', function(){
        jQuery(this).hide()
        jQuery('#validate-permalink').show()
        jQuery('#beat_slug').attr('disabled', false)
    })

});
