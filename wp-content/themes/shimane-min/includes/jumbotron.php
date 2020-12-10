<div class="p-news__top-item">
  <a href="<?php the_permalink();?>" class="p-news__top-inner">
    <div class="p-news__top-img">
      <?php
        if(has_post_thumbnail()):
          the_post_thumbnail();
        else:
      ?>
      <img src="<?php echo get_template_directory_uri();?>/assets/images/common/news-thumbnail.png" alt="詳しくは記事をご覧ください" />
      <?php endif; ?>
    </div>
    <p class="p-news__top-text">
      <?php limitCharacter($post, 150); ?>
    </p>
  </a>
</div>