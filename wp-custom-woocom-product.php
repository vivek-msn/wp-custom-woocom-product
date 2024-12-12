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
   exit;

 }

 //Add Plugin Menu
 add_action( "admin_menu", "wcp_add_menu" );

 function wcp_add_menu(){

    add_menu_page( "WooCommerce Product Creator", "WooCommerce Product Creator", "manage_options",
     "wcp-woocommerce-product-creator", "wcp_add_woocommerce_product_layout", "dashicons-cloud-upload", 8);
 }

 //Add WooCommerce Product Layout
 function wcp_add_woocommerce_product_layout(){
    echo "<h3>Add WooCommerce Product</h3>";
 }