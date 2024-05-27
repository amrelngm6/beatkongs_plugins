<?php

$list = $categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
));
$beatId =  $_GET['beat_id'] ?? 0;
$selectedCategory = array_column(wp_get_post_terms( $beatId, 'category'), 'term_id');

?>

<!-- The Modal -->
<div id="dokan-product-category-modal" class="dokan-product-category-modal" >

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
                    <input maxlength="100" id="dokan-single-cat-search-input" class="dokan-cat-search-input" data-result="#dokan-cat-search-res-ul" data-list="#dokan-cats-json-list" data-titles="#dokan-cats-json-titles" type="text" placeholder="Search Genre">
                    <input id="dokan-cats-json-titles"  type="hidden" value='<?php echo json_encode(array_column($list, 'name')); ?>' >
                    <input id="dokan-cats-json-list"  type="hidden" value='<?php echo json_encode($list); ?>' >
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
                <ul id="1-level-cat-ul" data-span="#dokan-selected-category-span" class="dokan-product-category-ul 1-level-cat" data-level="1">
                    
                    <?php
                    foreach ($list as $key => $value) {
                    ?>
                        
                    <li data-indexli="0" data-haschild="false" data-name="Genre" data-catlevel="1" class=" dokan-product-category-li " data-term-id="<?php echo $value->term_id; ?>" data-taxonomy="beat_category">
                        <label class="cursor-pointer w-full flex" data-id="<?php echo $value->term_id; ?>" >  
                            <span class="dokan-product-category w-full" style="font-weight: 600"><?php echo $value->name; ?></span>
                            <input  <?php echo in_array($value->term_id, $selectedCategory) ? 'checked' : (count($selectedCategory) == 3  ? 'disabled' : ''); ?> type="checkbox" class="genre-checkbox" name="selected_cats[]" data-title="<?php echo $value->name; ?>"  value="<?php echo $value->term_id; ?>" id="checkbox-cat-<?php echo $value->term_id; ?>" />
                        </label>
                    </li>
                    <?php 
                    }
                    ?>
                    </ul>
                    
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
                <button class="dokan-single-cat-select-btn dokan-btn dokan-btn-default dokan-btn-theme choose-genre" data-target="#dokan-single-categories" id="dokan-single-cat-select-btn" type='button'>Done</button>
            </div>
        </div>
    </div>

</div>