<?php
/**
 * Helper Functions.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 **/

/**
 * Formats an unlinked list of terms into a string.
 *
 * @param integer $post_id The ID or WP_Post object to get the terms from.
 * @param string  $taxonomy The taxonomy to query.
 * @param string  $separator The separator between each term.
 * @param integer $terms_count The number of terms to return.
 * @param mixed   $field The key to pluck.
 * @return $terms_string
 */
function bdset_get_terms_list( $post_id, $taxonomy, $separator = ', ', $terms_count = 0, $field = 'name' ) {

	$post_id = ! $post_id ? get_the_ID() : $post_id;
	$terms   = get_the_terms( $post_id, $taxonomy );

	if ( ! $terms ) {
		return;
	}

	if ( ! $terms_count > 0 ) {
		$terms_string = join( $separator, wp_list_pluck( $terms, $field ) );
	} else {
		$terms_string = join( $separator, wp_list_pluck( array_splice( $terms, 0, $terms_count ), $field ) );
	}
	return $terms_string;
}
