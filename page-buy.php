<?php
/**
 * Template Name: Buy Tickets
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 * 
 * Business and Contact info
 * 
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
    
 endwhile;
endif;
// Create a new form based on the registered name 'step1'
$form = new StartCampForms('buy'); 
// render the form and echo it to the screen
$form->renderForm();
// end of form
get_footer();
