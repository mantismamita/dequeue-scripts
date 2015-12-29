<?php
/**
 * Plugin Name: Custom Dequeue Scripts
 * Version: 0.1-alpha
 * Description: a custom plugin for dequeuing scripts on a per page basis
 * Author: Kirsten Cassidy
 * Author URI: www.kirstencassidy.com
 * Plugin URI: PLUGIN SITE HERE
 * Text Domain: dequeue-scripts
 * Domain Path: /languages
 * @package Custom Dequeue Scripts
 */

function ds_inspect_scripts() {

	global $wp_scripts;
	foreach ( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;

}

add_action( 'wp_print_scripts', 'ds_inspect_scripts', 2 );

//add_action( 'wp_enqueue_scripts', 'up_deregister_javascript', 100 );

function ds_deregister_javascript() {
	if ( is_page(12443) ) {
		wp_deregister_script( 'layerslider' );
		wp_dequeue_script( 'layerslider' );
		wp_deregister_script( 'revmin' );
		wp_dequeue_script( 'revmin' );
		wp_deregister_script( 'tp-tools' );
		wp_dequeue_script( 'tp-tools' );
	}
}




