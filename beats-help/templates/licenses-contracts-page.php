<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


$args = array(
'post_type' => 'usage-terms',
'author'    => 1,

'orderby' => 'ID',
'order' => 'ASC',
);

$default_licenses = new WP_Query( $args );
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
                <h4 class="w-full">Licenses & Contracts</h4>
            </div>

            <?php if ( $default_licenses ) { ?>

            <div class="dokan-dashboard-product-listing-wrapper">

                <form id="beat-filter" method="POST" class="dokan-form-inline">
                    
                    <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table"
                        id="dokan-product-list-table">
                        <thead>
                            <tr>
                                <th id="cb" class="manage-column column-cb check-column">
                                    #
                                </th>
                                <th><?php esc_html_e( 'Title', 'dokan-lite' ); ?></th>
                                <th><?php esc_html_e( 'Edit', 'dokan-lite' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($default_licenses->posts as $key => $license) :
                            ?>
                            <tr id="taxonomy-<?php $license->ID; ?>" >

                                <td id="cb" class="manage-column column-cb check-column">
                                    <?php echo $license->ID; ?>
                                </td>
                                <td><?php echo $license->post_title; ?></td>
                                <td><a href="/edit-license-contract/?license_post_id=<?php echo $license->ID; ?>">Edit</a></td>
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
        jQuery('.licenses_contracts').addClass('active')
    });
</script>
<?php do_action( 'dokan_dashboard_wrap_end' ); ?>