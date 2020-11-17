    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing category">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">

        <div class="large-12 medium-12 small-12 cell story-content">
          <h1 class="main-title-hdr"><?php single_cat_title( '', true );  ?></h1>
        </div>

        <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
          <?php
            $paged = get_query_var('paged');

            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();
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

          <?php
              }
            } else {
          ?>

          <?php
            }
          ?>
            <div class="grid-x grid-margin-x story-results-stack">
              <div class="large-12 medium-12 small-12 cell">
                <?php bootstrap_pagination(); ?>
              </div>
            </div>
          <?php
            wp_reset_query();
          ?>

        </div>

        <div class="large-4 medium-12 small-12 cell sidebar">
            <?php dynamic_sidebar('Sidebar Author - 2020'); ?>
        </div>
      </div>
    </div>
