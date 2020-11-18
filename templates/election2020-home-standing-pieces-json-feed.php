<?php
/*
Template Name: Election 2020 - Standing Pieces JSON Feed
Created: Friday, Sept. 24, 2020
*/

header("Content-Type: application/json; charset=UTF-8");
?>

<?php
    $json = array();

if (have_rows('standing_pieces', 'option')) {
    while (have_rows('standing_pieces', 'option')) {
        the_row();
        $it = array(
        'title' => get_sub_field('headline'),
        'description' => get_sub_field('summary'),
            'image' => get_sub_field('photo'),
        'link' => get_sub_field('external_link'),
        'pubDate' => get_post_time('D, d M Y H:i:s O', true)
        );
        $json[] = $it;
    }
}
    echo(json_encode($json, JSON_PRETTY_PRINT));

