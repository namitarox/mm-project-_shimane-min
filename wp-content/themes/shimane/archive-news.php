<?php
get_header();
?>
	<div class="global-body">
		<div class="container">
			<?php echo Theme_Util::get_breadcrumb() ?>
			<div class="clearfix">
				<div class="content-primary">
					<div class="box-container">
						<div class="box-container-header">
							<h2 class="box-container-title">お知らせ一覧</h2>
						</div>
						<div class="box-container-body">
							<ul class="news-list">
								<?php
								while ( have_posts() ) {
									the_post();
									$category = IWF_Post::get_first_term( $post, 'news_category' );
									?>
									<li class="news-item">
										<span class="news-category"><span<?php echo Theme_Util::get_term_color_style( $category ) ?>><?php echo $category ? $category->name : '未分類' ?></span></span>
										<!--<span class="news-date"><?php the_time( 'Y/m/d' ) ?></span>-->
										<div class="news-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
									</li>
									<?php
								}
								?>
							</ul>
							<?php echo Theme_Util::get_pager() ?>
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
