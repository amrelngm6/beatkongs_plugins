<?php

// Add custom menu item to Dokan Vendor Dashboard
add_filter('dokan_get_dashboard_nav', 'add_custom_beats_upload_menu');
function add_custom_beats_upload_menu($urls) {
    $urls['upload-beat'] = array(
        'title' => __('Upload Beat', 'beat-upload-plugin'),
        'icon'  => '<i class="fas fa-music"></i>',
        'url'   => dokan_get_navigation_url('upload-beat'),
        'pos'   => 50
    );
    return $urls;
}

// Load custom template for the beat upload page
add_action('dokan_load_custom_template', 'load_custom_beats_upload_template');
function load_custom_beats_upload_template($query_vars) {

        include plugin_dir_path(__FILE__) . 'templates/template-upload-beat.php';
    if (isset($query_vars['upload-beat'])) {
        include plugin_dir_path(__FILE__) . 'templates/template-upload-beat.php';
    }
}

// Create REST API endpoint for handling beat upload
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/upload-beat', array(
        'methods' => 'POST',
        'callback' => 'handle_beat_upload',
        'permission_callback' => function () {
            return is_user_logged_in() && dokan_is_user_seller(get_current_user_id());
        }
    ));
});

function handle_beat_upload(WP_REST_Request $request) {
    $user_id = get_current_user_id();
    $beat_title = sanitize_text_field($request->get_param('beat_title'));
    $beat_price = floatval($request->get_param('beat_price'));
    $beat_description = sanitize_textarea_field($request->get_param('beat_description'));

    // Handle file upload
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $uploadedfile = $_FILES['beat_file'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

    if ($movefile && !isset($movefile['error'])) {
        $beat_file_url = $movefile['url'];

        $product = new WC_Product_Simple();
        $product->set_name($beat_title);
        $product->set_price($beat_price);
        $product->set_regular_price($beat_price);
        $product->set_description($beat_description);
        $product->set_sku('beat-' . wp_generate_uuid4());
        $product->set_status('publish');
        $product->save();

        update_post_meta($product->get_id(), '_beat_file_url', $beat_file_url);
        wp_set_object_terms($product->get_id(), 'beats', 'product_cat');
        update_post_meta($product->get_id(), '_vendor_id', $user_id);

        return new WP_REST_Response(array('message' => 'Beat uploaded successfully'), 200);
    } else {
        return new WP_Error('upload_error', 'Error uploading file: ' . $movefile['error']);
    }
}

function enqueue_custom_vendor_scripts() {
    if (dokan_is_seller_dashboard()) {
        wp_enqueue_script(
            'babel-standalone',
            'https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js',
            array(),
            null,
            true
        );

        wp_enqueue_script(
            'upload-beat',
            plugin_dir_url(__FILE__) . '../assets/js/upload-beat.transpiled.js',
            array('wp-element', 'wp-api-fetch', 'babel-standalone'),
            null,
            true
        );

        wp_localize_script('upload-beat', 'wpApiSettings', array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        ));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_vendor_scripts');






function custom_register_rest_route() {
    register_rest_route('custom/v1', '/upload-beat', array(
        'methods' => 'POST',
        'callback' => 'custom_handle_upload_beat',
        'permission_callback' => function () {
            return current_user_can('edit_posts');
        }
    ));
}
add_action('rest_api_init', 'custom_register_rest_route');

function custom_handle_upload_beat(WP_REST_Request $request) {
    $beat_title = sanitize_text_field($request->get_param('beat_title'));
    $beat_price = sanitize_text_field($request->get_param('beat_price'));
    $beat_description = sanitize_textarea_field($request->get_param('beat_description'));

    if (empty($_FILES['beat_file'])) {
        return new WP_REST_Response(array('message' => 'No file uploaded'), 400);
    }

    $uploaded_file = $_FILES['beat_file'];
    $upload = wp_handle_upload($uploaded_file, array('test_form' => false));

    if (isset($upload['error'])) {
        return new WP_REST_Response(array('message' => $upload['error']), 400);
    }

    $attachment_id = wp_insert_attachment(array(
        'post_mime_type' => $upload['type'],
        'post_title'     => $beat_title,
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $upload['file']);

    if (is_wp_error($attachment_id)) {
        return new WP_REST_Response(array('message' => 'Error saving attachment'), 500);
    }

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']));

    $post_id = wp_insert_post(array(
        'post_title'   => $beat_title,
        'post_content' => $beat_description,
        'post_status'  => 'publish',
        'meta_input'   => array(
            'beat_price'    => $beat_price,
            'beat_file_id'  => $attachment_id,
        ),
    ));

    if (is_wp_error($post_id)) {
        return new WP_REST_Response(array('message' => 'Error creating beat post'), 500);
    }

    return new WP_REST_Response(array('message' => 'Beat uploaded successfully'), 200);
}
