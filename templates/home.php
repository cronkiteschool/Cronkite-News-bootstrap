<?php
/*
 * Template Name: Home Page
 */
get_header('new'); ?>

<?php if (get_field('alternate_layout') == 'Yes'): ?>

  <section style="background-color:#FFF;">
      <?php if (get_field('breaking_headline')) : ?>

   <a href="https://cronkitenews.azpbs.org/2018/08/25/sen-john-mccain-dies-one-year-after-brain-cancer-diagnosis-leaves-political-leadership-legacy/"> <h1 class="breaking-headline" style=" text-align:center;background-color:#FFF;margin-bottom:0px; border:none;font-size: 72px;color: #333;
    padding-bottom: 20px;"><?php the_field('breaking_headline'); ?></h1> </a>

      <?php endif; ?>
  </section>
  <section id="hero" style="background-color:#FFF;">

    <?php
      $home_main_storyID = get_field('home_main_story', 24);
      if ($home_main_storyID) {
          // override $post
          $post = $home_main_storyID;
          setup_postdata($post); ?>
      <div class="container">
      <div class="row">
      <div class="col-xs-12 col-md-8" style="padding:0;">
        <?php if (get_field('main_custom_photo', 24) == '') { ?>
        <div class="item" style="background: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($home_main_storyID)); ?>) center top no-repeat; background-size: cover;">
        <?php } else { ?>
        <div class="item" style="background: url(<?php echo get_field('main_custom_photo', 24); ?>) center top no-repeat; background-size: cover;">
        <?php } ?>

          <div class="tinter" style="height: 501px;">
            <div class="hero-caption animated fadeIn">
                <h1 class="animate fadeInDown light-color" style="margin-left: 0px;">
                  <?php if (get_field('use_short_headline', $home_main_storyID) == 'yes' && get_field('homepage_headline', $home_main_storyID) != '') { ?>
                    <a href="<?php echo get_permalink($home_main_storyID); ?>"><?php echo get_field('homepage_headline', $home_main_storyID); ?></a>
                  <?php } else { ?>
                    <a href="<?php echo get_permalink($home_main_storyID); ?>"><?php echo get_the_title($home_main_storyID); ?></a>
                  <?php } ?>
                </h1>
            </div>
            <!-- /.caption -->
          </div>
          <!-- /.item -->
        </div>
        <!-- tinter -->

          </div>
     <?php
      } ?>
          <!-- END of Post -->
        <?php  wp_reset_query(); ?>

    <div class="col-xs-12 col-md-4" style="padding:0; min-height:501px; background-color:#234384;">
<!--        <h4 style="color:white; text-align:center;font-weight: bold; padding-top:10px; margin-bottom: 0px;"> Latest stories </h4>-->

        <div class="row">

               <div class="col-xs-12">

                   <style>
                     .home-list {
                       color: #fff;
                       margin-top:10px;
                       margin-left: 25px;
                       margin-right: 25px;
                     }
                     .home-list li {
                       border-bottom: 1px solid #295dc5;
                       padding-top:10px;
                       padding-bottom:10px;
                     }
                     .home-list li:last-child {
                       padding-top:10px;
                       padding-bottom:10px;
                       border-bottom: none;
                     }
                     .home-list li a {
                       font-size:1rem;
                     }
                     .home-list li a:hover {
                       color: #fff;
                       text-decoration: underline;
                     }
                     .home-list li a img {
                       visibility: unset !important;
                     }
                   </style>

                   <ul class="home-list">

                     <?php
                        $top_side_stories = get_field('top_side_stories');
                        if ($top_side_stories) {
                            ?>
                        <?php
                            foreach ($top_side_stories as $post) {
                                // Setup this post for WP functions (variable must be named $post).
                              setup_postdata($post); ?>
                            <li>
                              <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                              </a>
                            </li>
                        <?php
                            } ?>
                      <?php
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                      <?php
                        } ?>

                   </ul>
            </div>

        </div>
    </div>

    </div>

      </div>



            <!-- /.owl-carousel -->

  </section>
<?php else: ?>

<!--
    <h1 class="breaking-headline" style=" text-align:center;background-color:#FFF;margin-bottom:0px; border:none;font-size: 72px;color: #333;
    padding-bottom: 20px;"> John McCain dead at 81</h1>
-->

