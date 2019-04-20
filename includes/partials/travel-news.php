<?php
/**
 * Builds the markup for displaying an event in paragraph form.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Output Travel News.
 *
 * @return void
 */
function bdset_travel_news() {

	do_action( 'bdset_before_travel_news_loop' );

	bdset_do_travel_news_loop();

	do_action( 'bdset_after_travel_news_loop' );

}

/**
 * Output the Travel News loop.
 *
 * Gets the current or next event and outputs a paragraph describing the event.
 *
 * @return void
 */
function bdset_do_travel_news_loop() {

	// Query events for current or next event.
	$args = array(
		'post_type'        => 'event',
		'posts_per_page'   => 1,
		'suppress_filters' => false,
		'event_end_after'  => 'today',
		'meta_key'         => 'event_display_settings',
		'meta_value'       => 'public',
		'meta_compare'     => '=',
	);

	$event = new \WP_Query( $args );

	if ( $event->have_posts() ) {

		do_action( 'bdset_before_travel_news_while' );

		while ( $event->have_posts() ) {
			$event->the_post();

			do_action( 'bdset_before_travel_news_content' );

			$title = get_the_title();
			$start_date = eo_get_the_start( 'Y-m-d' );
			$end_date = eo_get_the_end( 'Y-m-d' );
			$current_date = current_time( 'Y-m-d' );

			// Event syntax tense output.
			if ( $start_date <= $current_date && $end_date >= $current_date ) {
				$syntax_tense = 'currently';
			} else {
				$syntax_tense = 'going to be';
			}

			// Has Location output.
			if ( eo_get_venue() ) {
				$location = eo_get_venue_address();
				$location = ' in ' . $location['city'] . ', ' . $location['state'];
			}

			// Has Primary Contact output.
			if ( get_field( 'primary_event_contact' ) ) {
				$contact = ' with ' . get_field( 'primary_event_contact' );
			}

			// Current single day event.
			if ( $start_date === $end_date && $start_date === $current_date ) {
				$date_info = ' The meeting is today only.';
			}

			// Current multiday event.
			if ( $start_date !== $end_date && $start_date <= $current_date && $end_date >= $current_date ) {
				$date_info = ' The meetings began on ' . eo_get_the_start( 'l, F jS' ) . ' and are scheduled to finish on ' . eo_get_the_end( 'l, F jS' ) . '.';
			}

			// Future single day event.
			if ( $start_date === $end_date && $start_date > $current_date ) {
				$date_info = ' The meeting will be ' . eo_get_the_start( 'l, F jS' ) . '.';
			}

			// Future multiday event.
			if ( $start_date !== $end_date && $start_date > $current_date ) {
				$date_info = ' The meetings will begin on ' . eo_get_the_start( 'l, F jS' ) . ' and are scheduled to finish on ' . eo_get_the_end( 'l, F jS' ) . '.';
			}

			printf(
				'<div class="travel-news">We are %s at %s%s%s.%s</div>',
				esc_html( $syntax_tense ),
				esc_html( $title ),
				esc_html( $location ),
				esc_html( $contact ),
				esc_html( $date_info )
			);

			do_action( 'bdset_after_travel_news_content' );

		}
		wp_reset_postdata();

		do_action( 'bdset_after_travel_news_while' );

	} else {

		echo 'There are no upcoming meetings to display.';

	}
}
