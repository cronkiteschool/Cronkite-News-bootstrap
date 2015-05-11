<?php
/**
 * Category
 *
 * Standard loop for the verticals
 */
get_header(); ?>
    <section id="hero-inner" class="sub-header">
        <div class="container inner-content">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                   <h1> <?php  single_cat_title( '', true );  ?></h1>
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

                            <div  class="content-blog">

                                <?php global $post;
                                    $categories = get_the_category($post->ID);
                                    $catPost =  $categories[0]->cat_name;
                                    $catID = get_cat_ID( $catPost )
                                ?>

                                <?php $arg = array(
                                    'post_type'	    => 'post',
                                    'order'		    => 'DESC',
                                    'orderby'	    => 'date',
                                    'posts_per_page'    => 1,
                                    'category_name' => $catPost
                                );
                                $the_query = new WP_Query( $arg );
                                if ( $the_query->have_posts() ) : ?>

                                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="post-image">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                            </a>
                                        <?php endwhile;?>


                                <?php endif; wp_reset_query(); ?>


                            </div>
                            <!-- removed custom line info  -->

                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?><!-- BEGIN of Post -->
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
                            <?php endif; ?>

                            <div class="blog-pagination"><?php bootstrap_pagination(); ?></div>

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

                        <!-- Removed facebook comments  -->

                        <!-- /.comment-form-wrapper -->
                    </div>
                </div>

                <div class="col-md-3 sidebar">
                    <?php dynamic_sidebar('Sidebar Category'); ?>
                    <aside class="widget widget_archive">
                        <h5>Archives</h5>
                        <ul>
                            <?php wp_get_archives('cat='.$catID); ?>
                        </ul>
                    </aside>

                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>

        <!-- ============================================================= SECTION – BLOG POST : END ============================================================= -->

    </main>




    <!-- ============================================================= MAIN : END ============================================================= -->
    

<?php get_footer(); ?>