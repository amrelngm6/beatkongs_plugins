<?php


// Add Free Beats nmenu at the Dashboard sidebar
// Also set its related taxonomies 
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
        'taxonomies', array('category', 'tag', 'mood', 'station','author_license'),
        'menu_icon' => 'dashicons-format-audio',
    );

    register_post_type('beat', $args);
}


// Add Beat license nmenu at the Dashboard sidebar
// Also set its related taxonomies 
function register_beat_license_post_type() {
    $labels = array(
        'name' => 'Beats Licenses',
        'singular_name' => 'Beats License',
        'menu_name' => 'Beats Licenses',
        'name_admin_bar' => 'Beats License',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Beats License',
        'new_item' => 'New License',
        'edit_item' => 'Edit License',
        'view_item' => 'View License',
        'all_items' => 'All Beats Licenses',
        'search_items' => 'Search Beats Licenses',
        'parent_item_colon' => 'Parent Beats Licenses:',
        'not_found' => 'No Beats Licenses found.',
        'not_found_in_trash' => 'No Beats Licenses found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor',  'custom-fields'),
        'menu_position' => 5,
        'taxonomies', array('pa_license'),
        'menu_icon' => 'dashicons-format-audio',
    );

    register_post_type('beats_license', $args);
}

// Register custom taxonomies [ Category, Station , Tag , Mood ]
function beats_register_taxonomies() {
    // Register Category Taxonomy
    register_taxonomy('category', 'beat', array(
        'label' => __('Category'),
        'rewrite' => array('slug' => 'category'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Register Station Taxonomy
    register_taxonomy('station', 'beat', array(
        'label' => __('Station'),
        'rewrite' => array('slug' => 'station'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Register Mood Taxonomy
    register_taxonomy('mood', 'beat', array(
        'label' => __('Mood'),
        'rewrite' => array('slug' => 'mood'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
    // Register Mood Taxonomy
    register_taxonomy('tag', 'beat', array(
        'label' => __('Tag'),
        'rewrite' => array('slug' => 'tag'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
    
}



/**
 * Submit new/edit form for beats 
 * Request Type ->  POST
 * 
 * @param upload_beat
 * @return WP_Redirect 
 */
function beats_handle_form_submission() 
{
    global $beatsErrors, $beatsSucess;

    if (isset($_POST['upload_beat'])) {
        
        if ( ! function_exists('media_handle_upload') ) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');
        }

        if (isset($_POST['beat_title'])) {
            $title = sanitize_text_field($_POST['beat_title']);
            $beat_slug = sanitize_text_field($_POST['beat_slug']);
            $type = sanitize_text_field($_POST['beat_type']);
            $category = $_POST['selected_cats'];
            $station = $_POST['selected_stations'];
            $moods = sanitize_text_field($_POST['beat_moods']);
            $tags = sanitize_text_field($_POST['beat_tags']);
            $beat_mp3 = sanitize_text_field($_POST['beat_mp3']);
            $beat_mp3_url = sanitize_text_field($_POST['beat_mp3_url']);
            $beat_picture = sanitize_text_field($_POST['beat_picture']);
            $beat_status = sanitize_text_field($_POST['beat_status']);
            $beat_agreement = sanitize_text_field($_POST['beat_agreement']);
            $beat_visibility = sanitize_text_field($_POST['beat_visibility']);
            $beat_enable_reviews = sanitize_text_field($_POST['beat_enable_reviews']);
            $post_excerpt = sanitize_text_field($_POST['post_excerpt']);
            $post_content = sanitize_text_field($_POST['post_content']);
            $beat_downloadable = sanitize_text_field($_POST['beat_downloadable']);
            $beat_bpm = sanitize_text_field($_POST['beat_bpm']);
            
            if (!$title)
            {
                array_push($beatsErrors, 'Beat Title is required');
            }
            
            if (!$category)
            {
                array_push($beatsErrors, 'Category is required');
            }
            
            if (!$beat_picture) {
                array_push($beatsErrors, 'Picture is required');
            }

            $post_exists = get_page_by_path($beat_slug, OBJECT);
            if (!empty($post_exists))
            {
                array_push($beatsErrors, 'Slug already exists');
            }

            
            if (!empty($beatsErrors))
            {
                return;
            }
            
            // Create a new post of custom post type 'beat'
            $beat_post = array(
                'post_title'    => $title,
                'post_name'     => $beat_slug ?? '',
                'post_status'   => $beat_status ?? 'publish',
                'post_content'  => $post_content ?? '',
                'post_excerpt'  => $post_excerpt ?? '',
                'post_type'     => 'beat',
                'meta_input'    => array(
                    'beat_type' => $type,
                    'beat_picture' => $beat_picture,
                    'beat_mp3' => $beat_mp3,
                    'beat_mp3_url' => $beat_mp3_url,
                    'beat_agreement' => $beat_agreement,
                    'beat_visibility' => $beat_visibility,
                    'beat_enable_reviews' => $beat_enable_reviews,
                    'beat_downloadable' => $beat_downloadable,
                    'beat_bpm' => $beat_bpm,
                ),
            );

            
            if ($type == 'sell')
            {
                $args = array(
                    'post_type' => 'usage-terms',
                    'author'    => 1
                );
                $default_licenses = new WP_Query( $args );
                foreach ($default_licenses->posts as $key => $value) 
                {
                    $url = $value->post_name.'_wc_file_url';
                    $id = $value->post_name.'_wc_file_id';
                    $price = $value->post_name.'_wc_file_price';
                    $beat_post['meta_input'][$url] = sanitize_text_field($_POST[$url]);
                    $beat_post['meta_input'][$id] = sanitize_text_field($_POST[$id]);
                    $beat_post['meta_input'][$price] = sanitize_text_field($_POST[$price]);
                }
            }
            
            if (!empty($_POST['beat_id']))
            {
                $beat_post['ID'] = sanitize_text_field($_POST['beat_id']);
            }
            
            $beatId = isset($beat_post['ID']) ? wp_update_post($beat_post) : wp_insert_post($beat_post);
            
            // Save Category
            $cats = $_POST['selected_cats'] ?? null;
            wp_set_post_terms($beatId, $cats, 'category');
            
            // Save Station
            $stations = $_POST['selected_stations'] ?? null;
            wp_set_post_terms($beatId, $stations, 'station');

            // Save Tags
            $tags = isset($_POST['beat_tags']) ? json_decode(stripslashes($_POST['beat_tags']), true) : '';
            if ($tags) {
                $ids = [];
                foreach ($tags as $key => $value) {
                    $term = term_exists($value['value']);
                    $ids[$key] = $value['value']; 
                }
                $saveTag = wp_set_object_terms($beatId, array_filter($ids), 'tag');
            } else {
                array_push($beatsErrors, 'Tag is required');
            }
            // Save Moods
            $moods = isset($_POST['beat_moods']) ? json_decode(stripslashes($_POST['beat_moods']), true) : '';
            if ($moods) {
                
                $ids = [];
                foreach ($moods as $key => $value) {
                    $term = term_exists($value['value']);
                    $ids[$key] = $value['value']; 
                }
                $saveMood = wp_set_object_terms($beatId, array_filter($ids), 'mood');

            } else {
                array_push($beatsErrors, 'Mood is required');
            }



            if ($beatId) {
                set_post_thumbnail($beatId, $beat_picture);
                wp_redirect(add_query_arg('message', 'success', wp_get_referer()));
                exit;
            }
        }
    }

}


/**
 * Submit Author License edit form
 * Request Type ->  POST
 * 
 * @param beat_license_edit
 * @return WP_Redirect 
 */
function beats_license_handle_form_submission() 
{
    global $beatsErrors, $beatsSucess;

    if (isset($_POST['beat_license_edit'])) {
        
        if ( ! function_exists('media_handle_upload') ) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');
        }

        $title = sanitize_text_field($_POST['license_title']);
        $type = sanitize_text_field($_POST['post_type']);
        $post_parent = sanitize_text_field($_POST['post_parent']);
        $usageterms_filetypes = serialize($_POST['usageterms_filetypes']);
        $usageterms_producer_alias = sanitize_text_field($_POST['usageterms_producer_alias']);
        $usageterms_num_dist_copies = sanitize_text_field($_POST['usageterms_num_dist_copies']);
        $usageterms_num_audio_streams = sanitize_text_field($_POST['usageterms_num_audio_streams']);
        $usageterms_num_radio_stations = sanitize_text_field($_POST['usageterms_num_radio_stations']);
        $usageterms_num_free_downloads = sanitize_text_field($_POST['usageterms_num_free_downloads']);
        $usageterms_num_music_videos = sanitize_text_field($_POST['usageterms_num_music_videos']);
        $usageterms_num_monetized_video_streams = sanitize_text_field($_POST['usageterms_num_monetized_video_streams']);
        $usageterms_state = sanitize_text_field($_POST['usageterms_state']);
        $usageterms_country = sanitize_text_field($_POST['usageterms_country']);
        $usageterms_allow_profit_performances = sanitize_text_field($_POST['usageterms_allow_profit_performances']);
        $usageterms_contract = $_POST['usageterms_contract'];
        
        
        // Create a new post of custom post type 'usage-terms'
        $license_post = array(
            'ID'    => sanitize_text_field($_POST['author_license_id']) ?? 0,
            'post_title'    => $title,
            'post_content'  => '',
            'post_excerpt'  => '',
            'post_status'   => 'publish',
            'post_type'     => $type,
            'post_parent'     => intval($post_parent),
            'meta_input'    => array(
                'usageterms_filetypes' => $usageterms_filetypes,
                'usageterms_producer_alias' => $usageterms_producer_alias ,
                'usageterms_num_dist_copies' => $usageterms_num_dist_copies ,
                'usageterms_num_audio_streams' => $usageterms_num_audio_streams ,
                'usageterms_num_radio_stations' => $usageterms_num_radio_stations ,
                'usageterms_num_free_downloads' => $usageterms_num_free_downloads ,
                'usageterms_num_music_videos' => $usageterms_num_music_videos ,
                'usageterms_num_monetized_video_streams' => $usageterms_num_monetized_video_streams ,
                'usageterms_state' => $usageterms_state ,
                'usageterms_country' => $usageterms_country ,
                'usageterms_allow_profit_performances' => $usageterms_allow_profit_performances ,
                'usageterms_contract' => $usageterms_contract,
            ),
        );
        
        
        $licenseId = !empty($license_post['ID']) ? wp_update_post($license_post) : wp_insert_post($license_post);
        
        if ($licenseId) {
            wp_redirect(add_query_arg('message', 'success', wp_get_referer()));
            exit;
        }
    }

}


/**
 * Validate slug and check availability
 */
function check_post_slug() {
    // Check if the nonce is set and valid
    check_ajax_referer('check_slug_nonce', 'security');

    if (isset($_POST['slug'])) {
        $slug = sanitize_title($_POST['slug']);

        // Check if a post with the given slug already exists
        $post_exists = get_page_by_path($slug, OBJECT);

        if ($post_exists) {
            wp_send_json_error('Slug already exists.');
        } else {
            wp_send_json_success('valid');
        }
    } else {
        wp_send_json_error('Invalid request.');
    }
}
add_action('wp_ajax_check_post_slug', 'check_post_slug');
add_action('wp_ajax_nopriv_check_post_slug', 'check_post_slug');




/**
 * Load station beats for Sonar Player
 */

/**
 * Validate slug and check availability
 */
function medians_load_station_beats() {
    // Check if the nonce is set and valid

    if (isset($_GET['station_id']) && isset($_GET['load']) && $_GET['load'] == 'station.json') {

        $station_id = intval(sanitize_text_field($_GET['station_id']));

        if (class_exists('MediansStation')) {
            $station = get_term($station_id);
            $class = new MediansStation($station);
            echo $class->loadStationItemsPlayer();
            die();
        }
    }
}
add_action('init', 'medians_load_station_beats');
