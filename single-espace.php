<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis :: <?php the_title()?></title>
  <?php wp_head(); ?>
</head>
<?php
wp_body_open();
get_header();
?>
<div class="banner-box">
  <a class="da-blk" style="color: <?php the_field('color-banner') ?>" href="#">
    <div class="banner-content-box rltv">
      <div class="banner-content-title w-100 h-100 ablst">
        <div class="banner-box-sizer">
          <div class="banner-title mall-15">
            <?php the_post_thumbnail(); ?>
            <h2>Espace <?php the_title(); ?></h2>
          </div>
          <h3 class="mall-15 slog"><?php the_field('slogan'); ?></h3>
        </div>
      </div>
      <div class="banner-image">
        <?php
        $image = get_field('image');
        if (!empty($image)) : ?>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
      </div>
    </div>
  </a>
</div>
<?php
$espace_name = get_the_title();
$espace = $espace_name . '-besancon';

// Récupérer l'ID du tag en fonction du slug de l'esapce
$tag = get_term_by('name', lcfirst($espace_name), 'post_tag')->term_id;
//Animopolis/wp-json/wp/v2/posts appel API REST

$argument = array('post_type' => 'marque');
$query = new WP_Query($argument);
$cat = [];
$cat_ids = [];
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $category = get_the_category();
    $query->the_post();
    for ($i = 0; $i < count($category); $i++) {
      array_push($cat, $category[$i]->cat_name);
      array_push($cat_ids, $category[$i]->cat_ID);
    };
  }

} else {
  echo "error";
}
/* Restore original Post Data */
wp_reset_postdata();

global $post;
$post_slug = $post->post_name;

$argument = array('post_type' => 'espace', 'name' => $post_slug );
$query = new WP_Query($argument);
$color_box = "";
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    $color_box = get_field('border-filter');
  }

} else {
  echo "error";
}
/* Restore original Post Data */
wp_reset_postdata();

$unik_cat = array_unique($cat);
$unik_cat = array_values($unik_cat);
$cat_ids = array_unique($cat_ids);
$cat_ids = array_values($cat_ids);

?>
<nav style="color: <?php the_field('filter-color') ?>; border-top: 2px solid <?php the_field('border-filter') ?>" class="w-100 filter-nav-brand">
  <ul class="filter-brand flx-ac">
    <?php
    for ($i = 0; $i < count($unik_cat); $i++) {
    ?>
      <li class="filter-list txt-maj pall-5 mall-15 txt-c">
        <p class="filter-button" data-tag="<?php echo $tag ?>" data-cat_id="<?php echo $cat_ids[$i]  ?>" data-border="<?php echo $color_box ?>"><?php echo $unik_cat[$i] ?></p>
      </li>
    <?php
    }
    ?>
  </ul>
</nav>
<div class="brand-choice-screen w-100 flx-ac">
<div style="border-top: 1px solid <?php the_field('border-filter') ?>;" class="brand-choice-content pall-15">
<?php

$border_filter = get_field('border-filter');


$args = array('post_type' => 'marque', 'category_name' => 'marque', 'tag' => $espace);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
  echo '<ul id="marques" class="marque-block">';
  while ($the_query->have_posts()) {
    $the_query->the_post();
    echo "<li class='brand-card flx-ac mall-15'>";
    ?>
    <div style="border: 1px solid <?php echo $border_filter ?>"  class="affiche-brand-image flx-ac">
      <div class="encard-logo-brand">
        <?php the_post_thumbnail(); ?>
      </div>
    </div>
    <div class="content-brand pall-15 txt-cl-princ">
      <h2 class="txt-scde"><?php the_title(); ?></h2>
      <p class="ita"><?php the_field('slogan-brand'); ?></p>
      <p><?php the_field('intro-brand'); ?></p>
    </div>
    <?php
    echo "</li>";
  }
  echo '</ul>';
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
</div>
</div>
<?php

get_footer();
wp_footer();

?>
</body>

</html>
