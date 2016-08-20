<?php
/**
* Shortcode Module Class
*/
if ( ! class_exists( 'MWShortcodes') ) :
class MWShortcodeModule {

	function __construct() {
		require_once MW_INC_DIR . '/shortcode/shortcodes.php';
		$ct_shortcodes = new MWShortcodes();
		add_action('init', array( $this, 'add_button' ) );
	}

	function add_button() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && ! current_user_can('edit_hotels') ) {
			return;
		}

		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'add_plugin' ) );
			add_filter( 'mce_buttons', array( $this,'register_button' ) );
		}
	}

	function register_button( $buttons ) {
		array_push( $buttons, "|", "ct_shortcode_button" );
		return $buttons;
	}

	function add_plugin( $plugin_array ) {
		if ( floatval( get_bloginfo( 'version' ) ) >= 3.9 ) {
			$tinymce_js = MW_TEMPLATE_DIRECTORY_URI . '/inc/shortcode/js/tinymce.min.js';
		} else {
			$tinymce_js = MW_TEMPLATE_DIRECTORY_URI . '/inc/shortcode/js/tinymce-legacy.min.js';
		}
		$plugin_array['ct_shortcode'] = $tinymce_js;
		return $plugin_array;
	}
}
endif;
new MWShortcodeModule();