<?php

function ns_pmpfw_tab_options_woocat() {
    echo '<li class="custom_tab"><a href="#custom_tab_pmpfw">';
	_e(' Product popup', 'ns-marketing-popup');
	echo '</a></li>';
}
add_action('woocommerce_product_write_panel_tabs', 'ns_pmpfw_tab_options_woocat'); 


//Add field options
function ns_pmpfw_tab_donation() {
	global $post;
	
	$custom_tab_options = array(
		'title' => get_post_meta($post->ID, 'ns_pmpfw_custom_tab', true)
	);
	
?>
	<div id="custom_tab_pmpfw" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p class="form-field">
				<?php woocommerce_wp_checkbox( array( 'id' => 'ns_pmpfw_custom_tab', 'label' => __('Add product to marketing popup?', 'woothemes'), 'description' => __('', 'woothemes') ) ); ?>
			</p>
		</div>
	
	</div>
<?php
}
add_action('woocommerce_product_data_panels', 'ns_pmpfw_tab_donation');


// Save Data
function ns_process_product_meta_custom_tab_pmpfw( $post_id ) {
	update_post_meta( $post_id, 'ns_pmpfw_custom_tab', ( isset($_POST['ns_pmpfw_custom_tab']) && $_POST['ns_pmpfw_custom_tab'] ) ? 'yes' : 'no' );
}
add_action('woocommerce_process_product_meta', 'ns_process_product_meta_custom_tab_pmpfw');
?>