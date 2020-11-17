<?php
/*
Template Name: Email  Feed
Updated: Mar 16, 2017 to support new home page
*/
// $ACCEPTHOST = 'cn2.niclindh.com';
$ACCEPTHOST = 'cronkitenews.azpbs.org';
// $ACCEPTHOST = 'cn.countzero.xyz';
$NEWSCASTURL = '//' . $ACCEPTHOST . '/sitenewscast';

header( 'Content-Type: application/rss+xml; charset=UTF-8' );
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News Service</title>
  <link>https://cronkitenews.azpbs.org/email-feed/</link>
  <description>Feed for consumption by MailChimp</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></pubDate>
  <lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>

<?php
	// main story
	$home_main_storyID = get_field( 'home_main_story', 24 );
	// retrieved author names
	$externalSites             = array(
		'boise-state-public-radio'                  => 'https://www.boisestatepublicradio.org',
		'colorado-public-radio'                     => 'https://www.cpr.org/',
		'cronkite-borderlands-project'              => 'https://cronkitenews.azpbs.org/category/borderlands/',
		'elemental-reports'                         => 'https://www.elementalreports.com/',
		'globalsport-matters'                       => 'https://www.globalsportmatters.com/',
		'howard-center-for-investigation-reporting' => 'https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism',
		'KJZZ'                                      => 'https://www.kjzz.org',
		'KPCC'                                      => 'https://www.scpr.org/',
		'KUNC'                                      => 'https://www.kunc.org/',
		'LAIST'                                     => 'https://laist.com/',
		'News21'                                    => 'https://www.news21.com/',
		'PBS-SoCal'                                 => 'https://www.pbssocal.org/',
		'Rocky-Mountain-PBS'                        => 'http://www.rmpbs.org/home/',
		'special-to-cronkite-news'                  => '',
	);
	$externalAuthorCount       = 1;
	$internalAuthorCount       = 0;
	$commaSeparator            = ',';
	$andSeparator              = ' and ';
	$cnStaffTotalCounter       = 0;
	$externalStaffTotalCounter = 0;
	$authorName                = '';

	if ( have_rows( 'byline_info', $home_main_storyID ) ) {
		while ( have_rows( 'byline_info', $home_main_storyID ) ) {
			the_row();
			$staffID = get_sub_field( 'cn_staff' );
			if ( $staffID == '' ) {
				$cnStaffTotalCounter = 0;
			} else {
				$cnStaffTotalCounter = count( $staffID );
			}

			if ( have_rows( 'external_authors_repeater' ) ) {
				while ( have_rows( 'external_authors_repeater' ) ) {
					the_row();
					$externalStaffTotalCounter++;
				}
			}
		}
	}

	if ( $cnStaffTotalCounter > 0 ) {
		if ( have_rows( 'byline_info', $home_main_storyID ) ) {
			$sepCounter = 0;
			while ( have_rows( 'byline_info', $home_main_storyID ) ) {
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
		}
	} elseif ( $externalStaffTotalCounter > 0 ) {

		if ( have_rows( 'byline_info', $home_main_storyID ) ) {
			$sepCounter = 0;
			while ( have_rows( 'byline_info', $home_main_storyID ) ) {
				the_row();
				if ( have_rows( 'external_authors_repeater' ) ) {
					if ( $cnStaffTotalCounter > 0 ) {
						$authorName .= ' and ';
					}
					$sepCounter = 0;
					while ( have_rows( 'external_authors_repeater' ) ) {
						the_row();
						$sepCounter++;
						$authorName .= get_sub_field( 'external_authors' );

						if ( $sepCounter != $externalStaffTotalCounter ) {
							if ( $sepCounter == ( $externalStaffTotalCounter - 1 ) ) {
									$authorName .= $andSeparator . ' ';
							} else {
								  $authorName .= $commaSeparator . ' ';
							}
						}
					}
				}
			}
		}
	}
	wp_reset_query();
	if ( $home_main_storyID && get_field( 'main_custom_title', 24 ) == '' ) {
		// override $post
		$post = $home_main_storyID;
		setup_postdata( $post );

		// echo $content;
		/*
		$DOM = new DOMDocument;
		$DOM->loadHTML($content);
		$anchors = $DOM->getElementsByTagName('a');*/
		$postlinkRaw = get_permalink( $home_main_storyID );
		$host        = parse_url( $postlinkRaw, PHP_URL_HOST );
		$path        = parse_url( $postlinkRaw, PHP_URL_PATH );
		$postlink    = 'https://' . $host . $path;

		if ( ( $postlink != $NEWSCASTURL ) and ( $host == $ACCEPTHOST ) ) {
			// Only include CN stories, not external and not the newscast. Change $ACCEPTHOST and $NEWSCASTURL at top of page
			// $thepostid = url_to_postid($postlink);

			echo '<item>';
			echo '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) . '</pubDate>';
			echo '<guid>' . get_permalink( $home_main_storyID ) . '</guid>';
			echo '<title>' . get_the_title( $home_main_storyID ) . '</title>';
			// Extract feature image, author, blurb
			$featureimage = get_the_post_thumbnail( $home_main_storyID, 'small', array( 'style' => 'width:100%;' ) );

			$author = get_post_custom_values( 'post_author', $home_main_storyID );
			$blurb  = get_post_field( 'story_tease', $home_main_storyID );
			echo '<description><![CDATA[';
			echo $featureimage;
			echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $postlink . '">' . get_the_title( $thepostid ) . '</a></strong></h2>';
			echo 'By ' . $authorName . '<br />';
			echo $blurb;
			echo '<br />]]></description>';
			echo '</item>';
		}
	} else {
		$customLink   = get_field( 'main_custom_link', 24 );
		$customTitle  = get_field( 'main_custom_title', 24 );
		$customByline = get_field( 'main_custom_byline', 24 );
		$customPhoto  = get_field( 'main_custom_photo', 24 );
		$customBlurb  = get_field( 'main_custom_blurb', 24 );

		echo '<item>';
		echo '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) . '</pubDate>';
		echo '<guid>' . $customLink . '</guid>';
		echo '<title>' . $customTitle . '</title>';
		// Extract feature image, author, blurb
		$featureimage = get_the_post_thumbnail( $home_main_storyID, 'small', array( 'style' => 'width:100%;' ) );

		echo '<description><![CDATA[';
		echo '<img width="800" height="500" src="' . $customPhoto . '" class="attachment-small size-small wp-post-image" alt="" style="width:100%;" srcset="' . $customPhoto . ' 800w" sizes="(max-width: 800px) 100vw, 800px" />';
		echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $customLink . '">' . $customTitle . '</a></strong></h2>';
		echo 'By ' . $customByline . '<br />';
		echo $customBlurb;
		echo '<br />]]></description>';
		echo '</item>';
	}
	wp_reset_query();

	// Query home page for the custom fields we need for slider aside
	// Query home page for the custom fields we need for slider aside
	if ( have_rows( 'slider_aside_box', 24 ) ) {
		while ( have_rows( 'slider_aside_box', 24 ) ) :
			the_row();
			$posts = get_sub_field( 'aside_post_box' );

			if ( $posts ) :
				foreach ( $posts as $post ) :
					setup_postdata( $post );
					// echo 'loop! ';
					// echo '<title>' . the_title() . '</title>';

					$link = 'blank';
					if ( get_field( 'url_link' ) ) {
						$link = get_field( 'url_link' );
					} else {
						$link = get_the_permalink();
					}

					$title     = get_the_title();
					$thepostid = url_to_postid( $link );

					// retrieved author names
					$externalSites             = array(
						'boise-state-public-radio'     => 'https://www.boisestatepublicradio.org',
						'colorado-public-radio'        => 'https://www.cpr.org/',
						'cronkite-borderlands-project' => 'https://cronkitenews.azpbs.org/category/borderlands/',
						'elemental-reports'            => 'https://www.elementalreports.com/',
						'globalsport-matters'          => 'https://www.globalsportmatters.com/',
						'howard-center-for-investigation-reporting' => 'https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism',
						'KJZZ'                         => 'https://www.kjzz.org',
						'KPCC'                         => 'https://www.scpr.org/',
						'KUNC'                         => 'https://www.kunc.org/',
						'LAIST'                        => 'https://laist.com/',
						'News21'                       => 'https://www.news21.com/',
						'PBS-SoCal'                    => 'https://www.pbssocal.org/',
						'Rocky-Mountain-PBS'           => 'http://www.rmpbs.org/home/',
						'special-to-cronkite-news'     => '',
					);
					$externalAuthorCount       = 1;
					$internalAuthorCount       = 0;
					$commaSeparator            = ',';
					$andSeparator              = ' and ';
					$cnStaffTotalCounter       = 0;
					$externalStaffTotalCounter = 0;
					$authorName                = '';

					if ( have_rows( 'byline_info', $thepostid ) ) {
						while ( have_rows( 'byline_info', $thepostid ) ) {
							the_row();
							$staffID = get_sub_field( 'cn_staff' );
							if ( $staffID == '' ) {
										$cnStaffTotalCounter = 0;
							} else {
									$cnStaffTotalCounter = count( $staffID );
							}

							if ( have_rows( 'external_authors_repeater' ) ) {
								while ( have_rows( 'external_authors_repeater' ) ) {
									the_row();
									$externalStaffTotalCounter++;
								}
							}
						}
					}

					if ( $cnStaffTotalCounter > 0 ) {
						if ( have_rows( 'byline_info', $thepostid ) ) {
							$sepCounter = 0;
							while ( have_rows( 'byline_info', $thepostid ) ) {
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
						}
					} elseif ( $externalStaffTotalCounter > 0 ) {

						if ( have_rows( 'byline_info', $thepostid ) ) {
							$sepCounter = 0;
							while ( have_rows( 'byline_info', $thepostid ) ) {
										the_row();
								if ( have_rows( 'external_authors_repeater' ) ) {
									if ( $cnStaffTotalCounter > 0 ) {
												  $authorName .= ' and ';
									}
									$sepCounter = 0;
									while ( have_rows( 'external_authors_repeater' ) ) {
											  the_row();
											  $sepCounter++;
											  $authorName .= get_sub_field( 'external_authors' );

										if ( $sepCounter != $externalStaffTotalCounter ) {
											if ( $sepCounter == ( $externalStaffTotalCounter - 1 ) ) {
													  $authorName .= $andSeparator . ' ';
											} else {
												$authorName .= $commaSeparator . ' ';
											}
										}
									}
								}
							}
						}
					}
					wp_reset_query();

					$author       = get_post_custom_values( 'post_author', $thepostid );
					$blurb        = get_post_field( 'story_tease', $thepostid );
					$featureimage = get_the_post_thumbnail( $thepostid, 'small', array( 'style' => 'width:100%;' ) );
					echo '<item>';
					echo '<guid>' . $link . '</guid>';
					echo '<title>' . $title . '</title>';
					?>
				<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></pubDate>
					<?php
					echo '<description><![CDATA[';
					echo $featureimage;
					echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $link . '">' . get_the_title( $thepostid ) . '</a></strong></h2>';
					echo 'By ' . $authorName . '<br />';
					echo $blurb;
					echo '<br />]]></description>';
					echo '</item>';

			endforeach;
			endif;
		endwhile;
	}

	// custom slide asides
	if ( get_field( 'custom_slide_aside_title1', 24 ) != '' ) {
		$customTitle1  = get_field( 'custom_slide_aside_title1', 24 );
		$customLink1   = get_field( 'custom_slide_aside_link1', 24 );
		$customPhoto1  = get_field( 'custom_slide_aside_photo1', 24 );
		$customByline1 = get_field( 'custom_slide_aside_byline1', 24 );
		$customBlurb1  = get_field( 'custom_slide_aside_blurb1', 24 );

		echo '<item>';
		echo '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) . '</pubDate>';
		echo '<guid>' . $customLink1 . '</guid>';
		echo '<title>' . $customTitle1 . '</title>';
		// Extract feature image, author, blurb

		echo '<description><![CDATA[';
		echo '<img width="800" height="500" src="' . $customPhoto1 . '" class="attachment-small size-small wp-post-image" alt="" style="width:100%;" srcset="' . $customPhoto1 . ' 800w" sizes="(max-width: 800px) 100vw, 800px" />';
		echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $customLink1 . '">' . $customTitle1 . '</a></strong></h2>';
		echo 'By ' . $customByline1 . '<br />';
		echo $customBlurb1;
		echo '<br />]]></description>';
		echo '</item>';
	}

	if ( get_field( 'custom_slide_aside_title2', 24 ) != '' ) {
		$customTitle2  = get_field( 'custom_slide_aside_title2', 24 );
		$customLink2   = get_field( 'custom_slide_aside_link2', 24 );
		$customPhoto2  = get_field( 'custom_slide_aside_photo2', 24 );
		$customByline2 = get_field( 'custom_slide_aside_byline2', 24 );
		$customBlurb2  = get_field( 'custom_slide_aside_blurb2', 24 );

		echo '<item>';
		echo '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) . '</pubDate>';
		echo '<guid>' . $customLink2 . '</guid>';
		echo '<title>' . $customTitle2 . '</title>';
		// Extract feature image, author, blurb

		echo '<description><![CDATA[';
		echo '<img width="800" height="500" src="' . $customPhoto2 . '" class="attachment-small size-small wp-post-image" alt="" style="width:100%;" srcset="' . $customPhoto2 . ' 800w" sizes="(max-width: 800px) 100vw, 800px" />';
		echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $customLink2 . '">' . $customTitle2 . '</a></strong></h2>';
		echo 'By ' . $customByline2 . '<br />';
		echo $customBlurb2;
		echo '<br />]]></description>';
		echo '</item>';
	}
		wp_reset_query();





	 // Get 2nd and 3rd story from verticals
	$frontpage_id = get_option( 'page_on_front' );

	if ( have_rows( 'area_works_box', $frontpage_id ) ) :
		// echo 'have rows';
		while ( have_rows( 'area_works_box', $frontpage_id ) ) :
			the_row();
			// Declare variables below
			// $icon = get_sub_field('area_works_image');
			// $title = get_sub_field('area_works_title');
			// $text = get_sub_field('area_works_description');
			$thepostid = get_sub_field( 'area_works_link' );
			// $customLinks = get_sub_field('custom_link');

			if ( get_the_permalink( $thepostid ) ) { // Only include stories that are on Cronkite News
				// $thepostid = url_to_postid($link);
				$link = get_the_permalink( $thepostid );

				echo '<item>';
				echo '<pubDate>' . mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) . '</pubDate>';
				echo '<guid>' . $link . '</guid>';
				echo '<title>' . get_the_title( $thepostid ) . '</title>';
				// Extract feature image, author, blurb
				$featureimage = get_the_post_thumbnail( $thepostid, 'small', array( 'style' => 'width:40%; float:right;' ) );

				// retrieved author names
				$externalSites             = array(
					'boise-state-public-radio'     => 'https://www.boisestatepublicradio.org',
					'colorado-public-radio'        => 'https://www.cpr.org/',
					'cronkite-borderlands-project' => 'https://cronkitenews.azpbs.org/category/borderlands/',
					'elemental-reports'            => 'https://www.elementalreports.com/',
					'globalsport-matters'          => 'https://www.globalsportmatters.com/',
					'howard-center-for-investigation-reporting' => 'https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism',
					'KJZZ'                         => 'https://www.kjzz.org',
					'KPCC'                         => 'https://www.scpr.org/',
					'KUNC'                         => 'https://www.kunc.org/',
					'LAIST'                        => 'https://laist.com/',
					'News21'                       => 'https://www.news21.com/',
					'PBS-SoCal'                    => 'https://www.pbssocal.org/',
					'Rocky-Mountain-PBS'           => 'http://www.rmpbs.org/home/',
					'special-to-cronkite-news'     => '',
				);
				$externalAuthorCount       = 1;
				$internalAuthorCount       = 0;
				$commaSeparator            = ',';
				$andSeparator              = ' and ';
				$cnStaffTotalCounter       = 0;
				$externalStaffTotalCounter = 0;
				$authorName                = '';

				if ( have_rows( 'byline_info', $thepostid ) ) {
					while ( have_rows( 'byline_info', $thepostid ) ) {
						the_row();
						$staffID = get_sub_field( 'cn_staff' );
						if ( $staffID == '' ) {
							$cnStaffTotalCounter = 0;
						} else {
							$cnStaffTotalCounter = count( $staffID );
						}

						if ( have_rows( 'external_authors_repeater' ) ) {
							while ( have_rows( 'external_authors_repeater' ) ) {
								the_row();
								$externalStaffTotalCounter++;
							}
						}
					}
				}

				if ( $cnStaffTotalCounter > 0 ) {
					if ( have_rows( 'byline_info', $thepostid ) ) {
						$sepCounter = 0;
						while ( have_rows( 'byline_info', $thepostid ) ) {
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
					}
				} elseif ( $externalStaffTotalCounter > 0 ) {

					if ( have_rows( 'byline_info', $thepostid ) ) {
						$sepCounter = 0;
						while ( have_rows( 'byline_info', $thepostid ) ) {
							the_row();
							if ( have_rows( 'external_authors_repeater' ) ) {
								if ( $cnStaffTotalCounter > 0 ) {
									  $authorName .= ' and ';
								}
								$sepCounter = 0;
								while ( have_rows( 'external_authors_repeater' ) ) {
									the_row();
									$sepCounter++;
									$authorName .= get_sub_field( 'external_authors' );

									if ( $sepCounter != $externalStaffTotalCounter ) {
										if ( $sepCounter == ( $externalStaffTotalCounter - 1 ) ) {
											$authorName .= $andSeparator . ' ';
										} else {
											$authorName .= $commaSeparator . ' ';
										}
									}
								}
							}
						}
					}
				}
				wp_reset_query();

				$author = get_post_custom_values( 'post_author', $thepostid );
				$blurb  = get_post_field( 'story_tease', $thepostid );
				echo '<description><![CDATA[';
				echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . $link . '">' . get_the_title( $thepostid ) . '</a></strong></h2>';
				 echo $featureimage;
				echo 'By ' . $authorName . '<br />';
				echo '<p style="width:55%">' . $blurb . '</p>';
				echo '<br />]]></description>';
				echo '</item>';

			}



	  endwhile;
	endif;
	wp_reset_query();


		// Query home page for the custom fields we need
	if ( have_rows( 'latest_news_box', 24 ) ) :
		while ( have_rows( 'latest_news_box', 24 ) ) :
			the_row();
			$posts = get_sub_field( 'post_box' );

			 $i = 0;

			foreach ( $posts as $post ) {

				$i++;

				if ( $i < 14 ) {
					setup_postdata( $post );
					// echo 'loop! ';
					// echo '<title>' . the_title() . '</title>';
					$link = 'blank';
					if ( get_field( 'url_link' ) ) {
						$link = get_field( 'url_link' );
					} else {
						$link = get_the_permalink();
					}
					$title = get_the_title();

					echo '<item>';
					echo '<guid>' . $link . '</guid>';
					echo '<title>' . $title . '</title>';
					?>
				<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></pubDate>
					<?php
					if ( $i == 1 ) {
						echo '<description><![CDATA[';
						echo '<a href="https://cronkitenews.azpbs.org/sitenewscast/" target="_blank"> <div style="width:100%; background-color:#234384; padding-top:1px; padding-bottom:1px; margin-bottom:20px;"><p style="text-align:center; color:#FFF; font-size:18px;"><strong> LATEST NEWSCAST </strong></p></div></a>';
						echo '<h3><strong><a href="' . $link . '">' . $title . '</a></strong></h3>';
						echo ']]></description>';
						echo '</item>
				';
					} else {
						echo '<description><![CDATA[';

						echo '<h3><strong><a href="' . $link . '">' . $title . '</a></strong></h3>';

						echo ']]></description>';
						echo '</item>';
					}
				}
			}

		endwhile;
		endif;
		wp_reset_query();
	?>

</channel>
</rss>
