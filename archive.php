<?php
/**
 * Archive
 *
 * Standard archive page
 */
get_header(); ?>

    <section id="hero-inner" class="sub-header">
        <div class="container inner-content">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <h1>Archives</h1>
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

                                <div class="post-content post-content-news">
                                    <?php global $post;
                                        $categories = get_the_category($post->ID);
                                        $catPost =  $categories[0]->cat_name;
                                        $catID = get_cat_ID( $catPost )
                                    ?>

                                    <?php query_posts('post_type=post&category_name='.$catPost.'&post_status=publish&posts_per_page=-1&paged='. get_query_var('paged')); ?>

                                    <?php if ( have_posts() ) : ?>
                                        <?php $number = 0; ?>

                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <div class="row news-box">
                                                <div class="col-sm-3 inner-right-xs-archive text-left">
                                                    <figure>  <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></figure>
                                                </div>
                                                <!-- /.col -->

                                                <div class="col-sm-9 inner-top-xs inner-left-xs-archive">
                                                    <!--<a href="#modal-members" class="watch" member-number="<?= $number; ?>" >
                                                        <h2><span class="post-title"><?php the_title(); ?></span></h2>
                                                    </a> -->
													<a href="<?php the_permalink(); ?>" class="watch">
                                                        <h2><span class="post-title"><?php the_title(); ?></span></h2>
                                                    </a> 
													
                                                    <div class="show-link clearfix">
                                                        <?php the_excerpt(); ?>
                                                       
                                                       
                                                       <?php if( have_rows('video_file') ): ?>
                                                           <a href="#modal-members" member-number="<?= $number; ?>" class="watch"><i class="icon-videocam"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div><!-- END of .post-type-->
                                            <?php $number++; ?>
                                        <?php endwhile; ?><!-- END of Post -->
                                        <div class="blog-pagination"> <?php bootstrap_pagination(); ?></div>
                                    <?php endif; wp_reset_query(); ?>

                                </div>
                            </div>
                            <!-- END of .col-->
                        </div>

                        <div class="post-author">
                            <figure>
                                <figcaption class="author-details">
                                    <h3>Search for more stories and video:</h3>
                                    <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories and Video' ); ?>" />
                                        <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                    </form>
                                </figcaption>
                            </figure>
                        </div>

                        <!-- Remove Facebook Comments -->

                        <!-- /.comment-form-wrapper -->

                        <!-- END of .row-->
                    </div>
                    <div class="col-md-3 sidebar">
                        <?php dynamic_sidebar('Sidebar Right'); ?>
                        <a href="http://cronkitenewsonline.com/" target="_blank">Archives 2011-2014</a>
                    </div>
                    <!-- END of .container-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
    </main>


      <?php if( have_rows('video_file') ): ?>
        <div class="remodal" data-remodal-id="modal-members" >
            <?php query_posts('post_type=post&category_name='.$catPost.'&post_status=publish&posts_per_page=-1&paged='. get_query_var('paged')); ?>
    
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
    <?php endif; ?>

   <!-- Remove Facebook Comments -->

<?php get_footer(); ?>