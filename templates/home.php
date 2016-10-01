<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>




  <section id="hero">

    <?php $arg = array(
                'post_type'	    => 'slider',
                'order'		    => 'ASC',
                'orderby'	    => 'menu_order',
                'posts_per_page'    => 1
            );
            $the_query = new WP_Query( $arg );
            if ( $the_query->have_posts() ) : ?>

      <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $do_not_duplicate = $post->ID; ?>
        <!-- BEGIN of Post -->

        <div class="item" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ;?>) center top no-repeat; background-size: cover;">

          <div class="tinter" style="height: 429px;">

            <div class="hero-caption animated fadeIn">

              <?php the_content(); ?>

            </div>
            <!-- /.caption -->
          </div>
          <!-- /.item -->
        </div>
        <!-- tinter -->
        <?php endwhile; ?>
          <!-- END of Post -->
          <?php endif; wp_reset_query(); ?>


            <!-- /.owl-carousel -->
  </section>


  <!-- START Verticals Section  -->

  <section id="latest-works" class="light-bg">
    <div class="container inner">
      <div class="row">

        <!-- Latest newscast -->

        <?php global $post;?>

          <?php $arg = array(
                  'post_type'	    => 'post',
                  'order'		    => 'DESC',
                  'orderby'	    => 'date',
                  'posts_per_page'    => 1,
                  'category_name' =>  'newscast'
              );
              $the_query = new WP_Query( $arg );
              if ( $the_query->have_posts() ) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php endwhile;?>

                <div class="col-sm-4 inner-top-sm ">
                  <div class="kicker-modern">
                    <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitenewscast/">NEWSCAST</a></h3>
                    <div class="embed-responsive embed-responsive-16by9">
                      <?php
                        $vid = get_field('video_file', false, false);
                        //echo 'vid:' . $vid;
                        echo '<iframe class="embed-responsive-item" src="';
                        echo $vid . '?&showinfo=0"></iframe>';

                       //the_field('video_file', false, false);?>
                    </div>
                    <p>
                      <a href="<?php the_permalink(); ?>">
                        <?php
                        $desc = get_the_content();
                        //echo 'desc: ' . $desc;
                        //$frontdescription = substr($desc, 0, -1);
                        $frontdescription = rtrim($desc, '.');
                        echo '<p>' . $frontdescription . '</p>';
                        ?>
                      </a>
                    </p>




                    <?php endif; wp_reset_query(); ?>
                  </div>

                </div>
                <!--end of .col-->

                <?php if( have_rows('area_works_box') ): ?>
                  <?php while( have_rows('area_works_box') ): the_row();
                        // Declare variables below
                        $icon = get_sub_field('area_works_image');
                        $title = get_sub_field('area_works_title');
                        $text = get_sub_field('area_works_description');
                        $link = get_sub_field('area_works_link');
                        $customLinks = get_sub_field('custom_link');

                        // Use variables below ?>
                    <div class="col-sm-4 inner-top-sm ">
                      <div class="kicker-modern">
                        <?php // hacky way to link to the category ?>
                        <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/<?php echo strtolower ($title); ?>"><?php echo $title; ?></a></h3>


                        <?php if($customLinks) { ?>
                          <a target="_blank" href="//<?php echo $customLinks; ?>">
                                         <img class='awards_image' src="<?php echo $icon['sizes']['awards_logo']; ?>" />
                                    </a>
                          <?php } else { ?>
                            <a href="<?php echo $link; ?>">
                                        <img class='awards_image' src="<?php echo $icon['sizes']['awards_logo']; ?>" />
                                    </a>
                            <?php } ?>
                            <p>
                              <a href="<?php the_field('area_works_link'); ?>">
                                <?php echo $text; ?>
                              </a>
                            </p>
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

  function gridpost($item) {

    echo '<div class="matchHeight item bordered no-top-border" style="margin-top: 10px;"><figure>';
  //echo 'test: ' . get_field ("url_link", $item);
  //echo 'postid: ' . $item -> ID;
    $postid = $item -> ID;
    $permalink = get_the_permalink($postid);
    $url_link = get_field ("url_link", $item);
    $verticals = get_the_category ($postid);
    $separator = ' | ';
    $output = '';
      if ( ! empty( $verticals ) ) {
        echo '<div style="font-size: 14px; font-weight: bold;">';
        foreach( $verticals as $category ) {

          if (($category->name != "Uncategorized") && ($category->name != "Longform") && ($category->name != "Longform No Title") && ($category->name != "Sports")  && ($category->name != "Editor's Picks")) {
        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ). '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . strtoupper(esc_html( $category->name )) . '</a>' . $separator;
      }

    }
    echo trim( $output, $separator );
    echo "</div>";
}

      if( $url_link ): // post goes offsite (extremely rare)

        echo '<a target="_blank" href="//';
          echo $url_link;
          echo '">';
          echo get_the_post_thumbnail($postid, 'full', array('class' => 'img-responsive'));
          echo '</a>';
        else:
            echo '<a href="';
            echo $permalink;
            echo '">';
          echo get_the_post_thumbnail($postid, 'full', array('class' => 'img-responsive'));
            echo '</a>';
        endif;

        echo '<figcaption>';
        echo '<div class="info"><h4>';

      if( $url_link ): // post goes offsite (extremely rare)
            echo '<a target="_blank" href="//';
            echo $url_link;
            echo '">';
            echo get_the_title($postid);
            echo '</a>';
          else:
            echo '<a href="';
            echo $permalink;
            echo '">';
            echo get_the_title($postid);
            echo '</a>';
          endif;
          echo '</h4></div><!-- /.info --></figcaption></figure></div><!-- /item -->';
  }

  if( have_rows('latest_news_box')): // check for repeater fields
  while ( have_rows('latest_news_box')) : the_row(); // loop through the repeater fields

  $posts = get_sub_field('post_box'); // all the latest news is now loaded in $posts

  endwhile;
  endif;

