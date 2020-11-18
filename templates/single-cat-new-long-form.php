<?php
get_header('new-long-form'); ?>

<?php
  $publishDate = ap_date();

function generateByline($currPostID, $currIntro, $publishDate)
{
    ?>
    <div class="grid-container text-content">
      <div class="grid-x grid-padding-x">
        <div class="large-8 medium-8 small-12 cell story-credits-date">
          <span class="byline">
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
               'Š' => 'S', 'š' => 's', 'Ð' => 'Dj','Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
               'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
               'Ï' => 'I', 'Ñ' => 'N', 'Ń' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
               'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
               'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
               'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ń' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
               'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f',
               'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',
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

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {
                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();
                                $sepCounter++;

                                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                echo '<a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/">' . get_the_title($val) . '</a>';
                                if ($sepCounter != $cnStaffCount) {
                                    if ($sepCounter == ($cnStaffCount - 1)) {
                                        echo $andSeparator . ' ';
                                    } else {
                                        echo $commaSeparator . ' ';
                                    }
                                }
                            }
                        }
                        $newCheck++;
                    }
                    if ($cnStaffCount > 0 && $staffID != '') {
                        echo '/Cronkite News</span>';
                    }
                }
                //wp_reset_query();

                if ($externalAuthorRepeater && count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
                    $extStaffCount = count($externalAuthorRepeater);
                    if ($groupFields['cn_staff'] != '') {
                        echo ' and ';
                    }
                    $sepCounter = 0;
                    foreach ($externalAuthorRepeater as $key => $val) {
                        $sepCounter++;
                        echo $val['external_authors'];
                        if ($val['author_title_site'] != '' || $val['author_title_site'] != 'other') {
                            if (array_key_exists($val['author_title_site'], $externalSites) == true) {
                                echo '/<a href="' . $externalSites[$val['author_title_site']] . '" target="_blank">' . ucwords(str_replace('-', ' ', $val['author_title_site'])) . '</a>';
                            } else {
                                echo '/' . str_replace('For', 'for', ucwords(str_replace('-', ' ', $val['author_title_site'])));
                            }
                        }
                        if ($sepCounter != $extStaffCount) {
                            if ($sepCounter == ($extStaffCount - 1)) {
                                echo $andSeparator . ' ';
                            } else {
                                echo $commaSeparator . ' ';
                            }
                        }
                    }
                    echo '</span>';
                    $newCheck++;
                }
            } ?>
          </span>
        <?php wp_reset_postdata(); ?>
          <span class="pubdate">
            <time datetime="<?php echo $publishDate; ?>"><?php echo $publishDate; ?></time>
          <?php if (get_field('updated_date_and_time') != '') { ?>
               | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
          <?php } ?>
          <?php wp_reset_postdata(); ?>
          </span>
        </div>
        <div class="large-4 medium-4 small-12 cell story-credits-date medium-text-right text-left">
          <ul class="top_social">
            <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink($currPostID); ?>&text=<?php echo urlencode(strip_tags($currIntro)); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($currPostID); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <?php
}


