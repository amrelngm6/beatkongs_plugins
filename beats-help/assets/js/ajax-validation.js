jQuery(document).ready(function($) {
    jQuery('#validate-permalink').on('click', function() {
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
            if (response.success) {
                $('#slug-validation-message').text(response.data);
            } else {
                $('#slug-validation-message').text(response.data);
            }
        });
    });

    jQuery(document).on('click', '#activate-permalink', function(){
        jQuery(this).hide()
        jQuery('#validate-permalink').show()
        jQuery('#beat_slug').attr('disabled', false)
    })

});
