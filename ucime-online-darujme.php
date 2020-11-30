<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://efox.cloud
 * @since             1.0.0
 * @package           Ucime_Online_Darujme
 *
 * @wordpress-plugin
 * Plugin Name:       UcimeOnline Darujme Plugin
 * Plugin URI:        https://efox.cloud/ucime-online-darujme-plugin
 * Description:       Plugin pro integraci Darujme do Učíme Online.
 * Version:           1.0.1
 * Author:            Tomas Krutis
 * Author URI:        https://efox.cloud
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ucime-online-darujme
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('UCIME_ONLINE_DARUJME_VERSION', '1.0.1');
define('UCIME_ONLINE_DARUJME_URL', plugin_dir_url(__FILE__));
define('UCIME_ONLINE_DARUJME_PATH', plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ucime-online-darujme-activator.php
 */
function activate_ucime_online_darujme()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-ucime-online-darujme-activator.php';
    $activator = new Ucime_Online_Darujme_Activator();
    $activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ucime-online-darujme-deactivator.php
 */
function deactivate_ucime_online_darujme()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-ucime-online-darujme-deactivator.php';
    $deactivator = new Ucime_Online_Darujme_Deactivator();
    $deactivator->deactivate();
}

register_activation_hook(__FILE__, 'activate_ucime_online_darujme');
register_deactivation_hook(__FILE__, 'deactivate_ucime_online_darujme');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ucime-online-darujme.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ucime_online_darujme()
{

    $plugin = new Ucime_Online_Darujme();
    $plugin->run();

}
run_ucime_online_darujme();
