<?php

/**
 * Plugin Name:                       Elementor No Pink
 * Version:                           0.0.4
 * Description:                       Replaces Elementor’s pink accents with a clean blue color for a calmer, more professional look.
 * Author:                            Babak Farkhoopak
 * Author URI:                        https://babakfp.gumroad.com
 * Plugin URI:                        https://babakfp.gumroad.com/l/elementor-no-pink
 * Tested up to:                      6.8
 * Requires at least:                 5.0
 * Requires PHP:                      7.4
 * PHP tested up to:                  8.4
 * Elementor tested up to:            3.32
 * Elementor requires at least:       3.32
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:                       elementor-no-pink
 * Domain Path:                       /languages
 * Tags:                              elementor, pink
 * Requires Plugins                   elementor
 */

if ( ! class_exists( 'Elementor_No_Pink' ) ) {
	final class Elementor_No_Pink {
		public static $version = '0.0.4';
		public static $text_domain = 'elementor-no-pink';

		public function __construct() {
            add_action( 'admin_enqueue_scripts', fn() => wp_enqueue_style( self::$text_domain . '-wp-admin', self::url() . 'static/css/wp-admin.css', [], self::$version ), 11 );
            add_action( 'elementor/app/init', fn() => wp_enqueue_style( self::$text_domain . '-wp-admin', self::url() . 'static/css/wp-admin.css', [], self::$version ), 11 );
            add_action( 'elementor/editor/after_enqueue_styles', fn() => wp_enqueue_style ( self::$text_domain . '-elementor-editor', self::url() . 'static/css/elementor-editor.css', [], self::$version ) );
            add_action( 'elementor/preview/enqueue_styles', fn() => wp_enqueue_style ( self::$text_domain . '-elementor-preview', self::url() . 'static/css/elementor-preview.css', [], self::$version ) );
		}

		public static function url() {
			return plugin_dir_url( __FILE__ );
		}

		public static function dir() {
			return plugin_dir_path( __FILE__ );
		}
	}

	new Elementor_No_Pink();
}
