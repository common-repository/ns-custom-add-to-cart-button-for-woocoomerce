<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ns_addcart_activate_set_options()
{
    add_option('ns_change_addcart', '');
}

register_activation_hook( __FILE__, 'ns_addcart_activate_set_options');



function ns_addcart_register_options_group()
{
    register_setting('ns_change_addcart_options_group', 'ns_change_addcart');   
}
 
add_action ('admin_init', 'ns_addcart_register_options_group');

?>