<?php
/**
 * Notifications functionality.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.4.2
 */

/**
 * Add custom merge tags to the Events trigger.
 */
add_action(
	'notification/trigger/registered',
	function( $trigger ) {

		// Add merge tags to select triggers.
		if ( 'scheduled/event/ntfn_st_default' == $trigger->get_slug() || 'wordpress/event/published' == $trigger->get_slug() ) {

			// Add Event Start Date.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'event_start_date',
						'name'     => __( 'Event Start Date', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							$post_id    = $trigger->{ $trigger->get_post_type() }->ID;
							$occurrence = eo_get_next_occurrence_of( $post_id );
							if ( ! $occurrence ) {
								$occurrence = eo_get_current_occurrence_of( $post_id );
							}
							return eo_get_the_start( 'F j, Y', $post_id, $occurrence['occurrence_id'] );
						},
					)
				)
			);

			// Add Event End Date.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'event_end_date',
						'name'     => __( 'Event End Date', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							$post_id    = $trigger->{ $trigger->get_post_type() }->ID;
							$occurrence = eo_get_next_occurrence_of( $post_id );
							if ( ! $occurrence ) {
								$occurrence = eo_get_current_occurrence_of( $post_id );
							}
							return eo_get_the_end( 'F j, Y', $post_id, $occurrence['occurrence_id'] );
						},
					)
				)
			);

			// Add Event Status.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'event_status',
						'name'     => __( 'Event Status', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							return get_post_meta( get_the_ID(), 'event_status', true );
						},
					)
				)
			);

			// Add Event Email Automation.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'event_automation',
						'name'     => __( 'Event Email Automation', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							return get_post_meta( get_the_ID(), 'event_automation', true );
						},
					)
				)
			);

			// Add Primary Event Contact.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'primary_contact',
						'name'     => __( 'Primary Contact', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							return get_post_meta( get_the_ID(), 'primary_event_contact', true );
						},
					)
				)
			);

			// Add Primary Event Email.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'primary_contact_email',
						'name'     => __( 'Primary Contact Email', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							return get_post_meta( get_the_ID(), 'email', true );
						},
					)
				)
			);

		}
	}
);
