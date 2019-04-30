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

add_action( 'pre_get_posts', 'bdset_public_events_query' );
/**
 * Allows only events with the Event Display Setting of "public" to be seen across the site, except for the itinerary page.
 *
 * @param object $query The event query.
 * @return void
 */
function bdset_public_events_query( $query ) {
	if ( in_array( $query->get( 'post_type' ), array( 'event' ), true ) && ! is_archive( 'event' ) ) {
		$query->set( 'meta_key', 'event_display_settings' );
		$query->set( 'meta_value', 'public' );
	}
}
