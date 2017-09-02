<?php
// Autoloader for any theme Classes
require 'src/autoloader.php';
// Register the Autoloader so it looks for StartCamp files
StartCamp_Autoloader::register();

// Start by registering forms that are available
$forms = StartCampRegisterForms::get_instance();
// Array of forms to register
$include_forms = [
  'buy' => 'forms/buy.php',  
];
// load up the file and register the form as needed
foreach($include_forms as $name => $file) {
    include $file;
    $forms->register($name, $form);
}

// Setup the theme







if(!function_exists('startcamp_theme_setup')):
/**
 * Theme basic setup
 */
function startcamp_theme_setup(){
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );

    add_image_size( 'hero', 1920, 1200, true );
    add_image_size( 'page', 1280, 800, true );
    add_image_size( 'tablet', 853, 533, true );
    add_image_size( 'mobile', 568, 355, true );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'startcamp' ),
        'social'  => __( 'Social Links Menu', 'startcamp' ),
        'footer'  => __( 'Footer Menu', 'startcamp' ),
    ) );
    add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',	
		'caption',
	) );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'startcamp_theme_setup' );
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
        // Sponsors 
        include get_template_directory() . '/register/posttypes/sponsors.php';
    }
endif;
// Add post types needed for theme.
add_action('init', 'startcamp_register_post_types', 10);

/**
 * Register taxonomies
 */
if(!function_exists('startcamp_register_taxonomies')):
    function startcamp_register_taxonomies(){
        // person type
        include get_template_directory() . '/register/taxonomies/person-type.php';
        // talk type
        include get_template_directory() . '/register/taxonomies/talk-type.php';
        // Target Audience
        include get_template_directory() . '/register/taxonomies/audience.php';
        // Sponsor types
        include get_template_directory() . '/register/taxonomies/sponsor-type.php';
    }
endif;
// Add the taxonomies to the theme.
add_action('init', 'startcamp_register_taxonomies', 0);

