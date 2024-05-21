<?php
/*
Plugin Name: Dokan Vendor Help Page
Description: A plugin to add a static help page in the Dokan vendors' dashboard.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register a custom rewrite rule
add_action('init', 'register_dokan_help_page_rewrite_rule');

function register_dokan_help_page_rewrite_rule() {
    add_rewrite_rule('^dokan-help/?', 'index.php?dokan_help_page=1', 'top');
    add_rewrite_tag('%dokan_help_page%', '([^&]+)');
}

// Add query vars
add_filter('query_vars', 'dokan_help_page_query_vars');

function dokan_help_page_query_vars($vars) {
    $vars[] = 'dokan_help_page';
    return $vars;
}

// Template redirect
add_action('template_redirect', 'dokan_help_page_template_redirect');

function dokan_help_page_template_redirect() {
    if (get_query_var('dokan_help_page')) {
        include plugin_dir_path(__FILE__) . 'templates/help-page.php';
        exit;
    }
}

// Add a new menu item to the Dokan vendor dashboard
add_action('dokan_vendor_dashboard_menu', 'add_dokan_help_page_menu', 10);

function add_dokan_help_page_menu($urls) {
    $urls['help'] = array(
        'title' => __('Help', 'dokan'),
        'url'   => site_url('/dokan-help'),
        'icon'  => '<i class="fa fa-question-circle"></i>',
        'pos'   => 190,
    );
    return $urls;
}

// Enqueue scripts for the React component
add_action('wp_enqueue_scripts', 'enqueue_dokan_help_page_scripts');

function enqueue_dokan_help_page_scripts() {
    if (is_page() && get_query_var('dokan_help_page')) {
        wp_enqueue_script('dokan-help-page-js', plugin_dir_url(__FILE__) . 'assets/js/help-page.js', array('wp-element'), '1.0', true);
    }
}
