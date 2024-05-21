<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

// Load Dokan's vendor dashboard header
do_action('dokan_dashboard_wrap_start');

// Display the main content of the help page

?>
<div id="dokan-help-page-root"></div>

<div class="dokan-dashboard-wrap">
    <?php

    /**
     *  Added dokan_dashboard_content_before hook
     *
     * @hooked get_dashboard_side_navigation
     *
     * @since  2.4
     */
    do_action( 'dokan_dashboard_content_before' );
    ?>

    <div class="dokan-dashboard-content">

        <?php

        /**
         *  Added dokan_dashboard_content_before hook
         *
         * @hooked show_seller_dashboard_notice
         *
         * @since  2.4
         */
        do_action( 'dokan_dashboard_content_inside_before' );
        ?>

        <article class="dashboard-content-area">

            <?php

            /**
             *  Added dokan_dashboard_before_widgets hook
             *
             * @hooked dokan_show_profile_progressbar
             *
             * @since  2.4
             */
            do_action( 'dokan_dashboard_before_widgets' );
            ?>

            <div class="dokan-w6 dokan-dash-left">

                <?php

                /**
                 *  Added dokan_dashboard_left_widgets hook
                 *
                 * @hooked get_big_counter_widgets
                 * @hooked get_orders_widgets
                 * @hooked get_products_widgets
                 *
                 * @since  2.4
                 */
                do_action( 'dokan_dashboard_left_widgets' );
                ?>

            </div> <!-- .col-md-6 -->

            <div class="dokan-w6 dokan-dash-right">
                <?php
                /**
                 *  Added dokan_dashboard_right_widgets hook
                 *
                 * @hooked get_sales_report_chart_widget
                 *
                 * @since  2.4
                 */
                do_action( 'dokan_dashboard_right_widgets' );
                ?>

            </div>

        </article><!-- .dashboard-content-area -->

        <?php

        /**
         *  Added dokan_dashboard_content_inside_after hook
         *
         * @since 2.4
         */
        do_action( 'dokan_dashboard_content_inside_after' );
        ?>


    </div><!-- .dokan-dashboard-content -->

    <?php

    /**
     *  Added dokan_dashboard_content_after hook
     *
     * @since 2.4
     */
    do_action( 'dokan_dashboard_content_after' );
    ?>

</div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
<?php
get_footer();