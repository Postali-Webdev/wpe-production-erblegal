<?php
/**
 * Custom Videos Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_videos() {

// set up labels
    $labels = array(
        'name' => 'Videos',
        'singular_name' => 'Video',
        'add_new' => 'Add New Video',
        'add_new_item' => 'Add New Video',
        'edit_item' => 'Edit Videos',
        'new_item' => 'New Videos',
        'all_items' => 'All Videos',
        'view_item' => 'View Videos',
        'search_items' => 'Search Videos',
        'not_found' =>  'No Videos Found',
        'not_found_in_trash' => 'No Videos found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Videos',
    );
    //register post type
    register_post_type( 'Videos', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-video',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'videos', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_videos' );