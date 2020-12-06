<aside class="l-sidebar">
  <section class="p-news-sidebar__contents c-box--shadow">
    <h2 class="p-news-sidebar__title c-button">カテゴリで探す</h2>
    <ul class="p-news-sidebar__list">
      <?php
	        // 親カテゴリーのものだけを一覧で取得
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
    <?php // 年別アーカイブリストを表示
        $year=NULL; // 年の初期化
        $args = array( // クエリの作成
          'post_type' => 'post', // 投稿タイプの指定
          'orderby' => 'date', // 日付順で表示
          'posts_per_page' => -1 // すべての投稿を表示
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
          echo '<ul class="p-news-sidebar__list">';
          while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
            if ($year != get_the_date('Y')){ // 同じ年でなければ表示
              $year = get_the_date('Y'); // 年の取得
              echo '<li class="p-news-sidebar__list-item"><a href="'.home_url( '/', 'http' ).$year.'">'.$year.'</a></li>'; // 年別アーカイブリストの表示
            }
          endwhile; // ループの終了
          echo '</ul>';
          wp_reset_postdata(); // クエリのリセット
        }
        ?>
  </section>
</aside>