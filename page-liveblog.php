<?php

/*
  Template Name: Live Blog
*/

get_header('new2019'); ?>

    <!-- main body container -->
    <div id="hdr-bg-title" class="grid-container full">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell text-center">
          <h1>Bernie Sanders in Phoenix</h1>
          <h4>Live Analysis</h4>
        </div>
      </div>
    </div>

    <!-- main body container -->
    <div id="main_container" class="grid-container liveblog">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-12 medium-12 small-12 cell story-content">

          <?php
            $args = array(
              'post_type' => 'post',
              'category__not_in' => 11
            );

            // Custom query.
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo get_the_ID(); ?>
                <article>
                  <div class="pub_date">
                    <time datetime="2015-05-16 19:00"><wbr>Jan. 7, 2020</wbr> &ndash; <strong>4:29 p.m. MT</strong></time>
                    <span>Copy Link <i class="fas fa-plus-square"></i></span>
                  </div>
                  <h3 class="single-story-hdr"><?php echo get_the_title(get_the_ID()); ?></h3>

                  <!-- story photo/video/slideshow -->
                  <div id="story-photo" class="story-photos">
                    <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2019/01/LakeMead-800.jpg" width="800" alt="" title="" />
                    <div class="asset-caption">The Metropolitan Water District of Southern California, which has already signed a drought contingency plan, started to withdraw its allocation of water from Lake Mead in January, and is storing the water in Southern California reservoirs. Hoover Dam, as seen from the Mike O’Callaghan-Pat Tillman Memorial Bridge, forms Lake Mead, the largest reservoir in the nation. (Photo by Jordan Evans/Cronkite News)</div>
                  </div>

                  <?php the_content(); ?>

                  <!-- byline and date -->
                  <div class="byline">
                    <span class="author_name">&mdash; <a href="#">Dylan Simard</a>, Cronkite News</span>
                  </div>
                </article>
          <?php
                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();
          ?>

        </div>

      </div>
    </div>

<?php get_footer('new2020'); ?>
