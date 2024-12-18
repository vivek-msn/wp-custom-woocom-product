jQuery(document).ready(function(){

    console.log("Welcome To WooCommerce Product Creater Plugin");

    jQuery(document).on("click", "#btn_upload_product_image", function(){

        let fileInfo = wp.media({
            title: "Select Product Image",
            multiple: false
        }).open().on("select", function(){

            let uploadedFile = fileInfo.state().get("selection").first();

            let fileObject = uploadedFile.toJSON();

            let productImageUrl = fileObject.url;
            jQuery("#product_media_id").val(fileObject.id);

            jQuery("#product_image_preview").attr("src",productImageUrl);
        });
    });
});