<?php
/**
 * Template Name: Blog
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();        
        get_template_part('partials/loop');
    endwhile;
    ?><div class="post-navigation"><?php
    get_template_part('partials/pagination');
    ?></div><?php
endif;
get_footer();