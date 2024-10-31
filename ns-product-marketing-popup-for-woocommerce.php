<?php
/*
Plugin Name: NS Product Marketing Popup for WooCommerce
Plugin URI: http://www.nsthemes.com/
Description: Create a Layer the first access to site and add your Highlights product
Version: 1.7.3
Author: NsThemes
Author URI: http://nsthemes.com
Text Domain: ns-product-marketing-popup-for-woocommerce
Domain Path: /languages
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
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
    'main_directory_name'       => 'ns-product-marketing-popup-for-woocommerce',
    'main_file_name'            => 'ns-product-marketing-popup-for-woocommerce.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-product-marketing-popup-for-woocommerce%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '243',
    'plugin_token'              => 'NWNmZmFjZWIwNjUzMzUyMWVhOWM2MGIwMjVkN2FjMzZiOTNlM2FmNGQzYTZhZWIzYTQwMGMwMWYxOThkMTRkNDc2OGUwODYyNzYyYWI=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj243 = new pluginEye($plugineye);
$plugineyeobj243->pluginEyeStart();      
            

if ( ! defined( 'NS_PMPFW_PLUGIN_DIR' ) )
    define( 'NS_PMPFW_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'NS_PMPFW_PLUGIN_URL' ) )
    define( 'NS_PMPFW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


 setcookie('first_access_my_user', 1, time() + (86400), "/"); // (86400 * 30) 86400 = 1 day


/* *** include css admin *** */
function ns_pmpfw_css_admin( $hook ) {
	wp_enqueue_style('ns-pmpfw-style-admin', NS_PMPFW_PLUGIN_URL . '/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ns_pmpfw_css_admin' );

/* *** include css *** */
function ns_pmpfw_css( $hook ) {
	wp_enqueue_style('ns-pmpfw-style-single-product', NS_PMPFW_PLUGIN_URL . '/css/ns-custom-alert.css');
}

add_action( 'wp_enqueue_scripts', 'ns_pmpfw_css' );

/* *** include js *** */
function ns_pmpfw_js( $hook ) {
	wp_enqueue_script('ns-pmpfw-custom-script', NS_PMPFW_PLUGIN_URL . '/js/custom.js', array('jquery'));
}

function ns_pmpfw_js_inline () {
	 ?>
    <script>
		jQuery(document).ready(function( $ ) {
			$('#ns-pmpfw-layer-box').delay(<?php echo get_option('ns_pmpfw_delay'); ?>).fadeIn();
			$('#ns-pmpfw-container').delay(<?php echo get_option('ns_pmpfw_delay'); ?>).fadeIn();
			$('html').addClass('ns-marketing-stop-scrolling');
		});
	</script>
	<?php
}

if (!isset($_COOKIE['first_access_my_user']) OR (get_option('ns_pmpfw_test_mode') AND get_option('ns_pmpfw_test_mode') == 'on')) {
	// First access
	add_action( 'wp_enqueue_scripts', 'ns_pmpfw_js' );
	add_action('wp_head', 'ns_pmpfw_js_inline');
} else {
	// Other access
}

/* *** include admin option *** */
require_once( NS_PMPFW_PLUGIN_DIR.'/ns-product-marketing-popup-for-woocommerce-admin.php');

// Add the custom tab in woocommerce product page
require_once( NS_PMPFW_PLUGIN_DIR.'/ns-product-marketing-popup-for-woocommerce-add-tab.php');

function ns_pmpfw_default_options() {
    add_option('ns_pmpfw_test_mode', 'on');
    add_option('ns_pmpfw_text', 'Hello Word!');
    add_option('ns_pmpfw_delay', 0);
}
 
register_activation_hook( __FILE__, 'ns_pmpfw_default_options');

// function ns_pmpfw_free_add_option_page() {
    // add_menu_page('Product Popup', 'Product Popup', 'manage_options', 'ns-product-marketing-popup-for-woocommerce-free', 'ns_pmpfw_update_options_form', NS_PMPFW_PLUGIN_URL.'/img/backend-sidebar-icon.png', 60);
// }
 
// add_action('admin_menu', 'ns_pmpfw_free_add_option_page');

/* *** fuction display right price *** */
function ns_pmpfw_display_price($ns_sale_price, $ns_regular_price){
   if (isset($ns_sale_price) && $ns_sale_price != '') {
       return get_woocommerce_currency_symbol().$ns_sale_price.' <span class="nspriceline">'.get_woocommerce_currency_symbol().$ns_regular_price.'</span>';
   }else{
       return get_woocommerce_currency_symbol().$ns_regular_price;
   }
}

function ns_pmpfw_free_layer(){
	$a = '';
	$args = array(
		'post_type' => 'product',
		'post_status' => 'any',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
			   'key' => 'ns_pmpfw_custom_tab',
			   'value' => 'yes',
			   'compare' => '=',
			)
		)
	);
	$query = new WP_Query( $args );
	$a .= '<div class="ns_mp_container">';
	while ($query->have_posts()) : $query->the_post();
		$ns_pro = new WC_Product(get_the_ID());

		$a .= '	<div class="ns_mp_single_product">
				<div class="ns_mp_sp_title"><a href="'.esc_url(get_permalink(get_the_ID())).'">'.get_the_title().'</a></div>
				<div class="ns_mp_sp_img"><a href="'.esc_url(get_permalink(get_the_ID())).'">'. get_the_post_thumbnail().'</a></div>
				<div class="ns_mp_sp_price"><a href="'.esc_url(get_permalink(get_the_ID())).'">'.ns_pmpfw_display_price($ns_pro->get_sale_price(), $ns_pro->get_regular_price()).'</a></div>
			</div>';
	endwhile;
	$a .= '</div>';
	
	
	echo '<div id="ns-pmpfw-layer-box"></div>
	<div id="ns-pmpfw-container">';
	echo '<div class="ns_mp_text">'.do_shortcode(get_option('ns_pmpfw_text')).'</div>';
	echo $a;
	echo '</div>';
}
add_action( 'wp_footer', 'ns_pmpfw_free_layer' );

add_action( 'plugins_loaded', 'ns_marketing_popup_load_textdomain' );

function ns_marketing_popup_load_textdomain() {
  load_plugin_textdomain( 'ns-product-marketing-popup-for-woocommerce', false, basename( dirname( __FILE__ ) ) . '/languages/' ); 
}


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nsproductmarketingpopup_add_action_links' );

function nsproductmarketingpopup_add_action_links ( $links ) {	
 $mylinks = array('<a id="nspmplinkpremiumlinkpremium" href="https://www.nsthemes.com/product/product-marketing-popup-for-woocommerce/?ref-ns=2&campaign=PMP-linkpremium" target="_blank">'.__( 'Premium Version', 'ns-product-marketing-popup-for-woocommerce' ).'</a>');
return array_merge( $links, $mylinks );
}
?>