<?php
/**
 * Event Organiser event RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.3.0
 */

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
