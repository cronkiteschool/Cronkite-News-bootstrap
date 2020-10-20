<?php
/**
 * Template Name: Longform hero image slim top
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
                                    <?php endif; wp_reset_query(); ?>‘’

                                      </div>
                 <?php } else { ?>


								<div id="top-img-holder" class="col-xs-12 col-md-offset-2 col-md-8">

                                  <h1 style="font-family: 'Libre Baskerville', serif;color:#111;font-size:calc(16.4px + 2.5vw);margin-top:calc(16.4px + 5vw);text-align:center;"><?php the_field('lf_custom_title');?></h1>
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
                                            echo '<h6 class="story-info">By ';
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

                                <?php
                                  if (get_the_ID() == 132417) {
                                ?>

                                    <style>
                                    /* Popup box BEGIN */
                                    .hover_bkgr_fricc1, .hover_bkgr_fricc2, .hover_bkgr_fricc3, .hover_bkgr_fricc4, .hover_bkgr_fricc5, .hover_bkgr_fricc6,
                                    .hover_bkgr_fricc7, .hover_bkgr_fricc8 {
                                        background:rgba(0,0,0,.7);
                                        cursor:pointer;
                                        display:none;
                                        height:100%;
                                        position:fixed;
                                        text-align:center;
                                        top:0;
                                        left:0;
                                        width:100%;
                                        z-index:10000;
                                    }
                                    .hover_bkgr_fricc1 .helper, .hover_bkgr_fricc2 .helper, .hover_bkgr_fricc3 .helper, .hover_bkgr_fricc4 .helper,
                                    .hover_bkgr_fricc5 .helper, .hover_bkgr_fricc6 .helper, .hover_bkgr_fricc7 .helper, .hover_bkgr_fricc8 .helper {
                                        display:inline-block;
                                        height:100%;
                                        vertical-align:middle;
                                    }
                                    .hover_bkgr_fricc1 > div, .hover_bkgr_fricc2 > div, .hover_bkgr_fricc3 > div, .hover_bkgr_fricc4 > div,
                                    .hover_bkgr_fricc5 > div, .hover_bkgr_fricc6 > div, .hover_bkgr_fricc7 > div, .hover_bkgr_fricc8 > div {
                                        background-color: #fff;
                                        box-shadow: 10px 10px 60px #555;
                                        display: inline-block;
                                        height: auto;
                                        max-width: 551px;
                                        min-height: 100px;
                                        vertical-align: middle;
                                        width: 60%;
                                        position: relative;
                                        border-radius: 8px;
                                        padding: 15px 5%;
                                    }
                                    .popupCloseButton {
                                        background-color: #fff;
                                        border: 3px solid #999;
                                        border-radius: 50px;
                                        cursor: pointer;
                                        display: inline-block;
                                        font-weight: bold;
                                        position: absolute;
                                        top: -20px;
                                        right: -20px;
                                        font-size: 25px;
                                        line-height: 24px;
                                        width: 30px;
                                        height: 30px;
                                        text-align: center;
                                    }
                                    .popupCloseButton:hover {
                                        background-color: #ccc;
                                    }
                                    .trigger_popup_fricc1, .trigger_popup_fricc2, .trigger_popup_fricc3, .trigger_popup_fricc4, .trigger_popup_fricc5,
                                    .trigger_popup_fricc6, .trigger_popup_fricc7, .trigger_popup_fricc8 {
                                        cursor: pointer;
                                        font-size: 20px;
                                        display: inline-block;
                                        font-weight: bold;
                                    }
                                    /* Popup box BEGIN */
                                      .fa-external-link-square-alt {
                                        color: dark blue;
                                        font-size: 80%;
                                        padding-right: 0;
                                    }
                                      .modal a.close-modal {
                                        top:-2px;
                                        right:-3px;
                                    }
                                      p {
                                       font-size: 20px;
                                       margin-top: -5px;
                                    }
                                      a {
                                       transition: 0.5s;
                                    }
                                    </style>
                                    <script
                                      src="https://code.jquery.com/jquery-3.4.1.min.js"
                                      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                                      crossorigin="anonymous"></script>
                                    <script>
                                    $(window).on('load', function() {
                                        $(".trigger_popup_fricc1").click(function(){
                                           $('.hover_bkgr_fricc1').show();
                                        });
                                        $(".trigger_popup_fricc2").click(function(){
                                           $('.hover_bkgr_fricc2').show();
                                        });
                                        $(".trigger_popup_fricc3").click(function(){
                                           $('.hover_bkgr_fricc3').show();
                                        });
                                        $(".trigger_popup_fricc4").click(function(){
                                           $('.hover_bkgr_fricc4').show();
                                        });
                                        $(".trigger_popup_fricc5").click(function(){
                                           $('.hover_bkgr_fricc5').show();
                                        });
                                        $(".trigger_popup_fricc6").click(function(){
                                           $('.hover_bkgr_fricc6').show();
                                        });
                                        $(".trigger_popup_fricc7").click(function(){
                                           $('.hover_bkgr_fricc7').show();
                                        });
                                        $(".trigger_popup_fricc8").click(function(){
                                           $('.hover_bkgr_fricc8').show();
                                        });
                                        $('.hover_bkgr_fricc1, .hover_bkgr_fricc2, .hover_bkgr_fricc3, .hover_bkgr_fricc4, .hover_bkgr_fricc5, .hover_bkgr_fricc6, .hover_bkgr_fricc7, .hover_bkgr_fricc8').click(function(){
                                            $('.hover_bkgr_fricc').hide();
                                        });
                                        $('.popupCloseButton').click(function(){
                                            $('.hover_bkgr_fricc1, .hover_bkgr_fricc2, .hover_bkgr_fricc3, .hover_bkgr_fricc4, .hover_bkgr_fricc5, .hover_bkgr_fricc6, .hover_bkgr_fricc7, .hover_bkgr_fricc8').hide();
                                        });
                                    });
                                    </script>

                                    <div class="hover_bkgr_fricc1">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">During the Holocaust, other groups like Roma, also known as Gypsies, Germans with disabilities and homosexuals were targeted and killed by the Nazis, according to the U.S. Holocaust Memorial Museum. </p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc2">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">Over the years, the state expanded its curriculum to include 9/11, the Darfur War, the Ukrainian famine, Armenian and Native American genocides, according to New Jersey’s Department of Education. </p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc3">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">Students read “Night,” writer Elie Wiesel’s memoir of his experience as a teenager in a Nazi concentration camp.</p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc4">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">The Holocaust began with stripping away rights such as excluding Jews from civil service positions, the burning of non-German books on university campuses and limiting the number of Jewish students in schools.</p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc5">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;"><a href="https://encyclopedia.ushmm.org/content/en/article/nuremberg-laws" rel="noopener" target="_blank">Nuremberg Laws</a>, established in 1935, revoked citizenship for Jews and prohibited them from marrying or having sexual relations with Germans. The laws were inspired by Jim Crow laws that enforced racial segregation in the South, according to the University of Southern California.</p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc6">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">The number of anti-Semitic incidents in the U.S. grew more than 50% from 2009 to 2018, according to the <a href="https://www.adl.org/audit2018" rel="noopener" target="_blank">Anti-Defamation League</a>. In Arizona, there were 32 reported incidents in 2018.</p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc7">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">Social media platforms like <a href="https://www.businessinsider.com/tiktok-ban-holocaust-denial-conspiracy-theories-2020-1" rel="noopener" target="_blank">TikTok</a> and <a href="https://www.vox.com/recode/2019/6/5/18653666/youtube-bans-white-supremacists-holocaust-carlos-maza" rel="noopener" target="_blank">YouTube</a> have banned Holocaust denials and conspiracy theorists. However, Facebook has not removed posts or pages that deny the Holocaust happened.</p>
                                      </div>
                                    </div>

                                    <div class="hover_bkgr_fricc8">
                                      <span class="helper"></span>
                                      <div>
                                        <div class="popupCloseButton">&times;</div>
                                        <p style="text-align:left;">The last major German offensive campaign in World War II against the western front, according to the U.S. Holocaust Memorial Museum.</p>
                                      </div>
                                    </div>


                                <?php
                                    the_content();
                                ?>
                                <script
                                  src="https://cronkitenews.azpbs.org/wp-content/themes/bootstrap/js/jquery-3.2.1.min.js"
                                  crossorigin="anonymous"></script>
                                <?php

                                  } else {

                                    the_content();
                                  }
                                  ?>

                                            </article>
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>
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
