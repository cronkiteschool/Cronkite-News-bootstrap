<?php
/*
 * Template Name: State Results Page
 */
get_header(); ?>




<body style="background-color:#FFF">
    <h2 style="text-align:center; font-family: 'Libre Baskerville', serif; padding-top:20px; font-size:200%;"> Arizona Election Results </h2>
    
    <section class="container-fluid" id="import-sec">
<!-- <?php print file_get_contents("https://jrnfs3.jmc.asu.edu/election/results2016/web.html")?>    -->
<?php include('https://jrnfs3.jmc.asu.edu/election/results2016/web.html') ?>
    </section>

  
</body>

<?php get_footer(); ?>
