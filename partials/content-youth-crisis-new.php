<!-- main body container -->
<div class="grid-container full">

  <div id="intro" class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <img src="<?php bloginfo('template_directory');?>/assets/img/youth-crisis/ys-logo.svg" alt="Youth Suicide" title="Youth Suicide" class="logo animate__animated animate__fadeIn" />
    </div>
  </div>
</div>

<div class="grid-container video-content">
  <div class="grid-x grid-padding-x">
    <div class="large-6 cell text-center">
      <div class="responsive-embed">
        <iframe width="520" height="315" src="https://www.youtube.com/embed/sUUAoHzqzuA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <div class="large-6 cell">
        <?php echo get_field('overview'); ?>
        <p><a class="button rounded" href="https://cronkitenews.azpbs.org/youth-suicide/about/">About the project &#8594;</a></p>
    </div>
  </div>
</div>

<div class="grid-container main-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1>Stories</h1>
      <div class="separador"></div>
    </div>
    <div class="large-12 cell">
      <div class="youth-suicide-stories">
        <?php if (have_rows('stories')) : ?>
            <?php while (have_rows('stories')) :
                the_row(); ?>
              <div>
                <a href="<?php echo get_sub_field('story_link'); ?>">
                  <img src="<?php echo get_sub_field('photo'); ?>" />
                  <h3><?php echo get_sub_field('headline'); ?></h3>
                  <p><?php echo get_sub_field('summary'); ?></p>
                </a>
              </div>
            <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="grid-container main-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1>Videos</h1>
      <div class="separador"></div>
    </div>
    <div class="large-12 cell">
      <div class="youth-suicide-stories">
        <?php if (have_rows('videos')) : ?>
            <?php while (have_rows('videos')) :
                the_row(); ?>
              <div>
                <a href="<?php echo get_sub_field('video_link'); ?>">
                  <img src="<?php echo get_sub_field('photo'); ?>" />
                  <h3><?php echo get_sub_field('headline'); ?></h3>
                  <p><?php echo get_sub_field('summary'); ?></p>
                </a>
              </div>
            <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="grid-container partners-content">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1>Partners</h1>
      <div class="separador"></div>
    </div>
    <div class="large-12 cell text-center">
      <a href="https://www.azfoundation.org/" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/img/youth-crisis/azcommunityfoundation-logo.png" alt="Arizona Community Foundation" title="Arizona Community Foundation" /></a>
    </div>
  </div>
</div>
