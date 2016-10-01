<?php
/*
 * Template Name: Archives Page
 *  archive
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
                            <div class="post format-archives ">
                                <div class="post-content post-content-news">
                                    <?php //dynamic_sidebar4'Sidebar Archive'); ?>
                                    <div class="filter-box clearfix">

                                        <?php $month = ( isset($_GET['monthOption']) && !empty($_GET['monthOption']) ) ? $_GET['monthOption']: ""; ?>
                                        <?php $years = ( isset($_GET['yearOption']) && !empty($_GET['yearOption']) ) ? $_GET['yearOption']: ""; ?>


                                        <?php  $startYear = 2014; $curYear = date('Y'); ?>

                                        <form id="form-filter" method="get">
                                            <select name="monthOption">
                                                <option value="filter by Month">Filter by Month</option>
                                                <option <?php selected($month, "1"); ?> value="1">1</option>
                                                <option <?php selected($month, "2"); ?> value="2">2</option>
                                                <option <?php selected($month, "3"); ?> value="3">3</option>
                                                <option <?php selected($month, "4"); ?> value="4">4</option>
                                                <option <?php selected($month, "5"); ?> value="5">5</option>
                                                <option <?php selected($month, "6"); ?> value="6">6</option>
                                                <option <?php selected($month, "7"); ?> value="7">7</option>
                                                <option <?php selected($month, "8"); ?> value="8">8</option>
                                                <option <?php selected($month, "9"); ?> value="9">9</option>
                                                <option <?php selected($month, "10"); ?> value="10">10</option>
                                                <option <?php selected($month, "11"); ?> value="11">11</option>
                                                <option <?php selected($month, "12"); ?> value="12">12</option>
                                            </select>

                                            <select name="yearOption">
                                                <option value="filter by Year">Filter by Year</option>
                                                <?php for($i = $startYear; $i <= $curYear; $i++) : ?>
                                                    <option <?php selected($years, $i); ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </form>

                                    </div>

                                    <?php $args = array(
                                        'post_type'	    => 'post',
                                        'order'		    => 'ASC',
                                        'orderby'	    => 'date',
                                        'posts_per_page'    => -1,
                                        'monthnum' => $month,
                                        'year' => $years,

                                    );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) : ?>

                                            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                            $do_not_duplicate = $post->ID; ?><!-- BEGIN of POST -->
                                            <div class="archive-list">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php global $post;
                                                    $categories = get_the_category($post->ID);
                                                    $catPost =  $categories[0]->cat_name;
                                                    $catID = get_cat_ID( $catPost )
                                                ?>
                                                <h5>Category: <?php echo $catPost ?></h5>
                                                <ul>
                                                    <li><?php wp_get_archives('cat='.$catID); ?></li>
                                                </ul>
                                                </div><!-- END of .post-type-->
                                            <?php endwhile; ?><!-- END of POST -->

                                    <?php else : ?>
                                        <h3>Sorry, no results found</h3>
                                    <?php endif; ?>
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



<?php get_footer(); ?>