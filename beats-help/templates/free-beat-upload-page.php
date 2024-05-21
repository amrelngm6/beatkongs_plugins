<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
use WeDevs\Dokan\ProductCategory\Helper;
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


<div class="dokan-dashboard-content dokan-product-edit">

<?php
/**
 * Action hook to fire inside Beat content area before
 *
 *  @since 2.4
 */
do_action( 'dokan_product_content_inside_area_before' );

if ( $new_product ) {
    do_action( 'dokan_new_product_before_product_area' );
}
?>

<header class="dokan-dashboard-header dokan-clearfix">
    <h1 class="entry-title">
        <?php
            esc_html_e( 'Free Beat', 'dokan-lite' );
        ?>
        <span class="dokan-label <?php echo esc_attr( dokan_get_post_status_label_class( $post->post_status ) ); ?> dokan-product-status-label">
            <?php echo esc_html( dokan_get_post_status( $post->post_status ) ); ?>
        </span>

        <?php if ( $post->post_status === 'publish' ) : ?>
            <span class="dokan-right">
                <a class="dokan-btn dokan-btn-theme dokan-btn-sm" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" target="_blank"><?php esc_html_e( 'View Beat', 'dokan-lite' ); ?></a>
            </span>
        <?php endif; ?>

        <?php if ( $_visibility === 'hidden' ) : ?>
            <span class="dokan-right dokan-label dokan-label-default dokan-product-hidden-label"><i class="far fa-eye-slash"></i> <?php esc_html_e( 'Hidden', 'dokan-lite' ); ?></span>
        <?php endif; ?>
    </h1>
</header><!-- .entry-header -->

