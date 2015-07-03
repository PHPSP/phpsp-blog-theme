<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="content search">
        <?php if ( have_posts() ) : ?>
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
        <?php else : ?>
        <div class="row-fluid span12 not-found">
            <h1 class="blue-block"><strong>Busca por:</strong> <?php echo get_search_query(); ?></h1>
            <p>
                Sua busca não retornou nenhum resultado. Tente novamente:
            </p>
            <div class="busca_404"><?php get_search_form(); ?></div>
        </div>
        <div class="row-fluid span12">
            <div class="row-fluid">
                <div class="bl_eventos span4">
                    <?php dynamic_sidebar('home-column-1'); ?>
                </div>
                <div class="bl_artigos span4">
                    <?php dynamic_sidebar('home-column-2'); ?>
                </div>
                <div class="bl_avisos span4">
                    <?php dynamic_sidebar('home-column-3'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
	</section>
<?php get_footer(); ?>