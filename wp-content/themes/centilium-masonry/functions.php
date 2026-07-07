<?php

function centilium_masonry_theme_css() {
	
	$parent_style = 'centilium-masonry-parent-style';
	
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	
	wp_enqueue_style( 'centilium-masonry-child-style',
        get_stylesheet_uri(),
        array( $parent_style )
    );
	
	wp_enqueue_style( 'centilium-masonry-default-css', get_stylesheet_directory_uri()."/css/default.css" );

}
add_action( 'wp_enqueue_scripts', 'centilium_masonry_theme_css');


?>

