<?php
/**
 * Footer
 */
?>

	<!-- scripts -->
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/jquery.js"></script>
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
	<div class="hidden">
		<script type="text/javascript">
		function preloader() {
			if (document.images) {
				var img3 = new Image();
			var img4 = new Image();
			var img5 = new Image();
			var img6 = new Image();
			var img7 = new Image();
			var img8 = new Image();
			var img9 = new Image();

				img3.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-3.jpg";
			img4.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-4.jpg";
			img5.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-5.jpg";
			img6.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-6.jpg";
			img7.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-7.jpg";
			img8.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-8.jpg";
			img9.src = "https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-10.jpg";
			}
		}

		function addLoadEvent(func) {
			var oldonload = window.onload;
			if (typeof window.onload != 'function') {
				window.onload = func;
			} else {
				window.onload = function() {
					if (oldonload) {
						oldonload();
					}
					func();
				}
			}
		}
		addLoadEvent(preloader);
		</script>
	</div>

	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/vendor/jquery.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/vendor/what-input.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/vendor/foundation.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/vendor/waypoints-master/lib/jquery.waypoints.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/vendor/waypoints-master/lib/shortcuts/inview.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/mlk/js/app.js"></script>

  </body>
</html>
