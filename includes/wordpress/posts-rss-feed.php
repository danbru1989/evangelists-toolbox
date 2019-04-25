<?php
/**
 * WordPress posts RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.4.0
 */

add_action( 'rss2_ns', 'bdset_rss_ns' );
/**
 * Adds media tag support to RSS namespace.
 *
 * @return void
 */
function bdset_rss_ns() {
	echo 'xmlns:media="http://search.yahoo.com/mrss/"';
}

add_action( 'rss2_item', 'bdset_add_rss_featured_image' );
/**
 * Adds the featured image to the RSS feed.
 *
 * @return void
 */
function bdset_add_rss_featured_image() {

	if ( has_post_thumbnail() ) {

		$size       = 'featured-image-rss';
		$dimensions = 'width="600" height="300"';

		$size       = apply_filters( 'bdset_modify_rss_featured_image_size', $size );
		$dimensions = apply_filters( 'bdset_modify_rss_featured_image_dimensions', $dimensions );

		$featured_image = '<media:content url="' . get_the_post_thumbnail_url( $post->ID, $size ) . '" medium="image" ' . $dimensions . ' />';

		echo $featured_image;

	} else {

		return;
	}
}
