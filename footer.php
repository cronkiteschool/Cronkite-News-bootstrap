<?php
/**
 * Footer
 */
?>

<footer class="dark-bg">
    <div class="container inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
                <h4><?php the_field('area_1_title','options'); ?></h4>
                <?php the_field('area_1_description','options'); ?>
            </div><!-- END of .col -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
                <h4><?php the_field('area_2_title','options'); ?></h4>
                <?php the_field('area_2_descriptiption','options'); ?>


            </div><!-- END of .col -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
                <h4><?php the_field('area_3_title','options'); ?></h4>
                <a href="/daily-newsletter-signup/">Sign up</a> for daily headlines
                <br><br>
                <ul class="social">

                    <?php if( have_rows('social_box','options') ): ?>
                        <?php while( have_rows('social_box','options') ): the_row();
                            // Declare variables below
                            $icon = get_sub_field('social_icon','options');
                            $link = get_sub_field('social_link','options');
                            // Use variables below ?>
                            <li>
                                <a target="_blank" href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" /></a>
                            </li>
<?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>

                </ul>
                <br>
                <?php the_field('area_3_description','options'); ?>
            </div><!-- END of .col -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">

               <h4><?php the_field('area_4_title','options'); ?></h4>
                <?php the_field('area_4_description','options'); ?>

<!--
                <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Type to search' ); ?>" />
                    <button  id="searchsubmit" type="submit" class="btn btn-default btn-submit icon-right-open"></button>
                </form>
-->
            </div><!-- END of .col -->
        </div><!-- END of .row-->
    </div><!-- END of .container-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright-box">
                        <?php echo str_replace('<p>', '<p>&copy; '.date('Y').' ',get_field('copyright','options'));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- END of footer -->

<?php wp_footer(); ?>
<script type='text/javascript'>
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.uid = 60481;
    _sf_async_config.domain = 'cronkitenews.azpbs.org';
    _sf_async_config.useCanonical = true;
    _sf_async_config.sections = 'Change this to your Section name';  //CHANGE THIS
    _sf_async_config.authors = 'Change this to your Author name';    //CHANGE THIS
    /** CONFIGURATION END **/
    (function(){
      function loadChartbeat() {
        window._sf_endpt=(new Date()).getTime();
        var e = document.createElement('script');
        e.setAttribute('language', 'javascript');
        e.setAttribute('type', 'text/javascript');
        e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
        document.body.appendChild(e);
      }
      var oldonload = window.onload;
      window.onload = (typeof window.onload != 'function') ?
         loadChartbeat : function() { oldonload(); loadChartbeat(); };
    })();
</script>

<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','nyyg8');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->

<script>
/**
 * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
 *
 * @private
 * @author Todd Motto
 * @link https://github.com/toddmotto/foreach
 * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
 * @callback requestCallback      callback   - Callback function for each iteration.
 * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
 * @returns {}
 */
	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

	var hamburgers = document.querySelectorAll(".hamburger");
	if (hamburgers.length > 0) {
		forEach(hamburgers, function(hamburger) {
			hamburger.addEventListener("click", function() {
				this.classList.toggle("is-active");
			}, false);
		});
	}

  // Search: expand on click
  $('.search-box img').click(function() {

    $('#searchform input[type=text]').blur(function() {
      if($.trim(this.value).length > 0) {
        $("#searchform").submit();
      } else {
      }
    });

    if ($('.search-box input.onSearchIconClick').length) {
      $('.search-box input').removeClass('onSearchIconClick');
    } else {
      $('.search-box input').addClass('onSearchIconClick');
    }
  });


	jQuery(document).ready(function() {
		jQuery('.hamburger').click(function() {
			if (jQuery('.hamburger.is-active').length) {
				jQuery('#sub_nav').addClass('open').removeClass('close');
				jQuery('.sub_nav').removeClass('slideOutUp').addClass('slideInDown');
				jQuery('.sub_nav').css("display", "block");
			} else {
				jQuery('#sub_nav').addClass('close').removeClass('open');
				jQuery('.sub_nav').removeClass('slideInDown').addClass('slideOutUp');
        jQuery('.sub_nav').css("display", "none");
			}
		});


		var $window = $(window);

		function checkWidth() {
				var windowsize = $window.width();
				if (windowsize > 800) {
						jQuery(window).scroll(function (event) {
								var scroll = $(window).scrollTop();
								if (scroll >= 250) {
									console.log('HERE!');
									jQuery('#sub_nav').removeClass('slideInDown').addClass('slideOutUp');
								} else if (scroll < 250) {
									console.log('HERE <!');
									jQuery('#sub_nav').removeClass('slideOutUp').addClass('slideInDown');
								}
						});
				}
		}
		// Execute on load
		checkWidth();
		// Bind event listener
		jQuery(window).resize(checkWidth);
	});
</script>

</body>
</html>
