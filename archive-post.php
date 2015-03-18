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
                em <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php echo strtolower(get_the_time('j \d\e F \d\e Y')); ?></time></span></p>
        </div>
        <div class="excerpt"><?php the_excerpt(); ?></div>
        <?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
        <div class="ver-mais"><a href="<?php the_permalink(); ?>" rel="bookmark">Ver mais...</a></div>
    </article>