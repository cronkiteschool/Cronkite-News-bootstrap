<?php
/*
Template Name: PBS Feed
Created: Tuesday May 25, 2017
*/

$ACCEPTHOST = 'cronkitenews.azpbs.org';

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
    
  <title>Cronkite News Feed for PBS </title>
  <link>https://cronkitenews.azpbs.org/pbs-feed</link>
  <description>Cronkite News feed for PBS.</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
<?php
	$args = array(
                'post_type'	     => 'post',
                'posts_per_page' => 10,
                'category_name'  => 'editors-picks'
            );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
    
?>
  <item>
    <title><?php echo the_title(); ?></title>
    <link><?php echo the_permalink(); ?></link>
    <?php $featureimage = wp_get_attachment_url( get_post_thumbnail_id($thepostid) ); ?>
    <image> <?php echo $featureimage; ?> </image>
    <description>
    <?php
    echo '<![CDATA[';
    echo '<h2>';
    echo the_title();
    echo '</h2>';
    echo '<p>';
    echo get_field('post_author');
    echo '</p>';
	echo '<p>';
	echo ap_date();
    echo '</p>';
    echo get_field('story_tease');
    echo $featureimage;
    echo ']]>';    ?>
    </description>
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php endwhile; ?>

</channel>
</rss>
