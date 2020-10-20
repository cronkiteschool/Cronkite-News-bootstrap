    <?php
      //echo $_SERVER[REQUEST_URI];
      $search_staff_name = get_query_var('staffname');
      $normal_staff_name = ucwords(str_replace('-', ' ', $search_staff_name));
    ?>

    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">

        <div class="large-12 medium-12 small-12 cell story-content">
          <!-- author biography -->
          <?php

            echo '<div class="author_bio">';

            $args = array(
             	'name'           => '"'.$search_staff_name.'"',
             	'post_type'      => 'students',
             	'post_status'    => 'publish',
             	'posts_per_page' => 1
             );

            $staffProID = get_posts( $args );
            //$staffProID[0]->ID;

            $staffDetails = new WP_Query( $args );
            if ($staffDetails->have_posts()) {

             while ($staffDetails->have_posts()) {
               $staffDetails->the_post();

               if (get_field('student_photo') != '') {
                 echo '<div class="author_photo">';
                 echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular-large" alt="'.get_the_title($staffID).'" />';
                 echo '</div>';
               }

               echo '<div class="bio">';

               if (get_the_title($val) != '') {
                 echo '<p class="name-lg">'.get_the_title($val).'</p>';
               } else {
                 echo '<p class="name-lg">'.'No author name found.'.'</p>';
               }

               if (get_field('student_title') != '') {
                 echo '<span class="team-title-lg">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
               } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                 echo '<span class="team-title-lg">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
               }

               if (get_field('biography') != '') {
                 echo get_field('biography');
               } else {

               }

               if( have_rows('social_media_outlets') ) {
                 echo '<div class="author_social_links_lg">';
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
            wp_reset_query();
          ?>
        </div>

        <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell">
              <h6>Latest from <?php echo $normal_staff_name; ?></h6>
            </div>
          </div>

          <?php
            //echo $staffProID[0]->ID;
            $args = array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'suppress_filters' => FALSE,
              'posts_per_page' => -1,
              'meta_query'	=> array(
                'relation' => 'OR',
            		array(
            			'key'		=> 'byline_info_cn_staff',
            			'compare'	=> 'LIKE',
            			'value'		=> '"'.$staffProID[0]->ID.'"'
            		),
                array(
                  'key'		=> 'byline_info_cn_photographers',
                  'compare'	=> 'LIKE',
                  'value'		=> '"'.$staffProID[0]->ID.'"'
                ),
                array(
                  'key'		=> 'byline_info_cn_broadcast_reporters',
                  'compare'	=> 'LIKE',
                  'value'		=> '"'.$staffProID[0]->ID.'"'
                )
            	)
             );

            $staffStories = new WP_Query( $args );

            if ( $staffStories->have_posts() ) {
              while ( $staffStories->have_posts() ) {
                $staffStories->the_post();
          ?>
                <div class="grid-x grid-margin-x story-results-stack">
                  <div class="large-8 medium-8 small-8 cell">
                    <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                    <p><?php echo get_field('story_tease'); ?></p>
                    <div class="pub_date">
                      <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                    </div>
                  </div>
                  <div class="large-4 medium-4 small-4 cell">
                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID()); ?></a>
                  </div>
                  <div class="large-12 medium-12 small-12 cell">
                    <hr />
                  </div>
                </div>
          <?
              }
            } else {
          ?>
              <div class="grid-x grid-padding-x">
                <div class="large-12 medium-12 small-12 cell">
                  <p>No stories found for this reporter.</p>
                </div>
              </div>
          <?php
            }
            wp_reset_query();
          ?>

        </div>

        <div class="large-4 medium-12 small-12 cell sidebar">

            <?php dynamic_sidebar('Sidebar Author - 2020'); ?>



        </div>
      </div>
    </div>
