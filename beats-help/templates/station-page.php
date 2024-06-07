<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<?php wp_head(); ?>
<?php get_header(); ?>

<div data-elementor-type="wp-page" class="elementor ">

    <div data-elementor-type="product-archive" data-elementor-id="36"
        class="elementor elementor-36 elementor-location-archive product">
        <div class="elementor-section-wrap">
            <div class="elementor-element elementor-element-fcd64c5 e-con-full e-flex e-con e-parent" data-id="fcd64c5"
                data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-element elementor-element-888e8b0 e-con-full dark-bg e-flex e-con e-child"
                    data-id="888e8b0" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;],&quot;sticky_offset&quot;:54,&quot;sticky_effects_offset&quot;:0}">
                    <div class="elementor-element elementor-element-d76ff50 elementor-widget elementor-widget-heading"
                        data-id="d76ff50" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">Beats 24/7</h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3525373 e-con-full e-flex e-con e-child"
                        data-id="3525373" data-element_type="container">
                        <div class="elementor-element elementor-element-3662a2c elementor-align-left elementor-widget elementor-widget-button"
                            data-id="3662a2c" data-element_type="widget" id="copyUrlButton"
                            data-widget_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-icon elementor-align-icon-right">
                                                <i aria-hidden="true" class="icon icon-share-1"></i> </span>
                                            <span class="elementor-button-text">Share</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-1e7fb0e elementor-widget elementor-widget-html"
                            data-id="1e7fb0e" data-element_type="widget" data-widget_type="html.default">
                            <div class="elementor-widget-container">
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    function copyUrlToClipboard() {
                                        console.log('clicked');
                                        // Create a temporary textarea to store the URL
                                        const tempTextarea = document.createElement('textarea');
                                        tempTextarea.value = window.location.href;
                                        document.body.appendChild(tempTextarea);

                                        // Select and copy the URL to the clipboard
                                        tempTextarea.select();
                                        document.execCommand('copy');

                                        // Remove the temporary textarea
                                        document.body.removeChild(tempTextarea);

                                        // Change the button text to 'Copied!'
                                        const buttonText = document.querySelector(
                                            '#copyUrlButton .elementor-button-text');
                                        buttonText.innerText = 'Copied!';

                                        // Reset the button text after 3 seconds
                                        setTimeout(() => {
                                            buttonText.innerText = 'Share';
                                        }, 3000);
                                    }

                                    // Assign the onclick event handler to the button
                                    const copyUrlButton = document.getElementById('copyUrlButton');
                                    copyUrlButton.onclick = copyUrlToClipboard;
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-ecc354e e-con-full e-flex e-con e-child"
                    data-id="ecc354e" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-element elementor-element-e051d36 elementor-widget elementor-widget-button"
                        data-id="e051d36" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a href="javascript:IRON.sonaar.player.setPlayerAndPlay({id:876}) https://beatkongs.com/test/stations/"
                                    class="elementor-button elementor-button-link elementor-size-sm">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-icon elementor-align-icon-left">
                                            <i aria-hidden="true" class="fas fa-long-arrow-alt-left"></i> </span>
                                        <span class="elementor-button-text">View All Stations</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-275241d elementor-widget__width-initial sr_track_inline_cta_bt__yes elementor-widget elementor-widget-music-player"
                        data-id="275241d" data-element_type="widget" data-widget_type="music-player.default">
                        <div class="elementor-widget-container">
                            <article id="arbitrary-instance-6662ccefb2e10" class="iron_widget_radio">
                                <div class="iron-audioplayer  show-trackartwork srp_hide_player srp_hide_spectro_mobile srp_has_metadata srp_tracklist_play_cover srp_tracklist_play_cover_hover srp_slider_enable srp_favorites_loading"
                                    id="arbitrary-instance-6662ccefb2e10-d4e2738f79"
                                    data-id="arbitrary-instance-6662ccefb2e10" data-track-sw-cursor="" data-lazyload=""
                                    data-albums="" data-category="all"
                                    data-url-playlist="https://beatkongs.com/test/?load=playlist.json&#038;title=&#038;albums=&#038;category=all&#038;posts_not_in=&#038;category_not_in=&#038;feed_title=&#038;feed=&#038;feed_img=&#038;el_widget_id=&#038;artwork=&#038;posts_per_pages=-1&#038;all_category=1&#038;single_playlist=&#038;reverse_tracklist=&#038;audio_meta_field=&#038;repeater_meta_field=&#038;import_file=&#038;rss_items=-1&#038;rss_item_title=&#038;is_favorite=&#038;is_recentlyplayed=&#038;srp_order=date_DESC"
                                    data-sticky-player="1" data-shuffle="1" data-playlist_title="" data-scrollbar=""
                                    data-wave-color="#FDFDFB" data-wave-progress-color="#FFFFFF" data-spectro=""
                                    data-no-wave="1" data-hide-progressbar="" data-progress-bar-style=""
                                    data-feedurl="0" data-notrackskip="" data-no-loop-tracklist=""
                                    data-playertemplate="skin_boxed_tracklist" data-hide-artwork="" data-speedrate="1"
                                    data-tracks-per-page="" data-pagination_scroll_offset="" data-total_items="74"
                                    data-total_pages="0" data-adaptive-colors="" data-adaptive-colors-freeze=""
                                    style="opacity:0;">
                                    <div class="srp_swiper-wrap">
                                        <div class="srp_swiper swiper srp_slider_move_content_below"
                                            data-swiper-source="track"
                                            data-params="{loop:false,spaceBetween:5,slidesPerView:1,speed:300,effect:'slide',breakpoints:{ 767: {slidesPerView: 1 }, 1024: {slidesPerView: 1 }, },}">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide" data-post-id="867" data-track-pos="0"
                                                    data-slide-id="0" data-slide-id="0" data-slide-index="0">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">1</div>
                                                        <div class="srp_swiper-track-title">Night</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Abel Cardin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_wc_round_bt"
                                                                        target="_self" title="$0.00" aria-label="$0.00"
                                                                        data-source-post-id="867" data-store-id="0-0"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$0.00</span></a><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="867"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="867" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="867" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="875" data-track-pos="0"
                                                    data-slide-id="1" data-slide-id="1" data-slide-index="1">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">2</div>
                                                        <div class="srp_swiper-track-title">Stomper Snooper</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Vinyl Kiwi
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="875"
                                                                        data-store-id="1-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="875"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="875" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="875" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="870" data-track-pos="0"
                                                    data-slide-id="2" data-slide-id="2" data-slide-index="2">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">3</div>
                                                        <div class="srp_swiper-track-title">Surfing Vlog</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="870"
                                                                        data-store-id="2-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="870"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="870" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="870" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="868" data-track-pos="0"
                                                    data-slide-id="3" data-slide-id="3" data-slide-index="3">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">4</div>
                                                        <div class="srp_swiper-track-title">Atlantic Tunic</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Marie Pier
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="868"
                                                                        data-store-id="3-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="868"
                                                                        data-store-id="3-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="868" data-store-id="3-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="868" data-store-id="3-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="871" data-track-pos="0"
                                                    data-slide-id="4" data-slide-id="4" data-slide-index="4">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">5</div>
                                                        <div class="srp_swiper-track-title">Test my beat</div><span
                                                            class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="871"
                                                                        data-store-id="4-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="871"
                                                                        data-store-id="4-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="871" data-store-id="4-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="871" data-store-id="4-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="872" data-track-pos="0"
                                                    data-slide-id="5" data-slide-id="5" data-slide-index="5">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">6</div>
                                                        <div class="srp_swiper-track-title">Chic Epic</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Marie Pier
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="872"
                                                                        data-store-id="5-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="872"
                                                                        data-store-id="5-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="872" data-store-id="5-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="872" data-store-id="5-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="873" data-track-pos="0"
                                                    data-slide-id="6" data-slide-id="6" data-slide-index="6">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">7</div>
                                                        <div class="srp_swiper-track-title">Piper 28</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Fraxx</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="873"
                                                                        data-store-id="6-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="873"
                                                                        data-store-id="6-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="873" data-store-id="6-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="873" data-store-id="6-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="876" data-track-pos="0"
                                                    data-slide-id="7" data-slide-id="7" data-slide-index="7">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">8</div>
                                                        <div class="srp_swiper-track-title">House Party 1993</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Wizo &amp;
                                                            Lizo
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="876"
                                                                        data-store-id="7-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="876"
                                                                        data-store-id="7-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="876" data-store-id="7-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="876" data-store-id="7-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="877" data-track-pos="0"
                                                    data-slide-id="8" data-slide-id="8" data-slide-index="8">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">9</div>
                                                        <div class="srp_swiper-track-title">One Eight Foxtrot</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Avionic Master
                                                            On
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="877"
                                                                        data-store-id="8-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="877"
                                                                        data-store-id="8-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="877" data-store-id="8-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="877" data-store-id="8-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="878" data-track-pos="0"
                                                    data-slide-id="9" data-slide-id="9" data-slide-index="9">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">10</div>
                                                        <div class="srp_swiper-track-title">Driving the city</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="878"
                                                                        data-store-id="9-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="878"
                                                                        data-store-id="9-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="878" data-store-id="9-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="878" data-store-id="9-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="879" data-track-pos="0"
                                                    data-slide-id="10" data-slide-id="10" data-slide-index="10">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">11</div>
                                                        <div class="srp_swiper-track-title">Brome</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Wizo &amp;
                                                            Lizo
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="879"
                                                                        data-store-id="10-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="879"
                                                                        data-store-id="10-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="879" data-store-id="10-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="879" data-store-id="10-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="880" data-track-pos="0"
                                                    data-slide-id="11" data-slide-id="11" data-slide-index="11">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">12</div>
                                                        <div class="srp_swiper-track-title">Ambient Mix</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Adele Kurpizov
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="880"
                                                                        data-store-id="11-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="880"
                                                                        data-store-id="11-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="880" data-store-id="11-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="880" data-store-id="11-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="881" data-track-pos="0"
                                                    data-slide-id="12" data-slide-id="12" data-slide-index="12">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">13</div>
                                                        <div class="srp_swiper-track-title">Sync Storm</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Snooze
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="881"
                                                                        data-store-id="12-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="881"
                                                                        data-store-id="12-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="881" data-store-id="12-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="881" data-store-id="12-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="882" data-track-pos="0"
                                                    data-slide-id="13" data-slide-id="13" data-slide-index="13">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Stereo-Nuts-Piano-Hip-Hop-Intro-Main-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">14</div>
                                                        <div class="srp_swiper-track-title">Stereo Nuts</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Jamboree
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="882"
                                                                        data-store-id="13-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="882"
                                                                        data-store-id="13-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="882" data-store-id="13-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="882" data-store-id="13-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="883" data-track-pos="0"
                                                    data-slide-id="14" data-slide-id="14" data-slide-index="14">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">15</div>
                                                        <div class="srp_swiper-track-title">Silence Obscure</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Marie Pier
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="883"
                                                                        data-store-id="14-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="883"
                                                                        data-store-id="14-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="883" data-store-id="14-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="883" data-store-id="14-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="884" data-track-pos="0"
                                                    data-slide-id="15" data-slide-id="15" data-slide-index="15">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">16</div>
                                                        <div class="srp_swiper-track-title">Fashion Distortion</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Grammy
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="884"
                                                                        data-store-id="15-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="884"
                                                                        data-store-id="15-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="884" data-store-id="15-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="884" data-store-id="15-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="885" data-track-pos="0"
                                                    data-slide-id="16" data-slide-id="16" data-slide-index="16">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">17</div>
                                                        <div class="srp_swiper-track-title">Watch Your Back</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Yvon Tessier
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="885"
                                                                        data-store-id="16-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="885"
                                                                        data-store-id="16-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="885" data-store-id="16-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="885" data-store-id="16-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="886" data-track-pos="0"
                                                    data-slide-id="17" data-slide-id="17" data-slide-index="17">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">18</div>
                                                        <div class="srp_swiper-track-title">Yfa Cho</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Radial
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="886"
                                                                        data-store-id="17-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="886"
                                                                        data-store-id="17-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="886" data-store-id="17-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="886" data-store-id="17-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="184" data-track-pos="0"
                                                    data-slide-id="18" data-slide-id="18" data-slide-index="18">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">19</div>
                                                        <div class="srp_swiper-track-title">Corporate Demons feat. Luxas
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="184"
                                                                        data-store-id="18-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="184"
                                                                        data-store-id="18-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="184" data-store-id="18-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="184" data-store-id="18-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="186" data-track-pos="0"
                                                    data-slide-id="19" data-slide-id="19" data-slide-index="19">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/robot_from_future_01.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">20</div>
                                                        <div class="srp_swiper-track-title">Back To The Future feat.
                                                            ProbCause</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="186"
                                                                        data-store-id="19-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="186"
                                                                        data-store-id="19-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="186" data-store-id="19-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="186" data-store-id="19-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="178" data-track-pos="0"
                                                    data-slide-id="20" data-slide-id="20" data-slide-index="20">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">21</div>
                                                        <div class="srp_swiper-track-title">War Of The Currents</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="178"
                                                                        data-store-id="20-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="178"
                                                                        data-store-id="20-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="178" data-store-id="20-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="178" data-store-id="20-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="179" data-track-pos="0"
                                                    data-slide-id="21" data-slide-id="21" data-slide-index="21">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">22</div>
                                                        <div class="srp_swiper-track-title">Satoshi Nakamoto Lau</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="179"
                                                                        data-store-id="21-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="179"
                                                                        data-store-id="21-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="179" data-store-id="21-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="179" data-store-id="21-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="180" data-track-pos="0"
                                                    data-slide-id="22" data-slide-id="22" data-slide-index="22">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">23</div>
                                                        <div class="srp_swiper-track-title">Native Son Prequel feat. Leo
                                                            Napier</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="180"
                                                                        data-store-id="22-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="180"
                                                                        data-store-id="22-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="180" data-store-id="22-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="180" data-store-id="22-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="181" data-track-pos="0"
                                                    data-slide-id="23" data-slide-id="23" data-slide-index="23">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/trap–album_cover.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">24</div>
                                                        <div class="srp_swiper-track-title">Anima Mundi feat. Russ
                                                            Liquid
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="181"
                                                                        data-store-id="23-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="181"
                                                                        data-store-id="23-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="181" data-store-id="23-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="181" data-store-id="23-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="182" data-track-pos="0"
                                                    data-slide-id="24" data-slide-id="24" data-slide-index="24">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">25</div>
                                                        <div class="srp_swiper-track-title">Tempus Illusio</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="182"
                                                                        data-store-id="24-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="182"
                                                                        data-store-id="24-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="182" data-store-id="24-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="182" data-store-id="24-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="183" data-track-pos="0"
                                                    data-slide-id="25" data-slide-id="25" data-slide-index="25">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">26</div>
                                                        <div class="srp_swiper-track-title">Native Son feat. Raekwon
                                                            &amp;
                                                            Leo Napier</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="183"
                                                                        data-store-id="25-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="183"
                                                                        data-store-id="25-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="183" data-store-id="25-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="183" data-store-id="25-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="185" data-track-pos="0"
                                                    data-slide-id="26" data-slide-id="26" data-slide-index="26">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/Lemarcitus_album_cover_201637d1-145d-42ba-bd8f-0852d6fe7882.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">27</div>
                                                        <div class="srp_swiper-track-title">Eat Liver! feat. Laibach
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="185"
                                                                        data-store-id="26-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="185"
                                                                        data-store-id="26-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="185" data-store-id="26-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="185" data-store-id="26-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="187" data-track-pos="0"
                                                    data-slide-id="27" data-slide-id="27" data-slide-index="27">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">28</div>
                                                        <div class="srp_swiper-track-title">Room 3327</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="187"
                                                                        data-store-id="27-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="187"
                                                                        data-store-id="27-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="187" data-store-id="27-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="187" data-store-id="27-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="383" data-track-pos="0"
                                                    data-slide-id="28" data-slide-id="28" data-slide-index="28">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">29</div>
                                                        <div class="srp_swiper-track-title">Cinematic Essentials –
                                                            SoundKit
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Audience™
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="28-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="28-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="28-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="28-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="383" data-track-pos="1"
                                                    data-slide-id="29" data-slide-id="29" data-slide-index="29">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">30</div>
                                                        <div class="srp_swiper-track-title">Driving the city</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="29-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="29-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="29-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="29-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="383" data-track-pos="2"
                                                    data-slide-id="30" data-slide-id="30" data-slide-index="30">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">31</div>
                                                        <div class="srp_swiper-track-title">Watch Your Back</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Yvon Tessier
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="30-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="30-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="30-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="30-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="383" data-track-pos="3"
                                                    data-slide-id="31" data-slide-id="31" data-slide-index="31">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">32</div>
                                                        <div class="srp_swiper-track-title">Sync Storm</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Snooze
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="31-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="31-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="31-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="31-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="390" data-track-pos="0"
                                                    data-slide-id="32" data-slide-id="32" data-slide-index="32">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">33</div>
                                                        <div class="srp_swiper-track-title">Cinematic Trailer FX –
                                                            SoundKit
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Audience™
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="32-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="32-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="32-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="32-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="390" data-track-pos="1"
                                                    data-slide-id="33" data-slide-id="33" data-slide-index="33">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">34</div>
                                                        <div class="srp_swiper-track-title">Test my beat</div><span
                                                            class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="33-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="33-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="33-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="33-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="390" data-track-pos="2"
                                                    data-slide-id="34" data-slide-id="34" data-slide-index="34">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">35</div>
                                                        <div class="srp_swiper-track-title">Stereo Nuts</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Jamboree
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="34-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="34-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="34-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="34-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="391" data-track-pos="0"
                                                    data-slide-id="35" data-slide-id="35" data-slide-index="35">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">36</div>
                                                        <div class="srp_swiper-track-title">Drum Kit Megapack – SoundKit
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Audience™
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="35-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="35-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="35-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="35-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="391" data-track-pos="1"
                                                    data-slide-id="36" data-slide-id="36" data-slide-index="36">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">37</div>
                                                        <div class="srp_swiper-track-title">Brome</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Wizo &amp;
                                                            Lizo
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="36-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="36-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="36-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="36-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="391" data-track-pos="2"
                                                    data-slide-id="37" data-slide-id="37" data-slide-index="37">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">38</div>
                                                        <div class="srp_swiper-track-title">Surfing Vlog</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="37-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="37-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="37-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="37-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="391" data-track-pos="3"
                                                    data-slide-id="38" data-slide-id="38" data-slide-index="38">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">39</div>
                                                        <div class="srp_swiper-track-title">Driving the city</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="38-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="38-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="38-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="38-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="392" data-track-pos="0"
                                                    data-slide-id="39" data-slide-id="39" data-slide-index="39">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">40</div>
                                                        <div class="srp_swiper-track-title">Horror FX – Soundkit</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Audience™
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="39-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="39-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="39-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="39-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="392" data-track-pos="1"
                                                    data-slide-id="40" data-slide-id="40" data-slide-index="40">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">41</div>
                                                        <div class="srp_swiper-track-title">Stomper Snooper</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Vinyl Kiwi
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="40-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="40-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="40-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="40-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="0"
                                                    data-slide-id="41" data-slide-id="41" data-slide-index="41">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">42</div>
                                                        <div class="srp_swiper-track-title">Driving the city</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Mike Ruzin
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="41-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="41-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="41-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="1"
                                                    data-slide-id="42" data-slide-id="42" data-slide-index="42">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">43</div>
                                                        <div class="srp_swiper-track-title">War Of The Currents</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="42-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="42-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="42-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="2"
                                                    data-slide-id="43" data-slide-id="43" data-slide-index="43">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">44</div>
                                                        <div class="srp_swiper-track-title">Ambient Mix</div>
                                                        <div class="srp_swiper-track-artist"> Produced by Adele Kurpizov
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="43-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="43-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="43-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="3"
                                                    data-slide-id="44" data-slide-id="44" data-slide-index="44">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/electronic-PhotoRoom.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">45</div>
                                                        <div class="srp_swiper-track-title">Corporate Demons feat. Luxas
                                                        </div>
                                                        <div class="srp_swiper-track-artist"> Produced by Gramatik</div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="44-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="44-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="44-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="4"
                                                    data-slide-id="45" data-slide-id="45" data-slide-index="45">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.png)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">46</div>
                                                        <div class="srp_swiper-track-title">Sync Storm</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Snooze
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="45-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="45-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="45-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-post-id="483" data-track-pos="5"
                                                    data-slide-id="46" data-slide-id="46" data-slide-index="46">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker.jpg)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index">47</div>
                                                        <div class="srp_swiper-track-title">Quntis Animantis</div>
                                                        <div class="srp_swiper-track-artist"> Produced by DJ Radial
                                                        </div>
                                                        <span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="46-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="46-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="46-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="srp_player_boxed srp_player_grid">
                                        <div class="sonaar-Artwort-box ">
                                            <div class="control">

                                            </div>
                                            <div class="album">
                                                <div class="album-art">
                                                    <img alt="album-art">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="album-player sr_waveform_mediaElement">
                                            <div class="srp_miniplayer_metas">
                                                <div class=" srp_meta srp_meta_0 track-title" data-prefix=""
                                                    aria-label="Track title"></div>
                                            </div>
                                            <div class="srp_subtitle"></div>
                                            <div class="srp_player_meta"></div>
                                            <div class="srp_control_box">
                                                <div class="srp-play-button play" href="#" aria-label="Play">
                                                    <i class="sricon-play"></i>
                                                    <div class="srp-play-circle"></div>
                                                </div>
                                                <div class="srp_wave_box">
                                                    <div class="player ">
                                                        <div class="sr_progressbar">

                                                            <div class="currentTime">00:00</div>

                                                            <div id="arbitrary-instance-6662ccefb2e10-a2d24a5abf-wave"
                                                                class="wave">

                                                                <div class="sonaar_fake_wave" style="height:70px">
                                                                    <audio src="" class="sonaar_media_element"></audio>
                                                                    <div class="sonaar_wave_base">
                                                                        <canvas id="sonaar_wave_base_canvas" class=""
                                                                            height="70" width="2540"></canvas>
                                                                        <svg></svg>
                                                                    </div>
                                                                    <div class="sonaar_wave_cut">
                                                                        <canvas id="sonaar_wave_cut_canvas" class=""
                                                                            height="70" width="2540"></canvas>
                                                                        <svg></svg>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="totalTime"></div>

                                                        </div>
                                                    </div>
                                                    <div class="srp_main_control">
                                                        <div class="control">
                                                            <div class="previous sricon-back" style="opacity:0;"
                                                                aria-label="Previous Track"></div>
                                                            <div class="play" style="opacity:0;" aria-label="Play">
                                                                <i class="sricon-play"></i>
                                                            </div>
                                                            <div class="next sricon-forward" style="opacity:0;"
                                                                aria-label="Next Track"></div>
                                                            <div class="sr_shuffle sricon-shuffle"
                                                                aria-label="Shuffle Track"></div>
                                                            <div class="volume" aria-label="Volume">
                                                                <div class="sricon-volume">
                                                                    <div class="slider-container">
                                                                        <div class="slide"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="srp_track_cta"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="album-store"></div>
                                        </div>
                                    </div>
                                    <div class="playlist sr_waveform_mediaElement"
                                        id="playlist_arbitrary-instance-6662ccefb2e10">
                                        <div class="srp_tracklist">
                                            <div class="srp_notfound">
                                                <div class="srp_notfound--title">Sorry, no results.</div>
                                                <div class="srp_notfound--subtitle">Please try another keyword</div>
                                            </div>
                                            <ul class="srp_list"
                                                data-filters="product_cat,product_tag,pa_license,instruments,mood,bpm">
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/867_V-2_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/12/03"
                                                    data-date-formated="December 3, 2022" data-show-date=""
                                                    data-trackTitle="Night&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Abel Cardin&lt;/span&gt;"
                                                    data-artist="Abel Cardin" data-trackID="861" data-trackTime="0:30"
                                                    data-relatedTrack="" data-post-url="" data-post-id="867"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/861_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_wc_round_bt"
                                                                        target="_self" title="$0.00" aria-label="$0.00"
                                                                        data-source-post-id="867" data-store-id="0-0"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$0.00</span></a><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="867"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/night/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="867" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="867" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/875_Claps-and-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/12/02"
                                                    data-date-formated="December 2, 2022" data-show-date=""
                                                    data-trackTitle="Stomper Snooper&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Vinyl Kiwi&lt;/span&gt;"
                                                    data-artist="Vinyl Kiwi" data-trackID="859" data-trackTime="0:39"
                                                    data-relatedTrack="" data-post-url="" data-post-id="875"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/859_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="875"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="875"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="875" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="875" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/870_Surfing-Vlog-Intro-Logo_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/30"
                                                    data-date-formated="November 30, 2022" data-show-date=""
                                                    data-trackTitle="Surfing Vlog&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="863" data-trackTime="0:26"
                                                    data-relatedTrack="" data-post-url="" data-post-id="870"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/863_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="870"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="870"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="870" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="870" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/868_AtlanticTunes-The-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Atlantic Tunic&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="850" data-trackTime="0:37"
                                                    data-relatedTrack="" data-post-url="" data-post-id="868"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/850_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="868"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="868"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="868" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="868" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/871_V-3_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Cloudways"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Test my beat&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;/span&gt;"
                                                    data-artist="" data-trackID="860" data-trackTime="0:22"
                                                    data-relatedTrack="" data-post-url="" data-post-id="871"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/860_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="871"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="871"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cloudways/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="871" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="871" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/872_Epic-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Chic Epic&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="848" data-trackTime="0:20"
                                                    data-relatedTrack="" data-post-url="" data-post-id="872"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/848_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Epic-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="872"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="872"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/chic-epic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="872" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="872" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/873_V-4_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Piper 28&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Fraxx&lt;/span&gt;"
                                                    data-artist="DJ Fraxx" data-trackID="864" data-trackTime="0:15"
                                                    data-relatedTrack="" data-post-url="" data-post-id="873"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/864_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="873"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="873"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/piper-28/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="873" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="873" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/876_House-Party-Ident-20sec-FullMix_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="House Party 1993&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="854"
                                                    data-trackTime="0:21" data-relatedTrack="" data-post-url=""
                                                    data-post-id="876" data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/854_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="876"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="876"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="876" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="876" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/877_percussion-30-seconds-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="One Eight Foxtrot&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Avionic Master On&lt;/span&gt;"
                                                    data-artist="Avionic Master On" data-trackID="866"
                                                    data-trackTime="0:31" data-relatedTrack="" data-post-url=""
                                                    data-post-id="877" data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/866_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="877"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="877"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="877" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="877" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/878_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="878"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="878"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="878"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="878" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="878" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/879_Fun-Advert-Full_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Brome&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="853"
                                                    data-trackTime="0:44" data-relatedTrack="" data-post-url=""
                                                    data-post-id="879" data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/853_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="879"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="879"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/brome/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="879" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="879" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/880_Ambient-Technology-Logo-5-With-Whoosh_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Ambient Mix&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Adele Kurpizov&lt;/span&gt;"
                                                    data-artist="Adele Kurpizov" data-trackID="840"
                                                    data-trackTime="0:12" data-relatedTrack="" data-post-url=""
                                                    data-post-id="880" data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/840_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="880"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="880"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="880" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="880" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/881_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="881"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="881"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="881"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/sync-storm/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="881" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="881" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/882_Stereo-Nuts-Piano-Hip-Hop-Intro-Main_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Stereo-Nuts-Piano-Hip-Hop-Intro-Main-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Stereo Nuts&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Jamboree&lt;/span&gt;"
                                                    data-artist="DJ Jamboree" data-trackID="857" data-trackTime="0:29"
                                                    data-relatedTrack="" data-post-url="" data-post-id="882"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/857_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Stereo-Nuts-Piano-Hip-Hop-Intro-Main-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="882"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="882"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="882" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="882" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/883_Fashion-Intro-2_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Silence Obscure&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="846" data-trackTime="0:19"
                                                    data-relatedTrack="" data-post-url="" data-post-id="883"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/846_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="883"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="883"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="883" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="883" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/884_A-Fashion-Logo-mp3_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Fashion Distortion&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Grammy&lt;/span&gt;"
                                                    data-artist="DJ Grammy" data-trackID="855" data-trackTime="0:15"
                                                    data-relatedTrack="" data-post-url="" data-post-id="884"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/855_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="884"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="884"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="884" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="884" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/885_Pop-Up-Podcast-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Watch Your Back&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Yvon Tessier&lt;/span&gt;"
                                                    data-artist="Yvon Tessier" data-trackID="844" data-trackTime="0:17"
                                                    data-relatedTrack="" data-post-url="" data-post-id="885"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/844_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="885"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="885"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="885" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="885" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/886_Stereo-Nuts-Piano-Hip-Hop-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Yfa Cho&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Radial&lt;/span&gt;"
                                                    data-artist="DJ Radial" data-trackID="865" data-trackTime="0:18"
                                                    data-relatedTrack="" data-post-url="" data-post-id="886"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/865_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="886"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="886"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="886" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="886" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_05.mp3"
                                                    data-showloading="1" data-albumTitle="Horizon"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Corporate Demons feat. Luxas&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="165" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="184"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/165.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="184"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="184"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="184" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="184" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="184" data-track-position="0"
                                                                data-track-title="Corporate Demons feat. Luxas&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_06.mp3"
                                                    data-showloading="1" data-albumTitle="Eyes Of Us"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/robot_from_future_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Back To The Future feat. ProbCause&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="167" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="186"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/167.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/robot_from_future_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="186"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="186"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="186" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="186" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="186" data-track-position="0"
                                                                data-track-title="Back To The Future feat. ProbCause&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/178_track_09_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Hardhead"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="War Of The Currents&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="173" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="178"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/173_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="178"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="178"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="178" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="178" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="178" data-track-position="0"
                                                                data-track-title="War Of The Currents&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_10.mp3"
                                                    data-showloading="1" data-albumTitle="Phoenix"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Satoshi Nakamoto Lau&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="175" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="179"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/175.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="179"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="179"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="179" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="179" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="179" data-track-position="0"
                                                                data-track-title="Satoshi Nakamoto Lau&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_02.mp3"
                                                    data-showloading="1" data-albumTitle="Blue"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Native Son Prequel feat. Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="159" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="180"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/159.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="180"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="180"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="180" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="180" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="180" data-track-position="0"
                                                                data-track-title="Native Son Prequel feat. Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_04.mp3"
                                                    data-showloading="1" data-albumTitle="Downbeat"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/trap–album_cover.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Anima Mundi feat. Russ Liquid&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="163" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="181"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/163.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/trap–album_cover-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="181"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="181"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="181" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="181" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="181" data-track-position="0"
                                                                data-track-title="Anima Mundi feat. Russ Liquid&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_01.mp3"
                                                    data-showloading="1" data-albumTitle="Play"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Tempus Illusio&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="157" data-trackTime="0:20"
                                                    data-relatedTrack="" data-post-url="" data-post-id="182"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/157.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="182"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="182"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="182" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="182" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="182" data-track-position="0"
                                                                data-track-title="Tempus Illusio&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_03.mp3"
                                                    data-showloading="1" data-albumTitle="Colorrun"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Native Son feat. Raekwon &amp; Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="161" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="183"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/161.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="183"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="183"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="183" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="183" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="183" data-track-position="0"
                                                                data-track-title="Native Son feat. Raekwon &amp; Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_07.mp3"
                                                    data-showloading="1" data-albumTitle="Moodburst"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/Lemarcitus_album_cover_201637d1-145d-42ba-bd8f-0852d6fe7882.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Eat Liver! feat. Laibach&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="169" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="185"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/169.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/Lemarcitus_album_cover_201637d1-145d-42ba-bd8f-0852d6fe7882-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="185"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="185"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="185" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="185" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="185" data-track-position="0"
                                                                data-track-title="Eat Liver! feat. Laibach&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_08.mp3"
                                                    data-showloading="1" data-albumTitle="Greencurved"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Room 3327&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="171" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="187"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/171.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_01-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="187"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="187"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/room-3327/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="187" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="187" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <div class="srp_noteButton"><i class="sricon-info"
                                                                data-source-post-id="187" data-track-position="0"
                                                                data-track-title="Room 3327&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                                data-track-use-postcontent=""></i></div>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/383_Somera_10_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Cinematic Essentials – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="156" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/156_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="0-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/383_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="1"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="1-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/383_Pop-Up-Podcast-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Watch Your Back&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Yvon Tessier&lt;/span&gt;"
                                                    data-artist="Yvon Tessier" data-trackID="844" data-trackTime="0:17"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="2"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/844_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="2-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/383_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="3"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="3-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="3-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="3-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="3-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/390_Somera_09_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Cinematic Trailer FX – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="155" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/155_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="0-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/390_V-3_preview.mp3"
                                                    data-showloading="1"
                                                    data-albumTitle="Cinematic Trailer FX - SoundKit"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Test my beat&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;/span&gt;"
                                                    data-artist="" data-trackID="860" data-trackTime="0:22"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="1"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/860_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="1-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/390_Stereo-Nuts-Piano-Hip-Hop-Intro-Main_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Stereo Nuts&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Jamboree&lt;/span&gt;"
                                                    data-artist="DJ Jamboree" data-trackID="857" data-trackTime="0:29"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="2"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/857_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="2-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/391_Somera_08_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Drum Kit Megapack – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="154" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/154_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="0-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/391_Fun-Advert-Full_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Brome&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="853"
                                                    data-trackTime="0:44" data-relatedTrack="" data-post-url=""
                                                    data-post-id="391" data-track-pos="1"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/853_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="1-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/391_Surfing-Vlog-Intro-Logo_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Surfing Vlog&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="863" data-trackTime="0:26"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="2"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/863_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="2-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/391_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="3"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="3-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="3-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="3-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="3-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/392_Somera_07_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Horror FX – Soundkit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="153" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="392"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/153_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="0-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/392_Claps-and-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Stomper Snooper&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Vinyl Kiwi&lt;/span&gt;"
                                                    data-artist="Vinyl Kiwi" data-trackID="859" data-trackTime="0:39"
                                                    data-relatedTrack="" data-post-url="" data-post-id="392"
                                                    data-track-pos="1"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/859_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2021/03/soundkit_horror-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="1-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/483_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="0"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="0-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="0-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/2021/03/track_09.mp3"
                                                    data-showloading="1" data-albumTitle="Hardhead"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="War Of The Currents&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="173" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="1"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/173.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="1-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="1-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="1-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/483_Ambient-Technology-Logo-5-With-Whoosh_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Ambient Mix&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Adele Kurpizov&lt;/span&gt;"
                                                    data-artist="Adele Kurpizov" data-trackID="840"
                                                    data-trackTime="0:12" data-relatedTrack="" data-post-url=""
                                                    data-post-id="483" data-track-pos="2"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/840_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/03/music_album_02-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="2-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="2-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="2-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/483_track_05_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Horizon"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/electronic-PhotoRoom.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Corporate Demons feat. Luxas&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="165" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="3"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/165_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/electronic-PhotoRoom-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="3-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="3-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="3-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/483_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="4"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="4-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="4-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="4-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="https://beatkongs.com/test/wp-content/uploads/audio_preview/483_V-5_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Quntis Animantis&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Radial&lt;/span&gt;"
                                                    data-artist="DJ Radial" data-trackID="836" data-trackTime="0:08"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="5"
                                                    data-peakFile="https://beatkongs.com/test/wp-content/uploads/audio_peaks/836_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=https://beatkongs.com/test/wp-content/uploads/2023/05/techno_speaker-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="5-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="https://beatkongs.com/test/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="5-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="5-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <script id="srp_js_params_6662ccefb2e10">
                                var srp_player_params_6662ccefb2e10 = {
                                    "title": "",
                                    "store_title_text": "",
                                    "albums": [],
                                    "hide_artwork": "false",
                                    "sticky_player": "1",
                                    "show_album_market": "true",
                                    "show_track_market": "true",
                                    "hide_timeline": "true",
                                    "elementor": "true",
                                    "tracks_per_page": "",
                                    "titletag_soundwave": "",
                                    "titletag_playlist": "",
                                    "show_control_on_hover": "false",
                                    "show_playlist": "false",
                                    "reverse_tracklist": "",
                                    "wave_color": "#FDFDFB",
                                    "wave_progress_color": "#FFFFFF",
                                    "spectro": "",
                                    "shuffle": "1",
                                    "searchbar": "",
                                    "searchbar_placeholder": "",
                                    "spectro_hide_mobile": "true",
                                    "show_cat_description": "",
                                    "player_layout": "skin_boxed_tracklist",
                                    "show_skip_bt": "default",
                                    "show_speed_bt": "default",
                                    "show_volume_bt": "true",
                                    "show_shuffle_bt": "true",
                                    "force_cta_dl": "default",
                                    "force_cta_singlepost": "false",
                                    "force_cta_share": "default",
                                    "force_cta_favorite": "default",
                                    "cta_track_show_label": "true",
                                    "track_artwork_format": "thumbnail",
                                    "track_artwork": "true",
                                    "track_artwork_play_button": "true",
                                    "track_artwork_play_on_hover": "true",
                                    "use_play_label": "default",
                                    "hide_trackdesc": "1",
                                    "order": "DESC",
                                    "orderby": "date",
                                    "artist_wrap": "true",
                                    "album_store_position": "top",
                                    "track_memory": "default",
                                    "tracklist_layout": "list",
                                    "slide_source": "track",
                                    "slider_hide_album_title": "true",
                                    "slider_move_content_below_image": "true",
                                    "slider_param": "{loop:false,spaceBetween:5,slidesPerView:1,speed:300,effect:'slide',breakpoints:{ 767: {slidesPerView: 1 }, 1024: {slidesPerView: 1 }, },}",
                                    "category": "all",
                                    "posts_per_page": "",
                                    "main_settings": "||"
                                }
                                var srp_player_params_args_6662ccefb2e10 = {
                                    "before_widget": "<article id=\"arbitrary-instance-6662ccefb2e10\" class=\"iron_widget_radio\">",
                                    "after_widget": "<\/article>",
                                    "before_title": "<span class='heading-t3'><\/span><h3 class=\"widgettitle\">",
                                    "after_title": "<\/h3>",
                                    "widget_id": "arbitrary-instance-6662ccefb2e10"
                                }
                                </script>
                                <script>
                                if (typeof setIronAudioplayers !== "undefined") {
                                    setIronAudioplayers("arbitrary-instance-6662ccefb2e10");
                                }
                                </script>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-58632d6 e-flex e-con-boxed e-con e-parent">
                <div class="e-con-inner">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>