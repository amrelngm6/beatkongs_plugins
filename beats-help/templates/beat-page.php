<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include plugin_dir_path(__FILE__) .'../includes/Music/MediansTrack.php';
include plugin_dir_path(__FILE__) . '../includes/Class/BeatPrice.php';
global $wp_query;

$beat = $wp_query->queried_object;
$class = new BeatPrice;
$postMeta = get_metadata( 'post', $beat->ID); 
$class->setDefaultValue($postMeta);
$lowestPrice = $class->getLowestPrice($postMeta) ?? 0;
$beatLicense = new BeatLicense;
?>
<?php get_header(); ?>
<link rel='stylesheet' id='srp-swiper-style-css'
    href='<?php echo get_site_url(); ?>/wp-content/plugins/sonaar-music-pro/public/css/swiper-bundle.min.css?ver=9.3.2'
    media='all' />

<link rel='stylesheet' id='elementor-post-49-css'
    href='<?php echo get_site_url(); ?>/wp-content/uploads/elementor/css/post-49.css?ver=1715796648' media='all' />
<style id='elementor-frontend-inline-css'>
.elementor .elementor-element.elementor-element-48f0b11::before,
.elementor-49 .elementor-element.elementor-element-48f0b11>.elementor-background-video-container::before,
.elementor-49 .elementor-element.elementor-element-48f0b11>.e-con-inner>.elementor-background-video-container::before,
.elementor-49 .elementor-element.elementor-element-48f0b11>.elementor-background-slideshow::before,
.elementor-49 .elementor-element.elementor-element-48f0b11>.e-con-inner>.elementor-background-slideshow::before,
.elementor-49 .elementor-element.elementor-element-48f0b11>.elementor-motion-effects-container>.elementor-motion-effects-layer::before {
    background-image: url(<?php echo get_the_post_thumbnail_url($beat->ID);
    ?>);
}

.elementor .price {
    color: #F9901D;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: -0.5px;
}
</style>

