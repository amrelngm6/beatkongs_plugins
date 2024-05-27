jQuery(document).ready(function($) {
    $('#post-slug').on('blur', function() {
        var slug = $(this).val();

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
});
