<?php
/*
Template Name: dentist
*/
?>

<?php get_header(); ?>
<div class="l-wrapper l-wrapper--dentist">
  <main class="l-main--individual-page">
    <div class="c-box--shadow">
      <div class="p-pages-first-view p-pages-first-view--dentist">
        <h2 class="p-pages-first-view__heading p-pages-first-view__heading--dentist">
          「いつでも、だれもがかかりやすい」<br />
          それが民医連の歯科です
        </h2>
      </div>
      <section class="p-dentist-recruit">
        <h2 class="c-heading--border-bottom">歯科職員募集</h2>
        <div class="p-dentist-recruit__contents">
          <h3 class="c-heading--border-left">対象</h3>
          <ul class="p-dentist-recruit__target-list">
            <li class="p-dentist-recruit__target-item">
              <p>●歯科医師</p>
              <p>既卒または2019年度卒後臨研修了者（常勤 2名）</p>
            </li>
            <li class="p-dentist-recruit__target-item">
              <p>●歯科衛生士</p>
              <p>既卒または2020年新卒者（常勤 2名・パート 1名）</p>
            </li>
          </ul>
        </div>
        <div class="p-dentist-recruit__contents">
          <h3 class="c-heading--border-left">募集先（勤務先）</h3>
          <div class="p-dentist-recruit__place">
            <p>医療法人社団 島根勤労者医療協会</p>
            <p>塩冶歯科診療所</p>
          </div>
        </div>
        <div class="p-dentist-recruit__contents">
          <h3 class="c-heading--border-left">就業条件等（リンク先）</h3>
          <div class="p-dentist-recruit__conditions">
            <p>●歯科医師</p>
            <ul class="p-dentist-recruit__grid">
              <li class="p-dentist-recruit__grid-item">
                ・
                <a class="p-dentist-recruit__link" href="https://www.guppy.jp/dds/607918" rel="noopener" target="_blank">既卒常勤</a>
              </li>
              <li class="p-dentist-recruit__grid-item">
                ・
                <a class="p-dentist-recruit__link" href="https://www.guppy.jp/dds/607977" rel="noopener" target="_blank">既卒パート</a>
              </li>
            </ul>
            <p class="u-mt--20">●歯科衛生士</p>
            <ul class="p-dentist-recruit__grid">
              <li class="p-dentist-recruit__grid-item">
                ・
                <a class="p-dentist-recruit__link" href="https://www.guppy.jp/dh/607979" rel="noopener" target="_blank">既卒常勤</a>
              </li>
              <li class="p-dentist-recruit__grid-item">
                ・
                <a class="p-dentist-recruit__link" href="https://www.guppy.jp/dds/607977" rel="noopener" target="_blank">既卒パート</a>
              </li>
            </ul>
          </div>
        </div>
        <p class="p-dentist-recruit__button-wrap">
          <a
            href=<?php echo home_url("/contact"); ?>
            class="p-dentist-recruit__button c-button"
          >
            お問い合わせ
            </a>
        </p>
      </section>
    </div>
    <section class="p-dentist-scholarship c-box--shadow" id="dentist-scholarship">
      <h2 class="c-heading--border-bottom">歯科医学生の奨学金</h2>
      <div class="p-dentist-scholarship__contents">
        <h3 class="c-heading--border-left">趣旨</h3>
        <p class="p-dentist-scholarship__purpose">
          この奨学金制度は、卒後、島根民医連（塩冶歯科診療所、松江生協歯科クリニック）の医療に参加される意志をもった歯科医学生のみなさんに、その要望に応え勉学の経済的な援助を行う目的で設けられています。
        </p>
      </div>
      <div class="p-dentist-scholarship__contents u-mt--40">
        <h3 class="c-heading--border-left">概要</h3>
        <div class="p-dentist-scholarship__amount">
          <p>奨学金支給額</p>
          <p>1、2年生：月額5万円 3～6年生：月額7万円</p>
        </div>
      </div>
      <div class="p-dentist-scholarship__contents">
        <h3 class="c-heading--border-left">返済免除</h3>
        <p class="p-dentist-scholarship__caution">
          卒後臨床研修修了後、島根民医連（塩冶歯科診療所、松江生協歯科クリニック）に勤務した場合、奨学金の返済が免除されます。
        </p>
      </div>
      <div class="p-dentist-scholarship__buttons">
        <p>
          <a
            href=<?php echo get_template_directory_uri().'/assets/images/02_scholarship/scholarship-lending-rules.pdf' ; ?>
            class="p-dentist-scholarship__button c-button"
            target="_blank"
          >
            歯科奨学金貸与規定
            </a>
        </p>
        <p class="u-ml--56">
          <a href=<?php echo home_url("/contact"); ?> class="p-dentist-scholarship__button c-button">
          お問い合わせ
          </a>
        </p>
      </div>
    </section>
  </main>
</div>
<?php get_footer(); ?>