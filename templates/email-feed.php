<?php
/*
Template Name: Email Feed
*/

header("Content-Type: application/rss+xml; charset=UTF-8");
?>
<?php print '<?xml version="1.0"?>'; ?><rss version="2.0">

<channel>
  <title>Cronkite News Service</title>
  <link>http://cn2.niclindh.com/email-feed/</link>
  <description>Feed for consumption by MailChimp</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>
<?php
	$args = array( 'post_type' => 'sliders', 'posts_per_page' => 4 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<title>' . the_title() . '</title>';
		echo '<link>' . the_permalink() . '</link>';
		echo '<description><![CDATA[';
		echo the_content();
		echo ']]></description>';
		?>
		<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
		<guid><?php echo get_permalink($post->ID); ?></guid>
		</item>
		<?php
	endwhile;
		?>
</channel>
</rss>