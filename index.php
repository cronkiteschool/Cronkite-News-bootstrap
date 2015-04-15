<?php
/**
 * Index
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<section id="hero-inner" class="sub-header">
    <div class="container inner-content">
        <div class="row">
            <div class="col-md-8 col-sm-9">
                <?php
                if( is_home() && get_option('page_for_posts') ) {
                    $blog_page_id = get_option('page_for_posts');
                    echo '<h1>'.get_page($blog_page_id)->post_title.'</h1>';
                }
                ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->

    </div>
    <!-- /.container -->
</section>
    <main>
    <section id="blog-post" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog">
            <div class="row">
                <div class="col-md-9 inner-right-sm">
                    <div class="sidemeta">
                        <div class="post format-gallery">

                            <?php
                            if( is_home() && get_option('page_for_posts') ) {
                                $blog_page_id = get_option('page_for_posts');
                                echo '<div class="content-blog">'.get_page($blog_page_id)->post_content.'</div>'; ?>

                               <?php }  ?>

                            <div class="custom-line">Photo Credit: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a> | <span class="custom-line-links"><?php the_field('tags_text', get_option('page_for_posts')); ?> </span></div>

                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?><!-- BEGIN of POST-->
                                    <article class="post-content post-content-blog" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <figure class="icon-overlay icn-link post-media">
                                            <h3>
                                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <h6 class="story-info">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>  <span>| POSTED:  <?php the_time(get_option('date_format')); ?></span> </h6>
                                            <?php echo the_excerpt(); ?> <!-- 51 is number of symbol -->

                                            <div><?php the_field('field_text'); ?></div>
                                    </article>

                                <?php endwhile; ?><!-- END of POST-->
                            <?php endif; ?>

                            <div class="blog-pagination"> <?php bootstrap_pagination(); ?></div>
                        </div>
                        <!-- END of .col-->
                    </div>

                    <div class="post-author">
                        <figure>
                            <figcaption class="author-details">
                                <h3>Search for more stories:</h3>
                                <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search stories' ); ?>" />
                                    <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                </form>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="comment-form-wrapper">
                        <h2>Leave a Comment</h2>
                        <div class="fb-comments" data-href="http://cronkitenewsonline.com/" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                        <div id="response"></div>
                    </div>
                    <!-- /.comment-form-wrapper -->

                    <!-- END of .row-->
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