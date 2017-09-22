<?php 
/**
 * This will only show for pages that are listings, singular pages will load
 * the singleloop.php template part (with possible content type arguement)
 * 
 * This really is a fallback situation that will more than likely never be loaded
 * because the archive.php or search.php will load before this in the template 
 * heirarchy. This is what it will load if nothing else is possible.
 */
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
        get_template_part('partials/loopinternal', 'lists');
    endwhile;
    get_template_part('partials/pagination');
endif;