<div data-elementor-type="product" data-elementor-id="49"
    class="elementor elementor-49 elementor-location-single post-878 product type-product status-publish has-post-thumbnail product_cat-hiphop product_tag-70s product_tag-new pa_license-basic pa_license-exclusive pa_license-premium pa_license-standard pa_license-unlimited first instock sold-individually shipping-taxable purchasable product-type-variable product">
    <div class="elementor-section-wrap">
        <div class="elementor-element elementor-element-48f0b11 dark-bg e-flex e-con-boxed e-con e-parent"
            data-id="48f0b11" data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-712dfb0 e-con-full e-flex e-con e-child"
                    data-id="712dfb0" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-element elementor-element-8ecabbe e-con-full e-flex e-con e-child"
                        data-id="8ecabbe" data-element_type="container">
                        <div class="elementor-element elementor-element-7f523b7 e-con-full e-flex e-con e-child"
                            data-id="7f523b7" data-element_type="container">
                            <div class="elementor-element elementor-element-6431001 elementor-widget__width-auto elementor-widget elementor-widget-image"
                                data-id="6431001" data-element_type="widget" data-widget_type="image.default">
                                <div class="elementor-widget-container">
                                    <img fetchpriority="high" width="400" height="400"
                                        src="<?php echo get_the_post_thumbnail_url($beat->ID); ?>"
                                        class="attachment-large size-large wp-image-1058" alt=""
                                        srcset="<?php echo get_the_post_thumbnail_url($beat->ID); ?> 400w, <?php echo get_the_post_thumbnail_url($beat->ID); ?> 100w, <?php echo get_the_post_thumbnail_url($beat->ID); ?> 150w, <?php echo get_the_post_thumbnail_url($beat->ID); ?> 300w"
                                        sizes="(max-width: 400px) 100vw, 400px" />
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-a060d77 e-con-full e-flex e-con e-child"
                            data-id="a060d77" data-element_type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-f8d6da7 elementor-widget__width-initial elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
                                data-id="f8d6da7" data-element_type="widget"
                                data-widget_type="woocommerce-product-title.default">
                                <div class="elementor-widget-container">
                                    <h1
                                        class="product_title entry-title elementor-heading-title elementor-size-default">
                                        <?php echo $beat->post_title; ?></h1>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-af00b6d elementor-widget elementor-widget-heading"
                                data-id="af00b6d" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <p class="elementor-heading-title elementor-size-default">Produced By:</p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-e4d4501 elementor-widget elementor-widget-heading"
                                data-id="e4d4501" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"><a
                                            href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author_meta('user_login', $beat->post_author); ?>"><?php echo get_the_author_meta('display_name', $beat->post_author); ?></a></div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-a862d5c e-flex e-con-boxed e-con e-child"
                                data-id="a862d5c" data-element_type="container">
                                <div class="e-con-inner">
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-c252ce8 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="c252ce8" data-element_type="widget" data-widget_type="icon-list.default">
                                <div class="elementor-widget-container">
                                    <link rel="stylesheet"
                                        href="<?php echo get_site_url(); ?>/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="far fa-clock"></i> </span>
                                            <span class="elementor-icon-list-text"><?php echo date("M d, Y", strtotime($beat->post_date)); ?></span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="far fa-list-alt"></i> </span>
                                            <span class="elementor-icon-list-text"></span>
                                        </li>
                                        <li class="elementor-icon-list-item">

                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="far fa-grin"></i> </span>
                                            <span class="elementor-icon-list-text flex gap-2 w-full"> 
											<?php 
                                                $selectedCategory = wp_get_post_terms( $beat->ID, 'category');
                                                $selectedTags = wp_get_post_terms( $beat->ID, 'tag');
                                                foreach ($selectedCategory as $key => $value) {
                                            ?>
                                            <a	style="width: auto"
													href="<?php echo get_site_url(); ?>/stations/<?php echo $value->slug; ?>"
													rel="tag"><?php echo $value->name; ?></a>
                                            <?php  } ?>
											</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-drum"></i> </span>
                                            <span class="elementor-icon-list-text"><?php echo $postMeta['beat_bpm'][0] ?? '0'; ?> BPM</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="far fa-eye"></i> </span>
                                            <span class="elementor-icon-list-text"><?php echo $postMeta['_eael_post_view_count'][0] ?? '0'; ?> Views</span>
                                        </li>
										
										<?php $beatMP3 = wp_get_attachment_url(get_post_meta($beat->ID, 'beat_mp3', true)); ?> 
										<?php if (get_post_meta($beat->ID, 'beat_downloadable',  true) == 'on' || $class->getLowestPrice($postMeta) == 'FREE') { ?>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
											<i class="fas fa-download"></i> </span>
                                            <span class="elementor-icon-list-text">
											<a
											href="<?php echo str_replace(['.mp3','.wav'], ['_preview.mp3', '_preview.wav'], $beatMP3); ?>"
											class="song-store sr_store_wc_round_bt"
											target="_blank"	
											data-source-post-id="<?php echo $beat->ID;?>" 
											tabindex="1" download="<?php echo $beat->post_title; ?>">Download</a>
											</span>
                                        </li>
										<?php } ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-e12dc8e sr_track_inline_cta_bt__yes elementor-widget elementor-widget-music-player"
                                data-id="e12dc8e" data-element_type="widget" data-widget_type="music-player.default">
                                <div class="elementor-widget-container">
                                    <article id="arbitrary-instance-667089de45454" class="iron_widget_radio">
                                        <div class="iron-audioplayer  sonaar-no-artwork srp_player_spectrum srp_post_player playlist_has_no_ctas srp_favorites_loading"
                                            id="arbitrary-instance-667089de45454-fcadeb64e7"
                                            data-id="arbitrary-instance-667089de45454" data-track-sw-cursor=""
                                            data-lazyload="1" 
											data-albums="<?php echo $beat->ID; ?>" data-category=""
                                            data-url-playlist="<?php echo get_site_url(); ?>/?load=beat.json&#038;beat_id=<?php echo $beat->ID; ?>&#038;title=&#038;albums=<?php echo $beat->ID; ?>&#038;category=&#038;posts_not_in=&#038;category_not_in=&#038;feed_title=&#038;feed=&#038;feed_img=&#038;el_widget_id=&#038;artwork=&#038;posts_per_pages=-1&#038;all_category=&#038;single_playlist=1&#038;reverse_tracklist=&#038;audio_meta_field=&#038;repeater_meta_field=&#038;import_file=&#038;rss_items=-1&#038;rss_item_title=&#038;is_favorite=&#038;is_recentlyplayed=&#038;srp_order=date_DESC"
                                            data-sticky-player="1" data-shuffle="" data-playlist_title=""
                                            data-scrollbar="" data-wave-color="#0C0C0C"
                                            data-wave-progress-color="#F9901D"
                                            data-spectro="color1:#FFFFFF|color2:|shadow:|barCount:40|barWidth:4|barGap:2|canvasHeight:40|halign:flex-end|valign:|spectroStyle:bars|sharpFx:|reflectFx:yes|gradientDirection:|enableOnTracklist:true|bounceClass:|bounceBlur:"
                                            data-no-wave="" data-hide-progressbar="" data-progress-bar-style=""
                                            data-feedurl="0" data-notrackskip="" data-no-loop-tracklist=""
                                            data-playertemplate="skin_boxed_tracklist" data-hide-artwork="1"
                                            data-speedrate="1" data-tracks-per-page="" data-pagination_scroll_offset=""
                                            data-adaptive-colors="" data-adaptive-colors-freeze="" style="opacity:0;">
                                            <div class="srp_player_boxed srp_player_grid">
                                                <div class="album-player sr_waveform_mediaElement">
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

                                                                    <div id="arbitrary-instance-667089de45454-4794973b8a-wave"
                                                                        class="wave">

                                                                        <div class="sonaar_fake_wave"
                                                                            style="height:70px">
                                                                            <audio src=""
                                                                                class="sonaar_media_element"></audio>
                                                                            <div class="sonaar_wave_base">
                                                                                <canvas id="sonaar_wave_base_canvas"
                                                                                    class="" height="70"
                                                                                    width="2540"></canvas>
                                                                                <svg></svg>
                                                                            </div>
                                                                            <div class="sonaar_wave_cut">
                                                                                <canvas id="sonaar_wave_cut_canvas"
                                                                                    class="" height="70"
                                                                                    width="2540"></canvas>
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="totalTime"></div>

                                                                </div>
                                                            </div>
                                                            <div class="srp_main_control">
                                                                <div class="control">
                                                                    <div class="play" style="opacity:0;"
                                                                        aria-label="Play">
                                                                        <i class="sricon-play"></i>
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
                                                id="playlist_arbitrary-instance-667089de45454">
                                                <div class="srp_tracklist">
                                                    <div class="srp_notfound">
                                                        <div class="srp_notfound--title">Sorry, no results.</div>
                                                        <div class="srp_notfound--subtitle">Please try another keyword
                                                        </div>
                                                    </div>
