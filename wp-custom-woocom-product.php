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