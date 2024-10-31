<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nsbigbox<?php echo $ns_style; ?>">
	<div class="titlensbigbox<?php echo $ns_style; ?>">
		<h4><?php echo strtoupper($ns_full_name); ?> <?php _e('PREMIUM VERSION', $ns_text_domain); ?></h4>
	</div>
	<div class="contentnsbigbox">
		<p>	<?php _e('ALL FREE VERSION FEATURES and', $ns_text_domain); ?>:<br/><br/>
			<?php _e('- One or more product highlights<br/>', $ns_text_domain); ?>
			<?php _e('- Show popup at the first visit of the day<br/>', $ns_text_domain); ?>
			<?php _e('- Contact Form 7 ready<br/>', $ns_text_domain); ?>
			<?php _e('- Shortcode ready (you can use any shortcode also WooCommerce shortcode)<br/>', $ns_text_domain); ?>
			<?php _e('- Full control on popup content<br/>', $ns_text_domain); ?>
			<?php _e('- Standard WordPress content editor<br/>', $ns_text_domain); ?>
			<?php _e('- Set a delay to start popup box<br/>', $ns_text_domain); ?>
			<?php _e('- Responsive mobile friendly popup<br/>', $ns_text_domain); ?>
			<?php _e('- Insert image in popup box<br/>', $ns_text_domain); ?>
			<?php _e('- Set cookie expire date<br/>', $ns_text_domain); ?>
			<?php _e('- Choose full width layer background color<br/>', $ns_text_domain); ?>
			<?php _e('- Choose full width layer opacity<br/>', $ns_text_domain); ?>
			<?php _e('- Set popup background color<br/>', $ns_text_domain); ?>
			<?php _e('- Set popup border width and color<br/>', $ns_text_domain); ?>
			<?php _e('- Set popup content padding<br/>', $ns_text_domain); ?>
			</p>
		<a href="<?php echo $link_sidebar; ?>" class="linkBigBoxNS">
			<div class="buttonNsbigbox<?php echo $ns_style; ?>">
				<?php _e('UPGRADE', $ns_text_domain); ?>!
			</div>
		</a>
	</div>
</div>