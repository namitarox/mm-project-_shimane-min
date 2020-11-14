<?php
/**
 * Template Name: ホーム
 */

get_header();
the_post();
?>
	<div class="main-image">
		<?php
		$slide_imagse = get_field( 'slide_images', 'options' );
		?>
		<ul class="main-image-slider">
			<?php
			foreach ( $slide_imagse as $slide_imags ) {
				?>
				<li style="background-image: url('<?php echo $slide_imags['image'] ?>');"></li>
				<?php
			}
			?>
		</ul>
		<div class="main-image-controller">
			<a href="#" class="main-image-prev"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/index/main_image_arrow_left.png" alt=""></a>
			<a href="#" class="main-image-next"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/index/main_image_arrow_right.png" alt=""></a>
		</div>
		<div class="main-image-pager"></div>
		<div class="main-image-overlay">
			<div class="top-news-container">
				<h2 class="top-news-container-title">お知らせ</h2>
				<ul class="top-news-list">
					<?php
					$news_posts = get_posts( array(
						'post_type'      => 'news',
						'posts_per_page' => 2
					) );

					foreach ( $news_posts as $news_post ) {
						$category = IWF_Post::get_first_term( $news_post, 'news_category' );
						?>
						<li class="top-news-item">
							<div class="top-news-category">
								<span<?php echo Theme_Util::get_term_color_style( $category ) ?>><?php echo $category ? $category->name : '未分類' ?></span>
							</div>
							<span class="top-news-date"><?php echo get_the_time( 'Y/m/d', $news_post ) ?></span>
							<div class="top-news-title"><a href="<?php echo get_permalink( $news_post ) ?>"><?php echo get_the_title( $news_post ) ?></a></div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
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
		</div>
	</div>
<?php
get_footer( 'home' );
