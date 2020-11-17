<?php
/*
Template Name: Election 2020 JSON Feed
Created: Friday, Sept. 11, 2020
*/

header( 'Content-Type: application/json; charset=UTF-8' );
?>

<?php
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 20,
		'category__in'   => 13032,
	);
	$loop = new WP_Query( $args );
	$json = array();
	while ( $loop->have_posts() ) :
		$loop->the_post();
		$it = array(
			'title'       => get_the_title(),
			'description' => get_the_excerpt(),
			'link'        => get_permalink( $post->ID ),
			'pubDate'     => get_post_time( 'D, d M Y H:i:s O', true ),
			'image'       => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
			'source'      => 'Cronkite News',

		);
		$json[] = $it;
  endwhile;
	echo( json_encode( $json, JSON_PRETTY_PRINT ) );

