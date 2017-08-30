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
        
        // Add new taxonomy
        // person type
	$labels = array(
            'name'              => _x( 'Person Types', 'taxonomy general name', "startcamp" ),
            'singular_name'     => _x( 'Person Type', 'taxonomy singular name', "startcamp" ),
            'search_items'      => __( 'Search Person Types', "startcamp" ),
            'all_items'         => __( 'All Person Types', "startcamp" ),
            'parent_item'       => __( 'Parent Person Type', "startcamp" ),
            'parent_item_colon' => __( 'Parent Person Type:', "startcamp" ),
            'edit_item'         => __( 'Edit Person Type', "startcamp" ),
            'update_item'       => __( 'Update Person Type', "startcamp" ),
            'add_new_item'      => __( 'Add New Person Type', "startcamp" ),
            'new_item_name'     => __( 'New Person Type Name', "startcamp" ),
            'menu_name'         => __( 'Person Type', "startcamp" ),
	);

	$args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => __('person-type','startcamp') ),
	);

	register_taxonomy( 'person-type', array( 'people' ), $args );

        // talk type
        $labels = array(
            'name'              => _x( 'Talk Types', 'taxonomy general name', "startcamp" ),
            'singular_name'     => _x( 'Talk Type', 'taxonomy singular name', "startcamp" ),
            'search_items'      => __( 'Search Talk Types', "startcamp" ),
            'all_items'         => __( 'All Talk Types', "startcamp" ),
            'parent_item'       => __( 'Parent Talk Type', "startcamp" ),
            'parent_item_colon' => __( 'Parent Talk Type:', "startcamp" ),
            'edit_item'         => __( 'Edit Talk Type', "startcamp" ),
            'update_item'       => __( 'Update Talk Type', "startcamp" ),
            'add_new_item'      => __( 'Add New Talk Type', "startcamp" ),
            'new_item_name'     => __( 'New Talk Type Name', "startcamp" ),
            'menu_name'         => __( 'Talk Type', "startcamp" ),
	);

	$args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => __('talk-type','startcamp') ),
	);

	register_taxonomy( 'talk-type', array( 'talk' ), $args );
        
        // Target Audience
        $labels = array(
            'name'              => _x( 'Audiences', 'taxonomy general name', "startcamp" ),
            'singular_name'     => _x( 'Audience', 'taxonomy singular name', "startcamp" ),
            'search_items'      => __( 'Search Audiences', "startcamp" ),
            'all_items'         => __( 'All Audiences', "startcamp" ),
            'parent_item'       => __( 'Parent Audience', "startcamp" ),
            'parent_item_colon' => __( 'Parent Audience:', "startcamp" ),
            'edit_item'         => __( 'Edit Audience', "startcamp" ),
            'update_item'       => __( 'Update Audience', "startcamp" ),
            'add_new_item'      => __( 'Add New Audience', "startcamp" ),
            'new_item_name'     => __( 'New Audience Name', "startcamp" ),
            'menu_name'         => __( 'Audience', "startcamp" ),
	);

	$args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => __('audience','startcamp') ),
	);

	register_taxonomy( 'audience', array( 'talk' ), $args );
    }

    public function registerPostTypes(){
        // venues
        $labels = array(
            'name'               => _x( 'Venues', 'post type general name', 'startcamp' ),
            'singular_name'      => _x( 'Venue', 'post type singular name', 'startcamp' ),
            'menu_name'          => _x( 'Venues', 'admin menu', 'startcamp' ),
            'name_admin_bar'     => _x( 'Venue', 'add new on admin bar', 'startcamp' ),
            'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
            'add_new_item'       => __( 'Add New Venue', 'startcamp' ),
            'new_item'           => __( 'New Venue', 'startcamp' ),
            'edit_item'          => __( 'Edit Venue', 'startcamp' ),
            'view_item'          => __( 'View Venue', 'startcamp' ),
            'all_items'          => __( 'All Venues', 'startcamp' ),
            'search_items'       => __( 'Search Venues', 'startcamp' ),
            'parent_item_colon'  => __( 'Parent Venues:', 'startcamp' ),
            'not_found'          => __( 'No items found.', 'startcamp' ),
            'not_found_in_trash' => __( 'No items found in Trash.', 'startcamp' ),
	);

	$args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'startcamp' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => __('venues','startcamp') ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	);

	register_post_type( 'venues', $args );
        // people
         $labels = array(
            'name'               => _x( 'Peoples', 'post type general name', 'startcamp' ),
            'singular_name'      => _x( 'People', 'post type singular name', 'startcamp' ),
            'menu_name'          => _x( 'Peoples', 'admin menu', 'startcamp' ),
            'name_admin_bar'     => _x( 'People', 'add new on admin bar', 'startcamp' ),
            'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
            'add_new_item'       => __( 'Add New People', 'startcamp' ),
            'new_item'           => __( 'New People', 'startcamp' ),
            'edit_item'          => __( 'Edit People', 'startcamp' ),
            'view_item'          => __( 'View People', 'startcamp' ),
            'all_items'          => __( 'All Peoples', 'startcamp' ),
            'search_items'       => __( 'Search Peoples', 'startcamp' ),
            'parent_item_colon'  => __( 'Parent Peoples:', 'startcamp' ),
            'not_found'          => __( 'No items found.', 'startcamp' ),
            'not_found_in_trash' => __( 'No items found in Trash.', 'startcamp' ),
	);

	$args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'startcamp' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => __('people','startcamp') ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	);

	register_post_type( 'people', $args );
        // talks
         $labels = array(
            'name'               => _x( 'Talks', 'post type general name', 'startcamp' ),
            'singular_name'      => _x( 'Talk', 'post type singular name', 'startcamp' ),
            'menu_name'          => _x( 'Talks', 'admin menu', 'startcamp' ),
            'name_admin_bar'     => _x( 'Talk', 'add new on admin bar', 'startcamp' ),
            'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
            'add_new_item'       => __( 'Add New Talk', 'startcamp' ),
            'new_item'           => __( 'New Talk', 'startcamp' ),
            'edit_item'          => __( 'Edit Talk', 'startcamp' ),
            'view_item'          => __( 'View Talk', 'startcamp' ),
            'all_items'          => __( 'All Talks', 'startcamp' ),
            'search_items'       => __( 'Search Talks', 'startcamp' ),
            'parent_item_colon'  => __( 'Parent Talks:', 'startcamp' ),
            'not_found'          => __( 'No items found.', 'startcamp' ),
            'not_found_in_trash' => __( 'No items found in Trash.', 'startcamp' ),
	);

	$args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'startcamp' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => __('talks','startcamp') ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	);

	register_post_type( 'talks', $args );
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
            
            // add standard categories (with localized names) to system
            $array_of_tax_terms = array(
                'audience' => [__("Beginner", "startcamp")      => array( 'desctiption' =>'', 'nicename' => 'beginner', 'parent' =>'' )],
                'audience' => [__("Intermediate", "startcamp")  => array( 'desctiption' =>'', 'nicename' => 'intermediate', 'parent' =>'' )],
                'audience' => [ __("Advanced", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'advanced', 'parent' =>'' )],
                'audience' => [ __("Coder", "startcamp")        => array( 'desctiption' =>'', 'nicename' => 'coder', 'parent' =>'' )],
                'audience' => [ __("Marketeer", "startcamp")    => array( 'desctiption' =>'', 'nicename' => 'marketeer', 'parent' =>'' )],
                'audience' => [ __("SEOer", "startcamp")        => array( 'desctiption' =>'', 'nicename' => 'seo', 'parent' =>'' )],
                'audience' => [ __("Administrator", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'administrator', 'parent' =>'' )],
                'audience' => [ __("Integrator", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'integrator', 'parent' =>'' )],
                
                'person-type' => [ __("Organizers", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'organizer', 'parent' =>'' )],
                'person-type' => [ __("Sponsor", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'sponsor', 'parent' =>'' )],
                'person-type' => [ __("Speaker", "startcamp")   => array( 'desctiption' =>'', 'nicename' => 'speaker', 'parent' =>'' )],
                
                'talk-type' => [ __("Workshop", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'workshop', 'parent' =>'' )],
                'talk-type' => [ __("Overview", "startcamp")     => array( 'desctiption' =>'', 'nicename' => 'overview', 'parent' =>'' )],
                'talk-type' => [ __("Inspirational", "startcamp")=> array( 'desctiption' =>'', 'nicename' => 'inspirational', 'parent' =>'' )],
            );
            foreach ($array_of_tax_terms as $tax => $term_details){
                wp_insert_term(array_key($term_details) , $tax, array_values($term_details) );
            }

        }
    }
}
