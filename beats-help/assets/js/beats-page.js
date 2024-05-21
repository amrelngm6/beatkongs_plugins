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
            
            modal = $($(e.target).data('modal'));
            modal.show();
        });

        $('#open-station-modal').on('click', function(e) {
            
            modal = $($(e.target).data('modal'));
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
            var categoryInput = $(this).data('input');
            var categoryText = $(this).data('text');
            $(categoryInput).val(selectedCategory);
            $(categoryText).html(selectedCategory);
            modal.hide();
        });
    });
})(jQuery);


