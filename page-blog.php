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
    if(function_exists('wp_pagenavi')){
        wp_pagenavi();
    } else {
        posts_nav_link();
    }
    ?></div><?php
endif;
