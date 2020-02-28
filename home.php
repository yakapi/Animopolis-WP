<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis::News</title>
  <?php wp_head(); ?>
</head>
<?php
wp_body_open();
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="post">
      <div class="img__post"><?php the_post_thumbnail(); ?></div>
      <div class="post__content">
        <div class="conteneur">
          <h2><?php the_title(); ?></h2>
          <p class="post__meta">
            Publié le <?php the_time(get_option('date_format')); ?>
          </p>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
          </p>
        </div>
      </div>
    </article>
<?php endwhile;
endif;
get_footer();
wp_footer();
?>
</body>

</html>