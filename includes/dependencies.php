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
 * This plugin requires Advanced Custom Fields and either Events Organiser or Events Manager.
 *
 * @return boolean
 */
function bdset_check_dependencies() {

	// Check for Events Organiser.
	if ( ! function_exists( eo_get_events() ) ) {

		return false;
	}

	// Check for Advanced Custom Fields.
	// if ( ! class_exists( 'ACF' ) ) {
	// return false;
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
	echo '<div class="error"><p><strong>Evangelists Toolbox cannot be activated. </strong>Be sure that you have all required plugins installed.</p></div>';
}