?>

    <div class="latest-grid">
      <div class="container inner-top">
        <div class="row">

        </div>
        <!-- /row -->
        <div class="row" style="padding-top: 10px;">
          <div class="col-sm-3">

            <?php gridpost($posts[0]); ?>

          </div>

          <div class="col-xs-12 col-sm-9">

            <div class="matchHeight item bordered no-top-border" style="margin-top: 10px;">

              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div style="font-size: 14px; font-weight: bold;">
                    <p>SPECIAL REPORT</p>
                  </div>
                  <div class="img-responsive">
                  <?php the_field('special_area_image');?>
                </div>
                </div>
                <div class="col-xs-12 col-sm-6">

                <div class="info" style="padding-top: 20px;">
                  <figcaption>
<h2 style="color: black; padding-top: 0; padding-bottom: 10px; font-size: 26px;"><?php the_field('special_area_title'); ?></h2>
                    <?php the_field('special_area_description');?>

                </figcaption>
                </div>
              </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /row -->
        <div class="row">
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[1]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[2]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[3]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[4]); ?>

          </div>
        </div>
        <!-- /row -->
        <div class="row" style="padding-bottom: 10px;">
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[5]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[6]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[7]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[8]); ?>

          </div>
        </div>
        <!-- /row -->

        <div class="row" style="padding-bottom: 10px;">
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[9]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[10]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">

            <?php gridpost($posts[11]); ?>

          </div>
          <div class="col-xs-6 col-sm-3">
            <?php gridpost($posts[12]); ?>

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
                <h1 class="fadeInDown-1 light-color"><?php the_field('arizona_area_title');?></h1>
                <h2 class="fadeInDown-2 dark-color"><?php the_field('arizona_area_sub_title'); ?></h2>
              </div>
            </div>
            <div class="col-sm-8 inner-top-sm">
              <div class="row thumbs gap-xs pbsthumbs">

                <?php if( have_rows('images_box') ): ?>
                  <?php while( have_rows('images_box') ): the_row();
                                    // Declare variables below
                                    $icon = get_sub_field('arizona_images');
                                    $link = get_sub_field('arizona_links');
                                    // Use variables below ?>
                    <div class="col-xs-3 thumb">
                      <figure> <a href="<?php echo $link; ?>" target="_blank">
                                                <img src="<?php  echo $icon; ?>" alt="">
                                            </a>
                      </figure>
                    </div>
                    <?php endwhile; ?>
                      <?php endif; wp_reset_query(); ?>

                        <!-- /.thumb -->

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
