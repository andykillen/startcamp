<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartCampJsonLD
 *
 * @author Andrew Killen
 */
class StartCampJsonLD {
    
    protected $type = '';
    protected $output = array();
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function buildJson(){
        switch($this->type){
            case 'event':
                $this->eventJson();
                $this->display();
                break;
            default:
                
                break;
        }
    }
    
    protected function eventJson(){
        // build JSON array
        $this->output ['@context']  = "http://schema.org/";
        $this->output['type']       = "event";
        $this->output['name']       = get_the_title();
        $this->output['about']      = get_the_content();
        $this->output['description']= __('A WordCamp talk about: ', 'startcamp') . get_the_title();
        // audience,  endDate, startDate, image, performer, organizer, maximumAttendeeCapacity
    }
    
    protected function display(){
        echo "<script type='application/ld+json'>".json_encode($this->output)."</script>";
    }
}
