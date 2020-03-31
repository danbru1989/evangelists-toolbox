<?php
/**
 * Itinerary Functions.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        2.0.0
 */

/**
 * Outputs the itinerary loop.
 *
 * Groups events by year and outputs them for displaying as a table.
 */
function bdset_add_event_loop() {

	// Prepare for building year groups later.
	$year = false;

	$args = array(
		'post_type'        => 'event',
		'posts_per_page'   => -1,
		'suppress_filters' => false,
		'event_end_after'  => 'today',
	);

	$events = new \WP_Query( $args );

	if ( $events->have_posts() ) {

		echo '<div class="itinerary-table-wrap">';

		while ( $events->have_posts() ) {
			$events->the_post();

			/**
			 * Output the header row for a new year group
			 *
			 * Checks if the event's year is the same as $year. If it is, skip this conditional. If it is not, process this conditional.
			 */
			if ( $year !== eo_get_the_start( 'Y' ) ) {

				/**
				 * Close out the current year group.
				 *
				 * This is skipped at the first encounter because $year is still "false" and processed on the last encounter because $year is no longer "false".
				 */
				if ( $year ) {
					echo '</div>';
				}

				// Output a new year group.
				?>
					<h2 class="year-title"><?php echo eo_get_the_start( 'Y' ); ?></h2>
					<div class="table">
						<div class="header-row">
							<div class="cell column-1 date">Date</div>
							<div class="cell column-2 name">Name</div>
							<div class="cell column-3 location">Location</div>
							<div class="cell column-4 contact">Contact</div>
							<div class="cell column-5 type">Type</div>
						</div>
				<?php

				// Set year to current group so it can trigger next group when it's time.
				$year = eo_get_the_start( 'Y' );
			}

			// Get Location.
			if ( eo_get_venue() ) {
				$location = eo_get_venue_address();
				$location = $location['city'] . ', ' . $location['state'];
			} else {
				$location = '–';
			}

			// Get Contact.
			if ( get_field( 'primary_event_contact' ) ) {
				$contact = get_field( 'primary_event_contact' );
			} else {
				$contact = '–';
			}

			// Get Terms.
			if ( get_the_terms( $post_id, 'event-category' ) ) {
				$terms = get_the_terms( $post_id, 'event-category' );
				$terms = join( ', ', wp_list_pluck( $terms, 'name' ) );
			} else {
				$terms = '–';
			}

			// Pending event output.
			if ( 'pending' === get_field( 'event_status' ) || 'cancelled' === get_field( 'event_status' ) ) {

				?>
				<a class="row has-special-status" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
					<div class="cell column-1 date"><?php echo eo_format_event_occurrence( false, false, 'M j', '' ); ?></div>
					<div class="cell column-2 name"><?php the_title(); ?></div>
					<div class="cell column-3 location"><?php echo esc_html( $location ); ?></div>
					<div class="cell column-4 contact"><?php echo esc_html( $contact ); ?></div>
					<div class="cell column-5 type"><?php echo esc_html( $terms ); ?></div>
				</a>
				<?php

				// Personal event output.
			} elseif ( get_field( 'event_status' ) === 'unavailable' ) {

				?>
				<span class="row has-special-status">
					<div class="cell column-1 date"><?php echo eo_format_event_occurrence( false, false, 'M j', '' ); ?></div>
					<div class="cell column-2 name">UNAVAILABLE</div>
					<div class="cell column-3 location">–</div>
					<div class="cell column-4 contact">–</div>
					<div class="cell column-5 type">–</div>
				</span>
				<?php

				// Regular event output.
			} else {
				?>
				<a class="row" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
					<div class="cell column-1 date"><?php echo eo_format_event_occurrence( false, false, 'M j', '' ); ?></div>
					<div class="cell column-2 name"><?php the_title(); ?></div>
					<div class="cell column-3 location"><?php echo esc_html( $location ); ?></div>
					<div class="cell column-4 contact"><?php echo esc_html( $contact ); ?></div>
					<div class="cell column-5 type"><?php echo esc_html( $terms ); ?></div>
				</a>
				<?php
			}
		}
		echo '</div>';

	} else {
		echo '<div class="no-content">Sorry, there are no events to show...</div>';
	}
}
