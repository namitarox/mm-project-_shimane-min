<?php
$cpt = new IWF_Post( 'news', array(
	'label'       => 'お知らせ',
	'has_archive' => true,
	'supports'    => array( 'title', 'editor' )
) );

$tax = $cpt->taxonomy( 'news_category', array(
	'label'        => 'お知らせカテゴリー',
	'hierarchical' => true,
) );

$tax->component( 'テキストカラー' )->color( 'text_color', '#ffffff', array( 'show_alpha' => false ) );

$tax->component( 'ラベルカラー' )->color( 'bg_color', '#cccccc', array( 'show_alpha' => false ) );

$cpt = new IWF_Post( 'library', array(
	'label'       => 'ライブラリー',
	'has_archive' => true,
	'supports'    => array( 'title' )
) );

$mbx = $cpt->metabox( 'URL' );

$mbx->component( 'URL', false )->media( 'url', null, array( 'class' => 'iwf-w100p', 'placeholder' => 'http://' ) );

$cpt = new IWF_Post( 'gallery', array(
	'label'       => 'ギャラリー',
	'has_archive' => true,
	'supports'    => array( 'title', 'thumbnail' )
) );

$tax = $cpt->taxonomy( 'gallery_category', array(
	'label'        => 'ギャラリーカテゴリー',
	'hierarchical' => true,
) );