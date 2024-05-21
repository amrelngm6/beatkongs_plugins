<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use WeDevs\Dokan\ProductCategory\Helper;

// phpcs:disable WordPress.WP.GlobalVariablesOverride.Prohibited
global $post;

// $from_shortcode = false;
$new_product    = true;

// if (
//     ! isset( $post->ID )
//     && (
//         ! isset( $_GET['_dokan_edit_product_nonce'] ) ||
//         ! wp_verify_nonce( sanitize_key( $_GET['_dokan_edit_product_nonce'] ), 'dokan_edit_product_nonce' ) ||
//         ! isset( $_GET['product_id'] )
//     )
// ) {
//     wp_die( esc_html__( 'Access Denied, No product found', 'dokan-lite' ) );
// }

if ( isset( $post->ID ) && $post->ID && 'product' === $post->post_type ) {
    $post_id      = $post->ID;
    $post_title   = $post->post_title;
    $post_content = $post->post_content;
    $post_excerpt = $post->post_excerpt;
    $post_status  = $post->post_status;
    $product      = wc_get_product( $post_id );
}

if ( isset( $_GET['product_id'] ) ) {
    $post_id        = intval( $_GET['product_id'] );
    $post           = get_post( $post_id );
    $post_status    = $post->post_status;
    $auto_draft     = 'auto-draft' === $post_status;
    $post_title     = $auto_draft ? '' : $post->post_title;
    $post_content   = $auto_draft ? '' : $post->post_content;
    $post_excerpt   = $post->post_excerpt;
    $product        = wc_get_product( $post_id );
    $from_shortcode = true;
}

if ( isset( $_GET['product_id'] ) && 0 === absint( $_GET['product_id'] ) ) {
    $post_id      = intval( $_GET['product_id'] );
    $post_title   = '';
    $post_content = '';
    $post_excerpt = '';
    $post_status  = 'auto-draft';
    $product      = new WC_Product( $post_id );

    $product->set_name( $post_title );
    $product->set_status( $post_status );
    $post_id = $product->save();
    wp_update_post(
        [
            'ID'          => $post_id,
            'post_author' => dokan_get_current_user_id(),
        ]
    );

    $post           = get_post( $post_id );
    $from_shortcode = true;
    $new_product    = true;
}

// if ( ! dokan_is_product_author( $post_id ) ) {
    // wp_die( esc_html__( 'Access Denied', 'dokan-lite' ) );
// }

$_regular_price         = get_post_meta( $post_id, '_regular_price', true );
$_sale_price            = get_post_meta( $post_id, '_sale_price', true );
$is_discount            = ! empty( $_sale_price );
$_sale_price_dates_from = get_post_meta( $post_id, '_sale_price_dates_from', true );
$_sale_price_dates_to   = get_post_meta( $post_id, '_sale_price_dates_to', true );

$_sale_price_dates_from = ! empty( $_sale_price_dates_from ) ? date_i18n( 'Y-m-d', $_sale_price_dates_from ) : '';
$_sale_price_dates_to   = ! empty( $_sale_price_dates_to ) ? date_i18n( 'Y-m-d', $_sale_price_dates_to ) : '';
$show_schedule          = false;

if ( ! empty( $_sale_price_dates_from ) && ! empty( $_sale_price_dates_to ) ) {
    $show_schedule = true;
}

$_featured        = get_post_meta( $post_id, '_featured', true );
$terms            = wp_get_object_terms( $post_id, 'product_type' );
$product_type     = ( ! empty( $terms ) ) ? sanitize_title( current( $terms )->name ) : 'simple';
$variations_class = ( $product_type === 'simple' ) ? 'dokan-hide' : '';
$_visibility      = ( version_compare( WC_VERSION, '2.7', '>' ) ) ? $product->get_catalog_visibility() : get_post_meta( $post_id, '_visibility', true );


if ( ! empty( $_GET['errors'] ) ) {
    dokan()->dashboard->templates->products->set_errors( array_map( 'sanitize_text_field', wp_unslash( $_GET['errors'] ) ) );
}
?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

