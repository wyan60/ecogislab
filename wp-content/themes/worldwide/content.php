<?php
/**
 * @package Worldwide
 */
?>
 <div class="articlelists">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
		<?php if (has_post_thumbnail() ){ ?>
          <div class="post-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>       
        <?php } ?>
  
        <header class="entry-header">           
            <?php if ( 'post' == get_post_type() ) : ?>
            	<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>               
            <?php endif; ?>            
        </header><!-- .entry-header -->
    
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
           <a class="ReadMore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','worldwide'); ?></a>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'worldwide' ) ); ?>          
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## -->
</div><!-- blog-post-repeat -->