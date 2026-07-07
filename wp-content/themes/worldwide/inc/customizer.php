<?php
/**
 * Worldwide Theme Customizer
 *
 * @package Worldwide
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function worldwide_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class worldwide_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h4><?php echo esc_html( $this->label ); ?></h4>
        <?php
        }
    }	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	
	// Color Scheme
	$wp_customize->add_setting('defaultcolor',array(
			'default'	=> '#d34618',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'defaultcolor',array(
			'label' => __('Color Management','worldwide'),			
			 'description'	=> __('More color options in pro version','worldwide'),	
			'section' => 'colors',
			'settings' => 'defaultcolor'
		))
	);	
	
}
add_action( 'customize_register', 'worldwide_customize_register' );

function worldwide_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .articlelists h2 a:hover,
					#sidebar ul li a:hover,					
					.footer ul li a:hover, .footer ul li.current_page_item a,							
					.left a:hover,
					.articlelists h4 a:hover,
					.recent-post h6 a:hover,
					.postmeta a:hover,					
					.logo h1 span,
					.recent-post .morebtn:hover,
					.recent-post .morebtn,								
					.headernav ul li a:hover, 
					.headernav ul li.current_page_item a, 
					.headernav ul li.current_page_item ul li a:hover, 
					.headernav ul li.current-menu-ancestor a.parent, 
					.headernav ul li.current-menu-ancestor ul.sub-menu li.current_page_item a, 
					.headernav ul li.current-menu-ancestor ul.sub-menu li a:hover
					{ color:<?php echo esc_html( get_theme_mod('defaultcolor','#d34618')); ?>;}
					 
					
					.pagination .nav-links span.current, 
					.pagination .nav-links a:hover,
					#commentform input#submit:hover,										
					.nivo-controlNav a.active,					
					.wpcf7 input[type='submit'],						
					input.search-submit,					
					.slide_info .slideMore,
					.homeblogpost .articlelists .ReadMore					
					{ background-color:<?php echo esc_html( get_theme_mod('defaultcolor','#d34618')); ?> ;}
					
					.slide_info .slideMore					
					{ border-color:<?php echo esc_html( get_theme_mod('defaultcolor','#d34618')); ?> ;}					
					
					
			</style> 
<?php                            
} 
         
add_action('wp_head','worldwide_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function worldwide_customize_preview_js() {
	wp_enqueue_script( 'worldwide_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20161005', true );
}
add_action( 'customize_preview_init', 'worldwide_customize_preview_js' );