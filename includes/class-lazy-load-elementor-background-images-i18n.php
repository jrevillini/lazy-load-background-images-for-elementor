<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://james.revillini.com/
 * @since      1.0.0
 *
 * @package    Lazy_Load_Elementor_Background_Images
 * @subpackage Lazy_Load_Elementor_Background_Images/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lazy_Load_Elementor_Background_Images
 * @subpackage Lazy_Load_Elementor_Background_Images/includes
 * @author     James Revillini <james@vandertech.com>
 */
class Lazy_Load_Elementor_Background_Images_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lazy-load-elementor-background-images',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
