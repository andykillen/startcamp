<?php
/**
 * Template used when showing Date, Author, Tag, Category or Taxonomy 
 * 
 * can be overridden by using the template hierarchy.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

if ( have_posts() ) :

    the_archive_title( '<h1 class="archive-title">', '</h1>' );
    the_archive_description( '<div class="archive-description">', '</div>' );

    while ( have_posts() ) : the_post(); 

        get_template_part('partials/archiveloopinternal',startcamp_get_archive_type());
    
    endwhile;

    get_template_part('partials/pagination');

endif;
