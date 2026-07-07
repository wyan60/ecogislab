<?php
/**
 * @package Worldwide
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>       
	<?php if (has_post_thumbnail() ){ ?>
    	<div class="post-thumb"><?php the_post_thumbnail(); ?></div>
    <?php }?>
    <div class="entry-content">	
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	
        <?php the_content(); ?> 
        
        <div class="postmeta">
            <div class="post-date"><?php the_date(); ?></div><!-- post-date -->
            <div class="post-comment"> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>              
             <div class="post-tags"><?php the_tags(); ?></div>
            <div class="clear"></div>         
    </div><!-- postmeta -->       
    </div><!-- .entry-content -->   
    <footer class="entry-meta">
     <?php edit_post_link( __( 'Edit', 'worldwide' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article>