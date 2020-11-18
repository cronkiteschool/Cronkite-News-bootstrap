<?php

/*
  Template Name: Misc Template
*/

get_header('new'); ?>

    <main>

        <!-- ============================================================= SECTION – BLOG POST ============================================================= -->

        <section id="blog-post" class="light-bg">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-12 inner-right-sm">
                        <div class="sidemeta">
                            <div class="post format-gallery">
                                <div class="content-blog page-nosidebar">
                                    <?php if (have_posts()) :
                                        while (have_posts()) :
                                            the_post(); ?>

                                            <?php //the_content();?>

                                        <?php endwhile;
                                    else : ?>
                                    <?php endif; ?>

                                    <?php get_template_part('partials/content', 'misc'); ?>
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
