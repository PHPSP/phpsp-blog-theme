
<div class="row-fluid article-phpsp-home article-phpsp-home-each">
    <div class="span3 article-phpsp-home-each-image">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'the-bootstrap_author_bio_avatar_size', 70 ) ); ?>
    </div>
    <div class="span9">
        <div class="art_title">
            <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
        </div>
            <small class="art_por"> por <?php echo the_author_posts_link(); ?></small>
    </div>
</div>