/**
* Add the front end theme script.
*/
if(!function_exists('startcamp_register_frontend_scripts_styles')):
    function startcamp_register_frontend_scripts_styles(){
        $type = (WP_DEBUG)? '.min' : '';
        wp_enqueue_script( 'startcamp-theme', get_template_directory_uri()  . "/js/theme$type.js", array(), startcamp_cache_bust( "/js/theme$type.js" ) , true );
        wp_enqueue_style( 'startcamp-theme', get_template_directory_uri()  . "/css/frontend$type.css", array(), startcamp_cache_bust( "/css/frontend$type.css" )  );
        if ( is_singular() && comments_open()) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
endif;
// Add front end theme scripts and styles.
add_action('wp_enqueue_scripts', 'startcamp_register_frontend_scripts_styles');


/**
* Adds scripts to admin pages where needed (Talks only at this time).
*/
if(!function_exists('startcamp_register_admin_scripts_styles')):
    function startcamp_register_admin_scripts_styles(){
       $type = (WP_DEBUG)? '.min' : '';
       wp_enqueue_script( 'startcamp-admin', get_template_directory_uri()  . "/js/admin$type.js", false, startcamp_cache_bust( "/js/admin$type.js" )  );
       wp_enqueue_style( 'startcamp-admin', get_template_directory_uri()  . "/css/admin$type.css", false, startcamp_cache_bust( "/css/admin$type.css" )  );
    }
endif;
// Add admin theme scripts and styles
add_action('admin_enqueue_scripts', 'startcamp_register_admin_scripts_styles');

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
// Add Favicons to head.
add_action("wp_head","startcamp_add_favicons");

/**
 * Load the PO files for the languages. 
 */
if(!function_exists('startcamp_load_languages')):
    function startcamp_load_languages(){
        load_theme_textdomain( 'startcamp', get_template_directory() . '/languages' );        
    }
endif;
// Add Languages.
add_action('after_setup_theme', 'startcamp_load_languages');

/**
* Adds a taxonomy data into the person type and talk type taxonomy
*/
if(!function_exists('startcamp_switch_theme')):
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
// Add things to the theme on first load.
add_action('switch_theme', 'startcamp_switch_theme');


if(!function_exists('startcamp_cache_bust')):
    /**
     * Checks the stylesheet directory for the correct file. If font returns the
     * file time epoch to use as a cache buster.  Thus the last edit time is
     * used to create the version number.
     * 
     * Does not use template directory incase it is overridden later.  To be tested.
     * 
     * @param string $file_path
     * @return bool or int
     */
     function startcamp_cache_bust($file_path){
        $bust = false;
        if(is_file($file = get_stylesheet_directory() . $file_path)){
            $bust =  filemtime( $file );
        }
        return $bust;
     }
endif;

/**
 * Customizer settings for Theme
 */
$custom = new StartCampCustomizer();
$custom->init();  // nope, no __construct.


if(!function_exists('startcamp_show_programme')) :
    function startcamp_show_programme(){
        echo "the programme here!";
    }
endif;

if(!function_exists('startcamp_currency_list')) :
    function startcamp_currency_list() {
        $currency = array_reverse(array('ZWD','ZMW','ZAR','YER','XPF','XOF','XDR','XCD','XAF',
            'WST','VUV','VND','VEF','UZS','UYU','USD','UGX','UAH','TZS','TWD','TVD',
            'TTD','TRY','TOP','TND','TMT','TJS','THB','SZL','SYP','SVC','STD','SRD',
            'SOS','SLL','SHP','SGD','SEK','SDG','SCR','SBD','SAR','RWF','RUB','RSD',
            'RON','QAR','PYG','PLN','PKR','PHP','PGK','PEN','PAB','OMR','NZD','NPR',
            'NOK','NIO','NGN','NAD','MZN','MYR','MXN','MWK','MVR','MUR','MRO','MOP',
            'MNT','MMK','MKD','MGA','MDL','MAD','LYD','LSL','LRD','LKR','LBP','LAK',
            'KZT','KYD','KWD','KRW','KPW','KMF','KHR','KGS','KES','JPY','JOD','JMD',
            'JEP','ISK','IRR','IQD','INR','IMP','ILS','IDR','HUF','HTG','HRK','HNL',
            'HKD','GYD','GTQ','GNF','GMD','GIP','GHS','GGP','GEL','GBP','FKP','FJD',
            'EUR','ETB','ERN','EGP','DZD','DOP','DKK','DJF','CZK','CVE','CUP','CUC',
            'CRC','COP','CNY','CLP','CHF','CDF','CAD','BZD','BYN','BWP','BTN','BSD',
            'BRL','BOB','BND','BMD','BIF','BHD','BGN','BDT','BBD','BAM','AZN','AWG',
            'AUD','ARS','AOA','ANG','AMD','ALL','AFN','AED'));
        
        return array_combine($currency, $currency);
    }
endif;

if(!function_exists('startcamp_share_urls')) :
    function startcamp_share_urls($wantedUrls){
        $allShareUrls = array(
            'facebook' => "http://www.facebook.com/sharer.php?u=%URI%&amp;t=%TITLE%",
            'googleplus' => "https://plusone.google.com/_/+1/confirm?hl=en&amp;url=%URI%&amp;title=%TITLE%",
            'twitter' => "http://twitter.com/share?url=%URI%&amp;text=%TITLE%",
            'whatsapp' => "whatsapp://send?text=%TITLE% %URI%",
            'viber' => "viber://forward?text=%TITLE% %URI%",
            "pinterest" => 'http://pinterest.com/pin/create/button/?url=%URI%&media=%IMAGE%&description=%TITLE%',
            "linkedin" => 'http://www.linkedin.com/shareArticle?mini=true&url=%URI%&title=%TITLE%',
            "qqzone"=> "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=%URI%&summary=%TITLE%",
            "tencent" => "http://share.v.t.qq.com/index.php?c=share&a=index&title=%TITLE%&url=%URI%",
            "163" =>"http://t.163.com/article/user/checkLogin.do?source=%E7%BD%91%E6%98%93%E5%BE%AE%E5%8D%9A&info=%TITLE%%20%URI%",
            "baidu" => "http://apps.hi.baidu.com/share/?url=%URI%&title=%TITLE%&content=",
            "weibo" => "http://v.t.sina.com.cn/share/share.php?title=%TITLE%&url=%URI%",
            "douban" => "http://www.douban.com/recommend/?url=%URI%&title=%TITLE%&sel=&v=1",
            "kaixin" => "http://www.kaixin001.com/repaste/share.php?rtitle=%TITLE%&rcontent=&rurl=%URI%",
            "renren" => "http://share.renren.com/share/buttonshare.do?link=%TITLE%&title=%TITLE%",            
          );
        return array_replace( array_flip($wantedUrls) , array_intersect_key($allShareUrls, array_flip($wantedUrls) ) );
    }
endif;
/**
 * TODO:
 * 1. page formats  // 50%
 
 * 3. images & responsive
 
 * * 6. Share FB, Twitter, Linked in. 
 * 7. JSON LD 
 * 8. Finish the customizer
 * 9. Hero image
 * 10. forms
 
 * 12. Archive layout
 */