<div class='dokan-linked-product-options dokan-edit-row dokan-clearfix hide_if_external'>
    <div class='dokan-section-heading' data-togglehandler='dokan_linked_product_options'>
        <h2><i class='fas fa-link' aria-hidden='true'></i> <?php esc_html_e( 'Linked Products', 'dokan' ); ?></h2>
        <p><?php esc_html_e( 'Set your linked products for upsell and cross-sells', 'dokan' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <div class="content-half-part dokan-form-group hide_if_variation">
            <label for="upsell_ids" class="form-label"><?php esc_html_e( 'Upsells', 'dokan' ); ?> <i
                    class="fas fa-question-circle tips" aria-hidden="true"
                    data-title="<?php esc_html_e( 'Upsells are products which you recommend instead of the currently viewed product, for example, products that are more profitable or better quality or more expensive.',
                        'dokan' ); ?>"></i></label>
            <select class="dokan-form-control dokan-product-search" multiple="multiple" style="width: 100%;"
                    id="upsell_ids" name="upsell_ids[]"
                    data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'dokan' ); ?>"
                    data-action="dokan_json_search_products_and_variations"
                    data-exclude="<?php echo intval( $post->ID ); ?>"
                    data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <?php
                if ( ! empty( $upsells_ids ) ) {
                    foreach ( $upsells_ids as $product_id ) {
                        $product = wc_get_product( $product_id );
                        if ( is_object( $product ) ) {
                            echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>'
                                 . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                        }
                    }
                }
                ?>
            </select>
        </div>

        <div class="content-half-part">
            <label for="crosssell_ids" class="form-label"><?php esc_html_e( 'Cross-sells', 'dokan' ); ?> <i
                    class="fas fa-question-circle tips" aria-hidden="true"
                    data-title="<?php esc_html_e( 'Cross-sells are products which you promote in the cart, based on the current product.', 'dokan' ); ?>"></i></label>
            <select class="dokan-form-control dokan-product-search" multiple="multiple" style="width: 100%;"
                    id="crosssell_ids" name="crosssell_ids[]"
                    data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'dokan' ); ?>"
                    data-action="dokan_json_search_products_and_variations"
                    data-exclude="<?php echo intval( $post->ID ); ?>"
                    data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <?php
                if ( ! empty( $crosssells_ids ) ) {
                    foreach ( $crosssells_ids as $product_id ) {
                        $product = wc_get_product( $product_id );
                        if ( is_object( $product ) ) {
                            echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                        }
                    }
                }
                ?>
            </select>
        </div>

        <div class="dokan-clearfix"></div>
    </div>
</div>
