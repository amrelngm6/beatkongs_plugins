<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

<div class="dokan-dashboard-wrap">

    <?php

        /**
         *  Adding dokan_dashboard_content_before hook
         *
         *  @hooked get_dashboard_side_navigation
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_before' );
    ?>

    <div class="dokan-dashboard-content dokan-product-listing">

        <?php

            /**
             *  Adding dokan_dashboard_content_before hook
             *
             *  @hooked get_dashboard_side_navigation
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_inside_before' );
            ?>

        <article class="dokan-product-listing-area bg-white">
            
            <div class="product-listing-top dokan-clearfix flex">
                <h4 class="w-full">Beattag</h4>
                <hr />
            </div>
            <div class="flex w-full">
                <div class="w-48"> Watermark </div>
                <div> 
                    <button class="cursor-pointer " id="open-media-library"> Add or Upload File</button>
                    <p>
                        File: <span id="file-name"></span>
                        ( <a id="file-download"></a> / <a id="file-remove"></a>)
                    </p>
                </div>
                
            </div>

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div id="user-media-library">
                        <div id="selected-media" class="text-center">
                            <p><b>Upload and Store all your beat files and images.<br />
                            Mp3, Wav and Zip files only.</b></p>
                        </div>
                        
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </article>

        <?php

                /**
                 *  Adding dokan_dashboard_content_before hook
                 *
                 *  @hooked get_dashboard_side_navigation
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_dashboard_content_inside_after' );
                ?>

    </div><!-- #primary .content-area -->

    <?php

        /**
         *  Adding dokan_dashboard_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
        ?>

</div><!-- .dokan-dashboard-wrap -->
<script>
    window.addEventListener("load", (event) => {
        jQuery('.active.dashboard').removeClass('active')
        jQuery('.dokan-media').addClass('active')

        var mediaFrame;
        $('#open-media-library').on('click', function(e) {
            e.preventDefault();

            // If the media frame already exists, reopen it.
            if (mediaFrame) {
                mediaFrame.open();
                return;
            }

            // Create a new media frame
            mediaFrame = wp.media({
                title: 'Select Media',
                button: {
                    text: 'Insert Media'
                },
                multiple: true
            });

            // Finally, open the modal on click
            mediaFrame.open();
        });
        
    });

</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>