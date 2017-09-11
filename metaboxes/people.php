<?php
/**
 *   Fields
 * - Name = title
 * - About = content
 * - Picture (optional, should default to Gravatar) = Featured Image or email
 * - email
 * - twitter
 * - wordpress name
 * - wordpress TV
 * - website
 * - company
 * - sponsor (if they work for one) 
 */

function people_meta_boxes() {
  $sponsors = get_linkable_data('sponsors'); 
  
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
      'sponsor' => array(
                    'name' => 'sponsor',
                    'title' => __('Company Name','startcamp'),
                    'type' => 'select',
                    'options' => $sponsors
                    ),
  );

  return $meta_boxes;
}