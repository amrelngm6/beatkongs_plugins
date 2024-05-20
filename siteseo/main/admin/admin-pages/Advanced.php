<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Are we being accessed directly ?
if(!defined('SITESEO_VERSION')) {
	exit('Hacking Attempt !');
}

function siteseo_advanced_advanced_attachments_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_attachments']); ?>

	<label for="siteseo_advanced_advanced_attachments">
		<input id="siteseo_advanced_advanced_attachments"
			name="siteseo_advanced_option_name[advanced_attachments]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>
		<?php esc_html_e('Redirect attachment pages to post parent (or homepage if none)', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_attachments_file_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_attachments_file']); ?>

	<label for="siteseo_advanced_advanced_attachments_file">
		<input id="siteseo_advanced_advanced_attachments_file"
			name="siteseo_advanced_option_name[advanced_attachments_file]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Redirect attachment pages to their file URL (https://www.example.com/my-image-file.jpg)', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('If this option is checked, it will take precedence over the redirection of attachments to the post\'s parent.', 'siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_clean_filename_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_clean_filename']); ?>

	<label for="siteseo_advanced_advanced_clean_filename">
		<input id="siteseo_advanced_advanced_clean_filename"
			name="siteseo_advanced_option_name[advanced_clean_filename]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('When upload a media, remove accents, spaces, capital letters... and force UTF-8 encoding', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('e.g. "ExãMple 1 cópy!.jpg" => "example-1-copy.jpg"', 'siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_image_auto_title_editor_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_image_auto_title_editor']); ?>

	<label for="siteseo_advanced_advanced_image_auto_title_editor">
		<input id="siteseo_advanced_advanced_image_auto_title_editor"
			name="siteseo_advanced_option_name[advanced_image_auto_title_editor]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('When uploading an image file, automatically set the title based on the filename', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('We use the product title for WooCommerce products.', 'siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_image_auto_alt_editor_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_image_auto_alt_editor']); ?>

	<label for="siteseo_advanced_advanced_image_auto_alt_editor">
		<input id="siteseo_advanced_advanced_image_auto_alt_editor"
			name="siteseo_advanced_option_name[advanced_image_auto_alt_editor]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('When uploading an image file, automatically set the alternative text based on the filename', 'siteseo'); ?>
	</label>

	<?php
}

function siteseo_advanced_advanced_image_auto_alt_target_kw_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_image_auto_alt_target_kw']); ?>

	<label for="siteseo_advanced_advanced_image_auto_alt_target_kw">
		<input id="siteseo_advanced_advanced_image_auto_alt_target_kw"
			name="siteseo_advanced_option_name[advanced_image_auto_alt_target_kw]" type="checkbox"
			<?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Use the target keywords if not alternative text set for the image', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('This setting will be applied to images without any alt text only on frontend. This setting is retroactive. If you turn it off, alt texts that were previously empty will be empty again.', 'siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_image_auto_caption_editor_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_image_auto_caption_editor']); ?>

	<label for="siteseo_advanced_advanced_image_auto_caption_editor">
		<input id="siteseo_advanced_advanced_image_auto_caption_editor"
			name="siteseo_advanced_option_name[advanced_image_auto_caption_editor]" type="checkbox"
			<?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('When uploading an image file, automatically set the caption based on the filename', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_image_auto_desc_editor_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_image_auto_desc_editor']); ?>
	<label for="siteseo_advanced_advanced_image_auto_desc_editor">
		<input id="siteseo_advanced_advanced_image_auto_desc_editor"
			name="siteseo_advanced_option_name[advanced_image_auto_desc_editor]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('When uploading an image file, automatically set the description based on the filename', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_replytocom_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_replytocom']); ?>

	<label for="siteseo_advanced_advanced_replytocom">
		<input id="siteseo_advanced_advanced_replytocom" name="siteseo_advanced_option_name[advanced_replytocom]" type="checkbox" <?php checked($check, '1') ?> value="1"/>
		<?php esc_html_e('Remove ?replytocom link in source code and replace it with a simple anchor', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e( 'e.g. "https://www.example.com/my-blog-post/?replytocom=10#respond" => "#comment-10"', 'siteseo' ); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_noreferrer_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_noreferrer']); ?>

	<label for="siteseo_advanced_advanced_noreferrer">
		<input id="siteseo_advanced_advanced_noreferrer" name="siteseo_advanced_option_name[advanced_noreferrer]" type="checkbox" <?php checked($check, '1') ?> value="1"/>
		<?php esc_html_e('Remove noreferrer link attribute in source code', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('Useful for affiliate links (eg: Amazon).','siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_tax_desc_editor_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_tax_desc_editor']); ?>

	<label for="siteseo_advanced_advanced_tax_desc_editor">
		<input id="siteseo_advanced_advanced_tax_desc_editor" name="siteseo_advanced_option_name[advanced_tax_desc_editor]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>
		<?php esc_html_e('Add TINYMCE editor to term description', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_category_url_callback(){
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_category_url']); ?>

	<label for="siteseo_advanced_advanced_category_url">
		<input id="siteseo_advanced_advanced_category_url" name="siteseo_advanced_option_name[advanced_category_url] type="checkbox" <?php checked($check, '1') ?>
		value="1"/>
		
		<?php
		$category_base = '/category/';
		if(get_option('category_base')){
			$category_base = '/' . get_option('category_base');
		}

		printf(wp_kses_post(__('Remove <strong>%s</strong> in your permalinks', 'siteseo')), esc_html($category_base)); ?>
	</label>

	<p class="description">
		<?php esc_html_e('e.g. "https://example.com/category/my-post-category/" => "https://example.com/my-post-category/"','siteseo'); ?>
	</p>

	<div class="siteseo-notice">
		<span class="dashicons dashicons-info"></span>
		<p> <?php esc_html_e('You have to flush your permalinks each time you change this setting.', 'siteseo'); ?> </p>
	</div>

<?php
}

function siteseo_advanced_advanced_product_cat_url_callback() {
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		$options = get_option('siteseo_advanced_option_name');

		$check = isset($options['advanced_product_cat_url']);

		?>

	<label for="siteseo_advanced_advanced_product_cat_url">
		<input id="siteseo_advanced_advanced_product_cat_url"
			name="siteseo_advanced_option_name[advanced_product_cat_url]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php
		$category_base = get_option('woocommerce_permalinks');
		$category_base = $category_base['category_base'];

		if ('' != $category_base) {
			$category_base = '/' . $category_base . '/';
		} else {
			$category_base = '/product-category/';
		}

		printf(wp_kses_post(__('Remove <strong>%s</strong> in your permalinks', 'siteseo')), esc_html($category_base)); ?>

	</label>

	<p class="description">
		<?php esc_html_e('e.g. "https://example.com/product-category/my-product-category/" => "https://example.com/my-product-category/"','siteseo'); ?>
	</p>

	<div class="siteseo-notice">
		<span class="dashicons dashicons-info"></span>
		<p>
			<?php esc_html_e('You have to flush your permalinks each time you change this setting.', 'siteseo'); ?>
		</p>
		<p>
			<?php esc_html_e('Make sure you don\'t have identical URLs after activating this option to prevent conflicts.', 'siteseo'); ?>
		</p>
	</div>

	<?php
	} else { ?>
		<div class="siteseo-notice is-warning">
			<span class="dashicons dashicons-warning"></span>
			<p>
				<?php echo wp_kses_post(__('You need to enable <strong>WooCommerce</strong> to apply these settings.', 'siteseo')); ?>
			</p>
		</div>
	<?php
	}
}

function siteseo_advanced_advanced_wp_generator_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_wp_generator']); ?>

	<label for="siteseo_advanced_advanced_wp_generator">
		<input id="siteseo_advanced_advanced_wp_generator" name="siteseo_advanced_option_name[advanced_wp_generator]" type="checkbox" <?php checked( $check, '1') ?>
		value="1"/>
		<?php esc_html_e('Remove WordPress meta generator in source code', 'siteseo'); ?>
	</label>

	<pre><?php esc_attr_e('<meta name="generator" content="WordPress 6.0.3" />', 'siteseo'); ?></pre>

<?php
}

function siteseo_advanced_advanced_hentry_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_hentry']); ?>

	<label for="siteseo_advanced_advanced_hentry">
		<input id="siteseo_advanced_advanced_hentry" name="siteseo_advanced_option_name[advanced_hentry]" type="checkbox" <?php checked($check, '1') ?>	value="1"/>
		<?php esc_html_e('Remove hentry post class to prevent Google from seeing this as structured data (schema)', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_comments_author_url_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_comments_author_url']); ?>

	<label for="siteseo_advanced_advanced_comments_author_url">
		<input id="siteseo_advanced_advanced_comments_author_url" name="siteseo_advanced_option_name[advanced_comments_author_url]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove comment author URL in comments if the website is filled from profile page', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_comments_website_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_comments_website']); ?>

	<label for="siteseo_advanced_advanced_comments_website">
		<input id="siteseo_advanced_advanced_comments_website"
			name="siteseo_advanced_option_name[advanced_comments_website]" type="checkbox" <?php checked($check, '1') ?>
			value="1"/>

		<?php esc_html_e('Remove website field from comment form to reduce spam', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_advanced_comments_form_link_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_comments_form_link']); ?>

	<label for="siteseo_advanced_advanced_comments_form_link">
		<input id="siteseo_advanced_advanced_comments_form_link"
			name="siteseo_advanced_option_name[advanced_comments_form_link]" type="checkbox" <?php checked($check, '1') ?>
			value="1"/>
		<?php esc_html_e('Prevent search engines to follow / index the link to the comments form', 'siteseo'); ?>
	</label>

	<pre>https://www.example.com/my-blog-post/#respond</pre>

<?php
}

function siteseo_advanced_advanced_wp_shortlink_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_wp_shortlink']); ?>

	<label for="siteseo_advanced_advanced_wp_shortlink">
		<input id="siteseo_advanced_advanced_wp_shortlink"
			name="siteseo_advanced_option_name[advanced_wp_shortlink]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove WordPress shortlink meta tag in source code', 'siteseo'); ?>
	</label>

	<pre><?php esc_attr_e('<link rel="shortlink" href="https://www.example.com/"/>'); ?></pre>

<?php
}

function siteseo_advanced_advanced_wp_wlw_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_wp_wlw']); ?>

	<label for="siteseo_advanced_advanced_wp_wlw">
		<input id="siteseo_advanced_advanced_wp_wlw" name="siteseo_advanced_option_name[advanced_wp_wlw]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove Windows Live Writer meta tag in source code', 'siteseo'); ?>
	</label>

	<pre><?php esc_attr_e('<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.example.com/wp-includes/wlwmanifest.xml" />'); ?></pre>

<?php
}

