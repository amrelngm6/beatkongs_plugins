<?php 


// Beats list shortcode  [beats_page]
add_shortcode('beats_page', 'dokan_beats_page_template_view');
function dokan_beats_page_template_view() {
    include plugin_dir_path(__FILE__) . 'templates/beats-page.php';
}

// Free Beats uploading form shortcode  [free_beat_upload_page]
add_shortcode('free_beat_upload_page', 'dokan_free_beat_upload_page_template');
function dokan_free_beat_upload_page_template() {
    include plugin_dir_path(__FILE__) . 'templates/free-beat-upload-page.php';
}