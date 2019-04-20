<?php
/**
 * Event Organiser calendar feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

add_filter( 'bdset_ical_location', 'bdset_build_ical_location' );
/**
 * Builds the calendar feed event location content.
 *
 * @param string $location The location information.
 * @return $location
 */
function bdset_build_ical_location( $location ) {
	$location_address = eo_get_venue_address();
	$location         = sprintf(
		// '%s\n%s\n%s, %s\n%s ADD THIS WHEN \n's ARE FIXED
		'%s, %s, %s, %s',
		// eo_get_venue_name(), ADD THIS WHEN \n's ARE FIXED
		$location_address['address'],
		$location_address['city'],
		$location_address['state'],
		$location_address['country']
	);

	return $location;
}

add_filter( 'eventorganiser_ical_description', 'bdset_build_ical_description' );
/**
 * Builds the calendar feed event description content.
 *
 * @param string $description The event's description content.
 * @return $description
 */
function bdset_build_ical_description( $description ) {

	$category           = bdset_get_terms_list( 'event-category' );
	$contact            = get_field( 'primary_event_contact' );
	$email              = get_field( 'email' );
	$phone              = get_field( 'phone' );
	$website            = get_field( 'ministry_website' );
	$preaching          = get_field( 'private_details_preaching' );
	$music              = get_field( 'private_details_special_music' );
	$childrens_meetings = get_field( 'private_details_childrens_meetings' );
	$book_table         = get_field( 'private_details_book_table' );
	$lodging            = get_field( 'private_details_staying_in' );
	$lodging_notes      = get_field( 'private_details_lodging_notes' );
	$travel_plans       = get_field( 'private_details_travel_plans' );
	$other_notes        = get_field( 'private_details_meeting_notes' );

	// Add Contact Info section.
	if ( $contact || $email || $phone || $website ) {
		$contact_info = '\n\n––––– Contact Info –––––';

		if ( $contact ) {
			$contact_info .= '\n' . $contact;
		}
		if ( $email ) {
			$contact_info .= '\n' . $email;
		}
		if ( $phone ) {
			$contact_info .= '\n' . $phone;
		}
		if ( $website ) {
			$contact_info .= '\n' . $website;
		}
	}

	// Add Ministry Info section.
	if ( $preaching || $music || $childrens_meetings || $book_table ) {
		$ministry_info = '\n\n––––– Ministry Info –––––';

		if ( $preaching ) {
			$ministry_info .= '\nSpeaking – ' . $preaching . '\n';
		}
		if ( $music ) {
			$ministry_info .= '\nMusic – ' . $music . '\n';
		}
		if ( $childrens_meetings ) {
			$ministry_info .= '\nChildrens Meetings – ' . $childrens_meetings;
		}
		if ( $book_table ) {
			$ministry_info .= '\nBook Table – ' . $book_table;
		}
	}

	// Add Lodging Info section.
	if ( $lodging || $lodging_notes ) {
		$lodging_info = '\n\n––––– Lodging Info –––––';

		if ( $lodging ) {
			$lodging_info .= '\nStaying In – ' . $lodging;
		}
		if ( $lodging_notes ) {
			$lodging_info .= '\n\n' . $lodging_notes;
		}
	}

	// Add Travel Info section.
	if ( $travel_plans ) {
		$travel_info = '\n\n––––– Travel Info –––––';

		if ( $travel_plans ) {
			$travel_info .= '\n' . $travel_plans;
		}
	}

	// Add Other Notes section.
	if ( $other_notes ) {
		$other_notes_info = '\n\n––––– Other Notes –––––\n' . $other_notes;
	}

	// Compile all sections together.
	$description = 'Type – ' . $category . $contact_info . $ministry_info . $lodging_info . $travel_info . $other_notes_info;

	return $description;
}
