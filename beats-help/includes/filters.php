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
    return $urls;
}


// Add query vars
function dokan_beats_page_query_vars($vars) {
    $vars[] = 'dokan_beats_page';
    return $vars;
}
