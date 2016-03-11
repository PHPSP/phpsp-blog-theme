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

    <section class="content cat archive">
        <div class="row-fluid span12">
            <h1 class="blue-block"><strong>RFCs do PHPSP</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Autor</th>
                    <th>Criação</th>
                    <th>Fim da Votação</th>
                </tr>
                </thead>
                <tbody>
                <?php while ( have_posts() ) :
                    the_post();
                    $vote_end = date_create_from_format('Y-m-d', get_post_meta(get_the_ID(), '_wti_like_post_expiration_date', true));
                    if ($vote_end) {
                        $vote_end->setTime(23,59,59);
                        $vote_end_full = date_format($vote_end, 'Y-m-d H:i:s');
                        $vote_end_display = date_format($vote_end, 'd/m/Y');
                    }
                    else{
                        $vote_end_full = '--';
                        $vote_end_display = '--';
                    }
                    $status = get_post_meta(get_the_ID(), 'wti_like_post_status', true);
                    $internal_sign = has_category('rfc-internals')?'*':'';
                    ?>
                    <tr>
                        <td><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); echo $internal_sign; ?></a></td>
                        <td><?php echo $status ?></td>
                        <td><?php the_author() ?></td>
                        <td><time itemprop="dateCreated" datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_date(); ?></time></td>
                        <td><time itemprop="dateVoteEnded" datetime="<?php echo $vote_end_full; ?>"><?php echo $vote_end_display; ?></time></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
            <?php if ( current_user_can('edit_users') ) :?>
            <blockquote> * Significa que a RFC é privada</blockquote>
            <?php endif; ?>
            <div class="nav-previous">&nbsp;<?php previous_posts_link( '<< Página Anterior' ); ?></div>
            <div class="nav-next">&nbsp;<?php next_posts_link( 'Próxima Página >>' ); ?></div>
        </div>
    </section>

<?php get_footer(); ?>