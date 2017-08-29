<?php

/**
 * Description of StartCampForms
 *
 * @author Andrew Killen
 */

class StartCampForms extends StartCampBase{

  protected $output = '';
  
  protected $template_directory = 'form_templates';

  protected $form_name;

  protected $form_action;

  protected $form_method;
  
  protected $forms;
  
  protected $form;
  
  protected $fields;
  
  function __construct($name = false) {
    if( !$name) {
      return false;
    }
    $this->forms = StartCampRegisterForms::get_instance();
    
    $this->form = $this->forms->get($name);
    $this->fields = $this->form['fields'];
    $this->form_action = $this->form['action'];
    $this->form_method = (isset($this->form['method'])?$this->form['method']:'POST');
    $this->form_name = $this->form['name'];
  }

  function loadTemplatePart($name, $array = array()){      
    $file = dirname(__FILE__) . '/'.$this->template_directory.'/'.$name.'.php';
    if( is_file($file )){
      include $file;
    }
  }

  function renderForm(){
    foreach($this->fields as $details){
        if(method_exists($this, $details['type'])){
            $this->{$details['type']}($details);
        }
    }
    $this->createForm();
  }
  
  function nonce(){
    ob_start();
        $this->loadTemplatePart('nonce');        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function createForm(){
    $this->nonce();
    echo "<form name='{$this->form_name}' id='{$this->form_name}' action='{$this->form_action}' method='{$this->form_method}'>{$this->output}</form>";      
  }
  
  function formDependencies($array){
    
  }

  function hidden($array){
    ob_start();
        $this->loadTemplatePart('hidden',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
    
  }
  
  function text($array){
    ob_start();
        $this->loadTemplatePart('text',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function radios($array){
    if(isset($array['title'])){
        $this->output .= "<h3>{$array['title']}</h3>";
    }
    ob_start();
    foreach($array['radios'] as $details){
        $radio_array = array(
            'value' => $details['value'],
            'title' => $details['title'],
            'name' => $details['name'],
            'id' => (isset($details['id']))? $details['id'] : $details['name'],
            'group' => (isset($array['group']))? $details['group'] : $details['name']
        );
         $this->loadTemplatePart('radio',$radio_array);  
    }
      $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function radio($array){
    ob_start();
        $this->loadTemplatePart('radio',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function checkboxes($array){
    
  }
  
  function checkbox($array){
    ob_start();
        $this->loadTemplatePart('checkbox',$array);        
        $this->output .= ob_get_contents();
    ob_clean(); 
  }
  
  function select($array){
    if(!isset($array['value'])){
        $array['value'] = '';
    }
    ob_start();
        $this->loadTemplatePart('select',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function email($array){
    ob_start();
        $this->loadTemplatePart('email',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  function submit($array){
    ob_start();
        $this->loadTemplatePart('submit',$array);        
        $this->output .= ob_get_contents();
    ob_clean();
  }
  
  
}
