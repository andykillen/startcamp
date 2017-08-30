<?php
/**
 * Description of StartCampBase
 *
 * @author andrew
 */
class StartCampBase {
    protected $forms_nonce_name = 'fnn';
    protected $forms_nonce_action = 'gottaloveagoodnonce';

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
    function cache_bust($file_path){
        $bust = false;
        if(is_file($file = get_stylesheet_directory() . $file_path)){
            $bust =  filemtime( $file );
        }
        return $bust;
     }
}
