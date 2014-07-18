<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="content cat">
		<div class="row-fluid">
			<div class="span8">			
				<h2><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<?php
					while ( have_posts() ) : the_post();
				?>
						<article itemscope itemtype="http://schema.org/Article">						
							<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>						
							<time itemprop="dateCreated" datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php echo ucfirst(strtolower(get_the_time('l, j \d\e F, Y'))); ?></time>
							<div class="author">By <span itemprop="author"><?php the_author(); ?> </span></div>					
							<div class="excerpt"><?php the_excerpt(); ?></div>
						</article>
				<?php			
					endwhile; 
					//the_bootstrap_content_nav();
				?>
				<div class="nav-previous">&nbsp;<?php previous_posts_link( '<< Página Anterior' ); ?></div>
				<div class="nav-next">&nbsp;<?php next_posts_link( 'Próxima Página >>' ); ?></div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>
<?php get_footer(); ?>