<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://efox.cloud
 * @since      1.0.0
 *
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/includes
 * @author     Tomas Krutis <tomas.krutis@efox.cloud>
 */
class Ucime_Online_Darujme_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ucime-online-darujme',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
