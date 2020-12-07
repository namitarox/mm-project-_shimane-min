<?php get_header(); ?>
<div class="l-wrapper l-wrapper--doctor">
  <main class="l-main--individual-page">
    <div class="p-pages-first-view p-pages-first-view--doctor">
      <h2 class="p-pages-first-view__heading p-pages-first-view__heading--doctor">
        「人を診る」ということ<br />
        学びませんか
      </h2>
    </div>
    <div class="p-news c-box--shadow">
      <div class="p-news__heading-area">
        <h2 class="p-news__heading">お知らせ</h2>
        <p>
          <a href=<?php echo home_url("/news"); ?> class="p-news__button c-button">お知らせ一覧</a>
        </p>
      </div>
      <?php
        $the_query = subLoop(3, "doctor");
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
    </div>
    <div class="p-doctor c-box--shadow">
      <section class="p-training" id="doctor-training">
        <h3 class="c-heading--border-left">初期研修・後期研修</h3>
        <p class="p-training__text">
          初期研修は松江生協病院、 後期研修は 松江生協病院・出雲市民病院で行っています。
        </p>
        <div class="p-training__buttons">
          <p class="p-training__button-wrap">
            <a
              href="http://www.matsue-seikyo.jp/kenshui/index.html"
              class="p-training__button c-button"
              target="_blank">
              総合病院松江生協病院
            </a>
          </p>
          <p class="p-training__button-wrap">
            <a
              href="http://www.izumo-hp.com/katei/training/index.html"
              class="p-training__button c-button"
              target="_blank">
              出雲市民病院
            </a>
          </p>
        </div>
      </section>
      <section class="p-hospital-tour" id="doctor-hospital-tour">
        <h3 class="c-heading--border-left">病院見学・実習</h3>
        <p class="p-hospital-tour__text">
          島根民医連では、医学科1年生から6年生まで学年を問わず、病院見学・実習を受け入れています。医学生のみなさんのニーズに合わせてプログラムを作成することができます。ぜひ長期休暇等を利用して、見学・実習にお越しください。
        </p>
        <ul class="p-hospital-list u-mt--20">
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/matsue-hospital-tour.JPG" alt="松江生協病院で医師が説明しています" />
            </div>
            <p class="p-hospital-list__text">松江生協病院</p>
            <p class="u-font--small">「断らない救急」「総合医＋専門医」</p>
            <p class="p-hospital-list__button-wrap">
              <a
                href="http://www.matsue-seikyo.jp/kenshui/jisshu/index.html"
                target="_blank"
                class="p-hospital-list__button c-button">
                詳しく見る
              </a>
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/izumo-hospital-tour.jpg" alt="出雲市民病院で医師が説明しています" />
            </div>
            <p class="p-hospital-list__text">出雲市民病院</p>
            <p class="u-font--small">「家庭医療教育のノウハウあります」</p>
            <p class="p-hospital-list__button-wrap">
              <a
                href="http://www.izumo-hp.com/katei/student/training/index.html"
                target="_blank"
                class="p-hospital-list__button c-button"
              >詳しく見る
              </a>
            </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="総合病院松江生協病院" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">斐川生協病院</p>
            <p class="u-font--small">
              お電話にてご相談ください(0853-21-3360)
            </p>
            <p class="p-hospital-list__button-wrap">
              <a
                href="https://www.hikawa-hp.com/"
                target="_blank"
                class="p-hospital-list__button c-button">
                詳しく見る
              </a>
            </p>
          </li>
        </ul>
      </section>
      <section class="p-planning" id="doctor-planning">
        <h3 class="c-heading--border-left">企画</h3>
        <p class="p-planning__text">
          私たちは夢に向かって頑張る医学生をサポートするために、様々な企画をご用意しています。
        </p>
        <ul class="p-hospital-list u-mt--20">
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-1.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【＃医学生エール飯】医療系学生のみなさんへ無料でテイクアウトできるお弁当を配布しています。コロナ禍で人との関りが少なくなっていく中、手から手へお渡しするお弁当で頑張る学生を支えたい。そんな思いではじめました。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-2.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【＃医学生エール飯】医系学生サポートセンターの入口にて、お弁当を受け取ることができます。季節によってはプチイベントも開催！
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-3.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【＃医学生エール飯】毎回職員の手作り弁当をご用意。申し込み学生からのリクエストを随時受け付け、献立の参考にしています。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-4.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【ランチミーティング】週に1回、お昼休みに、医系学生サポートセンターで、ランチを無料で提供し、病院実習や学習企画をご案内しております。地域の組合員さんの美味しい家庭料理を味わいながら、交流しています。（現在はお休み中）
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-5.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【ディナーミーティング】平日の夕方の時間を利用して、学習会を開催しています。医療だけではなく、様々な社会問題について目を向ける機会にもなります。医師や病院職員を交えてディスカッションを行い、学びを深めています。ディナーミーティングでは低学年から高学年の学生も参加しています。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-6.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【お楽しみ企画】医師を交えた懇親会やサポセン忘年会等、職種や学年の垣根を越えて楽しく交流しています。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-7.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【臨床推論学習会】ジェネラリスト（総合診療医）とスペシャリスト（循環器専門医）それぞれから症例を提示し、研修医、医学生を交えてカンファレンスを行います
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-8.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【臨床推論学習会】2019年開催の様子
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-9.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【全国の民医連学習企画】全国の医学生や医療系学生と学習、交流する企画があります。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-10.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【フィールドワーク】現地に行き、生の声を聞くことができます。長島愛生園にてハンセン病について学習。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-11.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【フィールドワーク】水島工業地帯にて、公害問題について学習。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-12.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【フィールドワーク】鳥取県米子市淀江町にて、ごみ処理問題について学習。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-13.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【奨学金web説明】島根民医連奨学金制度の説明をwebで行っています。リモートで自宅から参加することができ、制度について知ることができます。随時承りますので、お気軽にご相談ください。
                </p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/doctor-plan-14.png" alt="" />
            </div>
            <p class="p-hospital-list__text">
                  【松江生協病院web研修説明会】松江生協病院の指導医から研修プログラムや特徴を聞くことができます。研修医から実際に研修している様子についてご紹介します。
                </p>
          </li>
        </ul>
      </section>
      <section class="p-support-center" id="doctor-support-center">
        <h3 class="c-heading--border-left">学生医サポートセンターの紹介</h3>
        <p class="p-support-center__text">
              サポートセンターは医系学生が自由に活用できる交流スペースです。コピー機や図書コーナーを利用できます。<br />
              ２階には休息、テスト勉強、打ち合わせ等に使用できる部屋があります。
            </p>
        <ul class="p-hospital-list u-mt--40">
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
          <li class="p-hospital-list__item">
            <div class="p-hospital-list__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/03_doctor/coming-soon.png" alt="" />
              <p class="p-hospital-list__coming-soon">coming soon</p>
            </div>
            <p class="p-hospital-list__text">coming soon</p>
          </li>
        </ul>
        <ul class="p-support-center__banner-list">
          <li class="p-support-center__banner">
            <a href="http://aequalis.jp/" target="_blank">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/doctor/banner_01.png" alt="" />
            </a>
          </li>
          <li class="p-support-center__banner">
            <a href="http://cfmd.jp/" target="_blank">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/doctor/banner_02.png" alt="" />
            </a>
          </li>
          <li class="p-support-center__banner">
            <a href="http://www.izumo-hp.com/icfm/" target="_blank">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/doctor/banner_03.png" alt="" />
            </a>
          </li>
          <li class="p-support-center__banner">
            <a href="http://www.resi-sapo.jp/" target="_blank">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/doctor/banner_04.jpg" alt="" />
            </a>
          </li>
        </ul>
      </section>
    </div>
  </main>
</div>
<?php get_footer(); ?>