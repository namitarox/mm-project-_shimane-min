<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <title><?php bloginfo('name');  ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <header class="l-header">
    <div class="l-header-top">
      <div class="l-header-top__inner">
        <p class="l-header-top__text">
            島根県東部の救急医療をはじめ在宅まで総合的な医療・福祉活動を展開しています。
          </p>
        <div class="l-header-top__links">
          <p class="l-header-top__link-item"><a href=<?php echo home_url(); ?>>ホーム</a></p>
          <p class="l-header-top__link-item">
              <a href=<?php echo home_url("/contact"); ?>>お問い合わせ</a>
            </p>
        </div>
      </div>
    </div>
    <div class="l-header-bottom">
      <div class="l-header-bottom__inner">
        <h1 class="l-header-bottom__logo">
            <a href=<?php echo home_url();?>
              >
          <img src="<?php echo get_template_directory_uri();?>/assets/images/common/logo.png" alt="島根民主医療機関連合会">
        </a>
          </h1>
        <nav class="l-header-bottom__nav">
          <ul class="l-header-bottom__nav-list">
            <?php
            wp_nav_menu(
                array(
                  'theme_location' => 'global',
                  'container' => false,
                )
            );
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>