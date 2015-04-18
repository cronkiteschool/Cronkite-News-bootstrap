<?php
/*
Template Name: Client Site Feed
*/
header("Content-Type: application/rss+xml; charset=UTF-8");
print '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News Client Feed</title>
  <link>http://cronkitenews.asu.edu</link>
  <description>This feed is for consumption by the client site.</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>
<?php
$posts = query_posts('showposts=10');
foreach ($posts as $post) { ?>
  <item>
    <title><?php echo get_the_title($post->ID); ?></title>
    <link><?php echo get_permalink($post->ID); ?></link>
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
    echo the_content();
    echo the_field('second_text');
	echo ']]>';
	?>
    </description>   
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php } ?>
</channel>
</rss>