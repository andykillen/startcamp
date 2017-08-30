<?php
/**
 * Description of StartCampTheme
 *
 * @author andrew
 */
class StartCampTheme extends StartCampBase {
    public function init(){
        // Add post types needed for theme.
        add_action('init', array($this, 'registerPostTypes'), 10);
        // Add the taxonomies to the theme.
        add_action('init', array($this, 'registerTaxonomies'), 0);
        // Add things to the theme on first load.
        add_action('switch_theme', array($this, 'setupTheme'));
        // Add admin theme scripts and styles
        add_action('admin_enqueue_scripts', array($this, 'registerAdminScriptsStyles'));
        // Add front end theme scripts and styles.
        add_action('wp_enqueue_scripts', array($this, 'registerFrontendScriptsStyles'));
        // Add Languages.
        add_action('after_setup_theme', array($this, 'loadLanguages'));
        // Add Favicons to head.
        add_action("wp_head",  array($this, "addFavicons"));
    }

    public function loadLanguages (){
        load_theme_textdomain( 'startcamp', get_template_directory() . '/languages' );        
    }
    
    public function registerTaxonomies(){
        // person type
	include get_template_directory() . '/register/taxonomies/person.php';
        // talk type
        include get_template_directory() . '/register/taxonomies/talk-type.php';
        // Target Audience
        include get_template_directory() . '/register/taxonomies/audience.php';
    }

    public function registerPostTypes(){
        // Venue information
        include get_template_directory() . '/register/posttypes/venues.php';
        // People who are Speaking, Organizing or Sponsoring
        include get_template_directory() . '/register/posttypes/people.php';
        // Talks 
        include get_template_directory() . '/register/posttypes/talks.php';
    }

    /**
     * Add the front end theme script.
     */
    public function registerFrontendScriptsStyles(){
        
        wp_enqueue_script( 'startcamp-theme', get_template_directory_uri()  . "/js/theme.min.js", array(), $this->cache_bust( "/js/theme.min.js" ) , true );
    }
    /**
     * Adds scripts to admin pages where needed (Talks only at this time).
     */
    public function registerAdminScriptsStyles(){
        wp_enqueue_script( 'startcamp-admin', get_template_directory_uri()  . "/js/theme-admin.min.js", false, $this->cache_bust( "/js/theme-admin.min.js" )  );
    }

    /**
     * Adds a meta box to the post type 'talk' 
     */
    public function addMetaBoxes(){
        // start and end point
        // speaker        
    }

    /**
     * Saves the meta box to the post type 'talk' 
     */
    public function saveMetaBoxes(){
        // Start and end point
        // Speaker
    }

    /**
    * Add Favicons to the head section.  Uses stylesheet directory so 
     * it can be replaced with ones from the child theme.
    */
    function addFavicons(){
    ?><link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/favicon.ico" /><?php
    foreach([228,152,120,114,96,72,64] as $num) { ?>    
    <link rel="apple-icon-precomposed" sizes="<?php echo $num ?>x<?php echo $num ?>" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/icon-<?php echo $num ?>x<?php echo $num ?>.png">
    <?php }
    }

    /**
     * Adds a taxonomy data into the person type and talk type taxonomy
     */
    public function setupTheme(){
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
}