function siteseo_advanced_advanced_wp_rsd_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['advanced_wp_rsd']); ?>

	<label for="siteseo_advanced_advanced_wp_rsd">
		<input id="siteseo_advanced_advanced_wp_rsd"
			name="siteseo_advanced_option_name[advanced_wp_rsd]" type="checkbox" <?php checked($check, '1')?>
		value="1"/>

		<?php esc_html_e('Remove Really Simple Discovery meta tag in source code', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('WordPress Site Health feature will return a HTTPS warning if you enable this option. This is a false positive of course.', 'siteseo'); ?>
	</p>

	<pre><?php esc_attr_e('<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.example.com/xmlrpc.php?rsd" />'); ?></pre>

<?php
}

function siteseo_advanced_advanced_google_callback() {
	$options = get_option('siteseo_advanced_option_name');
	$check = isset($options['advanced_google']) ? $options['advanced_google'] : null;

	printf('<input type="text" name="siteseo_advanced_option_name[advanced_google]" placeholder="' . esc_html__('Enter Google meta value site verification', 'siteseo') . '" aria-label="' . esc_html__('Google site verification', 'siteseo') . '" value="%s"/>',
	esc_html($check)
	); ?>
	<p class="description">
		<?php echo wp_kses_post(__('If your site is already verified in <strong>Google Search Console</strong>, you can leave this field empty.', 'siteseo')); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_bing_callback() {
	$options = get_option('siteseo_advanced_option_name');
	$check = isset($options['advanced_bing']) ? $options['advanced_bing'] : null;

	printf('<input type="text" name="siteseo_advanced_option_name[advanced_bing]" placeholder="' . esc_html__('Enter Bing meta value site verification', 'siteseo') . '" aria-label="' . esc_html__('Bing site verification', 'siteseo') . '" value="%s"/>',
	esc_html($check)
	); ?>
	<p class="description">
		<?php echo wp_kses_post(__('If your site is already verified in <strong>Bing Webmaster tools</strong>, you can leave this field empty.', 'siteseo')); ?>
	</p>

<?php
}

function siteseo_advanced_advanced_pinterest_callback() {
	$options = get_option('siteseo_advanced_option_name');
	$check   = isset($options['advanced_pinterest']) ? $options['advanced_pinterest'] : null;

	printf('<input type="text" name="siteseo_advanced_option_name[advanced_pinterest]" placeholder="' . esc_html__('Enter Pinterest meta value site verification', 'siteseo') . '" aria-label="' . esc_html__('Pinterest site verification', 'siteseo') . '" value="%s"/>',	esc_html($check) );
}

function siteseo_advanced_advanced_yandex_callback() {
	$options = get_option('siteseo_advanced_option_name');
	$check   = isset($options['advanced_yandex']) ? $options['advanced_yandex'] : null;

	printf('<input type="text" name="siteseo_advanced_option_name[advanced_yandex]" aria-label="' . esc_html__('Yandex site verification', 'siteseo') . '" placeholder="' . esc_html__('Enter Yandex meta value site verification', 'siteseo') . '" value="%s"/>', esc_html($check) );
}

function siteseo_advanced_appearance_adminbar_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_adminbar']); ?>

	<label for="siteseo_advanced_appearance_adminbar">
		<input id="siteseo_advanced_appearance_adminbar" name="siteseo_advanced_option_name[appearance_adminbar]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove SEO from Admin Bar in backend and frontend', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_universal_metabox_callback() {
	$options = get_option('siteseo_advanced_option_name');

	if(!$options){
		$check = "1";
	} else {
		$check = isset($options['appearance_universal_metabox']) && $options['appearance_universal_metabox'] === '1' ? true : false;
	}
?>

	<label for="siteseo_advanced_appearance_universal_metabox">
		<input id="siteseo_advanced_appearance_universal_metabox" name="siteseo_advanced_option_name[appearance_universal_metabox]" type="checkbox" <?php checked($check, "1"); ?> value="1"/>

		<?php esc_html_e('Enable the universal SEO metabox for the Block Editor (Gutenberg)', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_universal_metabox_disable_callback() {
	$docs = function_exists('siteseo_get_docs_links') ? siteseo_get_docs_links() : '';
	$options = get_option('siteseo_advanced_option_name');

	if(!$options){
		$check = "1";
	} else {
		$check = isset($options['appearance_universal_metabox_disable']) && $options['appearance_universal_metabox_disable'] === '1' ? true : false;
	}
?>

	<label for="siteseo_advanced_appearance_universal_metabox_disable">
		<input id="siteseo_advanced_appearance_universal_metabox_disable"
			name="siteseo_advanced_option_name[appearance_universal_metabox_disable]"
			type="checkbox"
			<?php checked($check, "1"); ?>
			value="1"/>

		<?php esc_html_e('Disable the universal SEO metabox', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_adminbar_noindex_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_adminbar_noindex']); ?>

	<label for="siteseo_advanced_appearance_adminbar_noindex">
		<input id="siteseo_advanced_appearance_adminbar_noindex"
			name="siteseo_advanced_option_name[appearance_adminbar_noindex]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove noindex item from Admin Bar in backend and frontend', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_metaboxe_position_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$selected = isset($options['appearance_metaboxe_position']) ? $options['appearance_metaboxe_position'] : null; ?>

	<select id="siteseo_advanced_appearance_metaboxe_position"
		name="siteseo_advanced_option_name[appearance_metaboxe_position]">
		<option <?php if ('high' == $selected) { ?>
			selected="selected"
			<?php } ?>
			value="high"><?php esc_html_e('High priority (top)', 'siteseo'); ?>
		</option>
		<option <?php if ('default' == $selected) { ?>
			selected="selected"
			<?php } ?>
			value="default"><?php esc_html_e('Normal priority (default)', 'siteseo'); ?>
		</option>
		<option <?php if ('low' == $selected) { ?>
			selected="selected"
			<?php } ?>
			value="low"><?php esc_html_e('Low priority', 'siteseo'); ?>
		</option>
	</select>

<?php
}

function siteseo_advanced_appearance_notifications_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_notifications']); ?>

	<label for="siteseo_advanced_appearance_notifications">
		<input id="siteseo_advanced_appearance_notifications"
			name="siteseo_advanced_option_name[appearance_notifications]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Hide Notifications Center in SEO Dashboard page', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_news_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_news']); ?>

	<label for="siteseo_advanced_appearance_news">
		<input id="siteseo_advanced_appearance_news"
			name="siteseo_advanced_option_name[appearance_news]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Hide SEO News in SEO Dashboard page', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_seo_tools_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_seo_tools']); ?>

	<label for="siteseo_advanced_appearance_seo_tools">
		<input id="siteseo_advanced_appearance_seo_tools"
			name="siteseo_advanced_option_name[appearance_seo_tools]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Hide Site Overview in SEO Dashboard page', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_title_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_title_col']); ?>

	<label for="siteseo_advanced_appearance_title_col">
		<input id="siteseo_advanced_appearance_title_col"
			name="siteseo_advanced_option_name[appearance_title_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add title column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_meta_desc_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_meta_desc_col']); ?>

	<label for="siteseo_advanced_appearance_meta_desc_col">
		<input id="siteseo_advanced_appearance_meta_desc_col"
			name="siteseo_advanced_option_name[appearance_meta_desc_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add meta description column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_redirect_enable_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_redirect_enable_col']); ?>

	<label for="siteseo_advanced_appearance_redirect_enable_col">
		<input id="siteseo_advanced_appearance_redirect_enable_col"
			name="siteseo_advanced_option_name[appearance_redirect_enable_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add redirection enable column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_redirect_url_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_redirect_url_col']); ?>

	<label for="siteseo_advanced_appearance_redirect_url_col">
		<input id="siteseo_advanced_appearance_redirect_url_col"
			name="siteseo_advanced_option_name[appearance_redirect_url_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add redirection URL column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_canonical_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_canonical']); ?>

	<label for="siteseo_advanced_appearance_canonical">
		<input id="siteseo_advanced_appearance_canonical"
			name="siteseo_advanced_option_name[appearance_canonical]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add canonical URL column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_target_kw_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_target_kw_col']); ?>

	<label for="siteseo_advanced_appearance_target_kw_col">
		<input id="siteseo_advanced_appearance_target_kw_col"
			name="siteseo_advanced_option_name[appearance_target_kw_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Add target keyword column', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_noindex_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_noindex_col']); ?>

	<label for="siteseo_advanced_appearance_noindex_col">
		<input id="siteseo_advanced_appearance_noindex_col"
			name="siteseo_advanced_option_name[appearance_noindex_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Display noindex status', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_nofollow_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_nofollow_col']); ?>

	<label for="siteseo_advanced_appearance_nofollow_col">
		<input id="siteseo_advanced_appearance_nofollow_col"
			name="siteseo_advanced_option_name[appearance_nofollow_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Display nofollow status', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_words_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_words_col']); ?>

	<label for="siteseo_advanced_appearance_words_col">
		<input id="siteseo_advanced_appearance_words_col"
			name="siteseo_advanced_option_name[appearance_words_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Display total number of words in content', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_score_col_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_score_col']); ?>

	<label for="siteseo_advanced_appearance_score_col">
		<input id="siteseo_advanced_appearance_score_col"
			name="siteseo_advanced_option_name[appearance_score_col]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Display Content Analysis results column ("Good" or "Should be improved")', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_ca_metaboxe_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_ca_metaboxe']); ?>

	<label for="siteseo_advanced_appearance_ca_metaboxe">
		<input id="siteseo_advanced_appearance_ca_metaboxe"
			name="siteseo_advanced_option_name[appearance_ca_metaboxe]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove Content Analysis Metabox', 'siteseo'); ?>
	</label>

	<p class="description">
		<?php esc_html_e('By checking this option, we will no longer track the significant keywords.','siteseo'); ?>
	</p>

<?php
}

function siteseo_advanced_appearance_genesis_seo_metaboxe_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_genesis_seo_metaboxe']); ?>

	<label for="siteseo_advanced_appearance_genesis_seo_metaboxe">
		<input id="siteseo_advanced_appearance_genesis_seo_metaboxe"
			name="siteseo_advanced_option_name[appearance_genesis_seo_metaboxe]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove Genesis SEO Metabox', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_genesis_seo_menu_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_genesis_seo_menu']); ?>

	<label for="siteseo_advanced_appearance_genesis_seo_menu">
		<input id="siteseo_advanced_appearance_genesis_seo_menu"
			name="siteseo_advanced_option_name[appearance_genesis_seo_menu]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove Genesis SEO link in WP Admin Menu', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_appearance_advice_schema_callback() {
	$options = get_option('siteseo_advanced_option_name');

	$check = isset($options['appearance_advice_schema']); ?>

	<label for="siteseo_advanced_appearance_advice_schema">
		<input id="siteseo_advanced_appearance_advice_schema"
			name="siteseo_advanced_option_name[appearance_advice_schema]" type="checkbox" <?php checked($check, '1') ?>
		value="1"/>

		<?php esc_html_e('Remove the advice if None schema selected', 'siteseo'); ?>
	</label>

<?php
}

function siteseo_advanced_security_metaboxe_role_callback() {
	$docs  = siteseo_get_docs_links();

	$options = get_option('siteseo_advanced_option_name');

	global $wp_roles;

	if ( ! isset($wp_roles)) {
		$wp_roles = new WP_Roles();
	} ?>


	<?php foreach ($wp_roles->get_names() as $key => $value) {
		$check = isset($options['security_metaboxe_role'][$key]); ?>

	<p>

		<label
			for="siteseo_advanced_security_metaboxe_role_<?php echo esc_attr($key); ?>">
			<input
			id="siteseo_advanced_security_metaboxe_role_<?php echo esc_attr($key); ?>"
			name="siteseo_advanced_option_name[security_metaboxe_role][<?php echo esc_attr($key); ?>]"
			type="checkbox" <?php checked($check, '1') ?>
				value="1"/>
			<strong><?php echo esc_html($value); ?></strong> (<em><?php echo esc_html(translate_user_role($value,  'default')); ?>)</em>
		</label>

	</p>

	<?php
	}
	?>

	<?php echo wp_kses_post(siteseo_tooltip_link($docs['security']['metaboxe_seo'], esc_html__('Hook to filter structured data types metabox call by post type - new window', 'siteseo'))); ?>

<?php
}

function siteseo_advanced_security_metaboxe_ca_role_callback() {
	$docs	= siteseo_get_docs_links();
	$options = get_option('siteseo_advanced_option_name');

	global $wp_roles;

	if ( ! isset($wp_roles)) {
		$wp_roles = new WP_Roles();
	} ?>

	<?php foreach ($wp_roles->get_names() as $key => $value) {
		$check = isset($options['security_metaboxe_ca_role'][$key]); ?>

	<p>
		<label
			for="siteseo_advanced_security_metaboxe_ca_role_<?php echo esc_attr($key); ?>">
			<input
				id="siteseo_advanced_security_metaboxe_ca_role_<?php echo esc_attr($key); ?>"
				name="siteseo_advanced_option_name[security_metaboxe_ca_role][<?php echo esc_attr($key); ?>]"
				type="checkbox" <?php checked($check, '1') ?>
			value="1"/>

			<strong><?php echo esc_html($value); ?></strong> (<em><?php echo esc_html(translate_user_role($value,  'default')); ?>)</em>
		</label>
	</p>

	<?php
	} 
	?>

	<?php echo wp_kses_post(siteseo_tooltip_link($docs['security']['metaboxe_ca'], esc_html__('Hook to filter structured data types metabox call by post type - new window', 'siteseo'))); ?>

<?php
}

function siteseo_print_section_info_advanced_image()
{
	?>
<div class="siteseo-section-header">
	<h2>
		<?php esc_html_e('Image SEO', 'siteseo'); ?>
	</h2>
</div>
<p><?php esc_html_e('Images can generate a lot of traffic to your site. Make sure to always add alternative texts, optimize their file size, filename etc.', 'siteseo'); ?>
</p>

<?php
}

function siteseo_print_section_info_advanced_advanced()
{
	?>
<div class="siteseo-section-header">
	<h2>
		<?php esc_html_e('Advanced', 'siteseo'); ?>
	</h2>
</div>
<p>
	<?php esc_html_e('Advanced SEO options for advanced users.', 'siteseo'); ?>
</p>

<?php
}

function siteseo_print_section_info_advanced_appearance(){
	?>
	<div class="siteseo-sub-tabs">
		<a class="siteseo-active-sub-tabs" href="#siteseo-advanced-metaboxes"><?php esc_html_e('Metaboxes', 'siteseo'); ?></a>
		<a href="#siteseo-advanced-adminbar"><?php esc_html_e('Admin bar', 'siteseo'); ?></a>
		<a href="#siteseo-advanced-seo-dashboard"><?php esc_html_e('SEO Dashboard', 'siteseo'); ?></a>
		<a href="#siteseo-advanced-columns"><?php esc_html_e('Columns', 'siteseo'); ?></a>
		<a href="#siteseo-advanced-misc"><?php esc_html_e('Misc', 'siteseo'); ?></a>
	</div>
	<div class="siteseo-section-body">
		<div class="siteseo-section-header">
			<h2>
				<?php esc_html_e('Appearance', 'siteseo'); ?>
			</h2>
		</div>
		<p>
			<?php esc_html_e('Customize the plugin to fit your needs.', 'siteseo'); ?>
		</p>
<?php
}

function siteseo_print_section_info_advanced_security(){
	?>
	<div class="siteseo-sub-tabs">
		<a class="siteseo-active-sub-tabs" href="#siteseo-security-metaboxes"><?php esc_html_e('SiteSEO metaboxes', 'siteseo'); ?></a>
		<a href="#siteseo-security-settings"><?php esc_html_e('SiteSEO settings pages', 'siteseo'); ?></a>
	</div>
	<div class="siteseo-section-body">
		<div class="siteseo-section-header">
			<h2>
				<?php esc_html_e('Security', 'siteseo'); ?>
			</h2>
			<p>
				<?php esc_html_e('Control access to SEO settings and metaboxes by user roles.', 'siteseo'); ?>
			</p>
		</div>
		<div id="siteseo-security-metaboxes" class="siteseo-content siteseo-active-tab-content">
			<hr>
			<h3>
				<?php esc_html_e('SiteSEO metaboxes', 'siteseo'); ?>
			</h3>

			<p>
				<?php esc_html_e('Check a user role to prevent it to edit a specific metabox.', 'siteseo'); ?>
			</p>

<?php
}

function siteseo_print_section_info_advanced_security_roles(){
	?>

<hr>

<h3 id="siteseo-security-settings">
	<?php esc_html_e('SiteSEO settings pages', 'siteseo'); ?>
</h3>

<p>
	<?php esc_html_e('Check a user role to allow it to edit a specific settings page.', 'siteseo'); ?>
</p>

<?php
}

function siteseo_print_section_info_advanced_appearance_col(){ 
?>
<hr>

<h3 id="siteseo-advanced-columns">
	<?php esc_html_e('Columns', 'siteseo'); ?>
</h3>

<p><?php esc_html_e('Customize the SEO columns.','siteseo'); ?></p>

<?php
}

function siteseo_print_section_info_advanced_appearance_metabox(){
?>
<hr>

<h3 id="siteseo-advanced-metaboxes">
	<?php esc_html_e('Metaboxes', 'siteseo'); ?>
</h3>

<p><?php esc_html_e('Edit your SEO metadata directly from your favorite page builder.','siteseo'); ?></p>

	<?php if ((function_exists('siteseo_get_toggle_white_label_option') && '1' !== siteseo_get_toggle_white_label_option())) {
		echo wp_oembed_get('https://www.youtube.com/@SiteSEOPlugin'); //phpcs:ignore
	}
}

function siteseo_print_section_info_advanced_appearance_dashboard(){
?>
<hr>

<h3 id="siteseo-advanced-seo-dashboard">
	<?php esc_html_e('SEO Dashboard', 'siteseo'); ?>
</h3>

<p><?php esc_html_e('Customize the SEO dashboard UI.','siteseo'); ?></p>

<?php
}

function siteseo_print_section_info_advanced_appearance_admin_bar(){ ?>
<hr>

<h3 id="siteseo-advanced-adminbar">
	<?php esc_html_e('Admin bar', 'siteseo'); ?>
</h3>

<p><?php esc_html_e('The admin bar appears on the top of your pages when logged in to your WP admin.','siteseo'); ?></p>

<?php
}

function siteseo_print_section_info_advanced_appearance_misc()
{ ?>
<hr>

<h3 id="siteseo-advanced-misc">
	<?php esc_html_e('Misc', 'siteseo'); ?>
</h3>

<?php
}

function siteseo_print_section_info_breadcrumbs() {
    //siteseo_print_pro_section('breadcrumbs'); 
	echo '<p>' . __('Configure your breadcrumbs, using schema.org markup, allowing it to appear in Google\'s search results.', 'siteseo') . ' <a class="siteseo-help" href="https://developers.google.com/search/docs/data-types/breadcrumb" target="_blank" title="' . __('Google developers website (new window)', 'siteseo') . '">' . __('Learn more on Google developers website', 'siteseo') . '</a><span class="siteseo-help dashicons dashicons-external"></span></p>';
	?>

    <div class="siteseo-notice">
        <h3><?php _e('How to install the Breadcrumbs?', 'siteseo'); ?></h3>

        <h4><?php _e('Block Editor / FSE', 'siteseo'); ?></h4>
        <p><?php _e('Add the Breadcrumbs block using the <strong>Block Editor</strong> or the <strong>Full Site Editing</strong> feature.', 'siteseo'); ?></p>

        <hr>
        <h4><?php _e('Shortcode', 'siteseo'); ?></h4>
        <p><?php _e('You can also use this shortcode in your content (post, page, post type...):', 'siteseo'); ?></p>

        <pre>[siteseo_breadcrumbs]</pre>

        <hr>
        <h4><?php _e('PHP template', 'siteseo'); ?></h4>
        <p><?php _e('Copy and paste this function into your theme (eg: header.php) to enable your breadcrumbs:', 'siteseo'); ?></p>

        <pre>&lt;?php if(function_exists('siteseo_display_breadcrumbs')) { siteseo_display_breadcrumbs(); } ?&gt;</pre>

        <p><?php _e('This function accepts 1 parameter: <strong>true / false</strong> for <strong>echo / return</strong>. Default: <strong>true</strong>.', 'siteseo'); ?></p>

        <!--<p><?php //_e('<a class="siteseo-help" href="https://www.youtube.com/@SiteSEOPlugin" target="_blank">Watch this video guide to easily integrate your breadcrumbs with your WordPress theme</a><span class="siteseo-help dashicons dashicons-external"></span>', 'siteseo'); ?></p>-->
    </div>

    <?php
    //Elementor
    if (did_action('elementor/loaded')) {
        ?>

        <div class="siteseo-notice">
            <h3><?php _e('Elementor user?', 'siteseo'); ?></h3>
            <p><?php _e('We also provide a widget for <strong>Elementor users</strong> (Elementor Builder > Elements tab > Site section > Breadcrumbs widget). <a class="siteseo-help" href="https://www.youtube.com/@SiteSEOPlugin" target="_blank">Click to watch the video tutorial</a><span class="siteseo-help dashicons dashicons-external"></span>', 'siteseo'); ?></p>
        </div>

        <?php
    } ?>


    <?php
}

function siteseo_print_section_info_breadcrumbs_i18n() {
    $docs = siteseo_get_docs_links();
    ?>
    <hr>

    <h3><?php _e('Translations', 'siteseo'); ?></h3>

    <p class="description">
        <a href="<?php echo $docs['breadcrumbs']['i18n']; ?>"
            class="siteseo-help" target="_blank">
            <?php _e('Learn how to translate these options with multilingual plugins', 'siteseo'); ?>
        </a>
        <span class="siteseo-help dashicons dashicons-external"></span>
    </p>
<?php
}

function siteseo_print_section_info_breadcrumbs_misc() {
    ?>
    <hr>

    <h3><?php _e('Misc', 'siteseo'); ?></h3>
<?php
}

function siteseo_breadcrumbs_enable_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_enable']); ?>

<label for="siteseo_breadcrumbs_enable">
    <input id="siteseo_breadcrumbs_enable" name="siteseo_advanced_option_name[breadcrumbs_enable]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php _e('Enable HTML Breadcrumbs', 'siteseo'); ?>
</label>

<?php
}

