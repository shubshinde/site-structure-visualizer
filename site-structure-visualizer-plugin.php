<?php

/**
 * 
 * Plugin Name:       Site Structure Visualizer
 * Plugin URI:        https://froosty.tech/site-structure-visualizer
 * Description:       Plugin to generate graphical representation of your site structure.
 * Version:           1.0.0
 * Author:            Shubham Shinde (froosty)
 * Author URI:        https://froosty.tech/about/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-structure-visualizer
 * Domain Path:       /languages
 * Stable tag:        5.0
 */



if (!defined('ABSPATH')) : exit();
endif;

// site url
define('SSVP_SITE_URL', get_site_url());


/**
 *  plugin constants
 **/
define('SSVP_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('SSVP_PLUGIN_URL',  trailingslashit(plugins_url('/', __FILE__)));

/**
 * Image Constants
 */
define('SSVP_LOGO_URL', SSVP_PLUGIN_URL . 'assets/img/3.png');
define('SSVP_DEV_LOGO', SSVP_PLUGIN_URL . 'assets/img/dev.png');


/**
 * Include loader file
 */
require_once SSVP_PLUGIN_PATH . '/includes/SSVP-api-routes.php';
require_once SSVP_PLUGIN_PATH . '/includes/SSVP-loader.php';
