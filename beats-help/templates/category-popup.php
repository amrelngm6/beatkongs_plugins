   
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
                                    <input  <?php echo in_array($value->term_id, $selectedCategory) ? 'checked' : (count($selectedCategory) == 3  ? 'disabled' : ''); ?> type="checkbox" class="genre-checkbox" name="selected_cats[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" />
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


<!-- The Modal -->
<div id="dokan-product-category-modal" class="dokan-product-category-modal" style="display:flex">

    <!-- Modal content -->
    <div class="dokan-product-category-modal-content">
        <div class="dokan-product-category-modal-header">
            <div class="dokan-product-category-title">
                <span class="dokan-single-title">Select Genres</span>
                <span class="dokan-single-des">Please choose the right Genre for this beat</span>
            </div>
            <div class="dokan-product-category-close">
                <span class="close" id="dokan-category-close-modal">&times;</span>
            </div>
        </div>
        <div class="dokan-product-category-modal-body">
            <div class="dokan-category-search-container">
                <div class="dokan-cat-search-box">
                    <span class="dokan-cat-search-icon"><i class="fas fa-search"></i></span>
                    <input maxlength="100" id="dokan-single-cat-search-input" class="dokan-cat-search-input" type="text" placeholder="Search Genre">
                    <span class="dokan-cat-search-text-limit"><span id="dokan-cat-search-text-limit">0</span>/100</span>
                </div>
                <div id="dokan-cat-search-res" class="dokan-cat-search-res dokan-hide">
                    <ul id="dokan-cat-search-res-ul" class="dokan-cat-search-res-ul">
                        
                    </ul>
                </div>
            </div>
            <div class="dokan-single-categories-container">
                <span class="dokan-single-categories-left dokan-single-categories-arrow dokan-hide">
                    <span class="dokan-single-categories-left-box">
                        <span><i class="fas fa-chevron-left"></i></span>
                    </span>
                </span>
                <div class="dokan-single-categories" id="dokan-single-categories">
                <ul id="1-level-cat-ul" class="dokan-product-category-ul 1-level-cat" data-level="1">
                    
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
                            <input  <?php echo in_array($value->term_id, $selectedCategory) ? 'checked' : (count($selectedCategory) == 3  ? 'disabled' : ''); ?> type="checkbox" class="genre-checkbox" name="selected_cats[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" />
                            <?php echo $value->name; ?> 
                        </label>
                        <li data-indexli="0" data-haschild="false" data-name="Genre" data-catlevel="1" class=" dokan-product-category-li " data-term-id="<?php echo $value->term_id; ?>" data-taxonomy="beat_category">
                        <span class="dokan-product-category"><?php echo $value->name; ?></span>
                        <span class="dokan-product-category-icon"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <?php 
                    }
                    ?>
                    <li data-indexli="3" data-haschild="false" data-name="Trending Tracks" data-catlevel="2" class=" dokan-product-category-li " data-term-id="23" data-taxonomy="product_cat">
                        <span class="dokan-product-category">Trending Tracks</span>
                        <span class="dokan-product-category-icon"><i class="fas fa-chevron-right"></i></span>
                    </li></ul>
                    <ul id="2-level-cat-ul" class="dokan-product-category-ul 2-level-cat" data-level="2"><li data-indexli="9" data-haschild="false" data-name="West Coast Beats" data-catlevel="2" class=" dokan-product-category-li " data-term-id="83" data-taxonomy="product_cat">
                        <span class="dokan-product-category">West Coast Beats</span>
                        <span class="dokan-product-category-icon"><i class="fas fa-chevron-right"></i></span>
                    </li></ul>
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
                <span class="dokan-selected-category-label">Selected: </span>
                <span class="dokan-selected-category-span" id="dokan-selected-category-span">
                    <span class="dokan-selected-category-product">No Genres</span>
                </span>
            </div>
            <div class="dokan-product-category-button-container">
                <button class="dokan-single-cat-select-btn dokan-btn dokan-btn-default dokan-btn-theme" id="dokan-single-cat-select-btn" type='button'>Done</button>
            </div>
        </div>
    </div>

</div>