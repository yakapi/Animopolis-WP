<section id="about" class="rltv mall-15 pall-15 about-sct">
  <div class="horaire-box mall-15">
    <div class="horaire-content pall-15">
      <h3 class="txt-c txt-maj"><?php the_field('titre1') ?></h3>
      <ul>
        <li><?php the_field('horaire-semaine') ?></li>
        <br>
        <li><?php the_field('horaire-weekend') ?></li>
      </ul>
      <p><?php the_field('jour-special') ?></p>
      <p><?php the_field('sup-info') ?></p>
    </div>
  </div>
  <div class="contact-box mall-15">
    <div class="contact-content pall-15">
      <h3 class="txt-c txt-maj"><?php the_field('titre2') ?></h3>
      <p><?php the_field('adresse') ?></p>
      <p><?php the_field('telephone') ?></p>
      <ul class="contact-social-media">
        <li><a href="<?php the_field('facebook-link') ?>"><i class="logo-media fab fa-facebook-square"></i></a></li>
        <li><a href="<?php the_field('instagram-link') ?>"><i class="logo-media fab fa-instagram-square"></i></a></li>
        <li><a href="<?php the_field('twitter-link') ?>"><i class="logo-media fab fa-twitter-square"></i></a></li>
      </ul>
    </div>
    <div class="btn-contact-content">
      <a class="da-blk h-100 txt-maj flx-ac" href="#">Contactez-nous</a>
    </div>
  </div>
  <div class="biographie-box mall-15">
    <div class="biographie-content pall-15">
      <h3 class="txt-c txt-maj"><?php the_field('titre3') ?></h3>
      <p class="pall-15"><?php the_field('description') ?></p>
      <div class="container-logo">
        <?php
        $images = get_field('image-about');
        // var_dump($images);
        if( $images ): ?>
            <ul class="w-100">
                <?php foreach( $images as $image ): ?>
                    <li>
                        <img src="<?php echo esc_url($image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
