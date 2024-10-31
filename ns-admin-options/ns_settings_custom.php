<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php // PUT YOUR settings_fields name and your input // ?>
<?php settings_fields('ns_change_addcart_options_group'); ?>
<div class="genRowNssdc">
 Change name of Add To Cart button:<br><br>
 <input type="text" id="ns_change_addcart" placeholder="Alternative name " name="ns_change_addcart" value ="<?php echo get_option('ns_change_addcart', ''); ?>">
</div>


