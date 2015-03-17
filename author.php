<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main"class="row-fluid span12">
            <div class="span8">
		<?php if ( have_posts() ) : ?>
			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-description">
					<h2 class="blue-block"><?php printf( __( 'Sobre <strong>%s</strong>' ), get_the_author() ); ?></h2>
                    <div class="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 120 ) ); ?>
                    </div><!-- .author-avatar -->
					<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description	-->
			</div><!-- .author-info -->
            <h2 class="blue-block"><strong>Posts</strong> do autor</h2>
			<?php endif; ?>
            <h2 class="blue-block"><strong>Posts</strong> de <?php the_author(); ?></h2>

            <?php
            /* Start the Loop */
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>