<?php
/**
 * Template Name: Longform hero image slim
 * Story template without sidebar
 */
get_header( 'longformhero' ); ?>

<script src="<?php bloginfo('template_directory');?>/js/jquery.waypoints.min.js"></script>
    <main>
        <section id="blog-post">
            <div class="container-fluid" style="padding:0px;">
                <div class="row" style="margin-right: auto; margin-left: auto;">
                    <div class="col-md-12" style="padding:0px;">

                            <div class="clearfix">

                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?><!-- BEGIN of POST-->
                                            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="border:none;">




                                    <?php if(get_field('autoplay_bg_video')) { ?>
                                    <div class="desktop-only">
                            <video autoplay muted loop style="z-index:-1;width:2000px; overflow-x:hidden; height:auto;">
                                <source src="<?php the_field('autoplay_bg_video'); ?>" type="video/mp4">

                                    </video>

                                   </div>

                            <div class="small-devices-only">
                                <div id="top-img-holder">
                                    <?php if( have_rows('top_full_image') ): ?>
                                        <?php while( have_rows('top_full_image') ): the_row();
                                            // Declare variables below
                                            $icon = get_sub_field('fimage');
                                            $text = get_sub_field('fcaption');  // Use variables below ?>
                                                <img class="img-responsive" style="width:100%;height:100%;" src="<?php echo $icon; ?>" />
                                        <?php if($imgheadline = get_field('headline_over_image')) {?>
                                        <h1 class="animated fadeIn desktop-only" id="headline_over_image" style="color:<?php the_field('color_of_headline_over_image');?>;font-size:<?php the_field('headline_over_image_font_size');?>;<?php the_field('additional_headline_over_image_styling');?>"> <?php the_field('headline_over_image'); ?> </h1>
                                        <?php } ?>
                                        <div class="carousel-captions" style="padding-left:20px; padding-right:20px;"> <!--         captions -->
                                                 <?php echo $text; ?>
                                            	</div>
												</div>
<?php endwhile; ?>
                                    <?php endif; wp_reset_query(); ?>

                                      </div>
                 <?php } else { ?>


								<div id="top-img-holder">
                                    <?php if( have_rows('top_full_image') ): ?>
                                        <?php while( have_rows('top_full_image') ): the_row();
                                            // Declare variables below
                                            $icon = get_sub_field('fimage');
                                            $text = get_sub_field('fcaption');  // Use variables below ?>
                                                <img class="img-responsive" style="width:100%;height:100%;" src="<?php echo $icon; ?>" />
                                        <?php if($imgheadline = get_field('headline_over_image')) {?>
                                        <h1 class="animated fadeIn desktop-only" id="headline_over_image" style="color:<?php the_field('color_of_headline_over_image');?>;font-size:<?php the_field('headline_over_image_font_size');?>;<?php the_field('additional_headline_over_image_styling');?>"> <?php the_field('headline_over_image'); ?> </h1>
                                        <?php } ?>
                                        <div class="carousel-captions"  style="padding: 0px 20px; padding-bottom:10px;"> <!--         captions -->
                                                 <?php echo $text; ?>

                                            	</div>
												</div>
<?php endwhile; ?>
                                    <?php endif; wp_reset_query(); ?>

                                  <?php } ?>



                                <div class="col-xs-12 col-md-offset-3 col-md-6">

                                      <h1 id="main-headline"><?php the_title(); ?></h1>

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
                                        $cnStaffTotalCounter = 0;
                                        $externalStaffTotalCounter = 0;

                                        if (have_rows('byline_info', get_the_ID())) {
                                          while (have_rows('byline_info', get_the_ID())) {
                                            the_row();
                                            $staffID = get_sub_field('cn_staff');
                                            if ($staffID == '') {
                                              $cnStaffTotalCounter = 0;
                                            } else {
                                              $cnStaffTotalCounter = count($staffID);
                                            }

                                            if (have_rows('external_authors_repeater')) {
                                              while (have_rows('external_authors_repeater')) {
                                                the_row();
                                                $externalStaffTotalCounter++;
                                              }
                                            }
                                          }
                                        }



                                        echo '<!--'.get_the_ID().' '.$externalStaffTotalCounter.'-->';

                                        if ($cnStaffTotalCounter > 0) {
                                          if (have_rows('byline_info')) {
                                            $sepCounter = 0;
                                            echo '<h6 class="story-info">By ';
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
                                                    echo '<a href="'.site_url().'?s='.get_the_title($val).'">'.get_the_title($val).'</a>';
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
                                            }
                                            echo '/Cronkite News</span>';
                                          }
                                        } else if ($externalStaffTotalCounter > 0) {

                                          if (have_rows('byline_info')) {
                                            $sepCounter = 0;
                                            if (get_the_ID() == 144447) {
                                              echo '<h6 class="story-info">Story and photos by ';
                                            } else {
                                              echo '<h6 class="story-info">By ';
                                            }
                                            while (have_rows('byline_info')) {
                                              the_row();
                                              if ( have_rows( 'external_authors_repeater' ) ) {
                                                if ($cnStaffTotalCounter > 0) {
                                                  echo ' and ';
                                                }
                                                $sepCounter = 0;
                                                while ( have_rows( 'external_authors_repeater' ) ) {
                                                  the_row();
                                                  $sepCounter++;
                                                  echo '<!--'.$sepCounter.'-->';
                                                  echo get_sub_field( 'external_authors' );

                                                  if ($sepCounter != $externalStaffTotalCounter) {
                                                    if ($sepCounter == ($externalStaffTotalCounter - 1)) {
                                                      echo $andSeparator.' ';
                                                    } else {
                                                      echo $commaSeparator.' ';
                                                    }
                                                  }

                                                  if (get_sub_field('author_title_site') != '' || get_sub_field('author_title_site') != 'other') {
                                                    if (array_key_exists(get_sub_field('author_title_site'), $externalSites) == true) {
                                                      echo '/<a href="'.$externalSites[get_sub_field('author_title_site')].'" target="_blank">'.ucwords(str_replace('-', ' ', get_sub_field('author_title_site'))).'</a>';
                                                    } else {
                                                      echo '/'.ucwords(str_replace('-', ' ', get_sub_field('author_title_site')));
                                                    }
                                                  }
                                                }
                                              }
                                            }
                                          }

                                        } else {
                                    ?>
                                        <h6 class="story-info"><?php if($postAuthor = get_field('post_author')) {?>
                                        <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                        By <?php echo $postAuthor; ?>/<?php } ?></a><?php if( $siteTitle = get_field('site_title')) {
                                             $url = get_field('site_url');
                                             $url = esc_url( $url ); ?><a href="<?php echo $url; ?>"><?php echo $siteTitle; ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                      <?php wp_reset_query(); ?>
                                      | <span class="bylinedate"><?php echo ap_date(); ?></span></h6>
                                      <?php wp_reset_query(); ?>
                                      <?php if (get_field('updated_date_and_time') != '') { ?>
                                      <h6 class="story-info" style="padding:0;margin-top:-10px;"><span class="bylinedate">Last Updated: <?php echo get_field('updated_date_and_time'); ?></span></h6>
                                      <?php } ?>


                                                <?php the_content(); ?>

                                                <!-- Cronkite News - story tags -->
                                                <?php
                                                  if (get_the_ID() != 142379) {
                                                    if (get_field('st_html')['tags'] != '' && get_field('st_html')['tags'] != 0) {
                                                      $args = array(
                                                                    'post_type'   => 'storytags',
                                                                    'post_status' => 'publish',
                                                                    'p' => get_field('st_html')['tags'],
                                                                    'posts_per_page' => 1
                                                                   );

                                                      $storyTag = new WP_Query( $args );
                                                      if( $storyTag->have_posts() ) {

                                                        while( $storyTag->have_posts() ) {
                                                          $storyTag->the_post();

                                                          if (get_field('story_html_tag') != '') {
                                                            echo get_field('story_html_tag');
                                                          }
                                                        }
                                                      }
                                                    }
                                                  }
                                                ?>

                                            </article>
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                                </div>

                            </div>

                         <!-- END of .row-->
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-1">
                            <div class="comment-form-wrapper">
                                <h2>Leave a Comment</h2>

					<?php echo do_shortcode('[fbcomments]'); ?>

                                <div id="response"></div>
                            </div>
                            <!-- /.comment-form-wrapper -->
                            </div>
                        <!-- END of .row-->
                        </div>
                    </div>

                    <!-- END of .container-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
    </main>

<?php get_footer(); ?>
