<?php
/**
 * Template Name: New Template - 2020
 * Story template without sidebar
 */
get_header( 'new2019' ); ?>

    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-12 medium-12 small-12 cell">
          <!-- breadcrumbs -->
          <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
          ?>
            <nav aria-label="Cronkite News: Breadcrumbs" role="navigation">
              <ul class="breadcrumbs">
                <li>
                  <?php
                    $catCount = count($categories);
                    foreach ($categories as $key => $val) {
                      if ($categories[$key]->name != 'New 2020') {
                        echo '<a href="' . esc_url( get_category_link( $categories[$key]->term_id ) ) . '">' . esc_html( $categories[$key]->name ) . '</a>';
                        if ($catCount > 1) {
                          echo '  ';
                        }
                      }
                    }
                  ?>
                </li>
              </ul>
            </nav>
          <?php
            }
          ?>

          <h1 class="single-story-hdr"><?php the_title(); ?></h1>
          <!-- byline and date -->
          <div class="byline">
            <?php
              $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                     'colorado-public-radio' => "https://www.cpr.org/",
                                     'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                     'elemental-reports' => "https://www.elementalreports.com/",
                                     'globalsport-matters' => "https://www.globalsportmatters.com/",
                                     'howard-center-for-investigation-reporting' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                     'KJZZ' => "https://www.kjzz.org",
                                     'KPCC' => "https://www.scpr.org/",
                                     'KUNC' => "https://www.kunc.org/",
                                     'LAIST' => "https://laist.com/",
                                     'News21' => "https://www.news21.com/",
                                     'PBS-SoCal' => "https://www.pbssocal.org/",
                                     'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                     'special-to-cronkite-news' => ""
                                    );
              $externalAuthorCount = 1;
              $internalAuthorCount = 0;
              $commaSeparator = ',';
              $andSeparator = ' and ';
              $cnStaffCount = 0;

              // bypass group not showing repeater field issue
              $groupFields = get_field('byline_info');
              $externalAuthorRepeater = $groupFields['external_authors_repeater'];

              if (have_rows('byline_info')) {
                $sepCounter = 0;
                echo '<span class="author_name">By ';
                while (have_rows('byline_info')) {
                  the_row();
                  $staffID = get_sub_field('cn_staff');
                  $cnStaffCount = count($staffID);

                  foreach ($staffID as $key => $val) {
                    echo '<!--'.$val.'-->';
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

                        $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));

                        if (get_field('student_photo') != '') {
                          $staffPhoto = get_field('student_photo');
                        } else {
                          $staffPhoto = '';
                        }

                        if (get_field('student_title') != '') {
                          $staffTitle = ucwords(str_replace('-', ' ', get_field('student_title')));
                        } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                          $staffTitle = ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau'))));
                        }

                        if( have_rows('social_media_outlets') ) {
                          while ( have_rows('social_media_outlets') ) {
                            the_row();
                            if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                              if (get_sub_field('social_media_type') == 'twitter') {
                                $twitterPopUp = 'https://www.twitter.com/'.get_sub_field('social_media_handle');
                              } else if (get_sub_field('social_media_type') == 'email') {
                                $mailPopUp = get_sub_field('social_media_handle');
                              } else if (get_sub_field('social_media_type') == 'instagram') {
                                $IGPopUp = 'https://www.instagram.com/'.get_sub_field('social_media_handle');
                              }
                            }
                          }
                        }

                        echo '<a class="staff-link" href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" data-staff-photo="'.$staffPhoto.'" data-staff-name="'.get_the_title($val).'" data-staff-title="'.$staffTitle.'" data-staff-twitter="'.$twitterPopUp.'" data-staff-mail="'.$mailPopUp.'" data-staff-IG="'.$IGPopUp.'">'.get_the_title($val).'</a>';

                        if ($sepCounter != $cnStaffCount) {
                          if ($sepCounter == ($cnStaffCount - 1)) {
                            echo $andSeparator.' ';
                          } else {
                            echo $commaSeparator.' ';
                          }
                        }
                      }
                    }
                  }
                  if ($cnStaffCount > 0 && $staffID != '') {
                    echo '/Cronkite News</span>';
                  }
                }
                //wp_reset_query();

                if (count($externalAuthorRepeater) > 0) {
                  $extStaffCount = count($externalAuthorRepeater);
                  if ($groupFields['cn_staff'] != '') {
                    echo ' and ';
                  }
                  $sepCounter = 0;
                  foreach ($externalAuthorRepeater as $key => $val ) {
                    $sepCounter++;
                    echo $val['external_authors'];
                    if ($val['author_title_site'] != '' || $val['author_title_site'] != 'other') {
                      if (array_key_exists($val['author_title_site'], $externalSites) == true) {
                        echo '/<a href="'.$externalSites[$val['author_title_site']].'" target="_blank">'.ucwords(str_replace('-', ' ', $val['author_title_site'])).'</a>';
                      }
                    }
                    if ($sepCounter != $extStaffCount) {
                      if ($sepCounter == ($extStaffCount - 1)) {
                        echo $andSeparator.' ';
                      } else {
                        echo $commaSeparator.' ';
                      }
                    }
                  }
                  echo '</span>';
                }

              } else {
                echo '<span class="author_name">By ';
                if ($postAuthor = get_field('post_author')) {
            ?>
                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                <?php echo $postAuthor; ?></a>/
                <?php } ?>
                <?php
                if( $siteTitle = get_field('site_title')) {
                   $url = get_field('site_url');
                   $url = esc_url( $url );
                ?><a href="<?php echo $url; ?>"><?php echo $siteTitle; ?></a>
                <?php
                }
                echo '</span>';
              }
              wp_reset_query();
            ?>
          </div>
          <div class="staff-pop-up"><span class="img"></span><span class="name"></span><span class="title"></span><span class="mail"></span><span class="twitter"></span><span class="IG"></span></div>
          <script>
            $(function() {
              $('.staff-link').hover(function(){
                  var staffPhoto = $(this).data('staff-photo');
                  var staffName = $(this).data('staff-name');
                  var staffTitle = $(this).data('staff-title');
                  var staffTwitter = $(this).data('staff-twitter');
                  var staffMail = $(this).data('staff-mail');
                  var staffIG = $(this).data('staff-IG');

                  if ($('.staff-pop-up').length) {
                    $('.staff-pop-up .img').html('<img src="'+staffPhoto+'" alt="'+staffName+'" title="'+staffName+'" />');
                    $('.staff-pop-up .name').html(staffName);
                    $('.staff-pop-up .title').html(staffTitle);
                    $('.staff-pop-up .mail').html('<a href="'+staffTwitter+'" target="_blank"><i class="fab fa-twitter"></i></a>');
                    $('.staff-pop-up .twitter').html('<a href="'+staffMail+'" target="_blank"><i class="fas fa-envelope"></i></a>');
                    $('.staff-pop-up .IG').html('<a href="'+staffIG+'" target="_blank"><i class="fab fa-instagram"></i></a>');
                  }
              }, function(){
                  var staffPhoto = '';
                  var staffName = '';
                  var staffTitle = '';
                  var staffTwitter = '';
                  var staffMail = '';
                  var staffIG = '';
              });
            });
          </script>

          <div class="pub_date">
            <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
            <?php if (get_field('updated_date_and_time') != '') { ?>
               | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
            <?php } ?>
          </div>
        </div>
        <div class="large-8 medium-12 small-12 cell story-content">

          <article id="story-post">

            <!-- story photo/video/slideshow -->
            <?php
              $isvid = get_field ('video_file', false, false);
              if ( $isvid ) { // if we have a video load the video instead of the carousel

                function linkifyYouTubeURLs($text) {
                    $text = preg_replace('~(?#!js YouTubeId Rev:20160125_1800)
                        # Match non-linked youtube URL in the wild. (Rev:20130823)
                        https?://          # Required scheme. Either http or https.
                        (?:[0-9A-Z-]+\.)?  # Optional subdomain.
                        (?:                # Group host alternatives.
                          youtu\.be/       # Either youtu.be,
                        | youtube          # or youtube.com or
                          (?:-nocookie)?   # youtube-nocookie.com
                          \.com            # followed by
                          \S*?             # Allow anything up to VIDEO_ID,
                          [^\w\s-]         # but char before ID is non-ID char.
                        )                  # End host alternatives.
                        ([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
                        (?=[^\w-]|$)       # Assert next char is non-ID or EOS.
                        (?!                # Assert URL is not pre-linked.
                          [?=&+%\w.-]*     # Allow URL (query) remainder.
                          (?:              # Group pre-linked alternatives.
                            [\'"][^<>]*>   # Either inside a start tag,
                          | </a>           # or inside <a> element text contents.
                          )                # End recognized pre-linked alts.
                        )                  # End negative lookahead assertion.
                        [?=&+%\w.-]*       # Consume any URL (query) remainder.
                        ~ix', '$1',
                        $text);
                    return $text;
                }

                $host = parse_url ($isvid);
                $isjpg = false;

                if ($host['host'] == 'www.youtube.com') {
                  $id = linkifyYouTubeURLs ($isvid);
                  $vidlink = $isvid;
                  echo '<div id="video-holder">';

                  echo '<div class="video-wrap">';
                  echo '<div class="video">';
                  echo '<div class="close-video"><i class="fas fa-times"></i></div>';
                  echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                  //echo '<iframe width="800" height="500" src="'.$vidlink.'?rel=0" frameborder="0" gesture="media" allowfullscreen></iframe>';
                  echo '<iframe
                      src="'.$vidlink.'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                      allowfullscreen
                      allowtransparency
                      allow="autoplay"
                  ></iframe>';
                  echo '</div>';
                  echo '<div class="asset-caption">'.get_field('video_caption').'</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                }
              } else if( have_rows('slider_images') ) { ?>
                <div id="story-photo" class="story-photos">
                <?php
                  while( have_rows('slider_images') ) {
                    the_row();
                    $imageCount = count(get_field('slider_images'));
                    $postImages = get_sub_field('images');
                    $photoCaption = get_sub_field('description');

                    if ($imageCount == 1) {
                ?>
                      <img src="<?php echo $postImages; ?>" width="800" alt="" title="" />
                      <div class="asset-caption"><?php echo $photoCaption; ?></div>
                <?php
                    } else {
                ?>
                    <div>
                      <img src="<?php echo $postImages; ?>" width="800" alt="" title="" />
                      <div class="asset-caption"><?php echo $photoCaption; ?></div>
                    </div>
                <?php
                    }
                  }
                ?>
                </div>
            <?php
              }
              wp_reset_query();
            ?>

            <!-- story content -->
            <?php the_content(); ?>

            <!-- Cronkite News - story tags -->
            <?php
              if (get_field('st_html')['tags'] != '' && get_field('st_html')['tags'] != 0) {
                $args = array(
                              'post_type'   => 'storytags',
                              'post_status' => 'publish',
                              'p' => get_field('st_html')['tags'],
                              'posts_per_page' => 1
                             );

                $storyTag = new WP_Query( $args );
                if( $storyTag->have_posts() ) {
                  echo '<div class="story_tag">';
                  while( $storyTag->have_posts() ) {
                    $storyTag->the_post();

                    if (get_field('story_html_tag') != '') {
                      echo get_field('story_html_tag');
                    }
                  }
                  echo '</div>';
                }
              }
              wp_reset_query();
            ?>
          </article>

          <!-- author biography -->
          <?php

            if (have_rows('byline_info')) {
              while (have_rows('byline_info')) {
                the_row();
              }
            }

            if (have_rows('byline_info')) {
              while (have_rows('byline_info')) {
                the_row();

                $staffID = get_sub_field('cn_staff');
                $photogID = get_sub_field('cn_photographers');

                foreach ($staffID as $key => $val) {
                  echo '<div class="author_bio">';
                  $args = array(
                                'post_type'   => 'students',
                                'post_status' => 'publish',
                                'p' => $val
                               );

                   $staffDetails = new WP_Query( $args );
                   if ($staffDetails->have_posts()) {

                     while ($staffDetails->have_posts()) {
                       $staffDetails->the_post();

                       $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));

                       if (get_field('student_photo') != '') {
                         echo '<div class="author_photo">';
                         echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                         echo '</div>';
                       }

                       echo '<div class="bio">';

                       if (get_the_title($val) != '') {
                         echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a></p>';
                       } else {
                         echo '<p class="name">'.'No author name found.'.'</p>';
                       }

                       if (get_field('student_title') != '') {
                         echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                       } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                         echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                       }

                       if( have_rows('social_media_outlets') ) {
                         echo '<div class="author_social_links">';
                         while ( have_rows('social_media_outlets') ) {
                           the_row();
                           if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                             if (get_sub_field('social_media_type') == 'twitter') {
                     ?>
                               <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                       <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                               <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                     <?php
                             }
                           }
                         }
                         echo '</div>';
                       }
                       echo '</div>';
                     }
                   }
                   echo '</div>';
                 }


                 // show photogs
                 foreach ($photogID as $key => $val) {
                   echo '<div class="author_bio">';
                   $args = array(
                                 'post_type'   => 'students',
                                 'post_status' => 'publish',
                                 'p' => $val
                                );

                    $staffDetails = new WP_Query( $args );
                    if ($staffDetails->have_posts()) {

                      while ($staffDetails->have_posts()) {
                        $staffDetails->the_post();

                        $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));

                        if (get_field('student_photo') != '') {
                          echo '<div class="author_photo">';
                          echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                          echo '</div>';
                        }

                        echo '<div class="bio">';

                        if (get_the_title($val) != '') {
                          echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a></p>';
                        } else {
                          echo '<p class="name">'.'No author name found.'.'</p>';
                        }

                        if (get_field('student_title') != '') {
                          echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                        } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                          echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                        }

                        if( have_rows('social_media_outlets') ) {
                          echo '<div class="author_social_links">';
                          while ( have_rows('social_media_outlets') ) {
                            the_row();
                            if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                              if (get_sub_field('social_media_type') == 'twitter') {
                      ?>
                                <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                                <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                        <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                                <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                      <?php
                              }
                            }
                          }
                          echo '</div>';
                        }
                        echo '</div>';
                      }
                    }
                    echo '</div>';
                  }
               }
             }
            wp_reset_query();
         ?>

          <!-- Comments section -->
          <div class="comment-form-wrapper">
            <h2>Leave a Comment</h2>
            <?php echo do_shortcode('[fbcomments]'); ?>
            <div id="response"></div>
          </div>

        </div>

        <div class="large-4 medium-12 small-12 cell sidebar">

            <?php dynamic_sidebar('Sidebar New Story Template - 2020'); ?>

            <div class="bug-report">
              <a href="#">
                <i class="fas fa-bug"></i>
                <div class="text">
                  <h3>Report a bug</h3>
                  <p>See something broken on this story. Click to report this page.</p>
                </div>
              </a>
            </div>

        </div>
      </div>
    </div>

<?php get_footer('new2020'); ?>
