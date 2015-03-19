<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="content archive">
        <div class="row-fluid span12">
            <div class="span8">
                <h1 class="blue-block"><strong>Busca por:</strong> <?php echo get_search_query(); ?></h1>
				<?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'archive', 'post' ); ?>
				<?php endwhile; ?>
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