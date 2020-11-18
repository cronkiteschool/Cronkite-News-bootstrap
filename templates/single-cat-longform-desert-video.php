<?php

/**
 * Template Name: Longform Desert Video
 * Story template without sidebar with video top
 */

get_header('desert'); ?>


</script>

 <script>
                            var vid = document.getElementsByClassName("video-top-bg");

                            if (window.matchMedia('(prefers-reduced-motion)').matches) {
                                vid.removeAttribute("autoplay");
                                vid.pause();
                                pauseButton.innerHTML = "Paused";
                            }

                            function vidFade() {
                                vid.classList.add("stopfade");
                            }

                            vid.addEventListener('ended', function()
                                                 {
                                // only functional if "loop" is removed 
                                vid.pause();
                                // to capture IE10
                                vidFade();
                            }); 
 </script>
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
                       
                            <video class="video-top-bg" style="max-width:1100px;" poster=" <?php the_field('lv_image');?>" playsinline autoplay muted loop>
                                <source src="<?php the_field('lv_webm') ?>" type="video/webm">
                                <source src="<?php the_field('lv_mp4') ?>" type="video/mp4">
                            </video>
                                   
                                <div class="wp-caption-text" style="float:left; font-style:italic;">
                                            <?php the_field('lv_caption'); ?>    
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