<div class="product-edit-new-container Beat-edit-container">
    <?php if ( dokan()->dashboard->templates->products->has_errors() ) : ?>
        <div class="dokan-alert dokan-alert-danger">
            <a class="dokan-close" data-dismiss="alert">&times;</a>

            <?php foreach ( dokan()->dashboard->templates->products->get_errors() as $error ) : ?>
                <strong><?php esc_html_e( 'Error!', 'dokan-lite' ); ?></strong> <?php echo esc_html( $error ); ?>.<br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ( isset( $_GET['message'] ) && $_GET['message'] === 'success' ) : ?>
        <div class="dokan-message">
            <button type="button" class="dokan-close" data-dismiss="alert">&times;</button>
            <strong><?php esc_html_e( 'Success!', 'dokan-lite' ); ?></strong> <?php esc_html_e( 'The Beat has been saved successfully.', 'dokan-lite' ); ?>

            <?php if ( $post->post_status === 'publish' ) : ?>
                <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" target="_blank"><?php esc_html_e( 'View Beat &rarr;', 'dokan-lite' ); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ( apply_filters( 'dokan_can_post', true ) ) : ?>
        <?php if ( dokan_is_seller_enabled( get_current_user_id() ) ) : ?>
            <form class="dokan-product-edit-form" role="form" method="post" id="post">

                <?php do_action( 'dokan_product_data_panel_tabs' ); ?>
                <?php do_action( 'dokan_product_edit_before_main' ); ?>

                <div class="dokan-form-top-area">

                    <div class="content-half-part dokan-product-meta">

                        <div id="dokan-product-title-area" class="dokan-form-group">
                            <input type="hidden" name="dokan_product_id" id="dokan-edit-product-id" value="<?php echo esc_attr( $post_id ); ?>"/>

                            <label for="post_title" class="form-label"><?php esc_html_e( 'Title', 'dokan-lite' ); ?></label>
                            <?php
                            dokan_post_input_box(
                                $post_id,
                                'post_title',
                                [
                                    'placeholder' => __( 'Beat name..', 'dokan-lite' ),
                                    'value'       => $post_title,
                                ]
                            );
                            ?>
                            <div class="dokan-product-title-alert dokan-hide">
                                <?php esc_html_e( 'Please enter Beat title!', 'dokan-lite' ); ?>
                            </div>

                            <div id="edit-slug-box" class="hide-if-no-js"></div>
                            <?php wp_nonce_field( 'samplepermalink', 'samplepermalinknonce', false ); ?>
                            <input type="hidden" name="editable-post-name" class="dokan-hide" id="editable-post-name-full-dokan">
                            <input type="hidden" value="<?php echo esc_attr( $post->post_name ); ?>" name="edited-post-name" class="dokan-hide" id="edited-post-name-dokan">
                        </div>

                        <?php $product_types = apply_filters( 'dokan_product_types', [ 'simple' => __( 'Simple', 'dokan-lite' ) ] ); ?>

                        <?php if ( is_array( $product_types ) ) : ?>
                            <?php if ( count( $product_types ) === 1 && array_key_exists( 'simple', $product_types ) ) : ?>
                                <input type="hidden" id="product_type" name="product_type" value="simple">
                            <?php else : ?>
                                <div class="dokan-form-group">
                                    <label for="product_type" class="form-label"><?php esc_html_e( 'Beat Type', 'dokan-lite' ); ?> <i class="fas fa-question-circle tips" aria-hidden="true" data-title="<?php esc_html_e( 'Choose Variable if your Beat has multiple attributes - like sizes, colors, quality etc', 'dokan-lite' ); ?>"></i></label>
                                    <select name="product_type" class="dokan-form-control" id="product_type">
                                        <?php foreach ( $product_types as $key => $value ) : ?>
                                            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $product_type, $key ); ?>><?php echo esc_html( $value ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="flex  open-modal cursor-pointer" id="open-category-modal" data-modal="#fbu-category-modal" data-text="#fbu-category-text" data-input="#fbu-category">
                            <div  class="w-full dokan-form-group dokan-select-product-category dokan-category-open-modal" data-dokansclevel="0"  id="fbu-category-g">
                                <label for="fbu-category" class="font-semibold form-label">Category:</label>
                                <div id="dokan_product_cat_res" class="dokan-select-product-category-title dokan-ssct-level-0"><span class="dokan-selected-category-product dokan-cat-selected" id="fbu-category-text"><span>Select Genre</span></span></div>
                            </div>
                            <div  class="w-full " >
                                <span class="dokan-select-product-category-icon"><i class="fas fa-edit"></i></span>
                            </div>
                            <input type="hidden" id="fbu-category" name="fbu-category" readonly required>
                        </div>
                        
                        <div class="flex  open-modal cursor-pointer" data-dokansclevel="0"  id="open-station-modal" data-modal="#fbu-station-modal" data-text="#fbu-station-text" data-input="#fbu-station">
                            <div  class="w-full dokan-form-group dokan-select-product-category dokan-category-open-modal" data-dokansclevel="0"  id="fbu-stations-g">
                                <label for="fbu-station" class="font-semibold form-label">Station:</label>
                                <div id="dokan_product_cat_res" class="dokan-select-product-category-title dokan-ssct-level-0"><span class="dokan-selected-category-product dokan-cat-selected" id="fbu-station-text"><span>Select station</span></span></div>
                            </div>
                            <div  class="w-full">
                                <span class="dokan-select-product-category-icon"><i class="fas fa-edit"></i></span>
                            </div>
                            <input type="hidden" id="fbu-station" name="fbu-stations" readonly required>
                        </div>
                        
                        <div class="dokan-form-group">
                            <label for="product_moods_edit" class="form-label"><?php esc_html_e( 'Moods', 'dokan-lite' ); ?></label>
                            <input name='moods' placeholder='Choose moods...'>
                        </div>

                        <div class="dokan-form-group">
                            <label for="product_tag_edit" class="form-label"><?php esc_html_e( 'Tags', 'dokan-lite' ); ?></label>
                            <input name='tags' placeholder='Choose tags...'>
                        </div>
                        <?php
                        $image_id = get_option( 'myprefix_image_id' );
                        if( intval( $image_id ) > 0 ) {
                            // Change with the image size you want to use
                            $image = wp_get_attachment_image( $image_id, 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
                        } else {
                            // Some default image
                            $image = '<img id="myprefix-preview-image" src="https://some.default.image.jpg" />';
                        }
                        
                          echo $image; ?>
                         <input type="hidden" name="myprefix_image_id" id="myprefix_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
                         <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'mytextdomain' ); ?>" id="myprefix_media_manager"/>
                         
                        <?php do_action( 'dokan_product_edit_after_product_tags', $post, $post_id ); ?>
                    </div><!-- .content-half-part -->

                    <div class="content-half-part featured-image">

                        <div class="dokan-feat-image-upload dokan-new-product-featured-img">
                            <?php
                            $wrap_class        = ' dokan-hide';
                            $instruction_class = '';
                            $feat_image_id     = 0;

                            if ( has_post_thumbnail( $post_id ) ) {
                                $wrap_class        = '';
                                $instruction_class = ' dokan-hide';
                                $feat_image_id     = get_post_thumbnail_id( $post_id );
                            }
                            ?>

                            <div class="instruction-inside<?php echo esc_attr( $instruction_class ); ?>">
                                <input type="hidden" name="feat_image_id" class="dokan-feat-image-id" value="<?php echo esc_attr( $feat_image_id ); ?>">

                                <i class="fas fa-cloud-upload-alt"></i>
                                <a href="#" class="dokan-feat-image-btn btn btn-sm"><?php esc_html_e( 'Upload a Beat cover image', 'dokan-lite' ); ?></a>
                            </div>

                            <div class="image-wrap<?php echo esc_attr( $wrap_class ); ?>">
                                <a class="close dokan-remove-feat-image">&times;</a>
                                <?php if ( $feat_image_id ) : ?>
                                    <?php
                                    echo get_the_post_thumbnail(
                                        $post_id,
                                        apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ),
                                        [
                                            'height' => '',
                                            'width'  => '',
                                        ]
                                    );
                                    ?>
                                <?php else : ?>
                                    <img height="" width="" src="" alt="">
                                <?php endif; ?>
                            </div>
                        </div><!-- .dokan-feat-image-upload -->

                            <div class="dokan-product-gallery">
                                <div class="dokan-side-body" id="dokan-product-images">
                                    <div id="product_images_container">
                                        <ul class="product_images dokan-clearfix">
                                            <?php
                                            $product_images = get_post_meta( $post_id, '_product_image_gallery', true );
                                            $gallery = explode( ',', $product_images );

                                            if ( $gallery ) :
                                                foreach ( $gallery as $image_id ) :
                                                    if ( empty( $image_id ) ) :
                                                        continue;
                                                    endif;

                                                    $attachment_image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                                                    ?>
                                                    <li class="image" data-attachment_id="<?php echo esc_attr( $image_id ); ?>">
                                                        <img src="<?php echo esc_url( $attachment_image[0] ); ?>" alt="">
                                                        <a href="#" class="action-delete" title="<?php esc_attr_e( 'Delete image', 'dokan-lite' ); ?>">&times;</a>
                                                    </li>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>
                                            <li class="add-image add-product-images tips" data-title="<?php esc_html_e( 'Add gallery image', 'dokan-lite' ); ?>">
                                                <a href="#" class="add-product-images"><i class="fas fa-plus" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>

                                        <input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?php echo esc_attr( $product_images ); ?>">
                                    </div>
                                </div>
                            </div> <!-- .product-gallery -->

                        <?php do_action( 'dokan_product_gallery_image_count' ); ?>

                    </div><!-- .content-half-part -->
                </div><!-- .dokan-form-top-area -->

                <?php do_action( 'dokan_new_product_form', $post, $post_id ); ?>

                <input type="hidden" name="dokan_product_id" id="dokan_product_id" value="<?php echo esc_attr( $post_id ); ?>" />
                <!--hidden input for Firefox issue-->
                <input type="hidden" name="dokan_update_product" value="<?php esc_attr_e( 'Save Beat', 'dokan-lite' ); ?>"/>
                <input type="submit" name="dokan_update_product" id="publish" class="dokan-btn dokan-btn-theme dokan-btn-lg dokan-right" value="<?php esc_attr_e( 'Save Beat', 'dokan-lite' ); ?>"/>
                <div class="dokan-clearfix"></div>
            </form>
        <?php else : ?>
            <div class="dokan-alert dokan-alert">
                <?php echo esc_html( dokan_seller_not_enabled_notice() ); ?>
            </div>
        <?php endif; ?>

        <?php echo do_action('dokan_load_category'); ?>
        <?php echo do_action('dokan_load_station'); ?>
             
    <?php else : ?>

        <?php do_action( 'dokan_can_post_notice' ); ?>

    <?php endif; ?>
    </div> <!-- #primary .content-area -->

