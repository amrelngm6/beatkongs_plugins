<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
use WeDevs\Dokan\ProductCategory\Helper;
global $beatsErrors, $beatsSucess;

$beatId =  $_GET['beat_id'] ?? 0;

$post = isset($_GET['beat_id']) ? get_post( $beatId, ARRAY_A ) : null; 
$postMeta = get_metadata( 'post', $beatId);
$selectedCategory = wp_get_post_terms( $beatId, 'category');
$selectedStation = wp_get_post_terms( $beatId, 'station');
$selectedMoods = wp_get_post_terms( $beatId, 'mood');
$selectedTags = wp_get_post_terms( $beatId, 'tag');
// print_r($post);
$beatMP3Id = $postMeta['beat_mp3'][0] ?? 0;
$beatMP3Url = $postMeta['beat_mp3_url'][0] ?? '';
$beatMP3 = wp_get_attachment_url($beatMP3Id);



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
    <h4 class="entry-title">
        <?php
            esc_html_e( 'Free Beat', 'dokan-lite' );
        ?>

        <?php if ( $post->post_status === 'publish' ) : ?>
            <span class="dokan-right">
                <a class="dokan-btn dokan-btn-theme dokan-btn-sm" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" target="_blank"><?php esc_html_e( 'View Beat', 'dokan-lite' ); ?></a>
            </span>
        <?php endif; ?>

        <?php if ( $_visibility === 'hidden' ) : ?>
            <span class="dokan-right dokan-label dokan-label-default dokan-product-hidden-label"><i class="far fa-eye-slash"></i> <?php esc_html_e( 'Hidden', 'dokan-lite' ); ?></span>
        <?php endif; ?>
    </h4>
</header><!-- .entry-header -->

