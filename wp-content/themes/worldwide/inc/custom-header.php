<?php
/**
 * @package Worldwide
 * Setup the WordPress core custom header feature.
 *
 */
function worldwide_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'worldwide_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/images/header-banner.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1400,
		'height'                 => 400,
		'header-text'						 =>	false,	
	) ) );
}
add_action( 'after_setup_theme', 'worldwide_custom_header_setup' );
