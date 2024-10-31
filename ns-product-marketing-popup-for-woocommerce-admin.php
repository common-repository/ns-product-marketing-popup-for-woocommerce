<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');


function ns_pmpfw_options_group() {
    register_setting('ns_pmpfw_free_options', 'ns_pmpfw_test_mode');
    register_setting('ns_pmpfw_free_options', 'ns_pmpfw_text');
    register_setting('ns_pmpfw_free_options', 'ns_pmpfw_delay');
}
 
add_action ('admin_init', 'ns_pmpfw_options_group');



function ns_pmpfw_update_options_form() {
	$wt_repeat = get_option('ns_pmpfw_test_mode');
	$wt_repeat = get_option('ns_pmpfw_text');
	$wt_repeat = get_option('ns_pmpfw_delay');
}

register_activation_hook( __FILE__, 'ns_pmpfw_update_options_form');

?>