</div>

        <?php
        /**
         * Action took to fire inside Beat content after.
         *
         *  @since 2.4
         */
        do_action( 'dokan_product_content_inside_area_after' );

        /**
         *  Adding dokan_dashboard_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
        
        
        ?>
        <!-- Modal Popup for Category Selection -->
        

        
    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
<?php
$tags = get_terms(array(
    'taxonomy' => 'tag',
    'hide_empty' => false,
));

$moods = get_terms(array(
    'taxonomy' => 'mood',
    'hide_empty' => false,
));
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
    // Define the available tags
    var availableTags = <?php echo json_encode(array_column($tags, 'name')); ?>;

    var input = document.querySelector('input[name=tags]');
    new Tagify(input, {
        maxTags: 3,
        whitelist: availableTags,
        enforceWhitelist: true,  // Only allow tags from the whitelist
        dropdown: {
            enabled: 1  // Suggest tags after the first character typed
        }
    });


    var availableMoods = <?php echo json_encode(array_column($moods, 'name')); ?>;

    var input = document.querySelector('input[name=moods]');
    new Tagify(input, {
        maxTags: 3,
        whitelist: availableMoods,
        enforceWhitelist: true,  // Only allow tags from the whitelist
        dropdown: {
            enabled: 1  // Suggest tags after the first character typed
        }
    });

</script>
<?php get_footer(); ?>
