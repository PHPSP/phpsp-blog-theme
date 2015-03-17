<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
the_post();
?>

	<section class="content cat sing">
		<div class="row-fluid span12">
			<div class="span8">
				<article itemtype="http://schema.org/Article" itemscope>					
					<h2><?php the_title(); ?></h2>						
					<div class="author">Por <span itemprop="author"><?php the_author_posts_link(); ?> </span> em <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php echo strtolower(get_the_time('j \d\e F \d\e Y')); ?></time></div>
					<?php the_tags( '<p class="tags"><small>Tags: ', ', ', '</small></p>'); ?>
					<div class="excerpt"><?php the_content(); ?></div>									
				</article>
				<?php
					if ( get_the_author_meta( 'description' ) ) : ?>
					  <div id="entry-author-info" class="single-author-info">
						  <div id="author-avatar">
							  <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						  </div><!-- #author-avatar -->
						  <div id="author-description">
							  <h2><?php printf( __( 'Sobre %s', 'twentyten' ), get_the_author() ); ?></h2>
							 <div><?php the_author_meta( 'description' ); ?></div>
						  </div><!-- #author-description	-->
					  </div><!-- #entry-author-info -->
				<?php endif; ?>
				<?php comments_template(); ?>
			</div>
            <div class="span4">
                <?php if (is_active_sidebar('content-right-column-1')) : ?>
                    <?php dynamic_sidebar('content-right-column-1'); ?>
                <?php endif; ?>
            </div>
		</div>
	</section>

<?php get_footer(); ?>