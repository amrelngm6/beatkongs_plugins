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

        <article class="dokan-product-listing-area">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div id="user-media-library">
                        <button id="open-media-library">Open Media Library</button>
                        <div id="selected-media"></div>
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

            // When a file is selected, run a callback.
            mediaFrame.on('select', function() {
                var attachments = mediaFrame.state().get('selection').toJSON();
                var mediaHtml = '';
                attachments.forEach(function(attachment) {
                    var mediaUrl = attachment.url;
                    var mediaTitle = attachment.title;

                    if (attachment.type === 'image') {
                        mediaHtml += '<div class="media-item">';
                        mediaHtml += '<img src="' + mediaUrl + '" alt="' + mediaTitle + '" style="max-width:100%; height:auto;">';
                        mediaHtml += '<h3>' + mediaTitle + '</h3>';
                        mediaHtml += '</div>';
                    } else {
                        mediaHtml += '<div class="media-item">';
                        mediaHtml += '<a href="' + mediaUrl + '" target="_blank">' + mediaTitle + '</a>';
                        mediaHtml += '</div>';
                    }
                });

                $('#selected-media').html(mediaHtml);
            });

            // Finally, open the modal on click
            mediaFrame.open();
        });
        
    });

</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>