<section id="hero" style="background-color:#FFF;">

    <?php
      $home_main_storyID = get_field('home_main_story', 24);
      if ($home_main_storyID) {
          // override $post
          $post = $home_main_storyID;
          setup_postdata($post); ?>
    <!-- BEGIN of Post -->
    <div class="container">
      <div class="row">
      <div class="col-xs-12 col-md-8" style="padding:0;">

          <?php if (get_field('main_custom_photo', 24) == '') { ?>
          <div class="item" style="background: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($home_main_storyID)); ?>) center top no-repeat; background-size: cover;">
          <?php } else { ?>
          <div class="item" style="background: url(<?php echo get_field('main_custom_photo', 24); ?>) center top no-repeat; background-size: cover;">
          <?php } ?>
          <div class="tinter" style="height: 501px;">
            <div class="hero-caption animated fadeIn">
                <h1 class="animate fadeInDown light-color" style="margin-left: 0px;">
                  <?php if (get_field('use_short_headline', $home_main_storyID) == 'yes' && get_field('homepage_headline', $home_main_storyID) != '') { ?>
                    <a href="<?php echo get_permalink($home_main_storyID); ?>"><?php echo get_field('homepage_headline', $home_main_storyID); ?></a>
                  <?php } else { ?>
                    <a href="<?php echo get_permalink($home_main_storyID); ?>"><?php echo get_the_title($home_main_storyID); ?></a>
                  <?php } ?>
                </h1>
            </div>
            <!-- /.caption -->
          </div>
          <!-- /.item -->
        </div>
        <!-- tinter -->

    </div>

    <?php
      } wp_reset_query(); ?>




     <?php
   function feature_aside($item)
   {
       $postid = $item -> ID;
       $permalink = get_the_permalink($postid);
       $url_link = get_field("url_link", $item);

       $output = '';

       echo '<a href="' . $permalink  . ' ">' ;
       echo ' <div class="image-cont-1" style="position:relative; left:1px;">';
       echo  get_the_post_thumbnail($postid, 'large', array('class' => 'img-responsive home-aside'));
       if (get_field('use_short_headline', $postid) == 'yes' && get_field('homepage_headline', $postid) != '') {
           echo '<h4>' . get_field('homepage_headline', $postid).'</h4>';
       } else {
           echo '<h4>' . get_the_title($postid) .'</h4>';
       }
       echo '</div></a>';
   }

  if (have_rows('slider_aside_box')): // check for repeater fields
    while (have_rows('slider_aside_box')) : the_row(); // loop through the repeater fields
    $asposts = get_sub_field('aside_post_box'); // all the latest news is now loaded in $posts
    endwhile;
  endif;

