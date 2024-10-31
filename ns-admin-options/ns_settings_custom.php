<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="genRowNssdc">
	<?php settings_fields('ns_pmpfw_free_options'); ?>
	<table>
		<tbody>
			<tr>
				<td colspan="2">
				<div class="ns-pmpfw-important"><b><?php _e('IMPORTANT!', $ns_text_domain); ?></b><br><br><?php _e('Chose one or more products edit it, go to "product details" -> "Product popup" and check "Add product to marketing popup"', $ns_text_domain); ?></div>
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="ns_pmpfw_test_mode"><?php _e('Test mode', $ns_text_domain); ?></label>
					<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Apply test mode to view every refresh', $ns_text_domain); ?></span></div>
				</th>
				<td class="forminp">
					<?php $checked = (get_option('ns_pmpfw_test_mode') AND get_option('ns_pmpfw_test_mode') == 'on') ? ' checked="checked"' : ''; ?>
					<input type="checkbox" name="ns_pmpfw_test_mode" id="ns_pmpfw_test_mode" <?php echo $checked; ?>>
					<span class="description"></span>
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="ns_pmpfw_text"><?php _e('Text Popup Box', $ns_text_domain); ?></label>
					<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Insert text for Popup Box', $ns_text_domain); ?></span></div>
				</th>
				<td class="forminp">
					<?php wp_editor( get_option('ns_pmpfw_text'), 'ns_pmpfw_text', $settings = array('textarea_name'=>'ns_pmpfw_text') ); ?>
					<span class="description"></span>
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="ns_pmpfw_delay"><?php _e('Popup Box Delay', $ns_text_domain); ?></label>
					<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Insert delay of Popup Box', $ns_text_domain); ?></span></div>
				</th>
				<td class="forminp">
					<input type="text" name="ns_pmpfw_delay" id="ns_pmpfw_delay" value="<?php echo get_option('ns_pmpfw_delay'); ?>">
					<span class="description"></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
	

<?php settings_fields('ns_pmpfw_free_options'); ?>
