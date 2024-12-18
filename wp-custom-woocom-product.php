<?php

/**
 * Plugin Name: Custom WooCommerce Product Creator
 * Description: This plugin create woocommerce product
 * Version: 1.0
 * Author: Vivek Saini
 * Plugin URI: https//testing.com/custom-woocommerce-product
 */

 if(!defined("ABSPATH")){
    exit;
 }

 if(!in_array("woocommerce/woocommerce.php", apply_filters( "active_plugins", get_option("active_plugins")))){

   add_action( "admin_notices", "wcp_show_woocommerce_error");

 }

 function wcp_show_woocommerce_error(){

   echo '<div class="notice notice-error is-dimissible"> <p>Please Install and activate Woocommerce Plugin</p></div>';
 }


 // Add Plugin Menu
 add_action( "admin_menu", "wcp_add_menu" );

 function wcp_add_menu(){

    add_menu_page( "WooCommerce Product Creator", "WooCommerce Product Creator", "manage_options",
     "wcp-woocommerce-product-creator", "wcp_add_woocommerce_product_layout", "dashicons-cloud-upload", 8);
 }


 // Add Style.css
 add_action("admin_enqueue_scripts","wcp_add_stylesheet");

 function wcp_add_stylesheet(){

   wp_enqueue_style("wcp-style", plugin_dir_url(__FILE__) . "assets/style.css", array());
 }


 // Add WooCommerce Product Layout
 function wcp_add_woocommerce_product_layout(){

      ob_start();

      include_once plugin_dir_path(__FILE__) . "template/add_woocom_product_form.php";

      $template = ob_get_contents();

      ob_end_clean();

      echo $template;
}

// Admin init
add_action( "admin_init", "wcp_handle_add_product_form_submit");

// Function Handler
function wcp_handle_add_product_form_submit(){

   if(isset($_POST['btn_submit_woocom_product'])){

      // Verify Nonce Value
      if(!wp_verify_nonce( $_POST['wcp_nonce_value'], "wcp_handle_add_product_form_submit" )){
         exit;
      }

      if(class_exists("WC_Product_Simple")){

         $productObject = new WC_Product_Simple();

         // Product Parameters
         $productObject->set_name($_POST['wcp_name']);
         $productObject->set_regular_price($_POST['wcp_regular_price']);
         $productObject->set_sale_price($_POST['wcp_sale_price']);
         $productObject->set_description($_POST['wcp_description']);
         $productObject->set_short_description($_POST['wcp_short_description']);
         $productObject->set_sku($_POST['wcp_sku']);
         $productObject->set_status("publish");
         
         $productObject->save();

         echo '<div class="notice notice-success"> <p>Successfully, product has been created</p> </div>';
      }
   }
}