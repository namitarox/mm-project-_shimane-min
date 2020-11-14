<!DOCTYPE html>
<html lang="jp">
<head>
<meta charset="UTF-8">
<meta name="description" content="島根県東部の救急医療をはじめ在宅まで総合的な医療・福祉活動を展開しています。">
<meta name="keywords" content="松江市,出雲市,松江生協病院,出雲市民病院,ひかわ生協病院,医学生,看護学生,看護師,医師,初期研修,後期研修,病院,診療所,">
<title><?php wp_title( '|', true, 'right' ) ?><?php bloginfo( 'name' ) ?></title>
<link rel="shortcut icon" href="http://shimane-min.com/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="http://shimane-min.com/favicon.ico" type="image/vnd.microsoft.icon" />
<?php wp_head() ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72178091-2', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div class="<?php echo is_page_template( 'tmpl-home.php' ) ? 'wrapper-top' : 'wrapper' ?>">
	<div class="global-header">
		<div class="site-desc">
			<div class="container">
				<p>島根県東部の救急医療をはじめ在宅まで総合的な医療・福祉活動を展開しています。</p>
				<div class="header-navi">
					<?php wp_nav_menu( array( 'theme_location' => 'header_navi', 'fallback_cb' => '', 'container' => '', 'depth' => 1 ) ) ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="clearfix">
				<div class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/common/logo.png" alt=""></a></div>
				<div class="global-navi">
					<ul class="global-navi-list">
						<li class="global-navi-item -doctor"><a href="<?php echo get_permalink( IWF_Post::get_by_template( 'tmpl-doctor.php' ) ) ?>" rel="#doctor">医師・医学生のページ</a></li>
						<li class="global-navi-item -narse"><a href="<?php echo get_permalink( IWF_Post::get_by_template( 'tmpl-narse.php' ) ) ?>" rel="#narse">看護・看護学生のページ</a></li>
						<li class="global-navi-item -about"><a href="<?php echo home_url( '/about' ) ?>" rel="#about">島根民医連について</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="global-sub-navi -doctor" id="doctor">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'doctor', 'fallback_cb' => '', 'container' => '', 'depth' => 1 ) ) ?>
			</div>
		</div>
		<div class="global-sub-navi -narse" id="narse">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'narse', 'fallback_cb' => '', 'container' => '', 'depth' => 1 ) ) ?>
			</div>
		</div>
		<div class="global-sub-navi -about" id="about">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'about', 'fallback_cb' => '', 'container' => '', 'depth' => 1 ) ) ?>
			</div>
		</div>
	</div>