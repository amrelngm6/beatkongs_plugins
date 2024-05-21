<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();
// Load Dokan's vendor dashboard header
do_action('dokan_dashboard_wrap_start');

// Display the main content of the help page
?>
<div id="dokan-help-page-root"></div>
<?php

// Load Dokan's vendor dashboard footer
do_action('dokan_dashboard_wrap_end');

get_footer();
?>