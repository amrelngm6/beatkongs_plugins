<div class="dokan-download-options dokan-edit-row dokan-clearfix show_if_downloadable">
    <div class="dokan-section-heading" data-togglehandler="dokan_download_options">
        <h2><i class="fas fa-download" aria-hidden="true"></i> Licenses</h2>
        <p>Configure your downloadable files settings foe each license</p>
        <a href="#" class="dokan-section-toggle">
            <i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <div class="dokan-divider-top dokan-clearfix">

            
            <div class="dokan-side-body dokan-download-wrapper">
                <table class="dokan-table">
                    <!-- <tfoot>
                        <tr>
                            <th colspan="3">
                                <a href="#" class="insert-file-row dokan-btn dokan-btn-sm dokan-btn-success" data-target="#downloads-tbody" data-row="&lt;tr&gt;
    &lt;td&gt;
        &lt;p&gt;
            &lt;input type=&quot;text&quot; class=&quot;dokan-form-control input_text&quot; placeholder=&quot;File Name&quot; name=&quot;_wc_file_names[]&quot; value=&quot;&quot; /&gt;
        &lt;/p&gt;
    &lt;/td&gt;
    &lt;td&gt;
        &lt;p&gt;
            &lt;input type=&quot;text&quot; class=&quot;dokan-form-control dokan-w8 input_text wc_file_url&quot; placeholder=&quot;https://&quot; name=&quot;_wc_file_urls[]&quot; value=&quot;&quot; style=&quot;margin-right: 8px;&quot; /&gt;
            &lt;input class=&quot;file_id&quot; type=&quot;hidden&quot; name=&quot;_wc_file_ids[]&quot; /&gt;
            &lt;a href=&quot;#&quot; class=&quot;downloads_media_manager dokan-btn dokan-btn-sm dokan-btn-default upload_file_button&quot; data-input=&quot;.file_id&quot; data-url=&quot;.wc_file_url&quot; &gt;Choose&nbsp;file&lt;/a&gt;
        &lt;/p&gt;
    &lt;/td&gt;

    &lt;td&gt;
        &lt;p&gt;
            &lt;input type=&quot;number&quot; class=&quot;dokan-form-control input_text&quot; placeholder=&quot;Price&quot; name=&quot;_wc_file_price[]&quot; value=&quot;&quot; /&gt;
        &lt;/p&gt;
    &lt;/td&gt;
&lt;/tr&gt;
">
                                    Add File                                </a>
                            </th>
                        </tr>
                    </tfoot> -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>License <span class="tips" title="This is the name of the download shown to the customer.">[?]</span></th>
                            <th>File URL <span class="tips" title="This is the URL or absolute path to the file which customers will get access to.">[?]</span></th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="downloads-tbody">
                        <?php 
                        $args = array(
                            'post_type' => 'usage-terms',
                            'author'    => 1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                        );
                        $default_licenses = new WP_Query( $args );
                        $beatId =  $_GET['beat_id'] ?? 0;
                        $postMeta = get_metadata( 'post', $beatId);
                        foreach ($default_licenses->posts as $key => $value) {
                            $checked = !empty($postMeta[$value->post_name.'_wc_file_url'][0]) ? 'checked' : '';
                            $disabled = empty($postMeta[$value->post_name.'_wc_file_url'][0]) ? 'disabled' : '';
                        ?>
                        <tr id="check-license-<?php echo $key;?>" >
                            <td><input style="margin-top: 25px;" type="checkbox" class="switch-license-downloads" data-target="#check-license-<?php echo $key;?>"  value="<?php echo $key;?>" /></td>
                            <td>
                                <p>
                                    <input <?php echo $checked;?>  type="text" class="dokan-form-control input_text" placeholder="File Name" name="_wc_file_names[<?php echo $value->ID; ?>]" disabled value="<?php echo $value->post_title ?? '';?>">
                                </p>
                            </td>
                            <td>
                                <p>
                                    <input type="hidden" name="<?php echo $value->post_name; ?>_wc_file_url" value="<?php echo $postMeta[$value->post_name.'_wc_file_url'][0] ?? ''; ?>" >
                                    <input type="hidden" class="file_id" id="file-id-<?php echo $key; ?>" name="<?php echo $value->post_name; ?>_wc_file_id" value="<?php echo $postMeta[$value->post_name.'_wc_file_id'][0] ?? ''; ?>">
                                    <input <?php echo $disabled;?> type="url" id="file-url-<?php echo $key; ?>" class="dokan-form-control dokan-w8 input_text wc_file_url valid" placeholder="https://" name="<?php echo $value->post_name; ?>_wc_file_url" value="<?php echo $postMeta[$value->post_name.'_wc_file_url'][0] ?? ''; ?>" style="margin-right: 8px;">
                                    <a href="#" class="downloads_media_manager dokan-btn dokan-btn-sm dokan-btn-default upload_file_button" data-input=".file_id" data-url=".wc_file_url">Choose&nbsp;file</a>
                                </p>
                            </td>

                            <td>
                                <p>
                                    <input <?php echo $disabled;?>  type="number" min="0" id="file-price-<?php echo $key; ?>" class="dokan-form-control input_text" placeholder="Price" name="<?php echo $value->post_name; ?>_wc_file_price" value="<?php echo $postMeta[$value->post_name.'_wc_file_price'][0] ?? ''; ?>">
                                </p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div> <!-- .dokan-side-body -->
        </div> <!-- .downloadable -->
    </div>
</div>