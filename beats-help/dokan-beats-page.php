<?php
/*
Plugin Name: Dokan Vendor Beats Page
Description: A plugin to add a static beats page in the Dokan vendors' dashboard.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


// Add custom menu item to Dokan Vendor Dashboard
add_filter('dokan_get_dashboard_nav', 'add_custom_beats_upload_menu');
function add_custom_beats_upload_menu($urls) {
    $urls['dokan-beats'] = array(
        'title' => __('Beats', 'beat-upload-plugin'),
        'icon'  => '<i class="fas fa-music"></i>',
        'url'   => dokan_get_navigation_url('dokan-beats'),
        'pos'   => 50
    );
    return $urls;
}


// Register a custom rewrite rule
add_action('init', 'register_dokan_beats_page_rewrite_rule');

function register_dokan_beats_page_rewrite_rule() {
    add_rewrite_rule('^import/dokan-beats/?', 'index.php?dokan_beats_page=1', 'top');
    add_rewrite_tag('%dokan_beats_page%', '([^&]+)');
}

// Add query vars
add_filter('query_vars', 'dokan_beats_page_query_vars');

function dokan_beats_page_query_vars($vars) {
    $vars[] = 'dokan_beats_page';
    return $vars;
}

// Template redirect
add_action('template_redirect', 'dokan_beats_page_template_redirect');

function dokan_beats_page_template_redirect() {
    if (get_query_var('dokan_beats_page')) {
        include plugin_dir_path(__FILE__) . 'templates/beats-page.php';
        exit;
    }
}

// Add a new menu item to the Dokan vendor dashboard
add_action('dokan_vendor_dashboard_menu', 'add_dokan_beats_page_menu', 10);

function add_dokan_beats_page_menu($urls) {
    $urls['beats'] = array(
        'title' => __('Beats', 'dokan'),
        'url'   => site_url('/dokan-beats'),
        'icon'  => '<i class="fa fa-music"></i>',
        'pos'   => 190,
    );
    return $urls;
}

// Enqueue scripts for the React component
add_action('wp_enqueue_scripts', 'enqueue_dokan_beats_page_scripts');

function enqueue_dokan_beats_page_scripts() {
     // Enqueue CSS
     wp_enqueue_style('dokan-beats-page-css', plugin_dir_url(__FILE__) . 'assets/css/custom-style.css');
     wp_enqueue_script('dokan-beats-page-js', plugin_dir_url(__FILE__) . 'assets/js/beats-page.js', array('wp-element'), '1.0', true);

    if (is_page() && get_query_var('dokan_beats_page')) {
        wp_enqueue_style('dokan-beats-page-css', plugin_dir_url(__FILE__) . 'assets/css/beats-page.css', array('wp-element'), '1.0', true);
    }
}
