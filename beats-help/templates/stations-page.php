<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));

?>

<?php get_header(); ?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

<div data-elementor-type="wp-page" class="elementor ">
    <div class="elementor-element elementor-element-8d9b08a e-flex e-con-boxed e-con e-parent" 
        data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-1c9174d e-con-full e-flex e-con e-child" 
                data-element_type="container">
                <div class="elementor-element elementor-element-8818902 e-con-full e-flex e-con e-child"
                    data-id="8818902" data-element_type="container">
                    <div class="elementor-element elementor-element-d5cf088 elementor-widget elementor-widget-heading"
                        data-id="d5cf088" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">Streaming<br>Stations<sup>
                                    NEW</sup></h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-ea5bff6 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                        data-id="ea5bff6" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <style>
                            /*! elementor - v3.21.0 - 08-05-2024 */
                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                background-color: #69727d;
                                color: #fff
                            }

                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                color: #69727d;
                                border: 3px solid;
                                background-color: transparent
                            }

                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                margin-top: 8px
                            }

                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                width: 1em;
                                height: 1em
                            }

                            .elementor-widget-text-editor .elementor-drop-cap {
                                float: left;
                                text-align: center;
                                line-height: 1;
                                font-size: 50px
                            }

                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                display: inline-block
                            }
                            </style>
                            <p>Streaming stations for you to stream, downloand and purchase beats on the go. Always 100%
                                Free!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="elementor-element elementor-element-d9ec654 e-flex e-con-boxed e-con e-parent" data-id="d9ec654"
        data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-f749d74 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="f749d74" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <link rel="stylesheet"
                        href="https://beatkongs.medianssolutions.com/wp-content/plugins/elementor-pro/assets/css/widget-call-to-action.min.css">
                    <a class="elementor-cta" href="https://beatkongs.com/test/stations/beats247/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2023/05/compilation_01.jpg);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                Beats 24/7</h2>
                            <div
                                class="elementor-cta__description elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                All Beats Catalog </div>

                        </div>
                        <div class="elementor-ribbon">
                            <div class="elementor-ribbon-inner">Main </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-0361257 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="0361257" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="https://beatkongs.com/test/product-category/playlists/lofi-hip-hop/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2024/05/OIG1.png);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                Fresh Beats</h2>

                        </div>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-3a87ce2 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="3a87ce2" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="https://beatkongs.com/test/product-category/playlists/edm-music/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2023/05/electronic-PhotoRoom.png);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                EDM Music</h2>

                        </div>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-5f35d8e elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="5f35d8e" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="https://beatkongs.com/test/product-category/playlists/staff-picks/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2023/05/Maxwell_afrobeat_album_cover_ccf0297c-7cf6-4aa0-bcda-6619ce56d326.png);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                Staff Picks</h2>

                        </div>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-8c94950 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="8c94950" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="https://beatkongs.com/test/product-category/playlists/afrobeats/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2023/05/Maxwell_afrobeats_urban_album_cover_with_african_musicians_both_93ecfbfb-d1a8-4ea1-acd1-fb238d96f351.png);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                AfroBeats</h2>

                        </div>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-3cfeb4c elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="3cfeb4c" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="https://beatkongs.com/test/product-category/playlists/afrobeats/">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(https://beatkongs.medianssolutions.com/wp-content/uploads/2022/03/Flipperman_a_heavy_metal_album_cover_by_Sever_the_System_simpli_63b02cdc-cb92-4f20-970e-9961b81db7ed.jpg);">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                Best of the Year</h2>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>