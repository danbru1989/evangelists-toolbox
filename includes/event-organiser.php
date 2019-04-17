<?php
/**
 * Event Organiser functionality.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

add_filter( 'eventorganiser_pre_insert_venue', 'bds_modify_venue_slugs' );
/**
 * Modifies venue slugs upon save to allow two venues with the same name. Slugs become NAME + CITY + STATE.
 *
 * @param array $args The venue parameters.
 * @return $args
 */
function bds_modify_venue_slugs( $args ) {
	$args['slug'] = sanitize_title( $args['name'] . '-' . $args['city'] . '-' . $args['state'] );
	return $args;
}

add_filter( 'eventorganiser_venue_map_options', 'bds_eo_map_options' );
/**
 * Configures Event Organiser Google Maps.
 *
 * @param [type] $map_args
 * @return void
 */
function bds_eo_map_options( $map_args ) {
	$map_args['zoom']        = 4;
	$map_args['minzoom']     = 2;
	$map_args['scrollwheel'] = false;
	$map_args['styles']      = bds_add_map_styles();

	return $map_args;
}

/**
 * Adds custom map styles. Visit https://mapstyle.withgoogle.com to generate custom styles.
 *
 * @return array $styles
 */
function bds_add_map_styles() {
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

	return $styles;
}
