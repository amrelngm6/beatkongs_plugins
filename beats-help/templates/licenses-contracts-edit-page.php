<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include plugin_dir_path(__FILE__) . '../includes/Class/BeatLicense.php';

$categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
));

$defaultLicenseId =  $_GET['license_post_id'] ?? 0;

$defaultPost = isset($_GET['license_post_id']) ? get_post( $defaultLicenseId, ARRAY_A ) : null; 
$defaultPostMeta = isset($_GET['license_post_id']) ? get_metadata( 'post', $defaultLicenseId) : null;

$authorPost = [];

$BeatLicense = new BeatLicense($defaultPost, $authorPost);
$BeatLicense->defaultValue = $defaultPost;
$BeatLicense->defaultMetaValue = $defaultPostMeta;
$BeatLicense->authorValue = $authorPost;
// $post = isset($_GET['license_id']) ? get_post( $beatLicenseId, ARRAY_A ) : null; 
// $postMeta = isset($_GET['license_id']) ? get_metadata( 'post', $beatLicenseId) : null;
// print_r($post);
// print_r($postMeta);

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
            do_action( 'dokan_before_listing_product' );
            ?>

        <article class="dokan-product-listing-area">



            <div class="product-listing-top dokan-clearfix flex">
                <h4 class="w-full">Licenses & Contracts</h4>
            </div>


            <div id="cmb2_usage_terms_box" class="postbox  license-box ">
                <div class="postbox-header">
                    <h5 class="hndle">What is included in the license</h5>
                </div>
                
                <div class="inside">
                    <form class="dokan-beat-license-edit-form" role="form" method="post" id="post">
                        <input type="hidden" value="beat_license_edit" name="true" />
                        <?php wp_nonce_field(basename(__FILE__), 'beats_license_nonce'); ?>
                        <!-- Begin CMB2 Fields -->
                        <div class="cmb2-wrap form-table">
                            <div id="cmb2-metabox-cmb2_usage_terms_box" class="container cmb2-metabox cmb-field-list">
                                <div class="cmb-row cmb-type-multicheck cmb2-id-usageterms-filetypes" data-fieldtype="multicheck">
                                    <div class="cmb-th">
                                        <label for="usageterms_filetypes">Files to Deliver when this license is Purchased</label>
                                    </div>
                                    <div class="cmb-td">
                                        <ul class="cmb2-checkbox-list no-select-all cmb2-list">
                                            <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                    id="usageterms_filetypes1" value="mp3" />
                                                <label for="usageterms_filetypes1">MP3</label>
                                            </li>
                                            <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                    id="usageterms_filetypes2" value="wav" />
                                                <label for="usageterms_filetypes2">WAV</label></li>
                                            <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                    id="usageterms_filetypes3" value="stems" />
                                                <label for="usageterms_filetypes3">TRACK STEMS</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-medium cmb2-id-usageterms-producer-alias"
                                    data-fieldtype="text_medium">
                                    <div class="cmb-th">
                                        <label for="usageterms_producer_alias">Producer Name</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-medium" name="usageterms_producer_alias"
                                            id="usageterms_producer_alias" value="<?php echo $BeatLicense->getMetaValue('usageterms_producer_alias'); ?>" data-hash='3up4uvi8ld80' />
                                        <span class="cmb2-metabox-description">Enter the contract producer name</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-dist-copies"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_dist_copies">Number of distribution copies</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small" name="usageterms_num_dist_copies"
                                            id="usageterms_num_dist_copies" value="1000" data-hash='s0rt0tpsocc0' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-audio-streams"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_audio_streams">Number of audio streams</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small" name="usageterms_num_audio_streams"
                                            id="usageterms_num_audio_streams" value="20000" data-hash='kpg1abrhmc40' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-radio-stations"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_radio_stations">Number of radio stations</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small" name="usageterms_num_radio_stations"
                                            id="usageterms_num_radio_stations" value="0" data-hash='5862dbtjru70' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-free-downloads"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_free_downloads">Number of free downloads</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small" name="usageterms_num_free_downloads"
                                            id="usageterms_num_free_downloads" value="0" data-hash='4scge97438m0' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-music-videos"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_music_videos">Number of music video</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small" name="usageterms_num_music_videos"
                                            id="usageterms_num_music_videos" value="1" data-hash='10rqbbvvv8d8' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-small cmb2-id-usageterms-num-monetized-video-streams"
                                    data-fieldtype="text_small">
                                    <div class="cmb-th">
                                        <label for="usageterms_num_monetized_video_streams">Number of video streams</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-small"
                                            name="usageterms_num_monetized_video_streams"
                                            id="usageterms_num_monetized_video_streams" value="20000"
                                            data-hash='7vvgjfuqn2v0' />
                                        <span class="cmb2-metabox-description">Enter a number or the word Unlimited</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-medium cmb2-id-usageterms-state"
                                    data-fieldtype="text_medium">
                                    <div class="cmb-th">
                                        <label for="usageterms_state">State or province</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-medium" name="usageterms_state"
                                            id="usageterms_state" value="New York" data-hash='4p1t3ak0uq70' />
                                        <span class="cmb2-metabox-description">Enter your state or province</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-text-medium cmb2-id-usageterms-country"
                                    data-fieldtype="text_medium">
                                    <div class="cmb-th">
                                        <label for="usageterms_country">Country</label>
                                    </div>
                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-medium" name="usageterms_country"
                                            id="usageterms_country" value="USA" data-hash='5rr7dqr93750' />
                                        <span class="cmb2-metabox-description">Enter your country name</span>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-select cmb2-id-usageterms-allow-profit-performances"
                                    data-fieldtype="select">
                                    <div class="cmb-th">
                                        <label for="usageterms_allow_profit_performances">Allow for profit live
                                            performances</label>
                                    </div>
                                    <div class="cmb-td">
                                        <select class="cmb2_select" name="usageterms_allow_profit_performances"
                                            id="usageterms_allow_profit_performances" data-hash='607o8fieck70'>
                                            <option value="">None</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" selected='selected'>No</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="cmb-row cmb-type-wysiwyg cmb2-id-usageterms-contract" data-fieldtype="wysiwyg">
                                    <div class="cmb-th">
                                        <label for="usageterms_contract">The Contract</label>
                                    </div>
                                    <div class="cmb-td">
                                                
                                        <div class="dokan-product-description">
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
                                        
                                    </div>
                                </div>
                                <div style="width:100%" class="cmb-row cmb-type-title cmb2-id-var-usageterms-build-your-contract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 style="margin: 0" class="cmb2-metabox-title" id="var-usageterms-build-your-contract"
                                            data-hash='66pu33jua620'>
                                            Use the variables below to build your contract</h5>
                                    </div>
                                </div>
                                <hr />
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-license srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-license" data-hash='h5o0nhpvqe40'>
                                            {LICENSE_NAME}</h5>
                                        <p class="cmb2-metabox-description">Name of this license</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-date srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-date" data-hash='1ajh8nab4deo'>
                                            {CONTRACT_DATE}
                                        </h5>
                                        <p class="cmb2-metabox-description">Date of the contract</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-fullname srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-fullname"
                                            data-hash='19o7bbk833q0'>
                                            {CUSTOMER_FULLNAME}</h5>
                                        <p class="cmb2-metabox-description">Customer fullname</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-email srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-email" data-hash='1k4048999tjg'>
                                            {CUSTOMER_EMAIL}</h5>
                                        <p class="cmb2-metabox-description">Customer email address</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-address srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-address" data-hash='20mdfhgvas8g'>
                                            {CUSTOMER_ADDRESS}</h5>
                                        <p class="cmb2-metabox-description">Customer address</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-producer-alias srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-producer-alias"
                                            data-hash='6oqk6kstjv10'>
                                            {PRODUCER_ALIAS}</h5>
                                        <p class="cmb2-metabox-description">Producer Name</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-product-title srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-product-title"
                                            data-hash='43bs905ai060'>
                                            {PRODUCT_TITLE}</h5>
                                        <p class="cmb2-metabox-description">Title of the purchased product</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-performances-for-profit srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-performances-for-profit"
                                            data-hash='2sephuu45r9g'>{PERFORMANCES_FOR_PROFIT}</h5>
                                        <p class="cmb2-metabox-description">Allowed for profit live performance ?</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-radio-station srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-radio-station"
                                            data-hash='2o7aakqqnhk0'>
                                            {NUMBER_OF_RADIO_STATIONS}</h5>
                                        <p class="cmb2-metabox-description">Number of radio stations allowed</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-dist-copies srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-dist-copies"
                                            data-hash='2kupt6ioeda0'>
                                            {DISTRIBUTE_COPIES}</h5>
                                        <p class="cmb2-metabox-description">Number of distribution copies allowed</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-audiostreams srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-audiostreams"
                                            data-hash='1f6n7rom0r7g'>
                                            {AUDIO_STREAMS}</h5>
                                        <p class="cmb2-metabox-description">Number of audio streams allowed</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-musicvideosstreams srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-musicvideosstreams"
                                            data-hash='20095k2sdj80'>
                                            {MONETIZED_VIDEO_STREAMS_ALLOWED}</h5>
                                        <p class="cmb2-metabox-description">Number of monitized music videos streams allowed
                                        </p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-musicvideos srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-musicvideos"
                                            data-hash='2q1vj2lonji0'>
                                            {MONETIZED_MUSIC_VIDEOS}</h5>
                                        <p class="cmb2-metabox-description">Number of monitized music videos allowed</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-freedownloads srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-freedownloads"
                                            data-hash='3ug51mhbthg0'>
                                            {FREE_DOWNLOADS}</h5>
                                        <p class="cmb2-metabox-description">Number of free downloads allowed</p>

                                    </div>
                                </div>
                                <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-state srmp3-var-licensecontract"
                                    data-fieldtype="title">

                                    <div class="cmb-td">
                                        <h5 class="cmb2-metabox-title" id="var-usageterms-state" data-hash='3aojtdccl4s0'>
                                            {STATE_PROVINCE_COUNTRY}</h5>
                                        <p class="cmb2-metabox-description">States/Provinces and Country of the seller</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End CMB2 Fields -->
                    </form>
                </div>
            </div>
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
                do_action( 'dokan_after_listing_product' );
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
    jQuery('.dokan-beats').addClass('active')
});
</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>