<?php

class Theme_Util {
	public static function get_term_color_style( $term ) {
		$bg_color   = iwf_get_term_meta( $term, null, 'bg_color' );
		$text_color = iwf_get_term_meta( $term, null, 'text_color' );

		if ( ! $bg_color || ! $text_color ) {
			return '';
		}

		return ' style="background-color: ' . $bg_color . '; color: ' . $text_color . '"';
	}

	public static function get_breadcrumb() {
		$breadcrumbs = array();

		if ( is_page() ) {
			foreach ( IWF_Post::get_parents( get_queried_object(), false, true ) as $parent ) {
				$breadcrumbs[] = iwf_html_tag( 'a', array( 'href' => get_permalink( $parent ) ), get_the_title( $parent ) );
			}

			$breadcrumbs[] = get_the_title( get_queried_object() );

		} else if ( is_post_type_archive( 'news' ) ) {
			$breadcrumbs[] = 'お知らせ';

		} else if ( is_post_type_archive( 'gallery' ) ) {
			$breadcrumbs[] = 'ギャラリー';

		} else if ( is_post_type_archive( 'library' ) ) {
			$breadcrumbs[] = 'ライブラリー';

		} else if ( is_tax( 'news_category' ) ) {
			$breadcrumbs[] = iwf_html_tag( 'a', array( 'href' => get_post_type_archive_link( 'news' ) ), 'お知らせ' );
			$breadcrumbs[] = get_queried_object()->name;

		} else if ( is_tax( 'gallery_category' ) ) {
			$breadcrumbs[] = iwf_html_tag( 'a', array( 'href' => get_post_type_archive_link( 'gallery' ) ), 'ギャラリー' );
			$breadcrumbs[] = get_queried_object()->name;

		} else if ( is_singular( 'news' ) ) {
			$breadcrumbs[] = iwf_html_tag( 'a', array( 'href' => get_post_type_archive_link( 'news' ) ), 'お知らせ' );
			$breadcrumbs[] = iwf_truncate( get_the_title( get_queried_object() ), 30 );
		}

		ob_start();
		?>
		<ul class="breadcrumb-list">
			<li class="breadcrumb-item"><a href="<?php echo home_url() ?>">HOME</a></li>
			<?php
			foreach ( $breadcrumbs as $breadcrumb ) {
				?>
				<li class="breadcrumb-item"><?php echo $breadcrumb ?></li>
				<?php
			}
			?>
		</ul>
		<?php
		return ob_get_clean();
	}

	public static function get_pager( $paged = null, $total_pages = null, $range = 5 ) {
		$html = '';

		if ( ! $paged ) {
			$paged = max( 1, get_query_var( 'paged' ) );
		}

		if ( ! $total_pages ) {
			global $wp_query;

			$total_pages = $wp_query->max_num_pages;
		}

		if ( $total_pages > 1 ) {
			$html .= '<ul class="pager">';

			if ( $paged > 1 ) {
				$html .= '<li><a href="' . get_pagenum_link( $paged - 1 ) . '" class="previous"><img src="' . get_stylesheet_directory_uri() . '/img/common/arrow_left_off.png" /></a></li>';
			}

			$odd = 0;

			if ( $paged <= $range ) {
				$offset = 1;
				$odd += $range - $paged + 1;

			} else {
				$offset = $paged - $range;
			}

			$max = $paged + $odd + $range;

			if ( $max > $total_pages ) {
				$odd = $max - $total_pages;
				$max = $total_pages;

				if ( $offset >= $odd ) {
					$offset -= $odd;

				} else {
					$offset = 1;
				}
			}

			for ( $i = $offset; $i <= $max; $i ++ ) {
				$html .= '<li>';
				$html .= ( $paged == $i ) ? '<span>' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '">' . $i . '</a>';
				$html .= '</li>';
			}

			if ( $paged < $total_pages ) {
				$html .= '<li><a href="' . get_pagenum_link( $paged + 1 ) . '" class="previous"><img src="' . get_stylesheet_directory_uri() . '/img/common/arrow_right_off.png" /></a></li>';
			}

			$html .= '</ul>';
		}

		return $html;
	}
}