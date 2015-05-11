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
                          <div id="content" class="content_right">
                            <h3>Search Result for : <?php echo "$s"; ?> </h3>
                               
                            <?php $arg = array(
                                'post_type'	    => 'news',
                                'order'		    => 'ASC',
                                'orderby'	    => 'date',
                                
                                'posts_per_page'    => -1,
    
                                'meta_query' => array(                  
                                   array(
                                       'key'       => 'teaser',
                                       'value'     => $_GET['s'],
                                      // 'compare'   => 'LIKE',   
                                   
                                   ), 

    
                                ));
                            $the_query = new WP_Query( $arg );
                            if ( $the_query->have_posts() ) : ?>
                               <div id="post-<?php the_ID(); ?>" class="posts">
                                  <article>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $do_not_duplicate = $post->ID; ?><!-- BEGIN of POST -->
                                        
                                    
                                        <?php the_exerpt(); ?>
                                        <p align="right"><a href="<?php the_permalink(); ?>">Read     More</a></p>

                                      <h6 class="story-info">
                                          <?php if($postAuthor = get_field('post_author')) {?>
                                              By   <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo $postAuthor; ?> | </a>
                                          <?php } ?>
                                          <span> <?php echo ap_date(); ?></span>
                                      </h6>

                                    
                                    <?php endwhile; ?><!-- END of POST -->
                                </article><!-- #post -->
                              </div>
                            <?php endif; wp_reset_query(); ?>

                            
                          </div><!-- content -->

                      </div>
                    </div>

                    <div class="post-author">
                        <figure>
                            <figcaption class="author-details">
                                <h3>Search for more stories and video:</h3>
                                <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories and Video' ); ?>" />
                                    <input type="hidden" name="post_type" value="news" />
                                    <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                </form>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- Removed facebook comments  -->

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

                   <!-- Removed facebook comments  -->

<?php get_footer(); ?>