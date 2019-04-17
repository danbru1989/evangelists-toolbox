<?php
/**
 * Plugin Name: Evangelists Toolbox
 * Description: A collection of Wordpress tools and integrations built for itinerate evangelists.
 *
 * Version:     1.0.0
 *
 * Author:      Dan Brubaker
 * Author URI:  https://brubakerservices.org/
 *
 * @package    BrubakerDesignServices\EvangelistsToolbox
 * @since      1.0.0
 *
 * Text Domain: evangelists-toolbox
 */

// Initialize Constants.
define( 'BDSET_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BDSET_PLUGIN_TEXT_DOMAIN', 'evangelists-toolbox' );
define( 'BDSET_PLUGIN_VERSION', '1.0.0' );

add_action( 'plugins_loaded', 'bdset_init' );
/**
 * Start loading the plugin after dependencies have been checked.
 *
 * @return void
 */
function bdset_init() {
	require_once __DIR__ . '/includes/dependencies.php';

	if ( ! bdset_check_dependencies() ) {

		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'bdset_init_fail_notice' );

	} else {

		require_once __DIR__ . '/includes/load-includes.php';
		require_once __DIR__ . '/includes/load-assets.php';
	}
}
