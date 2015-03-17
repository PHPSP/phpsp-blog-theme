<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

	<section class="content cat">
		<div class="row-fluid span12">
			<div class="span8">
				<h2><?php echo single_cat_title( '', false ); ?></h2>
			<?php
				while ( have_posts() ) : the_post();
			?>
					<article itemtype="http://schema.org/Article" itemscope>					
						<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>						
						<time itemprop="dateCreated" datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php echo ucfirst(strtolower(get_the_time('l, j \d\e F, Y'))); ?></time>
						<div class="author">By <span itemprop="author"><?php the_author(); ?> </span></div>					
						<div class="excerpt"><?php the_excerpt(); ?></div>
					</article>
			<?php			
				endwhile; 
			?>
			<div class="nav-previous">&nbsp;<?php previous_posts_link( '<< Página Anterior' ); ?></div>
			<div class="nav-next">&nbsp;<?php next_posts_link( 'Próxima Página >>' ); ?></div>
			
			</div>
            <div class="span4">
            <?php if (is_active_sidebar('content-right-column-1')) : ?>
                <?php dynamic_sidebar('content-right-column-1'); ?>
            <?php endif; ?>
            </div>
		</div>
	</section>

<?php get_footer(); ?>