<?php
/*
Template Name: FB Instant Articles Feed
*/
header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<rss version="2.0" xmlns:content="https://purl.org/rss/1.0/modules/content/">
';
?>

<channel>
  <title>Cronkite News Facebook Instant Articles Feed</title>
  <link>http://cronkitenews.azpbs.org</link>
  <description>This feed is for consumption by Facebook Instant Articles.</description>
  <language>en-us</language>
  <pubDate><?php echo date("c", strtotime(mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false))); ?></pubDate>
  <lastBuildDate><?php echo date("c", strtotime(mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false))); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>
<?php
    $args = array(
                'post_type'     => 'post',
                'posts_per_page'    => 10
            );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) :
        $loop->the_post();
        $content = wpautop(get_the_content());
   
        ?>
  <item>
    <title><?php echo the_title(); ?></title>
    <link><?php echo the_permalink(); ?></link>
    <description><?php the_field('story_tease'); ?></description>
    <pubDate><?php
    echo date("c", strtotime(mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false))); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
    <content:encoded>
        <![CDATA[
        <!doctype html>
        <html lang="en" prefix="op: https://media.facebook.com/op#">
          <head>
            <meta charset="utf-8">
            <link rel="canonical" href="<?php echo the_permalink(); ?>">
            <title><?php echo the_title(); ?></title>
            <meta property="op:markup_version" content="v1.0">
            <meta property="fb:article_style" content="CronkiteNews">
          </head>
          <body>
            <article>
              <header>
                      <h1><?php echo the_title(); ?></h1>
                      <time class="op-published" datetime="<?php
                        echo date("c", strtotime(mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false))); ?>"><?php
    echo date("c", strtotime(mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false))); ?></time>

                      <address><a><?php echo get_field('post_author'); ?></a></address>
                      <h3 class="op-kicker"><?php echo get_the_category_list(' | '); ?></h3>
                    <?php if (has_post_thumbnail()) { ?>
                    <figure data-feedback="fb:likes, fb:comments">
                        <?php echo the_post_thumbnail(); ?>
                        <figcaption class="op-vertical-bottom"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                      </figure>
                    <?php } ?>
              </header>

              <?php echo $content; ?>
             

            <figure class="op-tracker">
    <iframe>
            <script>
           (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
           (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
           m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
           })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

           ga('create', 'UA-3145657-18', 'auto');
           ga('set', 'fb-instant-article');
           ga('send', 'pageview');
           ga('set', 'campaignSource', 'Facebook');
           ga('set', 'campaignMedium', 'Instant Article');
           ga('send', 'pageview', {title: 'POST TITLE'});

       </script>

        <script>
            PARSELY = {
                autotrack: false,
                onload: function() {
                    PARSELY.beacon.trackPageView({
                        urlref: 'http://facebook.com/instantarticles'
                    });
                    return true;
                }
            }
        </script>
        <div id="parsely-root" style="display: none">
            <span id="parsely-cfg" data-parsely-site="cronkitenews.azpbs.org"></span>
        </div>
        <script>
            (function(s, p, d) {
            var h=d.location.protocol, i=p+"-"+s,
            e=d.getElementById(i), r=d.getElementById(p+"-root"),
            u=h==="https:"?"d1z2jf7jlzjs58.cloudfront.net"
            :"static."+p+".com";
            if (e) return;
            e = d.createElement(s); e.id = i; e.async = true;
            e.src = h+"//"+u+"/p.js"; r.appendChild(e);
            })("script", "parsely", document);
        </script>
        <!-- END Parse.ly Include: Standard -->
    </iframe>
</figure>
            </article>
          </body>
        </html>
        ]]>
    </content:encoded>
  </item>
    <?php endwhile; ?>
</channel>
</rss>
