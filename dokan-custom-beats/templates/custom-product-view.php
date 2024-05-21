<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $current_user;
$current_user = wp_get_current_user();

if ( ! dokan_is_seller_enabled( $current_user->ID ) ) {
    echo __( 'You are not a vendor.', 'dokan' );
    return;
}

?>

<div class="dokan-dashboard-wrap">
    <?php dokan_get_template( 'global/seller-dashboard-nav.php', array( 'active_menu' => 'custom-product-view' ) ); ?>
    <div class="dokan-dashboard-content dokan-product-listing">
        <article class="dokan-product-listing-area">
            <h1><?php _e( 'Custom Product View', 'dokan' ); ?></h1>
            <p><?php _e( 'Here you can view your products in a custom layout.', 'dokan' ); ?></p>
            
            <!-- Your custom product view code goes here -->
            
        </article>
    </div>
</div>
