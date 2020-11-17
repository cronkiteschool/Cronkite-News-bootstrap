<?php
/**
 * Single
 *
 * Loop container for single post content
 */
 get_header( 'new' ); ?>
	 <main>
		 <section id="blog-post" class="light-bg">
			 <div class="container inner-top-sm inner-bottom classic-blog">
				 <div class="row">
					 <div class="col-md-12">
					 <h1>Page not found</h1>
						 <img src="<?php echo get_template_directory_uri(); ?>/images/cronkite-404.jpg" alt="Walter Cronkite" class="img-responsive" />
						 <p style="font-style: italic;">Image credit: Wikimedia Commons</p>

						 <p>Sorry, we can't find that page. Please use the search or head back to the <a href="<?php bloginfo( 'url' ); ?>">home page.</a></p>
					 </div>
				 </div>
				 <!-- /.row -->
			 </div>
			 <!-- /.container -->
		 </section>
	 </main>




 <?php get_footer(); ?>
