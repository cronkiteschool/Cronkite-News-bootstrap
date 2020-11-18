<?php

/**
 * Template Name: Fullscreen Photo/Video Gallery
 * Story template without sidebar
 */

get_header('photogallery'); ?>

  <section id="gallery">
    <div id="phoenix-protest" class="photo-gallery">
      <div class="slide image-1">
        <div class="bg-text-gradient">
          <div class="summary first-slide">
            <h5><img src="<?php bloginfo('template_directory');?>/assets/img/eye-icon.svg" class="visual-story-icon" alt="Visual Story" title="Visual Story" />Visual Story</h5>
            <h1><?php echo get_the_title(); ?></h1>
            <?php echo $content = apply_filters('the_content', get_the_content()); ?>
            <p class="byline">By Aung N. Soe and Blake Benard/Special for Cronkite News | June 2, 2020</p>
            <a href="https://twitter.com/intent/tweet?url=https://cronkitenews.azpbs.org/2020/06/02/visual-story-protesters-phoenix/&text=Protesters%20take%20to%20the%20streets%20of%20downtown%20Phoenix.%20Watch%20how%20the%20demonstrations%20unfolded%20each%20day." target="_blank"><i class="fab fa-twitter"></i></a><a href="https://www.facebook.com/sharer/sharer.php?u=https://cronkitenews.azpbs.org/2020/06/02/visual-story-protesters-phoenix/" target="_blank"><i class="fab fa-facebook-f"></i></a><a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="slide image-2">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">May 28</h5>
            <p>On Thursday, protesters gathered in downtown Phoenix streets for hours before police declared it an unlawful assembly. Hundreds remained on the streets at the time and arrested eight adults.</p>
          </div>
        </div>
      </div>
      <div class="slide image-2"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-3"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-4"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-5"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-6">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">May 29</h5>
            <p>On Friday evening, protesters held a vigil for Dion Johnson, which turned into a march to Phoenix police headquarters. The DPS officer who shot Johnson was not equipped with a body or dash camera, and Johnson's family has asked for more information about his death. Protesters later damaged 18 properties – shattering doors and windows, spraying graffiti on walls, according to police.</p>
          </div>
        </div>
      </div>
      <div class="slide image-6"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-7"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-8">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">May 30</h5>
            <p>On Saturday, Phoenix officials warned protesters that police would take swift action if demonstrations turned criminal. Protests remained largely peaceful until nightfall, when police fired rubber bullets and tear gas into the crowd. Police arrested 114 people.</p>
          </div>
        </div>
      </div>
      <div class="slide image-8"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-9"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-10"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-11"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-12"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-13"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-14"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-15">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">May 31</h5>
            <p>On Sunday, Gov. Doug Ducey issued a statewide declaration of emergency, setting an 8 p.m. to 5 a.m. curfew that started Sunday and runs until June 8. Phoenix police arrested hundreds of people Sunday night.</p>
          </div>
        </div>
      </div>
      <div class="slide image-15"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-16"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-17"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-18"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-19"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-20"><span class="photo-credit">Aung N. Soe/Special for Cronkite News</span></div>
      <div class="slide image-21">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <h5 class="date">June 1</h5>
            <p>Monday’s demonstration ended peacefully soon after the 8 p.m. curfew took effect. Hundreds remained on the streets, however, and police arrested eight people.</p>
          </div>
        </div>
      </div>
      <div class="slide image-21"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-22"><span class="photo-credit">Blake Benard/Special for Cronkite News</span></div>
      <div class="slide image-22">
        <div class="internal-mask">
          <div class="summary internal-slide">
            <p>As protests and the curfew continue this week, this gallery may be updated.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer('photogallery'); ?>
