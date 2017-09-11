<?php
/* 
 * 
 */

/**
 * TODO: Fields
 * - Type of talk = taxonomy
 * - Overview of Talk = content
 * - Short overview = excerpt
 * - Start time
 * - start date
 * - end time
 * - end date (default to same as start date)
 * - audience = taxonomy
 * - speaker (person)
 * - 
 */


function talks_meta_boxes() {
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