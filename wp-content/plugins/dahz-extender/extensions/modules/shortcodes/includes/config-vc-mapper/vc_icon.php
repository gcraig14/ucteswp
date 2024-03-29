<?php

return array(
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon library', 'js_composer' ),
		'value' => array(
			__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
			__( 'Open Iconic', 'js_composer' ) 	=> 'openiconic',
			__( 'Typicons', 'js_composer' ) 	=> 'typicons',
			__( 'Entypo', 'js_composer' ) 		=> 'entypo',
			__( 'Linecons', 'js_composer' ) 	=> 'linecons',
			__( 'Mono Social', 'js_composer' ) 	=> 'monosocial',
			__( 'Material', 'js_composer' ) 	=> 'material',
			__( 'Business and office', 'sobari_sc' )	=> 'businessandoffice',
			__( 'Discussion', 'sobari_sc' )				=> 'discussion',
			__( 'Friendship', 'sobari_sc' )				=> 'friendship',
			__( 'Political', 'sobari_sc' )				=> 'political',
			__( 'Politics', 'sobari_sc' )				=> 'politics',
			__( 'Vote Reward Badges', 'sobari_sc' )		=> 'voterewardbadges',
		),
		'admin_label' => true,
		'param_name' => 'type',
		'description' => __( 'Select icon library.', 'js_composer' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_businessandoffice',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'businessandoffice',
			'source'		=> dahz_shortcodes_helper()->get_font( 'business-and-office' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'businessandoffice',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_discussion',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'discussion',
			'source'		=> dahz_shortcodes_helper()->get_font( 'discussion' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'discussion',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_friendship',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'friendship',
			'source'		=> dahz_shortcodes_helper()->get_font( 'friendship' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'friendship',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_political',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'political',
			'source'		=> dahz_shortcodes_helper()->get_font( 'political' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'political',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_politics',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'politics',
			'source'		=> dahz_shortcodes_helper()->get_font( 'politics' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'politics',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type'			=> 'iconpicker',
		'heading'		=> esc_attr__( 'Icon', 'sobari_sc' ),
		'param_name'	=> 'icon_voterewardbadges',
		'settings' 			=> array(
			'emptyIcon' 	=> true,
			'iconsPerPage' 	=> 4000,
			'type'			=> 'voterewardbadges',
			'source'		=> dahz_shortcodes_helper()->get_font( 'vote-reward-badges' )
		),
		'dependency'	=> array(
			'element'	=> 'type',
			'value'		=> 'voterewardbadges',
		),
		'description'	=> __( 'Select icon from library.', 'sobari_sc' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_fontawesome',
		'value' => 'fa fa-adjust',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'fontawesome',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_openiconic',
		'value' => 'vc-oi vc-oi-dial',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'openiconic',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'openiconic',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_typicons',
		'value' => 'typcn typcn-adjust-brightness',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'typicons',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'typicons',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_entypo',
		'value' => 'entypo-icon entypo-icon-note',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'entypo',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'entypo',
		),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_linecons',
		'value' => 'vc_li vc_li-heart',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'linecons',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_monosocial',
		'value' => 'vc-mono vc-mono-fivehundredpx',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'monosocial',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'monosocial',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'iconpicker',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon_material',
		'value' => 'vc-material vc-material-cake',
		// default value to backend editor admin_label
		'settings' => array(
			'emptyIcon' => false,
			// default true, display an "EMPTY" icon?
			'type' => 'material',
			'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value' => 'material',
		),
		'description' => __( 'Select icon from library.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon color', 'js_composer' ),
		'param_name' => 'color',
		'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'js_composer' ) => 'custom' ) ),
		'description' => __( 'Select icon color.', 'js_composer' ),
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Custom color', 'js_composer' ),
		'param_name' => 'custom_color',
		'description' => __( 'Select custom icon color.', 'js_composer' ),
		'dependency' => array(
			'element' => 'color',
			'value' => 'custom',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Background shape', 'js_composer' ),
		'param_name' => 'background_style',
		'value' => array(
			__( 'None', 'js_composer' ) => '',
			__( 'Circle', 'js_composer' ) => 'rounded',
			__( 'Square', 'js_composer' ) => 'boxed',
			__( 'Rounded', 'js_composer' ) => 'rounded-less',
			__( 'Outline Circle', 'js_composer' ) => 'rounded-outline',
			__( 'Outline Square', 'js_composer' ) => 'boxed-outline',
			__( 'Outline Rounded', 'js_composer' ) => 'rounded-less-outline',
		),
		'description' => __( 'Select background shape and style for icon.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Background color', 'js_composer' ),
		'param_name' => 'background_color',
		'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'js_composer' ) => 'custom' ) ),
		'std' => 'grey',
		'description' => __( 'Select background color for icon.', 'js_composer' ),
		'param_holder_class' => 'vc_colored-dropdown',
		'dependency' => array(
			'element' => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Custom background color', 'js_composer' ),
		'param_name' => 'custom_background_color',
		'description' => __( 'Select custom icon background color.', 'js_composer' ),
		'dependency' => array(
			'element' => 'background_color',
			'value' => 'custom',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Size', 'js_composer' ),
		'param_name' => 'size',
		'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std' => 'md',
		'description' => __( 'Icon size.', 'js_composer' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon alignment', 'js_composer' ),
		'param_name' => 'align',
		'value' => array(
			__( 'Left', 'js_composer' ) => 'left',
			__( 'Right', 'js_composer' ) => 'right',
			__( 'Center', 'js_composer' ) => 'center',
		),
		'description' => __( 'Select icon alignment.', 'js_composer' ),
	),
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'js_composer' ),
		'param_name' => 'link',
		'description' => __( 'Add link to icon.', 'js_composer' ),
	),
	vc_map_add_css_animation(),
	array(
		'type' => 'el_id',
		'heading' => __( 'Element ID', 'js_composer' ),
		'param_name' => 'el_id',
		'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'js_composer' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'CSS box', 'js_composer' ),
		'param_name' => 'css',
		'group' => __( 'Design Options', 'js_composer' ),
	),
);
