<?php
/**
 * Event Organiser functionality.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

add_filter( 'eventorganiser_pre_insert_venue', 'bds_modify_venue_slugs' );
/**
 * Modifies venue slugs upon save to allow two venues with the same name. Slugs become NAME + CITY + STATE.
 *
 * @param array $args The venue parameters.
 * @return $args
 */
function bds_modify_venue_slugs( $args ) {
	$args['slug'] = sanitize_title( $args['name'] . '-' . $args['city'] . '-' . $args['state'] );
	return $args;
}
