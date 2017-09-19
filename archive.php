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
    get_template_part('partials/loopinternal','lists');
    endwhile;
    if(function_exists('wp_pagenavi')){
        wp_pagenavi();
    } else {
        the_posts_pagination( array(
            'prev_text' =>  '<span class="screen-reader-text">' . __( 'Previous page', 'startcamp' ) . '</span>',
            'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'startcamp' ) . '</span>' ,
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'startcamp' ) . ' </span>',
        ) );
    }
endif;
