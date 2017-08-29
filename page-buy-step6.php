<?php
/**
 * Template Name: Buy Ticket Step 6
 * @package WordPress
 * @subpackage startcamp
 * @author Andrew Killen
 * 
 * Business and Contact info
 * 
 */


get_header();

$step = 1;

template_get_part('partials/steps');

?>
<h1><?php the_title() ?></h1>
<?php the_content() ?>
<form name="step1" 
      id="step1" 
      action="<?php echo get_permalink( get_page_by_path( 'step2' ) ) ?>" 
      method="post" >
    <h2><?php _e('Type of ticket','startcamp') ?></h1>
    <input type="radio" name="ticket_type" value="personal" id="personal">
    <label id="personal_label" for="personal">
        <?php _e('personal','startcamp') ?>
    </label>
    <input type="radio" name="ticket_type" value="personal" id="business">
    <label id="business_label" for="business">
        <?php _e('business','startcamp') ?>
    </label>
    <div id="personal_info" >
        <h3 id="personal_info_title" class="section-title">
            <?php _e('personal information','startcamp') ?>
        </h3>
        
        <label id="personal_name_label" for="personal_name">
            <?php _e('your name','startcamp') ?>
        </label>
        <input type="text" name="personal_name" id="personal_name" value="" />
        
        <label id="personal_email_label" for="personal_email">
            <?php _e('your email','startcamp') ?>
        </label>
        <input type="text" name="email_name" id="email_name" value="" />
        
    </div>
    
    <div id="business_info">
        <h3 id="business_info_title" class="section-title">
            <?php _e('business information','startcamp') ?>
        </h3>
        
        <label id="business_name_label" for="business_name">
            <?php _e('business name','startcamp') ?>
        </label>
        <input name="business_name" id="business_name" value="" />
        
        <label type="text" id="business_vat_label" for="business_vat">
            <?php _e('VAT number','startcamp') ?>
        </label>
        <input type="text" name="business_vat" id="business_vat" value="" />
    </div>  
    <input type="submit" value="<?php _e('next','startcamp') ?>" />
 </form>