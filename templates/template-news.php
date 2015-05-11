<?php
/*
 * Template Name: News Page
 * Newscast archive
 */
get_header(); ?>

    <section id="hero-inner" class="sub-header">
        <div class="container inner-content">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <h1><?php the_title(); ?></h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- ./row -->

        </div>
        <!-- /.container -->
    </section>
    <main>
        <section id="blog-post" class="light-bg archive">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-9 inner-right-sm">
                        <div class="sidemeta">
                            <div class="post format-gallery ">

                                <div class="format-news">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?><!-- BEGIN of POST-->
                                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <?php the_content(); ?>
                                            </article>
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>

                                </div>
                                <div class="post-content post-content-news">
                                    <?php query_posts('post_type=post&category_name=newscast&post_status=publish&posts_per_page=8&paged='. get_query_var('paged')); ?>

                                    <?php if ( have_posts() ) : ?>
                                        <?php $number = 0; ?>

                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <div class="row news-box">
                                                <div class="col-sm-3 inner-right-xs-archive text-left">
                                                    <figure>
                                                        <a href="#modal-members" class="watch" member-number="<?= $number; ?>" >
                                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?>
                                                        </a>
                                                            </figure>
                                                </div>
                                                <!-- /.col -->

                                                <div class="col-sm-9 inner-top-xs inner-left-xs-archive">
                                                    <a href="#modal-members" class="watch" member-number="<?= $number; ?>" >
                                                        <h2><span class="post-title"><?php the_title(); ?></span></h2>
                                                    </a>
                                                    <div class="show-link clearfix">
                                                        <?php the_excerpt(); ?>
                                                        <a href="#modal-members" member-number="<?= $number; ?>" class="watch"><i class="icon-videocam"></i></a>
                                                    </div>
                                                </div>


                                            </div><!-- END of .post-type-->
                                            <?php $number++; ?>
                                        <?php endwhile; ?><!-- END of Post -->
                                        <div class="blog-pagination"> <?php bootstrap_pagination(); ?></div>

                                    <?php endif; wp_reset_query(); ?>

                                    <div class="row">
                                        <div class="col-sm-12 inner-right-xs-archive text-left">
                                            <div class="watch-icon"> <?php wp_get_archives( $args ); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END of .col-->
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


    <div class="remodal" data-remodal-id="modal-members" >
        <?php query_posts('post_type=post&category_name=newscast&post_status=publish&posts_per_page=-1&paged='. get_query_var('paged')); ?>

                <?php if ( have_posts() ) : ?>
                    <?php $number = 0; ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="popup-box" member-number="<?= $number; ?>">
                            <?php the_field('video_file');?>
                        </div>
                     <?php $number++; ?>
                <?php endwhile; ?><!-- END of Post -->
                <?php endif; wp_reset_query(); ?>
    </div>

<?php get_footer(); ?>