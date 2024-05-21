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
        'url'   => dokan_get_navigation_url('../beats'),
        'pos'   => 50
    );
    return $urls;
}


// // Register a custom rewrite rule
// add_action('init', 'register_dokan_beats_page_rewrite_rule');

// function register_dokan_beats_page_rewrite_rule() {
//     add_rewrite_rule('^import/beats/?', 'index.php?dokan_beats_page=1', 'top');
//     add_rewrite_tag('%dokan_beats_page%', '([^&]+)');
// }

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
     wp_enqueue_style('dokan-beats-page-css2', plugin_dir_url(__FILE__) . 'assets/css/beats-page.css', array('wp-element'), '1.0', true);
    //  wp_enqueue_style('beats-tailwind-page-css', plugin_dir_url(__FILE__) . 'assets/css/tailwind.css', array('wp-element'), '1.0', true);
     wp_enqueue_style('dokan-beats-page-css', plugin_dir_url(__FILE__) . 'assets/css/custom-style.css');
     wp_enqueue_script('dokan-beats-page-js', plugin_dir_url(__FILE__) . 'assets/js/beats-page.js', array('wp-element'), '1.0', true);
}


add_shortcode('beats_page', 'dokan_beats_page_template_view');
function dokan_beats_page_template_view() {
    include plugin_dir_path(__FILE__) . 'templates/beats-page.php';
}
add_shortcode('free_beat_upload_page', 'dokan_free_beat_upload_page_template');
function dokan_free_beat_upload_page_template() {
    include plugin_dir_path(__FILE__) . 'templates/free-beat-upload-page.php';
}
add_action( 'dokan_load_category', 'dokan_custom_product_view_load_template' );
function dokan_custom_product_view_load_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/category-popup.php';
}
add_action( 'dokan_load_station', 'dokan_station_popup_template' );
function dokan_station_popup_template(  ) {
     include plugin_dir_path(__FILE__) . 'templates/station-popup.php';
}



function fbu_handle_form_submission() {
    if (isset($_POST['fbu-submit'])) {
        $title = sanitize_text_field($_POST['fbu-title']);
        $category = intval($_POST['fbu-category']);
        $station = intval($_POST['fbu-station']);
        $mood = intval($_POST['fbu-mood']);

        $post_id = wp_insert_post(array(
            'post_title' => $title,
            'post_type' => 'free_beat',
            'post_status' => 'publish',
            'tax_input' => array(
                'category' => array($category),
                'station' => array($station),
                'mood' => array($mood)
            )
        ));

        if ($post_id) {
            if (!function_exists('wp_handle_upload')) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            // Handle picture upload
            $picture = $_FILES['fbu-picture'];
            $uploaded_picture = wp_handle_upload($picture, array('test_form' => false));
            if (isset($uploaded_picture['file'])) {
                $wp_filetype = wp_check_filetype($uploaded_picture['file'], null);
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => sanitize_file_name($uploaded_picture['file']),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $uploaded_picture['file'], $post_id);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $uploaded_picture['file']);
                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($post_id, $attach_id);
            }

            // Handle audio file upload
            $audio_file = $_FILES['fbu-audio-file'];
            $uploaded_audio = wp_handle_upload($audio_file, array('test_form' => false));
            if (isset($uploaded_audio['file'])) {
                $wp_filetype = wp_check_filetype($uploaded_audio['file'], null);
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => sanitize_file_name($uploaded_audio['file']),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $uploaded_audio['file'], $post_id);
                require_once(ABSPATH . 'wp-admin/includes/media.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $uploaded_audio['file']);
                wp_update_attachment_metadata($attach_id, $attach_data);
                update_post_meta($post_id, 'fbu_audio_file', $attach_id);
            }
        }
    }

}
add_action('init', 'fbu_handle_form_submission');






function load_wp_media_files( $page ) {
  // change to the $page where you want to enqueue the script
    // Enqueue WordPress media scripts
    wp_enqueue_media();
}


add_action('wp_enqueue_scripts', 'load_wp_media_files');






function fbu_register_taxonomies() {
    // Register Category Taxonomy
    register_taxonomy('category', 'free_beat', array(
        'label' => __('Category'),
        'rewrite' => array('slug' => 'category'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Register Station Taxonomy
    register_taxonomy('station', 'free_beat', array(
        'label' => __('Station'),
        'rewrite' => array('slug' => 'station'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Register Mood Taxonomy
    register_taxonomy('mood', 'free_beat', array(
        'label' => __('Mood'),
        'rewrite' => array('slug' => 'mood'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
    // Register Mood Taxonomy
    register_taxonomy('tag', 'free_beat', array(
        'label' => __('Tag'),
        'rewrite' => array('slug' => 'tag'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'fbu_register_taxonomies');
