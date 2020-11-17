<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
	<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
	<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
</head>

<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">

<?php $this->load_parts( array( 'header-bar-custom' ) ); ?>
	
<amp-sidebar id="sidebar"
  layout="nodisplay"
  side="right">

  <ul>
   <li> <a href="https://cronkitenews.azpbs.org/category/borderlands/">Borderlands</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/consumer/">Consumer</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/education/">Education </a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/future/">Future</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/government/">Government</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/health/">Health </a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/indian-country/">Indian Country</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/justice/">Justice</a></li>
   <li> <a href="https://cronkitenews.azpbs.org/category/money/">Money</a></li>
   <li><a href="https://cronkitenews.azpbs.org/category/sustainability/">Sustainability</a></li>
   <li class="newscast"> <a href="https://cronkitenews.azpbs.org/sitenewscast/">Newscast</a></li>
  </ul>
</amp-sidebar>  
	
<article class="amp-wp-article">

	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
		<div class="amp-wp-meta amp-wp-byline">
	
			<?php the_field( 'post_author' ); ?>
	   
		</div>
		<div class="amp-wp-meta amp-wp-posted-on">
		   <time datetime="<?php echo esc_attr( date( 'c', $this->get( 'post_publish_timestamp' ) ) ); ?>">
			  <?php echo get_the_date(); ?>
		   </time>
		</div>
	</header>             
	
<?php
$isvid = get_field( 'video_file', false, false );
if ( $isvid ) { // if we have a video load the video instead of the carousel

	function linkifyYouTubeURLs( $text ) {
		$text = preg_replace(
			'~(?#!js YouTubeId Rev:20160125_1800)
            # Match non-linked youtube URL in the wild. (Rev:20130823)
            https?://          # Required scheme. Either http or https.
            (?:[0-9A-Z-]+\.)?  # Optional subdomain.
            (?:                # Group host alternatives.
              youtu\.be/       # Either youtu.be,
            | youtube          # or youtube.com or
              (?:-nocookie)?   # youtube-nocookie.com
              \.com            # followed by
              \S*?             # Allow anything up to VIDEO_ID,
              [^\w\s-]         # but char before ID is non-ID char.
            )                  # End host alternatives.
            ([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
            (?=[^\w-]|$)       # Assert next char is non-ID or EOS.
            (?!                # Assert URL is not pre-linked.
              [?=&+%\w.-]*     # Allow URL (query) remainder.
              (?:              # Group pre-linked alternatives.
                [\'"][^<>]*>   # Either inside a start tag,
              | </a>           # or inside <a> element text contents.
              )                # End recognized pre-linked alts.
            )                  # End negative lookahead assertion.
            [?=&+%\w.-]*       # Consume any URL (query) remainder.
            ~ix',
			'$1',
			$text
		);
		return $text;
	}

	$host  = parse_url( $isvid );
	$isjpg = false;

	if ( $host['host'] == 'www.youtube.com' ) {
		$id      = linkifyYouTubeURLs( $isvid );
		$vidlink = $isvid;
		$myembed = '<amp-iframe width="300" height="200"
            sandbox="allow-scripts allow-same-origin"
            layout="responsive"
            frameborder="0"
            src="' . $vidlink . '">
            <amp-img layout="fill" src="https://cronkitenews.azpbs.org/wp-content/uploads/2017/06/CN_default.jpg" placeholder></amp-img>
            </amp-iframe>';
	}
	?>

	<?php echo $myembed; ?>


	<?php
} else {
	?>
  
	<?php $this->load_parts( array( 'featured-image' ) ); ?>
	
  <?php } ?>
	

	<div class="amp-wp-article-content">
		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
		
		
	</div>

	<footer class="amp-wp-article-footer">
		<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', array( 'meta-taxonomy-custom' ) ) ); ?>
	</footer>

</article>

<?php $this->load_parts( array( 'footer-custom' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>

