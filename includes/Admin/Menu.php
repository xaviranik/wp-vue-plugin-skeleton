<?php

namespace WpPluginSkeleton\Admin;

use WpPluginSkeleton\WpPluginSkeleton;

/**
 * Class Menu
 *
 * @package WpPluginSkeleton\Admin
 */
class Menu {

	/**
	 * Menu page title.
	 *
	 * @var string
	 */
	protected $page_title;

	/**
	 * Menu page title.
	 *
	 * @var string
	 */
	protected $menu_title;

	/**
	 * Menu page base capability.
	 *
	 * @var string
	 */
	protected $base_capability;

	/**
	 * Menu page base capability.
	 *
	 * @var string
	 */
	protected $capability;

	/**
	 * Menu page slug.
	 *
	 * @var string
	 */
	protected $menu_slug;

	/**
	 * Menu page icon url.
	 *
	 * @var string
	 */
	protected $icon;

	/**
	 * Menu page position.
	 *
	 * @var int
	 */
	protected $position;

	/**
	 * Submenu pages.
	 *
	 * @var array
	 */
	protected $submenus;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->page_title      = __( 'Wp Skeleton', 'wp-plugin-skeleton' );
		$this->menu_title      = __( 'Wp Skeleton', 'wp-plugin-skeleton' );
		$this->base_capability = 'manage_options';
		$this->menu_slug       = 'wp-skeleton';
		$this->icon            = 'dashicons-rest-api';
		$this->position        = 57;
		$this->submenus        = [
			[
				'title'      => __( 'Dashboard', 'wp-plugin-skeleton' ),
				'capability' => $this->base_capability,
				'url'        => 'admin.php?page=' . $this->menu_slug . '#/',
			],
			[
				'title'      => __( 'Other', 'wp-plugin-skeleton' ),
				'capability' => $this->base_capability,
				'url'        => 'admin.php?page=' . $this->menu_slug . '#/other',
			],
		];
	}

	/**
	 * Registers all hooks for the class.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'admin_menu', [ $this, 'register_menu' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_action( 'admin_head', [ $this, 'cleanup_admin_notices' ], 1 );
	}

	/**
	 * Register admin menu.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function register_menu() {
		global $submenu;

		add_menu_page(
			$this->page_title,
			$this->menu_title,
			$this->base_capability,
			$this->menu_slug,
			[ $this, 'render_menu_page' ],
			$this->icon,
			$this->position
		);

		foreach ( $this->submenus as $item ) {
			$submenu[ $this->menu_slug ][] = [ $item['title'], $item['capability'], $item['url'] ]; // phpcs:ignore
		}
	}

	/**
	 * Register admin scripts.
	 *
	 * @return void
	 */
	public function register_scripts() {
		$asset = require_once WP_SKELETON_PLUGIN_DIR . '/build/main.asset.php';

		wp_register_script(
			'wp-skeleton-main-script',
			WpPluginSkeleton::$build_url . '/main.js',
			$asset['dependencies'],
			$asset['version'],
			false
		);

		wp_register_style(
			'wp-skeleton-main-style',
			WpPluginSkeleton::$build_url . '/main.css',
			[],
			$asset['version'],
			false
		);
	}


	/**
	 * Renders the admin page.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function render_menu_page() {
		wp_enqueue_script( 'wp-skeleton-main-script' );
		wp_enqueue_style( 'wp-skeleton-main-style' );
		echo '<div id="wp-plugin-skeleton"></div>';
	}

	/**
	 * Cleans admin notice for we-meal page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function cleanup_admin_notices() {
		if ( "toplevel_page_$this->menu_slug" === get_current_screen()->id ) {
			remove_all_actions( 'admin_notices' );
		}
	}
}
