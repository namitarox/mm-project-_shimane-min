	<div class="top-footer">
		<div class="top-footer-navi">
			<ul class="top-footer-navi-list">
				<li class="top-footer-navi-item -news"><a href="<?php echo get_post_type_archive_link( 'news' ) ?>">お知らせ</a></li>
				<li class="top-footer-navi-item -library"><a href="<?php echo get_post_type_archive_link( 'library' ) ?>">ライブラリー</a></li>
				<li class="top-footer-navi-item -gallery"><a href="<?php echo get_post_type_archive_link( 'gallery' ) ?>">ギャラリー</a></li>
				<li class="top-footer-navi-item -contact"><a href="<?php echo get_permalink( IWF_Post::get_by_template( 'tmpl-contact.php' ) ) ?>">お問い合わせ</a></li>
				<li class="top-footer-navi-item -blog">
					<div class="top-footer-sub-navi"><a href="http://ameblo.jp/matsueseikyo-teamj" target="_blank">総合病院松江生協病院重症チームのブログ</a></div>
					<div class="top-footer-sub-navi"><a href="http://ameblo.jp/matsue-seikyo-junkanki/" target="_blank">松江生協病院循環器内科のブログ</a></div>
				</li>
			</ul>
		</div>
		<div class="top-footer-privacy">
			<div class="container">Copyright© 島根県民主医療機関連合会 All rights reserved.</div>
		</div>
	</div>
	<div class="page-top">
		<div class="page-top-link"><a href="#top"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/common/page_top.png" alt=""></a></div>
	</div>
	<?php wp_footer() ?>
</div>
</body>
</html>