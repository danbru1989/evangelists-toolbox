<?php
/**
 * Loads the Assets.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

add_action( 'wp_enqueue_scripts', 'bdset_enqueue_assets' );
/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function bdset_enqueue_assets() {

	wp_enqueue_style(
		bdset_PLUGIN_TEXT_DOMAIN . '-public-styles',
		bdset_PLUGIN_URL . 'assets/css/public.css',
		array(),
		bdset_PLUGIN_VERSION
	);

	wp_enqueue_script(
		'gmapsapi',
		'https://maps.googleapis.com/maps/api/js?key=AIzaSyAWn2qEoqAbberTemCAjhzCYzEAlu81Sq8',
		array(),
		bdset_PLUGIN_VERSION,
		true
	);

	wp_enqueue_script(
		bdset_PLUGIN_TEXT_DOMAIN . '-gmapscode',
		bdset_PLUGIN_URL . 'assets/js/google-maps.js',
		array( 'gmapsapi', 'jquery' ),
		bdset_PLUGIN_VERSION,
		true
	);
}

add_action( 'admin_enqueue_scripts', 'bdset_enqueue_admin_assets' );
/**
 * Enqueue Admin Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function bdset_enqueue_admin_assets() {

	wp_enqueue_style(
		bdset_PLUGIN_TEXT_DOMAIN . '-admin-styles',
		bdset_PLUGIN_URL . 'assets/css/admin.css',
		array(),
		bdset_PLUGIN_VERSION
	);
}
