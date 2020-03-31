<?php
/**
 * Plugin Name: Evangelists Toolbox
 * Description: A collection of WordPress tools and integrations built for itinerate evangelists.
 *
 * Version:     2.2.1
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
define( 'BDSET_PLUGIN_VERSION', '2.2.1' );

/**
 * Start loading the plugin after dependencies have been checked.
 *
 * @return void
 */
add_action(
	'plugins_loaded',
	function() {
		require_once __DIR__ . '/includes/dependencies.php';

		if ( ! bdset_check_dependencies() ) {

			deactivate_plugins( plugin_basename( __FILE__ ) );
			add_action( 'admin_notices', 'bdset_init_fail_notice' );

		} else {

			require_once __DIR__ . '/includes/load-includes.php';
			require_once __DIR__ . '/includes/load-assets.php';
		}
	}
);
