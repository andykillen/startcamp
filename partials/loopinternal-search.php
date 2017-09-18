 <article class='search list'>
<?php if(has_post_thumbnail()){ ?>    
        <div class='search-image'>
            <?php the_post_thumbnail('mobile');  ?>
        </div>
<?php } ?>
    <div class='search-details'>
        <h2>
            <a href='<?php the_permalink() ?>' class='archive-title-link'>
                <?php the_title(); ?>
            </a>
        </h2>
        <?php do_action('below_title_archive'); ?>
        <?php the_excerpt(); ?>
        <a href='<?php the_permalink() ?>' class='archive-continue-reading-link'>
            <?php _e('continue reading ...', 'startcamp'); ?>
        </a>
        <?php do_action('below_excerpt_archive'); ?>
    </div>
</article>