if (have_rows('blocks')) {
    while (have_rows('blocks')) {
        the_row();
        if (get_row_layout() == 'intro-split') {
            $intro = get_sub_field('intro_summary'); ?>
  <div id="intro" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-6 medium-6 small-12 cell intro-text">
        <h1><?php echo get_sub_field('headline'); ?></h1>
            <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <div class="large-6 medium-6 small-12 cell background-img" <?php echo 'style="background:url(' . get_sub_field('photo') . ')"'; ?>>
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
      </div>
    </div>
  </div>
            <?php generateByline(get_the_ID(), $intro, $publishDate); ?>

            <?php
        } elseif (get_row_layout() == 'intro-head-photo') {
            $intro = get_sub_field('intro_summary'); ?>
<div id="intro-head-photo" class="grid-container full">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell intro-text text-center">
            <?php if (get_sub_field('headline') == '') { ?>
        <h1><?php echo get_the_title(); ?></h1>
            <?php } else { ?>
        <h1><?php echo get_sub_field('headline'); ?></h1>
            <?php } ?>
            <?php echo get_sub_field('intro_summary'); ?>
    </div>
            <?php
      // check photo and select credit width
            if (get_sub_field('photo')) {
                list($width, $height, $type, $attr) = getimagesize(get_sub_field('photo'));
                if ($width == 1200) {
                    $introPhotoWidth = 'photo-credit-width-1200';
                } else {
                    $introPhotoWidth = 'photo-credit-width-1800';
                }
            }

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            } ?>

    <div class="large-12 medium-12 small-12 cell text-center <?php echo $photoStyle; ?>">
      <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
            <?php generateByline(get_the_ID(), $intro, $publishDate); ?>

            <?php
        } elseif (get_row_layout() == 'intro-fadeout-protrait-images') {
            $intro = get_sub_field('intro_summary'); ?>

<div id="intro-head-photo" class="grid-container full">
  <div class="grid-x grid-padding-x">
            <?php
      // check photo and select credit width
            if (get_sub_field('photo')) {
                list($width, $height, $type, $attr) = getimagesize(get_sub_field('photo'));
                if ($width == 1200) {
                    $introPhotoWidth = 'photo-credit-width-1200';
                } else {
                    $introPhotoWidth = 'photo-credit-width-1800';
                }
            }

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            } ?>

    <div class="large-12 medium-12 small-12 cell text-center <?php echo $photoStyle; ?>">
            <?php if (have_rows('photos')) { ?>
                <?php $counter = 0; ?>
                <?php while (have_rows('photos')) {
                    the_row(); ?>
          <img src="<?php echo get_sub_field('photo'); ?>" class="img-<?php echo $counter++; ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
                    <?php
                } ?>
            <?php } ?>
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>

    <div class="large-12 medium-12 small-12 cell intro-text text-center">
            <?php if (get_sub_field('headline') == '') { ?>
        <h1><?php echo get_the_title(); ?></h1>
            <?php } else { ?>
        <h1><?php echo get_sub_field('headline'); ?></h1>
            <?php } ?>
            <?php echo get_sub_field('intro_summary'); ?>
    </div>
  </div>
</div>
            <?php generateByline(get_the_ID(), $intro, $publishDate); ?>

            <?php
        } elseif (get_row_layout() == 'text-block') {
            ?>

  <div class="grid-container text-content">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
            <?php echo get_sub_field('content'); ?>
      </div>
    </div>
  </div>

            <?php
        } elseif (get_row_layout() == 'video-embed') {
            ?>

  <div class="grid-container video-content">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
            <?php echo get_sub_field('embed'); ?>
      </div>
    </div>
  </div>


            <?php
        } elseif (get_row_layout() == 'single-photo-block') {
            ?>

    <div class="grid-container photo-content single">
      <div class="grid-x grid-padding-x">

            <?php
              $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row(); ?>
                        <div class="large-12 medium-12 small-12 cell text-center">
                                <img src="<?php echo get_sub_field('photo'); ?>"  />
                    <?php
                    if (get_sub_field('caption') != '') {
                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                  $combinedCaption = '<strong>Left:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                              $combinedCaption .= ' <strong>Center:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                            $combinedCaption .= ' <strong>Right:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        }
                              $captionCounter++;
                    } ?>
                        </div>
                    <?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                } ?>
        <div class="large-12 cell">
                <?php echo '<div class="wp-caption-text"><p>' . $combinedCaption . '</p></div>'; ?>
        </div>
                <?php
            } ?>
      </div>
    </div>


            <?php
        } elseif (get_row_layout() == 'photo-slideshow') {
            ?>

    <div class="grid-container photo-content single">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
            <?php
              $captionCounter = 0;
            if (have_rows('photos')) {
                ?>
          <div id="story-slideshow" class="story-slideshow">
                <?php
                while (have_rows('photos')) {
                    the_row(); ?>
                <div>
                  <img src="<?php echo get_sub_field('photo'); ?>" />
                  <div class="wp-caption-text"><?php echo get_sub_field('caption'); ?></div>
                </div>
                    <?php
                } ?>
          </div>
        </div>
                <?php
            } ?>
      </div>
    </div>


            <?php
        } elseif (get_row_layout() == 'charts-doc') {
            ?>

    <div class="grid-container text-content">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <?php echo get_sub_field('embed-code'); ?>
        </div>
      </div>
    </div>

            <?php
        } elseif (get_row_layout() == '2up-photos-block') {
            ?>

    <div class="grid-container photo-content">
      <div class="grid-x grid-padding-x">

            <?php
              $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row(); ?>
                        <div class="large-6 medium-6 small-6 cell">
                                <img src="<?php echo get_sub_field('photo'); ?>"  />
                    <?php
                    if (get_sub_field('caption') != '') {
                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                  $combinedCaption = '<strong>Left:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                              $combinedCaption .= ' <strong>Right:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        }
                              $captionCounter++;
                    } ?>
                        </div>
                    <?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                } ?>
        <div class="large-12 cell">
                <?php echo '<div class="wp-caption-text"><p>' . $combinedCaption . '</p></div>'; ?>
        </div>
                <?php
            } ?>
      </div>
    </div>

            <?php
        } elseif (get_row_layout() == '3up-photos-block') {
            ?>

  <div class="grid-container photo-content">
    <div class="grid-x grid-padding-x">

            <?php
              $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row(); ?>
                        <div class="large-4 medium-4 small-4 cell">
                                <img src="<?php echo get_sub_field('photo'); ?>"  />
                    <?php
                    if (get_sub_field('caption') != '') {
                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                  $combinedCaption = '<strong>Left:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                              $combinedCaption .= ' <strong>Center:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                            $combinedCaption .= ' <strong>Right:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        }
                              $captionCounter++;
                    } ?>
                        </div>
                    <?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                } ?>
      <div class="large-12 cell">
                <?php echo '<div class="wp-caption-text"><p>' . $combinedCaption . '</p></div>'; ?>
      </div>
                <?php
            } ?>
    </div>
  </div>

            <?php
        } elseif (get_row_layout() == 'large-photo-2-verticals') {
            ?>

    <div class="grid-container large-photo-verticals">
      <div class="grid-x grid-padding-x align-middle">

        <div class="large-4 medium-4 small-12 cell">
            <?php echo get_sub_field('large-photo'); ?>
        </div>

        <div class="large-4 medium-4 small-12 cell">
            <?php
              $captionCounter = 0;
            if (have_rows('vertical-photos')) {
                while (have_rows('vertical-photos')) {
                    the_row(); ?>
              <div class="grid-x grid-padding-x">
                <div class="large-12 medium-12 small-6 cell">
                                <img src="<?php echo get_sub_field('photo'); ?>"  />
                    <?php
                    if (get_sub_field('caption') != '') {
                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                  $combinedCaption = '<strong>Left:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                              $combinedCaption .= ' <strong>Center:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                            $combinedCaption .= ' <strong>Right:</strong> ' . strip_tags(get_sub_field('caption'), '<a>');
                        }
                              $captionCounter++;
                    } ?>
                        </div>
                    <?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                } ?>
          </div>
        </div>
        <div class="large-12 cell">
                <?php echo '<div class="wp-caption-text"><p>' . $combinedCaption . '</p></div>'; ?>
        </div>
                <?php
            } ?>
      </div>
    </div>

            <?php
        }
    }
}
?>

