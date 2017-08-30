<?php
// Autoloader for any theme Classes
require 'src/autoloader.php';
// Register the Autoloader so it looks for StartCamp files
StartCamp_Autoloader::register();

// Start by registering forms that are available
$forms = StartCampRegisterForms::get_instance();
// Array of forms to register
$include_forms = [
  'step1' => 'forms/step1.php',
  'step2' => 'forms/step2.php'
];
// load up the file and register the form as needed
foreach($include_forms as $name => $file) {
    include $file;
    $forms->register($name, $form);
}

// Setup the theme
// Add post types needed for theme.
add_action('init', 'startcamp_register_post_types', 10);
// Add the taxonomies to the theme.
add_action('init', 'startcamp_register_taxonomies', 0);
// Add things to the theme on first load.
add_action('switch_theme', 'startcamp_setup_theme');
// Add admin theme scripts and styles
add_action('admin_enqueue_scripts', 'startcamp_register_admin_scripts_styles');
// Add front end theme scripts and styles.
add_action('wp_enqueue_scripts', 'startcamp_register_frontend_scripts_styles');
// Add Languages.
add_action('after_setup_theme', 'loadLanguages');
// Add Favicons to head.
add_action("wp_head","startcamp_add_favicons");

/**
 * Register posttypes
 */
if(!function_exists('startcamp_register_post_types')):
    function startcamp_register_post_types(){
        // Venue information
        include get_template_directory() . '/register/posttypes/venues.php';
        // People who are Speaking, Organizing or Sponsoring
        include get_template_directory() . '/register/posttypes/people.php';
        // Talks 
        include get_template_directory() . '/register/posttypes/talks.php';
    }
endif;
/**
 * Register taxonomies
 */
if(!function_exists('startcamp_register_taxonomies')):
    function startcamp_register_taxonomies(){
        // person type
        include get_template_directory() . '/register/taxonomies/person.php';
        // talk type
        include get_template_directory() . '/register/taxonomies/talk-type.php';
        // Target Audience
        include get_template_directory() . '/register/taxonomies/audience.php';
    }
endif;
/**
* Add the front end theme script.
*/
if(!function_exists('startcamp_register_frontend_scripts_styles')):
    function startcamp_register_frontend_scripts_styles(){
       wp_enqueue_script( 'startcamp-theme', get_template_directory_uri()  . "/js/theme.min.js", array(), StartCampBase::cache_bust( "/js/theme.min.js" ) , true );
    }
endif;

/**
* Adds scripts to admin pages where needed (Talks only at this time).
*/
if(!function_exists('startcamp_register_admin_scripts_styles')):
    function startcamp_register_admin_scripts_styles(){
       wp_enqueue_script( 'startcamp-admin', get_template_directory_uri()  . "/js/theme-admin.min.js", false, StartCampBase::cache_bust( "/js/theme-admin.min.js" )  );
    }
endif;

/**
* Add Favicons to the head section.  Uses stylesheet directory so 
* it can be replaced with ones from the child theme.
*/
if(!function_exists('startcamp_add_favicons')):
    function startcamp_add_favicons(){
    ?><link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/favicon.ico" /><?php
    foreach([228,152,120,114,96,72,64] as $num) { ?>    
    <link rel="apple-icon-precomposed" sizes="<?php echo $num ?>x<?php echo $num ?>" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/icon-<?php echo $num ?>x<?php echo $num ?>.png">
    <?php }
    }
endif;

/**
 * Load the PO files for the languages. 
 */
if(!function_exists('startcamp_load_languages')):
    function startcamp_load_languages(){
        load_theme_textdomain( 'startcamp', get_template_directory() . '/languages' );        
    }
endif;

/**
* Adds a taxonomy data into the person type and talk type taxonomy
*/
if(!function_exists('startcamp_setup_theme')):
    function startcamp_setup_theme(){
        // add baisc Taxonomy info
        if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
            require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
            // Define option name.
            $option = 'startcamp_first-activation';
            // If option does not exist then load the first activation terms
            if(false == get_option($option)){
                // Add standard taxonomies terms (with localized names) to system
                include get_template_directory() . '/register/terms/first-activation.php';
                // Update the option so it is only shown on first load. 
                update_option($option, true, false);
            }
        }
    }
endif;