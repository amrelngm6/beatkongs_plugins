jQuery(document).ready(function($) {
    jQuery('#validate-permalink').on('click', function() {
        var loader = $('#ajax-span-loader');
        loader.show()
        var slug = $('#beat_slug_value').val();

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
                jQuery('#activate-permalink').show()
                jQuery('#validate-permalink').hide()
                jQuery('#beat_slug_value').attr('disabled', true)
                jQuery('#beat_slug').val(slug)
            } else {
                $('#slug-validation-message').css('color','red').text(response.data);
            }
            setTimeout(function(){
                $('#slug-validation-message').html('');
            }, 5000)

        });
    });

    jQuery(document).on('click', '#activate-permalink', function(){
        jQuery(this).hide()
        jQuery('#validate-permalink').show()
        jQuery('#beat_slug_value').attr('disabled', false)
    })

});
