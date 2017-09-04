<?php
/**
 * Template Name: Page with Map
 */
get_header();

if(have_posts()) :
    while (have_posts()) : the_post();
    
    endwhile;
endif;

startcamp_map();

get_footer();