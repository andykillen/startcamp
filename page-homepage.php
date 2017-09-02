<?php
/**
 * Template Name: Homepage
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 * 
 * Pre designed homepage.  Better than a blog :)
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        
        
        /**
         * begin main after hero image as thats the nicest way to do this.
         */
        
        get_template_part('partials/loop', 'home');
    endwhile;
endif;

$loop1_args = array( 
    'post_status'       => 'publish',
    'post_type'         => 'post',
    'posts_per_page'    => 4, // TODO : make customizer
);

$loop1 = new WP_Query($loop1_args);

if ( $loop1->have_posts() ) :    
    while ( $loop1->have_posts() ) : $loop1->the_post(); 
        get_template_part('partials/loop');
    endwhile;
    wp_reset_postdata();
    ?><a href="<?php ?>"><?php _e('read more news','startcamp'); ?></a><?php
endif;


$loop2_args = array( 
    'post_status'       => 'publish',
    'post_type'         => 'people',
    'posts_per_page'    => -1, // TODO : make customizer
    'tax_query'         => array(
                            'taxonomy' => 'person-type',
                            'field'    => 'slug',
                            'terms'    => 'speaker',
                        ),
    );

$loop3 = new WP_Query($loop2_args);

if ( $loop3->have_posts() ) :    
    while ( $loop3->have_posts() ) : $loop3->the_post(); 
        get_template_part('partials/loop');
    endwhile;
    wp_reset_postdata();
endif;

startcamp_show_programme();


$sponsors_loops = array(
   'platinum' => __('Platinum', 'startcamp'),
   'gold' => __('Gold', 'startcamp'),
   'silver' => __('Silver', 'startcamp'),
   'bronze' => __('Bronze', 'startcamp'), 
);

foreach ( $sponsors_loops as $type => $heading){
    $sponsors_loops_args = array( 
        'post_status'       => 'publish',
        'post_type'         => 'sponsors',
        'posts_per_page'    => -1, // TODO : make customizer
        'tax_query'         => array(
                                'taxonomy' => 'sponsor-type',
                                'field'    => 'slug',
                                'terms'    => $type,
                            ),
        );

    $sponsor_loop = new WP_Query($sponsors_loops_args);

    if ( $sponsor_loop->have_posts() ) :
        ?><section><h1><?php echo $heading; ?></h1><?php 
        while ( $sponsor_loop->have_posts() ) : $sponsor_loop->the_post(); 
            get_template_part('partials/loop');
        endwhile;
        wp_reset_postdata();
        ?></section><?php
    endif;
}

/** TODO:
 * 1. Hero image with overlay of what, where and logo
 * 2. News
 * 3. Speakers
 * 4. Programme
 * 5. Sponsors
 * 6. CTA buy.
 */

get_footer();