<div class="p-news__top-item">
  <a href="<?php the_permalink();?>" class="p-news__top-inner">
    <div class="p-news__top-img">
      <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>" alt="">
    </div>
    <p class="p-news__top-text">
      <?php limitCharacter($post, 120); ?>
    </p>
  </a>
</div>