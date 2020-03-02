<?php
/**
 * Loads the Assets.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Enqueue Admin Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
add_action(
	'admin_enqueue_scripts',
	function() {

		wp_enqueue_style(
			BDSET_PLUGIN_TEXT_DOMAIN . '-admin-styles',
			BDSET_PLUGIN_URL . 'assets/css/admin.css',
			array(),
			BDSET_PLUGIN_VERSION
		);
	}
);
