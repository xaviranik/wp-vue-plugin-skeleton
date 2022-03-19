<?php
/**
 * Plugin Name: PLUGIN_NAME
 * Description: PLUGIN_DESCRIPTION
 * URI: PLUGIN_URI
 * Author: AUTHOR_NAME
 * Author URI: AUTHOR_URI
 * Version: PLUGIN_VERSION
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: TEXT_DOMAIN
 */

namespace WpPluginSkeleton;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( WpPluginSkeleton::class ) && is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! defined( 'WP_SKELETON_PLUGIN_FILE' ) ) {
	define( 'WP_SKELETON_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'WP_SKELETON_PLUGIN_DIR' ) ) {
	define( 'WP_SKELETON_PLUGIN_DIR', __DIR__ );
}

class_exists( WpPluginSkeleton::class ) && WpPluginSkeleton::instance();
