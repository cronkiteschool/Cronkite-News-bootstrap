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

                                    <?php if( have_rows('slider_images') ): ?>
                                        <?php while( have_rows('slider_images') ): the_row();
                                            // Declare variables below
                                            $icon = get_sub_field('images');
                                            $text = get_sub_field('author_text');  // Use variables below ?>
                                                <div class="item">
                                                <img src="<?php echo $icon; ?>" />
                                                </div>
                                        <?php endwhile; ?>
                                    <?php endif; wp_reset_query(); ?>

                                </div>

<!-- Remove author custom line field  -->

                                <div class="post-content post-content-single clearfix">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?><!-- BEGIN of POST-->
                                            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h2><?php the_title(); ?></h2>
                                                <h6 class="story-info">       <?php if($postAuthor = get_field('post_author')) {?>
                                                        By   <?php echo $postAuthor; ?> |
                                                    <?php } ?>
                                                    <span> <?php echo ap_date(); ?></span>
                                                </h6>
                                                <?php the_content(); ?>
                                                <?php the_field('second_text'); ?>
                                                <?php the_field('video_file'); ?>
                                            </article>
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="post-author">
                                <figure>
                                    <figcaption class="author-details">
                                        <h3>Search for more stories and video:</h3>
                                        <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories and Videos' ); ?>" />
                                            <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                        </form>
                                    </figcaption>
                                </figure>
                            </div>
                            <!-- Removed facebook comments  -->
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

                            <!-- Removed facebook comments  -->


<?php get_footer(); ?>