<div class="dokan-dashboard-wrap">

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

        <div class="dokan-dashboard-content dokan-product-listing">

            <?php

            /**
             *  Adding dokan_dashboard_content_before hook
             *
             *  @hooked get_dashboard_side_navigation
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_inside_before' );
            do_action( 'dokan_before_listing_product' );
            ?>

                <article class="dokan-product-listing-area">
                    <?php
                    $one_step_product_create = 'on' === dokan_get_option( 'one_step_product_create', 'dokan_selling', 'on' );
                    $disable_product_popup   = $one_step_product_create || 'on' === dokan_get_option( 'disable_product_popup', 'dokan_selling', 'off' );
                    $new_product_url         = $one_step_product_create ? dokan_edit_product_url( 0, true ) : add_query_arg(
                        [
                            '_dokan_add_product_nonce' => wp_create_nonce( 'dokan_add_product_nonce' ),
                        ],
                        dokan_get_navigation_url( 'new-product' )
                    );
                    $new_product_url         = '/upload-free-beat';
                    $product_listing_args    = [
                        'author'         => dokan_get_current_user_id(),
                        'posts_per_page' => 1,
                        'post_status'    => apply_filters(
                            'dokan_product_listing_post_statuses', [
                                'publish',
                                'draft',
                                'pending',
                                'future',
                            ]
                        ),
                    ];
                    $product_query           = dokan()->product->all( $product_listing_args );

                    if ( $product_query->have_posts() ) {
                        ?>

                        <div class="product-listing-top dokan-clearfix">
                            <?php dokan_product_listing_status_filter(); ?>

                            <?php if ( dokan_is_seller_enabled( dokan_get_current_user_id() ) ) : ?>
                                <span class="dokan-add-product-link">
                                    <?php if ( current_user_can( 'dokan_add_product' ) ) : ?>
                                        <a href="<?php echo esc_url( $new_product_url ); ?>" class="dokan-btn dokan-btn-theme <?php echo $disable_product_popup ? '' : 'dokan-add-new-product'; ?>">
                                            <i class="fas fa-briefcase">&nbsp;</i>
                                            <?php esc_html_e( 'Add new product', 'dokan-lite' ); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php
                                        do_action( 'dokan_after_add_product_btn' );
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php dokan_product_dashboard_errors(); ?>

                        <div class="dokan-w12">
                            <?php dokan_product_listing_filter(); ?>
                        </div>

                        <div class="dokan-dashboard-product-listing-wrapper">

                            <form id="product-filter" method="POST" class="dokan-form-inline">
                                <div id="dokan-bulk-action-selector" class="dokan-form-group">
                                    <label for="bulk-product-action-selector" class="screen-reader-text"><?php esc_html_e( 'Select bulk action', 'dokan-lite' ); ?></label>

                                    <select name="status" id="bulk-product-action-selector" class="dokan-form-control chosen">
                                        <?php foreach ( $bulk_statuses as $key => $bulk_status ) : ?>
                                            <option class="bulk-product-status" value="<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $bulk_status ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div id="dokan-bulk-action-submit" class="dokan-form-group">
                                    <?php wp_nonce_field( 'bulk_product_status_change', 'security' ); ?>
                                    <input
                                        type="submit"
                                        name="bulk_product_status_change"
                                        id="bulk-product-action"
                                        class="dokan-btn dokan-btn-theme"
                                        value="<?php esc_attr_e( 'Apply', 'dokan-lite' ); ?>"
                                        onClick="dokan_bulk_delete_prompt( event, '<?php esc_attr_e( 'Are you sure?', 'dokan-lite' ); ?>', '#bulk-product-action-selector', '#product-filter' )"
                                    />
                                </div>
                                <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table" id="dokan-product-list-table">
                                    <thead>
                                        <tr>
                                            <th id="cb" class="manage-column column-cb check-column">
                                                <label for="cb-select-all"></label>
                                                <input id="cb-select-all" class="dokan-checkbox" type="checkbox">
                                            </th>
                                            <th><?php esc_html_e( 'Image', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Name', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Status', 'dokan-lite' ); ?></th>

                                            <?php do_action( 'dokan_product_list_table_after_status_table_header' ); ?>

                                            <th><?php esc_html_e( 'Price', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Type', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Views', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Date', 'dokan-lite' ); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>

                                </table>
                            </form>
                        </div>
                        
                        <?php
                    } else {
                        ?>
                        <div class="dokan-dashboard-product-listing-wrapper dokan-dashboard-not-product-found">
                            <img src="<?php echo esc_url( plugins_url( 'assets/images/no-product-found.svg', DOKAN_FILE ) ); ?>" alt="dokan setup" class="no-product-found-icon">
                            <h4 class="dokan-blank-product-message">
                                <?php esc_html_e( 'No Beats Found!', 'dokan-lite' ); ?>
                            </h4>

                            <?php if ( dokan_is_seller_enabled( dokan_get_current_user_id() ) ) : ?>
                                <h2 class="dokan-blank-product-message">
                                    <?php esc_html_e( 'Ready to start selling something awesome?', 'dokan-lite' ); ?>
                                </h2>

                                <span class="dokan-add-product-link">
                                    <?php if ( current_user_can( 'dokan_add_product' ) ) : ?>
                                        <a href="<?php echo esc_url( $new_product_url ); ?>" class="dokan-btn dokan-btn-theme <?php echo $disable_product_popup ? '' : 'dokan-add-new-product'; ?>">
                                            <i class="fas fa-briefcase">&nbsp;</i>
                                            <?php esc_html_e( 'Add new beat', 'dokan-lite' ); ?>
                                        </a>
                                    <?php endif ?>

                                    <?php
                                        do_action( 'dokan_after_add_product_btn' );
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </article>

                <?php

                /**
                 *  Adding dokan_dashboard_content_before hook
                 *
                 *  @hooked get_dashboard_side_navigation
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_dashboard_content_inside_after' );
                do_action( 'dokan_after_listing_product' );
                ?>

        </div><!-- #primary .content-area -->

        <?php

        /**
         *  Adding dokan_dashboard_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
        ?>

    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
