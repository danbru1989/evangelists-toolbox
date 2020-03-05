<?php
/**
 * Event Organiser calendar feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

/**
 * Builds the calendar feed event title content.
 *
 * @param string $summary The location information.
 * @return $summary
 */
add_filter(
	'eventorganiser_ical_summary',
	function( $event_title ) {

		$location_address = eo_get_venue_address();

		if ( $location_address['city'] && $location_address['state'] ) {
			$event_title = get_the_title() . ' – ' . $location_address['city'] . ', ' . $location_address['state'];
		}

		$event_title = wp_strip_all_tags( html_entity_decode( $event_title ) );

		return $event_title;
	}
);

/**
 * Builds the calendar feed event location content.
 *
 * @param string $venue The location information.
 * @return $venue
 */
add_filter(
	'eventorganiser_ical_location',
	function( $venue ) {

		$location_address = eo_get_venue_address();

		$venue = sprintf(
			"%s\n%s\n%s\n%s, %s\n%s",
			get_field( 'primary_event_contact' ),
			eo_get_venue_name(),
			$location_address['address'],
			$location_address['city'],
			$location_address['state'],
			$location_address['country']
		);

		return $venue;
	}
);

/**
 * Builds the calendar feed event description content.
 *
 * @param string $description The event's description content.
 * @return $description
 */
add_filter(
	'eventorganiser_ical_description',
	function( $description ) {

		$category           = bdset_get_terms_list( 'event-category' );
		$email              = get_field( 'email' );
		$phone              = get_field( 'phone' );
		$website            = get_field( 'ministry_website' );
		$preaching          = get_field( 'private_details_preaching' );
		$music              = get_field( 'private_details_special_music' );
		$lodging            = get_field( 'private_details_staying_in' );
		$lodging_notes      = get_field( 'private_details_lodging_notes' );
		$travel_plans       = get_field( 'private_details_travel_plans' );
		$other_notes        = get_field( 'private_details_meeting_notes' );
		$childrens_meetings = get_field( 'private_details_childrens_meetings' );
		$book_table         = get_field( 'private_details_book_table' );

		// Add Contact Info section.
		if ( $contact || $email || $phone || $website ) {
			$contact_info = "\n\n––––– Contact Info –––––";

			if ( $email ) {
				$contact_info .= "\n" . $email;
			}
			if ( $phone ) {
				$contact_info .= "\n" . $phone;
			}
			if ( $website ) {
				$contact_info .= "\n" . $website;
			}

			$contact_info = apply_filters( 'bdset_ical_contact_info', $contact_info );
		}

		// Add Ministry Info section.
		if ( $preaching || $music || 'Not Verified' !== $childrens_meetings || 'Not Verified' !== $book_table ) {
			$ministry_info = "\n\n––––– Ministry Info –––––";

			if ( $preaching ) {
				$ministry_info .= "\nSpeaking – " . $preaching . "\n";
			}
			if ( $music ) {
				$ministry_info .= "\nMusic – " . $music . "\n";
			}
			if ( 'Not Verified' !== $childrens_meetings ) {
				$ministry_info .= "\nChildrens Meetings – " . $childrens_meetings;
			}
			if ( 'Not Verified' !== $book_table ) {
				$ministry_info .= "\nBook Table – " . $book_table;
			}

			$ministry_info = apply_filters( 'bdset_ical_ministry_info', $ministry_info );
		}

		// Add Lodging Info section.
		if ( 'Not Verified' !== $lodging || $lodging_notes ) {
			$lodging_info = "\n\n––––– Lodging Info –––––";

			if ( 'Not Verified' !== $lodging ) {
				$lodging_info .= "\nStaying In – " . $lodging;
			}
			if ( $lodging_notes ) {
				$lodging_info .= "\n\n" . $lodging_notes;
			}

			$lodging_info = apply_filters( 'bdset_ical_lodging_info', $lodging_info );
		}

		// Add Travel Info section.
		if ( $travel_plans ) {
			$travel_info = "\n\n––––– Travel Info –––––";

			if ( $travel_plans ) {
				$travel_info .= "\n" . $travel_plans;
			}

			$travel_info = apply_filters( 'bdset_ical_travel_info', $travel_info );
		}

		// Add Other Notes section.
		if ( $other_notes ) {
			$other_notes_info = "\n\n––––– Other Notes –––––\n" . $other_notes;

			$other_notes_info = apply_filters( 'bdset_ical_other_notes_info', $other_notes_info );
		}

		// Compile all sections together.
		$description = 'Category – ' . $category . $contact_info . $ministry_info . $lodging_info . $travel_info . $other_notes_info;

		return $description;
	}
);
