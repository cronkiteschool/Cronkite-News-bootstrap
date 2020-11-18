<?php

/**
 * Single
 *
 * Loop container for single post content
 */

get_header(); ?>
<main>
    <section id="blog-post" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog">
            <div class="row">
                <div class="col-md-9 inner-right-sm">
                    <div class="sidemeta">
                        <div class="post format-single clearfix">

                            <div id="owl-work" class="owl-carousel owl-inner-pagination owl-inner-nav post-media">
                                <?php if (have_rows('slider_images')) : ?>
                                    <?php while (have_rows('slider_images')) :
                                        the_row();
                                        // Declare variables below
                                        $icon = get_sub_field('images');
                                        $text = get_sub_field('author_text');  // Use variables below?>
                                        <div class="item">
                                            <img src="<?php echo $icon; ?>" />
                                            <div class="custom-line">
                                                <?php if ($labelInfo  = get_field('label_info')) : ?>
                                                    <?php echo $labelInfo; ?>
                                                <?php endif; ?>
                                                <?php if ($postAuthor = get_field('post_author')) {?>
                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo $postAuthor; ?> | </a>
                                                <?php } ?>
                                                <?php if ($siteTitle = get_field('site_title')) {?>
                                                    <a href="<?php the_field('site_url'); ?>"><?php echo $siteTitle; ?> | </a>
                                                <?php } ?>
                                                <?php if ($twitterTitle = get_field('twitter_title')) {?>
                                                    <a href="<?php the_field('twitter_url'); ?>" class="custom-line-links"> <i class="icon-twitter"></i> <?php echo $twitterTitle; ?> </a>
                                                <?php } ?>

                                            </div>

                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_query(); ?>
                            </div>

                            <div class="post-content post-content-single clearfix">
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) :
                                        the_post(); ?><!-- BEGIN of POST-->
                                        <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <h2><?php the_title(); ?></h2>
                                            <h6 class="story-info">
                                                <?php if ($postAuthor = get_field('post_author')) {?>
                                                    By   <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo $postAuthor; ?> | </a>
                                                <?php } ?>
                                                <span> <?php echo ap_date(); ?></span>
                                            </h6>
                                            <?php the_content(); ?>
                                            <?php the_field('second_text'); ?>
                                        </article>
                                    <?php endwhile; ?><!-- END of POST-->
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="post-author">
                            <figure>
                                <figcaption class="author-details">
                                    <h3>Search for more stories by this reporter:</h3>
                                    <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">

                                        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e('Search stories by Author'); ?>" />
                                        <input type="hidden" class="form-control" name="author_name" />

                                        <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                    </form>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="comment-form-wrapper">
                            <h2>Leave a Comment</h2>
                            <div class="fb-comments" data-href="//cronkitenewsonline.com/" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                            <div id="response"></div>
                        </div>
                        <!-- /.comment-form-wrapper -->

                        <!-- END of .row-->
                    </div>
                </div>
                <div class="col-md-3 sidebar">
                    <?php dynamic_sidebar('Sidebar Right'); ?>
                </div>
                <!-- END of .container-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</main>


<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=438575732820089&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<?php get_footer(); ?>
