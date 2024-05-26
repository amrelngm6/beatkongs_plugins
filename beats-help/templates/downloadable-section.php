<div class="dokan-download-options dokan-edit-row dokan-clearfix show_if_downloadable">
    <div class="dokan-section-heading" data-togglehandler="dokan_download_options">
        <h2><i class="fas fa-download" aria-hidden="true"></i> Downloadable Options</h2>
        <p>Configure your downloadable product settings</p>
        <a href="#" class="dokan-section-toggle">
            <i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <div class="dokan-divider-top dokan-clearfix">

            
            <div class="dokan-side-body dokan-download-wrapper">
                <table class="dokan-table">
                    <tfoot>
                        <tr>
                            <th colspan="3">
                                <a href="#" class="insert-file-row dokan-btn dokan-btn-sm dokan-btn-success" data-target="#downloads-tbody" data-row="&lt;tr&gt;
    &lt;td&gt;
        &lt;input type=&quot;text&quot; class=&quot;dokan-form-control input_text&quot; placeholder=&quot;File Name&quot; name=&quot;_wc_file_names[]&quot; value=&quot;&quot; /&gt;
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
            &lt;a href=&quot;#&quot; class=&quot;dokan-btn dokan-btn-sm dokan-btn-danger dokan-product-delete&quot;&gt;&lt;span&gt;Delete&lt;/span&gt;&lt;/a&gt;
        &lt;/p&gt;
    &lt;/td&gt;
&lt;/tr&gt;
">
                                    Add File                                </a>
                            </th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr>
                            <th>Name <span class="tips" title="This is the name of the download shown to the customer.">[?]</span></th>
                            <th>File URL <span class="tips" title="This is the URL or absolute path to the file which customers will get access to.">[?]</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="downloads-tbody">


                    </tbody>
                </table>

                <div class="dokan-clearfix">
                    <div class="content-half-part">
                        <label for="_download_limit" class="form-label">Download Limit</label>
                                    <input                 type="text" name="_download_limit"
                id="_download_limit"
                value="-1"
                class="dokan-form-control"
                placeholder="Unlimited">
                                </div><!-- .content-half-part -->

                    <div class="content-half-part">
                        <label for="_download_expiry" class="form-label">Download Expiry</label>
                                    <input                 type="text" name="_download_expiry"
                id="_download_expiry"
                value="-1"
                class="dokan-form-control"
                placeholder="Never">
                                </div><!-- .content-half-part -->
                </div>

            </div> <!-- .dokan-side-body -->
        </div> <!-- .downloadable -->
    </div>
</div>