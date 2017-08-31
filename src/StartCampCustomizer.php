<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartCampCustomizer
 *
 * @author andrew
 */
class StartCampCustomizer {
   public function init(){
        add_action( 'customize_register', array($this, 'customize_register'));
   }
   
    function customize_register( $wp_customize ) {
        
        // Add a section
        $wp_customize->add_section( 'startcamp_options', 
            array(
                'title'       => __( 'StartCamp Settings', 'startcamp' ), //Visible title of section
                'priority'    => 35, 
                'capability'  => 'edit_theme_options', 
                'description' => __('You can customize settings for StartCamp.', 'startcamp'), //Descriptive tooltip
            ) 
        );
        
        $wp_customize->add_setting( 'show_share',
            array(
                'default'    => 'no',
                'type'       => 'option',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
         'startcamp_show_share', 
         array(
            'label'      => __( 'Show Share buttons', 'startcamp' ), 
            'settings'   => 'show_share', 
            'priority'   => 10,
            'type'       => 'radio',
            'choices'   => array('no' =>__('No', 'startcamp'), 'yes' =>__('Yes', 'startcamp') ),
            'section'    => 'startcamp_options', 
         ) 
      ) );
         
          $wp_customize->add_setting( 'start_date',
            array(
                'default'    => date("d-m-Y"),
                'type'       => 'option',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
          
        $wp_customize->add_control( new StartCampCustomizerDatePicker( $wp_customize, 
         'startcamp_start_date', 
         array(
            'label'      => __( 'Start Date of WordCamp', 'startcamp' ), 
            'settings'   => 'start_date',                         
            'section'    => 'startcamp_options', 
         ) 
      ) );
         
           $wp_customize->add_setting( 'end_date',
            array(
                'default'    => date("d-m-Y"),
                'type'       => 'option',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
          
        $wp_customize->add_control( new StartCampCustomizerDatePicker( $wp_customize, 
         'startcamp_end_date', 
         array(
            'label'      => __( 'End Date of WordCamp', 'startcamp' ), 
            'settings'   => 'end_date',                         
            'section'    => 'startcamp_options', 
         ) 
      ) );
         
    }
}
