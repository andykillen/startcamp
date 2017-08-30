<?php
/**
 * Template Name: Buy Ticket Step 2
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 * 
 * Personal information, such as t-shirt size
 * 
 */

get_header();

$step = 2;

include(locate_template('partials/steps.php'));


// Create a new form based on the registered name 'step1'
$form = new StartCampForms('step2'); 
// render the form and echo it to the screen
$form->renderForm();
// end of form
get_footer();
