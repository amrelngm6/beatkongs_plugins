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

// Initialize the plugin when all plugins are loaded
add_action( 'plugins_loaded', 'dokan_custom_product_view_init' );

function dokan_custom_product_view_init() {
    if ( ! class_exists( 'WeDevs_Dokan' ) ) {
        return;
    }

    // Hook to add custom menu item to Dokan vendor dashboard
    add_filter( 'dokan_get_dashboard_nav', 'dokan_custom_product_view_sidebar_menu', 10, 1 );

    // Hook to load custom template
    add_action( 'dokan_load_custom_template', 'dokan_custom_product_view_load_template' );
}

// Function to add custom menu item
function dokan_custom_product_view_sidebar_menu( $urls ) {
    $urls['custom-product-view'] = array(
        'title' => __( 'Custom Product View', 'dokan' ),
        'icon'  => '<i class="fas fa-eye"></i>',
        'url'   => dokan_get_navigation_url( 'custom-product-view' ),
        'pos'   => 150,
    );
    return $urls;
}

// Function to load custom template
function dokan_custom_product_view_load_template( $query_vars ) {
    if ( isset( $query_vars['custom-product-view'] ) ) {
        add_action( 'dokan_dashboard_content_before', 'dokan_custom_product_view_content' );
        add_action( 'dokan_dashboard_content_after', 'dokan_custom_product_view_wrap_end' );
        remove_action( 'dokan_dashboard_content_before', 'dokan_account_migration_banner' );
    }
}

// Function to display custom content
function dokan_custom_product_view_content() {
    include __DIR__ . '/templates/custom-product-view.php';
}

// Function to end custom content wrap
function dokan_custom_product_view_wrap_end() {
    // Optional: Add any closing HTML tags if needed
}
?>
