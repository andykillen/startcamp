<?php
/**
 * Template Name: Buy Ticket Step 1
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 * 
 * Business and Contact info
 * 
 */

get_header();

$step = 1;

include(locate_template('partials/steps.php')); ?>

<h1><?php // the_title() ?></h1>
<?php 
// Create a new form based on the registered name 'step1'
$form = new StartCampForms('step1'); 
// render the form and echo it to the screen
$form->renderForm();
// end of form
get_footer();
