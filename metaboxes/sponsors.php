<?php

/**
 * Fields
 * - name = title
 * - logo = featured image
 * - sponsor type = taxonomy
 * - About the company = content
 * - url
 * - 
 */


function sponsors_meta_boxes() {    
  $meta_boxes = array(
      'url' => array(
                'name'  => 'url',
                'title' => __('Website address','startcamp'),
                'type'  => 'text',
                ),
  );

  return $meta_boxes;
}