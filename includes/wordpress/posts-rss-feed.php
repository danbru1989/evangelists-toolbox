<?php
/**
 * WordPress posts RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.4.0
 */

/**
 * Adds media tag support to RSS namespace.
 *
 * @return void
 */
add_action(
	'rss2_ns',
	function() {
		echo 'xmlns:media="http://search.yahoo.com/mrss/"';
	}
);

/**
 * Adds the featured image to the RSS feed.
 *
 * @return void
 */
add_action(
	'rss2_item',
	function() {

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
);
