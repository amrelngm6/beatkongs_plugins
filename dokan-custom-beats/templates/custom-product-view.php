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


<div class="dokan-dashboard-wrap">
    <?php dokan_get_template( 'global/seller-dashboard-nav.php', array( 'active_menu' => 'custom-product-view' ) ); ?>
    <div class="dokan-dashboard-content dokan-product-listing">
        <article class="dokan-product-listing-area">
            <h1><?php _e( 'Custom Product View', 'dokan' ); ?></h1>
            <p><?php _e( 'Here you can view your products in a custom layout.', 'dokan' ); ?></p>
            
            <!-- Your custom product view code goes here -->
            <?php
            $vendor_id = dokan_get_current_user_id();
            $args = array(
                'post_type'   => 'product',
                'author'      => $vendor_id,
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );

            $products = new WP_Query( $args );

            if ( $products->have_posts() ) :
                echo '<ul class="custom-product-list">';
                while ( $products->have_posts() ) : $products->the_post();
                    global $product;
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="product-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                    </li>
                    <?php
                endwhile;
                echo '</ul>';
            else :
                echo '<p>' . __( 'No products found', 'dokan' ) . '</p>';
            endif;

            wp_reset_postdata();
            ?>
        </article>
    </div>
</div>
