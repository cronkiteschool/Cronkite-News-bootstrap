<?php
/*
 * Template Name: En Espanol
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
                                    <div class="content-blog">
                                        <?php global $post;?>
        
                                        <?php $arg = array(
                                            'post_type'	    => 'post',
                                            'order'		    => 'DESC',
                                            'orderby'	    => 'date',
                                            'posts_per_page'    => 1,
                                            'category_name' =>  'cronkite-news-en-espanol'
                                        );
                                        $the_query = new WP_Query( $arg );
                                        if ( $the_query->have_posts() ) : ?>
        
                                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                                           <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>
                                                           <?php the_field('video_file');?>
                                                     
                                                            
                                                           </div>
                                                           
                                                           <h3 style="padding-left: 10px;"><strong> <?php the_title(); ?></strong></h3>
                                                           <?php the_excerpt(); ?>
                                                <?php endwhile;?>
        
                                        <?php endif; wp_reset_query(); ?>
                                    </div>
                                </div>
                                
                                <div class="post-content post-content-news">
                                    <?php query_posts('post_type=post&category_name=cronkite-news-en-espanol&post_status=publish&posts_per_page=8&paged='. get_query_var('paged')); ?>

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
                                                    <?php the_excerpt(); ?>
                                                    <a href="#modal-members" member-number="<?= $number; ?>" class="watch"><i class="icon-videocam"></i></a>
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
                                        <input type="hidden" name="post_type" value="news" />
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


    <div class="remodal" data-remodal-id="modal-members" >
        <?php query_posts('post_type=post&category_name=cronkite-news-en-espanol&post_status=publish&posts_per_page=-1&paged='. get_query_var('paged')); ?>

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
