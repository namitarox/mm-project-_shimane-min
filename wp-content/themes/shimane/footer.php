	<div class="global-footer">
		<div class="container">
			<div class="clearfix">
				<div class="info-container">
					<ul class="info-list">
						<li class="info-item"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/index/top_contact_logo.png" alt=""></li>
						<li class="info-item">
							<dl class="info-detail">
								<dt class="info-title">本　部</dt>
								<dd class="info-address">〒690-0017 松江市西津田町8-8-10</dd>
								<dd class="info-tel">0852-31-3360</dd>
							</dl>
						</li>
						<li class="info-item">
							<dl class="info-detail">
								<dt class="info-title">学生サポートセンター</dt>
								<dd class="info-address">〒693-0024 出雲市塩冶町神前1-6-2　</dd>
								<dd class="info-tel">0853-21-3360</dd>
							</dl>
						</li>
					</ul>
				</div>
				<div class="footer-navi">
					<ul class="footer-navi-list">
						<?php wp_nav_menu(array('theme_location' => 'footer_navi', 'fallback_cb' => '', 'container' => '', 'depth' => 2, 'menu_class' => 'footer-navi-list')) ?>
					</ul>
				</div>
			</div>
			<div class="footer-privacy">Copyright© 島根県民主医療機関連合会 All rights reserved.</div>
		</div>
	</div>
	<div class="page-top">
		<div class="page-top-link"><a href="#top"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/common/page_top.png" alt=""></a></div>
	</div>
	<?php wp_footer() ?>
</div>
</body>
</html>