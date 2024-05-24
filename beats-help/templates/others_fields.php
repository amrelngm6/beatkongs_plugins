<?php
$post_statuses = ['publish', 'pending'];

$beatId =  $_GET['beat_id'] ?? 0;

$post = isset($_GET['beat_id']) ? get_post( $beatId, ARRAY_A ) : null; 
$postMeta = get_metadata( 'post', $beatId);
?>

<div class="dokan-other-options dokan-edit-row dokan-clearfix <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_other_options">
        <h2><i class="fas fa-cog" aria-hidden="true"></i> <?php esc_html_e( 'Other Options', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Set your extra beat options', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle" data-target="#others-content-fields">
            <i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content" id="others-content-fields">
        <div class="dokan-form-group content-half-part">
            <label for="beat_status" class="form-label"><?php esc_html_e( 'Beat Status', 'dokan-lite' ); ?></label>
            <select id="beat_status" class="dokan-form-control" name="beat_status">
                <?php foreach ( $post_statuses as $name ) : // phpcs:ignore ?>
                    <option value="<?php echo esc_attr( $name ); ?>" <?php print_r($post); echo ($post->post_status == $name) ? 'selected' : ''; ?>>
                        <?php echo esc_html( ucfirst($name )); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="dokan-form-group content-half-part">
            <label for="beat_visibility" class="form-label"><?php esc_html_e( 'Visibility', 'dokan-lite' ); ?></label>
            <select name="beat_visibility" id="beat_visibility" class="dokan-form-control">
                <?php foreach ( ['visible', 'hidden'] as $name ) : ?>
                    <option value="<?php echo esc_attr( $name ); ?>" <?php echo (isset($postMeta['beat_visibility'][0]) && $postMeta['beat_visibility'][0] == $name) ? 'selected' : ''; ?>>
                        <?php echo esc_html( ucfirst($name) ); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="dokan-clearfix"></div>

        <div class="dokan-form-group">
            <label for="beat_agreement" class="form-label"><?php esc_html_e( 'FREE BEAT AGREEMENT', 'dokan-lite' ); ?></label>
            <textarea name="beat_agreement" id="beat_agreement" rows="4" class="dokan-form-control" placeholder="AGREEMENT OF FREE BEAT "><?php echo $postMeta['beat_agreement'][0] ?? ''; ?></textarea>
        </div>

        <div class="dokan-form-group">
            <?php
            dokan_post_input_box(
                $post_id,
                'beat_enable_reviews',
                [
                    'value' =>  $postMeta['beat_enable_reviews'][0] ?? 'no',
                    'label' => __( 'Enable beat reviews', 'dokan-lite' ),
                ],
                'checkbox'
            );
            ?>
        </div>
    </div>
</div><!-- .dokan-other-options -->
