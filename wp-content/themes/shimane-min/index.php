<?php get_header(); ?>
<div class="l-first-view">
  <h2 class="l-first-view__catch-copy">
        私たち民医連は無差別・平等の<br />
        医療と福祉の実現を目指しています
      </h2>
</div>
<div class="l-wrapper l-wrapper--include-side">
  <main class="l-main">
    <?php
      $the_query = subLoop(9);
      $counter = '';
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ++$counter;
    ?>
    <?php if ($counter <= 1) : ?>
    <div class="p-news c-box--shadow">
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
    </div>
    <div class="p-about c-box--shadow" id="top-about">
      <h2 class="c-heading--border-bottom">島根民医連について</h2>
      <p class="p-about__summary">
            民医連とは、民主医療機関連合会の略称で、1953年に戦後の飢餓と伝染病が蔓延する中、医療に恵まれない人々と医療従事者が手を携えてつくられた各地の民主医療所の連合体のことを言います。<br />
            　島根では、全国に先駆けて、1950年に松江大衆診療所が開設され、島根民医連の歴史が始まりました。それから70年以上、いのちの平等を掲げ、地域の人々の声を大切にし、患者さんの立場に立った医療を実践してきました。現在、島根県東部の救急医療から在宅まで総合的な医療・福祉活動を展開しています。
          </p>
      <section class="p-platform" id="platform">
        <h3 class="c-heading--border-left">民医連綱領</h3>
        <div class="p-platform__text-wrap">
          <p>
                綱領とは、私たち民医連の理念、歴史、基本方針をまとめた文書です。日々の医療、介護の仕事や社会保障をよくする運動を進めるための羅針盤として、民医連で働く職員の拠り所となっています。<br />
                一．
                人権を尊重し、共同のいとなみとしての医療と介護・福祉をすすめ、人びとのいのちと健康を守ります<br />
                一．
                地域・職域の人びとと共に、医療機関、福祉施設などとの連携を強め、安心して住み続けられるまちづくりをすすめます<br />
                一．
                学問の自由を尊重し、学術・文化の発展に努め、地域と共に歩む人間性豊かな専門職を育成します<br />
                一．
                科学的で民主的な管理と運営を貫き、事業所を守り、医療、介護・福祉従事者の生活の向上と権利の確立をめざします<br />
                一．
                国と企業の責任を明確にし、権利としての社会保障の実現のためにたたかいます<br />
                一．
                人類の生命と健康を破壊する一切の戦争政策に反対し、核兵器をなくし、平和と環境を守ります<br />
                <br />
                私たちは、この目標を実現するために、多くの個人・団体と手を結び、国際交流をはかり、共同組織と力をあわせて活動します。<br />
                <br />
              </p>
          <p class="u-text-align--right">
                2010年2月27日<br />
                全日本民主医療機関連合会 第39回定期総会
              </p>
        </div>
      </section>
      <section class="p-summary" id="top-summary">
        <h3 class="c-heading--border-left">概要</h3>
        <table class="p-summary__table">
          <tbody>
            <tr>
              <th class="p-summary__table-title">名称</th>
              <td class="p-summary__table-content">
                島根県民主医療機関連合会（略称：島根民医連）
              </td>
            </tr>
            <tr>
              <th class="p-summary__table-title">連絡先</th>
              <td class="p-summary__table-content">
                <address>
                  ○本部<br />
                  〒690-0017 松江市西津田8-8-10<br />
                  TEL. 0852-31-3360<br />
                  ○学生サポートセンター<br />
                  〒693-0024 出雲市塩冶町神前1-6-2<br />
                  TEL. 0853-21-3360
                </address>
                <p>
                      <a href=<?php echo home_url("/contact"); ?> class="p-summary__button--wide c-button">
                        インターネットによるお問い合わせ
                      </a>
                    </p>
              </td>
            </tr>
            <tr>
              <th class="p-summary__table-title">アクセス</th>
              <td class="p-summary__table-content">
                <div class="p-summary__map">
                  <p>○本部</p>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3250.0297603448075!2d133.06597681555846!3d35.454057650004096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5p2-5rGf5biC6KW_5rSl55Sw55S6OC04LTEw!5e0!3m2!1sja!2sus!4v1450997925730" allowfullscreen></iframe>
                  <p class="u-mt--10">
                    <a
                      href="https://www.google.co.jp/maps/place/%E3%80%92690-0017+%E5%B3%B6%E6%A0%B9%E7%9C%8C%E6%9D%BE%E6%B1%9F%E5%B8%82%E8%A5%BF%E6%B4%A5%E7%94%B0%EF%BC%98%E4%B8%81%E7%9B%AE%EF%BC%98%E2%88%92%EF%BC%91%EF%BC%90/@35.4540533,133.0659768,17z/data=!3m1!4b1!4m2!3m1!1s0x355704e8004f9b5d:0xe12a3174390e3971"
                      class="p-summary__button c-button"
                      target="_blank"
                    >大きな地図でみる</a>
                  </p>
                </div>
                <div class="p-summary__map">
                  <p>○学生サポートセンター</p>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3254.2498408120737!2d132.75059351524988!3d35.34944548027299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35574464b87368e3%3A0x48699da68fce7525!2z5bO25qC55rCR5Li75Yy755mC5qmf6Zai6YCj5ZCI5Lya5Ye66Zuy5YiG5a6k!5e0!3m2!1sja!2sus!4v1450998005143" allowfullscreen></iframe>
                  <p class="u-mt--10">
                    <a
                      href="https://www.google.com/maps/place/%E5%B3%B6%E6%A0%B9%E6%B0%91%E4%B8%BB%E5%8C%BB%E7%99%82%E6%A9%9F%E9%96%A2%E9%80%A3%E5%90%88%E4%BC%9A%E5%87%BA%E9%9B%B2%E5%88%86%E5%AE%A4/@35.3494455,132.7505935,17z/data=!3m1!4b1!4m2!3m1!1s0x35574464b87368e3:0x48699da68fce7525"
                      class="p-summary__button c-button"
                      target="_blank">大きな地図でみる</a>
                  </p>
                </div>
                <p class="p-summary__text">
                      島根民医連出雲学生サポートセンターは島根大学正門から歩いて5分の位置にあります。<br />
                      常駐職員もいますのでぜひお気軽にお越しください。
                    </p>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="p-office" id="office">
        <h3 class="c-heading--border-left">事業所のご案内</h3>
        <div class="p-office__wrap">
          <p class="p-office__text">
                求人・採用情報については各事業所HPをご覧ください。
              </p>
          <div class="p-office__table">
            <div class="p-office__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/01_top_page/matsue-hospital.png" alt="松江生協病院" />
            </div>
            <ul class="p-office__list">
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      <a href="http://www.matsue-hew.jp/" target="_blank"
                        ><strong>松江保健生活協同組合</strong>
                      </a>
                    </p>
                <p class="p-office__item">松江市西津田8-8-10</p>
                <p class="p-office__item">0852-22-0723</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">総合病院松江生協病院</p>
                <p class="p-office__item">松江市西津田8-8-8</p>
                <p class="p-office__item">0852-23-1111</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">介護医療院 虹</p>
                <p class="p-office__item">松江市佐草町456-1</p>
                <p class="p-office__item">0852-24-1212</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">生協東出雲診療所</p>
                <p class="p-office__item">松江市東出雲町揖屋1137-1</p>
                <p class="p-office__item">0852-52-2264</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">ふれあい診療所</p>
                <p class="p-office__item">松江市西津田7-14-21</p>
                <p class="p-office__item">0852-23-1111</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">松江生協歯科クリニック</p>
                <p class="p-office__item">松江市西津田7-14-21</p>
                <p class="p-office__item">0852-26-0444</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">ふれあい診療所健診センター</p>
                <p class="p-office__item">松江市西津田7-14-21</p>
                <p class="p-office__item">0852-22-0843</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">のぞみ訪問看護ステーション</p>
                <p class="p-office__item">松江市西津田7-14-21</p>
                <p class="p-office__item">0852-25-8917</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">生協ヘルパーステーション</p>
                <p class="p-office__item">松江市佐草町456-1</p>
                <p class="p-office__item">0852-20-7655</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">ふれあいヘルパーステーション</p>
                <p class="p-office__item">松江市西津田7-14-21</p>
                <p class="p-office__item">0852-26-7608</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">学園ヘルパーステーション</p>
                <p class="p-office__item">松江市学園2-7-16</p>
                <p class="p-office__item">0852-26-9906</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">高齢者住宅ふらここ</p>
                <p class="p-office__item">松江市佐草町458-1</p>
                <p class="p-office__item">0852-61-1165</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">高齢者住宅なないろ</p>
                <p class="p-office__item">松江市佐草町456-1</p>
                <p class="p-office__item">0852-24-1212</p>
              </li>
            </ul>
          </div>
          <div class="p-office__table">
            <div class="p-office__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/01_top_page/hikawa-hospital.png" alt="斐川生協病院" />
            </div>
            <ul class="p-office__list">
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      <a href="http://www.hikawa-hp.com/" target="_blank"
                        ><strong>ひかわ医療生活協同組合</strong>
                      </a>
                    </p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-72-0321</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">斐川生協病院</p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-72-0321</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">斐川生協病院健診センター</p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-73-7140</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">ひかわ医療生協 地域活動部</p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-72-4577</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      ひかわ生協指定居宅介護支援事業所
                    </p>
                <p class="p-office__item">出雲市斐川町美南1507-1</p>
                <p class="p-office__item">0853-72-2407</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      訪問看護ステーション「チューリップ」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1507-1</p>
                <p class="p-office__item">0853-72-7532</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      訪問看護ステーション「チューリップ」平田サテライト
                    </p>
                <p class="p-office__item">出雲市平田町111</p>
                <p class="p-office__item">0853-63-5166</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">訪問リハビリテーション「ゆぃ」</p>
                <p class="p-office__item">出雲市斐川町美南1507-1</p>
                <p class="p-office__item">0853-73-8708</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      ヘルパーステーション「あおぞら」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1505-1</p>
                <p class="p-office__item">0853-73-3555</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      定期巡回随時対応型訪問介護看護事業所「かざぐるま」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1505-1</p>
                <p class="p-office__item">080-2890-4511</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      看護小規模多機能事業所「みなみ」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1507-1</p>
                <p class="p-office__item">0853-73-8705</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      看護小規模多機能事業所「みなみ」サテライト
                    </p>
                <p class="p-office__item">出雲市斐川町直江4884-1</p>
                <p class="p-office__item">0853-25-7280</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">デイサービス「きずな」</p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-72-0373</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">デイサービス「つむぎ」</p>
                <p class="p-office__item">出雲市斐川町直江4778-1</p>
                <p class="p-office__item">0853-31-4760</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">デイサービス「ふらみんご」</p>
                <p class="p-office__item">出雲市斐川町直江4883-1</p>
                <p class="p-office__item">0853-72-0353</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      サービス付き高齢者向け住宅<br />「あっとホームひかわ」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1507-1</p>
                <p class="p-office__item">0853-72-9930</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      住宅型有料老人ホーム<br />「あっとホームさふらん」
                    </p>
                <p class="p-office__item">出雲市斐川町美南1505-1</p>
                <p class="p-office__item">0853-72-7760</p>
              </li>
            </ul>
          </div>
          <div class="p-office__table">
            <div class="p-office__img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/01_top_page/izumo-hospital.png" alt="出雲市民病院" />
            </div>
            <ul class="p-office__list">
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      <a href="http://www.izumo-hewcoop.jp/" target="_blank"
                        ><strong>出雲医療生活協同組合</strong>
                      </a>
                    </p>
                <p class="p-office__item">出雲市塩冶町1536-1</p>
                <p class="p-office__item">0853-21-2735</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">出雲市民病院</p>
                <p class="p-office__item">出雲市塩冶町1536-1</p>
                <p class="p-office__item">0853-21-2722</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">出雲市民リハビリテーション病院</p>
                <p class="p-office__item">出雲市知井宮町238</p>
                <p class="p-office__item">0853-21-2733</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">大曲診療所</p>
                <p class="p-office__item">出雲市大津町1941</p>
                <p class="p-office__item">0853-21-1186</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">在宅支援センター</p>
                <p class="p-office__item">出雲市今市町新町827-21</p>
                <p class="p-office__item">0853-24-9551</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">出雲看護サービスセンター</p>
                <p class="p-office__item">出雲市今市町新町827-21</p>
                <p class="p-office__item">0853-24-2800</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      出雲市民病院 居宅介護支援事業所
                    </p>
                <p class="p-office__item">出雲市今市町新町827-21</p>
                <p class="p-office__item">0853-23-7370</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">有償ボランティア虹</p>
                <p class="p-office__item">出雲市今市町新町827-21</p>
                <p class="p-office__item">0853-31-9781</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">院内保育所 おひさま保育園</p>
                <p class="p-office__item">出雲市今市町新町827-21</p>
                <p class="p-office__item">0853-31-9801</p>
              </li>
            </ul>
          </div>
          <div class="p-office__table">
            <ul class="p-office__list">
              <li class="p-office__item-grid">
                <p class="p-office__item">
                      <a href="" target="_blank"
                        ><strong>医療法人社団 島根勤労者医療協会</strong>
                      </a>
                    </p>
                <p class="p-office__item">出雲市塩冶有原4-79番地</p>
                <p class="p-office__item">0853-23-3205</p>
              </li>
              <li class="p-office__item-grid">
                <p class="p-office__item">塩冶歯科診療所</p>
                <p class="p-office__item">出雲市塩冶有原4-79番地</p>
                <p class="p-office__item">0853-23-3205</p>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </main>
  <?php get_sidebar("front"); ?>
</div>
<?php get_footer(); ?>