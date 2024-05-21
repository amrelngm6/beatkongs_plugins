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
       
        var btn = $('#fbu-popup-select');
        var modal = $(btn.data('modal'));
        
        var span = $('.fbu-close');
        var categoryInput = $(btn.data('input'));
        var categoryText = $(btn.data('text'));
    
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
            categoryText.html(selectedCategory);
            modal.hide();
        });
    });
})(jQuery);


