<?php
/**
 * Notifications functionality.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.4.2
 */

/**
 * Add custom merge tags to the Scheduled Events trigger.
 */
add_action(
	'notification/trigger/registered',
	function( $trigger ) {

		// Add merge tags to select triggers.
		// if ( 'wordpress/event/published' == $trigger->get_slug() ) {

			// Add Event Start Date.
			$trigger->add_merge_tag(
				new BracketSpace\Notification\Defaults\MergeTag\StringTag(
					array(
						'slug'     => 'event_start_date',
						'name'     => __( 'Event Start Date', 'evangelists-toolbox' ),
						'resolver' => function( $trigger ) {
							return eo_get_the_start( 'Y-m-d' );
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
							return eo_get_the_end( 'Y-m-d' );
						},
					)
				)
			);

		// }
	}
);
