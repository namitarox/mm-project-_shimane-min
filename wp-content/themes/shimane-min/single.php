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
      <p class="p-news__back"><a href="<?php echo esc_url( home_url( '/news' ) ); ?>">お知らせ一覧へ戻る<i class="fas fa-arrow-right fa-fw p-news__back-icon"></i></a></p>
      <div class="p-news__sns-list">
        <div class="ninja_onebutton">
          <script type="text/javascript">
          //<![CDATA[
          (function(d) {
            if (typeof(window.NINJA_CO_JP_ONETAG_BUTTON_29dea5663d7f9ae6c6b605b81ac7698f) == 'undefined') {
              document.write("<sc" + "ript type='text\/javascript' src='\/\/omt.shinobi.jp\/b\/29dea5663d7f9ae6c6b605b81ac7698f'><\/sc" + "ript>");
            } else {
              window.NINJA_CO_JP_ONETAG_BUTTON_29dea5663d7f9ae6c6b605b81ac7698f.ONETAGButton_Load();
            }
          })(document);
          //]]>
          </script>
          <span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
        </div>
      </div>
    </section>
  </main>
  <?php get_sidebar("news"); ?>
</div>
<?php get_footer(); ?>