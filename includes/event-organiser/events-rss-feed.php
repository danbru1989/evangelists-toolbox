<?php
/**
 * Event Organiser event RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.3.0
 */

/**
 * Allows only events with the Event Status of "Pending" or "Confirmed" into the feed.
 *
 * @param object $query The query object.
 * @return void
 */
add_action(
	'pre_get_posts',
	function( $query ) {
		if ( is_feed() && in_array( $query->get( 'post_type' ), array( 'event' ), true ) ) {

			$query->set(
				'meta_query',
				array(
					'relation' => 'OR',
					array(
						'key'   => 'event_status',
						'value' => 'confirmed',
					),
					array(
						'key'   => 'event_status',
						'value' => 'pending',
					),
				),
			);
		}
	}
);

/**
 * Builds the events RSS content tag.
 *
 * @param string $content The content for the RSS events.
 * @return $content
 */
add_filter(
	'the_content',
	function( $content ) {
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
);