function siteseo_breadcrumbs_enable_json_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_json_enable']); ?>

<label for="siteseo_breadcrumbs_json_enable">
    <input id="siteseo_breadcrumbs_json_enable" name="siteseo_advanced_option_name[breadcrumbs_json_enable]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php _e('Enable JSON-LD Breadcrumbs', 'siteseo'); ?>
</label>

<p class="description">
    <?php _e('To avoid duplicated schemas, don\'t enable this option if HTML Breadcrumbs is ON.', 'siteseo'); ?>
</p>
<p class="description">
    <?php _e('We automatically add the JSON-LD to the head of your document using the wp_head hook.', 'siteseo'); ?>
</p>
<p class="description">
    <?php _e('You don\'t need to manually call the breadcrumbs function.', 'siteseo'); ?>
</p>

<?php
}

function siteseo_breadcrumbs_separator_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_separator']) ? $options['breadcrumbs_separator'] : null;
    $docs = function_exists('siteseo_get_docs_links') ? siteseo_get_docs_links() : '';

    printf(
        '<input type="text" class="siteseo_breadcrumbs_sep" name="siteseo_advanced_option_name[breadcrumbs_separator]" aria-label="' . __('Breadcrumbs Separator', 'siteseo') . '" placeholder="' . esc_html__('eg: \ ', 'siteseo') . '" value="%s" />',
        esc_html($check)
    ); ?>

