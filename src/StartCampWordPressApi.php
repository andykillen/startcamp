<?php

/**
 * StartCampWordPressApi gets content from the wordpress.org API based on the
 * username supplied. Finds out if someone is a core contributor, theme maker or
 * plugin developer.
 * 
 * Access the details from the public class variable $user_details
 *
 * @author Andrew Killen
 */
class StartCampWordPressApi {
    /**
     * The username, setup in constructor.
     *
     * @var string
     */
    protected $user;

    /**
     * Details of users registration at wordpress.org get saved in this array.
     *
     * @var array
     */
    public $user_details = array();

    /**
     * Class constructor checks if there is a usersname, and then checks against
     * wordpress.org's APIs.
     *
     * @param string $user
     *
     * @return boolean if the username is not good
     */
    function __construct($user = ''){
        if(empty($user)){
            error_log('no valid user set in constructor of StartCampWordPressApi');
            return false;
        }
        $this->user = $user;
        $this->themeMakerCheck();
        $this->pluginMakerCheck();
        $this->coreContributorCheck();
    }

    /**
     * Check against wordpress.org API to see if the username has written any
     * themes.
     */
    protected function themeMakerCheck(){
        // https://api.wordpress.org/themes/info/1.1/?action=query_themes&request[author]=USERNAME
        $dev =  $this->get('https://api.wordpress.org/plugins/info/1.1/?action=query_plugins&request[author]=' . $this->user);
        if($dev['info']['results'] > 0){
            $this->user_details[] = 'theme-developer';
        }
    }
    
    /** 
     * Check against wordpress.org API to see if the username has written any
     * plugins.
     */
    protected function pluginMakerCheck(){
        // https://api.wordpress.org/plugins/info/1.1/?action=query_plugins&request[author]=USERNAME
        $dev =  $this->get('https://api.wordpress.org/plugins/info/1.1/?action=query_plugins&request[author]=' . $this->user);
        if($dev['info']['results'] > 0){
            $this->user_details[] = 'plugin-developer';
        }
    }

    /**
     * Check against wordpress.org API to see if the username is a core 
     * contributor.
     */
    protected function coreContributorCheck(){        
        // get latest and then look to see what sort of contibutor they are. 
        $contrib =  $this->get('https://api.wordpress.org/core/credits/1.1/');
        $people = array_filp(
                    array_merge(
                        array_keys($contrib['groups']['project-leaders']['data']),
                        array_keys($contrib['groups']['core-developers']['data']),
                        array_keys($contrib['groups']['contributing-developers']['data']),
                        array_keys($contrib['groups']['recent-rockstars']['data']),
                        array_keys($contrib['groups']['props']['data'])    
                            )
                );
        if(isset($people[$this->user])){
            $this->user_details[] = 'core-contributor';
        }
    }

    /**
     * Simple method to get a URL and return the JSON as an array. As everything
     * is coming from the same API its always JSON, so no check is made to see
     * if that is the correct content type.
     * 
     * @param string $url
     * @return array 
     */
    protected function get($url){
        $reply = wp_remote_get( $url); 
        return json_decode($reply, true);
    }
}
