<?php
/*
Template Name: nurse
*/
?>

<?php get_header(); ?>
<div class="l-wrapper--nurse">
  <div class="p-pages-first-view p-pages-first-view--nurse">
    <h2 class="p-pages-first-view__heading p-pages-first-view__heading--nurse">
      全ての人の「その人らしさ」を 援助する、<br />
      それが民医連の看護です。
    </h2>
  </div>
  <div class="c-grid u-mt--20">
    <main class="l-main">
      <?php
      $the_query = subLoop(9);
      $counter = '';
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ++$counter;
    ?>
      <?php if ($counter <= 1) : ?>
      <section class="p-news c-box--shadow">
        <div class="p-news__heading-area">
          <h2 class="p-news__heading">お知らせ</h2>
          <p>
          <a href=<?php echo home_url("/news"); ?> class="p-news__button c-button">お知らせ一覧</a>
        </p>
        </div>
        <?php get_template_part('includes/jumbotron'); ?>
        <ul class="p-news__list">
          <?php else: ?>
          <li class="p-news__item">
            <p><?php the_time('Y/m/d'); ?></p>
            <p class="p-news__item-title">
            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
          </p>
          </li>
          <?php endif;?>
          <?php
        endwhile;
          endif;
          wp_reset_postdata();
        ?>
        </ul>
      </section>
      <section class="p-hospital-introduction c-box--shadow" id="nurse-introduction">
        <h2 class="c-heading--border-bottom">各病院の紹介</h2>
        <ul class="p-hospital-introduction__list">
          <li class="p-hospital-introduction__list-item">
            <iframe class="p-hospital-introduction__video" src="https://www.youtube.com/embed/6nW0AjzpvTw?rel=0&amp;showinfo=0" allowfullscreen="allowfullscreen"></iframe>
            <p class="p-hospital-introduction__video-title">松江生協病院</p>
          </li>
          <li class="p-hospital-introduction__list-item">
            <iframe class="p-hospital-introduction__video" src="https://www.youtube.com/embed/MU6K0E2kjq0?rel=0&amp;showinfo=0" allowfullscreen="allowfullscreen"></iframe>
            <p class="p-hospital-introduction__video-title">出雲医療生協</p>
          </li>
          <li class="p-hospital-introduction__list-item">
            <iframe class="p-hospital-introduction__video" src="https://www.youtube.com/embed/wlKuBlwRnp0?rel=0&amp;showinfo=0" allowfullscreen="allowfullscreen"></iframe>
            <p class="p-hospital-introduction__video-title">斐川生協病院</p>
          </li>
        </ul>
      </section>
      <section class="p-support-center--nurse-page c-box--shadow" id="nurse-support-center">
        <h3 class="c-heading--border-left">学生医サポートセンターの紹介</h3>
        <p class="p-support-center__text">
          サポートセンターは医系学生が自由に活用できる交流スペースです。コピー機や図書コーナーを利用できます。２階には休息、テスト勉強、打ち合わせ等に使用できる部屋があります。
        </p>
        <ul class="p-hospital-list--nurse-page u-mt--40">
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item--nurse-page">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/05_nurse/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
        </ul>
      </section>
    </main>
    <?php get_sidebar("nurse"); ?>
  </div>
</div>
<?php get_footer(); ?>