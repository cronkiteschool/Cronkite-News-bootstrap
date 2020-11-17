<?php
/*
Template Name: Election 2020 - Debate Upcoming Feed
Created: Monday, Sept. 28, 2020
*/

header( 'Content-Type: application/json; charset=UTF-8' );
?>

<?php
	$json = array();

if ( have_rows( 'upcoming_debates', 'option' ) ) {
	while ( have_rows( 'upcoming_debates', 'option' ) ) {
		the_row();
			$it     = array(
				'title'   => get_sub_field( 'debate' ),
				'link'    => get_sub_field( 'link' ),
				'pubDate' => get_post_time( 'D, d M Y H:i:s O', true ),
			);
			$json[] = $it;
	}
}
	echo( json_encode( $json, JSON_PRETTY_PRINT ) );

