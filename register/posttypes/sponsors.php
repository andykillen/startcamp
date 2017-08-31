<?php

$labels = array(
    'name'               => _x( 'Sponsors', 'post type general name', 'startcamp' ),
    'singular_name'      => _x( 'Sponsor', 'post type singular name', 'startcamp' ),
    'menu_name'          => _x( 'Sponsors', 'admin menu', 'startcamp' ),
    'name_admin_bar'     => _x( 'Sponsor', 'add new on admin bar', 'startcamp' ),
    'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
    'add_new_item'       => __( 'Add New Sponsor', 'startcamp' ),
    'new_item'           => __( 'New Sponsor', 'startcamp' ),
    'edit_item'          => __( 'Edit Sponsor', 'startcamp' ),
    'view_item'          => __( 'View Sponsor', 'startcamp' ),
    'all_items'          => __( 'All Sponsors', 'startcamp' ),
    'search_items'       => __( 'Search Sponsors', 'startcamp' ),
    'parent_item_colon'  => __( 'Parent Sponsors:', 'startcamp' ),
    'not_found'          => __( 'No items found.', 'startcamp' ),
    'not_found_in_trash' => __( 'No items found in Trash.', 'startcamp' ),
);

$args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'startcamp' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => __('sponsors','startcamp') ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
);

register_post_type( 'sponsors', $args );