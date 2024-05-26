   
        <div id="fbu-category-modal" class="fbu-modal">
            <div class="fbu-modal-content">

                <div class="current" data-kt-stepper-element="content">
                    
                </div>
                <!-- Modal content -->
                <div class="dokan-product-category-modal-content">
                    <div class="dokan-product-category-modal-header flex">
                        <div class="dokan-product-category-title w-full">
                            <span class="dokan-single-title"><?php esc_html_e( 'Add new Genre', 'dokan-lite' ); ?></span>
                            <span class="dokan-single-des"><?php esc_html_e( 'Please choose up to 3 Genres for this beat', 'dokan-lite' ); ?></span>
                        </div>
                        <div class="fbu-close cusror-pointer dokan-product-category-close ">
                            <span class="close " id="dokan-category-close-modal">&times;</span>
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
                                'taxonomy' => 'category',
                                'hide_empty' => false,
                            ));
                            $beatId =  $_GET['beat_id'] ?? 0;
                            $selectedCategory = array_column(wp_get_post_terms( $beatId, 'category'), 'term_id');
                            foreach ($list as $key => $value) {
                            ?>
                                <label class="cursor-pointer block w-full bg-gray-100" data-id="<?php echo $value->term_id; ?>" >  
                                    <input <?php echo count($selectedCategory) == 3 ? 'disabled' : ''; ?> <?php echo in_array($value->term_id, $selectedCategory) ? 'checked' : ''; ?> type="checkbox" class="genre-checkbox" name="selected_cats[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" />
                                    <?php echo $value->name; ?> 
                                </label>
                            <?php 
                            }
                            ?>
                            </ul>
                            <button class="choose-genre" data-target="#dokan-single-categories" >Done</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

