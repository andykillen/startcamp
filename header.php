<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'startcamp' ); ?></a>
        <div id="holder">
        <header>
            
        </header>
        <?php 
        /** 
         * Do not put main here if using the homepage template as the hero image 
         * wants to be much wider than this. 
         */
        if(is_page() && is_page_template('page-homepage.php') &&  has_post_thumbnail( get_queried_object_id() ) ) : 
            if(has_post_thumbnail()){
            ?><div class="hero"><?php
            echo get_the_post_thumbnail( get_queried_object_id(), 'hero' );
            /**
             * TODO:
             * 1. add logo
             * 2. add dates
             * 3. add tagline
             */
             ?></div><?php
            } ?>        
        <?php endif; ?>
        <main id="content">