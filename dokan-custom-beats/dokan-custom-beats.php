<?php
/*
Plugin Name: Dokan Custom Product View
Description: Adds a custom product view to the Dokan vendor dashboard.
Version: 1.0
Author: Your Name
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action( 'plugins_loaded', 'dokan_custom_product_view_init' );

function dokan_custom_product_view_init() {
    if ( ! class_exists( 'WeDevs_Dokan' ) ) {
        return;
    }

    add_action( 'dokan_load_custom_template', 'dokan_custom_product_view_load_template' );
    add_action( 'dokan_render_settings_content', 'dokan_custom_product_view_sidebar_menu' );

    function dokan_custom_product_view_sidebar_menu() {
        ?>
        <li class="custom-product-view">
            <a href="<?php echo esc_url( dokan_get_navigation_url( 'custom-product-view' ) ); ?>">
                <?php _e( 'Custom Product View', 'dokan' ); ?>
            </a>
        </li>
        <?php
    }

    function dokan_custom_product_view_load_template( $query_vars ) {
        if ( isset( $query_vars['custom-product-view'] ) ) {
            require_once __DIR__ . '/templates/custom-product-view.php';
            exit;
        }
    }
}
