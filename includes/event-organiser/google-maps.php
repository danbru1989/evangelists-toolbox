<?php
/**
 * Event Organiser Google Maps modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

add_filter( 'eventorganiser_venue_map_options', 'bdset_eo_map_options' );
/**
 * Configures Event Organiser Google Maps.
 *
 * @param array $map_args The map options to modify.
 * @return $map_args
 */
function bdset_eo_map_options( $map_args ) {
	$map_args['zoom']        = 4;
	$map_args['minzoom']     = 2;
	$map_args['scrollwheel'] = false;
	$map_args['styles']      = bdset_add_map_styles();

	$map_args = apply_filters( 'bdset_map_options', $map_args );

	return $map_args;
}

/**
 * Adds custom map styles. Visit https://mapstyle.withgoogle.com to generate custom styles.
 *
 * @return array $styles
 */
function bdset_add_map_styles() {
	$styles = array(
		0 =>
		array(
			'stylers' =>
			array(
				0 =>
				array(
					'saturation' => 30,
				),
				1 =>
				array(
					'lightness' => -5,
				),
			),
		),
		1 =>
		array(
			'featureType' => 'landscape.man_made',
			'stylers'     =>
			array(
				0 =>
				array(
					'saturation' => -70,
				),
				1 =>
				array(
					'lightness' => 35,
				),
			),
		),
		2 =>
		array(
			'featureType' => 'landscape.man_made',
			'elementType' => 'labels',
			'stylers'     =>
			array(
				0 =>
				array(
					'visibility' => 'off',
				),
			),
		),
		3 =>
		array(
			'featureType' => 'transit',
			'elementType' => 'labels',
			'stylers'     =>
			array(
				0 =>
				array(
					'visibility' => 'off',
				),
			),
		),
		4 =>
		array(
			'featureType' => 'water',
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
		5 =>
		array(
			'featureType' => 'water',
			'elementType' => 'labels',
			'stylers'     =>
			array(
				0 =>
				array(
					'visibility' => 'off',
				),
			),
		),
	);

	$styles = apply_filters( 'bdset_map_styles', $styles );

	return $styles;
}
