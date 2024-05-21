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


                        
                        <div class="dokan-form-group">
                        <?php
                            do_action( 'dokan_product_edit_after_pricing', $post, $post_id );

                            $data = Helper::get_saved_products_category( $post_id );
                            $data['from'] = 'edit_product';

                            dokan_get_template_part( 'products/dokan-category-header-ui', '', $data );
                        ?>
                        </div>

                        <div class="dokan-form-group">
                            <label for="product_tag_edit" class="form-label"><?php esc_html_e( 'Tags', 'dokan-lite' ); ?></label>
                            <?php
                            $terms            = wp_get_post_terms( $post_id, 'product_tag', array( 'fields' => 'all' ) );
                            $can_create_tags  = dokan_get_option( 'product_vendors_can_create_tags', 'dokan_selling' );
                            $tags_placeholder = 'on' === $can_create_tags ? __( 'Select tags/Add tags', 'dokan-lite' ) : __( 'Select Beat tags', 'dokan-lite' );

                            $drop_down_tags = array(
                                'hide_empty' => 0,
                            );
                            ?>
                            <select multiple="multiple" id="product_tag_edit" name="product_tag[]" class="product_tag_search dokan-form-control" data-placeholder="<?php echo esc_attr( $tags_placeholder ); ?>">
                                <?php if ( ! empty( $terms ) ) : ?>
                                    <?php foreach ( $terms as $tax_term ) : ?>
                                        <option value="<?php echo esc_attr( $tax_term->term_id ); ?>" selected="selected" ><?php echo esc_html( $tax_term->name ); ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>

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

                <div class="dokan-product-short-description">
                    <label for="post_excerpt" class="form-label"><?php esc_html_e( 'Short Description', 'dokan-lite' ); ?></label>
                    <?php
                    wp_editor(
                        $post_excerpt,
                        'post_excerpt',
                        apply_filters(
                            'dokan_product_short_description',
                            [
                                'editor_height' => 50,
                                'quicktags'     => true,
                                'media_buttons' => false,
                                'teeny'         => false,
                                'editor_class'  => 'post_excerpt',
                            ]
                        )
                    );
                    ?>
                </div>

                <div class="dokan-product-description">
                    <label for="post_content" class="form-label"><?php esc_html_e( 'Description', 'dokan-lite' ); ?></label>
                    <?php
                    wp_editor(
                        $post_content,
                        'post_content',
                        apply_filters(
                            'dokan_product_description',
                            [
                                'editor_height' => 50,
                                'quicktags'     => true,
                                'media_buttons' => false,
                                'teeny'         => false,
                                'editor_class'  => 'post_content',
                            ]
                        )
                    );
                    ?>
                </div>

                <?php do_action( 'dokan_new_product_form', $post, $post_id ); ?>
                <?php do_action( 'dokan_product_edit_after_main', $post, $post_id ); ?>

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

    <?php else : ?>

        <?php do_action( 'dokan_can_post_notice' ); ?>

    <?php endif; ?>
</div> <!-- #primary .content-area -->

<?php
/**
 * Action took to fire inside Beat content after.
 *
 *  @since 2.4
 */
do_action( 'dokan_product_content_inside_area_after' );
?>
</div>

        <?php

        /**
         *  Adding dokan_dashboard_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
        ?>

    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
<?php get_footer(); ?>
