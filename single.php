<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
    <main>
        <section id="blog-post" class="light-bg">
            <div class="container inner-top-sm inner-bottom classic-blog">
                <div class="row">
                    <div class="col-md-9 inner-right-sm">
                        <div class="sidemeta">
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
										// test for newscast category
										$isnewscast = 0;
                                                  if ( ! empty( $verticals ) ) {
                                                    foreach( $verticals as $category ) {
													// test for newscast category
													if ($category->name == "Newscast") {
														$isnewscast = 1;
													}
                                                      if (($category->name != "Uncategorized") && ($category->name != "Longform") && ($category->name != "Sports")) {
                                                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ). '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . strtoupper(esc_html( $category->name )) . '</a>' . $separator;
                                                    }

                                                }
                                                echo trim( $output, $separator );
                                              }
                                                ?>

                      </div>

              <h1><?php the_title(); ?></h1>

<?php
$isvid = get_field ('video_file', false, false);
if ( $isvid ) { // if we have a video load the video instead of the carousel

    function linkifyYouTubeURLs($text) {
        $text = preg_replace('~(?#!js YouTubeId Rev:20160125_1800)
            # Match non-linked youtube URL in the wild. (Rev:20130823)
            https?://          # Required scheme. Either http or https.
            (?:[0-9A-Z-]+\.)?  # Optional subdomain.
            (?:                # Group host alternatives.
              youtu\.be/       # Either youtu.be,
            | youtube          # or youtube.com or
              (?:-nocookie)?   # youtube-nocookie.com
              \.com            # followed by
              \S*?             # Allow anything up to VIDEO_ID,
              [^\w\s-]         # but char before ID is non-ID char.
            )                  # End host alternatives.
            ([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
            (?=[^\w-]|$)       # Assert next char is non-ID or EOS.
            (?!                # Assert URL is not pre-linked.
              [?=&+%\w.-]*     # Allow URL (query) remainder.
              (?:              # Group pre-linked alternatives.
                [\'"][^<>]*>   # Either inside a start tag,
              | </a>           # or inside <a> element text contents.
              )                # End recognized pre-linked alts.
            )                  # End negative lookahead assertion.
            [?=&+%\w.-]*       # Consume any URL (query) remainder.
            ~ix', '$1',
            $text);
        return $text;
    }

    $host = parse_url ($isvid);
    $isjpg = false;

    if ($host['host'] == 'www.youtube.com') {
      $id = linkifyYouTubeURLs ($isvid);
      $vidlink = '//youtube.com/embed/' . $id;
      $myembed = '<div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 20px;"><iframe class="embed-responsive-item" src="' . $vidlink . '?&showinfo=0"></iframe></div>';
    }
    else { // allows you to put a jpg image path in the video field
            // this is to work around a collision between pin query javascript and the carousel
      $pathparts = pathinfo ($isvid);
      if ($pathparts['extension'] == 'jpg') {
        $myembed = '<img src = "' . $isvid . '" class="img-responsive" alt="">';
      }
      $vidlink = $isvid;
    }


?>

    <?php echo $myembed; ?>


<?php
}

else {
?>
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
<?php } ?>
                                <h6 class="story-info"><?php if($postAuthor = get_field('post_author')) {?>
                                <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                                By <?php echo $postAuthor; ?> |
                                    <?php } ?></a>
                                <?php if( $siteTitle = get_field('site_title')) {?>
                                    <a href="//<?php the_field('site_url'); ?>"><?php echo $siteTitle; ?></a></h6>
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

<?php get_footer(); ?>
