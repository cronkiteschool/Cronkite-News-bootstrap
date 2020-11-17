<?php
/**
 * Single
 *
 * Loop container for single post content
 */
 get_header( 'new2019' ); ?>

     <?php
        if (get_the_ID() == '138082') {
          wp_redirect( 'https://cronkitenews.azpbs.org/story-removed/' );
        } else if (get_the_ID() == '140913') {
          wp_redirect( 'https://cronkitenews.azpbs.org/homeland-secrets/' );
        }
     ?>


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
                                      'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                      'KJZZ' => "https://www.kjzz.org",
                                      'KPCC' => "https://www.scpr.org/",
                                      'KUNC' => "https://www.kunc.org/",
                                      'KUER' => "https://www.kunc.org/post/one-got-away-look-glen-canyon-40-years-after-it-was-filled#stream/0",
                                      'LAIST' => "https://laist.com/",
                                      'PBS-SoCal' => "https://www.pbssocal.org/",
                                      'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                      'special-to-cronkite-news' => ""
                                     );
               $externalAuthorCount = 1;
               $internalAuthorCount = 0;
               $commaSeparator = ',';
               $andSeparator = ' and ';
               $cnStaffCount = 0;
               $newCheck = 0;

               // bypass group not showing repeater field issue
               $groupFields = get_field('byline_info');
               $externalAuthorRepeater = $groupFields['external_authors_repeater'];

               $normalizeChars = array(
                  'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
                  'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
                  'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
                  'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
                  'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
                  'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
                  'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
                  'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
              );

               if (have_rows('byline_info')) {
                 $sepCounter = 0;
                 //echo '<!--HERE BYLINE NEW-->';
                 echo '<span class="author_name">By ';
                 while (have_rows('byline_info')) {
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

                         $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));
                         $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                         echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a>';
                         if ($sepCounter != $cnStaffCount) {
                           if ($sepCounter == ($cnStaffCount - 1)) {
                             echo $andSeparator.' ';
                           } else {
                             echo $commaSeparator.' ';
                           }
                         }
                       }
                     }
                     $newCheck++;
                   }
                   if ($cnStaffCount > 0 && $staffID != '') {
                     if (get_sub_field('cn_project') != '') {
                       echo '/'.str_replace(' For ', ' for ', ucwords(str_replace('-', ' ', get_sub_field('cn_project'))));
                     } else {
                       echo '/Cronkite News</span>';
                     }
                   }
                 }
                 //wp_reset_query();

                 if ($externalAuthorRepeater && count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
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
                       } else {
                         echo '/'.str_replace('For', 'for', ucwords(str_replace('-', ' ', $val['author_title_site'])));
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
                   $newCheck++;
                 }

               }


               echo '<!--'.$newCheck.'-->';
               if ($newCheck == 0 && get_field('post_author') != '') {
                 //echo '<!--HERE BYLINE OLD-->';
                 //echo '<span class="author_name">By ';
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

           <div class="pub_date">
             <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
             <?php if (get_field('updated_date_and_time') != '') { ?>
                | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
             <?php } ?>
           </div>

           <div class="social_share">
              <div class="addthis_inline_share_toolbox"></div>
           </div>
         </div>
         <?php if (get_field('hide_right_sidebar') == 'yes') { ?>
         <div class="large-12 medium-12 small-12 cell story-content">
         <?php } else { ?>
         <div class="large-8 medium-12 small-12 cell story-content">
         <?php } ?>

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
                     <div>
                       <img src="<?php echo $postImages; ?>" width="800" alt="" title="" />
                       <div class="asset-caption"><?php echo $photoCaption; ?></div>
                     </div>
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
               } else {
                 echo "<br />";
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
                       if (get_the_ID() == 147157) {
                         echo '<div class="election-2020-story-tag">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                       } else {
                         echo '<div class="regular">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                       }
                     }
                   }
                   echo '</div>';
                 }
               }
               wp_reset_query();
             ?>

             <div class="social_share last">
               <span><strong>Share this story:</strong></span> <div class="addthis_inline_share_toolbox"></div>
             </div>

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
                 $broadcastID = get_sub_field('cn_broadcast_reporters');

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
                          echo '<div class="author_photo post">';
                          if ($staffNameURLSafe == 'staff') {
                            echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                          } else {
                            echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                          }
                          echo '</div>';
                        }

                        echo '<div class="bio post">';

                        if (get_the_title($val) != '') {
                          if ($staffNameURLSafe == 'staff') {
                            echo '<p class="name">'.get_the_title($val).'</p>';
                          } else {
                            echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a></p>';
                          }
                        } else {
                          echo '<p class="name">'.'No author name found.'.'</p>';
                        }

                        if (get_field('student_title') != '') {
                          echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                        } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                          echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                        }

                        if (get_field('biography') != '') {
                          echo '<span class="member-bio post">'.get_field('biography').'</span>';
                        } else {

                        }

                        echo '<div class="links-container">';

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

                        echo '</div>';
                      }
                    }
                    echo '</div>';
                  }

                  // show broadcast
                  foreach ($broadcastID as $key => $val) {
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
                           echo '<div class="author_photo post">';
                           if ($staffNameURLSafe == 'staff') {
                             echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                           } else {
                             echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                           }
                           echo '</div>';
                         }

                         echo '<div class="bio post">';

                         if (get_the_title($val) != '') {
                           if ($staffNameURLSafe == 'staff') {
                             echo '<p class="name">'.get_the_title($val).'</p>';
                           } else {
                             echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a></p>';
                           }
                         } else {
                           echo '<p class="name">'.'No author name found.'.'</p>';
                         }

                         if (get_field('student_title') != '') {
                           echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                         } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                           echo '<span class="team-title">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                         }

                         if (get_field('biography') != '') {
                           echo '<span class="member-bio post">'.get_field('biography').'</span>';
                         } else {

                         }

                         echo '<div class="links-container">';

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
                           echo '<div class="author_photo post">';
                           if ($staffNameURLSafe == 'staff') {
                             echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                           } else {
                             echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                           }
                           echo '</div>';
                         }

                         echo '<div class="bio post">';

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

                         if (get_field('biography') != '') {
                           echo '<span class="member-bio post">'.get_field('biography').'</span>';
                         } else {

                         }

                         echo '<div class="links-container">';

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

         <?php
          echo "<!--". get_field('hide_right_sidebar')."-->";
          if (get_field('hide_right_sidebar') == 'no' || get_field('hide_right_sidebar') == 0) {
         ?>
         <!-- right sidebar -->
         <div class="large-4 medium-12 small-12 cell sidebar">
             <?php dynamic_sidebar('Sidebar New Story Template - 2020'); ?>
         </div>
         <?php
          }
         ?>
       </div>
     </div>

<?php get_footer('new2020'); ?>
