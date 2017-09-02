<?php
/**
 * Description of StartCampCustomizerDatePicker
 *
 * @author Andrew Killen
 */
class StartCampCustomizerDatePicker extends WP_Customize_Control
{
    public $type = 'date';
 
    /**
    * Enqueue the styles and scripts
    */
    public function enqueue()
    {
        wp_enqueue_style( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'custom-date-picker', get_template_directory_uri() .'/js/admin/customizer/datepicker.js',array('jquery','jquery-ui-datepicker'), false, true );
    }
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
        ?>
        <label>           
          <span class="customize-date-picker-control customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <input <?php $this->link(); ?>  type="date" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="startcamp_datepicker" />
        </label>
        
        <?php
    }

}
