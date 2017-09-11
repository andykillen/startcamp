<?php
/* 
 * 
 */

/**
 * TODO: Fields
 * - Name of venue
 * - seating
 * - address (defaults to the same as event)
 * - Wifi available?
 * - seated or standing?
 * 
 */


function venues_meta_boxes() {    
  $meta_boxes = array(
      'email' => array(
                    'name' => 'email',
                    'title' => __('Email address','startcamp'),
                    'type' => 'text',
                    ),
      'twitter' => array(
                    'name' => 'twitter',
                    'title' => __('Twitter name','startcamp'),
                    'type' => 'text',
                    'helper'=>__('including @','startcamp'),
                    ),
      'wordpress_name' => array(
                    'name' => 'wordpress_name',
                    'title' => __('WordPress ID','startcamp'),
                    'type' => 'text',
                    'helper'=>__('name used to login to WordPress.com or .org','startcamp'),
                   
                    ),
      'url' => array(
                    'name' => 'url',
                    'title' => __('Website URL','startcamp'),
                    'type' => 'text',
                    ),
      'company' => array(
                    'name' => 'company',
                    'title' => __('Company Name','startcamp'),
                    'type' => 'text',
                    ),
      'speaker' => array(
                    'name' => 'speaker',
                    'title' => __('Speaker','startcamp'),
                    'type' => 'select',
                    'options' => get_linkable_data('people')
                    ),
  );

  return $meta_boxes;
}