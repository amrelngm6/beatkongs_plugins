<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


$categories = get_terms(array(
    'taxonomy' => 'usage-terms',
    'hide_empty' => false,
));
// $taxonomy = 'my_taxonomy'; // this is the name of the taxonomy
// $terms = get_terms($taxonomy);
$args = array(
'post_type' => 'usage-terms',
// 'tax_query' => array(
//             array(
//                 'taxonomy' => 'updates',
//                 'field' => 'slug',
//                 'terms' => wp_list_pluck($terms,'slug')
//             )
//         )
);

$categories = new WP_Query( $args );
print_r($categories->posts);
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

            <?php if ( $categories ) { ?>

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
                            foreach ($categories as $key => $category) :
                            ?>
                            <tr id="taxonomy-<?php $category->term_id; ?>" >

                                <td id="cb" class="manage-column column-cb check-column">
                                    <?php echo $category->ID; ?>
                                </td>
                                <td><?php echo $category->post_title; ?></td>
                                <td><a href="/edit-license-contract/?license_id=<?php echo $category->ID; ?>">Edit</a></td>
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