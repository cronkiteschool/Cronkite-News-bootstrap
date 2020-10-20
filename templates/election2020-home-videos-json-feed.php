<?php
/*
Template Name: Election 2020 - Videos JSON Feed
Created: Friday, Sept. 24, 2020
*/

header("Content-Type: application/json; charset=UTF-8");
?>

<?php
	$json = array();

	if (have_rows('videos', 'option')) {
    while (have_rows('videos', 'option')) { the_row();
			$source = ucwords(str_replace('-', ' ', get_sub_field('source')));
			$it = array(
	      'title' => get_sub_field('headline'),
	      'description' => get_sub_field('summary'),
				'embed' => get_sub_field('video_url'),
	      'link' => get_sub_field('external_link'),
	      'pubDate' => get_post_time('D, d M Y H:i:s O', true),
	      'source' => $source,
				'house_ad_img' => get_sub_field('house_ad'),
				'house_ad_link' => get_sub_field('house_ad_link')
	    );
	    $json[] = $it;
    }
	}
	echo(json_encode($json, JSON_PRETTY_PRINT));
?>
