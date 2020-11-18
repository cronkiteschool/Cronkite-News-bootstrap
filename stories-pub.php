<?php
/*
  Template Name: Story pub
*/
get_header(); ?>

<?php
  $args = array(
    'author' => 29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => array( 11 ),
    'date_query' => array(
                      array(
                          'after'     => 'August 17, 2020',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
  );
  $query = new WP_Query($args);
  echo '<p style="color:#fff;">Count: ' . $count = $query->found_posts . '</p>';
    ?>

<?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) :
        $query->the_post(); ?>
    <p style="color:#fff;"><?php echo get_the_title(); ?> <strong>by</strong> <?php echo $author = get_the_author(); ?></p>

    <?php endwhile; ?>
<?php endif; ?>

<h2>rest</h2>
<?php
  $args = array(
    'author' => -29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    /*'category__not_in' => array( 11 ),*/
    'date_query' => array(
                      array(
                          'after'     => 'August 17, 2020',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
  );
  $query = new WP_Query($args);
  echo '<p style="color:#fff;">Count: ' . $count = $query->found_posts . '</p>';
    ?>

<?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) :
        $query->the_post(); ?>
    <p style="color:#fff;"><?php echo get_the_title(); ?> <strong>by</strong> <?php echo $author = get_the_author(); ?></p>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
