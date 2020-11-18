<?php

/*
  Template Name: Standard Page
*/

get_header('new'); ?>

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

        <!-- ============================================================= SECTION – BLOG POST ============================================================= -->

        <section id="blog-post-cat" class="light-bg">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-12 inner-right-sm">
                        <div class="sidemeta">
                            <div class="post format-gallery">
                                <div class="content-blog page-nosidebar">
                                    <?php if (have_posts()) :
                                        while (have_posts()) :
                                            the_post(); ?>

                                            <?php the_content(); ?>

                                        <?php endwhile;
                                    else : ?>
                                    <?php endif; ?>

                                </div>
                        </div>
                    </div>
                    <!-- /.col -->




                </div>
            </div>
            <!-- /.container -->
        </section>

        <!-- ============================================================= SECTION – BLOG POST : END ============================================================= -->

    </main>

    <!-- ============================================================= MAIN : END ============================================================= -->

<?php get_footer(); ?>
