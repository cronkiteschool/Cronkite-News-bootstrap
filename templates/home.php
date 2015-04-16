<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>

    <section id="hero">
        <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">


            <?php $arg = array(
                'post_type'	    => 'slider',
                'order'		    => 'ASC',
                'orderby'	    => 'menu_order',
                'posts_per_page'    => -1
            );
            $the_query = new WP_Query( $arg );
            if ( $the_query->have_posts() ) : ?>

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->

                    <div class="item" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ;?>) center top  no-repeat; background-size: cover">

                        <div class="container">
                            <div class="caption vertical-center text-center">
                                <p class="fadeInDown-2 light-color"><?php the_content(); ?></p>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.item -->
                    <?php endwhile; ?><!-- END of Post -->
              <?php endif; wp_reset_query(); ?>

        </div>
        <!-- /.owl-carousel -->
    </section>

    <section id="latest-works" class="light-bg">
        <div class="container inner">
            <div class="row">

                <?php if( have_rows('area_works_box') ): ?>
                    <?php while( have_rows('area_works_box') ): the_row();
                        // Declare variables below
                        $icon = get_sub_field('area_works_image');
                        $title = get_sub_field('area_works_title');
                        $text = get_sub_field('area_works_description');
                        $link = get_sub_field('area_works_link');
                        $customLinks = get_sub_field('custom_link');

                        // Use variables below ?>
                        <div class="col-sm-6 inner-top-sm ">
                            <div class="kicker">
                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $text; ?></p>

                                <?php if($customLinks) { ?>
                                    <a target="_blank" href="http://<?php echo $customLinks; ?>">
                                         <img class='awards_image' src="<?php echo $icon['sizes']['awards_logo']; ?>" />
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo $link; ?>">
                                        <img class='awards_image' src="<?php echo $icon['sizes']['awards_logo']; ?>" />
                                    </a>
                                <?php } ?>

                            </div>

                        </div><!--end of .col-->
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </section>



    <section id="carousels" class="medium-bg">
        <div class="container inner-top">
            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <h2>Latest News</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 inner-top-md">
                    <div id="owl-videos" class="owl-carousel owl-outer-nav owl-ui-md owl-item-gap">

                        <!-- Start Repeater -->
                        <?php if( have_rows('latest_news_box')): // check for repeater fields ?>


                                <?php while ( have_rows('latest_news_box')) : the_row(); // loop through the repeater fields ?>

<!--                                    --><?php //// set up post object
//                                    $post_object = get_sub_field('post_box');
//                                    if( $post_object ) :
//                                        $post = $post_object;
//                                        setup_postdata($post);
//                                        ?>
<!---->



                                        <?php

                                        $posts = get_sub_field('post_box');

                                        if( $posts ): ?>

                                                <?php foreach( $posts as $post): ?>
                                                    <?php setup_postdata($post); ?>
                                                    <div class="item">
                                                        <figure>

                                                            <?php  if( get_field( "url_link" ) ): ?>
                                                                <a target="_blank" href="http://<?php the_field( "url_link" ); ?>"><?php the_post_thumbnail('slider', array('class' => 'img-responsive')); ?></a>
                                                            <?php else: ?>
                                                                <a href="<?php the_permalink(); ?>">  <?php the_post_thumbnail('slider', array('class' => 'img-responsive')); ?></a>
                                                            <?php endif; ?>

                                                            <figcaption class="bordered no-top-border matchHeight">
                                                                <div class="info">
                                                                    <h4>
                                                                        <?php  if( get_field( "url_link" ) ): ?>
                                                                            <a target="_blank" href="http://<?php the_field( "url_link" ); ?>"><?php the_title(); ?></a>
                                                                        <?php else: ?>
                                                                            <a href="<?php the_permalink(); ?>">  <?php the_title(); ?></a>
                                                                        <?php endif; ?>
                                                                    </h4>
                                                                    <p> <?php the_field('sub_title'); ?></p>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                <?php endforeach; ?>

                                            <?php wp_reset_postdata(); ?>
                                        <?php endif; ?>
<!---->
<!--                                        -->
<!---->
<!--                                        -->
<!---->
<!---->
<!--                                        --><?php //wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<!---->
<!--                                    --><?php //endif; ?>

                                <?php endwhile; ?>

                            <!-- End Repeater -->
                        <?php endif; ?>


                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>

    <section id="latest-works" class="medium-bg">
        <div class="container inner">
            <div class="row">
                <div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
                   <?php the_field('special_area_image');?>
                </div>
                <!-- /.col -->

                <div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                    <h1><?php the_field('special_area_title'); ?></h1>
                    <p><?php  the_field('special_area_description');?></p>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section  class="pre-bottom">
        <div class="item inner-bottom-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 inner-top-sm">
                        <div class="caption vertical-top text-center azpbs">
                            <h1 class="fadeInDown-1 light-color"><?php the_field('arizona_area_title');?></h1>
                            <h2 class="fadeInDown-2 dark-color"><?php the_field('arizona_area_sub_title'); ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-6 inner-top-sm">
                        <div class="row thumbs gap-xs">
                            <?php if( have_rows('images_box') ): ?>
                                <?php while( have_rows('images_box') ): the_row();
                                    // Declare variables below
                                    $icon = get_sub_field('arizona_images');
                                    $link = get_sub_field('arizona_links');
                                    // Use variables below ?>
                                    <div class="col-xs-6 thumb">
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