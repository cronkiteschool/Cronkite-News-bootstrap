<!-- main body container -->
<div id="main_container" class="grid-container">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <h1 class="main-title-hdr" style="padding-left:10px;"><?php the_title(); ?></h1>
    </div>
    <div class="large-12 cell">
      <?php if (have_posts()) { ?>
            <?php while (have_posts()) {
                the_post(); ?>
                <?php the_content(); ?>
                <?php
            } ?>
      <?php } ?>
    </div>
  </div>
