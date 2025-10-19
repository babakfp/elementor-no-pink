<?php

/**
 * Plugin Name:                       Elementor Better UI
 * Version:                           0.0.4
 * Description:                       Enhances Elementor UI design and user experience.
 * Author:                            babakfp
 * Author URI:                        https://babakfp.ir
 * Plugin URI:                        https://www.example.com/my-plugin
 * Tested up to:                      6.8
 * Requires at least:                 5.0
 * Requires PHP:                      7.4
 * PHP tested up to:                  8.4
 * Elementor tested up to:            3.32
 * Elementor requires at least:       3.32
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:                       elementor-better-ui
 * Domain Path:                       /languages
 * Tags:                              elementor, better, ui
 * Requires Plugins                   elementor
 */

if ( ! class_exists( 'Elementor_Better_UI' ) ) {
	final class Elementor_Better_UI {
		public static $version = '0.0.4';

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
