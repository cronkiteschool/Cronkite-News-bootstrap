<?php

/**
 * Template Name: Longform Desert
 * Story template without sidebar
 */

get_header('desert'); ?>

    <main>
        <section id="blog-post" class="light-bg" >
            <div class="container-fluid inner-top-sm inner-bottom classic-blog" style="max-width: 1200px;">
                <div class="row" style="margin-right: auto; margin-left: auto;">
                    <div class="col-md-12">

                            <div class="post format-single clearfix">

                                
                                <div class="post-content post-content-single clearfix">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) :
                                            the_post(); ?><!-- BEGIN of POST-->
                                            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        
                                                <h1><?php the_title(); ?></h1>

                                            <div id="top-img-holder"> 
                                            <?php if (have_rows('top_full_image')) : ?>
                                                <?php while (have_rows('top_full_image')) :
                                                    the_row();
                                            // Declare variables below
                                                    $icon = get_sub_field('fimage');
                                                    $text = get_sub_field('fcaption');  // Use variables below?>
                                                <img  style="width:100%;height:auto;" src="<?php echo $icon; ?>" />

                                                <div class="carousel-captions"> <!-- captions -->
                                                    <?php echo $text; ?>

                                                </div>
                                                </div>
                                                <?php endwhile; ?>
                                            <?php endif;
                                            wp_reset_query(); ?>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                <h6 class="story-info"><?php if ($postAuthor = get_field('post_author')) {?>
                                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                By <?php echo $postAuthor; ?> |
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


                            <div class="comment-form-wrapper">
                                <h2>Leave a Comment</h2>

                    <?php echo do_shortcode('[fbcomments]'); ?>

                                <div id="response"></div>
                            </div>
                            <!-- /.comment-form-wrapper -->

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
