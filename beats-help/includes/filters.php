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
    $urls['beattag'] = array(
        'title' => __('Beattag', 'dokan'),
        'url'   => site_url('/author-beattag'),
        'icon'  => '<i class="fa fa-microphone-lines"></i>',
        'pos'   => 190,
    );
    return $urls;
}


// Add query vars
function dokan_beats_page_query_vars($vars) {
    $vars[] = 'dokan_beats_page';
    return $vars;
}






function load_custom_station_template($template) {
    global $wp_query;

    if (isset($wp_query->query['station']) && is_tax('station')) {
        $plugin_template = plugin_dir_path(__FILE__) . '../templates/station-page.php';
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }
    return $template    ;
}
add_filter('template_include', 'load_custom_station_template');


function load_custom_beat_template($template) {
    global $wp_query;

    if (isset($wp_query->query['post_type']) && $wp_query->query['post_type'] == 'beat') {
        $plugin_template = plugin_dir_path(__FILE__) . '../templates/beat-page.php';
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }
    return $template    ;
}
add_filter('template_include', 'load_custom_beat_template');




// Move all scripts to footer
function move_scripts_to_footer($scripts) {
    if (!is_admin()) {
        foreach ($scripts->registered as $script) {
            $script->args = 1; // Set all scripts to load in the footer
        }
    }
}

// Remove footer design
function remove_footer_design() {
    remove_all_actions('wp_footer'); // Remove all actions hooked to wp_footer
}




add_action('admin_menu', 'beats_plugin_settings_page');
// Function to add settings page
function beats_plugin_settings_page() {
    add_options_page(
        'Beats Plugin Settings',   // Page title
        'Beats Plugin',            // Menu title
        'manage_options',           // Capability required to access
        'beats-plugin-settings',   // Menu slug (unique identifier)
        'beats_plugin_settings_render' // Callback function to render the page
    );
    add_action('admin_init', 'beats_plugin_register_settings');

}
function beats_plugin_settings_render() {
    ?>
    <div class="wrap">
        <h1 style="margin-bottom: 20px;">Custom Plugin Settings</h1>
        <hr style="margin: 20px;" />
        
        <form method="post" enctype="multipart/form-data" action="options.php">
            <?php settings_fields('beats_plugin_options'); ?>
            <?php do_settings_sections('beats_plugin_settings'); ?>
            
            <div style="display:flex; gap:20px; width: 100%">
                <h2>Loop Beat Tag ( <?php echo get_option('beats_default_beattag_time') ?? '0'; ?> )</h2>
                <div style="width:auto"> 
                    <input name="beattag_time" type="range" min="1" max="20" value="<?php echo get_option('beats_default_beattag_time'); ?>" />  
                    <div style="display:flex;  width: 100%">
                        <span style=" width: 100%">0</span>
                        <span>20</span>
                    </div>
                    
                </div>
            </div>
            <hr style="margin: 20px;" />
            <audio src="<?php echo get_option('beats_default_beattag'); ?>" controls ></audio>
            <h2>Upload File</h2>
            <input type="file" name="beats_plugin_file_upload" id="beats_plugin_file_upload" />

            <hr style="margin: 20px;" />
            
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form>
    </div>
    <?php
}

function beats_plugin_register_settings() {
    register_setting('beats_plugin_options', 'beats_plugin_options', 'beats_plugin_validate_options');
}
    