<?php
/**
 * Template Name: Special Project - Venezuela
 * Story template without sidebar
 */
get_header( 'longformhero' ); ?>
	<style>
	  .custom-row {
		height:350px;
		min-height:100px;
		margin-right: auto;
		margin-left: auto;
		background:url('https://cronkitenews.azpbs.org/wp-content/uploads/2019/07/venezuela-sp-hero.jpg') no-repeat;
		background-size: cover;
	  }
	  .sp-mobile {
		padding:0 0 18px 0;
		border-bottom:1px solid #cccccc;
	  }
	  .sp-mobile h1 {
		font-size:3vw;
		margin-bottom:10px;
	  }
	  .sp-mobile-about {
		padding:18px 0 0 0;
		border-top:1px solid #cccccc;
	  }
	  @media only screen and (max-width: 1000px) {
		.custom-row {
		  background-position: center;
		}
		.sp-mobile {
		  padding:0 15px 18px 15px;
		}
		.sp-mobile h1 {
		  font-size: 8vw;
		  margin-bottom:10px;
		}
		.sp-mobile-about {
		  padding:18px 15px 0 15px;
		}
	  }

	  .sp-title:hover {
		text-decoration: underline;
	  }
	  .entry {
		display: flex;
		flex-direction: column;
	  }
	  @media only screen and (max-width: 990px) {
		.story-entry {
		  padding-top:15px;
		}
	  }
	  @media only screen and (max-width: 600px) {
		.sp-title {
		  padding-top:20px;
		}
	  }
	</style>

	<main>
		<section id="blog-post">
			<div class="container-fluid" style="padding:0px;">

				<div class="row custom-row">

				</div>
				<!-- END of .row-->

				<!-- show all posts -->
				<div class="row" style="margin-right: auto; margin-left: auto;margin-top:25px;margin-bottom:25px;">
					<div class="col-md-2 col-lg-3"></div>
					<div class="col-xs-12 col-md-8 col-lg-6 sp-mobile">
					  <?php if ( get_the_ID() == 119536 ) { ?>
						<h1>About</h1>
					  <?php } else { ?>
						<h1><?php echo get_the_title(); ?></h1>
					  <?php } ?>
					  <?php echo preg_replace( '/<p>/i', '<p style="font-size:18px;line-height:28px;">', get_field( 'sp_introduction' ) ); ?>
					</div>
					<div class="col-md-2 col-lg-3"></div>
				</div>
				<!-- END of .row-->

				<?php if ( get_the_ID() != 119536 ) { ?>
					<?php
					$args  = array(
						'posts_per_page' => -1,
						'cat'            => 12896,
						'orderby'        => 'publish_date',
						'order'          => 'ASC',
					);
					$query = new WP_Query( $args );
					?>
					<?php
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<!-- ' . get_the_ID() . '-->';
							?>
				  <!-- show all posts -->
				  <div class="row" style="margin-right: auto; margin-left: auto;margin-top:25px;margin-bottom:25px;">
					  <div class="col-md-2 col-lg-3"></div>
					  <div class="col-xs-12 col-md-3 col-lg-2" style="padding:0px;">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img style="width:100%;height:auto;" src="' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '">'; ?></a>
					  </div>
					  <div class="col-xs-12 col-md-5 col-lg-4 story-entry">
						  <h2><a class="sp-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						  <div class="entry" style="margin-top:8px;">
							<?php echo get_field( 'story_tease', get_the_ID() ); ?>
						  </div>
					  </div>
					  <div class="col-md-2 col-lg-3"></div>
				  </div>
				  <!-- END of .row-->
				  <?php } ?>
				<?php } ?>
				<?php } else { ?>
				  <!-- show all posts -->
				  <div class="row" style="margin-right: auto; margin-left: auto;margin-top:25px;margin-bottom:25px;">
					  <div class="col-md-3 col-lg-3"></div>
					  <div class="col-xs-12 col-md-6 col-lg-6 sp-mobile-about" style="border:none;">
						<a href="https://cronkitenews.azpbs.org/venezuelans-in-peru/">Back to stories</a>
					  </div>
					  <div class="col-md-3 col-lg-3"></div>
				  </div>
				  <!-- END of .row-->
				<?php } ?>

				<?php wp_reset_query(); ?>
				<?php if ( get_the_ID() != 119536 ) { ?>
				  <!-- show all posts -->
				  <div class="row" style="margin-right: auto; margin-left: auto;margin-top:25px;margin-bottom:25px;">
					  <div class="col-md-3 col-lg-3"></div>
					  <div class="col-xs-12 col-md-6 col-lg-6 sp-mobile-about" style="">
						<h2 style="margin-bottom:10px;">About the project</h2>
						<?php echo preg_replace( '/<p>/i', '<p style="font-size:18px;line-height:28px;">', get_field( 'sp_about_the_project' ) ); ?>
					  </div>
					  <div class="col-md-3 col-lg-3"></div>
				  </div>
				  <!-- END of .row-->
				<?php } ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