<div class="wrap-tags">
    <button type="button" class="btn btnSecondary tag-title" id="siteseo-tag-breadcrumbs-1" data-tag="-"><?php _e('-', 'siteseo'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="siteseo-tag-breadcrumbs-2" data-tag="–"
        class="tag-title"><?php _e('–', 'siteseo'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="siteseo-tag-breadcrumbs-3" data-tag=">"
        class="tag-title"><?php _e('>', 'siteseo'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="siteseo-tag-breadcrumbs-4" data-tag="<"
        class="tag-title"><?php _e('<', 'siteseo'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="siteseo-tag-breadcrumbs-5" data-tag="|"
        class="tag-title"><?php _e('|', 'siteseo'); ?></button>
</div>

<?php echo wp_kses_post(siteseo_tooltip_link($docs['breadcrumbs']['sep'], __('Customize breadcrumbs separator with a hook', 'siteseo'))); ?>
<?php
}

function siteseo_breadcrumbs_cpt_callback() {
    $none = ['name' => 'none', 'label' => 'None'];
    $none = json_decode(json_encode($none));
    $none_a['none'] = $none;

    $serviceWpData = siteseo_get_service('WordPressData');

    if ( ! $serviceWpData || ! method_exists($serviceWpData, 'getTaxonomies')) {
        $tax = [];
    } else {
        $tax = $serviceWpData->getTaxonomies();
    }

    if ( ! empty($tax)) {
        foreach ($tax as $taxonomy) { ?>
<h3><?php echo esc_html($taxonomy->label); ?> <em><small>[<?php echo esc_html($taxonomy->name); ?>]</small></em></h3>

<select id="siteseo_breadcrumbs_cpt"
    name="siteseo_advanced_option_name[breadcrumbs_cpt][<?php echo esc_attr($taxonomy->name); ?>][cpt]">

    <?php

            if ( ! $serviceWpData) {
                $cpt = [];
            } else {
                $cpt = $serviceWpData->getPostTypes();
            }
            unset($cpt['page']);
            $cpt = array_merge($none_a, $cpt);

            if ( ! empty($cpt)) {
                foreach ($cpt as $post_type) {
                    $options = get_option('siteseo_advanced_option_name');

                    $selected = isset($options['breadcrumbs_cpt'][$taxonomy->name]['cpt']) ? $options['breadcrumbs_cpt'][$taxonomy->name]['cpt'] : null; ?>

    <option <?php if (esc_attr($post_type->name) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php echo esc_attr($post_type->name); ?>"><?php echo esc_html($post_type->label); ?>
    </option>

		<?php 
                }
            }?>
</select>
<?php }
    }
}

function siteseo_breadcrumbs_tax_callback() {
    $none = ['name' => 'none', 'label' => 'None'];
    $none = json_decode(json_encode($none));
    $none_a['none'] = $none;

    $serviceWpData = siteseo_get_service('WordPressData');
    $cpt = [];
    if ($serviceWpData) {
        $cpt = $serviceWpData->getPostTypes();
    }

    if ( ! empty($cpt)) {
        foreach ($cpt as $post_type) { ?>
<h3><?php echo esc_html($post_type->label); ?> <em><small>[<?php echo esc_html($post_type->name); ?>]</small></em></h3>

<select id="siteseo_breadcrumbs_tax"
    name="siteseo_advanced_option_name[breadcrumbs_tax][<?php echo $post_type->name; ?>][tax]">

    <?php

        $serviceWpData = siteseo_get_service('WordPressData');
        $tax = [];
        if ($serviceWpData && method_exists($serviceWpData, 'getTaxonomies')) {
            $tax = $serviceWpData->getTaxonomies();
        }

        $tax = array_merge($none_a, $tax);

        if ( ! empty($tax)) {
            foreach ($tax as $taxonomy) {
                $options = get_option('siteseo_advanced_option_name');

                $selected = isset($options['breadcrumbs_tax'][$post_type->name]['tax']) ? $options['breadcrumbs_tax'][$post_type->name]['tax'] : null; ?>

    <option <?php if (esc_attr($taxonomy->name) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php echo esc_attr($taxonomy->name); ?>"><?php echo esc_html($taxonomy->label); ?>
    </option>

    <?php
            }
        }?>
</select>
<?php }
    }
}

function siteseo_breadcrumbs_remove_blog_page_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_remove_blog_page']); ?>

<label for="siteseo_breadcrumbs_remove_blog_page">
    <input id="siteseo_breadcrumbs_remove_blog_page"
        name="siteseo_advanced_option_name[breadcrumbs_remove_blog_page]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php _e('Remove static Posts page defined in WordPress Reading settings', 'siteseo'); ?>
</label>

<?php
}

function siteseo_breadcrumbs_remove_shop_page_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_remove_shop_page']); ?>

<label for="siteseo_breadcrumbs_remove_shop_page">
    <input id="siteseo_breadcrumbs_remove_shop_page"
        name="siteseo_advanced_option_name[breadcrumbs_remove_shop_page]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php _e('Remove the static Shop page defined in the WooCommerce settings', 'siteseo'); ?>
</label>

<?php
}

function siteseo_breadcrumbs_i18n_here_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_here']) ? $options['breadcrumbs_i18n_here'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_here]" aria-label="' . __('eg: You are here: ', 'siteseo') . '" placeholder="' . esc_html__('eg: You are here: ', 'siteseo') . '" value="%s" />',
        esc_html($check)
    ); ?>

<p class="description">
    <?php _e('HTML tags allowed, eg: <code>span</code>, <code>p</code>...', 'siteseo'); ?>
</p>

<?php
}

function siteseo_breadcrumbs_i18n_home_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_home']) ? $options['breadcrumbs_i18n_home'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_home]" aria-label="' . __('Home', 'siteseo') . '" placeholder="' . esc_html__('default: Home', 'siteseo') . '" value="%s" />',
        esc_html($check)
    ); ?>
