<?php

function readAssets() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
    wp_enqueue_script('main-script', get_theme_file_uri('/assets/js/index.js'), array( 'jquery' ), true);
    wp_enqueue_style('my_styles', get_template_directory_uri().'/assets/css/style.css');
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