?>



      <div class="col-xs-12 col-md-4" style="padding:0;">
          <?php if (get_field('custom_slide_aside_title1', 24) != '') { ?>
          <div style="border-bottom:1px solid white;">
            <?php
              echo '<a href="' . get_field('custom_slide_aside_link1', 24)  . ' ">' ;
              echo ' <div class="image-cont-1" style="position:relative; left:1px;">';
              echo '<img src="'.get_field('custom_slide_aside_photo1', 24).'" class="img-responsive home-aside" />';
              echo '<h4>' . get_field('custom_slide_aside_title1', 24) .'</h4>';
              echo '</div></a>';
            ?>
          </div>
        <?php } else { ?>
          <div style="border-bottom:1px solid white;">
            <?php feature_aside($asposts[0]); ?>
          </div>
        <?php } ?>


          <?php if (get_field('custom_slide_aside_title2', 24) != '') { ?>
            <?php
              echo '<a href="' . get_field('custom_slide_aside_link2', 24)  . ' ">' ;
              echo ' <div class="image-cont-1" style="position:relative; left:1px;">';
              echo '<img src="'.get_field('custom_slide_aside_photo2', 24).'" class="img-responsive home-aside" />';
              echo '<h4>' . get_field('custom_slide_aside_title2', 24) .'</h4>';
              echo '</div></a>';
            ?>
          <?php } else { ?>
            <?php if (get_field('custom_slide_aside_title1', 24) != '' && get_field('custom_slide_aside_title2', 24) == '') { ?>
              <?php feature_aside($asposts[0]); ?>
            <?php } elseif (get_field('custom_slide_aside_title1', 24) == '' && get_field('custom_slide_aside_title2', 24) != '') {  ?>
              <?php feature_aside($asposts[0]); ?>
            <?php } else { ?>
              <?php feature_aside($asposts[1]); ?>
            <?php } ?>
          <?php } ?>
      </div>

    </div>

 </div>



    </section>

    <?php endif; wp_reset_query(); ?>


  <!-- START Verticals Section  -->

  <section id="latest-works" style="background-color:#19346a;">
    <div class="container inner">
      <div class="row">

        <!-- Latest newscast -->


        <?php
          $vvid = get_field('v_video_or_newscast');
          if ($vvid == 'Newscast') { ?>

        <?php global $post;?>

          <?php $arg = array(
                  'post_type'	    => 'post',
                  'order'		    => 'DESC',
                  'orderby'	    => 'date',
                  'posts_per_page'    => 1,
                  'category_name' =>  'newscast'
              );
              $the_query = new WP_Query($arg);
              if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php endwhile;?>

                <div class="col-xs-12 col-sm-4" style=" filter:drop-shadow(2px 2px 3px black);">

                    <div class="paper" style="position:relative;">
                       <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 62.25%;">
                      <?php
                        $vid = get_field('video_file', false, false);
                        //echo 'vid:' . $vid;
                        echo '<iframe class="embed-responsive-item" src="';
                        echo $vid . '" frameborder="0" allowfullscreen></iframe>';
                        ?>
                                              </div>

                            <h3 class="art-h3" style="position: absolute;left: 0; top: 0px;color: white; padding: 5px;font-size: 14px; background-color:#5671c1 ;margin-bottom: 0;">   <a href="https://cronkitenews.azpbs.org" style="font-size:16px;">  NEWSCAST </a> </h3>

                             <?php
                                $desc = get_the_content();
                             $frontdescription = rtrim($desc, '.'); ?>
                        <a href="<?php the_permalink(); ?>">  <h3 class="art-h2" style="padding-top: 30px;"> <p style="font-size:20px;"> <?php echo $frontdescription; ?> </p></h3></a>

                    </div>
                </div>
                    <?php endif; wp_reset_query(); ?>

          <?php } else { ?>

           <div class="col-xs-12 col-sm-4" style=" filter:drop-shadow(2px 2px 3px black);">

                    <div class="paper"  style="position:relative;">
                       <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 62.25%;">
                      <?php
                        $vid = get_field('v_video_embed_url', false, false);
                        //echo 'vid:' . $vid;
                        echo '<iframe class="embed-responsive-item" src="';
                        echo $vid . '" frameborder="0" allowfullscreen></iframe>';
                        ?>
                                              </div>
                       <h3 class="art-h3" style="position: absolute;left: 0; top: 0px;color: white; padding: 5px;font-size: 14px; background-color:#5671c1 ;margin-bottom: 0;"> <?php the_field('v_video_label'); ?> </h3>

                        <a href="<?php the_field('v_video_link'); ?>" rel="noopener">
<!--                            <h3 class="art-h2" style="font-size:18px;font-family: 'Source Sans Pro', sans-serif;"> <?php the_field('v_video_description'); ?> </h3>  -->

                        <h3 class="art-h2" style="padding-top: 30px;"> <p style="font-size:20px;"><?php the_field('v_video_description'); ?> </p></h3></a>

                    </div>
                </div>



          <?php } ?>

                <!--end of .col-->

                <?php if (have_rows('area_works_box')): ?>
                  <?php while (have_rows('area_works_box')): the_row();
                        // Declare variables below
                        $icon = get_sub_field('area_works_image');
                        $postID = get_sub_field('area_works_link');
                        $customLinks = get_sub_field('custom_link');
                        $customTitle = get_sub_field('story_homepage_title');

                        // Use variables below?>
                     <div class="col-xs-12 col-sm-4"  style="filter:drop-shadow(2px 2px 3px black);">
                     <div class="paper">

                          <?php if ($customLinks != '') { ?>
                            <a target="_blank" href="<?php echo $customLinks; ?>">
                          <?php } else { ?>
                            <a href="<?php echo get_permalink($postID); ?>" >
                          <?php } ?>

                          <?php if ($icon != '') { ?>
                            <img class="awards_image" src="<?php echo $icon['sizes']['awards_logo']; ?>" />
                          <?php } else { ?>
                            <?php echo preg_replace('/(height)=\"\d*\"\s/', "", get_the_post_thumbnail($postID, array( 486, 304), array( 'class' => 'awards_image' ))); ?>
                          <?php } ?>
                            </a>


                          <h3 class="art-h2" style="padding-top:30px;">
                            <?php if ($customTitle != '') { ?>
                              <?php if ($customLinks != '') { ?>
                                <a href="<?php echo $customLinks; ?>" ><div class="pcont"> <?php echo $customTitle; ?> </div> </a>
                              <?php } else { ?>
                                <a href="<?php echo get_permalink($postID); ?>" ><div class="pcont"> <?php echo $customTitle; ?> </div> </a>
                              <?php } ?>
                            <?php } else { ?>

                              <?php if (get_field('use_short_headline', $postid) == 'yes' && get_field('homepage_headline', $postid) != '') { ?>
                                <a href="<?php echo get_permalink($postID); ?>" ><div class="pcont"> <?php echo get_field('homepage_headline', $postid); ?> </div> </a>
                              <?php } else { ?>
                                <a href="<?php echo get_permalink($postID); ?>" ><div class="pcont"> <?php echo get_the_title($postID); ?> </div> </a>
                              <?php } ?>
                            <?php } ?>
                          </h3>

                        </div>
                    </div>
                    <!--end of .col-->
                  <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </section>
  <!-- END Verticals Section  -->


  <!-- start latest news grid -->

  <?php

  function gridpost($item)
  {
      echo '<div class="matchHeight item bordered no-top-border" style="padding:0 !important; padding-top:0 !important;background:transparent;"><figure>';
      //echo 'test: ' . get_field ("url_link", $item);
      //echo 'postid: ' . $item -> ID;
      $postid = $item -> ID;
      $permalink = get_the_permalink($postid);
      $url_link = get_field("url_link", $item);

      if ($url_link): // post goes offsite (extremely rare)

        echo '<a target="_blank" href="//';
      echo $url_link;
      echo '">';
      echo get_the_post_thumbnail($postid, 'full', array('class' => 'img-responsive'));
      echo '</a>'; else:
            echo '<a href="';
      echo $permalink;
      echo '">';
      echo get_the_post_thumbnail($postid, 'full', array('class' => 'img-responsive'));
      echo '</a>';
      endif;

      echo '<figcaption>';
      echo '<div class="info"><h4 style="color:black; text-align:center; padding-left:10px; padding-right: 10px;">';

      if ($url_link): // post goes offsite (extremely rare)
            echo '<a target="_blank" href="//';
      echo $url_link;
      echo '">';
      if (get_field('use_short_headline', $postid) == 'yes' && get_field('homepage_headline', $postid) != '') {
          echo get_field('homepage_headline', $postid);
      } else {
          echo get_the_title($postid);
      }
      echo '</a>'; else:
            echo '<a href="';
      echo $permalink;
      echo '">';
      if (get_field('use_short_headline', $postid) == 'yes' && get_field('homepage_headline', $postid) != '') {
          echo get_field('homepage_headline', $postid);
      } else {
          echo get_the_title($postid);
      }
      echo '</a>';
      endif;
      echo '</h4></div><!-- /.info --></figcaption></figure></div><!-- /item -->';
  }

  if (have_rows('latest_news_box')): // check for repeater fields
  while (have_rows('latest_news_box')) : the_row(); // loop through the repeater fields

  $posts = get_sub_field('post_box'); // all the latest news is now loaded in $posts

  endwhile;
  endif;

