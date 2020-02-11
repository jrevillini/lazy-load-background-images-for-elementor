<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://james.revillini.com/
 * @since             1.0.0
 * @package           Lazy_Load_Elementor_Background_Images
 *
 * @wordpress-plugin
 * Plugin Name:       Lazy Load Background Images for Elementor
 * Plugin URI:        https://james.revillini.com/lazy-load-elementor-background-images
 * Description:       Improve site performance, reduce initial bandwidth payload, reduce HTTP requests and boost GTMetrix/Pingdom/Google Pagespeed Insights scores by lazy loading Elementor section and column image backgrounds.
 * Version:           1.0.0
 * Author:            James Revillini
 * Author URI:        https://james.revillini.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lazy-load-elementor-background-images
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LAZY_LOAD_ELEMENTOR_BACKGROUND_IMAGES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lazy-load-elementor-background-images-activator.php
 */
function activate_lazy_load_elementor_background_images() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lazy-load-elementor-background-images-activator.php';
	Lazy_Load_Elementor_Background_Images_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lazy-load-elementor-background-images-deactivator.php
 */
function deactivate_lazy_load_elementor_background_images() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lazy-load-elementor-background-images-deactivator.php';
	Lazy_Load_Elementor_Background_Images_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lazy_load_elementor_background_images' );
register_deactivation_hook( __FILE__, 'deactivate_lazy_load_elementor_background_images' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lazy-load-elementor-background-images.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lazy_load_elementor_background_images() {

	$plugin = new Lazy_Load_Elementor_Background_Images();
	$plugin->run();

}
run_lazy_load_elementor_background_images();
