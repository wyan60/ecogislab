<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Worldwide
 */
?>
<div id="footer">

	<div class="container">
     <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
     <?php endif; // end footer widget area ?>
              
     <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
     <?php endif; // end footer widget area ?>
  
     <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
     <?php endif; // end footer widget area ?>
      <div class="clear"></div>
    </div><!--end .container--> 
    
    <div class="creditwrapper">
    	<div class="container">
            <p><?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'worldwide');?></p>
            <p><a href="<?php echo esc_url( __( 'https://www.theclassictemplates.com/products/free-worldwide-wordpress-template/', 'worldwide' ) ); ?>" target="_blank"><?php /* translators: %s: post title */ printf( esc_html__( 'Theme by %s', 'worldwide' ), 'TheClassicTemplate' ); ?></a></p>
        </div>
    </div><!--end .creditwrapper-->
</div><!--end .footer-wrapper-->
<?php wp_footer(); ?>

</body>
</html>