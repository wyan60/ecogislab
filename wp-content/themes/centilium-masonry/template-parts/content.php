<?php
/**
 * Template part for displaying posts.
 *
 * @package Centilium Masonry
 */

?>

<div class="card card-box" >					
	<div class="post-image"><!--Featured Image-->	
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>	
						
	<div class="card-block">
		<?php the_title( sprintf( '<h1 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="post-meta"><!--Post Meta-->
			<?php centilium_post_meta(); ?>
		</div>
						
		<div class="card-text">
			<?php
				/* the post excerpts */
				the_excerpt();
			?> 
								
			<div class="readmore">
				<a class="post-readmore " href="<?php the_permalink(); ?>"><?php esc_attr_e('READ MORE', 'centilium-masonry'); ?></a>
			</div>
		</div>
	</div>
</div>


