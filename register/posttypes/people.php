<?php

 $labels = array(
            'name'               => _x( 'People', 'post type general name', 'startcamp' ),
            'singular_name'      => _x( 'People', 'post type singular name', 'startcamp' ),
            'menu_name'          => _x( 'People', 'admin menu', 'startcamp' ),
            'name_admin_bar'     => _x( 'People', 'add new on admin bar', 'startcamp' ),
            'add_new'            => _x( 'Add New', 'item', 'startcamp' ),
            'add_new_item'       => __( 'Add New Person', 'startcamp' ),
            'new_item'           => __( 'New Person', 'startcamp' ),
            'edit_item'          => __( 'Edit Person', 'startcamp' ),
            'view_item'          => __( 'View Person', 'startcamp' ),
            'all_items'          => __( 'All People', 'startcamp' ),
            'search_items'       => __( 'Search People', 'startcamp' ),
            'parent_item_colon'  => __( 'Parent Person:', 'startcamp' ),
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
            'rewrite'            => array( 'slug' => __('people','startcamp') ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	);

	register_post_type( 'people', $args );
