<?php

class Theme_Shortcode {
	public $sc;

	public function __construct() {
		$this->sc = IWF_CallbackManager_Shortcode::get_instance( 'theme' );
		$this->sc->set_callable_class( $this );

		$this->sc->add_shortcode( 'news' );
	}

	public function news( $attr, $content, $tag ) {
		$attr = shortcode_atts( array(
			'posts_per_page' => 5,
			'category'       => '',
			'type'           => '',
		), $attr, $tag );

		$query = array(
			'post_type'      => 'news',
			'posts_per_page' => $attr['posts_per_page'],
		);

		if ( $attr['category'] ) {
			$query['tax_query'] = array(
				array(
					'taxonomy' => 'news_category',
					'terms'    => $attr['category'],
					'field'    => 'slug'
				)
			);
		}

		$news_posts = get_posts( $query );

		ob_start();
		?>
		<div class="box-container <?php echo $attr['type'] ?>">
			<div class="box-container-header">
				<h2 class="box-container-title">お知らせ</h2>
				<a href="<?php echo get_post_type_archive_link( 'news' ) ?>" class="box-container-link">お知らせ一覧</a>
			</div>
			<div class="box-container-body">
				<ul class="news-list -no-category">
					<?php
					foreach ( $news_posts as $news_post ) {
						$category = IWF_Post::get_first_term( $news_post, 'news_category' );
						?>
						<li class="news-item">
							<span class="news-date"><?php echo get_the_time( 'Y/m/d', $news_post ) ?></span>
							<div class="news-title"><a href="<?php echo get_permalink( $news_post ) ?>"><?php echo get_the_title( $news_post ) ?></a></div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

global $theme_shortcode;
$theme_shortcode = new Theme_Shortcode();