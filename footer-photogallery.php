<?php
/**
 * Footer
 */
?>

    <!-- scripts -->
    <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/jquery.js"></script>
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

    <!-- AlertMe website tag code -->
    <script>
      (function (d) { var src = 'https://app.alertme.news/build/'; var publisher = '100'; var head = d.getElementsByTagName('head')[0]; var script = d.createElement('script'); script.type = 'text/javascript'; script.src = src + 'button.js'; head.appendChild(script); script.onload = function () { AlertMeGlobalVariableNamespace.run(src, publisher); } })(document);
    </script>
    <!-- End AlertMe website tag code -->

    <!-- scripts -->
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick.min.js"></script>
    <script>
      $(document).ready(function(){

        $('.photo-gallery').slick({
          arrows: true,
          speed: 500,
          fade: true,
          dots: false,
          cssEase: 'ease-out'
        });

        var slideID = $(this).find('.slick-current').attr("data-slick-index");
        if (slideID == 0) {
          $('.slick-prev').hide();
        }

        $('.photo-gallery').on('afterChange', function(event, slick, currentSlide, nextSlide){
          console.log('currentSlide' + currentSlide);
          if (currentSlide == 0) {
            $('.slick-prev').fadeOut();
          } else {
            $('.slick-prev').fadeIn();
          }
        });

      });
    </script>

  </body>
</html>
