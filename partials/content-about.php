<!-- main body container -->
<div id="main_container" class="grid-container about-us">

  <!-- story content -->
  <div class="grid-x grid-padding-x single-story-block">

	<div class="large-12 medium-12 small-12 cell story-content">

	  <h1 class="single-story-hdr"><?php the_title(); ?></h1>
	  <?php if ( have_posts() ) { ?>
			<?php
			while ( have_posts() ) {
				the_post();
				?>
				<?php the_content(); ?>
		  <?php } ?>
	  <?php } ?>



<!-- Cronkite News location -->
<h2 class="cn_sub_head-2">Locations</h2>
<?php if ( have_rows( 'cn_locations' ) ) { ?>
	<ul class="cn-locations">
	<?php
	while ( have_rows( 'cn_locations' ) ) {
		the_row();
		echo '<li><img src="' . get_sub_field( 'cn_location_photo' ) . '" alt="' . get_sub_field( 'cn_location_name' ) . '" />';
		echo '<h4 class="staff-title">' . get_sub_field( 'cn_location_name' ) . '</h4>';
		echo '<span class="team-title">' . get_sub_field( 'cn_location_address' ) . '</span>';
		echo '<span class="team-title">' . get_sub_field( 'cn_location_phone' ) . '</span>';
		echo '<span class="team-title"><a href="mailto:' . get_sub_field( 'cn_location_email' ) . '" target="_blank">' . get_sub_field( 'cn_location_email' ) . '</a></span>';
		echo '</li>';
	}
	?>
	</ul>
<?php } ?>


<!-- Cronkite News Faculty and Staff -->
<h2 class="cn_sub_head-2">Newsroom Leaders</h2>
<?php
  $args = array(
	  'post_type'      => 'cn_staff',
	  'post_status'    => 'publish',
	  'post__not_in'   => array( 122183 ),
	  'posts_per_page' => '-1',
	  'meta_key'       => 'lastname',
	  'orderby'        => 'lastname',
	  'order'          => 'ASC',
  );

  $cnstaff = new WP_Query( $args );
  if ( $cnstaff->have_posts() ) {
		?>
	<ul class="cn-staff-list">
	  <?php
		while ( $cnstaff->have_posts() ) {
			$cnstaff->the_post();
			?>
		  <li>
			<?php
			  $middlename = '';
			if ( str_word_count( get_the_title() ) == 2 ) {
				list($firstname, $lastname) = explode( ' ', get_the_title() );
			} elseif ( str_word_count( get_the_title() ) > 2 ) {
				list($firstname, $middlename, $lastname) = explode( ' ', get_the_title() );
			}

			if ( get_field( 'cn_staff_photo' ) != '' ) {
				echo '<img src="' . get_field( 'cn_staff_photo' ) . '" class="cn-staff-circular" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
			} else {
				echo '<span class="cn-staff-circular empty"> </span>';
			}


			if ( get_the_title() != '' ) {
				echo '<h4 class="staff-title">' . get_the_title() . '</h4>';
			}
			if ( get_field( 'cn_staff_title' ) != '' ) {
				echo '<span class="team-title">' . get_field( 'cn_staff_title' ) . '</span>';
			}
			  /*
			  social_media_outlets
				-social_media_type
				-social_media_handle*/
			?>
			  <div class="staff-social-links">
			<?php
			if ( have_rows( 'cn_staff_contact' ) ) {
				while ( have_rows( 'cn_staff_contact' ) ) {
					the_row();
					if ( get_sub_field( 'contact_outlet' ) != '' && get_sub_field( 'social_media_handle' ) != '' ) {
						if ( get_sub_field( 'contact_outlet' ) == 'twitter' ) {
							?>
					  <a href="https://www.twitter.com/<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
				<?php } elseif ( get_sub_field( 'contact_outlet' ) == 'email' ) { ?>
					  <a href="mailto:<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fas fa-envelope-square"></i></a>
							<?php
				}
					}
				}
			}
			?>
			  </div>
		  </li>
			<?php
		}
		wp_reset_postdata();
		?>
	</ul>
	  <?php
  } else {
	  esc_html_e( 'No staff found.', 'text-domain' );
  }
	?>

<h2 class="cn_sub_head">Staff</h2>

