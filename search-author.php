<?php
/*
 * The template for displaying Search Results pages.
 */
get_header(); ?>
    <section id="hero-inner" class="sub-header">
        <div class="container inner-content">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
                            <?php if ( have_posts() ) : ?>

                                <?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of POST-->
                                    <article  class="post-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <figure class="icon-overlay icn-link post-media">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></a>
                                            <?php endif; ?>
                                        </figure>
                                        <div class="credit-box"><?php the_field('field_text'); ?></div>
                                        <h3>
                                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <h6 class="story-info">By <?php the_author_link(); ?> <span>| POSTED:  <?php echo ap_date(); ?></span> </h6>
                                        <?php echo the_excerpt(); ?> <!-- 51 is number of symbol -->
                                    </article>
                                <?php endwhile; ?><!-- END of POST-->
                                <?php else : ?>
                               <h1>Sorry, no results found</h1>
                            <?php endif; ?>


                        </div>
                    </div>

                    <div class="post-author">
                        <figure>
                            <figcaption class="author-details">
                                <h3>Search for more stories by this reporter:</h3>
                                <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search stories by Author' ); ?>" />
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