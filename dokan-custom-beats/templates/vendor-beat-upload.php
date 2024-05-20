<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="dokan-dashboard-wrap">
    <div class="dokan-dashboard-content">
        <article class="dokan-dashboard-article">
            <header class="dokan-dashboard-header">
                <h1 class="entry-title"><?php _e( 'Upload Beat', 'dokan-custom-beats' ); ?></h1>
            </header>
            <div class="entry-content">
                <!-- Your HTML code for beat upload form -->
                <form method="post" enctype="multipart/form-data">
                    <div class="dokan-form-group">
                        <label for="beat_title"><?php _e( 'Beat Title', 'dokan-custom-beats' ); ?></label>
                        <input type="text" id="beat_title" name="beat_title" class="dokan-form-control" required>
                    </div>
                    <div class="dokan-form-group">
                        <label for="beat_file"><?php _e( 'Beat File', 'dokan-custom-beats' ); ?></label>
                        <input type="file" id="beat_file" name="beat_file" class="dokan-form-control" required>
                    </div>
                    <div class="dokan-form-group">
                        <button type="submit" class="dokan-btn dokan-btn-theme"><?php _e( 'Upload', 'dokan-custom-beats' ); ?></button>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
