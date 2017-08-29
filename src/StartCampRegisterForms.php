<?php

/**
 * Description of StartCampRegisterForms
 *
 * @author Andrew Killen
 */
class StartCampRegisterForms {
    protected $forms = [];
    
    /**
     * The unique instance of the plugin.
     *
     * @var WP_Kickass_Plugin
     */
    private static $instance;
 
    /**
     * Gets an instance of our plugin.
     *
     * @return WP_Kickass_Plugin
     */
    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
 
    /**
     * Constructor.
     */
    private function __construct()
    {
        // So ronery...
    }
    
    function register($name , $fields){
        $this->forms[$name] = $fields;
    }
    
    function get($name){
        if(isset($this->forms[$name])){
            return $this->forms[$name];
        }
    }
}
