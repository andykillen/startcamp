<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $posttype = '';
        if(is_page() || is_feed()){
            $posttype = get_post_type();
        }
        get_template_part('partials/loop', $posttype);
    endwhile;
endif;
