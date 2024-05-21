   
        <div id="fbu-station-modal" class="fbu-modal">
            <div class="fbu-modal-content">

                <div class="current" data-kt-stepper-element="content">
                    
                </div>
                <!-- Modal content -->
                <div class="dokan-product-category-modal-content">
                    <div class="dokan-product-category-modal-header flex">
                        <div class="dokan-product-category-title w-full">
                            <span class="dokan-single-title"><?php esc_html_e( 'Add new Station', 'dokan-lite' ); ?></span>
                            <span class="dokan-single-des"><?php esc_html_e( 'Please choose up-to 3 stations', 'dokan-lite' ); ?></span>
                        </div>
                        <div class="dokan-product-category-close">
                            <span class="close" id="dokan-category-close-modal">&times;</span>
                        </div>
                    </div>
                    <div class="dokan-product-category-modal-body">
                        <div class="dokan-single-categories-container">
                            <span class="fbu-close dokan-single-categories-left dokan-single-categories-arrow dokan-hide">
                                <span class="dokan-single-categories-left-box">
                                    <span><i class="fas fa-chevron-left"></i></span>
                                </span>
                            </span>
                            <ul class="dokan-single-categories" id="dokan-single-categories">
                                
                            <?php
                            $list = $categories = get_terms(array(
                                'taxonomy' => 'station',
                                'hide_empty' => false,
                            ));
                            
                            foreach ($list as $key => $value) {
                            ?>
                                <li data-text="#fbu-station-text" data-input="#fbu-station" class="choose-genre cursor-pointer bg-gray-100" data-id="<?php echo $value->term_id; ?>">  <?php echo $value->name; ?> </li>
                            <?php 
                            }
                            ?>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>