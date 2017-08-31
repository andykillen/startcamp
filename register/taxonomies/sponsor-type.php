<?php

$labels = array(
    'name'              => _x( 'Sponsor Types', 'taxonomy general name', "startcamp" ),
    'singular_name'     => _x( 'Sponsor Type', 'taxonomy singular name', "startcamp" ),
    'search_items'      => __( 'Search Sponsor Types', "startcamp" ),
    'all_items'         => __( 'All Sponsor Types', "startcamp" ),
    'parent_item'       => __( 'Parent Sponsor Type', "startcamp" ),
    'parent_item_colon' => __( 'Parent Sponsor Type:', "startcamp" ),
    'edit_item'         => __( 'Edit Sponsor Type', "startcamp" ),
    'update_item'       => __( 'Update Sponsor Type', "startcamp" ),
    'add_new_item'      => __( 'Add New Sponsor Type', "startcamp" ),
    'new_item_name'     => __( 'New Sponsor Type Name', "startcamp" ),
    'menu_name'         => __( 'Sponsor Type', "startcamp" ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => __('sponsor-type','startcamp') ),
);

register_taxonomy( 'sponsor-type', array( 'sponsors' ), $args );
