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
        
    });
})(jQuery);
