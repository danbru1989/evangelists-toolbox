<?php
/**
 * WordPress posts RSS feed modifications.
 *
 * @package      BrubakerDesignServices\EvangelistToolbox
 * @author       Dan Brubaker
 * @since        1.4.0
 */

add_filter(
	'rss2_ns',
	function() {
		echo 'xmlns:media="http://search.yahoo.com/mrss/"';
	}
);

// add_action( 'rss2_item', 'bdset_add_rss_featured_image' );
// function bdset_add_rss_featured_image() {
// 	if ( has_post_thumbnail() ) {
// 		echo '<media:content url="' . get_the_post_thumbnail_url( 'medium' ) . '" medium="image" width="400" />';
// 	} else {
// 		return;
// 	}
// }

add_action( 'the_content_feed', 'bdset_add_rss_featured_image' );
function bdset_add_rss_featured_image() {
	if ( has_post_thumbnail() ) {
		echo '<media:content url="' . get_the_post_thumbnail_url( 'medium' ) . '" medium="image" width="400" />';
	} else {
		return;
	}
}
