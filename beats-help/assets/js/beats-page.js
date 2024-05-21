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
        var chooseBtn = $('#fbu-category-choose');
    
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
        chooseBtn.on('click', function() {
            var selectedCategory = $('#fbu-category-list option:selected').text();
            $('#fbu-category').val(selectedCategory);
            modal.hide();
        });
    });
})(jQuery);


