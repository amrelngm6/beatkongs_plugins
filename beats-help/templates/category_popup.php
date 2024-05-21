        
        <div id="fbu-category-modal" class="fbu-modal">
            <div class="fbu-modal-content">

                <div class="current" data-kt-stepper-element="content">
                    
                </div>
                <!-- Modal content -->
                <div class="dokan-product-category-modal-content">
                    <div class="dokan-product-category-modal-header">
                        <div class="dokan-product-category-title">
                            <span class="dokan-single-title"><?php esc_html_e( 'Add new Genre', 'dokan-lite' ); ?></span>
                            <span class="dokan-single-des"><?php esc_html_e( 'Please choose the right Genre for this beat', 'dokan-lite' ); ?></span>
                        </div>
                        <div class="dokan-product-category-close">
                            <span class="close" id="dokan-category-close-modal">&times;</span>
                        </div>
                    </div>
                    <div class="dokan-product-category-modal-body">
                        <div class="dokan-single-categories-container">
                            <span class="dokan-single-categories-left dokan-single-categories-arrow dokan-hide">
                                <span class="dokan-single-categories-left-box">
                                    <span><i class="fas fa-chevron-left"></i></span>
                                </span>
                            </span>
                            <div class="dokan-single-categories" id="dokan-single-categories">
                                
                            <?php
                            $list = $categories = get_terms(array(
                                'taxonomy' => 'category',
                                'hide_empty' => false,
                            ));
                            
                            foreach ($list as $key => $value) {
                            ?>
                                <li class="choose-genre" data-id="<?php echo $value->term_id; ?>">  <?php echo $value->name; ?> </li>
                            <?php 
                            }
                            ?>
                            </div>
                            <span class="dokan-single-categories-right dokan-single-categories-arrow dokan-hide">
                                <span class="dokan-single-categories-right-box">
                                    <span><i class="fas fa-chevron-right"></i></span>
                                </span>
                            </span>
                        </div>

                    </div>
                    <div class="dokan-product-category-modal-footer">
                        <div class="dokan-selected-category-label-container">
                            <span class="dokan-selected-category-label"><?php esc_html_e( 'Selected: ', 'dokan-lite' ); ?></span>
                            <span class="dokan-selected-category-span" id="dokan-selected-category-span">
                                <span class="dokan-selected-category-product"><?php esc_html_e( 'No Genres', 'dokan-lite' ); ?></span>
                            </span>
                        </div>
                        <div class="dokan-product-category-button-container">
                            <button class="dokan-single-cat-select-btn dokan-btn dokan-btn-default dokan-btn-theme" id="dokan-single-cat-select-btn" type='button'><?php esc_html_e( 'Done', 'dokan-lite' ); ?></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>