<?php 
$beatMP3Id = $postMeta['beat_mp3'][0] ?? 0;
$beatMP3 = wp_get_attachment_url($beatMP3Id); 
?>

                                                    <ul class="srp_list"
                                                        data-filters="product_cat,product_tag,pa_license,instruments,mood,bpm">
                                                        <li class="sr-playlist-item"
                                                            data-audiopath="<?php echo $beatMP3; ?>"
                                                            data-showloading="1" 
                                                            data-albumTitle="<?php echo $beat->post_title; ?>"
															data-albumArt="<?php echo get_the_post_thumbnail_url($beat->ID); ?>"
                                                            data-releasedate="" data-date="<?php echo date("Y-m-d", strtotime($beat->post_date)); ?>"
                                                            data-date-formated="<?php echo date("M d, Y", strtotime($beat->post_date)); ?>" data-show-date=""
                                                            data-trackTitle="<?php echo $beat->post_title; ?>&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;br&gt; Produced by <?php echo get_the_author_meta('display_name', $beat->post_author); ?>&lt;/span&gt;"
                                                            data-artist="<?php echo get_the_author_meta('display_name', $beat->post_author); ?>" data-trackID="<?php echo $postMeta['beat_mp3'][0] ?? '0'; ?>"
                                                            data-trackTime="00:00" data-relatedTrack="" data-post-url=""
                                                            data-post-id="<?php echo $beat->ID; ?>" data-track-pos="0"
                                                            data-peakFile="<?php echo get_site_url(); ?>/wp-content/uploads/audio_peaks/<?php echo $beat->ID; ?>_preview.peak"
                                                            data-peakFile-allow="1" data-is-preview="1"
                                                            data-track-lyric="" data-icecast_json=""
                                                            data-icecast_mount="">
                                                            <div class="sr-playlist-item-flex"><span
                                                                    class="store-list"></span></div>
                                                            <div class="srp_track_description"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="srp_js_params_667089de45454">
                                        var srp_player_params_667089de45454 = {
                                            "title": "",
                                            "store_title_text": "",
                                            "albums": "0",
                                            "hide_artwork": "true",
                                            "sticky_player": "1",
                                            "show_album_market": "false",
                                            "show_track_market": "false",
                                            "hide_timeline": "false",
                                            "elementor": "true",
                                            "tracks_per_page": "",
                                            "titletag_soundwave": "div",
                                            "titletag_playlist": "",
                                            "show_control_on_hover": "false",
                                            "show_playlist": "false",
                                            "reverse_tracklist": "",
                                            "wave_color": "#0C0C0C",
                                            "wave_progress_color": "#F9901D",
                                            "spectro": "color1:#FFFFFF|color2:|shadow:|barCount:40|barWidth:4|barGap:2|canvasHeight:40|halign:flex-end|valign:|spectroStyle:bars|sharpFx:|reflectFx:yes|gradientDirection:|enableOnTracklist:true|bounceClass:|bounceBlur:",
                                            "shuffle": "",
                                            "searchbar": "",
                                            "searchbar_placeholder": "",
                                            "player_layout": "skin_boxed_tracklist",
                                            "show_skip_bt": "false",
                                            "show_speed_bt": "false",
                                            "show_volume_bt": "false",
                                            "show_shuffle_bt": "false",
                                            "show_publish_date": "false",
                                            "force_cta_dl": "false",
                                            "force_cta_singlepost": "false",
                                            "force_cta_share": "default",
                                            "force_cta_favorite": "default",
                                            "cta_track_show_label": "default",
                                            "show_meta_duration": "false",
                                            "show_tracks_count": "true",
                                            "use_play_label": "default",
                                            "hide_trackdesc": "1",
                                            "artist_wrap": "true",
                                            "album_store_position": "top",
                                            "track_memory": "default",
                                            "tracklist_layout": "list",
                                            "player_metas": "meta_track_title",
                                            "miniplayer_meta_id": "9cce973,",
                                            "hide_track_title": "true",
                                            "artwork": "",
                                            "orderby": "date",
                                            "order": "DESC",
                                            "main_settings": "||"
                                        }
                                        var srp_player_params_args_667089de45454 = {
                                            "before_widget": "<article id=\"arbitrary-instance-667089de45454\" class=\"iron_widget_radio\">",
                                            "after_widget": "<\/article>",
                                            "before_title": "<span class='heading-t3'><\/span><h3 class=\"widgettitle\">",
                                            "after_title": "<\/h3>",
                                            "widget_id": "arbitrary-instance-667089de45454"
                                        }
                                        </script>
                                        <script>
                                        if (typeof setIronAudioplayers !== "undefined") {
                                            setIronAudioplayers("arbitrary-instance-667089de45454");
                                        }
                                        </script>
                                    </article>
                                </div>
                            </div>
