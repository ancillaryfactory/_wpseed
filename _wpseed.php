<?php
/*
Plugin Name: _wpseed
Plugin URI: https://github.com/seedprod/_wpseed
Description: WordPress menu and setting api wrapper for plugins.
Version:  0.1.0
Author: SeedProd
Author URI: http://www.seedprod.com
License: GPLv2
Copyright 2011  John Turner (email : john@seedprod.com, twitter : @johnturner)
*/

/**
 * Init
 *
 * @package WordPress
 * @subpackage _wpseed
 * @since 0.1.0
 */

/**
 * Default Constants
 */
define( '_WPSEED_SHORTNAME', '_wpseed' ); // This is not used but could be if you need it to namespace something.
define( '_WPSEED_PLUGIN_NAME', 'Coming Soon' ); // This is not used but could be if you need it to namespace something.
define( '_WPSEED_VERSION', '0.1.0' ); // Plugin Version Number. Recommend you use Semantic Versioning http://semver.org/
define( '_WPSEED_REQUIRED_WP_VERSION' , '3.0' ); // Required Version of WordPress
define( '_WPSEED_TEXTDOMAIN' , '_wpseed' ); // Your textdomain
define( '_WPSEED_PLUGIN_PATH', plugin_dir_path(__FILE__)); // Example output: /Applications/MAMP/htdocs/wordpress/wp-content/plugins/_wpseed/
define( '_WPSEED_PLUGIN_URL', plugin_dir_url(__FILE__) ); // Example output: http://localhost:8888/wordpress/wp-content/plugins/_wpseed/

/**
 * Load Text Domain
 */
function _wpseed_init() {
	load_plugin_textdomain('_wpseed', dirname( plugin_basename( __FILE__ ) ) . '/languages/');
}
add_action('init', '_wpseed_init');

/**
 * Upon activation of the plugin, see if we are running the required version and deploy theme in defined.
 *
 * @since 0.1.0
 */
function _wpseed_activation() {
    if ( version_compare( get_bloginfo( 'version' ), _WPSEED_REQUIRED_WP_VERSION, '<' ) ) {
        deactivate_plugins( __FILE__  );
        wp_die( __('WordPress 3.0 and higher required. The plugin has now disabled itself. On a side note why are you running an old version :( Upgrade!','_wpseed') );
    }
}
register_activation_hook(__FILE__, '_wpseed_activation' );

/**
 * Load Required Files
 */
require_once('framework/framework.php');
require_once('inc/config.php');
//require_once('inc/functions.php');


