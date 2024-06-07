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
           
    <div class="elementor-element elementor-element-d9ec654 e-flex e-con-boxed e-con e-parent" data-id="d9ec654"
        data-element_type="container">
        <div class="e-con-inner">
           
            <?php foreach ($stations as $key => $value) { ?>
        
            <div class="elementor-element elementor-element-3a87ce2 elementor-cta--skin-cover elementor-cta--valign-bottom elementor-widget__width-initial elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action"
                data-id="3a87ce2" data-element_type="widget" data-widget_type="call-to-action.default">
                <div class="elementor-widget-container">
                    <a class="elementor-cta" href="<?php echo get_site_url(); ?>/station/<?php echo $value->slug;?>">
                        <div class="elementor-cta__bg-wrapper">
                            <div class="elementor-cta__bg elementor-bg"
                                style="background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/s0<?php echo $key + 1; ?>.png)">
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