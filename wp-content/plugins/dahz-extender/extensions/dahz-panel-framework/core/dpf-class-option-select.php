<?php
if ( !defined('ABSPATH') ) {
	exit;
}

if ( !class_exists('DPF_Options_Select') ) {

	/**
	 * 
	 */
	class DPF_Options_Select extends DPF_Options {
		
		public $defaultSecondarySettings = array(

			/**
			 * An associative array containing value – label pair options displayed in the select drop down.
			 * Use a two dimensional array if you want to display grouped options.
			 * @since 1.0
			 * @var string
			 */
			'options' => array(),
		);

		/**
		 * Check if this instance is the first load of the option class
		 *
		 * @since 1.9.3
		 * @var bool $firstLoad
		 */
		private static $firstLoad = true;

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @param array  $settings Option settings
		 * @param string $owner Namespace
		 */
		function __construct($settings, $owner) {

			parent::__construct( $settings, $owner );
			dpf_add_action_once( 'admin_enqueue_scripts', array( $this, 'load_select_scripts' ) );
			dpf_add_action_once( 'customize_controls_enqueue_scripts', array( $this, 'load_select_scripts' ) );

			dpf_add_action_once( 'admin_head', array( $this, 'init_select_script' ) );
			dpf_add_action_once( 'customize_controls_print_footer_scripts', array( $this, 'init_select_script' ) );

		}

		/*
		 * Display for options and meta
		 */
		public function display() {
			$this->echoOptionHeader();
			$multiple = isset( $this->settings['multiple'] ) && true == $this->settings['multiple'] ? 'multiple' : '';

			$name = $this->getID();
			$val  = (array) $this->getValue();

			if ( ! empty( $multiple ) ) {
				$name = "{$name}[]";
			}

			?><select name="<?php echo $name; ?>" class="dpf-select" <?php echo $multiple; ?>><?php
				$this->dpf_parse_select_options( $this->settings['options'], $val );
			?></select><?php

			$this->echoOptionFooter();
		}

		/**
		 * Register and load the select2 script
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function load_select_scripts() {

			wp_enqueue_script( 'dpf-select2', DPF_Core::getURL( '../assets/js/select2/select2.min.js', __FILE__ ), array( 'jquery' ), '1.0', true );

			wp_enqueue_style( 'dpf-select2-style', DPF_Core::getURL( '../assets/css/select2/select2.min.css', __FILE__ ), null, '1.0', 'all' );
			wp_enqueue_style( 'dpf-select-option-style', DPF_Core::getURL( '../assets/css/class-option-select.css', __FILE__ ), null, '1.0', 'all' );

		}


		/**
		 * Initialize the select2 field
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function init_select_script() {

			if ( ! self::$firstLoad ) {
				return;
			}

			self::$firstLoad = false;

			?>
			<script>
			jQuery( document ).ready( function () {
				'use strict';

				/**
				 * Select2
				 * @see https://select2.github.io/
				 */
				if ( jQuery().select2 ) {
					jQuery( 'select.dpf-select, [class*="dpf-select"] select' ).select2();
				}
			});
			</script>
			<?php

		}



		/**
		 * Helper function for parsing select options
		 *
		 * This function is used to reduce duplicated code between the DPF Options
		 * and the customizer control.
		 *
		 * @since 1.9
		 *
		 * @param array $options List of options
		 * @param array $val     Current value
		 *
		 * @return void
		 */
		public function dpf_parse_select_options( $options, $val = array() ) {

			if ( empty( $options ) ) {
				return;
			}

			// Make sure the current value is an array (for multiple select).
			if ( ! is_array( $val ) ) {
				$val = (array) $val;
			}
			foreach ( $options as $value => $label ) {

				// This is if we have option groupings.
				if ( is_array( $label ) ) {

					?>
					<optgroup label="<?php echo $value ?>"><?php
					foreach ( $label as $subValue => $subLabel ) {

						printf( '<option value="%s" %s %s>%s</option>',
							$subValue,
							in_array( $subValue, $val ) ? 'selected="selected"' : '',
							disabled( stripos( $subValue, '!' ), 0, false ),
							$subLabel
						);
					}
					?></optgroup><?php
					// This is for normal list of options.
				} else {
					printf( '<option value="%s" %s %s>%s</option>',
						$value,
						in_array( $value, $val ) ? 'selected="selected"' : '',
						disabled( stripos( $value, '!' ), 0, false ),
						$label
					);
				}
			}
		}

	}

}