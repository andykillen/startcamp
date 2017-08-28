<?php

/**
 * Description of StartCampForms
 *
 * @author Andrew Killen
 */

class StartCampForms {

  protected $template_directory = 'forum_templates';

  protected $form_name;

  protected $form_action;

  protected $form_method;
  
  function __construct($name = false, $action = false, $method = 'POST') {
    if( !$name || !$action) {
      return false;
    }
    $this->form_action = $action;
    $this->form_method = $method;
    $this->form_name = $name;
  }

  function loadTemplatePart($name){
    if(file_exists(__FILE__ . '/'.$template_directory.'/'.$name.'.php')){
      include __FILE__ . '/'.$template_directory.'/'.$name.'.php';
    }
  }

  function formDependencies($array){
    
  }

  function hidden(){
    
  }
  
  function text(){
    
  }
  
  function radio(){
    
  }
  
  function select(){
    
  }
  
  function email(){
    
  }
  
  function submit(){
    
  }
  
  
}
