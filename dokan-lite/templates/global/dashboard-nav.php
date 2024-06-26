<?php
$home_url     = home_url();
$active_class = ' class="active"'
?>

<div class="dokan-dash-sidebar" id="vendor-main-sidebar">
    <?php
    global $allowedposttags;
    do_action( 'dokan_dashboard_sidebar_start' );

    // These are required for the hamburger menu.
    if ( is_array( $allowedposttags ) ) {
        $allowedposttags['input'] = [ // phpcs:ignore
            'id'      => [],
            'type'    => [],
            'checked' => [],
        ];
    }

    echo wp_kses( dokan_dashboard_nav( $active_menu ), $allowedposttags );

    do_action( 'dokan_dashboard_sidebar_end' );
    ?>
</div>