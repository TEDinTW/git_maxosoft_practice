<?php

/**
 * @package FunTwanGoPlugin
 */

/**
 * Plugin Name: FunTwanGo Plugin
 * Plugin URI: 
 * Description: This is FTG.
 * Version: 1.0.0
 * Author: Connor
 * Author URI: 
 * License: GPLv2 or later
 * Text Domain: rvps
 */

// Make sure we dont expose any info if called directly
defined( 'ABSPATH' ) or die( 'Not allowed to call directly' );
// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
// define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

function activate_ftg_plugin() {
    Includes\Base\Activate::activate();
}

function deactivate_ftg_plugin() {
    Includes\Base\Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_ftg_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_ftg_plugin' );

if ( class_exists( 'Includes\\Init' ) ) {
    Includes\Init::register_services();
}
