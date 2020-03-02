<?php
/**
 * Checks dependencies to see if they exist.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Checks dependencies.
 *
 * @return boolean
 */
function bdset_check_dependencies() {

	// Check for Events Organiser.
	if ( ! function_exists( 'eo_get_events' ) ) {

		$plugin_name = 'Events Organiser';

		return false;
	}

	// Check for Advanced Custom Fields.
	if ( ! class_exists( 'ACF' ) ) {

		$plugin_name = 'Advanced Custom Fields';

		return false;
	}

	// Check for Notification.
	// if ( ! class_exists( '' ) ) {

	// 	$plugin_name = 'Notification';

	// 	return false;
	// }

	// All dependencies found.
	return true;
}

/**
 * Outputs an error message when dependencies are not detected.
 *
 * @return void
 */
function bdset_init_fail_notice() {
	echo '<div class="error"><p>Evangelists Toolbox cannot be used. Check that all required plugins are activated.</p></div>';
}
