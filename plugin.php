<?php
/**
 * Pert Calculator
 *
 * @package     pert-calculator
 * @author      Benjamin Heller
 * @copyright   2018
 * @license     GPL-2.0+
 *
 * @pert-calculator
 * Plugin Name: Pert Calculator
 * Description: A pert calculator made with VUE js
 * Version:     1.0.0
 * Author:      Benjamin Heller
 * Author URI:  https://benjaminheller.net
 * Text Domain: pert-calculator
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if ( !shortcode_exists( 'pert_calculator' ) ) {
	add_shortcode( 'pert_calculator', 'pert_calculator' );
}

function pert_calculator() {
	return '<div id="pert-calculator"></div>';
}

add_action( 'wp_enqueue_scripts', 'pert_assets' );
function pert_assets() {
	$js_dir = new \DirectoryIterator( __DIR__ . '/dist/js/');
	$css_dir = new \DirectoryIterator( __DIR__ . '/dist/css');
	foreach ( $js_dir as $file ) {
		if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'js' ) {
			$full_name = basename( $file );
			$name      = substr( basename( $full_name ), 0, strpos( basename( $full_name ), '.' ) );
			wp_enqueue_script( $name, plugin_dir_url( __FILE__ ) . '/dist/js/' . $full_name, [], null, true );
		}
	}
	foreach ( $css_dir as $file ) {
		if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'css' ) {
			$full_name = basename( $file );
			$name      = substr( basename( $full_name ), 0, strpos( basename( $full_name ), '.' ) );
			wp_enqueue_style( $name, plugin_dir_url( __FILE__ ) . 'dist/css/' . $full_name );
		}
	}
}

