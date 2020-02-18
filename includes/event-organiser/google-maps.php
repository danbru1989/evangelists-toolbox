<?php
/**
 * Event Organiser Google Maps modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

/**
 * Configures Event Organiser Google Maps.
 *
 * @param array $map_args The map options to modify.
 * @return $map_args
 */
add_filter(
	'eventorganiser_venue_map_options',
	function( $map_args ) {
		$map_args['zoom']        = 6;
		$map_args['minzoom']     = 2;
		$map_args['scrollwheel'] = false;
		$map_args['styles']      = bdset_add_map_styles();

		$map_args = apply_filters( 'bdset_map_options', $map_args );

		return $map_args;
	}
);

/**
 * Adds custom map styles. Visit https://mapstyle.withgoogle.com to generate custom styles.
 *
 * @return array $styles
 */
function bdset_add_map_styles() {
	$styles = array(
		0 =>
		array(
			'featureType' => 'landscape.natural',
			'elementType' => 'geometry.fill',
			'stylers'     =>
			array(
				0 =>
				array(
					'saturation' => 65,
				),
			),
		),
		1 =>
		array(
			'featureType' => 'water',
			'elementType' => 'geometry.fill',
			'stylers'     =>
			array(
				0 =>
				array(
					'saturation' => 100,
				),
				1 =>
				array(
					'lightness' => -10,
				),
			),
		),
	);

	$styles = apply_filters( 'bdset_map_styles', $styles );

	return $styles;
}
