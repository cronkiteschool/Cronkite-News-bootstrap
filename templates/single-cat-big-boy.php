<?php
/*
* Template Name: Big Boy
*
* Updated 02/18/2016 with support for secondary text field
* so Big Boy stories can go in the rotator and not break
* the newsletter.
*/

get_header(); ?>
    <main>
        <section id="blog-post" class="light-bg">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-12">		
						<?php the_content(); ?>
						<?php the_field('second_text'); ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
    </main>




<?php get_footer(); ?>

</body>


