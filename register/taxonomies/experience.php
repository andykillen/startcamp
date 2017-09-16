<?php

$labels = array(
    'name'              => _x( 'Experiences', 'taxonomy general name', "startcamp" ),
    'singular_name'     => _x( 'Experience', 'taxonomy singular name', "startcamp" ),
    'search_items'      => __( 'Search Experiences', "startcamp" ),
    'all_items'         => __( 'All Experiences', "startcamp" ),
    'parent_item'       => __( 'Parent Experience', "startcamp" ),
    'parent_item_colon' => __( 'Parent Experience:', "startcamp" ),
    'edit_item'         => __( 'Edit Experience', "startcamp" ),
    'update_item'       => __( 'Update Experience', "startcamp" ),
    'add_new_item'      => __( 'Add New Experience', "startcamp" ),
    'new_item_name'     => __( 'New Experience Name', "startcamp" ),
    'menu_name'         => __( 'Experience', "startcamp" ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => __('experience','startcamp') ),
);

register_taxonomy( 'experience', array( 'people' ), $args );