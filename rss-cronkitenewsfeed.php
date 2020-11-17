<?php
/**
* Template Name: Cronkite News Feed
* Date: Sunday, Nov. 8th, 2020
*/

//header("Content-Type: application/rss+xml; charset=UTF-8");

// variables
$postCount = 20;
$postType = 'post';
$title = 'Cronkite News - Client Feed';
$websiteLink = 'https://cronkitenews.azpbs.org';
$description = "Cronkite News is the news division of Arizona PBS, the world's largest media organization operated by a journalism school. With reporting bureaus in Phoenix, Washington, D.C., and Los Angeles, we deliver important, impactful Arizona news to residents and news organizations across the state.";
$lang = 'en-us';
$email = 'cronkitenews@asu.edu';
$author = 'Cronkite News';
$copyright = '&copyright; '.date('Y').' Cronkite News';



@date_default_timezone_set("GMT");
$xmlWriter = new XMLWriter();
$xmlWriter->openURI('php://output');
$xmlWriter->openURI('cronkitenewsfeed.xml');
$xmlWriter->startDocument('1.0','UTF-8');
$xmlWriter->setIndent(4);
$xmlWriter->startElement('rss');
$xmlWriter->writeAttribute('version', '2.0');
$xmlWriter->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');
$xmlWriter->writeAttribute('xmlns:content', 'http://purl.org/rss/1.0/modules/content/');
$xmlWriter->writeAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
$xmlWriter->writeAttribute('xmlns:sy', 'http://purl.org/rss/1.0/modules/syndication/');
$xmlWriter->writeAttribute('xmlns:slash', 'http://purl.org/rss/1.0/modules/slash/');
$xmlWriter->writeAttribute('xmlns:media', 'http://search.yahoo.com/mrss/');
$xmlWriter->startElement('channel');

  $xmlWriter->startElement('atom:link');
    $xmlWriter->writeElement('href', self_link());
    $xmlWriter->writeElement('rel', 'self');
    $xmlWriter->writeElement('type', 'application/rss+xml');
  $xmlWriter->endElement();
  $xmlWriter->writeElement('title', $title);
  $xmlWriter->writeElement('link', $websiteLink);
  $xmlWriter->writeElement('language', $lang);
  $xmlWriter->writeElement('copyright', $copyright);
  $xmlWriter->writeElement('description', $description);
  $xmlWriter->writeElement('managingEditor', $email.' ('.$author.')');
  $xmlWriter->writeElement('pubDate', mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false));
  $xmlWriter->writeElement('lastBuildDate', mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false));
  $xmlWriter->writeElement('sy:updatePeriod', apply_filters( 'rss_update_period', 'hourly' ));
  $xmlWriter->writeElement('sy:updateFrequency', apply_filters( 'rss_update_frequency', '1' ));

    // query
    $args = array(
                  'post_type'	    => 'post',
                  'posts_per_page'    => $postCount
              );
    $loop = new WP_Query( $args );
    while($loop->have_posts()) { $loop->the_post();

      $content = wpautop( $post->post_content );
      $content = strip_shortcodes($content);
      $content = preg_replace('/<iframe.*?\/iframe>/i','', $content );
      $content = preg_replace('/<script.*?\/script>/i','', $content );
      $content = preg_replace( '/<blockquote class="twitter-tweet"(.*)\/blockquote>/is', '', $content );
      $content = preg_replace( '/<i>-.*?\/i>/i','', $content );
      $content = preg_replace( '/<em>-.*?\/em>/i','', $content );
      $content = preg_replace( '/<img.*?\/>/i','', $content );

      $clientTitle = get_the_title();
      $clientPermaLink = get_the_permalink();
      $apDateStory = ap_date();
      $finalPubDateStory = mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false);

      // get byline
      $externalAuthorCount = 1;
      $internalAuthorCount = 0;
      $commaSeparator = ',';
      $andSeparator = ' and ';
      $cnStaffTotalCounter = 0;
      $authorName = '';

      if (have_rows('byline_info', $post->ID)) {
        while (have_rows('byline_info', $post->ID)) {
          the_row();
          $staffID = get_sub_field('cn_staff');
          if ($staffID == '') {
            $cnStaffTotalCounter = 0;
          } else {
            $cnStaffTotalCounter = count($staffID);
          }
        }
      }

      if ($cnStaffTotalCounter > 0) {
        if (have_rows('byline_info', $post->ID)) {
          $sepCounter = 0;
          while (have_rows('byline_info', $post->ID)) {
            the_row();
            $staffID = get_sub_field('cn_staff');
            $cnStaffCount = count($staffID);
            foreach ($staffID as $key => $val) {
              $args = array(
                            'post_type'   => 'students',
                            'post_status' => 'publish',
                            'p' => $val
                          );

              $staffDetails = new WP_Query( $args );
              if ($staffDetails->have_posts()) {
                while ($staffDetails->have_posts()) {
                  $staffDetails->the_post();
                  $sepCounter++;
                  $authorName .= get_the_title($val);

                  if ($sepCounter != $cnStaffCount) {
                    if ($sepCounter == ($cnStaffCount - 1)) {
                      $authorName .= $andSeparator.' ';
                    } else {
                      $authorName .= $commaSeparator.' ';
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

              if ($sepCounter != $cnStaffCount) {
                if ($sepCounter == ($cnStaffCount - 1)) {
                  $authorName .= $andSeparator.' ';
                } else {
                  $authorName .= $commaSeparator.' ';
                }
              }
            }
          }
        }
      }
      wp_reset_query();

      $originalDate = $val['updateDate'];
      $pubDate = date("D, d M Y", strtotime($originalDate));
      $pubDate = $pubDate .' 0:15:00 +0000';
      $finalContent = '<p>'.$authorName.'</p><p>'.$apDateStory.'</p>'.$content.'<p>For more stories from Cronkite News, visit <a href="https://cronkitenews.azpbs.org/?utm_source=referral&utm_medium=referral&utm_campaign=client" target="_blank">cronkitenews.azpbs.org.</a></p>';

      $xmlWriter->startElement('item');
         $xmlWriter->writeElement('title', $clientTitle);
         $xmlWriter->writeElement('link', $clientPermaLink);
         $xmlWriter->writeElement('dc:creator', $authorName);
         $xmlWriter->writeElement('description', $finalContent);
         $xmlWriter->startElement('description');
         $xmlWriter->writeCData($finalContent);
         $xmlWriter->endElement();
         $xmlWriter->startElement('content:encoded');
         $xmlWriter->writeCData($finalContent);
         $xmlWriter->endElement();
         $xmlWriter->writeElement('guid', $clientPermaLink);
         $xmlWriter->writeElement('pubDate', $finalPubDateStory);
      $xmlWriter->endElement();
    }

   $xmlWriter->endElement();
$xmlWriter->endElement();
$xmlWriter->endDocument();
$xmlWriter->flush();

?>