<?php 							
if ($lowestPrice != 'FREE') { 
$list = $beatLicense->loadBeatLicensesVariations($beat->ID);
?>
<div class="elementor-element elementor-element-59a6ae0 elementor-widget elementor-widget-woocommerce-product-price"
	data-id="59a6ae0" data-element_type="widget"
	data-widget_type="woocommerce-product-price.default">
	<div class="elementor-widget-container">
		<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span
						class="woocommerce-Price-currencySymbol">&#36;</span><?php echo $lowestPrice; ?></bdi></span>
		</p>
		

	</div>
</div>
                            <div class="elementor-element elementor-element-203e9b0 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="203e9b0" data-element_type="widget" data-widget_type="icon-list.default">
                                <div class="elementor-widget-container">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-check"></i> </span>
                                            <span class="elementor-icon-list-text">Full License Included</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-check"></i> </span>
                                            <span class="elementor-icon-list-text">Instant Download After
                                                Purchase</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-check"></i> </span>
                                            <span class="elementor-icon-list-text">One-Time Payment - No
                                                Subscription</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-check"></i> </span>
                                            <span class="elementor-icon-list-text">High Quality Files</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="fas fa-check"></i> </span>
                                            <span class="elementor-icon-list-text">Download Files Instantly</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-246ce43 elementor-add-to-cart--align-center elementor-add-to-cart-tablet--align-left elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-woocommerce-product-add-to-cart"
                                data-id="246ce43" data-element_type="widget"
                                data-widget_type="woocommerce-product-add-to-cart.default">
                                <div class="elementor-widget-container">

                                    <div class="elementor-add-to-cart elementor-product-variable">
										
										
										<form class="variations_forms cart"
                                            action="" method="post"
                                            enctype='multipart/form-data' data-product_id="<?php echo $beat->ID; ?>"
											data-product_variations='<?php echo str_replace('"', '&quot;', json_encode(array_values($list))) ; ?>'> 

                                            <table  cellspacing="0" role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <th class="label"><label for="beat_license" style="color:#333">License</label></th>
                                                        <td class="value">

                                                            <select id="beat_license" class="" style=" color: var(--e-global-color-07ebab1);background-color: var(--e-global-color-a6a1e3e);border-radius: 84px;padding: 15px;margin: 0 15px;" name="attribute_pa_license"
                                                                >
                                                                <option value="">Choose an option</option>
																<?php foreach ($list as $license) { ?>
																	<option data-price="<?php echo $license->display_price;?>" value="<?php echo $license->post_name;?>"><?php echo $license->title;?></option>
																<?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="single_variation_wrap">
                                                <div class="woocommerce-variation single_variation"></div>
                                                <div class="woocommerce-variation-add-to-cart variations_button">
                                                    <input type="hidden" name="wps_wpr_verify_cart_nonce"
                                                        value="2c8b7e5fa3">

                                                    <div class="quantity">
                                                        <label class="screen-reader-text"
                                                            for="quantity_667089de51980"><?php echo $beat->post_title; ?>
                                                            quantity</label>
                                                        <input type="hidden" id="quantity_667089de51980"
                                                            class="input-text qty text" name="quantity" value="1"
                                                            aria-label="Product quantity" size="4" min="1" max="1"
                                                            step="1" placeholder="" inputmode="numeric"
                                                            autocomplete="off" />
                                                    </div>
													<p class="price" id="license-price"></p>
                                                    <button type="submit"
                                                        class="single_add_to_cart_button button alt wp-element-button">Add
                                                        to cart</button>


                                                    <input type="hidden" name="add-to-cart" value="<?php echo $beat->ID; ?>" />
                                                    <input type="hidden" name="product_id" value="<?php echo $beat->ID; ?>" />
                                                    <input type="hidden" name="variation_id" class="variation_id"
                                                        value="0" />
                                                </div>
                                            </div>

                                        </form>
                                        <div class="ppc-button-wrapper">
											<div id="ppc-button-ppcp-gateway"></div>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
<?php } else {?>
							
							<div class="elementor-element elementor-element-59a6ae0 elementor-widget elementor-widget-woocommerce-product-price"
                                data-id="59a6ae0" data-element_type="widget"
                                data-widget_type="woocommerce-product-price.default">
                                <div class="elementor-widget-container">
                                    <p class="price"><span class="woocommerce-Price-amount amount"><bdi><?php echo $lowestPrice; ?></bdi></span>
                                    </p>
                                </div>
                            </div>
<?php } ?>

                            <div class="elementor-element elementor-element-d75336f e-con-full e-flex e-con e-child"
                                data-id="d75336f" data-element_type="container">
                                <div class="elementor-element elementor-element-c833602 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                    data-id="c833602" data-element_type="widget" data-widget_type="divider.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-divider">
                                            <span class="elementor-divider-separator">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-c50d8ee e-con-full e-flex e-con e-child"
                        data-id="c50d8ee" data-element_type="container">
                        <div class="elementor-element elementor-element-87a931c elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
                            data-id="87a931c" data-element_type="widget"
                            data-widget_type="woocommerce-product-title.default">
                            <div class="elementor-widget-container">
                                <h1 class="product_title entry-title elementor-heading-title elementor-size-default">
                                    Share "<?php echo $beat->post_title; ?>"</h1>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-75ed2d1 elementor-share-buttons--view-icon elementor-share-buttons--skin-flat elementor-share-buttons--shape-circle elementor-share-buttons--align-center elementor-share-buttons--color-custom elementor-share-buttons-tablet--align-center elementor-share-buttons-mobile--align-left elementor-grid-0 elementor-widget elementor-widget-share-buttons"
                            data-id="75ed2d1" data-element_type="widget" data-widget_type="share-buttons.default">
                            <div class="elementor-widget-container">
                                <link rel="stylesheet"
                                    href="https://beatkongs.com/test/wp-content/plugins/elementor-pro/assets/css/widget-share-buttons.min.css">
                                <div class="elementor-grid">
                                    <div class="elementor-grid-item">
                                        <div class="elementor-share-btn elementor-share-btn_facebook" tabindex="0"
                                            aria-label="Share on facebook">
                                            <span class="elementor-share-btn__icon">
                                                <i class="fab fa-facebook" aria-hidden="true"></i> </span>
                                        </div>
                                    </div>
                                    <div class="elementor-grid-item">
                                        <div class="elementor-share-btn elementor-share-btn_email" tabindex="0"
                                            aria-label="Share on email">
                                            <span class="elementor-share-btn__icon">
                                                <i class="fas fa-envelope" aria-hidden="true"></i> </span>
                                        </div>
                                    </div>
                                    <div class="elementor-grid-item">
                                        <div class="elementor-share-btn elementor-share-btn_twitter" tabindex="0"
                                            aria-label="Share on twitter">
                                            <span class="elementor-share-btn__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div data-elementor-type="product" data-elementor-id="49"
	class="elementor elementor-49 elementor-location-single post-383 product type-product status-publish has-post-thumbnail product_cat-hiphop product_tag-rap first instock sale downloadable virtual sold-individually purchasable product-type-simple product">
	<div class="elementor-section-wrap">
		<div class="elementor-element elementor-element-48f0b11 dark-bg e-flex e-con-boxed e-con e-parent"
			data-id="48f0b11" data-element_type="container"
			data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="e-con-inner">
				<div class="elementor-element elementor-element-712dfb0 e-con-full e-flex e-con e-child"
					data-id="712dfb0" data-element_type="container"
					data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-element elementor-element-8ecabbe e-con-full e-flex e-con e-child"
						data-id="8ecabbe" data-element_type="container">
						<div class="elementor-element elementor-element-7f523b7 e-con-full e-flex e-con e-child"
							data-id="7f523b7" data-element_type="container">
							<div class="elementor-element elementor-element-6431001 elementor-widget__width-auto elementor-widget elementor-widget-image"
								data-id="6431001" data-element_type="widget" data-widget_type="image.default">
								<div class="elementor-widget-container">
									<img fetchpriority="high" width="500" height="500"
										src="<?php echo get_the_post_thumbnail_url($beat->ID); ?>"
										class="attachment-large size-large wp-image-538" alt=""
										srcset="<?php echo get_the_post_thumbnail_url($beat->ID); ?> 500w, <?php echo get_site_url(); ?>/wp-content/uploads/2021/03/soundkit_cinematic-2-150x150.png 150w, <?php echo get_site_url(); ?>/wp-content/uploads/2021/03/soundkit_cinematic-2-300x300.png 300w, <?php echo get_site_url(); ?>/wp-content/uploads/2021/03/soundkit_cinematic-2-450x450.png 450w, <?php echo get_site_url(); ?>/wp-content/uploads/2021/03/soundkit_cinematic-2-100x100.png 100w"
										sizes="(max-width: 500px) 100vw, 500px" />
								</div>
							</div>
						</div>
						<div class="elementor-element elementor-element-a060d77 e-con-full e-flex e-con e-child"
							data-id="a060d77" data-element_type="container"
							data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-element elementor-element-f8d6da7 elementor-widget__width-initial elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
								data-id="f8d6da7" data-element_type="widget"
								data-widget_type="woocommerce-product-title.default">
								<div class="elementor-widget-container">
									<h1
										class="product_title entry-title elementor-heading-title elementor-size-default">
										<?php echo $beat->post_title; ?></h1>
								</div>
							</div>
							<div class="elementor-element elementor-element-af00b6d elementor-widget elementor-widget-heading"
								data-id="af00b6d" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<div class="elementor-heading-title elementor-size-default"><?php echo get_the_author_meta('display_name', $beat->post_author); ?></div>
								</div>
							</div>
							<div class="elementor-element elementor-element-a862d5c e-flex e-con-boxed e-con e-child"
								data-id="a862d5c" data-element_type="container">
								<div class="e-con-inner">
								</div>
							</div>
							<div class="elementor-element elementor-element-8dcb209 elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-woo-meta--view-inline elementor-widget elementor-widget-woocommerce-product-meta"
								data-id="8dcb209" data-element_type="widget"
								data-widget_type="woocommerce-product-meta.default">
								<div class="elementor-widget-container">
									<div class="product_meta">



										<span class="posted_in detail-container"><span class="detail-label">Genre</span>
											<span class="detail-content">
                                            <?php 
                                                $selectedCategory = wp_get_post_terms( $beat->ID, 'category');
                                                $selectedTags = wp_get_post_terms( $beat->ID, 'tag');
                                                foreach ($selectedCategory as $key => $value) {
                                            ?>
                                            <a
													href="<?php echo get_site_url(); ?>/stations/<?php echo $value->slug; ?>"
													rel="tag"><?php echo $value->name; ?></a>
                                            <?php  } ?>
                                            </span></span>

										<span class="tagged_as detail-container"><span class="detail-label">Tag</span>
											<span class="detail-content"><a
													href="<?php echo get_site_url(); ?>/tag/rap/"
													rel="tag">Rap</a></span></span>


									</div>
								</div>
							</div>
							<div class="elementor-element elementor-element-e12dc8e sr_track_inline_cta_bt__yes elementor-widget elementor-widget-music-player"
								data-id="e12dc8e" data-element_type="widget" data-widget_type="music-player.default">
								<div class="elementor-widget-container">
									<article id="arbitrary-instance-66685c342fde6" class="iron_widget_radio">
										<div class="iron-audioplayer  sonaar-no-artwork srp_player_spectrum srp_post_player playlist_has_no_ctas srp_favorites_loading"
											id="arbitrary-instance-66685c342fde6-e0b330e2e0"
											data-id="arbitrary-instance-66685c342fde6" data-track-sw-cursor=""
											data-lazyload="" data-albums="383" data-category=""
											data-url-playlist="<?php echo get_site_url(); ?>/?load=playlist.json&#038;title=&#038;albums=383&#038;category=&#038;posts_not_in=&#038;category_not_in=&#038;feed_title=&#038;feed=&#038;feed_img=&#038;el_widget_id=&#038;artwork=&#038;posts_per_pages=-1&#038;all_category=&#038;single_playlist=1&#038;reverse_tracklist=&#038;audio_meta_field=&#038;repeater_meta_field=&#038;import_file=&#038;rss_items=-1&#038;rss_item_title=&#038;is_favorite=&#038;srp_order=date_DESC"
											data-sticky-player="1" data-shuffle="" data-playlist_title=""
											data-scrollbar="" data-wave-color="#0C0C0C"
											data-wave-progress-color="#F9901D"
											data-spectro="color1:#FFFFFF|color2:|shadow:|barCount:40|barWidth:4|barGap:2|canvasHeight:40|halign:flex-end|valign:|spectroStyle:bars|sharpFx:|reflectFx:yes|gradientDirection:|enableOnTracklist:true|bounceClass:|bounceBlur:"
											data-no-wave="" data-hide-progressbar="" data-progress-bar-style=""
											data-feedurl="0" data-notrackskip="" data-no-loop-tracklist=""
											data-playertemplate="skin_boxed_tracklist" data-hide-artwork="1"
											data-speedrate="1" data-tracks-per-page="" data-pagination_scroll_offset=""
											data-adaptive-colors="" data-adaptive-colors-freeze="" style="opacity:0;">
											<div class="srp_player_boxed srp_player_grid">
												<div class="album-player sr_waveform_mediaElement">
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

																	<div id="arbitrary-instance-66685c342fde6-60d5d5f40f-wave"
																		class="wave">

																		<div class="sonaar_fake_wave"
																			style="height:70px">
																			<audio src=""
																				class="sonaar_media_element"></audio>
																			<div class="sonaar_wave_base">
																				<canvas id="sonaar_wave_base_canvas"
																					class="" height="70"
																					width="2540"></canvas>
																				<svg></svg>
																			</div>
																			<div class="sonaar_wave_cut">
																				<canvas id="sonaar_wave_cut_canvas"
																					class="" height="70"
																					width="2540"></canvas>
																				<svg></svg>
																			</div>
																		</div>
																	</div>

																	<div class="totalTime"></div>

																</div>
															</div>
															<div class="srp_main_control">
																<div class="control">
																	<div class="play" style="opacity:0;"
																		aria-label="Play">
																		<i class="sricon-play"></i>
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
												id="playlist_arbitrary-instance-66685c342fde6">
												<div class="srp_tracklist">
													<div class="srp_notfound">
														<div class="srp_notfound--title">Sorry, no results.</div>
														<div class="srp_notfound--subtitle">Please try another keyword
														</div>
													</div>
													<ul class="srp_list"
														data-filters="product_cat,product_tag,instruments,mood,bpm">
														<li class="sr-playlist-item sr-playlist-item-flex"
															data-audiopath="" data-showloading=""
															data-albumTitle="<?php echo $beat->post_title; ?>"
															data-albumArt="<?php echo get_the_post_thumbnail_url($beat->ID); ?>"
															data-releasedate="" data-date="2022/03/09"
															data-date-formated="March 9, 2022" data-show-date=""
															data-trackTitle="Track 1&lt;span class=&quot;srp_trackartist&quot;&gt;&lt;/span&gt;"
															data-artist="" data-trackID="" data-trackTime=""
															data-relatedTrack="" data-post-url="" data-post-id="383"
															data-track-pos="0" data-peakFile="" data-peakFile-allow=""
															data-is-preview="" data-track-lyric="" data-icecast_json=""
															data-icecast_mount=""><span class="store-list"></span></li>
													</ul>
												</div>
											</div>
										</div>
										<script id="srp_js_params_66685c342fde6">
											var srp_player_params_66685c342fde6 = { "title": "", "store_title_text": "", "albums": "383", "hide_artwork": "true", "sticky_player": "1", "show_album_market": "false", "show_track_market": "false", "hide_timeline": "false", "elementor": "true", "tracks_per_page": "", "titletag_soundwave": "div", "titletag_playlist": "", "show_control_on_hover": "false", "show_playlist": "false", "reverse_tracklist": "", "wave_color": "#0C0C0C", "wave_progress_color": "#F9901D", "spectro": "color1:#FFFFFF|color2:|shadow:|barCount:40|barWidth:4|barGap:2|canvasHeight:40|halign:flex-end|valign:|spectroStyle:bars|sharpFx:|reflectFx:yes|gradientDirection:|enableOnTracklist:true|bounceClass:|bounceBlur:", "shuffle": "", "searchbar": "", "searchbar_placeholder": "", "player_layout": "skin_boxed_tracklist", "show_skip_bt": "false", "show_speed_bt": "false", "show_volume_bt": "false", "show_shuffle_bt": "false", "show_publish_date": "false", "force_cta_dl": "false", "force_cta_singlepost": "false", "force_cta_share": "default", "force_cta_favorite": "default", "cta_track_show_label": "default", "show_meta_duration": "false", "show_tracks_count": "true", "use_play_label": "default", "hide_trackdesc": "1", "artist_wrap": "true", "album_store_position": "top", "tracklist_layout": "list", "player_metas": "meta_track_title", "miniplayer_meta_id": "9cce973,", "hide_track_title": "true", "artwork": "", "orderby": "date", "order": "DESC", "main_settings": "||" }
											var srp_player_params_args_66685c342fde6 = { "before_widget": "<article id=\"arbitrary-instance-66685c342fde6\" class=\"iron_widget_radio\">", "after_widget": "<\/article>", "before_title": "<span class='heading-t3'><\/span><h3 class=\"widgettitle\">", "after_title": "<\/h3>", "widget_id": "arbitrary-instance-66685c342fde6" }  
										</script>
										<script> 
											if (typeof setIronAudioplayers !== "undefined") { setIronAudioplayers("arbitrary-instance-66685c342fde6"); } 
										</script>
									</article>
								</div>
							</div>
							<div class="elementor-element elementor-element-59a6ae0 elementor-widget elementor-widget-woocommerce-product-price"
								data-id="59a6ae0" data-element_type="widget"
								data-widget_type="woocommerce-product-price.default">
								<div class="elementor-widget-container">
									<p class="price">
                                    <?php echo is_numeric($class->getLowestPrice($postMeta)) ? '$'.$class->getLowestPrice($postMeta) : $class->getLowestPrice($postMeta); ?>
                                    </p>
								</div>
							</div>
							<div class="elementor-element elementor-element-203e9b0 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
								data-id="203e9b0" data-element_type="widget" data-widget_type="icon-list.default">
								<div class="elementor-widget-container">
									<link rel="stylesheet"
										href="<?php echo get_site_url(); ?>/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">
									<ul class="elementor-icon-list-items">
										<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
												<i aria-hidden="true" class="fas fa-check"></i> </span>
											<span class="elementor-icon-list-text">Full License Included</span>
										</li>
										<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
												<i aria-hidden="true" class="fas fa-check"></i> </span>
											<span class="elementor-icon-list-text">Instant Download After
												Purchase</span>
										</li>
										<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
												<i aria-hidden="true" class="fas fa-check"></i> </span>
											<span class="elementor-icon-list-text">One-Time Payment - No
												Subscription</span>
										</li>
										<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
												<i aria-hidden="true" class="fas fa-check"></i> </span>
											<span class="elementor-icon-list-text">High Quality Files</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="elementor-element elementor-element-246ce43 elementor-add-to-cart--align-left elementor-add-to-cart-tablet--align-left elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-woocommerce-product-add-to-cart"
								data-id="246ce43" data-element_type="widget"
								data-widget_type="woocommerce-product-add-to-cart.default">
								<div class="elementor-widget-container">

									<div class="elementor-add-to-cart elementor-product-simple">

										<form class="cart"
											action="<?php echo get_site_url(); ?>/beat/<?php echo $beat->post_name; ?>"
											method="post" enctype='multipart/form-data'>

											<div class="quantity">
												<label class="screen-reader-text" for="quantity_66685c3434798"><?php echo $beat->post_title; ?></label>
												<input type="hidden" id="quantity_66685c3434798"
													class="input-text qty text" name="quantity" value="1"
													aria-label="Product quantity" size="4" min="1" max="1" step="1"
													placeholder="" inputmode="numeric" autocomplete="off" />
											</div>

											<button type="submit" name="add-to-cart" value="383"
												class="single_add_to_cart_button button alt wp-element-button">Add to cart</button>

										</form>

										<div class="ppcp-messages" data-partner-attribution-id="Woo_PPCP"></div>
										<div class="ppc-button-wrapper">
											<div id="ppc-button-ppcp-gateway"></div>
										</div>
									</div>

								</div>
							</div>
							<div class="elementor-element elementor-element-d75336f e-con-full e-flex e-con e-child"
								data-id="d75336f" data-element_type="container">
								<div class="elementor-element elementor-element-c833602 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
									data-id="c833602" data-element_type="widget" data-widget_type="divider.default">
									<div class="elementor-widget-container">
										<div class="elementor-divider">
											<span class="elementor-divider-separator">
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-element elementor-element-c50d8ee e-con-full e-flex e-con e-child"
						data-id="c50d8ee" data-element_type="container">
						<div class="elementor-element elementor-element-87a931c elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
							data-id="87a931c" data-element_type="widget"
							data-widget_type="woocommerce-product-title.default">
							<div class="elementor-widget-container">
								<h1 class="product_title entry-title elementor-heading-title elementor-size-default">
									Share "<?php echo $beat->post_title; ?>"</h1>
							</div>
						</div>
						<div class="elementor-element elementor-element-75ed2d1 elementor-share-buttons--view-icon elementor-share-buttons--skin-flat elementor-share-buttons--shape-circle elementor-share-buttons--align-center elementor-share-buttons--color-custom elementor-share-buttons-tablet--align-center elementor-share-buttons-mobile--align-left elementor-grid-0 elementor-widget elementor-widget-share-buttons"
							data-id="75ed2d1" data-element_type="widget" data-widget_type="share-buttons.default">
							<div class="elementor-widget-container">
								<link rel="stylesheet"
									href="<?php echo get_site_url(); ?>/wp-content/plugins/elementor-pro/assets/css/widget-share-buttons.min.css">
								<div class="elementor-grid">
									<div class="elementor-grid-item">
										<div class="elementor-share-btn elementor-share-btn_facebook" tabindex="0"
											aria-label="Share on facebook">
											<span class="elementor-share-btn__icon">
												<i class="fab fa-facebook" aria-hidden="true"></i> </span>
										</div>
									</div>
									<div class="elementor-grid-item">
										<div class="elementor-share-btn elementor-share-btn_email" tabindex="0"
											aria-label="Share on email">
											<span class="elementor-share-btn__icon">
												<i class="fas fa-envelope" aria-hidden="true"></i> </span>
										</div>
									</div>
									<div class="elementor-grid-item">
										<div class="elementor-share-btn elementor-share-btn_twitter" tabindex="0"
											aria-label="Share on twitter">
											<span class="elementor-share-btn__icon">
												<i class="fab fa-twitter" aria-hidden="true"></i> </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<script>
jQuery(document).on('change', '#beat_license', function(e){
	var selectedOption = $(this).find('option:selected');
	var price = selectedOption.data('price');
	jQuery('#license-price').html('$'+price).show('slow')
})
</script>
<?php get_footer(); ?>