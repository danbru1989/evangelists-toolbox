<?php
/**
 * Event Organiser event RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.3.0
 */

add_action( 'pre_get_posts', 'bdset_event_rss_query_args' );
/**
 * Allows only events with the Event Display Setting of "public" into the feed.
 *
 * @param object $query The query object.
 * @return void
 */
function bdset_event_rss_query_args( $query ) {
	if ( is_feed() && in_array( $query->get( 'post_type' ), array( 'event' ), true ) ) {
		$query->set( 'meta_key', 'event_display_settings' );
		$query->set( 'meta_value', 'public' );
	}
}

add_filter( 'the_content', 'bdset_event_rss_content' );
/**
 * Builds the events RSS content tag.
 *
 * @param string $content The content for the RSS events.
 * @return $content
 */
function bdset_event_rss_content( $content ) {
	if ( is_feed() && get_post_type() === 'event' ) {

		$dates = eo_format_event_occurrence( false, false, 'M j, Y', '', ' &ndash; ', false );

		if ( eo_get_venue() ) {
			$location = eo_get_venue_address();
			$location = '<br/>' . $location['city'] . ', ' . $location['state'];
		}

		$content = $dates . $location;

		return $content;

	} else {

		return $content;
	}
}
