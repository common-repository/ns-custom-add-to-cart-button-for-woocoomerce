<?php
/*
Plugin Name: NS Custom add to cart button
Plugin URI: https://wordpress.org/plugins/ns-custom-add-to-cart-button-for-woocoomerce/
Description: This plugin allow to change the label of button Add to Cart
Version: 1.2.4
Author: NsThemes
Author URI: http://www.nsthemes.com
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-custom-add-to-cart-button-for-woocoomerce',
    'main_file_name'            => 'ns-change-addcart.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-custom-add-to-cart-button-for-woocoomerce%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '237',
    'plugin_token'              => 'NWNmZjVkZmI0N2Y2OGFhYmU4NzMyYWFiYWQ5YTdlYzdjODg1MDE1YzNhZWVkMmZjY2E2NmIxZGM1NGZiMDg5ZjAxY2I5ZDEzYzFmNzI=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj237 = new pluginEye($plugineye);
$plugineyeobj237->pluginEyeStart();      

if ( ! defined( 'ADDCART_NS_PLUGIN_DIR' ) )
    define( 'ADDCART_NS_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'ADDCART_NS_PLUGIN_DIR_URL' ) )
    define( 'ADDCART_NS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );



/* *** plugin options *** */
require_once( ADDCART_NS_PLUGIN_DIR.'/ns-change-addcart-option.php');

require_once( untrailingslashit( dirname( __FILE__ ) ).'/ns-admin-options/ns-admin-options-setup.php');


//funtion to get text for AddToCart button  
function ns_write_change_addcart(){ 
	   
	  if(get_option('ns_change_addcart', '') == '') return 'Add To Cart'; //default value if is empty
	  return get_option('ns_change_addcart', '');
	}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // filter change all product button label
 
function woo_archive_custom_cart_button_text() {
        return __( ns_write_change_addcart(), 'woocommerce' );
		}
		
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    //  filter change single page product button label
  
function woo_custom_cart_button_text() {
 		return __( ns_write_change_addcart(), 'woocommerce' );
		}


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nscustomaddtocartbutton_add_action_links' );

function nscustomaddtocartbutton_add_action_links ( $links ) {	
 $mylinks = array('<a id="nscatblinkpremium" href="https://www.nsthemes.com/product/custom-add-to-cart-button-for-woocommerce/?ref-ns=2&campaign=CATB-linkpremium" target="_blank">'.__( 'Premium Version', 'ns-facebook-pixel-for-wp' ).'</a>');
return array_merge( $links, $mylinks );
}
?>