?>

       <div class="latest-grid">


           <style>
             #featured-section {
               min-height: 400px;
               margin: 0 auto;
             }
             #featured-section.content {
               min-width:600px;
               max-width: 75rem;
               display: flex;
               flex-direction: row;
               align-items: center;
               justify-content: center;
             }
             #featured-section.content .election-2020 {
               display: flex;
               flex-direction: row;
               min-width:600px;
               min-height:500px;
               background: url('https://cronkitenews.azpbs.org/wp-content/uploads/2020/10/Election-2020-Clean-BG-Digital.jpg') no-repeat;
               background-size: cover;
             }
             #featured-section.content .election-2020 .main {
               width: 100%;
             }
             #featured-section.content .election-2020 .main .election-logo {
               padding:25px 25px;
             }
             #featured-section.content .election-2020 .main .content {
               padding:10px 25px;
               display: block;
               float: left;
             }
             #featured-section.content .election-2020 .main .content img {
               float:left;
             }
             #featured-section.content .election-2020 .main .content h3 {
               float:left;
               width: 70%;
               padding: 0 25px;
               font-size:18px;
               font-weight: bold;
             }
             #featured-section.content .election-2020 .main .content a:hover h3 {
                 color:#000;
             }

             #featured-section.content .election-2020 .top-two-list {
               border:1px solid #ff0000;
               width: 400px;
               margin-left: 25px;
             }
             #featured-section.content .election-2020 .hdr {
               min-height: 90px;
             }
             #featured-section.content .long-term-feature {
               min-width: 600px;
               min-height:500px;
               background: #ececec;
               color:#fff;
               padding-top:40px;
             }
             #featured-section.content .long-term-feature h3, #featured-section.content .long-term-feature h4 {
               color: #fff;
               padding-left: 22px;
               padding-right: 22px;
             }
             #featured-section.content .long-term-feature h3 {
               font-size: 16px;
               margin-bottom:5px;
               color:#000;
             }
             #featured-section.content .long-term-feature h4 {
               font-size: 24px;
               font-weight: bold;
               color:#000;
               margin:0;
             }
             #featured-section.content .long-term-feature p {
               padding-left: 22px;
               padding-right: 22px;
               padding-top:10px;
               font-size:18px;
             }
             #featured-section.content .long-term-feature a {
               color:#000;
             }
             #featured-section.content .long-term-feature a:hover {
               text-decoration: underline;
             }
             #featured-section.content .long-term-feature ul li {
               padding-bottom:10px;
             }
             @media only screen
               and (max-width: 1000px) {
                 #featured-section.content {
                   flex-direction: column;
                 }
                 #featured-section.content .election-2020 {
                   min-width: 100%
                 }
                 #featured-section.content .long-term-feature {
                   min-width: 100%
                 }
             }
           </style>

           <!-- Featured section - UPDATED: OCTOBER 6TH, 2020 -->
           <div id="featured-section" class="content">
             <!-- election 2020 -->
             <div class="election-2020">

               <!-- main -->
               <div class="main">
                 <center>
                   <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2020/10/election-hp-1-feature.png" width="225" class="election-logo" style="margin:0 auto;" />
                 </center>

                 <?php if (have_rows('stories', 'option')): ?>
                    <?php while (have_rows('stories', 'option')): the_row(); ?>
                        <div class="content">
                            <img src="<?php the_sub_field('photo'); ?>" width="150" />
                            <a href="<?php the_sub_field('link'); ?>"><h3><?php the_sub_field('headline'); ?></h3></a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

               </div>
             </div>

             <!-- long term feature -->
             <div class="long-term-feature">
               <div class="content">
                 <h3>FEATURED SERIES</h3>
                 <h4><?php the_field('special_area_title');?></h4>
                 <?php the_field('special_area_description');?>
                </div>
             </div>
           </div>
           <!-- end featured section -->


        <div class="container-fluid">
            <div class="row" style="background-color:#19346a;">
                <div class="col-xs-12 col-lg-4 col-lg-offset-1">

                    <h2 style="color:white; padding:30px; font-weight:bold;  font-size: 36px; padding-left:0;"> LATEST NEWS: </h2>

                </div>


        </div>

        </div> <!-- /container-fluid -->



         <div class="container inner-top">
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-xs-12 col-sm-3" style="margin-top:10px; ">

            <?php gridpost($posts[0]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">
            <?php gridpost($posts[1]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">

            <?php gridpost($posts[2]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">
            <?php gridpost($posts[3]); ?>

          </div>


          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">

            <?php gridpost($posts[4]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">
            <?php gridpost($posts[5]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">

            <?php gridpost($posts[6]); ?>

          </div>
          <div class="col-xs-12 col-sm-3" style="margin-top:10px;">
            <?php gridpost($posts[7]); ?>

          </div>

        </div>
        <!-- /row -->

      </div>
      <!-- /container -->
    </div>
    <!-- /latest-grid -->

    <!-- end latest news grid -->



    <section class="pre-bottom">
      <div class="item inner-bottom-sm">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 inner-top-sm">
              <div class="caption vertical-top text-center azpbs">
                <h1 class="fadeInDown-1 light-color">COMING UP ON ARIZONA PBS</h1>
                <h2 class="fadeInDown-2 dark-color">Eight HD</h2>
              </div>
            </div>
            <div class="col-sm-8 inner-top-sm">
              <div class="row thumbs gap-xs pbsthumbs">

                    <div class="col-xs-3 thumb">
                      <figure>
                        <a href="http://news.bbc.co.uk/2/hi/programmes/world_news_america/default.stm" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2015/03/logo-bbc2.png" alt="BBC america news show on AZPBS"></a>
                      </figure>
                    </div>

                    <div class="col-xs-3 thumb">
                      <figure>
                        <a href="http://cronkitenews.azpbs.org/sitenewscast/" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2015/03/logo-cronkite-pbs.png" alt="Cronkite News on AZPBS at 5PM"></a>
                      </figure>
                    </div>

                    <div class="col-xs-3 thumb">
                      <figure>
                        <a href="http://www.azpbs.org/arizonahorizon/" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2015/03/logo-horizon2.png" alt="Watch Horizon on AZPBS at 5:30PM"></a>
                      </figure>
                    </div>

                    <div class="col-xs-3 thumb">
                      <figure>
                        <a href="http://www.pbs.org/newshour/" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2015/03/logo-pbs-newshour.png" alt="Watch PBS Newshour on AZPBS at 6PM"></a>
                      </figure>
                    </div>


              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.item -->
    </section>



    <?php get_footer(); ?>
