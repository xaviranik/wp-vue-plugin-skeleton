<?php

namespace User\WpVuePluginSkeleton;

/**
 * Main plugin class.
 *
 * @package User\WpVuePluginSkeleton
 */
class WpVuePluginSkeleton {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public static $version = '1.0.0';

	/**
	 * Plugin file.
	 *
	 * @var string
	 */
	public static $plugin_file;

	/**
	 * Plugin directory.
	 *
	 * @var string
	 */
	public static $plugin_directory;

	/**
	 * @var string
	 */
	public static $build_url;

	/**
	 * Plugin base name.
	 *
	 * @var string
	 */
	public static $basename;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $text_domain_directory;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $template_directory;

	/**
	 * Plugin assets directory path.
	 *
	 * @var string
	 */
	public static $assets_url;

	/**
	 * Plugin url.
	 *
	 * @var string
	 */
	public static $plugin_url;

	/**
	 * WpVuePluginSkeleton Constructor.
	 */
	public function __construct() {
		$this->init();
		$this->register_lifecycle();
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	protected function init() {
		self::$plugin_file           = WP_VUE_SKELETON_PLUGIN_FILE;
		self::$plugin_directory      = WP_VUE_SKELETON_PLUGIN_DIR;
		self::$basename              = plugin_basename( self::$plugin_file );
		self::$text_domain_directory = self::$plugin_directory . '/languages';
		self::$template_directory    = self::$plugin_directory . '/templates';
		self::$plugin_url            = plugins_url( '', self::$plugin_file );
		self::$assets_url            = self::$plugin_url . '/assets';
		self::$build_url             = self::$plugin_url . '/build';
	}

	/**
	 * Registers life-cycle hooks.
	 *
	 * @return void
	 */
	protected function register_lifecycle() {
		register_activation_hook( self::$plugin_file, [ Activate::class, 'handle' ] );
		register_deactivation_hook( self::$plugin_file, [ Deactivate::class, 'handle' ] );
	}


	/**
	 * Initializes the WpVuePluginSkeleton class.
	 *
	 * Checks for an existing WpVuePluginSkeleton instance
	 * and if it doesn't find one, creates it.
	 *
	 * @return WpVuePluginSkeleton
	 */
	public static function instance() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}
}