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

// Register a custom rewrite rule
add_action('init', 'register_dokan_custom_product_view_rewrite_rule');

function register_dokan_custom_product_view_rewrite_rule() {
    add_rewrite_rule('^dokan-custom-view/?', 'index.php?dokan_custom_product_view=1', 'top');
    add_rewrite_tag('%dokan_custom_product_view%', '([^&]+)');
}

// Initialize the plugin when all plugins are loaded
add_action( 'plugins_loaded', 'dokan_custom_product_view_init' );

function dokan_custom_product_view_init() {
    if ( ! class_exists( 'WeDevs_Dokan' ) ) {
        return;
    }

    // Hook to add custom menu item to Dokan vendor dashboard
    add_filter( 'dokan_get_dashboard_nav', 'dokan_custom_product_view_sidebar_menu', 10, 1 );

    // Hook to add custom query var
    add_filter( 'dokan_query_var_filter', 'dokan_custom_product_view_query_var' );

    // Hook to load custom template
    add_action( 'dokan_load_custom_template', 'dokan_custom_product_view_load_template' );
}

// Function to add custom menu item
function dokan_custom_product_view_sidebar_menu( $urls ) {
    $urls['custom-product-view'] = array(
        'title' => __( 'Custom Product View', 'dokan' ),
        'icon'  => '<i class="fas fa-eye"></i>',
        'url'   => dokan_get_navigation_url( '../custom-product-view' ),
        'pos'   => 150,
    );
    return $urls;
}

// Function to add custom query var
function dokan_custom_product_view_query_var( $query_vars ) {
    $query_vars[] = 'custom-product-view';
    return $query_vars;
}

// Function to load custom template
function dokan_custom_product_view_load_template( $query_vars ) {
    
    $beats_content = '
    <div class="dokan-beats-page">
        <h1>Custom Beats Page</h1>
        <p>Welcome to the beats page. Here you can find useful information and resources to assist you.</p>
        <ul>
            <li><a href="#">Beat 1</a></li>
            <li><a href="#">Beat 2</a></li>
        </ul>
    </div>';
    
    echo $beats_content;
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
