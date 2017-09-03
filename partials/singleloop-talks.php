<?php 
if ( have_posts() ) :
while ( have_posts() ) : the_post(); ?>

<article class='grid'>
    <?php if(has_post_thumbnail()){ ?>
    <div class='row'>
        <div class='wide-col'>
            <?php the_post_thumbnail('page')  ?>
        </div>
    </div>
    <?php } ?>
    <div class='row'>
        <div class='left-col'>
            <h1><?php the_title(); ?></h1>
            <?php do_action('below_title'); ?>
            <?php the_content(); ?>
            <?php do_action('below_content'); ?>
        </div>
        <aside class='right-col'>
            <?php dynamic_sidebar(get_post_type()); ?>
        </aside>
    </div>
</article>

<?php endwhile; 
endif;