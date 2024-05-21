<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Load Dokan's vendor dashboard header
do_action('dokan_dashboard_wrap_start');

// Display the main content of the beats page
?>
<div id="dokan-beats-page-root"></div>
<?php

echo do_shortcode('[dokan_beats_page]');

// Load Dokan's vendor dashboard footer
do_action('dokan_dashboard_wrap_end');
?>
