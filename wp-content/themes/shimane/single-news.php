<?php
get_header();
the_post();

$category = IWF_Post::get_first_term( $post, 'news_category' );
?>
	<div class="global-body">
		<div class="container">
			<?php echo Theme_Util::get_breadcrumb() ?>
			<div class="clearfix">
				<div class="content-primary">
					<div class="box-container">
						<div class="box-container-header">
							<h2 class="box-container-title"><?php the_title() ?></h2>
						</div>
						<div class="box-container-body">
							<div class="section">
								<div class="clearfix">
									<!--<div class="news-detail-date"><?php the_time( 'Y/m/d' ) ?></div>-->
									<div class="news-detail-category"><span<?php echo Theme_Util::get_term_color_style( $category ) ?>><?php echo $category ? $category->name : '未分類' ?></span></div>
								</div>
								<div class="news-detail-content">
									<?php the_content() ?>
									<div class="u-mt-60px u-tr"><a href="<?php echo get_post_type_archive_link( 'news' ) ?>" class="cursor-button -cursor-right">お知らせ一覧へ戻る</a></div>
								</div>
								<div class="news-sns">
									<div class="ninja_onebutton">
										<script type="text/javascript">
											//<![CDATA[
											(function (d) {
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
							</div>
						</div>
					</div>
				</div>
				<div class="content-secondary">
					<div class="box-container">
						<h2 class="side-navi-title">カテゴリで探す</h2>
						<ul class="side-navi-list">
							<?php wp_list_categories( array( 'taxonomy' => 'news_category', 'show_option_none' => false, 'title_li' => false ) ) ?>
						</ul>
					</div>
					<div class="box-container">
						<h2 class="side-navi-title">年別で探す</h2>
						<ul class="side-navi-list">
							<?php wp_get_archives( array( 'post_type' => 'news', 'type' => 'yearly' ) ) ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
