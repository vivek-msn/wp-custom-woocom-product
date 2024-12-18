<div class="wcp_custom_plugin">
    <h2>Custom Product Form</h2>
    <form action="" method="post" enctype="multipart/form-data">

        <?php wp_nonce_field("wcp_handle_add_product_form_submit", "wcp_nonce_value"); ?>

        <label for="product_name">Name:</label>
        <input type="text" id="product_name" name="wcp_name" placeholder="Enter product name" required>

        <label for="regular_price">Regular Price:</label>
        <input type="number" id="regular_price" name="wcp_regular_price" placeholder="Enter regular price" step="0.01" required>

        <label for="sale_price">Sale Price:</label>
        <input type="number" id="sale_price" name="wcp_sale_price" placeholder="Enter sale price" step="0.01" required>

        <label for="description">Description:</label>
        <textarea id="description" name="wcp_description" placeholder="Enter product description" required></textarea>

        <label for="short_description">Short Description:</label>
        <textarea id="short_description" name="wcp_short_description" placeholder="Enter short description"></textarea>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="wcp_sku" placeholder="Enter SKU" required>

        <label for="product_image">Product Image:</label>
        <button type="button" id="btn_upload_product_image">Upload Product Image</button>
        <input type="hidden" name="product_media_id" id="product_media_id">
        <img src="" alt="" class="src alt" id="product_image_preview" style="height: 100px; width:100px;">

        <button type="submit" name="btn_submit_woocom_product">Submit</button>
    </form>
</div>
