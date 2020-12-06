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
        'original_themes_cat', /* タクソノミーの名前 */
        'news', /* 使用するカスタム投稿タイプ名 */
        array(
          'hierarchical' => true, /* trueだと親子関係が使用可能。falseで使用不可 */
          'update_count_callback' => '_update_post_term_count',
          'label' => 'カテゴリー',
          'singular_label' => 'カテゴリー',
          'public' => true,
          'show_ui' => true
          ));
        /* カスタムタクソノミー、タグを使えるようにする */
        register_taxonomy(
          'original_themes_tag', /* タクソノミーの名前 */
          'news', /* 使用するカスタム投稿タイプ名 */
          array(
            'hierarchical' => false,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'タグ',
            'singular_label' => 'タグ',
            'public' => true,
            'show_ui' => true
        )
      );
    }
}

function subLoop($number = -1, $paged = "") {
  $args = [
    'post_type' => 'news', // カスタム投稿名が「news」の場合
    'posts_per_page' => 10, // 表示する数
    ];
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

function wpMenuOptimization($menu) {
    return preg_replace(array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu);
}

function cancelAutoParagraph() {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
}

function wpActiveFunction() {
    add_theme_support('post-thumbnails');

    register_nav_menus(
        array(
        'global' => 'グローバル',
        'footer' => 'フッター',
        )
    );

    add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
      function add_class_on_link($item_output, $item){
        return preg_replace('/(<a.*?)/', '$1' . " class='l-header-bottom__nav-link'", $item_output);
      }

    cancelAutoParagraph();
    addCustomPosts();
}


function hooks() {
    add_action('wp_enqueue_scripts', 'readAssets');
    add_filter('wp_nav_menu', 'wpMenuOptimization');
}

function init() {
    wpActiveFunction();
    hooks();
}


init();