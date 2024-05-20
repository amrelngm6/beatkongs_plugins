<?php
/**
 * Template Name: Upload Beat
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>

<div id="upload-beat-root" class="upload-beat-container">
    <h1>Upload Beat</h1>
    <form id="upload-beat-form" enctype="multipart/form-data">
        <div>
            <label for="beatTitle">Beat Title</label>
            <input type="text" id="beatTitle" name="beat_title" required>
        </div>
        <div>
            <label for="beatPrice">Price ($)</label>
            <input type="number" id="beatPrice" name="beat_price" step="0.01" required>
        </div>
        <div>
            <label for="beatDescription">Description</label>
            <textarea id="beatDescription" name="beat_description" required></textarea>
        </div>
        <div>
            <label for="beatFile">Upload Beat</label>
            <input type="file" id="beatFile" name="beat_file" accept="audio/*" required>
        </div>
        <button type="submit">Upload Beat</button>
    </form>
    <p id="upload-beat-message"></p>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('upload-beat-form');
        const message = document.getElementById('upload-beat-message');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);

            fetch('<?php echo esc_url(rest_url('custom/v1/upload-beat')); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-WP-Nonce': '<?php echo wp_create_nonce('wp_rest'); ?>'
                }
            })
            .then(response => response.json())
            .then(data => {
                message.textContent = data.message;
            })
            .catch(error => {
                message.textContent = 'Error uploading beat: ' + error.message;
            });
        });
    });
</script>

<?php
get_footer();
?>
