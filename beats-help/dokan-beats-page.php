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

$beatsErrors = [];
$beatsSucess = [];
include plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
include plugin_dir_path(__FILE__) . 'includes/filters.php';
include plugin_dir_path(__FILE__) . 'includes/inits.php';


// Add custom menu item to Dokan Vendor Dashboard
add_filter('dokan_get_dashboard_nav', 'add_custom_beats_upload_menu');
// Add query vars
add_filter('query_vars', 'dokan_beats_page_query_vars');

// Template redirect
add_action('template_redirect', 'dokan_beats_page_template_redirect');
function dokan_beats_page_template_redirect() {
    global $wp_query;

    $name = $wp_query->query_vars['name'] ?? null;

    if ($name && in_array($name , ['stations2'])) {

        status_header(200); // Ensure HTTP status code is 200
        ob_start(); 
        if ($name == 'stations2') {
            $params = shortcode_atts($_GET, $_GET, 'stations-page');
            include plugin_dir_path(__FILE__) . 'templates/stations-page.php';
        }
        echo ob_get_clean(); // Return the buffered content
        exit();

    }

    if (get_query_var('dokan_beats_page')) {
        echo 'dokan_beats_pagedokan_beats_page';
        include plugin_dir_path(__FILE__) . 'templates/beats-page.php';
        exit;
    }
}


// Register custom rewrite rules
function medians_beats_player_rewrite_rules() {
    add_rewrite_rule(
        '^embed_medians_beat/?$', // Custom slug
        'index.php?embed_medians_beats=1', // Internal query var
        'top'
    );

    add_rewrite_rule(
        '^embed_medians_playlist/?$', // Custom slug
        'index.php?embed_medians_playlist=1', // Internal query var
        'top'
    );
}
add_action('init', 'medians_beats_player_rewrite_rules');


// Enqueue scripts for the React component
add_action('wp_enqueue_scripts', 'enqueue_dokan_beats_page_scripts');
function enqueue_dokan_beats_page_scripts() {
     // Enqueue CSS
     wp_enqueue_style('dokan-beats-page-css2', plugin_dir_url(__FILE__) . 'assets/css/beats-page.css', array('wp-element'), '1.0', true);
    //  wp_enqueue_style('dokan-dashboard-css0', '/wp-content/plugins/dokan-vendor-dashboard/build/main.css');
     wp_enqueue_style('dokan-beats-tailwind-page-css', plugin_dir_url(__FILE__) . 'assets/css/tailwind.min.css');
     wp_enqueue_style('dokan-beats-page-css', '/wp-content/plugins/dokan-lite/assets/css/dokan-product-category-ui.css?ver=1716242573');
    if (isset($_GET['beat_id']))
    {
    }
     wp_enqueue_style('dokan-beats-page-css1', plugin_dir_url(__FILE__) . 'assets/css/custom-style.css');
     wp_enqueue_script('dokan-beats-page-js', plugin_dir_url(__FILE__) . 'assets/js/beats-page.js', array('wp-element'), '1.0', true);
}



// Shortcodes
add_shortcode('beats_page', 'dokan_beats_page_template_view');
add_shortcode('free_beat_upload_page', 'dokan_free_beat_upload_page_template');
add_shortcode('licenses_contracts_page', 'dokan_licenses_contracts_page_template');
add_shortcode('licenses_contracts_edit_page', 'dokan_licenses_contracts_edit_page_template');
add_shortcode('media_page', 'dokan_media_page_template');


add_action( 'dokan_load_category', 'dokan_custom_product_view_load_template' );
function dokan_custom_product_view_load_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/category-popup.php';
}
add_action( 'dokan_load_station', 'dokan_station_popup_template' );
function dokan_station_popup_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/station-popup.php';
}
add_action( 'dokan_load_others_fields', 'dokan_others_fields_template' );
function dokan_others_fields_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/others_fields.php';
}
add_action( 'dokan_load_downloadable_section', 'dokan_downloadable_section_template' );
function dokan_downloadable_section_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/downloadable-section.php';
}








function load_wp_media_files( $page ) {
  // change to the $page where you want to enqueue the script
    // Enqueue WordPress media scripts
    wp_enqueue_media();
}


add_action('wp_enqueue_scripts', 'load_wp_media_files');








function add_custom_meta_boxes() {
    add_meta_box('beat_meta_box', 'Beat Details', 'beat_meta_box_callback', 'beat', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');



add_filter('default_beat_types', 'set_default_beat_types');


add_action('init', 'beats_register_taxonomies');
add_action('init', 'beats_handle_form_submission');
add_action('init', 'beats_license_handle_form_submission');
add_action('init', 'register_beat_post_type');
// add_filter('init', 'register_beat_license_post_type');

function filter_beats_license_by_author($query) {
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'usage-terms') {
        $query->set('author', 1);
    }
}
add_action('pre_get_posts', 'filter_beats_license_by_author');


function enqueue_ajax_validation_script() {
    wp_enqueue_script('ajax-validation-script', plugin_dir_url(__FILE__) . 'assets/js/ajax-validation.js', array('jquery'), '1.0', true);

    // Localize the script with new data
    wp_localize_script('ajax-validation-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('check_slug_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_validation_script');

