<?php

get_header(); ?>

<h1><?php single_term_title('Currently browsing '); ?></h1><?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
        get_template_part('partials/loop');
    endwhile;
endif;
