<?php
/**
 * Template Name: Longform No Title
* Story template without sidebar and title
 */
get_header(); ?>

    <main>
        <section id="blog-post" class="light-bg" >
            <div class="container-fluid inner-top-sm inner-bottom classic-blog" style="max-width: 1200px;">
                <div class="row" style="margin-right: auto; margin-left: auto;>
                    <div class="col-md-12">

                            <div class="post format-single clearfix">


                                <div class="post-content post-content-single clearfix">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?><!-- BEGIN of POST-->
                                            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  										<div class="breadcrumbs">
<?php
                        $verticals = get_the_category ();
                        $separator = ' | ';
                        $output = '';
                          if ( ! empty( $verticals ) ) {
                            foreach( $verticals as $category ) {

                              if (($category->name != "Uncategorized") && ($category->name != "Longform") && ($category->name != "Longform No Title")) {
                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ). '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . strtoupper(esc_html( $category->name )) . '</a>' . $separator;
                            }

                        }
                        echo trim( $output, $separator );
                      }
                        ?>
                      </div>


											<div id="owl-work" class="owl-carousel owl-inner-pagination owl-inner-nav post-media">
                                    <?php if( have_rows('slider_images') ): ?>
                                        <?php while( have_rows('slider_images') ): the_row();
                                            // Declare variables below
                                            $icon = get_sub_field('images');
                                            $text = get_sub_field('description');  // Use variables below ?>
                                                <div class="item">
                                                <img src="<?php echo $icon; ?>" />

                                                <div class="carousel-captions"> <!-- captions -->
                                                 <?php echo $text; ?>

                                            	</div>
												</div>
                                        <?php endwhile; ?>
                                    <?php endif; wp_reset_query(); ?>
                                </div>

                                <h6 class="story-info"><?php if($postAuthor = get_field('post_author')) {?>
                                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                By <?php echo $postAuthor; ?> |
                                <?php } ?>
                                <?php if( $siteTitle = get_field('site_title')) {?>
                                    <a href="http://<?php the_field('site_url'); ?>"><?php echo $siteTitle; ?></a></h6>
                                <?php } ?>
                                <h6 class="story-info-date"><?php echo ap_date(); ?></h6>

                                                <?php the_content(); ?>
                                                <?php the_field('second_text'); ?>
                                            </article>
                                        <?php endwhile; ?><!-- END of POST-->
                                    <?php endif; ?>

                                </div>

                            </div>


                            <div class="comment-form-wrapper">
                                <h2>Leave a Comment</h2>

					<?php echo do_shortcode('[fbcomments]'); ?>

                                <div id="response"></div>
                            </div>
                            <!-- /.comment-form-wrapper -->

                        <!-- END of .row-->
                        </div>
                    </div>

                    <!-- END of .container-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
    </main>

<?php get_footer(); ?>
