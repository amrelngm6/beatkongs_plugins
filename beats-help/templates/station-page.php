<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));
$ids = array_column($stations, 'term_id');

$term = get_queried_object();

$currentKey = array_search($term->term_id, $ids);

$args    = [
    'post_author'         => get_current_user_id(),
    'post_type'         => 'beat',
    'post_status'         => ['publish'],
    'tax_query'         =>  array(
        'taxonomy' => 'station',
        'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
        'terms'    => array($term->$term_id), // Replace with your categories
    )
];

$beats = get_posts($args);

?>
<?php get_header(); ?>

<style id='elementor-frontend-inline-css'>
.elementor-36 .elementor-element.elementor-element-888e8b0:not(.elementor-motion-effects-element-type-background),
.elementor-36 .elementor-element.elementor-element-888e8b0>.elementor-motion-effects-container>.elementor-motion-effects-layer {
    background-image: url("<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/s0<?php echo $currentKey + 1; ?>.png");
}
</style>
<div data-elementor-type="product-archive" data-elementor-id="36"
    class="elementor elementor-36 elementor-location-archive product">

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
                                <a href="javascript:IRON.sonaar.player.setPlayerAndPlay({id:876}) <?php echo get_site_url();?>/stations/"
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
                            <article id="arbitrary-instance-66638ad5c0d15" class="iron_widget_radio">
                                <div class="iron-audioplayer  show-trackartwork srp_hide_player srp_hide_spectro_mobile srp_has_metadata srp_tracklist_play_cover srp_tracklist_play_cover_hover srp_slider_enable srp_favorites_loading"
                                    id="arbitrary-instance-66638ad5c0d15-26ef487abb"
                                    data-id="arbitrary-instance-66638ad5c0d15" data-track-sw-cursor="" data-lazyload=""
                                    data-albums="" 
                                    data-category="all"
                                    data-url-playlist="<?php echo get_site_url();?>/?load=playlist.json&#038;title=&#038;albums=&#038;category=all&#038;posts_not_in=&#038;category_not_in=&#038;feed_title=&#038;feed=&#038;feed_img=&#038;el_widget_id=&#038;artwork=&#038;posts_per_pages=-1&#038;all_category=1&#038;single_playlist=&#038;reverse_tracklist=&#038;audio_meta_field=&#038;repeater_meta_field=&#038;import_file=&#038;rss_items=-1&#038;rss_item_title=&#038;is_favorite=&#038;is_recentlyplayed=&#038;srp_order=date_DESC"
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
                                                <?php foreach ($beats as $key => $beat) { ?>
                                                <div class="swiper-slide" data-post-id="867" data-track-pos="0"
                                                    data-slide-id="0" data-slide-id="0" data-slide-index="0">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg)">
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
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_wc_round_bt"
                                                                        target="_self" title="$0.00" aria-label="$0.00"
                                                                        data-source-post-id="867" data-store-id="0-0"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$0.00</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="867"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="867" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="867" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?php } ?>
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

                                                            <div id="arbitrary-instance-66638ad5c0d15-d05fafce4a-wave"
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
                                        id="playlist_arbitrary-instance-66638ad5c0d15">
                                        <div class="srp_tracklist">
                                            <div class="srp_notfound">
                                                <div class="srp_notfound--title">Sorry, no results.</div>
                                                <div class="srp_notfound--subtitle">Please try another keyword</div>
                                            </div>
                                            <ul class="srp_list"
                                                data-filters="product_cat,product_tag,pa_license,instruments,mood,bpm">
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/867_V-2_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/12/03"
                                                    data-date-formated="December 3, 2022" data-show-date=""
                                                    data-trackTitle="Night&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Abel Cardin&lt;/span&gt;"
                                                    data-artist="Abel Cardin" data-trackID="861" data-trackTime="0:30"
                                                    data-relatedTrack="" data-post-url="" data-post-id="867"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/861_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_wc_round_bt"
                                                                        target="_self" title="$0.00" aria-label="$0.00"
                                                                        data-source-post-id="867" data-store-id="0-0"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$0.00</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="867"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/night/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="867" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="867" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/875_Claps-and-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/12/02"
                                                    data-date-formated="December 2, 2022" data-show-date=""
                                                    data-trackTitle="Stomper Snooper&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Vinyl Kiwi&lt;/span&gt;"
                                                    data-artist="Vinyl Kiwi" data-trackID="859" data-trackTime="0:39"
                                                    data-relatedTrack="" data-post-url="" data-post-id="875"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/859_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/stomper-snooper/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="875"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="875"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/stomper-snooper/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="875" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="875" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/870_Surfing-Vlog-Intro-Logo_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/30"
                                                    data-date-formated="November 30, 2022" data-show-date=""
                                                    data-trackTitle="Surfing Vlog&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="863" data-trackTime="0:26"
                                                    data-relatedTrack="" data-post-url="" data-post-id="870"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/863_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Epic-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/surfing-vlog/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="870"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="870"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/surfing-vlog/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="870" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="870" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/868_AtlanticTunes-The-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Atlantic Tunic&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="850" data-trackTime="0:37"
                                                    data-relatedTrack="" data-post-url="" data-post-id="868"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/850_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/AtlanticTunes-The-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="868"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="868"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/atlantic-tunic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="868" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="868" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/871_V-3_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Cloudways"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Test my beat&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;/span&gt;"
                                                    data-artist="" data-trackID="860" data-trackTime="0:22"
                                                    data-relatedTrack="" data-post-url="" data-post-id="871"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/860_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/cloudways/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="871"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cloudways/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="871"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cloudways/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="871" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="871" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/872_Epic-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Epic-Stomp-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Chic Epic&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="848" data-trackTime="0:20"
                                                    data-relatedTrack="" data-post-url="" data-post-id="872"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/848_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Epic-Stomp-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/chic-epic/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="872"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/chic-epic/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="872"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/chic-epic/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="872" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="872" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/873_V-4_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Piper 28&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Fraxx&lt;/span&gt;"
                                                    data-artist="DJ Fraxx" data-trackID="864" data-trackTime="0:15"
                                                    data-relatedTrack="" data-post-url="" data-post-id="873"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/864_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/piper-28/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="873"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/piper-28/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="873"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/piper-28/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="873" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="873" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/876_House-Party-Ident-20sec-FullMix_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="House Party 1993&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="854"
                                                    data-trackTime="0:21" data-relatedTrack="" data-post-url=""
                                                    data-post-id="876" data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/854_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="876"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="876"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="876" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="876" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/877_percussion-30-seconds-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="One Eight Foxtrot&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Avionic Master On&lt;/span&gt;"
                                                    data-artist="Avionic Master On" data-trackID="866"
                                                    data-trackTime="0:31" data-relatedTrack="" data-post-url=""
                                                    data-post-id="877" data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/866_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="877"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="877"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/one-eight-foxtrot/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="877" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="877" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/878_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="878"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/driving-the-city/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="878"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="878"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/driving-the-city/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="878" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="878" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/879_Fun-Advert-Full_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Brome&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="853"
                                                    data-trackTime="0:44" data-relatedTrack="" data-post-url=""
                                                    data-post-id="879" data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/853_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/brome/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="879"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/brome/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="879"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/brome/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="879" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="879" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/880_Ambient-Technology-Logo-5-With-Whoosh_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Ambient Mix&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Adele Kurpizov&lt;/span&gt;"
                                                    data-artist="Adele Kurpizov" data-trackID="840"
                                                    data-trackTime="0:12" data-relatedTrack="" data-post-url=""
                                                    data-post-id="880" data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/840_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/ambient-mix/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="880"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="880"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/ambient-mix/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="880" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="880" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/881_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="881"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/sync-storm/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="881"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/sync-storm/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="881"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/sync-storm/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="881" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="881" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/882_Stereo-Nuts-Piano-Hip-Hop-Intro-Main_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Stereo-Nuts-Piano-Hip-Hop-Intro-Main-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Stereo Nuts&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Jamboree&lt;/span&gt;"
                                                    data-artist="DJ Jamboree" data-trackID="857" data-trackTime="0:29"
                                                    data-relatedTrack="" data-post-url="" data-post-id="882"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/857_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Stereo-Nuts-Piano-Hip-Hop-Intro-Main-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/stereo-nuts/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="882"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="882"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/stereo-nuts/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="882" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="882" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/883_Fashion-Intro-2_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Mirroir"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Silence Obscure&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Marie Pier&lt;/span&gt;"
                                                    data-artist="Marie Pier" data-trackID="846" data-trackTime="0:19"
                                                    data-relatedTrack="" data-post-url="" data-post-id="883"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/846_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Fashion-Intro-2-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/silence-obscure/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="883"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="883"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/silence-obscure/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="883" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="883" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/884_A-Fashion-Logo-mp3_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Fashion Distortion&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Grammy&lt;/span&gt;"
                                                    data-artist="DJ Grammy" data-trackID="855" data-trackTime="0:15"
                                                    data-relatedTrack="" data-post-url="" data-post-id="884"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/855_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/fashion-distortion/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="884"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="884"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/fashion-distortion/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="884" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="884" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/885_Pop-Up-Podcast-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Watch Your Back&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Yvon Tessier&lt;/span&gt;"
                                                    data-artist="Yvon Tessier" data-trackID="844" data-trackTime="0:17"
                                                    data-relatedTrack="" data-post-url="" data-post-id="885"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/844_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Pop-Up-Podcast-Intro-Short-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/watch-your-back/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="885"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="885"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/watch-your-back/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="885" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="885" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/886_Stereo-Nuts-Piano-Hip-Hop-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/11/23"
                                                    data-date-formated="November 23, 2022" data-show-date=""
                                                    data-trackTitle="Yfa Cho&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Radial&lt;/span&gt;"
                                                    data-artist="DJ Radial" data-trackID="865" data-trackTime="0:18"
                                                    data-relatedTrack="" data-post-url="" data-post-id="886"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/865_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Ambient-Technology-Logo-5-With-Whoosh-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/yfa-cho/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="886"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="886"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/yfa-cho/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="886" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="886" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_05.mp3"
                                                    data-showloading="1" data-albumTitle="Horizon"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/techno_speaker.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Corporate Demons feat. Luxas&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="165" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="184"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/165.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/techno_speaker-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="184"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="184"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/corporate-demons-feat-luxas/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="184" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="184" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_06.mp3"
                                                    data-showloading="1" data-albumTitle="Eyes Of Us"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/robot_from_future_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Back To The Future feat. ProbCause&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="167" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="186"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/167.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/robot_from_future_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="186"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="186"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/happy-future-feat-probcause/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="186" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="186" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/178_track_09_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Hardhead"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_01.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="War Of The Currents&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="173" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="178"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/173_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_01-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="178"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="178"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/war-of-the-currents/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="178" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="178" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_10.mp3"
                                                    data-showloading="1" data-albumTitle="Phoenix"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_02.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Satoshi Nakamoto Lau&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="175" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="179"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/175.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_02-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="179"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="179"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/satoshi-nakamoto-lau/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="179" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="179" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_02.mp3"
                                                    data-showloading="1" data-albumTitle="Blue"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Native Son Prequel feat. Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="159" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="180"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/159.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="180"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="180"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-prequel-feat-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="180" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="180" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_04.mp3"
                                                    data-showloading="1" data-albumTitle="Downbeat"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/trap–album_cover.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Anima Mundi feat. Russ Liquid&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="163" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="181"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/163.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/trap–album_cover-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="181"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="181"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/anima-mundi-feat-russ-liquid/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="181" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="181" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_01.mp3"
                                                    data-showloading="1" data-albumTitle="Play"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Tempus Illusio&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="157" data-trackTime="0:20"
                                                    data-relatedTrack="" data-post-url="" data-post-id="182"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/157.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/tempus-illusio/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="182"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="182"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/tempus-illusio/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="182" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="182" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_03.mp3"
                                                    data-showloading="1" data-albumTitle="Colorrun"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Native Son feat. Raekwon &amp; Leo Napier&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="161" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="183"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/161.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="183"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="183"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/native-son-feat-raekwon-leo-napier/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="183" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="183" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_07.mp3"
                                                    data-showloading="1" data-albumTitle="Moodburst"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/Lemarcitus_album_cover_201637d1-145d-42ba-bd8f-0852d6fe7882.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Eat Liver! feat. Laibach&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="169" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="185"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/169.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/Lemarcitus_album_cover_201637d1-145d-42ba-bd8f-0852d6fe7882-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="185"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="185"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/eat-liver-feat-laibach/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="185" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="185" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_08.mp3"
                                                    data-showloading="1" data-albumTitle="Greencurved"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_01.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Room 3327&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="171" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="187"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/171.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_01-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/room-3327/"
                                                                        class="song-store sr_store_wc_round_bt srp_wc_variation_button"
                                                                        target="_self" title="$19.99"
                                                                        aria-label="$19.99" data-source-post-id="187"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$19.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/room-3327/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="187"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/room-3327/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="187" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="187" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
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
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/383_Somera_10_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Cinematic Essentials – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="156" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/156_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="0-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/383_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="1"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="1-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/383_Pop-Up-Podcast-Intro-Short_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Watch Your Back&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Yvon Tessier&lt;/span&gt;"
                                                    data-artist="Yvon Tessier" data-trackID="844" data-trackTime="0:17"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="2"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/844_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="2-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/383_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="383"
                                                    data-track-pos="3"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=383"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="383"
                                                                        data-store-id="3-0" data-product_id="383"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="383"
                                                                        data-store-id="3-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-essentials-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="383" data-store-id="3-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="383" data-store-id="3-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/390_Somera_09_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Cinematic Trailer FX – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="155" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/155_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="0-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/390_V-3_preview.mp3"
                                                    data-showloading="1"
                                                    data-albumTitle="Cinematic Trailer FX - SoundKit"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Test my beat&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;/span&gt;"
                                                    data-artist="" data-trackID="860" data-trackTime="0:22"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="1"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/860_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="1-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/390_Stereo-Nuts-Piano-Hip-Hop-Intro-Main_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Stereo Nuts&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Jamboree&lt;/span&gt;"
                                                    data-artist="DJ Jamboree" data-trackID="857" data-trackTime="0:29"
                                                    data-relatedTrack="" data-post-url="" data-post-id="390"
                                                    data-track-pos="2"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/857_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_trailerfx-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=390"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="390"
                                                                        data-store-id="2-0" data-product_id="390"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="390"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/cinematic-trailer-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="390" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="390" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/391_Somera_08_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Drum Kit Megapack – SoundKit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="154" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/154_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="0-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/391_Fun-Advert-Full_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Brome&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Wizo &amp; Lizo&lt;/span&gt;"
                                                    data-artist="Wizo &amp; Lizo" data-trackID="853"
                                                    data-trackTime="0:44" data-relatedTrack="" data-post-url=""
                                                    data-post-id="391" data-track-pos="1"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/853_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="1-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/391_Surfing-Vlog-Intro-Logo_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Surfing Vlog&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="863" data-trackTime="0:26"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="2"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/863_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="2-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="2-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="2-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="2-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/391_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="391"
                                                    data-track-pos="3"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_drumkit-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=391"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="391"
                                                                        data-store-id="3-0" data-product_id="391"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="391"
                                                                        data-store-id="3-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/drum-kit-megapack-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="391" data-store-id="3-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="391" data-store-id="3-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/392_Somera_07_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Somera"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_horror-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Horror FX – Soundkit&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Audience™&lt;/span&gt;"
                                                    data-artist="Audience™" data-trackID="153" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="392"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/153_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_horror-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="0-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="0-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="0-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="0-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/392_Claps-and-Stomp_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Electro Funko"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_horror-2.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Stomper Snooper&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Vinyl Kiwi&lt;/span&gt;"
                                                    data-artist="Vinyl Kiwi" data-trackID="859" data-trackTime="0:39"
                                                    data-relatedTrack="" data-post-url="" data-post-id="392"
                                                    data-track-pos="1"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/859_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2021/03/soundkit_horror-2-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/beats/house-party-1993/?add-to-cart=392"
                                                                        class="song-store add_to_cart_button ajax_add_to_cart sr_store_wc_round_bt"
                                                                        target="_self" title="$39.99"
                                                                        aria-label="$39.99" data-source-post-id="392"
                                                                        data-store-id="1-0" data-product_id="392"
                                                                        tabindex="1"><i
                                                                            class="fas fa-cart-plus"></i><span
                                                                            class="srp_cta_label">$39.99</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="392"
                                                                        data-store-id="1-1" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/beats/horror-fx-soundkit/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="392" data-store-id="1-2"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="392" data-store-id="1-3"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/483_Upbeat-Snaps_preview.mp3"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Driving the city&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Mike Ruzin&lt;/span&gt;"
                                                    data-artist="Mike Ruzin" data-trackID="862" data-trackTime="0:36"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/862_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/Black-Magic-mp3-image-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="0-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="0-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="0-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/2021/03/track_09.mp3"
                                                    data-showloading="1" data-albumTitle="Hardhead"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="War Of The Currents&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="173" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="1"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/173.peak"
                                                    data-peakFile-allow="1" data-is-preview="" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/daftfunk_01-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="1-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="1-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="1-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/483_Ambient-Technology-Logo-5-With-Whoosh_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Syndrome"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_02.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Ambient Mix&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Adele Kurpizov&lt;/span&gt;"
                                                    data-artist="Adele Kurpizov" data-trackID="840"
                                                    data-trackTime="0:12" data-relatedTrack="" data-post-url=""
                                                    data-post-id="483" data-track-pos="2"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/840_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/03/music_album_02-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="2-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="2-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="2-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/483_track_05_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Horizon"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/electronic-PhotoRoom.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Corporate Demons feat. Luxas&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Gramatik&lt;/span&gt;"
                                                    data-artist="Gramatik" data-trackID="165" data-trackTime="0:25"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="3"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/165_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/electronic-PhotoRoom-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="3-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="3-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="3-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/483_percussion-full-version_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Goliath V1"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image.png"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Sync Storm&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Snooze&lt;/span&gt;"
                                                    data-artist="DJ Snooze" data-trackID="852" data-trackTime="0:43"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="4"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/852_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2022/11/1-The-Piano-Intro-mp3-image-150x150.png
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="4-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="4-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="4-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo get_site_url();?>/wp-content/uploads/audio_preview/483_V-5_preview.mp3"
                                                    data-showloading="1" data-albumTitle="Black Sub"
                                                    data-albumArt="<?php echo get_site_url();?>/wp-content/uploads/2023/05/techno_speaker.jpg"
                                                    data-releasedate="" data-date="2022/03/09"
                                                    data-date-formated="March 9, 2022" data-show-date=""
                                                    data-trackTitle="Quntis Animantis&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by DJ Radial&lt;/span&gt;"
                                                    data-artist="DJ Radial" data-trackID="836" data-trackTime="0:08"
                                                    data-relatedTrack="" data-post-url="" data-post-id="483"
                                                    data-track-pos="5"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/836_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src=<?php echo get_site_url();?>/wp-content/uploads/2023/05/techno_speaker-150x150.jpg
                                                                alt="track-artwork" />
                                                        </div><span class="store-list">
                                                            <div class="song-store-list-menu"><i
                                                                    class="fas fa-ellipsis-v"></i>
                                                                <div class="song-store-list-container"><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_pl_bt srp_hidden sr_store_wc_round_bt"
                                                                        target="_self" title="View Beat"
                                                                        aria-label="View Beat" data-source-post-id="483"
                                                                        data-store-id="5-0" tabindex="1"><i
                                                                            class="sricon-info"></i><span
                                                                            class="srp_cta_label">View Beat</span></a><a
                                                                        href="<?php echo get_site_url();?>/playlist/playlist-of-the-year/"
                                                                        class="song-store sr_store_force_share_bt"
                                                                        target="_self" title="Share" aria-label="Share"
                                                                        data-source-post-id="483" data-store-id="5-1"
                                                                        tabindex="1"><i class="sricon-share"></i></a><a
                                                                        href="#" class="song-store srp-fav-bt"
                                                                        target="_self" title="Like" aria-label="Like"
                                                                        data-source-post-id="483" data-store-id="5-2"
                                                                        tabindex="1"><i
                                                                            class="sricon-heart-fill"></i></a></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="srp_track_description"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <script id="srp_js_params_66638ad5c0d15">
                                var srp_player_params_66638ad5c0d15 = {
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
                                var srp_player_params_args_66638ad5c0d15 = {
                                    "before_widget": "<article id=\"arbitrary-instance-66638ad5c0d15\" class=\"iron_widget_radio\">",
                                    "after_widget": "<\/article>",
                                    "before_title": "<span class='heading-t3'><\/span><h3 class=\"widgettitle\">",
                                    "after_title": "<\/h3>",
                                    "widget_id": "arbitrary-instance-66638ad5c0d15"
                                }
                                </script>
                                <script>
                                if (typeof setIronAudioplayers !== "undefined") {
                                    setIronAudioplayers("arbitrary-instance-66638ad5c0d15");
                                }
                                </script>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-58632d6 e-flex e-con-boxed e-con e-parent" data-id="58632d6"
                data-element_type="container">
                <div class="e-con-inner">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>