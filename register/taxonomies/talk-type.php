<?php

$labels = array(
    'name'              => _x( 'Talk Types', 'taxonomy general name', "startcamp" ),
    'singular_name'     => _x( 'Talk Type', 'taxonomy singular name', "startcamp" ),
    'search_items'      => __( 'Search Talk Types', "startcamp" ),
    'all_items'         => __( 'All Talk Types', "startcamp" ),
    'parent_item'       => __( 'Parent Talk Type', "startcamp" ),
    'parent_item_colon' => __( 'Parent Talk Type:', "startcamp" ),
    'edit_item'         => __( 'Edit Talk Type', "startcamp" ),
    'update_item'       => __( 'Update Talk Type', "startcamp" ),
    'add_new_item'      => __( 'Add New Talk Type', "startcamp" ),
    'new_item_name'     => __( 'New Talk Type Name', "startcamp" ),
    'menu_name'         => __( 'Talk Type', "startcamp" ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => __('talk-type','startcamp') ),
);

register_taxonomy( 'talk-type', array( 'talk' ), $args );
