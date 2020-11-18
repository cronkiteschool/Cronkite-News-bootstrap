<?php

/**
 * Template Name: Longform hero image - AZ Racial Divide
 * Story template without sidebar
 */

get_header('azracialdivide'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

<script src="<?php bloginfo('template_directory');?>/js/jquery.waypoints.min.js"></script>
    <main style=" background-color:#222;">
        <section id="blog-post" class="racial-divide">
            <div class="container-fluid" style="padding:0px;">
                <div class="row" style="margin-right: auto; margin-left: auto;">
                    <div class="col-md-12" style="padding:0px;">

                            <div class="clearfix">

                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) :
                                            the_post(); ?><!-- BEGIN of POST-->
                                            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="border:none;background-color:#222;">

                                
                                                                 
                                            <?php if (get_field('autoplay_bg_video')) { ?>          
                                    <div class="desktop-only"> 
                            <video autoplay muted loop style="z-index:-1;width:2000px; overflow-x:hidden; height:auto;">
                                <source src="<?php the_field('autoplay_bg_video'); ?>" type="video/mp4">
    
                                    </video>
    
                                   </div> 
                                
                            <div class="small-devices-only">                  
                                <div id="top-img-holder"> 
                                                <?php if (have_rows('top_full_image')) : ?>
                                                    <?php while (have_rows('top_full_image')) :
                                                        the_row();
                                            // Declare variables below
                                                        $icon = get_sub_field('fimage');
                                                        $text = get_sub_field('fcaption');  // Use variables below?>
                                                <img class="img-responsive" style="width:100%;height:100%;" src="<?php echo $icon; ?>" />
                                                        <?php if ($imgheadline = get_field('headline_over_image')) {?>
                                        <h1 class="animated fadeIn desktop-only" id="headline_over_image" style="color:<?php the_field('color_of_headline_over_image');?>;font-size:<?php the_field('headline_over_image_font_size');?>;<?php the_field('additional_headline_over_image_styling');?>"> <?php the_field('headline_over_image'); ?> </h1>
                                                        <?php } ?>
                                        <div class="carousel-captions"> <!--         captions -->
                                                        <?php echo $text; ?>

                                                </div>
                                                </div>
                                                    <?php endwhile; ?>
                                                <?php endif;
                                                wp_reset_query(); ?>                
                                                
                                      </div>            
                                            <?php } else { ?>
                                <div id="top-img-holder"> 
                                                <?php if (have_rows('top_full_image')) : ?>
                                                    <?php while (have_rows('top_full_image')) :
                                                        the_row();
                                            // Declare variables below
                                                        $icon = get_sub_field('fimage');
                                                        $text = get_sub_field('fcaption');  // Use variables below?>
                                                <img class="img-responsive" style="width:100%;height:100%;" src="<?php echo $icon; ?>" />
                                                        <?php if ($imgheadline = get_field('headline_over_image')) {?>
                                        <h1 class="animated fadeIn desktop-only" id="headline_over_image" style="color:<?php the_field('color_of_headline_over_image');?>;font-size:<?php the_field('headline_over_image_font_size');?>;<?php the_field('additional_headline_over_image_styling');?>"> <?php the_field('headline_over_image'); ?> </h1>
                                                        <?php } ?>
                                        <div class="carousel-captions"> <!--         captions -->
                                                        <?php echo $text; ?>

                                                </div>
                                                </div>
                                                    <?php endwhile; ?>
                                                <?php endif;
                                                wp_reset_query(); ?>
                                                
                                            <?php } ?>            
                              
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    
                                        <h3 style="color:rgba(255,255,255,0.9);padding-top:10px;"> <?php the_field('text_before_headline'); ?>   </h3>
                                      <h1 id="main-headline" style="color:rgba(255,255,255,0.9);"><?php the_title(); ?></h1> 
                                    
                                <h6 class="story-info" style="color:rgba(255,255,255,0.9);"><?php if ($postAuthor = get_field('post_author')) {?>
                                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                    <?php echo $postAuthor; ?> |
                                                                                            <?php } ?>
                                            <?php if ($siteTitle = get_field('site_title')) {?>
                                    <a href="http://<?php the_field('site_url'); ?>"><?php echo $siteTitle; ?></a></h6>
                                            <?php } ?>
                                <h6 class="story-info-date" style="color:rgba(255,255,255,0.9);"><?php echo ap_date(); ?></h6>

                                                <?php the_content(); ?>
                                                <?php the_field('second_text'); ?>
                                            
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>
                                                </div>
                                    </article>
                                </div>
                                
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