<div class="product-edit-new-container Beat-edit-container">
    <?php if ( $beatsErrors ) : ?>
        <div class="dokan-alert dokan-alert-danger">
            <a class="dokan-close" data-dismiss="alert">&times;</a>

            <?php foreach ( $beatsErrors as $error ) : ?>
                <strong><?php esc_html_e( 'Error!', 'dokan-lite' ); ?></strong> <?php echo esc_html( $error ); ?>.<br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ( isset( $_GET['message'] ) && $_GET['message'] === 'success' ) : ?>
        <div class="dokan-message">
            <button type="button" class="dokan-close" data-dismiss="alert">&times;</button>
            <strong><?php esc_html_e( 'Success!', 'dokan-lite' ); ?></strong> <?php esc_html_e( 'The Beat has been saved successfully.', 'dokan-lite' ); ?>

            <?php if ( $post->post_status === 'publish' ) : ?>
                <a href="<?php echo esc_url( get_permalink( $beatId ) ); ?>" target="_blank"><?php esc_html_e( 'View Beat &rarr;', 'dokan-lite' ); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ( apply_filters( 'dokan_can_post', true ) ) : ?>
        <?php if ( dokan_is_seller_enabled( get_current_user_id() ) ) : ?>
            <form class="dokan-product-edit-form" role="form" method="post" id="post">
                <input type="hidden" value="upload_beat" name="upload_beat" />
                <?php wp_nonce_field(basename(__FILE__), 'beat_nonce'); ?>

                <div class="dokan-form-top-area">

                    <div class="content-half-part dokan-product-meta">

                        <div id="dokan-product-title-area" class="dokan-form-group">
                            <input type="hidden" name="beat_id" id="dokan-beat-id" value="<?php echo esc_attr( $beatId ); ?>"/>

                            <label for="beat_title" class="form-label"><?php esc_html_e( 'Title', 'dokan-lite' ); ?></label>
                            <?php
                            dokan_post_input_box(
                                $beatId,
                                'beat_title',
                                [
                                    'placeholder' => __( 'Beat name..', 'dokan-lite' ),
                                    'value'       => $post['post_title'] ?? '',
                                ]
                            );
                            ?>
                            <div class="dokan-product-title-alert dokan-hide">
                                <?php esc_html_e( 'Please enter Beat title!', 'dokan-lite' ); ?>
                            </div>

                            <div id="edit-slug-box" class="hide-if-no-js"></div>
                            <?php wp_nonce_field( 'samplepermalink', 'samplepermalinknonce', false ); ?>
                        </div>

                        <?php $beat_types = apply_filters('default_beat_types', 'free'); ?>

                        <div class="dokan-form-group">
                            <label for="beat_type" class="form-label"><?php esc_html_e( 'Beat Type', 'dokan-lite' ); ?> <i class="fas fa-question-circle tips" aria-hidden="true" data-title="<?php esc_html_e( 'Choose Variable if your Beat has multiple attributes - like sizes, colors, quality etc', 'dokan-lite' ); ?>"></i></label>
                            <select name="beat_type" class="dokan-form-control" id="beat_type">
                                <?php foreach ( $beat_types as $key => $value ) : ?>
                                    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $post->post_type ?? 'free', $key ); ?>><?php echo esc_html( $value ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="dokan-form-group">
                            
                            <label for="bpm" class="form-label"><?php esc_html_e( 'BPM', 'dokan-lite' ); ?></label>
                            <?php
                            dokan_post_input_box(
                                $beatId,
                                'bpm',
                                [
                                    'type'        => 'number',
                                    'min'         => 0,
                                    'max'         => 300,
                                    'placeholder' => __( 'BPM (Beats per minute)..', 'dokan-lite' ),
                                    'value'       => $postMeta['bpm'][0] ?? '',
                                ]
                            );
                            ?>
                        </div>

                        <div class="flex  open-modal cursor-pointer" id="open-category-modal" data-modal="#fbu-category-modal" data-text="#fbu-category-text" data-input="#fbu-category">
                            <div  class="w-full dokan-form-group dokan-select-product-category dokan-category-open-modal" data-dokansclevel="0"  id="fbu-category-g">
                                <label for="fbu-category" class="form-label"><?php esc_html_e( 'Category', 'dokan-lite' ); ?></label>
                                <div id="dokan_product_cat_res" class="dokan-select-product-category-title dokan-ssct-level-0"><span class="dokan-selected-category-product dokan-cat-selected text-sm font-semibold" id="fbu-category-text"><span><?php echo $selectedCategory[0]->name ?? 'Select Genre'; ?></span></span></div>
                            </div>
                            <div  class="w-full " >
                                <span class="dokan-select-product-category-icon"><i class="fas fa-edit"></i></span>
                            </div>
                            <input type="hidden" id="fbu-category" value="<?php echo  $selectedCategory[0]->term_id; ?>" name="beat_category" readonly required>
                        </div>
                        
                        <div class="flex  open-modal cursor-pointer" data-dokansclevel="0"  id="open-station-modal" data-modal="#fbu-station-modal" data-text="#fbu-station-text" data-input="#fbu-station">
                            <div  class="w-full dokan-form-group dokan-select-product-category dokan-category-open-modal" data-dokansclevel="0"  id="fbu-stations-g">
                                <label for="fbu-station" class="form-label"><?php esc_html_e( 'Station', 'dokan-lite' ); ?></label>
                                <div id="dokan_product_cat_res" class="dokan-select-product-category-title dokan-ssct-level-0"><span class="dokan-selected-category-product dokan-cat-selected text-sm font-semibold" id="fbu-station-text"><span><?php echo $selectedStation[0]->name ?? 'Select station'; ?></span></span></div>
                            </div>
                            <div  class="w-full">
                                <span class="dokan-select-product-category-icon"><i class="fas fa-edit"></i></span>
                            </div>
                            <input type="hidden" id="fbu-station" name="beat_station" value="<?php echo $selectedStation[0]->term_id ?? 0; ?>" readonly required>
                        </div>
                        
                        <div class="dokan-form-group">
                            <label for="product_moods_edit" class="form-label"><?php esc_html_e( 'Moods', 'dokan-lite' ); ?></label>
                            <input name='beat_moods' value="<?php echo implode(',', array_column($selectedMoods, 'name')) ; ?>" placeholder='Choose moods...'>
                        </div>

                        <div class="dokan-form-group">
                            <label for="product_tag_edit" class="form-label"><?php esc_html_e( 'Tags', 'dokan-lite' ); ?></label>
                            <input name='beat_tags' value="<?php echo implode(',', array_column($selectedTags, 'name')) ; ?>" placeholder='Choose tags...'>
                        </div>

                        <div >
                            <div  >
                                <label for="product_tag_edit" class="form-label"><?php esc_html_e( 'Downloadable files', 'dokan-lite' ); ?></label>

                                <input type="hidden" name="beat_mp3" id="mp3_upload_input" value="<?php echo esc_attr( $beatMP3Id ); ?>" class="regular-text" />
                                <div id="upload-mp3-demo">
                                    <?php if ($beatMP3Id) : ?>
                                        <audio controls src="<?php echo $beatMP3; ?>" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex w-full">
                                
                                <div class="w-full" id="mp3_media_manager" data-btn="" data-input="#mp3_upload_input" data-preview="#upload-mp3-demo" >
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <a href="#" class="dokan-feat-image-btn btn btn-sm"><?php esc_html_e( 'Upload MP3 with BeatTags', 'dokan-lite' ); ?></a>
                                </div>

                                <label style="padding:10px" for="product_tag_edit" class="form-label"><?php esc_html_e( 'OR', 'dokan-lite' ); ?></label>
            
                                <div class="flex w-full">
                                
                                    <label for="beat_mp3_url" style=" width: 100px; padding: 10px; " class="form-label"><?php esc_html_e( 'Beat URL', 'dokan-lite' ); ?></label>
                                    <?php
                                    dokan_post_input_box(
                                        $beatId,
                                        'beat_mp3_url',
                                        [
                                            'placeholder' => __( 'Beat external link..', 'dokan-lite' ),
                                            'value'       => $beatMP3Url ?? '',
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>

                        
                        <div class="dokan-product-short-description">
                            <label for="post_excerpt" class="form-label"><?php esc_html_e( 'Short Description', 'dokan-lite' ); ?></label>
                            <?php
                            wp_editor(
                                $post['post_excerpt'] ?? '',
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
                                $post['post_content'] ?? '',
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
                        
                        <?php echo do_action('dokan_load_others_fields'); ?>

                    </div><!-- .content-half-part -->

                    <div class="content-half-part featured-image">

                        <div class="dokan-feat-image-upload dokan-new-product-featured-img">
                            <?php
                            $wrap_class        = ' dokan-hide';
                            $instruction_class = '';
                            $image_id     = 0;

                            if ( has_post_thumbnail( $beatId ) ) {
                                $wrap_class        = '';
                                $instruction_class = ' dokan-hide';
                                $image_id     = get_post_thumbnail_id( $beatId );
                                $image     = get_the_post_thumbnail_url( $beatId );
                            }
                            ?>

                            <input type="hidden" name="beat_picture" id="beat_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
                            
                            <div class="image-wrap<?php echo esc_attr( $wrap_class ); ?>">
                                <img id="beat-preview-image" height="" width="" src="<?php echo $image ?? ''; ?>" alt="">
                            </div>
                            <div id="picture_media_manager">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <a href="#" class="dokan-feat-image-btn btn btn-sm"><?php esc_html_e( 'Upload a Beat cover image', 'dokan-lite' ); ?></a>
                            </div>
                        </div><!-- .dokan-feat-image-upload -->

                            <div class="dokan-product-gallery">
                                <div class="dokan-side-body" id="dokan-product-images">
                                    <div id="product_images_container">
                                        <ul class="product_images dokan-clearfix">
                                            <?php
                                            $product_images = get_post_meta( $beatId, '_product_image_gallery', true );
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

                <?php do_action( 'dokan_new_product_form', $post, $beatId ); ?>

                <input type="hidden" name="dokan_product_id" id="dokan_product_id" value="<?php echo esc_attr( $beatId ); ?>" />
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
        do_action( 'wp_enqueue_scripts' );

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

    var input = document.querySelector('input[name=beat_tags]');
    new Tagify(input, {
        maxTags: 3,
        whitelist: availableTags,
        enforceWhitelist: true,  // Only allow tags from the whitelist
        dropdown: {
            enabled: 1  // Suggest tags after the first character typed
        }
    });


    var availableMoods = <?php echo json_encode(array_column($moods, 'name')); ?>;

    var input = document.querySelector('input[name=beat_moods]');
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
