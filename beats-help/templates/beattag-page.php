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

    <form class="dokan-beat-license-edit-form" role="form" method="post" id="post">
        <article class="dokan-product-listing-area bg-white">
            
            <div class="product-listing-top dokan-clearfix flex">
                <h4 class="w-full">Beattag</h4>
                <hr />
            </div>
            <div class="flex w-full">
                <?php wp_nonce_field(basename(__FILE__), 'beat_nonce'); ?>
                <input type="hidden" name="beat_beattag_edit" value="true" />
                <input type="hidden" name="author_id" value="<?php echo get_current_user_id(); ?>" />
                <input type="hidden" id="beattag_file_input_id" name="beattag_file_id" value="<?php echo get_user_meta(get_current_user_id(), 'beattag_file_id', true); ?>" />
                <input type="hidden" id="beattag_file_input_path" name="beattag_file" value="<?php echo get_user_meta(get_current_user_id(), 'beattag_file', true); ?>" />
                <input type="hidden" id="beattag_file_name" name="beattag_filename" value="<?php echo get_user_meta(get_current_user_id(), 'beattag_filename', true); ?>" />
                <div class="w-48"> Watermark </div>
                <div> 
                    <button class="cursor-pointer " data-preview="#beattag-file-demo" id="open-media-library"> Add or Upload File</button>
                    <p><small>You can choose to play beattag every X seconds.</small></p>
                    <p>
                        File: <span id="file-name"><?php echo get_user_meta(get_current_user_id(), 'beattag_file', true); ?></span>
                        ( <a id="file-download"> Download </a> / <a id="file-remove">Remove</a>)
                    </p>
                    <div id="beattag-file-demo"></div>
                </div>
            </div>
            <hr />
            <div class="flex w-full">
                <div class="w-48"> Loop watermark every </div>
                <div> 
                    <input name="beattag_time" type="range" min="1" max="20" value="<?php echo get_user_meta(get_current_user_id(), 'beattag_time', true); ?>" />
                    <div class="w-full flex">
                        <span class="w-full">0</span>
                        <span>20</span>
                    </div>
                </div>
            </div>
            <input type="submit" name="dokan_update_beattag" id="publish" class="dokan-btn dokan-btn-theme dokan-btn-lg dokan-right" value="<?php esc_attr_e( 'Update setting', 'dokan-lite' ); ?>"/>

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div id="user-media-library">
                        
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </article>
    </form>
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
        jQuery('.beattag').addClass('active')

        var mediaFrame;
        $('#open-media-library').on('click', function(e) {
            e.preventDefault();
            var previewElement = $(this).attr('data-preview')

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

            mediaFrame.on('close',function() {
                // On close, get selections and save to the hidden input
                // plus other AJAX stuff to refresh the image preview
                var selection =  mediaFrame.state().get('selection');
                var name = '';
                var gallery_ids = 0;
                var selected = 0;
                var i = 0;
                selection.each(function(attachment) {
                    selected = attachment.attributes.url;
                    name = attachment.attributes.filename;
                    gallery_ids = attachment['id'];
                i++;
                });
                if(gallery_ids === 0) return true;//if closed withput selecting an image
                selected ? jQuery(previewElement).html( $('<audio src="'+selected+'"  controls />')) : '';

                // jQuery('#beat-preview-image').attr('src', selected );
                jQuery('#file-download').attr('href', selected);
                jQuery('#file-name').text(name);
                jQuery('#beattag_file_name').val(name);
                jQuery('#beattag_file_input_id').val(gallery_ids);
                jQuery('#beattag_file_input_path').val(selected);
            });

            mediaFrame.on('open',function() {
                // // On open, get the id from the hidden input
                // // and select the appropiate images in the media manager
                // var selection =  mediaFrame.state().get('selection');
                // var ids = jQuery('input#beat_image_id').val().split(',');
                // ids.forEach(function(id) {
                //     var attachment = wp.media.attachment(id);
                //     attachment.fetch();
                //     selection.add( attachment ? [ attachment ] : [] );
                // });

            });

            // Finally, open the modal on click
            mediaFrame.open();
        });
        
    });

</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>