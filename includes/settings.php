<?php
/**
 * Settings page setup.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Adds Settings Page.
 */
acf_add_options_sub_page(
	array(
		'page_title'  => 'Evangelists Toolbox Settings',
		'menu_title'  => 'Evangelists Toolbox',
		'menu_slug'   => 'evangelists-toolbox-settings',
		'parent_slug' => 'options-general.php',
		'capability'  => 'edit_posts',
		'redirect'    => false,
	)
);

/**
 * Adds Settings Fields.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_settings',
		'title'    => 'Settings',
		'fields'   => array(
			array(
				'key'           => 'field_event_status',
				'label'         => 'Default Event Status',
				'name'          => 'event_status',
				'type'          => 'radio',
				'choices'       => array(
					'confirmed'   => 'Confirmed',
					'pending'     => 'Pending',
					'unavailable' => 'Hide details and mark as "Unavailable"',
				),
				'wrapper'       => array(
					'width' => '50',
				),
				'default_value' => 'pending',
			),
			array(
				'key'           => 'field_google_map_zoom',
				'label'         => 'Default Google Map Zoom',
				'name'          => 'google_map_zoom',
				'type'          => 'range',
				'instructions'  => 'Set a default zoom level for event maps',
				'wrapper'       => array(
					'width' => '50',
				),
				'default_value' => 6,
				'min'           => 2,
				'max'           => 20,
				'prepend'       => 'Zoom Out',
				'append'        => 'Zoom In',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'evangelists-toolbox-settings',
				),
			),
		),
		'style'    => 'seamless',
	),
);
