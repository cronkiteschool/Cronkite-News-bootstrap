<?php
/*
Template name: ADOT RSS feed
*/

header("Content-Type: application/rss+xml; charset=UTF-8");
print '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News RSS Feed</title>
  <link>https://cronkitenews.azpbs.org</link>
  <description>Cronkite News is the news division of Arizona PBS. The daily news products are produced by the Walter Cronkite School of Journalism and Mass Communication at Arizona State University.</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>
<?php
    $args = array(
                'post_type'	    => 'post',
                'posts_per_page'    => 10
            );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
?>
  <item>
    <title><?php echo the_title(); ?></title>
    <description>
    <?php
    echo '<![CDATA[';
    echo get_field('story_tease');
    echo ']]>';
    ?>
    </description>   
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php endwhile; ?>
<?php /* Extra item for the teaser */ ?>
  <item>
    <title>For more stories, go to cronkitenews.azpbs.org and follow us @cronkitenews</title>
    <description>For more stories, go to cronkitenews.azpbs.org and follow us @cronkitenews</description>
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
    <guid isPermalink="false"><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></guid>
  </item>

</channel>
</rss>