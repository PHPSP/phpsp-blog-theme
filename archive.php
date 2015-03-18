<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="content archive">
		<div class="row-fluid span12">
            <div class="span8">

            <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                    <h1 class="blue-block"><strong>Arquivo:</strong> <?php
                        if ( is_day() ) :
                            echo  get_the_date();
                        elseif ( is_month() ) :
                            echo get_the_date( _x('F Y', 'monthly archives date format' ));
                        elseif ( is_year() ) :
                            echo get_the_date( _x('Y', 'yearly archives date format'));
                        endif;
                    ?></h1>
                </header><!-- .archive-header -->

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'archive', 'post' ); ?>
                <?php endwhile; ?>
                <div class="nav-previous">&nbsp;<?php previous_posts_link( '<< Página Anterior' ); ?></div>
                <div class="nav-next">&nbsp;<?php next_posts_link( 'Próxima Página >>' ); ?></div>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

            </div>
            <div class="span4">
                <?php if (is_active_sidebar('content-right-column-1')) : ?>
                    <?php dynamic_sidebar('content-right-column-1'); ?>
                <?php endif; ?>
            </div>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>