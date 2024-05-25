<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


$categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
));

$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));

$tags = get_terms(array(
    'taxonomy' => 'tag',
    'hide_empty' => false,
));

$moods = get_terms(array(
    'taxonomy' => 'mood',
    'hide_empty' => false,
));

$bulk_statuses = [
    '0'     => __( 'Bulk Actions', 'dokan-lite' ),
    'delete' => __( 'Delete Permanently', 'dokan-lite' ),
];
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


            <div id="cmb2_usage_terms_box" class="postbox  cmb2-postbox">
                <div class="postbox-header">
                    <h2 class="hndle">What is included in the license</h2>
                    <div class="handle-actions hide-if-no-js"><button type="button" class="handle-order-higher"
                            aria-disabled="false"
                            aria-describedby="cmb2_usage_terms_box-handle-order-higher-description"><span
                                class="screen-reader-text">Move up</span><span class="order-higher-indicator"
                                aria-hidden="true"></span></button><span class="hidden"
                            id="cmb2_usage_terms_box-handle-order-higher-description">Move What is included in the
                            license box
                            up</span><button type="button" class="handle-order-lower" aria-disabled="false"
                            aria-describedby="cmb2_usage_terms_box-handle-order-lower-description"><span
                                class="screen-reader-text">Move down</span><span class="order-lower-indicator"
                                aria-hidden="true"></span></button><span class="hidden"
                            id="cmb2_usage_terms_box-handle-order-lower-description">Move What is included in the
                            license box
                            down</span><button type="button" class="handlediv" aria-expanded="true"><span
                                class="screen-reader-text">Toggle panel: What is included in the license</span><span
                                class="toggle-indicator" aria-hidden="true"></span></button></div>
                </div>
                <div class="inside">
                    <!-- Begin CMB2 Fields -->
                    <input type="hidden" id="nonce_CMB2phpcmb2_usage_terms_box" name="nonce_CMB2phpcmb2_usage_terms_box"
                        value="b76d838a5f" />
                    <div class="cmb2-wrap form-table">
                        <div id="cmb2-metabox-cmb2_usage_terms_box" class="cmb2-metabox cmb-field-list">
                            <div class="cmb-row cmb-type-multicheck cmb2-id-usageterms-filetypes"
                                data-fieldtype="multicheck">
                                <div class="cmb-th">
                                    <label for="usageterms_filetypes">Files to Deliver when this license is
                                        Purchased</label>
                                </div>
                                <div class="cmb-td">
                                    <ul class="cmb2-checkbox-list no-select-all cmb2-list">
                                        <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                id="usageterms_filetypes1" value="mp3" checked="checked"
                                                data-hash='7npgi75uqe90' />
                                            <label for="usageterms_filetypes1">MP3</label>
                                        </li>
                                        <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                id="usageterms_filetypes2" value="wav" data-hash='7npgi75uqe90' />
                                            <label for="usageterms_filetypes2">WAV</label></li>
                                        <li><input type="checkbox" class="cmb2-option" name="usageterms_filetypes[]"
                                                id="usageterms_filetypes3" value="stems" data-hash='7npgi75uqe90' />
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
                                        id="usageterms_producer_alias" value="DJ Sonaar" data-hash='3up4uvi8ld80' />
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
                                    <div id="wp-usageterms_contract-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                                        <link rel='stylesheet' id='editor-buttons-css'
                                            href='https://beatkongs.medianssolutions.com/wp-includes/css/editor.min.css?ver=6.5.3'
                                            media='all' />
                                        <div id="wp-usageterms_contract-editor-tools"
                                            class="wp-editor-tools hide-if-no-js">
                                            <div class="wp-editor-tabs"><button type="button"
                                                    id="usageterms_contract-tmce" class="wp-switch-editor switch-tmce"
                                                    data-wp-editor-id="usageterms_contract">Visual</button>
                                                <button type="button" id="usageterms_contract-html"
                                                    class="wp-switch-editor switch-html"
                                                    data-wp-editor-id="usageterms_contract">Text</button>
                                            </div>
                                        </div>
                                        <div class="bg-editor-loading-main active">
                                            <div class="bg-editor-loading"></div>
                                            <div id="wp-usageterms_contract-editor-container"
                                                class="wp-editor-container">
                                                <div id="qt_usageterms_contract_toolbar"
                                                    class="quicktags-toolbar hide-if-no-js">
                                                </div><textarea class="wp-editor-area" rows="40" autocomplete="off"
                                                    cols="40" name="usageterms_contract"
                                                    id="usageterms_contract">&lt;h1&gt;{LICENSE_NAME}&lt;/h1&gt;
	&lt;p&gt;This License Agreement (the “Agreement”), having been made on and effective as of &lt;strong&gt;{CONTRACT_DATE}&lt;/strong&gt; (the “Effective Date”) by and between &lt;strong&gt;{PRODUCER_ALIAS}&lt;/strong&gt; (the “Producer” or “Licensor”); and you, &lt;strong&gt;{CUSTOMER_FULLNAME}&lt;/strong&gt; (“You” or “Licensee”), residing at &lt;strong&gt;{CUSTOMER_ADDRESS}&lt;/strong&gt;, sets forth the terms and conditions of the Licensee’s use, and the rights granted in, the Producer’s instrumental music file entitled &lt;strong&gt;{PRODUCT_TITLE}&lt;/strong&gt; (the “Beat”) in consideration for Licensee’s payment, on a so-called “&lt;strong&gt;{LICENSE_NAME}&lt;/strong&gt;” basis.&lt;/p&gt;
	&lt;p&gt;This Agreement is issued solely in connection with and for Licensee use of the Beat pursuant and subject to all terms and conditions set forth herein.&lt;/p&gt;
	&lt;h3&gt;License Fee:&lt;/h3&gt;
	&lt;p&gt;The Licensee to shall make payment of the License Fee to Licensor on the date of this Agreement. All rights granted to Licensee by Producer in the Beat are conditional upon Licensee’s timely payment of the License Fee. The License Fee is a one-time payment for the rights granted to Licensee and this Agreement is not valid until the License Fee has been paid.&lt;/p&gt;
	&lt;h3&gt;Delivery of the Beat:&lt;/h3&gt;
	&lt;p&gt;Licensor agrees to deliver the Beat as a high-quality file, as such terms are understood in the music industry. Licensor shall use commercially reasonable efforts to deliver the Beat to Licensee immediately after payment of the License Fee is made. Licensee will receive the Beat via email, to the email address Licensee provided to Licensor.&lt;/p&gt;
	&lt;h3&gt;Term:&lt;/h3&gt;
	&lt;p&gt;The Term of this Agreement shall be ten (10) years and this license shall expire on the ten (10) year anniversary of the Effective Date.&lt;/p&gt;
	&lt;h3&gt;Use of the Beat:&lt;/h3&gt;
	&lt;p&gt;In consideration for Licensee’s payment of the License Fee, the Producer hereby grants Licensee a limited non-exclusive, nontransferable license and the right to incorporate, include and/or use the Beat in the preparation of one (1) new song or to incorporate the Beat into a new piece of instrumental music created by the Licensee. Licensee may create the new song or new instrumental music by recording his/her written lyrics over the Beat and/or by incorporating portions/samples of the Beat into pre-existing instrumental music written, produced and/or owned by Licensee. The new song or piece of instrumental music created by the Licensee which incorporates some or all of the Beat shall be referred to as the “New Song”. Permission is granted to Licensee to modify the arrangement, length, tempo, or pitch of the Beat in preparation of the New Song for public release.&lt;/p&gt;
	&lt;p&gt;This License grants Licensee a worldwide, non-exclusive license to use the Beat as incorporated in the New Song in the manners and for the purposes expressly provided for herein, subject to the sale restrictions, limitations and prohibited uses stated in this Agreement. Licensee acknowledges and agrees that any and all rights granted to Licensee in the Beat pursuant to this Agreement are on a NON-EXCLUSIVE basis and Producer shall continue to license the Beat upon the same or similar terms and conditions as this Agreement to other potential third-party licensees.&lt;/p&gt;
	&lt;p&gt;The New Song may be used for any promotional purposes, including but not limited to, a release in a single format, for inclusion in a mixtape or free compilation of music bundled together (EP or album), and/or promotional, non-monetized digital streaming;&lt;/p&gt;
	&lt;p&gt;Licensee &lt;strong&gt;{PERFORMANCES_FOR_PROFIT}&lt;/strong&gt; perform the song publicly for-profit performances, including but not limited to, at a live performance (i.e. concert, festival, nightclub etc.), on terrestrial or satellite radio, and/or on the internet via third-party streaming services (Spotify, YouTube, iTunes Radio etc.). The New Song may be played on {NUMBER_OF_RADIO_STATIONS} terrestrial or satellite radio stations;&lt;/p&gt;
	&lt;p&gt;The Licensee may use the New Song in synchronization with &lt;strong&gt;{MONETIZED_MUSIC_VIDEOS}&lt;/strong&gt; audiovisual work no longer than five (5) minutes in length (a “Video”). In the event that the New Song itself is longer than five (5) minutes in length, the Video may not play for longer than the length of the New Song. The Video may be broadcast on any television network and/or uploaded to the internet for digital streaming and/or free download by the public including but not limited to on YouTube and/or Vevo. Producer grants no other synchronization rights to Licensee;&lt;/p&gt;
	&lt;p&gt;The Licensee may make the New Song available for sale in physical and/or digital form and sell &lt;strong&gt;{DISTRIBUTE_COPIES}&lt;/strong&gt; downloads/physical music products and are allowed &lt;strong&gt;{AUDIO_STREAMS}&lt;/strong&gt; monetized audio streams, &lt;strong&gt;{MONETIZED_VIDEO_STREAMS_ALLOWED}&lt;/strong&gt; monetized video streams, &lt;strong&gt;{NONMONETIZED_VIDEO_STREAMS_ALLOWED}&lt;/strong&gt; non-monetized video streams and are allowed &lt;strong&gt;{FREE_DOWNLOADS}&lt;/strong&gt; free downloads. The New Song may be available for sale as a single and/or included in a compilation of other songs bundled together by Licensee as an EP or a full-length Album. The New Song may be sold via digital retailers for permanent digital download in mp3 format and/or physical format, including compact disc and vinyl records. For clarity and avoidance of doubt, the Licensee does NOT have the right to sell the Beat in the form that it was delivered to Licensee. The Licensee must create a New Song (or instrumental as detailed above) for its rights under this provision to a vest. Any sale of the Beat in its original form by Licensee shall be a material breach of this Agreement and the Licensee shall be liable to the Licensor for damages as provided hereunder.&lt;/p&gt;
	&lt;p&gt;Subject to the Licensee’s compliance with the terms and conditions of this Agreement, Licensee shall not be required to account or pay to Producer any royalties, fees, or monies paid to or collected by the Licensee (expressly excluding mechanical royalties), or which would otherwise be payable to Producer in connection with the use/exploitation of the New Song as set forth in this Agreement.&lt;/p&gt;
	&lt;p&gt;Restrictions on the Use of the Beat: Licensee hereby agrees and acknowledges that it is expressly prohibited from taking any action(s) and from engaging in any use of the Beat or New Song in the manners, or for the purposes, set forth below:&lt;/p&gt;
	&lt;p&gt;The rights granted to Licensee are NON-TRANSFERABLE and that Licensee may not transfer or assign any of its rights hereunder to any third-party;&lt;/p&gt;
	&lt;p&gt;The Licensee shall not synchronize, or permit third parties to synchronize, the Beat or New Song with any audiovisual works EXCEPT as expressly provided for and pursuant to Paragraph 4(b)(iii) of this Agreement for use in one (1) Video. This restriction includes, but is not limited to, use of the Beat and/or New Song in television, commercials, film/movies, theatrical works, video games, and in any other form on the Internet which is not expressly permitted herein.&lt;/p&gt;
	&lt;p&gt;The Licensee shall not have the right to license or sublicense any use of the Beat or of the New Song, in whole or in part, for any so-called “samples”.&lt;/p&gt;
	&lt;p&gt;Licensee shall not engage in any unlawful copying, streaming, duplicating, selling, lending, renting, hiring, broadcasting, uploading, or downloading to any database, servers, computers, peer to peer sharing, or other file-sharing services, posting on websites, or distribution of the Beat in the form, or a substantially similar form, as delivered to Licensee. Licensee may send the Beat file to any individual musician, engineer, studio manager or other people who are working on the New Song.&lt;/p&gt;
	&lt;p&gt;THE LICENSEE IS EXPRESSLY PROHIBITED FROM REGISTERING THE BEAT AND/OR NEW SONG WITH ANY CONTENT IDENTIFICATION SYSTEM, SERVICE PROVIDER, MUSIC DISTRIBUTOR, RECORD LABEL OR DIGITAL AGGREGATOR (for example TuneCore or CDBaby, and any other provider of user-generated content identification services). The purpose of this restriction is to prevent you from receiving a copyright infringement takedown notice from a third party who also received a non-exclusive license to use the Beat in a New Song. The Beat has already been tagged for Content Identification (as that term is used in the music industry) by Producer as a pre-emptive measure to protect all interested parties in the New Song. If you do not adhere to this policy, you are in violation of the terms of this License and your license to use the Beat and/or New Song may be revoked without notice or compensation to you.&lt;/p&gt;
	&lt;p&gt;As applicable to both the underlying composition in the Beat and to the master recording of the Beat: (i) The parties acknowledge and agree that the New Song is a “derivative work”, as that term is used in the United States Copyright Act; (ii) As applicable to the Beat and/or the New Song, there is no intention by the parties to create a joint work; and (iii) There is no intention by the Licensor to grant any rights in and/or to any other derivative works that may have been created by other third-party licensees.&lt;/p&gt;
	&lt;h3&gt;Ownership:&lt;/h3&gt;
	&lt;p&gt;The Producer is and shall remain the sole owner and holder of all rights, title, and interest in the Beat, including all copyrights to and in the sound recording and the underlying musical compositions written and composed by Producer. Nothing contained herein shall constitute an assignment by Producer to Licensee of any of the foregoing rights. Licensee may not, under any circumstances, register or attempt to register the New Song and/or the Beat with the U.S. Copyright Office. The aforementioned right to register the New Song and/or the Beat shall be strictly limited to Producer. Licensee will, upon request, execute, acknowledge and deliver to Producer such additional documents as Producer may deem necessary to evidence and effectuate Producer’s rights hereunder, and Licensee hereby grants to Producer the right as attorney-in-fact to execute, acknowledge, deliver and record in the U.S. Copyright Office or elsewhere any and all such documents if Licensee shall fail to execute same within five (5) days after so requested by Producer.&lt;/p&gt;
	&lt;p&gt;For the avoidance of doubt, you do not own the master or the sound recording rights in the New Song. You have been licensed the right to use the Beat in the New Song and to commercially exploit the New Song based on the terms and conditions of this Agreement.&lt;/p&gt;
	&lt;p&gt;Notwithstanding the above, you do own the lyrics or other original musical components of the New Song that were written or composed solely by you.&lt;/p&gt;
	&lt;p&gt;With respect to the publishing rights and ownership of the underlying composition embodied in the New Song, the Licensee, and the Producer hereby acknowledge and agree that the underlying composition shall be owned/split between them as follows:&lt;/p&gt;
	&lt;p&gt;Producer shall own, control, and administer Fifty Percent (50%) of the so-called “Publisher’s Share” of the underlying composition.&lt;/p&gt;
	&lt;p&gt;In the event that Licensee wishes to register his/her interests and rights to the underlying composition of the New Song with their Performing Rights Organization (“PRO”), Licensee must simultaneously identify and register the Producer’s share and ownership interest in the composition to indicate that Producer wrote and owns 50% of the composition in the New Song and as the owner of 50% of the Publisher’s share of the New Song.&lt;/p&gt;
	&lt;p&gt;The licensee shall be deemed to have signed, affirmed and ratified its acceptance of the terms of this Agreement by virtue of its payment of the License Fee to Licensor and its electronic acceptance of its terms and conditions at the time Licensee made payment of the License Fee.&lt;/p&gt;
	&lt;p&gt;Mechanical License: If any selection or musical composition, or any portion thereof, recorded in the New Song hereunder is written or composed by Producer, in whole or in part, alone or in collaboration with others, or is owned or controlled, in whole or in part, directly or indirectly, by Producer or any person, firm, or corporation in which Producer has a direct or indirect interest, then such selection and/or musical composition shall be hereinafter referred to as a “Controlled Composition”.&lt;/p&gt;
	&lt;p&gt;Producer hereby agrees to issue or cause to be issued, as applicable, to Licensee, mechanical licenses in respect of each Controlled Composition, which are embodied on the New Song. For that license, on the United States and Canada sales, Licensee will pay mechanical royalties at one hundred percent (100%) of the minimum statutory rate, subject to no cap of that rate for albums and/or EPs. For license outside the United States and Canada, the mechanical royalty rate will be the rate prevailing on an industry-wide basis in the country concerned on the date that this agreement has been entered into.&lt;/p&gt;
	&lt;h3&gt;Credit:&lt;/h3&gt;
	&lt;p&gt;Licensee shall have the right to use and permit others to use Producer’s approved name, approved likeness, and other approved identification and approved biographical material concerning the Producer solely for purposes of trade and otherwise without restriction solely in connection with the New Song recorded hereunder.&lt;/p&gt;
	&lt;p&gt;Licensee shall use best efforts to have Producer credited as a “producer” and shall give Producer appropriate production and songwriting credit on all compact discs, record, music video, and digital labels or any other record configuration manufactured which is now known or created in the future that embodies the New Song created hereunder and on all cover liner notes, any records containing the New Song and on the front and/or back cover of any album listing the New Song and other musician credits. The licensee shall use its best efforts to ensure that Producer is properly credited and Licensee shall check all proofs for the accuracy of credits, and shall use its best efforts to cure any mistakes regarding Producers credit. In the event of any failure by Licensee to issue the credit to Producer, Licensee must use reasonable efforts to correct any such failure immediately and on a prospective basis. Such credit shall be in the substantial form: “Produced by &lt;strong&gt;{PRODUCER_ALIAS}&lt;/strong&gt;”.&lt;/p&gt;
	&lt;p&gt;Licensor Option: Licensor shall have the option, at Licensors sole discretion, to terminate this License at any time within three (3) years of the date of this Agreement upon written notice to Licensee. In the event that Licensor exercises this option, Licensor shall pay to Licensee a sum equal to Two Hundred Percent (200%) of the License Fee paid by Licensee. Upon Licensor’s exercise of the option, Licensee must immediately remove the New Song from any and all digital and physical distribution channels and must immediately cease access to any streams and/or downloads of the New Song by the general public.&lt;/p&gt;
	&lt;h3&gt;Breach by Licensee:&lt;/h3&gt;
	&lt;p&gt;The licensee shall have five (5) business days from its receipt of written notice by Producer and/or Producer’s authorized representative to cure any alleged breach of this Agreement by Licensee. Licensee’s failure to cure the alleged breach within five (5) business days shall result in Licensee’s default of its obligations, its breach of this Agreement, and at Producer’s sole discretion, the termination of Licensee’s rights hereunder.&lt;/p&gt;
	&lt;p&gt;If Licensee engages in the commercial exploitation and/or sale of the Beat or New Song outside of the manner and amount expressly provided for in this Agreement, Licensee shall be liable to Producer for monetary damages in an amount equal to any and all monies paid, collected by, or received by Licensee, or any third party on its behalf, in connection with such unauthorized commercial exploitation of the Beat and/or New Song.&lt;/p&gt;
	&lt;p&gt;Licensee recognizes and agrees that a breach or threatened breach of this Agreement by Licensee give rise to irreparable injury to Producer, which may not be adequately compensated by damages. Accordingly, in the event of a breach or threatened breach by the Licensee of the provisions of this Agreement, Producer may seek and shall be entitled to a temporary restraining order and a preliminary injunction restraining the Licensee from violating the provisions of this Agreement. Nothing herein shall prohibit Producer from pursuing any other available legal or equitable remedy from such breach or threatened breach, including but not limited to the recovery of damages from the Licensee. The Licensee shall be responsible for all costs, expenses or damages that Producer incurs as a result of any violation by the Licensee of any provision of this Agreement. Licensee’ obligation shall include court costs, litigation expenses, and reasonable attorneys’ fees.&lt;/p&gt;
	&lt;h3&gt;Warranties, Representations, and Indemnification:&lt;/h3&gt;
	&lt;p&gt;Licensee hereby agrees that Licensor has not made any guarantees or promises that the Beat fits the particular creative use or musical purpose intended or desired by the Licensee. The Beat, its sound recording, and the underlying musical composition embodied therein are licensed to the Licensee “as is” without warranties of any kind or fitness for a particular purpose.&lt;/p&gt;
	&lt;p&gt;Producer warrants and represents that he has the full right and ability to enter into this agreement, and is not under any disability, restriction, or prohibition with respect to the grant of rights hereunder. Producer warrants that the manufacture, sale, distribution, or other exploitation of the New Song hereunder will not infringe upon or violate any common law or statutory right of any person, firm, or corporation; including, without limitation, contractual rights, copyrights, and right(s) of privacy and publicity and will not constitute libel and/or slander.&lt;/p&gt;
	&lt;p&gt;Licensee warrants that the manufacture, sale, distribution, or other exploitation of the New Song hereunder will not infringe upon or violate any common law or statutory right of any person, firm, or corporation; including, without limitation, contractual rights, copyrights, and right(s) of privacy and publicity and will not constitute libel and/or slander. The foregoing notwithstanding, Producer undertakes no responsibility whatsoever as to any elements added to the New Song by Licensee, and Licensee indemnifies and holds Producer harmless for any such elements. Producer warrants that he did not “sample” (as that term is commonly understood in the recording industry) any copyrighted material or sound recordings belonging to any other person, firm, or corporation (hereinafter referred to as “Owner”) without first having notified Licensee.&lt;/p&gt;
	&lt;p&gt;The licensee shall have no obligation to approve the use of any sample thereof; however, if approved, any payment in connection therewith, including any associated legal clearance costs, shall be borne by Licensee. Knowledge by Licensee that “samples” were used by Producer which was not affirmatively disclosed by Producer to Licensee shall shift, in whole or in part, the liability for infringement or violation of the rights of any third party arising from the use of any such “sample” from Producer to Licensee.&lt;/p&gt;
	&lt;p&gt;Parties hereto shall indemnify and hold each other harmless from any and all third party claims, liabilities, costs, losses, damages or expenses as are actually incurred by the non-defaulting party and shall hold the non-defaulting party, free, safe, and harmless against and from any and all claims, suits, demands, costs, liabilities, loss, damages, judgments, recoveries, costs, and expenses; (including, without limitation, reasonable attorneys’ fees), which may be made or brought, paid, or incurred by reason of any breach or claim of breach of the warranties and representations hereunder by the defaulting party, their agents, heirs, successors, assigns and employees, which have been reduced to final judgment;&lt;/p&gt;
	&lt;p&gt;provided that prior to final judgment, arising out of any breach of any representations or warranties of the defaulting party contained in this agreement or any failure by defaulting party to perform any obligations on its part to be performed hereunder the non-defaulting party has given the defaulting party prompt written notice of all claims and the right to participate in the defense with counsel of its choice at its sole expense. In no event shall Artist be entitled to seek injunctive or any other equitable relief for any breach or non-compliance with any provision of this agreement.&lt;/p&gt;
	&lt;h3&gt;Miscellaneous:&lt;/h3&gt;
	&lt;p&gt;This Agreement constitutes the entire understanding of the parties and is intended as a final expression of their agreement and cannot be altered, modified, amended or waived, in whole or in part, except by written instrument (email being sufficient) signed by both parties hereto. This agreement supersedes all prior agreements between the parties, whether oral or written. Should any provision of this agreement be held to be void, invalid or inoperative, such decision shall not affect any other provision hereof, and the remainder of this agreement shall be effective as though such void, invalid or inoperative provision had not been contained herein.&lt;/p&gt;
	&lt;p&gt;No failure by Licensor hereto to perform any of its obligations hereunder shall be deemed a material breach of this agreement until the Licensee gives Licensor written notice of its failure to perform, and such failure has not been corrected within thirty (30) days from and after the service of such notice, or, if such breach is not reasonably capable of being cured within such thirty (30) day period, Licensor does not commence to cure such breach within said time period, and proceed with reasonable diligence to complete the curing of such breach thereafter. This agreement shall be governed by and interpreted in accordance with the laws of the &lt;strong&gt;{STATE_PROVINCE_COUNTRY}&lt;/strong&gt; applicable to agreements entered into and wholly performed in said State, without regard to any conflict of laws principles.&lt;/p&gt;
	&lt;p&gt;You hereby agree that the exclusive jurisdiction and venue for any action, suit or proceeding based upon any matter, claim or controversy arising hereunder or relating hereto shall be in the state or federal courts located in the &lt;strong&gt;{STATE_PROVINCE_COUNTRY}&lt;/strong&gt;. You shall not be entitled to any monies in connection with the Master(s) other than as specifically set forth herein.&lt;/p&gt;
	&lt;p&gt;All notices pursuant to this agreement shall be in writing and shall be given by registered or certified mail, return receipt requested (prepaid) at the respective addresses hereinabove set forth or such other address or addresses as may be designated by either party. Such notices shall be deemed given when received. A copy of all such notices sent to Producer shall be concurrently sent to [[lawfirm_name_address]]. Any notice mailed will be deemed to have been received five (5) business days after it is mailed; any notice dispatched by expedited delivery service will be deemed to be received two (2) business days after it is dispatched.&lt;/p&gt;
	&lt;p&gt;YOU ACKNOWLEDGE AND AGREE THAT YOU HAVE READ THIS AGREEMENT AND HAVE BEEN ADVISED BY US OF THE SIGNIFICANT IMPORTANCE OF RETAINING AN INDEPENDENT ATTORNEY OF YOUR CHOICE TO REVIEW THIS AGREEMENT ON YOUR BEHALF. YOU ACKNOWLEDGE AND AGREE THAT YOU HAVE HAD THE UNRESTRICTED OPPORTUNITY TO BE REPRESENTED BY AN INDEPENDENT ATTORNEY. IN THE EVENT OF YOUR FAILURE TO OBTAIN AN INDEPENDENT ATTORNEY OR WAIVER THEREOF, YOU HEREBY WARRANT AND REPRESENT THAT YOU WILL NOT ATTEMPT TO USE SUCH FAILURE AND/OR WAIVER as a basis to avoid any obligations under this agreement, or to invalidate this agreement or To render this agreement or any part thereof unenforceable.&lt;/p&gt;
	&lt;p&gt;This agreement may be executed in counterparts, each of which shall be deemed an original, and said counterparts shall constitute one and the same instrument. In addition, a signed copy of this agreement transmitted by facsimile or scanned into an image file and transmitted via email shall, for all purposes, be treated as if it was delivered containing an original manual signature of the party whose signature appears thereon and shall be binding upon such party as though an originally signed document had been delivered. Notwithstanding the foregoing, in the event that you do not sign this Agreement, your acknowledgment that you have reviewed the terms and conditions of this Agreement and your payment of the License Fee shall serve as your signature and acceptance of the terms and conditions of this Agreement.&lt;/p&gt;</textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="cmb-row cmb-type-title cmb2-id-var-usageterms-build-your-contract"
                                data-fieldtype="title">

                                <div class="cmb-td">
                                    <h5 class="cmb2-metabox-title" id="var-usageterms-build-your-contract"
                                        data-hash='66pu33jua620'>
                                        Use the variables below to build your contract</h5>
                                </div>
                            </div>
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