<?php
require get_template_directory() . '/includes/abcd.php';


function simple_theme()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'simple_theme');


function create_posttype()
{
    register_post_type(
        'book',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('book'),
                'singular_name' => __('Book')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'book'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
/* Custom Post Type End */


function my_first_taxonomy()
{

    $args = array(

        'labels' => array(
            'name' => 'book category',
            'singular_name' => 'category',
        ),

        'public' => true,
        'hierarchical' => true,

    );


    register_taxonomy('book title', array('book'), $args);
}
add_action('init', 'my_first_taxonomy');

// second taxonomy

function my_second_taxonomy()
{

    $args = array(

        'labels' => array(
            'name' => 'book tags',
            'singular_name' => 'tags',
        ),

        'public' => true,
        'hierarchical' => true,

    );


    register_taxonomy('book topic', array('book'), $args);
}
add_action('init', 'my_second_taxonomy');
