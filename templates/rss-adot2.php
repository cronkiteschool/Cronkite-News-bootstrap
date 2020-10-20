<?php
/*
Template Name: ADOT RSS2
*/
$ACCEPTHOST = 'cronkitenews.azpbs.org';
$NEWSCASTURL = $ACCEPTHOST . '/sitenewscast/';

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<?php
	$args = array(
                'post_type'	    => 'slider',
                'order'		    => 'ASC',
                'orderby'	    => 'menu_order',
                'posts_per_page'    => -1
            );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		//Extract slider html and find the link
		$content = get_the_content();

		//echo $content;
		$DOM = new DOMDocument;
		$DOM->loadHTML($content);
		$anchors = $DOM->getElementsByTagName('a');		
		$postlink =  $anchors->item(0)->getAttribute('href');			
		$host = parse_url($postlink, PHP_URL_HOST);

		$newscastwithscheme = 'https://' . $NEWSCASTURL;

		if (($postlink != $newscastwithscheme) and ($host == $ACCEPTHOST)) { 
			//Only include CN stories, not external and not the newscast. Change $ACCEPTHOST and $NEWSCASTURL at top of page
			$thepostid = url_to_postid($postlink);

			echo '<title>' . get_the_title($thepostid) . '</title>';
			echo '<link>' . $postlink . '</link>';
			echo '<item>';
			echo '<pubDate>' . mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false) . '</pubDate>';
			echo '<guid>' . $postlink . '</guid>';

			//Extract feature image, author, blurb
			$featureimage = get_the_post_thumbnail($thepostid, 'medium');
			$author = get_post_custom_values('post_author', $thepostid);
			$blurb = get_post_field('story_tease', $thepostid);
			echo '<description><![CDATA[';			
			echo '<br /><h3><strong><a href="' . $postlink . '">' . get_the_title($thepostid) . '</a></strong></h3>';
			echo 'By ' . $author[0] . '<br />';
			echo $blurb;
			echo '<br />]]></description>';
			echo '</item>';		
		}
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
				?>
				<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
				 <?php
				echo '<description><![CDATA[';

				echo '<h3><strong><a href="' . $link . '">' . $title . '</a></strong></h3>';

				echo ']]></description>';
				echo '</item>
				';

			endforeach;
			endif;
		endwhile;
		endif;
		wp_reset_query(); 
		?>
<?php /* Extra item for the teaser */ ?>
  <item>
    <title>For more stories, go to cronkitenews.azpbs.org and follow us @cronkitenews</title>
    <description>For more stories, go to cronkitenews.azpbs.org and follow us @cronkitenews</description>
    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
    <guid isPermalink="false"><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></guid>
  </item>
</channel>
</rss>
