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
							<h2 class="box-container-title">ギャラリー</h2>
						</div>
						<div class="box-container-body">
							<ul class="gallery-list">
								<?php
								while ( have_posts() ) {
									the_post();
									$thumbnail = iwf_get_post_thumbnail_data( null, false );
									?>
									<li class="gallery-item">
										<a href="<?php echo $thumbnail['src'] ?>">
											<div class="gallery-photo"><img src="<?php echo iwf_timthumb( $thumbnail['src'], 213, 0 ) ?>" alt=""></div>
											<div class="gallery-title"><?php the_title() ?></div>
										</a>
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
							<?php wp_list_categories( array( 'taxonomy' => 'gallery_category', 'show_option_none' => false, 'title_li' => false ) ) ?>
						</ul>
					</div>
					<div class="box-container">
						<h2 class="side-navi-title">年別で探す</h2>
						<ul class="side-navi-list">
							<?php wp_get_archives( array( 'post_type' => 'gallery', 'type' => 'yearly' ) ) ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
