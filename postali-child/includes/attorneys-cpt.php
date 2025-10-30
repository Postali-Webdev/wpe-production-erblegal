<?php
/**
 * Custom Attorneys Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_attorneys() {

// set up labels
    $labels = array(
        'name' => 'Attorneys',
        'singular_name' => 'Attorney',
        'add_new' => 'Add New Attorney',
        'add_new_item' => 'Add New Attorney',
        'edit_item' => 'Edit Attorney',
        'new_item' => 'New Attorney',
        'all_items' => 'All Attorneys',
        'view_item' => 'View Attorneys',
        'search_items' => 'Search Attorneys',
        'not_found' =>  'No Attorneys Found',
        'not_found_in_trash' => 'No Attorneys found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Attorneys',

    );
    //register post type
    register_post_type( 'Attorneys', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'has_archive' => false,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => ''),
        'rewrite' => array( 'slug' => '', 'with_front' => false ),
        )
    );

}
add_action( 'init', 'create_custom_post_type_attorneys' );