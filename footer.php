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

            </div><!-- END of .col -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
                <h4><?php the_field('area_3_title','options'); ?></h4>
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
                        <?php the_field('copyright','options');?>
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
</body>
</html>