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
	$args = array(
                'post_type'	    => 'slider',
                'order'		    => 'ASC',
                'orderby'	    => 'menu_order',
                'posts_per_page'    => -1
            );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		//Capture the post ID so we can extract
		//feature image, author, blurb
		
		echo $post->ID;
		//the_post_thumbnail('medium');
		// echo '<title>' . the_title() . '</title>';
// 		echo '<link>' . the_permalink() . '</link>';
		echo '<description><![CDATA[';
		echo the_content();
		echo ']]></description>';
		?>
		<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
		<guid><?php echo get_permalink($post->ID); ?></guid>
		</item>
		<?php
		endwhile;
		wp_reset_query();
				
		// Query home page for the custom fields we need
		if( have_rows('latest_news_box', 24) ) : while( have_rows('latest_news_box', 24) ) : the_row();
			$posts = get_sub_field('post_box');
			if( $posts ): foreach( $posts as $post): setup_postdata($post);
				//echo 'loop! ';
				//echo '<title>' . the_title() . '</title>';
				$link = 'blank';
				if( get_field( "url_link" ) ) {
					$link = get_field('url_link');
				}
				else {
					$link = get_the_permalink();
				}
				$title = get_the_title();
				
				echo '<item>';
				echo '<guid>' . $link . '</guid>';
				echo '<title>' . $title . '</title>';
				echo '<pubDate>' . mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false) . '</pubDate>';
				echo '<description><![CDATA[';
				
				echo '<h3><strong><a href="' . $link . '">' . $title . '</a></strong></h3>';
				
				echo ']]></description>';
				echo '</item>';
			
			endforeach;
			endif;
		endwhile;
		endif;
		wp_reset_query(); 
		?>

</channel>
</rss>