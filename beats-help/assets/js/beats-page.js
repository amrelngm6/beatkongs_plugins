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
       
        $('#open-category-modal').on('click', function() {
            t ($(this));
        });

        $('#open-station-modal').on('click', function() {
            t ($(this));
        });

        function t (btn)
        {
            var modal = $(btn.data('modal'));
            var span = $('.fbu-close');
            var categoryInput = $(btn.data('input'));
            var categoryText = $(btn.data('text'));
            
            modal.show();
        
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
                console.log(categoryInput)
                console.log(categoryText)
                categoryInput.val(selectedCategory);
                categoryText.html(selectedCategory);
                modal.hide();
            });
        }
    });
})(jQuery);


