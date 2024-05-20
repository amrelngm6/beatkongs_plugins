<?php
/**
 * Plugin Name: Dokan Custom Beats
 * Description: Adds custom pages for vendor beats to the Dokan dashboard.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: dokan-custom-beats
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register activation hook
register_activation_hook( __FILE__, 'dcb_activate' );
function dcb_activate() {
    // Activation code here
}

// Register deactivation hook
register_deactivation_hook( __FILE__, 'dcb_deactivate' );
function dcb_deactivate() {
    // Deactivation code here
}

// Add custom pages to Dokan vendor dashboard
add_filter( 'dokan_query_var_filter', 'dcb_add_custom_query_vars' );
function dcb_add_custom_query_vars( $query_vars ) {
    $query_vars['vendor-beats'] = 'vendor-beats';
    $query_vars['vendor-beat-upload'] = 'vendor-beat-upload';
    return $query_vars;
}

add_filter( 'dokan_get_dashboard_nav', 'dcb_add_custom_menu_items' );
function dcb_add_custom_menu_items( $urls ) {
    $urls['vendor-beats'] = array(
        'title' => __( 'Vendor Beats', 'dokan-custom-beats' ),
        'icon'  => '<i class="fas fa-music"></i>',
        'url'   => dokan_get_navigation_url( 'vendor-beats' ),
        'pos'   => 55
    );

    $urls['vendor-beat-upload'] = array(
        'title' => __( 'Upload Beat', 'dokan-custom-beats' ),
        'icon'  => '<i class="fas fa-upload"></i>',
        'url'   => dokan_get_navigation_url( '#/vendor-beat-upload' ),
        'pos'   => 56
    );

    return $urls;
}

add_action( 'dokan_load_custom_template', 'dcb_load_custom_templates' );
function dcb_load_custom_templates( $query_vars ) {
    echo 'aaamr444';
    if ( isset( $query_vars['vendor-beats'] ) ) {
        echo 'aaamr2';
        include dirname( __FILE__ ) . '/templates/vendor-beats.php';
    }

    if ( isset( $query_vars['vendor-beat-upload'] ) ) {
        echo 'aaamr3';
        include dirname( __FILE__ ) . '/templates/vendor-beat-upload.php';
    }
}

add_action( 'init', 'dcb_handle_beat_upload' );
function dcb_handle_beat_upload() {
    if ( isset($_POST['beat_title']) && isset($_FILES['beat_file']) ) {
        // Handle file upload and save the beat information
        // Validate and sanitize input data
        $beat_title = sanitize_text_field( $_POST['beat_title'] );
        $beat_file = $_FILES['beat_file'];

        // Handle file upload
        $uploaded = media_handle_upload( 'beat_file', 0 );
        if ( is_wp_error( $uploaded ) ) {
            // Handle upload error
            wp_die( __( 'File upload error: ', 'dokan-custom-beats' ) . $uploaded->get_error_message() );
        } else {
            // Save beat data (you can save it as a custom post type, metadata, etc.)
            // Example: Save as a custom post type
            $beat_post = array(
                'post_title'   => $beat_title,
                'post_type'    => 'beat',
                'post_status'  => 'publish',
                'meta_input'   => array(
                    'beat_file' => $uploaded
                ),
            );
            wp_insert_post( $beat_post );
        }
    }
}
