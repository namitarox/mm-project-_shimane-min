<?php

function readAssets() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
    wp_enqueue_script('main-script', get_theme_file_uri('/assets/js/index.js'), array( 'jquery' ), true);
    wp_enqueue_style('my_styles', get_template_directory_uri().'/assets/css/style.css');
}

function addCustomPosts() {
    /* カスタム投稿タイプを追加 */
    add_action( 'init', 'create_post_type' );
    function create_post_type() {
        register_post_type( 'news', //カスタム投稿タイプ名を指定
            array(
                'labels' => array(
                'name' => __( 'お知らせ' ),
                'singular_name' => __( 'お知らせ' )
            ),
            'public' => true,
            'has_archive' => true, /* アーカイブページを持つ */
            'menu_position' =>5, //管理画面のメニュー順位
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',      'custom-fields' ,'comments' ),
            )
        );

        register_taxonomy(
        'news_category', /* タクソノミーの名前 */
        'news', /* 使用するカスタム投稿タイプ名 */
        array(
          'hierarchical' => true, /* trueだと親子関係が使用可能。falseで使用不可 */
          'update_count_callback' => '_update_post_term_count',
          'label' => 'お知らせカテゴリー',
          'singular_label' => 'お知らせカテゴリー',
          'public' => true,
          'show_ui' => true
          ));
    }
}

function limitCharacter($post, $limit) {
    $mbStrength = mb_strlen($post->post_content);

    if($mbStrength > $limit) {
      $content= mb_substr(strip_tags($post->post_content),0,$limit) ;
      echo $content. '…' ;
    } else {
      echo str_replace('\n', '', strip_tags($post->post_content));
    }
}

function subLoop($number = -1, $category = "",$paged = "") {
  $args = array(
      'post_type' => 'post',
      'posts_per_page' => $number,
      'category_name' => $category,
      'no_found_rows' => false,
      'paged' => $paged,
    );
    $the_query = new WP_Query($args);

    return $the_query;
}

function pagination($pages = '', $range = 2) {
    $showItems = ($range * 2)+1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<ul class="p-pagination__list">';
        if ($paged > 1) {
            echo "<li class='p-pagination__item p-pagination__item--arrow'><a href='".get_pagenum_link($paged - 1)."'><i class='fas fa-arrow-left fa-fw'></i></a></li>";
        }

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showItems)) {
                echo ($paged == $i)? "<li class='p-pagination__item is-active'><a  href='".get_pagenum_link($i)."'><span>".$i."</span></a></li>":"<li class='p-pagination__item'><a href='".get_pagenum_link($i)."'><span>".$i."</span></a></li>";
            }
        }

        if ($paged < $pages) {
            echo "<li class='p-pagination__item p-pagination__item--arrow'><a href='".get_pagenum_link($paged + 1)."'><i class='fas fa-arrow-right fa-fw'></i></a></li>";
        }
        echo '</ul>';
    }
}

function cancelAutoParagraph() {
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
}

function wpActiveFunction() {
  add_theme_support('post-thumbnails');
  cancelAutoParagraph();
  addCustomPosts();
}

function hooks() {
  add_action('wp_enqueue_scripts', 'readAssets');
}

function init() {
  wpActiveFunction();
  hooks();
}


init();