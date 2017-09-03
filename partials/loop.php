<?php 
if ( have_posts() ) :
while ( have_posts() ) : the_post(); ?>
<article>
    <h1><?php the_title(); ?></h1>
    <?php do_action('below_title'); ?>
    <?php the_content(); ?>
    <?php do_action('below_content'); ?>
</article>
<?php endwhile;
endif;