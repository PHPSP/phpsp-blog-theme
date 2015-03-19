<?php
/**
 * The template for displaying a post in a list.
 *
 * @package PHPSP
 * @subpackage phpsp-blog-theme
 * @since 1.2.2
 */
?>

    <article itemtype="http://schema.org/Article" itemscope>
        <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="author">
            <p>Por <span itemprop="author"><?php the_author_posts_link(); ?> </span>
                em <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_date(); ?></time></span>
                <?php if (!is_category()) : ?>
                em <span itemprop="category"><?php the_category(','); ?></span>
                <?php endif; ?>
            </p>
        </div>
        <div class="excerpt"><?php the_excerpt(); ?></div>
        <?php if(!is_tag()) : ?>
        <?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
        <?php endif; ?>
        <div class="ver-mais"><a href="<?php the_permalink(); ?>" rel="bookmark">Ver mais...</a></div>
    </article>