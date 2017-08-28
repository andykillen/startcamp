<?php
/**
 * Description of autoloader
 *
 * @author andrew killen
 */
class StartCamp_Autoloader {
    /**
     * Registers StartCamp_Autoloader as an SPL autoloader.
     *
     * @param boolean $prepend
     */
    public static function register($prepend = false)
    {
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            spl_autoload_register(array(new self, 'autoload'), true, $prepend);
        } else {
            spl_autoload_register(array(new self, 'autoload'));
        }
    }
 
    /**
     * Handles autoloading of StartCamp classes.
     *
     * @param string $class
     */
    public static function autoload($class)
    {
        if (0 !== strpos($class, 'StartCamp')) {
            return;
        }
 
        if (is_file($file = dirname(__FILE__).'/'.$class.'.php')) {
            require_once $file;
        }
    }
}