<?php
/*
Template name: RSS ticker feed
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
                'posts_per_page'    => 10,
                'tag' => 'ticker'
            );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
?>
  <item>
    <title><?php echo the_title(); ?></title>
    <link><?php echo the_permalink(); ?></link>
    <description>
    <?php
    echo '<![CDATA[';
    echo '<p>';
    echo get_field('post_author');
    echo '</p>';
    echo '<p>';
    echo ap_date();
    echo '</p>';
    echo '<p>';
    echo the_title();
    echo '</p>';
    echo get_the_content();
    echo ']]>';
    ?>
    </description>
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php endwhile; ?>
</channel>
</rss>
