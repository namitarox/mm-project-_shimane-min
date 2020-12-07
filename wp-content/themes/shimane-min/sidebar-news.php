<aside class="l-sidebar">
  <section class="p-news-sidebar__contents c-box--shadow">
    <h2 class="p-news-sidebar__title c-button">カテゴリで探す</h2>
    <ul class="p-news-sidebar__list">
      <?php
	      $args = array(
	      'parent' => 0,
	      'orderby' => 'term_order',
	      'order' => 'ASC'
	      );
	      $categories = get_categories( $args );
      ?>
      <?php foreach( $categories as $category ) : ?>
      <li class="p-news-sidebar__list-item">
        <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
  <section class="p-news-sidebar__contents c-box--shadow">
    <h2 class="p-news-sidebar__title c-button">年別で探す</h2>
    <?php
        $year=NULL;
        $args = array(
          'post_type' => 'post',
          'orderby' => 'date',
          'posts_per_page' => -1
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()){
          echo '<ul class="p-news-sidebar__list">';
          while ($the_query->have_posts()): $the_query->the_post();
            if ($year != get_the_date('Y')){
              $year = get_the_date('Y');
              echo '<li class="p-news-sidebar__list-item"><a href="'.home_url( '/', 'http' ).$year.'">'.$year.'</a></li>';
            }
          endwhile;
          echo '</ul>';
          wp_reset_postdata();
        }
        ?>
  </section>
</aside>