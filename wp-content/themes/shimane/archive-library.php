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
							<h2 class="box-container-title">ライブラリー</h2>
						</div>
						<div class="box-container-body">
							<ul class="library-list">
								<?php
								while ( have_posts() ) {
									the_post();
									?>
									<li class="library-item">
										<a href="<?php echo $post->url ?>" target="_blank">
											<div class="library-icon"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/library/list_icon.png" alt=""></div>
											<div class="library-title"><?php the_title() ?></div>
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
						<h2 class="side-navi-title">年別で探す</h2>
						<ul class="side-navi-list">
							<?php wp_get_archives( array( 'post_type' => 'library', 'type' => 'yearly' ) ) ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
