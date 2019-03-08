<?php

if ( !class_exists( 'Dahz_Framework_Page_Title_Customizers' ) ) {

	Class Dahz_Framework_Page_Title_Customizers extends Dahz_Framework_Customizer {

		public function __construct() {
			
			$this->dahz_framework_page_title_archive();

			$this->dahz_framework_page_title_layout();

			$this->dahz_framework_page_title_woo_home_page();

			$this->dahz_framework_page_title_woo_cat();

			$this->dahz_framework_page_title_woo_brand();

			$this->dahz_framework_page_title_portfolio();
			
			do_action( 'dahz_framework_page_title_customizers', $this );
			
		}

		public function dahz_framework_page_title_archive() {

			$field = $this->dahz_framework_page_title_fields( '', 'blog_archive', 12 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_archive_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Page Title', 'baklon' ) .'</div>',
				'priority' => 11,
			);

			$this->dahz_framework_add_field_customizer( 'blog_archive', $field );

		}
		
		public function dahz_framework_page_title_layout() {
			$field = $this->dahz_framework_page_title_fields( '', 'blog_template', 17 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_archive_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Page Title', 'baklon' ) .'</div>',
				'priority' => 16,
			);

			$this->dahz_framework_add_field_customizer( 'blog_template', $field );
		}

		public function dahz_framework_page_title_portfolio() {
			$field = $this->dahz_framework_page_title_fields( '', 'portfolio_archive', 13 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_portfolio_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Page Title', 'baklon' ) .'</div>',
				'priority' => 12,
			);

			$this->dahz_framework_add_field_customizer( 'portfolio_archive', $field );
		}

		public function dahz_framework_page_title_woo_home_page() {
			$field = $this->dahz_framework_page_title_fields( 'home_page', 'shop_woo', 20 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_shop_home_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Shop Home Page Title', 'baklon' ) .'</div>',
				'priority' => 19,
			);

			$this->dahz_framework_add_field_customizer( 'shop_woo', $field );
		}

		public function dahz_framework_page_title_woo_brand() {
			$field = $this->dahz_framework_page_title_fields( 'brand', 'shop_woo', 24 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_shop_brand_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Shop Brand Page Title', 'baklon' ) .'</div>',
				'priority' => 23,
			);

			$this->dahz_framework_add_field_customizer( 'shop_woo', $field );
		}

		public function dahz_framework_page_title_woo_cat() {
			$field = $this->dahz_framework_page_title_fields( 'cat', 'shop_woo', 22 );

			$field[] = array(
				'type'     => 'custom',
				'settings' => 'custom_title_shop_cat_page',
				'label'    => '',
				'default'  => '<div class="de-customizer-title">'. esc_html__( 'Shop Category Page Title', 'baklon' ) .'</div>',
				'priority' => 21,
			);

			$this->dahz_framework_add_field_customizer( 'shop_woo', $field );
		}

		public function dahz_framework_page_title_fields( $prefix = '', $section = '', $start_priority = 0 ) {
			$field = array();

			$layouts = array(
				'tasia'		=> get_template_directory_uri() . '/assets/images/customizer/page-title/df_page-title-default-tasia.svg',
				'tiffany'	=> get_template_directory_uri() . '/assets/images/customizer/page-title/df_page-title-style-1-tiffany.svg',
				'titania'	=> get_template_directory_uri() . '/assets/images/customizer/page-title/df_page-title-style-2-titania.svg',
				'trina'		=> get_template_directory_uri() . '/assets/images/customizer/page-title/df_page-title-style-3-trina.svg',
			);

			if( $section == 'blog_template' || ( $section == 'shop_woo' && $prefix == 'home_page' ) ){
				$layouts['disable'] = get_template_directory_uri() . '/assets/images/customizer/page-title/df_disable.svg';
			}

			$field[] = array(
				'type'			=> 'radio-image',
				'settings'		=> !empty( $prefix ) ? "{$prefix}_page_title" : 'page_title',
				'label'			=> esc_html__( 'Page Title', 'baklon' ),
				'description'	=> esc_html__( 'Select your page title globally for loop', 'baklon' ),
				'priority'		=> $start_priority,
				'default'		=> 'tasia',
				'choices'		=> $layouts,
			);

			if ( $section === 'blog_template' ) {
				$field[] = array(
					'type'		=> 'switch',
					'settings'	=> !empty( $prefix ) ? "{$prefix}_remove_margin" : 'remove_margin',
					'label'		=> esc_html__( 'Remove Margin', 'baklon' ),
					'default'	=> 'off',
					'priority'	=> $start_priority,
					'choices'	=> array(
						'on'  => __( 'On', 'baklon' ),
						'off' => __( 'Off', 'baklon' )
					),
					'active_callback'	=> array(
						array(
							'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
							'operator'	=> '!==',
							'value'		=> 'tasia',
						),
						array(
							'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
							'operator'	=> '!==',
							'value'		=> 'disable',
						),
					),
				);
			}

			$field[] = array(
				'type'		=> 'color',
				'choices'	=> array(
					'alpha' => true,
				),
				'settings'			=> !empty( $prefix ) ? "{$prefix}_background_color" : 'background_color',
				'label'				=> esc_html__( 'Background Color', 'baklon' ),
				'default'			=> '',
				'priority'			=> $start_priority,
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'image',
				'settings'	=> !empty( $prefix ) ? "{$prefix}_background_image" : 'background_image',
				'label'		=> esc_html__( 'Background Image', 'baklon' ),
				'default'	=> '',
				'priority'	=> $start_priority,
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'select',
				'settings'	=> !empty( $prefix ) ? "{$prefix}_background_size" : 'background_size',
				'label'		=> esc_html__( 'Image Size', 'baklon' ),
				'default'	=> 'cover',
				'priority'	=> $start_priority,
				'choices'	=> array(
					'cover'		=> esc_attr__( 'Cover', 'baklon' ),
					'contain'	=> esc_attr__( 'Contain', 'baklon' ),
					'auto'		=> esc_attr__( 'Auto', 'baklon' ),
				),
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'select',
				'settings'	=> !empty( $prefix ) ? "{$prefix}_background_repeat" : 'background_repeat',
				'label'		=> esc_html__( 'Image Repeat', 'baklon' ),
				'default'	=> 'no-repeat',
				'priority'	=> $start_priority,
				'choices'	=> array(
					'no-repeat'	=> esc_attr__( 'No Repeat', 'baklon' ),
					'repeat'	=> esc_attr__( 'Repeat', 'baklon' ),
					'repeat-x'	=> esc_attr__( 'Repeat X', 'baklon' ),
					'repeat-y'	=> esc_attr__( 'Repeat Y', 'baklon' ),
				),
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'select',
				'settings'	=> !empty( $prefix ) ? "{$prefix}_background_position" : 'background_position',
				'label'		=> esc_html__( 'Image Position', 'baklon' ),
				'default'	=> 'left top',
				'priority'	=> $start_priority,
				'choices'	=> array(
					'left top'		=> esc_attr__( 'Left Top', 'baklon' ),
					'left center'	=> esc_attr__( 'Left Center', 'baklon' ),
					'left bottom'	=> esc_attr__( 'Left Bottom', 'baklon' ),
					'right top'		=> esc_attr__( 'Right Top', 'baklon' ),
					'right center'	=> esc_attr__( 'Right Center', 'baklon' ),
					'right bottom'	=> esc_attr__( 'Right Bottom', 'baklon' ),
					'center top'	=> esc_attr__( 'Center Top', 'baklon' ),
					'center center'	=> esc_attr__( 'Center Center', 'baklon' ),
					'center bottom'	=> esc_attr__( 'Center Bottom', 'baklon' ),
				),
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'select',
				'settings'	=> !empty( $prefix ) ? "{$prefix}_background_attachment" : 'background_attachment',
				'label'		=> esc_html__( 'Image Attachment', 'baklon' ),
				'default'	=> 'scroll',
				'priority'	=> $start_priority,
				'choices'	=> array(
					'scroll'	=> esc_attr__( 'Scroll', 'baklon' ),
					'fixed'		=> esc_attr__( 'Fixed', 'baklon' ),
				),
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$field[] = array(
				'type'		=> 'color',
				'choices'	=> array(
					'alpha' => true,
				),
				'settings'			=> !empty( $prefix ) ? "{$prefix}_text_color" : 'text_color',
				'label'				=> esc_html__( 'Page Title Text Color', 'baklon' ),
				'default'			=> '',
				'priority'			=> $start_priority,
				'active_callback'	=> array(
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'tasia',
					),
					array(
						'setting'	=> !empty( $prefix ) ? "{$section}_{$prefix}_page_title" : "{$section}_page_title",
						'operator'	=> '!==',
						'value'		=> 'disable',
					),
				),
			);

			$this->dahz_framework_add_field_customizer( $section, $field );
		}
	}

	new Dahz_Framework_Page_Title_Customizers();
}