<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
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
                    $new_product_url         = '/upload-free-beat';
                    $args    = [
                        'post_author'         => dokan_get_current_user_id(),
                        'post_type'         => 'free_beat',
                    ];
                    // $product_query           = dokan()->product->all( $product_listing_args );
                    $beats_query = get_posts($args);
                    if ( $beats_query ) {
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

                                            <th><?php esc_html_e( 'Type', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Date', 'dokan-lite' ); ?></th>
                                            <th><?php esc_html_e( 'Edit', 'dokan-lite' ); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($beats_query as $key => $beat) :
                                                setup_postdata($beat);
                                                ?>
                                        <tr id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

                                            <td id="cb" class="manage-column column-cb check-column">
                                                <label for="cb-select-all"></label>
                                                <input id="cb-select-all" class="dokan-checkbox" type="checkbox">
                                            </td>
                                            <td><img width="50" src="<?php echo get_the_post_thumbnail_url( $beat->ID ); ?>" /></td>
                                            <td><?php echo $beat->post_title; ?></td>
                                            <td><?php echo $beat->post_status; ?></td>
                                            
                                            <td><?php echo $beat->post_type; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($beat->post_date)); ?></td>
                                            <td><a href="/upload-free-beat/?beat_id=<?php echo $beat->ID; ?>">Edit</a></td>
                                        </tr>
                                        <?php endforeach ; ?>
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
