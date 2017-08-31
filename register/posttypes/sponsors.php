<?php

$labels = array(
    'name'               => _x( 'Venues', 'post type general name', 'startcamp' ),
    'singular_name'      => _x( 'Venue', 'post type singular name', 'startcamp' ),
    'menu_name'          => _x( 'Venues', 'admin menu', 'startcamp' ),
    'name_admin_bar'     => _x( 'Venue', 'add new on admin bar', 'startcamp' ),
    'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
    'add_new_item'       => __( 'Add New Venue', 'startcamp' ),
    'new_item'           => __( 'New Venue', 'startcamp' ),
    'edit_item'          => __( 'Edit Venue', 'startcamp' ),
    'view_item'          => __( 'View Venue', 'startcamp' ),
    'all_items'          => __( 'All Venues', 'startcamp' ),
    'search_items'       => __( 'Search Venues', 'startcamp' ),
    'parent_item_colon'  => __( 'Parent Venues:', 'startcamp' ),
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
    'rewrite'            => array( 'slug' => __('venues','startcamp') ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
);

register_post_type( 'venues', $args );