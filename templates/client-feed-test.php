<?php
/*
Template Name: Client Site Feed TEST
*/
header( 'Content-Type: application/rss+xml; charset=UTF-8' );
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News Client Feed</title>
  <link>https://cronkitenews.azpbs.org</link>
  <description>This feed is for consumption by the client site.</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></pubDate>
  <lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu (Cronkite News)</managingEditor>
<?php
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 10,
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) :
		$loop->the_post();

		$content = get_the_content();
		$content = strip_shortcodes( $content );
		$content = preg_replace( '/<iframe.*?\/iframe>/i', '', $content );
		$content = preg_replace( '/<script.*?\/script>/i', '', $content );
		$content = preg_replace( '/<blockquote class="twitter-tweet"(.*)\/blockquote>/is', '', $content );
		$content = preg_replace( '/<i>-.*?\/i>/i', '', $content );
		$content = preg_replace( '/<em>-.*?\/em>/i', '', $content );
		$content = preg_replace( '/<img.*?\/>/i', '', $content );

		$clientTitle     = get_the_title();
		$clientPermaLink = get_the_permalink();
		?>
  <item>
	<title><?php echo $clientTitle; ?></title>
	<link><?php echo $clientPermaLink; ?></link>
	<description>
		<?php
		echo '<![CDATA[';
		echo '<p>';

		// retrieved author names
		$externalAuthorCount = 1;
		$internalAuthorCount = 0;
		$commaSeparator      = ',';
		$andSeparator        = ' and ';
		$cnStaffTotalCounter = 0;
		$authorName          = '';

		if ( have_rows( 'byline_info', $post->ID ) ) {
			while ( have_rows( 'byline_info', $post->ID ) ) {
				the_row();
				$staffID = get_sub_field( 'cn_staff' );
				if ( $staffID == '' ) {
					$cnStaffTotalCounter = 0;
				} else {
					$cnStaffTotalCounter = count( $staffID );
				}
			}
		}

		if ( $cnStaffTotalCounter > 0 ) {
			if ( have_rows( 'byline_info', $post->ID ) ) {
				$sepCounter = 0;
				while ( have_rows( 'byline_info', $post->ID ) ) {
					the_row();
					$staffID      = get_sub_field( 'cn_staff' );
					$cnStaffCount = count( $staffID );
					foreach ( $staffID as $key => $val ) {
						$args = array(
							'post_type'   => 'students',
							'post_status' => 'publish',
							'p'           => $val,
						);

						$staffDetails = new WP_Query( $args );
						if ( $staffDetails->have_posts() ) {
							while ( $staffDetails->have_posts() ) {
								$staffDetails->the_post();
								$sepCounter++;
								$authorName .= get_the_title( $val );

								if ( $sepCounter != $cnStaffCount ) {
									if ( $sepCounter == ( $cnStaffCount - 1 ) ) {
										$authorName .= $andSeparator . ' ';
									} else {
										$authorName .= $commaSeparator . ' ';
									}
								}
							}
						}
					}
				}

				if ( have_rows( 'external_authors_repeater' ) ) {
					$sepCounter = 0;
					while ( have_rows( 'external_authors_repeater' ) ) {
						the_row();
						$sepCounter++;
						$authorName .= get_sub_field( 'external_authors' );

						if ( $sepCounter != $cnStaffCount ) {
							if ( $sepCounter == ( $cnStaffCount - 1 ) ) {
								$authorName .= $andSeparator . ' ';
							} else {
								$authorName .= $commaSeparator . ' ';
							}
						}
					}
				}
			}
		}
		// wp_reset_query();

		// echo get_field('post_author');
		echo $authorName;
		echo '</p>';
		echo '<p>';
		echo ap_date();
		echo '</p>';
		echo '<p>';
		echo $clientTitle;
		echo '</p>';
		echo $content;
		echo '<p>For more stories from Cronkite News, visit <a href="https://cronkitenews.azpbs.org/?utm_source=referral&utm_medium=referral&utm_campaign=client" target="_blank"> cronkitenews.azpbs.org. </a></p>';
		echo ']]>';
		?>
	</description>
	<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>
	<guid><?php echo $clientPermaLink; ?></guid>
  </item>
<?php endwhile; ?>
</channel>
</rss>