<?php if (get_the_ID() == 144755) { ?>
  <div id="full-section-bg" class="grid-container full">
    <div class="grid-x grid-padding-x white-on-black">
      <div class="large-12 cell">
        <h3 style="color:#fff;">WE 22</h3>
      </div>
      <div class="large-12 medium-12 small-12 cell text-center" style="max-width:45rem;">
        <ul>
          <li>Jean Boyd</li>
          <li>Alonzo Jones</li>
          <li>Javonie Small</li>
          <li>Tyree Owens</li>
          <li>John Ellis</li>
          <li>Dr. Herb Martin</li>
          <li>Antonio Pierce</li>
          <li>Michael Elliott</li>
          <li>Chad Adams</li>
          <li>Marcus Castro-Walker</li>
          <li>Prentice Gill</li>
          <li>Derek Hagan</li>
          <li>Chris Hawkins</li>
          <li>Anthony Garnett</li>
          <li>Dion Miller</li>
          <li>Markus Alleyne</li>
          <li>Kevin Miniefield</li>
          <li>Courtney Skipper</li>
          <li>Rashon Burno</li>
          <li>Denzel Burrell</li>
          <li>Scottie Graham</li>
          <li class="last">Daniel Marshall</li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>



  <div class="grid-container text-content author">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
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

                    $staffDetails = new WP_Query($args);
                    if ($staffDetails->have_posts()) {
                        while ($staffDetails->have_posts()) {
                            $staffDetails->the_post();

                            $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

                            if (get_field('student_photo') != '') {
                                echo '<div class="author_photo post">';
                                if ($staffNameURLSafe == 'staff') {
                                    echo '<img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular staff" alt="' . get_the_title($staffID) . '" />';
                                } else {
                                    echo '<a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/"><img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular" alt="' . get_the_title($staffID) . '" /></a>';
                                }
                                echo '</div>';
                            }

                            echo '<div class="bio post">';

                            if (get_the_title($val) != '') {
                                if ($staffNameURLSafe == 'staff') {
                                    echo '<p class="name">' . get_the_title($val) . '</p>';
                                } else {
                                    echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/">' . get_the_title($val) . '</a></p>';
                                }
                            } else {
                                echo '<p class="name">' . 'No author name found.' . '</p>';
                            }

                            if (get_field('student_title') != '') {
                                echo '<span class="team-title post">' . ucwords(str_replace('-', ' ', get_field('student_title'))) . '</span>';
                            } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                echo '<span class="team-title post">' . ucwords(str_replace('-', ' ', get_field('team'))) . ' ' . ucwords(str_replace('-', ' ', get_field('role'))) . ', ' . str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))) . '</span>';
                            }

                            if (get_field('biography') != '') {
                                echo '<span class="member-bio post">' . get_field('biography') . '</span>';
                            } else {
                            }

                            if (have_rows('social_media_outlets')) {
                                echo '<div class="author_social_links">';
                                while (have_rows('social_media_outlets')) {
                                    the_row();
                                    if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                        if (get_sub_field('social_media_type') == 'twitter') {
                                            ?>
                             <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <?php
                                        } elseif (get_sub_field('social_media_type') == 'email') { ?>
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

                // show broadcast
                if (is_array($broadcastID)) {
                    foreach ($broadcastID as $key => $val) {
                        echo '<div class="author_bio">';
                        $args = array(
                                 'post_type'   => 'students',
                                 'post_status' => 'publish',
                                 'p' => $val
                                );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {
                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular staff" alt="' . get_the_title($staffID) . '" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/"><img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular" alt="' . get_the_title($staffID) . '" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';

                                if (get_the_title($val) != '') {
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<p class="name">' . get_the_title($val) . '</p>';
                                    } else {
                                        echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/">' . get_the_title($val) . '</a></p>';
                                    }
                                } else {
                                    echo '<p class="name">' . 'No author name found.' . '</p>';
                                }

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title">' . ucwords(str_replace('-', ' ', get_field('student_title'))) . '</span>';
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title">' . ucwords(str_replace('-', ' ', get_field('team'))) . ' ' . ucwords(str_replace('-', ' ', get_field('role'))) . ', ' . str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))) . '</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">' . get_field('biography') . '</span>';
                                } else {
                                }

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                  <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <?php
                                            } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                  <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
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


                // show photogs
                if (is_array($photogID)) {
                    foreach ($photogID as $key => $val) {
                        echo '<div class="author_bio">';
                        $args = array(
                                 'post_type'   => 'students',
                                 'post_status' => 'publish',
                                 'p' => $val
                                );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {
                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular staff" alt="' . get_the_title($staffID) . '" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/"><img src="' . get_field('student_photo') . '" class="cn-staff-bio-circular" alt="' . get_the_title($staffID) . '" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';

                                if (get_the_title($val) != '') {
                                    echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/">' . get_the_title($val) . '</a></p>';
                                } else {
                                    echo '<p class="name">' . 'No author name found.' . '</p>';
                                }

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title">' . ucwords(str_replace('-', ' ', get_field('student_title'))) . '</span>';
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title">' . ucwords(str_replace('-', ' ', get_field('team'))) . ' ' . ucwords(str_replace('-', ' ', get_field('role'))) . ', ' . str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))) . '</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">' . get_field('biography') . '</span>';
                                } else {
                                }

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                  <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <?php
                                            } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                  <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
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
        }
          wp_reset_query();
        ?>
    </div>
  </div>
</div>

<div class="grid-container text-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <!-- Comments section -->
      <div class="comment-form-wrapper">
        <h2>Leave a Comment</h2>
        <?php echo do_shortcode('[fbcomments]'); ?>
        <div id="response"></div>
      </div>
    </div>
  </div>
</div>



<?php get_footer('new2020'); ?>
