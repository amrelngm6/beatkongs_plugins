<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));

?>

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
           
            <?php foreach ($stations as $key => $value) { ?>
            
                <?php 
                $thumb_id = get_woocommerce_term_meta( $value->term_id, 'thumbnail_id', true );
                $term_img = wp_get_attachment_url(  $thumb_id );
                ?>

            <div class="elementor-element elementor-element-3a87ce2 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="3a87ce2" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="<?php echo get_site_url(); ?>station/<?php echo $value->slug;?>">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(<?php echo $term_img; ?>">
                            </div>
                            <div class="elementor-cta__bg-overlay"></div>
                        </div>
                        <div class="elementor-cta__content">

                            <h2
                                class="elementor-cta__title elementor-cta__content-item elementor-content-item elementor-animated-item--shrink">
                                <?php echo $value->name; ?></h2>

                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>