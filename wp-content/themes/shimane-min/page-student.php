<?php
/*
Template Name: student
*/
?>

<?php get_header(); ?>
<div class="l-wrapper l-wrapper--student">
  <main class="l-main--individual-page">
    <div class="p-pages-first-view p-pages-first-view--student">
      <h2 class="p-pages-first-view__heading p-pages-first-view__heading--student">
        夢に向かって　進もう
      </h2>
    </div>
    <div class="p-student">
      <section class="p-news p-news--individual-page c-box--shadow" id="student-news">
        <div class="p-news__heading-area">
          <h2 class="p-news__heading">お知らせ</h2>
          <p>
            <a href="<?php echo esc_url( home_url( '/news' ) ); ?>" class="p-news__button c-button">お知らせ一覧
          </a>
        </p>
        </div>
        <?php
          $the_query = subLoop(3, "student");
          $counter = '';
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ++$counter;
        ?>
        <?php if ($counter <= 1) : ?>
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
      <section class="p-student-plan c-box--shadow" id="student-planning">
        <h3 class="c-heading--border-left">高校生向け企画</h3>
        <p class="p-student-plan__text">
          島根民医連では、医師を目指す高校生・受験生のみなさんを応援しています。様々な企画をご用意していますので、ぜひご参加ください。
        </p>
        <ul class="p-hospital-list u-mt--40">
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-1.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【模擬面接】病院職員や島根大学の先輩医学生を面接官に本番さながらの模擬面接を行います。実践練習で試験対策に。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-2.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【模擬面接】模擬面接の振り返りや先輩医学生との交流も行います。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-3.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医学科受験なんでも相談会】島根大学の先輩医学生から受験体験談や勉強のノウハウ、学生生活について話が聞けます。受験勉強の不安や悩みなど相談できます。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-4.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療講演】医師を目指す高校生さんと親御さん向けに、医療講演を行っています。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-5.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療講演】医師の仕事や患者さんから必要とされている医師像について、島根民医連で働いている医師より話を聞くことができます。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-6.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療講演】医師、先輩医学生と交流。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-7.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【入学前実習】松江生協病院・出雲市民病院・大曲診療所では、医学部医学科に進学される方を対象に病院実習の受け入れを行っています。入学前から実際の医療現場に触れ、大学で勉強するモチベーションを高めませんか？
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-8.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【入学前実習】見学だけではなく、多職種体験も実施しています。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-9.png" alt="出雲市民病院" />
            </div>
            <p class="p-hospital-list__text">
              【島根民医連奨学金制度説明会】医学科入学を予定している方や、医学科進学をお考えの方を対象に、奨学金制度について説明会を行っています。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-10.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】出雲市民病院・松江生協病院・斐川生協病院では、高校生の医療現場体験セミナーの受け入れを行っています。
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-11.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】病棟回診見学
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-12.png" alt="" />
            </div>
            <p class="p-hospital-list__text">【医療現場体験】手術室見学</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-13.png" alt="" />
            </div>
            <p class="p-hospital-list__text">【医療現場体験】手術室見学</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-14.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】放射線室見学
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-15.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】放射線室見学
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-16.png" alt="" />
            </div>
            <p class="p-hospital-list__text">【医療現場体験】聴診体験</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-17.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】血圧測定体験
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/06_student/student-plan-18.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
              【医療現場体験】訪問診療同行
            </p>
          </li>
        </ul>
        <p class="p-student-plan__button-wrap">
          <a href=<?php echo home_url("/contact"); ?>
          class="p-student-plan__button c-button"
                >
            奨学金制度はこちら
            </a>
        </p>
      </section>
    </div>
  </main>
</div>
<?php get_footer(); ?>