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
				<h1 class="blue-block"><strong>Categoria: </strong><?php echo single_cat_title('', false ); ?></h1>
			<?php
				while ( have_posts() ) : the_post();
			?>
                <article itemtype="http://schema.org/Article" itemscope>
                    <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="author">
                        <p>Por <span itemprop="author"><?php the_author_posts_link(); ?> </span>
                            em <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php echo strtolower(get_the_time('j \d\e F \d\e Y')); ?></time></span></p>
                    </div>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                    <?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
                    <div class="ver-mais"><a href="<?php the_permalink(); ?>" rel="bookmark">Ver mais...</a></div>
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