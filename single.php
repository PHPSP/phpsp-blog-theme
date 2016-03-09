<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//check for private RFCs
if (has_category('rfc-internals') && !current_user_can('edit_users'))
{
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
    include( get_query_template( '404' ) );
    die();
}

get_header();
the_post();
?>

	<section class="content sing single">
		<div class="row-fluid span12">
			<div class="span8">
				<article itemtype="http://schema.org/Article" itemscope>
					<h2><?php the_title(); ?></h2>
					<div class="author">
                        <p>Por <span itemprop="author"><?php the_author_posts_link(); ?> </span>
                            em <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_date(); ?></time>
                            em <span itemprop="category"><?php the_category(','); ?></span></p>
                    </div>
					<div class="excerpt"><?php the_content(); ?></div>
                    <?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
                </article>
				<?php
                if ( get_the_author_meta( 'description' ) ) : ?>
                    <div class="author-info">
                        <div class="author-description">
                            <h2 class="blue-block"><?php printf( __( 'Sobre <strong>%s</strong>' ), get_the_author() ); ?></h2>
                            <div class="author-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 120 ) ); ?>
                            </div><!-- .author-avatar -->
                            <p><?php the_author_meta( 'description' ); ?></p>
                        </div><!-- .author-description	-->
                        <?php if(get_the_author_meta('url')): ?>
                            <div class="author-card">
                                <p class="author-link">Site: <a href="<?php echo get_the_author_meta('url');?>"><?php echo get_the_author_meta('url'); ?></a></p>
                            </div>
                        <?php endif; ?>
                        <p>Mais posts de <?php echo the_author_posts_link(); ?>.</p>
                    </div><!-- .author-info -->
                <?php else: ?>

                <?php endif; ?>
				<?php comments_template(); ?>
			</div>
            <div class="span4 right-column">
                <?php if (is_active_sidebar('content-right-column-1')) : ?>
                    <?php dynamic_sidebar('content-right-column-1'); ?>
                <?php endif; ?>
            </div>
		</div>
	</section>

<?php get_footer(); ?>