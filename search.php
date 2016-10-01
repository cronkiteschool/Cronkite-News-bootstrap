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
            </div>
            <!-- /.container -->
    </section>
    <main>
        <section id="blog-post" class="light-bg">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-9 inner-right-sm">
                        <div class="sidemeta">
                            <div class="post format-search">

								<div class="post-content post-content-news">
		
									
									<?php if ( have_posts() ) : ?>
							
										<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
											 <article class="post-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h2>
                                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <h6 class="story-info">
                                                    <?php if($postAuthor = get_field('post_author')) {?>
                                                        By   <?php echo $postAuthor; ?> |
                                                    <?php } ?>
                                                    <span> <?php echo ap_date(); ?></span>
                                                </h6>
                                                <?php echo the_excerpt(); ?> <!-- 51 is number of symbol -->

                                                <div><?php the_field('field_text'); ?></div>
                                            </article>
										<?php endwhile; ?><!-- END of Post -->


  <div class="blog-pagination"> <?php bootstrap_pagination(); ?></div>



									<?php else : ?>
									   <h1>Sorry, no results found</h1>
									<?php endif; ?>
									
									
								
                                </div>
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