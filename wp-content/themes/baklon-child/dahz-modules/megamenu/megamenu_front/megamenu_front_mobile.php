<?php
/**
	 * Custom Walker
	 * Class Dahz_Framework_Woo_Front_Mega_Menu
	 *
	 * @access      public
	 * @since       1.0.0
	 * @return      void
	*/
if( !class_exists( 'Dahz_Framework_Woo_Front_Mega_Menu_Mobile' ) ){
	
	class Dahz_Framework_Woo_Front_Mega_Menu_Mobile extends Walker_Nav_Menu {
		
		public $is_mega_menu_level_0 = false;
		
		public $text_alignment_level_0 = '';
		
		public $_output = '';
		
		public $anchor_id = "";
		
		public $link_back =  '';
		
		public $anchor_id_counter = 1;
		/**
		 * start_lvl
		 * @param &$output, $depth, $args
		 * @return
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			// depth dependent classes
			if( $this->is_mega_menu_level_0 && $depth >= 2 ) return;
			
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			$display_depth = ( $depth + 1); // because it counts the first submenu as 0
			
			$classes = array(
				'sub-menu',
				( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
				'de-mobile-nav__depth-' . $display_depth,
				'uk-nav-default uk-nav-parent-icon'
			);
			// megamenu condition
			$class_names = implode( ' ', $classes );
			// megamenu condition

			$output .= "\n" . $indent . '<ul class="' . $class_names . '" data-uk-nav="multiple:false;">' . "\n";
		}
		/**
		* end_lvl
		* @param &$output, $depth, $args
		* @return
		*/
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			
			if( $this->is_mega_menu_level_0 && $depth >= 2 ) return;
			
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			
			$indent = str_repeat( $t, $depth );
			
			$output .= "$indent</ul>{$n}";
			
		}
		/**
		 * start_el
		 * @param &$output, $item, $depth, $args, $id
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			// start megamenu condition
			$mega_menu_meta = get_post_meta( $item->ID, 'mega_menu', true );
			
			$walkerObj = $args->walker;
			
			$has_children_item_menu = $walkerObj->has_children;
			
			if( $depth === 0 ){
				$this->is_mega_menu_level_0 = !empty( $mega_menu_meta['is_mega_menu'] ) ? true : false;
				$this->anchor_id_counter++;
				$this->anchor_id = 'primary-menu-' . uniqid() . '-' . $this->anchor_id_counter;
			}
			if( $this->is_mega_menu_level_0 && $depth > 2  )return;
			// end megamenu condition
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			// depth dependent classes
			$depth_classes = array(
				'menu-item-depth-' . $depth,
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >= 2 ? 'sub-sub-menu-item' : '' ),
				( $depth  % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				( $has_children_item_menu ? 'uk-parent' : '' ),
			);
			
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			// build html

			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . ( $depth ===1 && $this->is_mega_menu_level_0 ? ' megamenu__title' : '' ) . '"';
						
			// start megamenu condition
			$image_link_parent = ( $depth === 1 || $depth === 2 ) && $this->is_mega_menu_level_0 && !empty( $mega_menu_meta['image_replace_link'] )
				?
					wp_get_attachment_image( $mega_menu_meta['image_replace_link'], 'medium' )
				:
					'';
			$carousel_content = !empty( $mega_menu_meta['is_carousel'] ) && $depth === 1 && $this->is_mega_menu_level_0 && !empty( $mega_menu_meta['carousel_content'] )
				?
					$this->dahz_framework_mega_menu_carousel( $mega_menu_meta['source_carousel'], $mega_menu_meta['carousel_content'], !empty( $mega_menu_meta['column_carousel'] ) ? $mega_menu_meta['column_carousel'] : 1 )
				:
					'';

			$item_output = sprintf(
				( $depth === 1 || $depth === 2 ) && $this->is_mega_menu_level_0 && !empty( $mega_menu_meta['is_hide_title'] )
					?
					'
						%1$s
						<a%2$s>
							%7$s
						</a>
						%9$s%6$s%8$s
						'
					:
					'
						%1$s
						<a%2$s>
							%3$s%4$s%7$s%5$s
						</a>%9$s%6$s%8$s
					',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after,
				$image_link_parent,
				$carousel_content,
				''
			);
			// end megamenu condition

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}
		/**
		* end_lvl
		* @param &$output, $depth, $args
		* @return
		*/
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			
			if( $this->is_mega_menu_level_0 && $depth > 2 ) return;
			
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			
			$output .= "</li>{$n}";
			
		}
		/**
		* dahz_framework_mega_menu_carousel
		* @param $source, $carousel_content, $column
		* @return carousel content
		*/
		public function dahz_framework_mega_menu_carousel( $source, $carousel_content, $column ) {
			
			$carousel = '';

			$query = $this->dahz_framework_mega_menu_get_carousel_query( $source, $carousel_content );

			if( $query ){

				$carousel .= dahz_framework_get_template_html(
					"megamenu-{$source}-carousel.php",
					array(
						'query'		=> $query,
						'column'	=> $column
					),
					'dahz-modules/megamenu/megamenu_front/'
				);

				wp_reset_postdata();

			}

			return $carousel;
		}
		/**
		* dahz_framework_mega_menu_product_carousel
		* @param $carousel_content
		* @return product carousel content
		*/
		public function dahz_framework_mega_menu_get_carousel_query( $source, $carousel_content ) {

			switch( $source ){

				case 'product':
					$query = Dahz_Framework_Megamenu::dahz_framework_woo_get_query(
						array(
							'post_type'	=> 'product',
							'post__in'	=> explode( ',', $carousel_content )
						)
					);
					break;
				case 'post':
					$query = Dahz_Framework_Megamenu::dahz_framework_woo_get_query(
						array(
							'post_type'	=> 'post',
							'post__in'	=> explode( ',', $carousel_content )
						)
					);
					break;
				case 'product_category':
					$query = Dahz_Framework_Megamenu::dahz_framework_woo_get_taxonomy( explode( ',', $carousel_content ), 'product_cat' );
					break;
				case 'post_category':
					$query = Dahz_Framework_Megamenu::dahz_framework_woo_get_taxonomy( explode( ',', $carousel_content ), 'category' );
					break;
				case 'brand':
					$query = Dahz_Framework_Megamenu::dahz_framework_woo_get_taxonomy( explode( ',', $carousel_content ), 'brand' );
					break;
				default :
					$query = false;
					break;

			}

			return $query;

		}
		/**
		* dahz_framework_mega_menu_get_text_alignment
		* @param $alignment
		* @return alignment class
		*/
		public function dahz_framework_mega_menu_get_text_alignment( $alignment ) {
			$alignment_class = "";
			switch( $alignment ){
				case 'left':
					$alignment_class = 't-a--l';
					break ;
				case 'center' :
					$alignment_class = 't-a--c';
					break ;
				case 'right' :
					$alignment_class = 't-a--r';
					break ;
				default :
					$alignment_class = 't-a--l';
					break;
			}
			return $alignment_class;
		}
		
	}
	
}
