<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Worldwide
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div class="header">
  <div class="container">
    <div class="logo">  
      <?php worldwide_the_custom_logo(); ?>   
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p><?php echo esc_html( $description ); ?></p> 
        <?php endif; ?>
    </div>    
    <div class="widget-right">
      <div class="toggle">
        <a class="toggleMenu" href="#"><?php esc_html_e('Menu','worldwide'); ?></a>
      </div> 
      <div class="headernav">
        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
      </div><!-- .headernav--> 
      <div class="clear"></div> 
    </div><!--.widget-right-->
    <div class="clear"></div>         
  </div> <!-- container -->
</div>

<?php if ( is_front_page() || is_home() ) { ?>
  <?php if ( get_header_image() ) : ?>
       <div class="header-banner">
		 <img src="<?php header_image(); ?>" alt="">
       </div>
  <?php endif; ?>
<?php } ?>