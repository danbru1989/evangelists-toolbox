<?php
/**
 * Event Organiser functionality.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

/**
 * Modifies venue slugs upon save to allow two venues with the same name. Slugs become NAME + CITY + STATE.
 *
 * @param array $args The venue parameters.
 * @return $args
 */
add_filter(
	'eventorganiser_pre_insert_venue',
	function( $args ) {
		$args['slug'] = sanitize_title( $args['name'] . '-' . $args['city'] . '-' . $args['state'] );
		return $args;
	}
);

/**
 * Allows only events with the Event Status of "Confirmed", "Pending", or "Cancelled" to be seen across the site, except for the itinerary page.
 *
 * @param object $query The event query.
 * @return void
 */
add_action(
	'pre_get_posts',
	function( $query ) {
		if ( in_array( $query->get( 'post_type' ), array( 'event' ), true ) && ! is_archive( 'event' ) ) {

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
					array(
						'key'   => 'event_status',
						'value' => 'cancelled',
					),
				),
			);
		}
	}
);

/**
 * Prepends event status to the title.
 */
add_filter(
	'the_title',
	function( $title, $id ) {

		if ( 'event' !== get_post_type( $id ) ) {
			return $title;
		}

		if ( 'pending' === get_field( 'event_status' ) || 'cancelled' === get_field( 'event_status' ) ) {

			$status = strtoupper( get_field( 'event_status' ) );

			if ( is_admin() ) {
				$status = $status . ' – ';
				$status = apply_filters( 'change_admin_event_status_output', $status );

				$title = $status . $title;

				return $title;
			}

			$status = '<span class="event-status">' . $status . '</span> – ';
			$status = apply_filters( 'change_event_status_output', $status );

			$title = $status . $title;

			return $title;
		}

		return $title;
	},
	10,
	2
);

/**
 * Displays "Future" events by default on All Events admin page.
 */
add_action(
	'wp_loaded',
	function() {
		if ( is_admin() && ! isset( $_GET['eo_interval'] ) ) {
			$_GET['eo_interval'] = 'future';
		}
	}
);
