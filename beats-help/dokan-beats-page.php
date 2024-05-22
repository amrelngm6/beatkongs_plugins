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



add_action( 'beats_has_errors', 'beats_has_errors' );
function beats_has_errors() 
{
    global $beatsErrors;

    return $beatsErrors;
}



function fbu_handle_form_submission() 
{
    global $beatsErrors;

    if (isset($_POST['upload_beat'])) {
        
        if ( ! function_exists('media_handle_upload') ) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');
        }

        if (isset($_POST['beat_title'])) {
            $title = sanitize_text_field($_POST['beat_title']);
            $type = sanitize_text_field($_POST['beat_type']);
            $categories = sanitize_text_field($_POST['beat_category']);
            $tags = sanitize_text_field($_POST['beat_station']);
            $tags = sanitize_text_field($_POST['beat_tags']);
            $beat_mp3 = sanitize_text_field($_POST['beat_mp3']);
            $beat_picture = sanitize_text_field($_POST['beat_picture']);
            
            if (!$title)
            {
                echo 'Title is empty';
                $beatsErrors = 'Title is empty';
                return;
            }
            
            // Create a new post of custom post type 'beat'
            $beat_post = array(
                'post_title'    => $title,
                'post_content'  => $title,
                'post_status'   => 'publish',
                'post_type'     => 'beat',
                'meta_input'    => array(
                    'beat_type' => $type,
                    'beat_categories' => $categories,
                    'beat_tags' => $tags,
                    'beat_picture' => $beat_picture,
                    'beat_mp3' => $beat_mp3,
                ),
            );
            
            $post_id = wp_insert_post($beat_post);
            
            if ($post_id) {
                set_post_thumbnail($post_id, $beat_picture);
                $response = 'Beat uploaded successfully.';
            } else {
                $response = 'Error uploading beat.';
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





/**
 * Set default product types
 *
 * @since 2.6
 *
 * @param array $beat_types
 *
 * @return $beat_types
 */
function set_default_beat_types( $beat_types ) {
    $beat_types = array(
        'free'   => __( 'Free beat', 'dokan' ),
        'sell' => __( 'Sell beat', 'dokan' ),
    );

    return $beat_types;
}

add_filter('default_beat_types', 'set_default_beat_types');







add_action('init', 'register_beat_post_type');

function register_beat_post_type() {
    $labels = array(
        'name' => 'Beats',
        'singular_name' => 'Beat',
        'menu_name' => 'Beats',
        'name_admin_bar' => 'Beat',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Beat',
        'new_item' => 'New Beat',
        'edit_item' => 'Edit Beat',
        'view_item' => 'View Beat',
        'all_items' => 'All Beats',
        'search_items' => 'Search Beats',
        'parent_item_colon' => 'Parent Beats:',
        'not_found' => 'No beats found.',
        'not_found_in_trash' => 'No beats found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-audio',
    );

    register_post_type('beat', $args);
}