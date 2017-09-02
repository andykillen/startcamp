<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartCampCustomizerCheckboxes
 *
 * @author Andrew Killen
 */
class StartCampCustomizerCheckboxes extends WP_Customize_Control {
    public $type = 'hidden';
    
    public function enqueue()
    {
        wp_enqueue_script( 'custom-checkboxes', get_template_directory_uri() .'/js/admin/customizer/checkboxes.js',array('jquery'), false, true );
    }
    
 
    public function render_content() {
        // Displays checkbox heading
        ?><span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span><?php
        $values = array_flip( explode(',', $this->value() )  );
        // Displays category checkboxes.
        foreach ( $this->choices as $value => $text) {
            ?><label>
                <input type="checkbox" 
                       name="checkboxes-<?php  echo $this->id ?>" 
                       id="checkbox-<?php  echo $this->id.$value ?>" 
                       data-hidden-id='<?php echo $this->id; ?>'
                       value='<?php echo $value; ?>'
                       <?php echo (isset($values[$value]))?"checked":""; ?>
                       class="startcamp-checkboxes"><?php  echo $text ?>                                              
            </label><br><?php
        }
 
        // Loads the hidden input field that stores the saved category list.
        ?><input type="hidden" 
                <?php $this->link(); ?> 
                id="<?php echo $this->id; ?>"
                name="<?php echo $this->id; ?>"
                class="hidden-checkbox-info"
                value="<?php echo sanitize_text_field( $this->value() ); ?>" /><?php
    }
}