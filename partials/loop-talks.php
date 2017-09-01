<article>
    <h1><?php the_title(); ?></h1>
    <?php do_action('below_title'); ?>
    <?php the_content(); ?>
    <?php do_action('below_content'); ?>
</article>