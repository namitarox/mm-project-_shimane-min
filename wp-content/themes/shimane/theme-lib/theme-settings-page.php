<?php
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'スライド設定',
		'menu_title' => 'スライド設定',
		'menu_slug'  => 'kajiwara_slide',
		'capability' => 'manage_options',
		'position'   => false,
	) );
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group( array(
		'key'                   => 'group_5680cfd2ebff8',
		'title'                 => 'スライド設定',
		'fields'                => array(
			array(
				'key'               => 'field_5680cfdd77d5b',
				'label'             => 'スライドセット',
				'name'              => 'slide_images',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'collapsed'         => '',
				'min'               => 1,
				'max'               => '',
				'layout'            => 'block',
				'button_label'      => 'ブロックを追加',
				'sub_fields'        => array(
					array(
						'key'               => 'field_5680cfec77d5c',
						'label'             => '画像ファイル',
						'name'              => 'image',
						'type'              => 'image',
						'instructions'      => 'ファイルの縦横比にかかわらずブラウザサイズにより最適化されますが、高解像度の写真をおすすめします。',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'url',
						'preview_size'      => 'thumbnail',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'kajiwara_slide',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => 1,
		'description'           => '',
	) );
}