<article class='list'>
    <?php if(has_post_thumbnail()) : ?>
        <a href='<?php the_permalink() ?>'>
            <?php the_post_thumbnail('medium') ?>
        </a>
    <?php endif; ?>
    <h2>
        <a href='<?php the_permalink() ?>'>
            <?php the_title(); ?>
        </a>
    </h2>
    <p>
        <?php the_excerpt() ?>
        <a href='<?php the_permalink() ?>'>
            <?php _e('continue reading ...', 'startcamp') ?>
        </a>
    </p>
</article>

