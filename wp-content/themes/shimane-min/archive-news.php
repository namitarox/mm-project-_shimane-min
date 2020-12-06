<?php
/*
Template Name: news
*/
?>

<?php get_header(); ?>
<div class="l-wrapper l-wrapper--news l-wrapper--include-side">
  <main class="l-main">
    <div class="p-news p-news--news-page c-box--shadow">
      <h2 class="c-heading--border-bottom">お知らせ</h2>
      <ul class="p-news__list">
        <?php
            $the_query = subLoop(10, $paged);

            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
          ?>
        <li class="p-news__item p-news__item--news-page">
          <p class="p-news__button--small c-button">
            <?php the_category(); ?>
          </p>
          <p class="p-news__item-title">
            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
          </p>
        </li>
        <?php
            endwhile;
          endif;
          wp_reset_postdata();
        ?>
      </ul>
      <div class="p-pagination">
        <?php pagination($the_query->max_num_pages);?>
      </div>
    </div>
  </main>
  <?php get_sidebar("news"); ?>
</div>
<?php get_footer(); ?>