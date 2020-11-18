<?php
/**
 * Template Name : Tags
 * Standard loop for Any tag
 */
get_header(); ?>

<section id="hero-inner" class="sub-header">
        <div class="container inner-content">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                   <h1> <?php single_tag_title(); ?>  </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- ./row -->
        </div>
        <!-- /.container -->
    </section>

    <main>


    <!-- ============================================================= SECTION – BLOG POST ============================================================= -->

    <section id="blog-post" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog">
            <div class="row">
                <div class="col-md-9 inner-right-sm">
                    <div class="sidemeta">
                        <div class=" post category-post format-gallery">

                            <!-- removed custom line info  -->

                            <div  class="content-blog">
                        

                                <?php
                                $paged = get_query_var('paged');
                                if ($paged < 2) { ?>
                                <?php if (have_posts()) : ?>
                               
                                            
                                                <div class="post-image">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                                </div>
                                        
                                      

                                <?php endif; wp_reset_query(); ?>

                                <?php  } ?>
                                

                            </div>
                    
            

                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?><!-- BEGIN of Post -->
                                    <article class="post-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <h2>
                                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <h6 class="story-info">
                                            <?php if ($postAuthor = get_field('post_author')) {?>
                                                By   <?php echo $postAuthor; ?> |
                                            <?php } ?>
                                            <span> <?php echo ap_date(); ?></span>
                                        </h6>
                                        <?php echo the_excerpt(); ?> <!-- 51 is number of symbol -->

                                        <div><?php the_field('field_text'); ?></div>
                                    </article>
                                <?php endwhile; ?><!-- END of Post -->
                            <?php endif; ?>

                            <div class="blog-pagination"><?php bootstrap_pagination(); ?></div>

                        </div>
                        <div class="post-author">
                            <figure>
                                <figcaption class="author-details">
                                    <h3>Search for more stories and video:</h3>
                                    <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                                        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e('Search Stories and Video'); ?>" />
                                        <button type="submit"  class="btn btn-default btn-submit icon-right-open" name="submit" id="searchsubmit"></button>
                                    </form>
                                </figcaption>
                            </figure>
                        </div>

                        <!-- Removed facebook comments  -->

                        <!-- /.comment-form-wrapper -->
                    </div>
                </div>

                <div class="col-md-3 sidebar">
                    <?php dynamic_sidebar('Sidebar Category'); ?>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>

        <!-- ============================================================= SECTION – BLOG POST : END ============================================================= -->

    </main>




    <!-- ============================================================= MAIN : END ============================================================= -->
    
    

<?php get_footer(); ?>