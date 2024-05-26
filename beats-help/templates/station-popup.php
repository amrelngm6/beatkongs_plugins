   
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
                        <div class="fbu-close cusror-pointer dokan-product-category-close">
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
                            <ul class="dokan-single-categories" id="dokan-single-stations">
                                
                            <?php
                            $list = $categories = get_terms(array(
                                'taxonomy' => 'station',
                                'hide_empty' => false,
                            ));
                            $beatId =  $_GET['beat_id'] ?? 0;
                            $selectedStation = array_column(wp_get_post_terms( $beatId, 'station'), 'term_id');
                            foreach ($list as $key => $value) {
                                $checked = ($key < 2) ? 'disabled checked' : (in_array($value->term_id, $selectedStation) ? 'checked' : (count($selectedStation) == 3  ? 'disabled' : '')) ;
                            ?>
                            
                                <label class="cursor-pointer block w-full bg-gray-100" data-id="<?php echo $value->term_id; ?>" >  
                                    <?php if ($key < 2) { ?> 
                                    <input  type="hidden" checked class="genre-checkbox" name="selected_stations[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" />
                                    <?php } ?>

                                    <input <?php echo $checked; ?>  type="checkbox" class="genre-checkbox" name="selected_stations[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" />
                                    <?php echo $value->name; ?> 
                                </label>
                            <?php 
                            }
                            ?>
                            </ul>
                            <button class="choose-genre" data-target="#dokan-single-stations" >Done</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
