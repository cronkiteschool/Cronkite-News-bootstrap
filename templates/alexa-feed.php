<?php
/*
Template Name: Alexa Feed
Created: Mon Jul 2, 2018
*/

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News Feed for Alexa testing </title>
  <link>https://cronkitenews.azpbs.org/alexa-feed</link>
  <description>Cronkite News feed for Amazon Alexa.</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <ttl>45</ttl> 
<?php
    $args = array(
                'post_type'	     => 'post',
                'posts_per_page' => 4,
                'category__not_in' => array(11)
            );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();

?>
  <item>
    <title><?php echo the_title(); ?></title>
    <link><?php echo the_permalink(); ?></link>
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
    <?php if ($alsum = get_field('alexa_summary')) { ?>
    <description><?php echo $alsum; ?> </description>
    <?php } else { ?>
    <description><?php echo the_title(); ?>. <?php echo get_field('story_tease'); ?> </description>
<?php } ?>
  </item>
<?php endwhile; ?>

</channel>
</rss>
