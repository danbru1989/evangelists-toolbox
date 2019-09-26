<?php
/**
 * Plugin Name: Evangelists Toolbox
 * Description: A collection of WordPress tools and integrations built for itinerate evangelists.
 *
 * Version:     1.4.2
 *
 * Author:      Dan Brubaker
 * Author URI:  https://brubakerservices.org/
 *
 * @package    BrubakerDesignServices\EvangelistsToolbox
 *
 * Text Domain: evangelists-toolbox
 */

// Initialize Constants.
define( 'BDSET_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BDSET_PLUGIN_TEXT_DOMAIN', 'evangelists-toolbox' );
define( 'BDSET_PLUGIN_VERSION', '1.4.1' );

add_action( 'plugins_loaded', 'bdset_init' );
/**
 * Start loading the plugin after dependencies have been checked.
 *
 * @return void
 */
function bdset_init() {
	require_once __DIR__ . '/includes/dependencies.php';

	if ( ! bdset_check_dependencies() ) {

		add_action( 'admin_notices', 'bdset_init_fail_notice' );
		// deactivate_plugins( plugin_basename( __FILE__ ) ); // NOT WORKING ON WP 5.1.1 - try later to see if fixed. If never fixed use with the 'admin_init' hook.

	} else {

		require_once __DIR__ . '/includes/load-includes.php';
		require_once __DIR__ . '/includes/load-assets.php';
	}
}
