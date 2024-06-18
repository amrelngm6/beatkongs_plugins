<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include plugin_dir_path(__FILE__) . '../includes/Class/BeatPrice.php';

$categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
));

$stations = get_terms(array(
    'taxonomy' => 'station',
    'hide_empty' => false,
));

$tags = get_terms(array(
    'taxonomy' => 'tag',
    'hide_empty' => false,
));

$moods = get_terms(array(
    'taxonomy' => 'mood',
    'hide_empty' => false,
));

$bulk_statuses = [
    '0'     => __( 'Bulk Actions', 'dokan-lite' ),
    'delete' => __( 'Delete Permanently', 'dokan-lite' ),
];
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
            $new_product_url         = get_site_url().'/upload-free-beat';
            $args    = [
                'post_author'         => get_current_user_id(),
                'post_type'         => 'beat',
                's' => sanitize_text_field($_GET['beat_seatch_title']) ?? '',
                'post_status'         => (sanitize_text_field($_GET['post_status']) && sanitize_text_field($_GET['post_status']) != '-1') ? sanitize_text_field($_GET['post_status']) : ['publish','pending'],
            ];

            if (!empty($_GET['beat_cat']))
            {
                $args['tax_query'] = array(
                    'relation' => 'AND', // Use 'AND' if you want to match both taxonomies
    
                    // Category taxonomy query
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
                        'terms'    => array(sanitize_text_field($_GET['beat_cat'])), // Replace with your categories
                    ),
                );
            }

            if (!empty($_GET['beat_station']) && $_GET['beat_station'] > 0)
            {
                $args['tax_query'][] =
    
                    // Category taxonomy query
                    array(
                        'taxonomy' => 'station',
                        'field'    => 'term_id', // Can be 'term_id', 'name', or 'slug'
                        'terms'    => array(sanitize_text_field($_GET['beat_station'])), // Replace with your categories
                );
            }

            $beats_query = get_posts($args);
            ?>

            <div class="product-listing-top dokan-clearfix flex">
                <h4 class="w-full">Beats list</h4>
                <?php if ( dokan_is_seller_enabled( dokan_get_current_user_id() ) ) : ?>
                <span class="dokan-add-product-link">
                    <?php if ( current_user_can( 'dokan_add_product' ) ) : ?>
                    <a href="<?php echo esc_url( $new_product_url ); ?>"
                        class="dokan-btn dokan-btn-theme <?php echo $disable_product_popup ? '' : 'dokan-add-new-product'; ?>">
                        <i class="fas fa-briefcase">&nbsp;</i>
                        <?php esc_html_e( 'Add new beat', 'dokan-lite' ); ?>
                    </a>
                    <?php endif; ?>
                </span>
                <?php endif; ?>
            </div>

            <?php dokan_product_dashboard_errors(); ?>

            <div class="dokan-w12">

                <form class="dokan-form-inline dokan-w8 dokan-product-date-filter" method="get">
                    <div class="dokan-form-group">
                        <select name="beat_cat" id="filter-by-date" class="dokan-form-control">
                            <option value="-1">- Select category -</option>
                            <?php foreach ($categories as $category) : ?>
                                <option <?php echo (isset($_GET['beat_cat']) && intval(sanitize_text_field($_GET['beat_cat'])) == $category->term_id) ? 'selected="selected" ' : '' ?>  value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>

                    <div class="dokan-form-group">
                        <select name="beat_station" id="beat_station" class="beat_station dokan-form-control chosen">
                            <option value="-1" >– Select a station –</option>
                            <?php foreach ($stations as $station) : ?>
                                <option <?php echo (isset($_GET['beat_station']) && intval($_GET['beat_station']) == $station->term_id) ? 'selected="selected" ' : '' ?>  value="<?php echo $station->term_id; ?>"><?php echo $station->name; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>

                    <div class="dokan-form-group">
                        <select name="post_status" class="dokan-form-control">
                            <option selected="selected" value="-1">- Select Status -</option>
                            <?php foreach (['publish', 'pending'] as $value) : ?>
                                <option <?php echo  (isset($_GET['post_status']) && $_GET['post_status'] == $value) ? 'selected' : '' ?>  value="<?php echo $value; ?>"><?php echo ucfirst($value); ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>


                    <input type="hidden" id="_product_listing_filter_nonce" name="_product_listing_filter_nonce"
                        value="26d3090b3f">
                    <div class="dokan-form-group">
                        <button type="submit" class="dokan-btn">Filter</button>
                        <a class="dokan-btn" href="./">Reset</a>
                    </div>
                </form>


                <form method="get" class="dokan-form-inline dokan-w5 dokan-product-search-form">

                    <button type="submit" name="product_listing_search" value="ok"
                        class="dokan-btn dokan-btn-theme">Search</button>

                    <div class="dokan-form-group">
                        <input type="text" class="dokan-form-control" name="beat_seatch_title"
                            placeholder="Search Products" value="<?php echo sanitize_text_field($_GET['beat_seatch_title']) ?? '' ; ?>">
                    </div>
                </form>

            </div>

            <?php if ( $beats_query ) { ?>

            <div class="dokan-dashboard-product-listing-wrapper">

                <form id="beat-filter" method="POST" class="dokan-form-inline">
                    <div id="dokan-bulk-action-selector" class="dokan-form-group">
                        <label for="bulk-product-action-selector"
                            class="screen-reader-text"><?php esc_html_e( 'Select bulk action', 'dokan-lite' ); ?></label>

                        <select name="bulk_status" required id="bulk-product-action-selector" class="dokan-form-control chosen">
                            <?php foreach ( $bulk_statuses as $key => $bulk_status ) : ?>
                            <option class="bulk-product-status" value="<?php echo esc_attr( $key ); ?>">
                                <?php echo esc_attr( $bulk_status ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="dokan-bulk-action-submit" class="dokan-form-group">
                        <?php wp_nonce_field( 'bulk_product_status_change', 'security' ); ?>
                        <input type="submit" name="bulk_product_status_change" id="bulk-product-action"
                            class="dokan-btn dokan-btn-theme" value="<?php esc_attr_e( 'Apply', 'dokan-lite' ); ?>"
                            onClick="dokan_bulk_delete_prompt( event, '<?php esc_attr_e( 'Are you sure?', 'dokan-lite' ); ?>', '#bulk-product-action-selector', '#product-filter' )" />
                    </div>
                    <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table"
                        id="dokan-product-list-table">
                        <thead>
                            <tr>
                                <th id="cb" class="manage-column column-cb check-column">
                                    <label for="cb-select-all"></label>
                                    <input id="cb-select-all" class="dokan-checkbox" type="checkbox">
                                </th>
                                <th><?php esc_html_e( 'Image', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Track title', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Status', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Price', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Views', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Plays', 'dokan-lite' ); ?></th>

                                <th><?php esc_html_e( 'Type', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Edit', 'dokan-lite' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $class = new BeatPrice;
                            foreach ($beats_query as $key => $beat) :
                            ?>
                            <tr id="post-<?php $beat->ID; ?>" >

                                <td id="cb" class="manage-column column-cb check-column">
                                    <label for="cb-select-all"></label>
                                    <input id="cb-select-all" class="dokan-checkbox" name="post_id[]" value="<?php echo $beat->ID; ?>" type="checkbox">
                                </td>
                                <td><a href="<?php echo get_site_url(); ?>/beat/<?php echo $beat->post_name;?>"><img width="50" src="<?php echo get_the_post_thumbnail_url( $beat->ID ); ?>" /></a> </td>
                                <td><?php echo $beat->post_title; ?></td>
                                <td><?php echo $beat->post_status; ?></td>
                                <?php  $postMeta = get_metadata( 'post', $beat->ID); 
                                    $class->setDefaultValue($postMeta);
                                ?>
                                <td><?php echo $class->getLowestPrice($postMeta) ?? '' ; ?></td>
                                <td><?php echo $postMeta['_eael_post_view_count'][0] ?? '0' ; ?></td>
                                <td><?php echo '0' ; ?></td>
                                <td><?php echo strtoupper($postMeta['beat_type'][0]) ?? '' ; ?></td>
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
                <img src="<?php echo esc_url( plugins_url( 'assets/images/no-product-found.svg', DOKAN_FILE ) ); ?>"
                    alt="dokan setup" class="no-product-found-icon">
                <h4 class="dokan-blank-product-message">
                    <?php esc_html_e( 'No Beats Found!', 'dokan-lite' ); ?>
                </h4>

                <?php if ( dokan_is_seller_enabled( dokan_get_current_user_id() ) ) : ?>
                <h2 class="dokan-blank-product-message">
                    <?php esc_html_e( 'Ready to start selling something awesome?', 'dokan-lite' ); ?>
                </h2>

                <span class="dokan-add-product-link">
                    <?php if ( current_user_can( 'dokan_add_product' ) ) : ?>
                    <a href="<?php echo esc_url( $new_product_url ); ?>"
                        class="dokan-btn dokan-btn-theme <?php echo $disable_product_popup ? '' : 'dokan-add-new-product'; ?>">
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
<script>
    window.addEventListener("load", (event) => {
        jQuery('.active.dashboard').removeClass('active')
        jQuery('.dokan-beats').addClass('active')
    });

</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>