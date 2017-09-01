<?php

$labels = array(
    'name'              => _x( 'Person Types', 'taxonomy general name', "startcamp" ),
    'singular_name'     => _x( 'Person Type', 'taxonomy singular name', "startcamp" ),
    'search_items'      => __( 'Search Person Types', "startcamp" ),
    'all_items'         => __( 'All Person Types', "startcamp" ),
    'parent_item'       => __( 'Parent Person Type', "startcamp" ),
    'parent_item_colon' => __( 'Parent Person Type:', "startcamp" ),
    'edit_item'         => __( 'Edit Person Type', "startcamp" ),
    'update_item'       => __( 'Update Person Type', "startcamp" ),
    'add_new_item'      => __( 'Add New Person Type', "startcamp" ),
    'new_item_name'     => __( 'New Person Type Name', "startcamp" ),
    'menu_name'         => __( 'Person Type', "startcamp" ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => __('person-type','startcamp') ),
);

register_taxonomy( 'person-type', array( 'people' ), $args );