<?php get_header(); ?>
<div class="l-wrapper l-wrapper--news l-wrapper--include-side">
  <main class="l-main">
    <section class="p-news p-news--news-page c-box--shadow">
      <?php
        if (have_posts()):
          while (have_posts()):the_post();
      ?>
      <h2 class="c-heading--border-bottom u-pl--65"><?php the_title(); ?></h2>
      <p class="p-news__button p-news__button--small p-news__button--single c-button">
        <?php $cat = get_the_category(); ?>
        <?php $cat = $cat[0]; ?>
        <?php echo get_cat_name($cat->term_id); ?>
      </p>
      <p class="p-news__article">
        <?php the_content(); ?>
        <?php
            endwhile;
          endif;
        ?>
      </p>
      <ul class="p-news__sns-list">
        <li class="p-news__sns-item p-news__sns-item--twitter">
          <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter fa-fw"></i><span>ツイート</span></a>
        </li>
        <li class="p-news__sns-item p-news__sns-item--facebook">
          <a href="https://www.facebook.com/" target="_blank"><i class="fas fa-thumbs-up"></i><span>いいね!</span></a>
        </li>
      </ul>
    </section>
  </main>
  <?php get_sidebar("news"); ?>
</div>
<?php get_footer(); ?>