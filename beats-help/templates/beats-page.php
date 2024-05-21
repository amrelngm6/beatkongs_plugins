<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

do_action( 'dokan_dashboard_wrap_before', $post, $post_id );


// Load Dokan's vendor dashboard header
do_action('dokan_dashboard_wrap_start');

// Display the main content of the beats page
?>
<?php


/**
 *  Adding dokan_dashboard_content_before hook
 *
 *  @hooked get_dashboard_side_navigation
 *
 *  @since 2.4
 */
do_action( 'dokan_dashboard_content_before' );
?>
<div class="bg-white" id="dokan-beats-page-root">
    Here
</div>
<?php
// Load Dokan's vendor dashboard footer
do_action('dokan_dashboard_wrap_end');

// get_footer();

?>