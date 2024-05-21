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
       
        var modal = $('#fbu-category-modal');
        var btn = $('#fbu-category-select');
        var span = $('.fbu-close');
        var categoryList = $('#dokan-single-categories');
        var categoryInput = $('#fbu-category');
        var categoryText = $('#fbu-category-text');
    
        // Open the modal
        btn.on('click', function() {
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
        // Handle category selection
        jQuery(document).on('click', 'li.choose-genre', function() {
            console.log(this)
            var selectedCategory = $(this).text();
            categoryInput.val(selectedCategory);
            categoryText.text(selectedCategory);
            modal.hide();
        });
    });
})(jQuery);


