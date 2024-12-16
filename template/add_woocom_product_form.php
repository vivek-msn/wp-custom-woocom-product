<div class="wcp_custom_plugin">
    <h2>Custom Product Form</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="product_name">Name:</label>
        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>

        <label for="regular_price">Regular Price:</label>
        <input type="number" id="regular_price" name="regular_price" placeholder="Enter regular price" step="0.01" required>

        <label for="sale_price">Sale Price:</label>
        <input type="number" id="sale_price" name="sale_price" placeholder="Enter sale price" step="0.01">

        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Enter product description" required></textarea>

        <label for="short_description">Short Description:</label>
        <textarea id="short_description" name="short_description" placeholder="Enter short description"></textarea>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" placeholder="Enter SKU">

        <label for="product_image">Product Image:</label>
        <input type="file" id="product_image" name="product_image" accept="image/*">

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
