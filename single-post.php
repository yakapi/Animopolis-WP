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
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="singlepost">
            <div class="singlepost__content">
                <div class="singleimagearticle">
                    <?php the_post_thumbnail(null, $size, $attr); ?>
                </div>
                <div class="singleconteneur">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                        <div class="singlepost__meta">
                            <p>
                                Publié le <?php the_date(); ?>
                            </p>
                        </div>
                </div>
            </div>
        </article>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>
</body>

</html>