<?php

$labels = array(
    'name'              => _x( 'Audiences', 'taxonomy general name', "startcamp" ),
    'singular_name'     => _x( 'Audience', 'taxonomy singular name', "startcamp" ),
    'search_items'      => __( 'Search Audiences', "startcamp" ),
    'all_items'         => __( 'All Audiences', "startcamp" ),
    'parent_item'       => __( 'Parent Audience', "startcamp" ),
    'parent_item_colon' => __( 'Parent Audience:', "startcamp" ),
    'edit_item'         => __( 'Edit Audience', "startcamp" ),
    'update_item'       => __( 'Update Audience', "startcamp" ),
    'add_new_item'      => __( 'Add New Audience', "startcamp" ),
    'new_item_name'     => __( 'New Audience Name', "startcamp" ),
    'menu_name'         => __( 'Audience', "startcamp" ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => __('audience','startcamp') ),
);

register_taxonomy( 'audience', array( 'talk' ), $args );
