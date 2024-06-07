<?php



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


// Add custom menu item to Dokan Vendor Dashboard
function add_custom_beats_upload_menu($urls) {
    $urls['dokan-beats'] = array(
        'title' => __('Beats', 'beat-upload-plugin'),
        'icon'  => '<i class="fas fa-music"></i>',
        'url'   => dokan_get_navigation_url('../beats'),
        'pos'   => 50
    );
    $urls['licenses_contracts'] = array(
        'title' => __('Licenses & Contracts', 'dokan'),
        'url'   => site_url('/licenses-contracts'),
        'icon'  => '<i class="fa fa-cogs"></i>',
        'pos'   => 190,
    );
    $urls['dokan-media'] = array(
        'title' => __('Media library', 'dokan'),
        'url'   => site_url('/author-media'),
        'icon'  => '<i class="fa fa-picture-o"></i>',
        'pos'   => 190,
    );
    return $urls;
}


// Add query vars
function dokan_beats_page_query_vars($vars) {
    $vars[] = 'dokan_beats_page';
    return $vars;
}






// Intercept the request and load custom template
function dokan_beats_page_template_redirect() {
    global $wp_query;
    
    $name = $wp_query->query_vars['name'] ?? null;

    if ($name && in_array($name , ['embed_medians_beat', 'embed_medians_playlist'])) {
        status_header(200); // Ensure HTTP status code is 200
        ob_start(); 
        if ($name == 'embed_medians_playlist') {
            $params = shortcode_atts($_GET, $_GET, 'medians_playlist');
            include plugin_dir_path(__FILE__) . '../templates/playlist/embed.php';
        }
        echo ob_get_clean(); // Return the buffered content
        exit();
    }
}

/**
 * Activate the plugin.
 */
function dokan_beats_page_activate() { 
	// Trigger our function that registers the custom post type plugin.
	dokan_beats_page_setup_post_type(); 
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
}