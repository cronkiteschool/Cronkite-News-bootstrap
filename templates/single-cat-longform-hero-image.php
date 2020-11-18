<?php
/**
 * Template Name: Longform hero image
 * Story template without sidebar
 */
get_header('longformhero'); ?>

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

             

								<div id="top-img-holder"> 
                                    <?php if (have_rows('top_full_image')): ?>
                                        <?php while (have_rows('top_full_image')): the_row();
                                            // Declare variables below
                                            $icon = get_sub_field('fimage');
                                            $text = get_sub_field('fcaption');  // Use variables below?>
                                                <img class="img-responsive" style="width:100%;height:100%;" src="<?php echo $icon; ?>" />
                                        <?php if ($imgheadline = get_field('headline_over_image')) {?>
                                        <h1 class="animated fadeIn desktop-only" id="headline_over_image" style="color:<?php the_field('color_of_headline_over_image');?>;font-size:<?php the_field('headline_over_image_font_size');?>;<?php the_field('additional_headline_over_image_styling');?>"> <?php the_field('headline_over_image'); ?> </h1>
                                        <?php } ?>
                                                <div class="carousel-captions"> <!-- captions -->
                                                 <?php echo $text; ?>

                                            	</div>
												</div>
                                        <?php endwhile; ?>
                                    <?php endif; wp_reset_query(); ?>
                                                
                                              
                              
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    
                                      <h1 id="main-headline"><?php the_title(); ?></h1> 
                                    
                                <h6 class="story-info"><?php if ($postAuthor = get_field('post_author')) {?>
                                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                 <?php echo $postAuthor; ?> |
                                <?php } ?>
                                <?php if ($siteTitle = get_field('site_title')) {?>
                                    <a href="http://<?php the_field('site_url'); ?>"><?php echo $siteTitle; ?></a></h6>
                                <?php } ?>
                                <h6 class="story-info-date"><?php echo ap_date(); ?></h6>

                                                <?php the_content(); ?>
                                                <?php the_field('second_text'); ?>
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
