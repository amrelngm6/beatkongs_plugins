<?php


// Add Free Beats nmenu at the Dashboard sidebar
// Also set its related taxonomies 
function register_beat_post_type() {
    $labels = array(
        'name' => 'Free Beats',
        'singular_name' => 'Free Beat',
        'menu_name' => 'Free Beats',
        'name_admin_bar' => 'Free Beat',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Free Beat',
        'new_item' => 'New Beat',
        'edit_item' => 'Edit Beat',
        'view_item' => 'View Beat',
        'all_items' => 'All Free Beats',
        'search_items' => 'Search Free Beats',
        'parent_item_colon' => 'Parent Free Beats:',
        'not_found' => 'No Free beats found.',
        'not_found_in_trash' => 'No Free beats found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_position' => 5,
        'taxonomies', array('category', 'tag', 'mood', 'station'),
        'menu_icon' => 'dashicons-format-audio',
    );

    register_post_type('free_beat', $args);
}



// Register custom taxonomies [ Category, Station , Tag , Mood ]
function beats_register_taxonomies() {
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
            $type = sanitize_text_field($_POST['beat_type']);
            $category = sanitize_text_field($_POST['beat_category']);
            $station = sanitize_text_field($_POST['beat_station']);
            $moods = sanitize_text_field($_POST['beat_moods']);
            $tags = sanitize_text_field($_POST['beat_tags']);
            $beat_mp3 = sanitize_text_field($_POST['beat_mp3']);
            $beat_mp3_url = sanitize_text_field($_POST['beat_mp3_url']);
            $beat_picture = sanitize_text_field($_POST['beat_picture']);
            $beat_agreement = sanitize_text_field($_POST['beat_agreement']);
            $beat_visibility = sanitize_text_field($_POST['beat_visibility']);
            
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

            
            if (!empty($beatsErrors))
            {
                return;
            }
            
            // Create a new post of custom post type 'beat'
            $beat_post = array(
                'post_title'    => $title,
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_type'     => 'free_beat',
                'meta_input'    => array(
                    'beat_type' => $type,
                    'beat_picture' => $beat_picture,
                    'beat_mp3' => $beat_mp3,
                    'beat_mp3_url' => $beat_mp3_url,
                    'beat_agreement' => $beat_agreement,
                    'beat_visibility' => $beat_visibility,
                ),
            );
            
            if (!empty($_POST['beat_id']))
            {
                $beat_post['ID'] = sanitize_text_field($_POST['beat_id']);
            }
            
            $beatId = isset($beat_post['ID']) ? wp_update_post($beat_post) : wp_insert_post($beat_post);
            
            // Save Category
            $category_id = isset($_POST['beat_category']) ? intval($_POST['beat_category']) : '';
            if ($category_id) {
                wp_set_post_terms($beatId, array($category_id), 'category');
            }
            // Save Station
            $station = isset($_POST['beat_station']) ? intval($_POST['beat_station']) : '';
            if ($station) {
                wp_set_object_terms($beatId, array($station), 'station');
            } else {
                array_push($beatsErrors, 'station is required');
            }

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

