<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include plugin_dir_path(__FILE__) .'../includes/Music/MediansStation.php';

$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));
$ids = array_column($stations, 'term_id');

$term = get_queried_object();

$currentKey = array_search($term->term_id, $ids);

$stationClass = new MediansStation($term);
$beats = $stationClass->loadStationItems();

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
                                    data-url-playlist="<?php echo get_site_url();?>/?load=station.json&station_id=1"
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
                                                <div class="swiper-slide" data-post-id="<?php echo $beat->ID;?>" data-track-pos="0"
                                                    data-slide-id="<?php echo $key;?>" data-slide-index="<?php echo $key;?>">
                                                    <div class="srp_swiper-album-art"
                                                        style="background-image:url(<?php echo get_the_post_thumbnail_url($beat->ID);?>)">
                                                        <div class="srp_swiper_overlay"></div>
                                                        <div class="srp_swiper-control">
                                                            <div class="srp_play" aria-label="Play"><i
                                                                    class="sricon-play"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="srp_swiper-titles">
                                                        <div class="srp_index"><?php echo $key + 1;?></div>
                                                        <div class="srp_swiper-track-title"><?php echo $beat->post_title;?></div>
                                                        <div class="srp_swiper-track-artist"> Produced by <?php echo get_the_author_meta('display_name', $beat->post_author); ?>
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
                                                <?php foreach ($beats as $key => $beat) {     
                                                    $postMeta = get_metadata( 'post', $beat->ID);
                                                    $beatMP3Id = $postMeta['beat_mp3'][0] ?? 0;
                                                    $beatMP3 = wp_get_attachment_url($beatMP3Id);
                                                ?>

                                                <li class="sr-playlist-item"
                                                    data-audiopath="<?php echo $beatMP3;?>"
                                                    data-showloading="1" data-albumTitle="California"
                                                    data-albumArt="<?php echo get_the_post_thumbnail_url($beat->ID);?>"
                                                    data-releasedate="" data-date="2022/12/03"
                                                    data-date-formated="December 3, 2022" data-show-date=""
                                                    data-trackTitle="<?php echo $beat->post_title;?>&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by Cardin&lt;/span&gt;"
                                                    data-artist="Abel Cardin" data-trackID="<?php echo get_post_meta($beat->ID, 'beat_mp3', true); ?>" data-trackTime="0:30"
                                                    data-relatedTrack="" data-post-url="" data-post-id="<?php echo $beat->ID;?>"
                                                    data-track-pos="0"
                                                    data-peakFile="<?php echo get_site_url();?>/wp-content/uploads/audio_peaks/861_preview.peak"
                                                    data-peakFile-allow="1" data-is-preview="1" data-track-lyric=""
                                                    data-icecast_json="" data-icecast_mount="">
                                                    <div class="sr-playlist-item-flex">
                                                        <div class="sr_track_cover">
                                                            <div class="srp_play"><i class="sricon-play"></i></div><img
                                                                src="<?php echo get_the_post_thumbnail_url($beat->ID);?>"
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
                                                <?php } ?>

                                                
                                                
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