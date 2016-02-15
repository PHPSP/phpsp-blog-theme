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

//check for private RFCs
if (!current_user_can('edit_private_posts'))
{
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
    include( get_query_template( '404' ) );
    die();
}

get_header(); ?>

    <section class="content cat archive">
        <div class="row-fluid span12">
            <div class="span8">
                <h1 class="blue-block"><strong>Categoria: </strong><?php echo single_cat_title('', false ); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'archive', 'post' ); ?>
                <?php endwhile; ?>
                <div class="nav-previous">&nbsp;<?php previous_posts_link( '<< Página Anterior' ); ?></div>
                <div class="nav-next">&nbsp;<?php next_posts_link( 'Próxima Página >>' ); ?></div>
            </div>
            <div class="span4 right-column">
                <?php if (is_active_sidebar('content-right-column-1')) : ?>
                    <?php dynamic_sidebar('content-right-column-1'); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>