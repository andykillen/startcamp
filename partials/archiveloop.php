<?php 

if(has_posts()) :
the_archive_title('<h1>','</h1>');
    while ( have_posts() ) : the_post(); 
        get_template_part('partials/loopinternal','lists');
    endwhile;
endif;