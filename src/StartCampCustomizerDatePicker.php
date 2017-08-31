<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartCampCustomizerDatePicker
 *
 * @author Andrew Killen
 */
class StartCampCustomizerDatePicker extends WP_Customize_Control
{
    /**
    * Enqueue the styles and scripts
    */
    public function enqueue()
    {
        wp_enqueue_style( 'jquery-ui-datepicker' );
    }
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
        ?>
            <label>
              <span class="customize-date-picker-control"><?php echo esc_html( $this->label ); ?></span>
              <input type="date" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="datepicker" />
            </label>
        <?php
    }

}
