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
        
        $wp_customize->add_setting( 'large_logo',
            array(
                'default'    => '',                
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'startcamp_large_logo',
                array(
                    'label'      => __( 'Upload a logo for homepage hero overlay', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'large_logo',
                    'context'    => 'startcamp_large_logo' 
                )
            )
        );
        
        $wp_customize->add_setting( 'acronym',
            array(
                'default'    => '',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'startcamp_acronym',
                array(
                    'label'      => __( 'The shortname for this Word Camp, i.e WCUS', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'acronym',
                    'type'    => 'text'
                )
            )
        );
        
        $wp_customize->add_setting( 'city',
            array(
                'default'    => '',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'startcamp_city',
                array(
                    'label'      => __( 'Town or City Name', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'city',
                    'type'    => 'text'
                )
            )
        );
        
        $wp_customize->add_setting( 'event_location',
            array(
                'default'    => '',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'startcamp_event_location',
                array(
                    'label'      => __( 'Name of Venue', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'event_location',
                    'type'    => 'text'
                )
            )
        );
        
        $wp_customize->add_setting( 'event_address',
            array(
                'default'    => '',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'startcamp_event_address',
                array(
                    'label'      => __( 'Address of Venue', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'event_address',
                    'type'    => 'text'
                )
            )
        );
        
        $wp_customize->add_setting( 'postcode',
            array(
                'default'    => '',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'startcamp_postcode',
                array(
                    'label'      => __( 'Postcode or Zipcode', 'startcamp' ),
                    'section'    => 'startcamp_options',
                    'settings'   => 'postcode',
                    'type'    => 'text'
                )
            )
        );
         
        $wp_customize->add_setting( 'start_date',
            array(
                'default'    => date("Y-m-d"),
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
                'default'    => date("Y-m-d"),
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
          
        $wp_customize->add_control( new StartCampCustomizerDatePicker( $wp_customize, 
         'startcamp_end_date', 
         array(
            'label'      => __( 'End Date of WordCamp', 'startcamp' ),
            'settings'   => 'end_date',
            //'sanitize_callback' => 'absint',
            'section'    => 'startcamp_options',
         ) 
        ) );
        
        $wp_customize->add_setting( 'buy_page',
            array(
                'default'    => '',                
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
         'startcamp_buy_page', 
         array(
            'label'             => __( 'Select Buy Page', 'startcamp' ), 
            'settings'          => 'buy_page',            
            'type'              => 'dropdown-pages',
            'section'           => 'startcamp_options',
         ) 
        ) );
        
         
          $wp_customize->add_setting( 'buy_currency',
            array(
                'default'    => 'USD',
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
         'startcamp_buy_currency', 
         array(
            'label'             => __( 'Select Currency', 'startcamp' ), 
            'settings'          => 'buy_currency',                        
            'type'              => 'select',
             'choices'          => startcamp_currency_list(),
            'section'           => 'startcamp_options',
         ) 
        ) );
         
         $wp_customize->add_setting( 'buy_price',
            array(
                'default'    => '',
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
         'startcamp_buy_price', 
         array(
            'label'             => __( 'Ticket Price', 'startcamp' ), 
            'settings'          => 'buy_price',            
            'sanitize_callback' => 'absint',
            'type'              => 'text',
            'section'           => 'startcamp_options',
         ) 
        ) );
         
        $wp_customize->add_setting( 'show_share',
            array(
                'default'       => 'no',                
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
         'startcamp_show_share', 
         array(
            'label'         => __( 'Show Share buttons', 'startcamp' ), 
            'settings'      => 'show_share',
            'priority'      => 100,
            'type'          => 'radio',
            'choices'       => array('no' =>__('No', 'startcamp'), 'yes' =>__('Yes', 'startcamp') ),
            'section'       => 'startcamp_options', 
         ) 
        ) );
         
         $wp_customize->add_setting( 'share_buttons',
            array(
                'default'    => 'facebook,twitter',                
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            ) 
        );
        
         $networks = array('facebook', 'googleplus', 'twitter', 'whatsapp',
                           'viber', "linkedin", "qqzone", "tencent",
                           "163", "baidu", "weibo", "douban", "kaixin", "renren",);
         
         $wp_customize->add_control( new StartCampCustomizerCheckboxes( $wp_customize,
         'startcamp_share_buttons', 
         array(
            'label'         => __( 'Visible Share buttons ', 'startcamp' ),
            'settings'      => 'share_buttons',            
            'priority'      => 100,
            'type'          => 'hidden',
            'choices'       => array_combine($networks,$networks),
            'section'       => 'startcamp_options', 
         ) 
        ) );
    }
}
