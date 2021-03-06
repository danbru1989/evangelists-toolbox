<?php
/**
 * Event Organiser Custom Fields.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        2.0.0
 */

add_action(
	'acf/init',
	function() {

			acf_add_local_field_group(
				array(
					'key'                   => 'group_5c18368a47ad6',
					'title'                 => 'More Event Details',
					'fields'                => array(
						array(
							'key'               => 'field_5c6da8270d3c5',
							'label'             => 'Primary Contact',
							'name'              => 'primary_event_contact',
							'type'              => 'text',
							'instructions'      => 'Add an organizer for this event',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.3333',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => 'field_5c6db8e390f94',
							'label'             => 'Event Status',
							'name'              => 'event_status',
							'type'              => 'radio',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.3333',
								'class' => '',
								'id'    => '',
							),
							'choices'           => array(
								'confirmed'   => 'Confirmed',
								'pending'     => 'Pending',
								'cancelled'   => 'Cancelled',
								'unavailable' => 'Hide details and mark as "Unavailable"',
							),
							'allow_null'        => 0,
							'other_choice'      => 0,
							'default_value'     => get_field( 'event_status', 'option' ),
							'layout'            => 'vertical',
							'return_format'     => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key'               => 'field_5e58905bdf46e',
							'label'             => 'Event Email Automation',
							'name'              => 'event_automation',
							'type'              => 'true_false',
							'instructions'      => 'Send confirmation and follow up emails<br/>Triggered when event is published',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.3333',
								'class' => 'event-automation',
								'id'    => '',
							),
							'message'           => '',
							'default_value'     => 1,
							'ui'                => 1,
							'ui_on_text'        => '',
							'ui_off_text'       => '',
						),
						array(
							'key'               => 'field_5cafa55729fb3',
							'label'             => 'Email',
							'name'              => 'email',
							'type'              => 'email',
							'instructions'      => 'Add an email address for the primary contact',
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.33333',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
						),
						array(
							'key'               => 'field_5cafa52629fb2',
							'label'             => 'Phone',
							'name'              => 'phone',
							'type'              => 'text',
							'instructions'      => 'Add a phone number for the primary contact',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.33333',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => 'field_5cb4d3ff2e186',
							'label'             => 'Ministry Website',
							'name'              => 'ministry_website',
							'type'              => 'url',
							'instructions'      => 'Add a website for the venue',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '33.33333',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
						),
						array(
							'key'               => 'field_5c6daa73990cc',
							'label'             => 'Public Details',
							'name'              => 'public_details',
							'type'              => 'group',
							'instructions'      => 'Enter details to display on the public event page',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '50',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'block',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5c18ffaa50a55',
									'label'             => 'More Information',
									'name'              => 'more_info',
									'type'              => 'wysiwyg',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'tabs'              => 'visual',
									'toolbar'           => 'basic',
									'media_upload'      => 0,
									'delay'             => 0,
								),
								array(
									'key'               => 'field_5c18fd632f82c',
									'label'             => 'Event Website',
									'name'              => 'event_website',
									'type'              => 'url',
									'instructions'      => 'Enter the website dedicated to this event if one exists',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
								),
							),
						),
						array(
							'key'               => 'field_5c18fd7d2f82d',
							'label'             => 'Private Details',
							'name'              => 'private_details',
							'type'              => 'group',
							'instructions'      => 'Enter details for your private records. This information is always private.',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '50',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'block',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5c196de37c9f1',
									'label'             => 'Ministry',
									'name'              => '',
									'type'              => 'tab',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'placement'         => 'top',
									'endpoint'          => 0,
								),
								array(
									'key'               => 'field_5c18fe8d2f831',
									'label'             => 'Preaching Responsibilities',
									'name'              => 'preaching',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '100',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => 'Preaching all day Sunday and Mon-Fri at 7:00',
									'maxlength'         => '',
									'rows'              => 5,
									'new_lines'         => '',
								),
								array(
									'key'               => 'field_5c190331df386',
									'label'             => 'Special Music',
									'name'              => 'special_music',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '100',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => 'Specials in the AM and PM services',
									'maxlength'         => '',
									'rows'              => 5,
									'new_lines'         => '',
								),
								array(
									'key'               => 'field_5c1902acade49',
									'label'             => 'Children\'s Meetings',
									'name'              => 'childrens_meetings',
									'type'              => 'radio',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '50',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'Not Verified' => 'Not Verified',
										'Yes'          => 'Yes',
										'No'           => 'No',
									),
									'allow_null'        => 0,
									'other_choice'      => 0,
									'default_value'     => 'Not Verified',
									'layout'            => 'vertical',
									'return_format'     => 'value',
									'save_other_choice' => 0,
								),
								array(
									'key'               => 'field_5c1980c3dcc68',
									'label'             => 'Book Table',
									'name'              => 'book_table',
									'type'              => 'radio',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '50',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'Not Verified' => 'Not Verified',
										'Yes'          => 'Yes',
										'No'           => 'No',
									),
									'allow_null'        => 0,
									'other_choice'      => 0,
									'default_value'     => 'Not Verified',
									'layout'            => 'vertical',
									'return_format'     => 'value',
									'save_other_choice' => 0,
								),
								array(
									'key'               => 'field_5c6db0e750770',
									'label'             => 'Lodging',
									'name'              => '',
									'type'              => 'tab',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'placement'         => 'top',
									'endpoint'          => 0,
								),
								array(
									'key'               => 'field_5cb89ba27d52d',
									'label'             => 'We are staying in...',
									'name'              => 'staying_in',
									'type'              => 'radio',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '40',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'Not Verified'     => 'Not Verified',
										'RV / Trailer'     => 'RV / Trailer',
										'Prophets Chamber' => 'Prophets Chamber',
										'Missionary House' => 'Missionary House',
										'Hotel'            => 'Hotel',
										'Other'            => 'Other',
									),
									'allow_null'        => 0,
									'other_choice'      => 0,
									'default_value'     => 'Not Verified',
									'layout'            => 'vertical',
									'return_format'     => 'value',
									'save_other_choice' => 0,
								),
								array(
									'key'               => 'field_5c6db19286ce5',
									'label'             => 'Notes',
									'name'              => 'lodging_notes',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '60',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => 'Staying in a home with 13 cats.',
									'maxlength'         => '',
									'rows'              => 7,
									'new_lines'         => '',
								),
								array(
									'key'               => 'field_5c196ce098d8c',
									'label'             => 'Travel',
									'name'              => '',
									'type'              => 'tab',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'placement'         => 'top',
									'endpoint'          => 0,
								),
								array(
									'key'               => 'field_5c18fd8d2f82e',
									'label'             => 'Notes',
									'name'              => 'travel_plans',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => 'Arrive by 5:00 PM on Saturday for dinner with pastor',
									'maxlength'         => '',
									'rows'              => 10,
									'new_lines'         => '',
								),
								array(
									'key'               => 'field_5caf8f9cc9d63',
									'label'             => 'Notes',
									'name'              => '',
									'type'              => 'tab',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'placement'         => 'top',
									'endpoint'          => 0,
								),
								array(
									'key'               => 'field_5caf8fa8c9d64',
									'label'             => '',
									'name'              => 'meeting_notes',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
									'maxlength'         => '',
									'rows'              => 18,
									'new_lines'         => '',
								),
							),
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'post_type',
								'operator' => '==',
								'value'    => 'event',
							),
						),
					),
					'menu_order'            => 1,
					'position'              => 'normal',
					'style'                 => 'default',
					'label_placement'       => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen'        => array(
						0  => 'permalink',
						1  => 'the_content',
						2  => 'excerpt',
						3  => 'discussion',
						4  => 'comments',
						5  => 'revisions',
						6  => 'slug',
						7  => 'author',
						8  => 'format',
						9  => 'page_attributes',
						10 => 'featured_image',
						11 => 'tags',
						12 => 'send-trackbacks',
					),
					'active'                => true,
					'description'           => 'Adds more fields to the events CPT to hold event data',
				)
			);
	}
);