<p class="description">
    <?php _e('HTML tags allowed, eg: <code>span</code>, <code>p</code>...', 'siteseo'); ?>
</p>
<?php
}

function siteseo_breadcrumbs_i18n_author_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_author']) ? $options['breadcrumbs_i18n_author'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_author]" aria-label="' . __('Author:', 'siteseo') . '" placeholder="' . esc_html__('default: Author:', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_i18n_404_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_404']) ? $options['breadcrumbs_i18n_404'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_404]" aria-label="' . __('404 error', 'siteseo') . '" placeholder="' . esc_html__('default: 404 error', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_i18n_search_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_search']) ? $options['breadcrumbs_i18n_search'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_search]" aria-label="' . __('Search results for: ', 'siteseo') . '" placeholder="' . esc_html__('default: Search results for: ', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_i18n_no_results_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_no_results']) ? $options['breadcrumbs_i18n_no_results'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_no_results]" aria-label="' . __('No results', 'siteseo') . '" placeholder="' . esc_html__('default: No results', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_i18n_attachments_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $check = isset($options['breadcrumbs_i18n_attachments']) ? $options['breadcrumbs_i18n_attachments'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_attachments]" aria-label="' . __('Attachments', 'siteseo') . '" placeholder="' . esc_html__('default: Attachments', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_i18n_paged_callback() {
    $options = get_option('siteseo_advanced_option_name');
    $docs = function_exists('siteseo_get_docs_links') ? siteseo_get_docs_links() : '';
    $check = isset($options['breadcrumbs_i18n_paged']) ? $options['breadcrumbs_i18n_paged'] : null;

    printf(
        '<input type="text" name="siteseo_advanced_option_name[breadcrumbs_i18n_paged]" aria-label="' . __('Page ', 'siteseo') . '" placeholder="' . esc_html__('default: Page ', 'siteseo') . '" value="%s" />',
        esc_html($check)
    );
}

function siteseo_breadcrumbs_separator_disable_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_separator_disable']); ?>

<label for="siteseo_breadcrumbs_separator_disable">
    <input id="siteseo_breadcrumbs_separator_disable"
        name="siteseo_advanced_option_name[breadcrumbs_separator_disable]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php _e('My theme is already displaying a separator in my breadcrumbs', 'siteseo'); ?>
</label>

<?php
}

function siteseo_breadcrumbs_storefront_callback() {
    $options = get_option('siteseo_advanced_option_name');

    $check = isset($options['breadcrumbs_storefront']); ?>

<label for="siteseo_breadcrumbs_storefront">
    <input id="siteseo_breadcrumbs_storefront" name="siteseo_advanced_option_name[breadcrumbs_storefront]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php _e('Try to automatically override Storefront‘s default breadcrumbs', 'siteseo'); ?>
</label>

<?php
}


//Image SECTION============================================================================
add_settings_section(
	'siteseo_setting_section_advanced_image', // ID
	'',
	//__("Image SEO","siteseo"), // Title
	'siteseo_print_section_info_advanced_image', // Callback
	'siteseo-settings-admin-advanced-image' // Page
);

add_settings_field(
	'siteseo_advanced_advanced_attachments', // ID
	__('Redirect attachment pages to post parent', 'siteseo'), // Title
	'siteseo_advanced_advanced_attachments_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_attachments_file', // ID
	__('Redirect attachment pages to their file URL', 'siteseo'), // Title
	'siteseo_advanced_advanced_attachments_file_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_clean_filename', // ID
	__('Cleaning media filename', 'siteseo'), // Title
	'siteseo_advanced_advanced_clean_filename_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_image_auto_title_editor', // ID
	__('Automatically set the image Title', 'siteseo'), // Title
	'siteseo_advanced_advanced_image_auto_title_editor_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_image_auto_alt_editor', // ID
	__('Automatically set the image Alt text', 'siteseo'), // Title
	'siteseo_advanced_advanced_image_auto_alt_editor_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_image_auto_alt_target_kw', // ID
	__('Automatically set the image Alt text from target keywords', 'siteseo'), // Title
	'siteseo_advanced_advanced_image_auto_alt_target_kw_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_image_auto_caption_editor', // ID
	__('Automatically set the image Caption', 'siteseo'), // Title
	'siteseo_advanced_advanced_image_auto_caption_editor_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_image_auto_desc_editor', // ID
	__('Automatically set the image Description', 'siteseo'), // Title
	'siteseo_advanced_advanced_image_auto_desc_editor_callback', // Callback
	'siteseo-settings-admin-advanced-image', // Page
	'siteseo_setting_section_advanced_image' // Section
);

//Advanced SECTION=========================================================================
add_settings_section(
	'siteseo_setting_section_advanced_advanced', // ID
	'',
	//__("Advanced","siteseo"), // Title
	'siteseo_print_section_info_advanced_advanced', // Callback
	'siteseo-settings-admin-advanced-advanced' // Page
);

add_settings_field(
	'siteseo_advanced_advanced_tax_desc_editor', // ID
	__('Add WP Editor to taxonomy description textarea', 'siteseo'), // Title
	'siteseo_advanced_advanced_tax_desc_editor_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_category_url', // ID
	__('Remove /category/ in URL', 'siteseo'), // Title
	'siteseo_advanced_advanced_category_url_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_product_cat_url', // ID
	__('Remove /product-category/ in URL', 'siteseo'), // Title
	'siteseo_advanced_advanced_product_cat_url_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_replytocom', // ID
	__('Remove ?replytocom link to avoid duplicate content', 'siteseo'), // Title
	'siteseo_advanced_advanced_replytocom_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_noreferrer', // ID
	__('Remove noreferrer link attribute in post content', 'siteseo'), // Title
	'siteseo_advanced_advanced_noreferrer_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_wp_generator', // ID
	__('Remove WordPress generator meta tag', 'siteseo'), // Title
	'siteseo_advanced_advanced_wp_generator_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_hentry', // ID
	__('Remove hentry post class', 'siteseo'), // Title
	'siteseo_advanced_advanced_hentry_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_comments_author_url', // ID
	__('Remove author URL', 'siteseo'), // Title
	'siteseo_advanced_advanced_comments_author_url_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_comments_website', // ID
	__('Remove website field in comment form', 'siteseo'), // Title
	'siteseo_advanced_advanced_comments_website_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_comments_form_link', // ID
	__('Add "nofollow noopener noreferrer" rel attributes to the comments form link', 'siteseo'), // Title
	'siteseo_advanced_advanced_comments_form_link_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_wp_shortlink', // ID
	__('Remove WordPress shortlink meta tag', 'siteseo'), // Title
	'siteseo_advanced_advanced_wp_shortlink_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_wp_wlw', // ID
	__('Remove Windows Live Writer meta tag', 'siteseo'), // Title
	'siteseo_advanced_advanced_wp_wlw_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_wp_rsd', // ID
	__('Remove RSD meta tag', 'siteseo'), // Title
	'siteseo_advanced_advanced_wp_rsd_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_google', // ID
	__('Google site verification', 'siteseo'), // Title
	'siteseo_advanced_advanced_google_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_bing', // ID
	__('Bing site verification', 'siteseo'), // Title
	'siteseo_advanced_advanced_bing_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_pinterest', // ID
	__('Pinterest site verification', 'siteseo'), // Title
	'siteseo_advanced_advanced_pinterest_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

add_settings_field(
	'siteseo_advanced_advanced_yandex', // ID
	__('Yandex site verification', 'siteseo'), // Title
	'siteseo_advanced_advanced_yandex_callback', // Callback
	'siteseo-settings-admin-advanced-advanced', // Page
	'siteseo_setting_section_advanced_advanced' // Section
);

//Appearance SECTION=======================================================================
add_settings_section(
	'siteseo_setting_section_advanced_appearance', // ID
	'',
	//__("Appearance","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance', // Callback
	'siteseo-settings-admin-advanced-appearance' // Page
);

//Metaboxes
add_settings_section(
	'siteseo_setting_section_advanced_appearance_metabox', // ID
	'',
	//__("Metaboxes","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance_metabox', // Callback
	'siteseo-settings-admin-advanced-appearance' // Page
);

add_settings_field(
	'siteseo_advanced_appearance_universal_metabox', // ID
	__('Universal Metabox (Gutenberg)', 'siteseo'), // Title
	'siteseo_advanced_appearance_universal_metabox_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);
add_settings_field(
	'siteseo_advanced_appearance_universal_metabox_disable', // ID
	__('Disable Universal Metabox', 'siteseo'), // Title
	'siteseo_advanced_appearance_universal_metabox_disable_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_metabox_position', // ID
	__("Move SEO metabox's position", 'siteseo'), // Title
	'siteseo_advanced_appearance_metaboxe_position_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_ca_metaboxe', // ID
	__('Remove Content Analysis Metabox', 'siteseo'), // Title
	'siteseo_advanced_appearance_ca_metaboxe_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_genesis_seo_metaboxe', // ID
	__('Hide Genesis SEO Metabox', 'siteseo'), // Title
	'siteseo_advanced_appearance_genesis_seo_metaboxe_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_advice_schema', // ID
	__('Hide advice in Structured Data Types metabox', 'siteseo'), // Title
	'siteseo_advanced_appearance_advice_schema_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_metabox' // Section
);

//SEO Admin bar
add_settings_section(
	'siteseo_setting_section_advanced_appearance_admin_bar', // ID
	'',
	//__("Admin bar","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance_admin_bar', // Callback
	'siteseo-settings-admin-advanced-appearance' // Page
);

add_settings_field(
	'siteseo_advanced_appearance_adminbar', // ID
	__('SEO in admin bar', 'siteseo'), // Title
	'siteseo_advanced_appearance_adminbar_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_admin_bar' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_adminbar_noindex', // ID
	__('Noindex in admin bar', 'siteseo'), // Title
	'siteseo_advanced_appearance_adminbar_noindex_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_admin_bar' // Section
);

//SEO Dashboard
add_settings_section(
	'siteseo_setting_section_advanced_appearance_dashboard', // ID
	'',
	//__("Dashboard","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance_dashboard', // Callback
	'siteseo-settings-admin-advanced-appearance' // Page
);

add_settings_field(
	'siteseo_advanced_appearance_notifications', // ID
	__('Hide Notifications Center', 'siteseo'), // Title
	'siteseo_advanced_appearance_notifications_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_dashboard' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_news', // ID
	__('Hide SEO News', 'siteseo'), // Title
	'siteseo_advanced_appearance_news_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_dashboard' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_seo_tools', // ID
	__('Hide Site Overview', 'siteseo'), // Title
	'siteseo_advanced_appearance_seo_tools_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_dashboard' // Section
);

//Columns
add_settings_section(
	'siteseo_setting_section_advanced_appearance_col', // ID
	'',
	//__("Columns","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance_col', // Callback
	'siteseo-settings-admin-advanced-appearance' // Page
);

add_settings_field(
	'siteseo_advanced_appearance_title_col', // ID
	__('Show Title tag column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_title_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_meta_desc_col', // ID
	__('Show Meta description column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_meta_desc_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_redirect_enable_col', // ID
	__('Show Redirection Enable column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_redirect_enable_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_redirect_url_col', // ID
	__('Show Redirect URL column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_redirect_url_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_canonical', // ID
	__('Show canonical URL column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_canonical_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_target_kw_col', // ID
	__('Show Target Keyword column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_target_kw_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_noindex_col', // ID
	__('Show noindex column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_noindex_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_nofollow_col', // ID
	__('Show nofollow column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_nofollow_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_words_col', // ID
	__('Show total number of words column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_words_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
	'siteseo_advanced_appearance_score_col', // ID
	__('Show content analysis score column in post types', 'siteseo'), // Title
	'siteseo_advanced_appearance_score_col_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_col' // Section
);

//Misc
add_settings_section(
	'siteseo_setting_section_advanced_appearance_misc', // ID
	'',
	//__("Misc","siteseo"), // Title
	'siteseo_print_section_info_advanced_appearance_misc', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	array(
		'after_section' => '</div>' // closure of div created inside function 
	)
);

add_settings_field(
	'siteseo_advanced_appearance_genesis_seo_menu', // ID
	__('Hide Genesis SEO Settings link', 'siteseo'), // Title
	'siteseo_advanced_appearance_genesis_seo_menu_callback', // Callback
	'siteseo-settings-admin-advanced-appearance', // Page
	'siteseo_setting_section_advanced_appearance_misc' // Section
);

// Security SECTION =======================================================================
add_settings_section(
	'siteseo_setting_section_advanced_security', // ID
	'',
	//__("Security","siteseo"), // Title
	'siteseo_print_section_info_advanced_security', // Callback
	'siteseo-settings-admin-advanced-security' // Page
);

add_settings_field(
	'siteseo_advanced_security_metaboxe_role', // ID
	__('Block SEO metabox to user roles', 'siteseo'), // Title
	'siteseo_advanced_security_metaboxe_role_callback', // Callback
	'siteseo-settings-admin-advanced-security', // Page
	'siteseo_setting_section_advanced_security' // Section
);

add_settings_section(
	'siteseo_setting_section_advanced_security_roles', // ID
	'',
	//__("Security","siteseo"), // Title
	'siteseo_print_section_info_advanced_security_roles', // Callback
	'siteseo-settings-admin-advanced-security', // Page
	array(
		'after_section' => '</div>' // closure of div created inside function 
	)
);

add_settings_field(
	'siteseo_advanced_security_metaboxe_ca_role', // ID
	__('Block Content analysis metabox to user roles', 'siteseo'), // Title
	'siteseo_advanced_security_metaboxe_ca_role_callback', // Callback
	'siteseo-settings-admin-advanced-security', // Page
	'siteseo_setting_section_advanced_security' // Section
);

// Breadcrumbs SECTION =======================================================================
add_settings_section(
    'siteseo_setting_section_breadcrumbs', // ID
    '',
    //__("Breadcrumbs","siteseo"), // Title
    'siteseo_print_section_info_breadcrumbs', // Callback
    'siteseo-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'siteseo_breadcrumbs_enable', // ID
    __('Enable Breadcrumbs', 'siteseo'), // Title
    'siteseo_breadcrumbs_enable_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_enable_json', // ID
    __('Enable JSON-LD Breadcrumbs', 'siteseo'), // Title
    'siteseo_breadcrumbs_enable_json_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_separator', // ID
    __('Breadcrumbs Separator', 'siteseo'), // Title
    'siteseo_breadcrumbs_separator_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_cpt', // ID
    __('Post type to show in Breadcrumbs for taxonomies (archive)', 'siteseo'), // Title
    'siteseo_breadcrumbs_cpt_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_tax', // ID
    __('Taxonomy to show in Breadcrumbs for post types (singular)', 'siteseo'), // Title
    'siteseo_breadcrumbs_tax_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_remove_blog_page', // ID
    __('Remove Posts page', 'siteseo'), // Title
    'siteseo_breadcrumbs_remove_blog_page_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_remove_shop_page', // ID
    __('Remove Shop page', 'siteseo'), // Title
    'siteseo_breadcrumbs_remove_shop_page_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs' // Section
);

add_settings_section(
    'siteseo_setting_section_breadcrumbs_i18n', // ID
    '',
    //__("i18n","siteseo"), // Title
    'siteseo_print_section_info_breadcrumbs_i18n', // Callback
    'siteseo-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_here', // ID
    __('Display a text before the breadcrumbs', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_here_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_home', // ID
    __('Translation for homepage', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_home_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_author', // ID
    __('Translation for "Author:"', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_author_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_404', // ID
    __('Translation for "Error 404"', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_404_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_search', // ID
    __('Translation for "Search results for"', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_search_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_i18n_no_results', // ID
    __('Translation for "No results"', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_no_results_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);
add_settings_field(
    'siteseo_breadcrumbs_i18n_attachments', // ID
    __('Translation for "Attachments"', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_attachments_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);
add_settings_field(
    'siteseo_breadcrumbs_i18n_paged', // ID
    __('Translation for "Page "', 'siteseo'), // Title
    'siteseo_breadcrumbs_i18n_paged_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_i18n' // Section
);

add_settings_section(
    'siteseo_setting_section_breadcrumbs_misc', // ID
    '',
    //__("Misc","siteseo"), // Title
    'siteseo_print_section_info_breadcrumbs_misc', // Callback
    'siteseo-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'siteseo_breadcrumbs_separator_disable', // ID
    __('Disable default breadcrumbs separator', 'siteseo'), // Title
    'siteseo_breadcrumbs_separator_disable_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_misc' // Section
);

add_settings_field(
    'siteseo_breadcrumbs_storefront', // ID
    __('Storefront compatibility', 'siteseo'), // Title
    'siteseo_breadcrumbs_storefront_callback', // Callback
    'siteseo-settings-admin-breadcrumbs', // Page
    'siteseo_setting_section_breadcrumbs_misc' // Section
);


siteseo_get_service('SectionPagesSiteSEO')->printSectionPages();

do_action('siteseo_settings_advanced_after');

$this->options = get_option('siteseo_advanced_option_name');
if (function_exists('siteseo_admin_header')) {
	siteseo_admin_header();
} ?>
<form method="post"
	action="<?php echo esc_url(admin_url('options.php')); ?>"
	class="siteseo-option">
	<?php
settings_fields('siteseo_advanced_option_group'); ?>

	<div id="siteseo-tabs" class="wrap">
	<?php

		echo wp_kses($this->siteseo_feature_title('advanced'), ['h1' => true, 'input' => ['type' => true, 'name' => true, 'id' => true, 'class' => true, 'data-*' => true], 'label' => ['for' => true], 'span' => ['id' => true, 'class' => true], 'div' => ['id' => true, 'class' => true]]);
		$current_tab = '';
		$plugin_settings_tabs	= [
			'tab_siteseo_advanced_image'		=> esc_html__('Image SEO', 'siteseo'),
			'tab_siteseo_advanced_advanced'		=> esc_html__('Advanced', 'siteseo'),
			'tab_siteseo_advanced_appearance'	=> esc_html__('Appearance', 'siteseo'),
			'tab_siteseo_advanced_security'		=> esc_html__('Security', 'siteseo'),
			'tab_siteseo_advanced_breadcrumbs'	=> esc_html__('Breadcrumbs', 'siteseo'),
		];
		?>
		<div class="nav-tab-wrapper">

			<?php foreach ($plugin_settings_tabs as $tab_key => $tab_caption) { ?>
			<a id="<?php echo esc_attr($tab_key); ?>-tab" class="nav-tab"
				href="?page=siteseo-advanced#tab=<?php echo esc_attr($tab_key); ?>"><?php echo esc_html($tab_caption); ?></a>
			<?php } ?>

		</div>
		<div class="siteseo-tab<?php if ('tab_siteseo_advanced_image' == $current_tab) {
	echo ' active';
} ?>" id="tab_siteseo_advanced_image"><?php do_settings_sections('siteseo-settings-admin-advanced-image'); ?>
		</div>
		<div class="siteseo-tab<?php if ('tab_siteseo_advanced_advanced' == $current_tab) {
	echo ' active';
} ?>" id="tab_siteseo_advanced_advanced"><?php do_settings_sections('siteseo-settings-admin-advanced-advanced'); ?>
		</div>
		<div class="siteseo-tab<?php if ('tab_siteseo_advanced_appearance' == $current_tab) {
	echo ' active';
} ?>" id="tab_siteseo_advanced_appearance"><?php do_settings_sections('siteseo-settings-admin-advanced-appearance'); ?>
		</div>
		<div class="siteseo-tab<?php if ('tab_siteseo_advanced_security' == $current_tab) {
	echo ' active';
} ?>" id="tab_siteseo_advanced_security"><?php do_settings_sections('siteseo-settings-admin-advanced-security'); ?>
		</div>
	</div>
	<div class="siteseo-tab <?php if ('tab_siteseo_advanced_breadcrumbs' == $current_tab) {
        echo 'active';
    } ?>" id="tab_siteseo_advanced_breadcrumbs"><?php do_settings_sections('siteseo-settings-admin-breadcrumbs'); ?>
        </div>

	<?php siteseo_submit_button(__('Save changes', 'siteseo')); ?>
</form>
<?php
