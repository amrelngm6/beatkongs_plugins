<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


$categories = get_terms(array(
    'taxonomy' => 'pa_license',
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
            ?>

        <article class="dokan-product-listing-area">
            
            <div class="product-listing-top dokan-clearfix flex">
                <h4 class="w-full">Free beats</h4>
            </div>

            <?php if ( $categories ) { ?>

            <div class="dokan-dashboard-product-listing-wrapper">

                <form id="beat-filter" method="POST" class="dokan-form-inline">
                    
                    <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table"
                        id="dokan-product-list-table">
                        <thead>
                            <tr>
                                <th id="cb" class="manage-column column-cb check-column">
                                    <label for="cb-select-all"></label>
                                    <input id="cb-select-all" class="dokan-checkbox" type="checkbox">
                                </th>
                                <th><?php esc_html_e( 'Title', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Edit', 'dokan-lite' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($categories as $key => $category) :
                            ?>
                            <tr id="taxonomy-<?php $category->term_id; ?>" >

                                <td id="cb" class="manage-column column-cb check-column">
                                    <label for="cb-select-all"></label>
                                    <input id="cb-select-all" class="dokan-checkbox" name="taxonomy_id[]" value="<?php echo $category->term_id; ?>" type="checkbox">
                                </td>
                                <td><?php echo $category->name; ?></td>
                                <td><a href="/license-edit/?license_id=<?php echo $category->term_id; ?>">Edit</a></td>
                            </tr>
                            <?php endforeach ; ?>
                        </tbody>

                    </table>
                </form>
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