<?php
  $currentSemester = get_field( 'current_semester', 'option' );

  $args = array(
	  'post_type'      => 'students',
	  'post_status'    => 'publish',
	  'posts_per_page' => '-1',
	  'meta_key'       => 'lastname',
	  'orderby'        => 'lastname',
	  'order'          => 'ASC',
  );

  $students = new WP_Query( $args );
  if ( $students->have_posts() ) {
		?>
	<ul class="student-staff-list">
	  <?php
		while ( $students->have_posts() ) {
			$students->the_post();
			if ( $currentSemester == get_field( 'semester' ) ) {
				?>
		  <li>
				<?php
				$staffNameURLSafe = str_replace( '&#8217;', '', str_replace( '.', '', str_replace( ' ', '-', strtolower( get_the_title( $val ) ) ) ) );
				if ( get_field( 'student_photo' ) != '' ) {
					echo '<a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/"><img src="' . get_field( 'student_photo' ) . '" class="cn-staff-circular" /></a>';
				} else {
					echo '<span class="cn-staff-circular empty"> </span>';
				}
				if ( get_the_title() != '' ) {
					echo '<h4 class="staff-title"><a href="https://cronkitenews.azpbs.org/people/' . $staffNameURLSafe . '/">' . get_the_title() . '</a></h4>';
				}
				if ( get_field( 'student_title' ) != '' ) {
					echo '<span class="team-title">' . ucwords( str_replace( '-', ' ', get_field( 'student_title' ) ) ) . '</span>';
				} elseif ( get_field( 'team' ) != '' || get_field( 'role' ) != '' || get_field( 'bureau' ) != '' ) {
					echo '<span class="team-title">' . ucwords( str_replace( '-', ' ', get_field( 'team' ) ) ) . ' ' . ucwords( str_replace( '-', ' ', get_field( 'role' ) ) ) . ', ' . str_replace( 'Washington Dc', 'Washington, D.C.', ucwords( str_replace( '-', ' ', get_field( 'bureau' ) ) ) ) . '</span>';
				}
				/*
				social_media_outlets
				-social_media_type
				-social_media_handle*/
				?>
			  <div class="staff-social-links">
				<?php
				if ( have_rows( 'social_media_outlets' ) ) {
					while ( have_rows( 'social_media_outlets' ) ) {
						the_row();
						if ( get_sub_field( 'social_media_type' ) != '' && get_sub_field( 'social_media_handle' ) != '' ) {
							if ( get_sub_field( 'social_media_type' ) == 'twitter' ) {
								?>
					  <a href="https://www.twitter.com/<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
				  <?php } elseif ( get_sub_field( 'social_media_type' ) == 'email' ) { ?>
					  <a href="mailto:<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fas fa-envelope-square"></i></a>
			  <?php } elseif ( get_sub_field( 'social_media_type' ) == 'instagram' ) { ?>
					  <a href="https://www.instagram.com/<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
			  <?php } elseif ( get_sub_field( 'social_media_type' ) == 'facebook' ) { ?>
					  <a href="https://www.facebook.com/<?php echo get_sub_field( 'social_media_handle' ); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
				  <?php
			  }
						}
					}
				}
				?>
			  </div>
		  </li>
				<?php
			}
		}
		wp_reset_postdata();
		?>
	</ul>
	  <?php
  } else {
	  esc_html_e( 'No students found.', 'text-domain' );
  }
	?>

<h2 class="cn_sub_head-2">Our partners</h2>
<?php if ( have_rows( 'our_partners' ) ) { ?>
	<ul class="our_partners">
	<?php
	while ( have_rows( 'our_partners' ) ) {
		the_row();
		echo '<li><a href="' . get_sub_field( 'partner_link' ) . '" target="_blank"><img src="' . get_sub_field( 'partner_logo' ) . '" alt="' . get_sub_field( 'partners_name' ) . '" /></a></li>';
	}
	?>
	</ul>
<?php } ?>

<p style="font-size: 0.8em;line-height: 22px;">Health stories are supported, in part, through a generous grant from the <a href="https://www.rwjf.org/" target="_blank">Robert Wood Johnson Foundation</a>, the nation’s largest philanthropy dedicated solely to health. The funding helped establish the <a href="https://cronkite.asu.edu/real-world-experiences/professional-programs/health-journalism" target="_blank">Southwest Health Reporting Initiative</a>, which provides health care news and information with a focus on Latino, Native American and Spanish-speaking border communities across the Southwest.</p>
<p style="font-size: 0.8em;line-height: 22px;">Sustainability stories are supported, in part, through a generous grant from the Corporation for Public Broadcasting. CPB is a private, nonprofit corporation created by Congress in 1967 that is the steward of the federal government’s investment in public broadcasting. The funding established <a href="https://elementalreports.com/" target="_blank">Elemental: Covering Sustainability</a>, a multimedia collaboration between <a href="https://cronkitenews.azpbs.org/" target="_blank">Cronkite News</a>, <a href="https://azpbs.org/" target="_blank">Arizona PBS</a>, <a href="https://kjzz.org/" target="_blank">KJZZ</a>, <a href="https://www.scpr.org/" target="_blank">KPCC</a>, <a href="http://www.rmpbs.org/home/" target="_blank">Rocky Mountain PBS</a> and <a href="https://www.pbssocal.org/" target="_blank">PBS SoCal</a>.</p>

</div>
</div>
</div>
