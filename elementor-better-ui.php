<?php

/**
 * Plugin Name:                       Elementor Better UI
 * Version:                           0.0.3
 * Description:                       Enhances Elementor UI design and user experience.
 * Author:                            babakfp
 * Author URI:                        https://babakfp.ir
 * Plugin URI:                        https://www.example.com/my-plugin
 * Tested up to:                      6.2.1
 * Tested up to (PHP):                7.4.33
 * Tested up to (Elementor):          3.13.2
 * Requires at least:                 x.x.x
 * Requires at least (PHP):           x.x.x
 * Requires at least (Elementor):     x.x.x
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:                       elementor-better-ui
 * Domain Path:                       /languages
 * Tags:                              elementor, better, ui
 */

if ( ! class_exists( 'Elementor_Better_UI' ) ) {
	final class Elementor_Better_UI {
		public static $version = '0.0.3';

		public function __construct() {
            add_action( 'admin_enqueue_scripts', fn() => wp_enqueue_style( 'elementor-better-ui:wp-admin', self::url() . 'static/css/wp-admin.css', [], self::$version ), 11 );
            add_action( 'elementor/editor/after_enqueue_styles', fn() => wp_enqueue_style ( 'elementor-better-ui:el-editor', self::url() . 'static/css/el-editor.css', [], self::$version ) );
            add_action( 'elementor/preview/enqueue_styles', fn() => wp_enqueue_style ( 'elementor-better-ui:el-preview', self::url() . 'static/css/el-preview.css', [], self::$version ) );
		}

		public static function url() {
			return plugin_dir_url( __FILE__ );
		}

		public static function dir() {
			return plugin_dir_path( __FILE__ );
		}
	}

	new Elementor_Better_UI();
}
