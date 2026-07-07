<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Worldwide
 */

get_header(); ?>

<div class="container">
     <div class="pagewrapper">
        <section class="site-main">            
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <div class="clear"></div>
                    <?php the_post_navigation(); ?>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>          
         </section>       
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- pagewrapper -->
</div><!-- container -->

<?php get_footer(); ?>