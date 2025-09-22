<?php

function cb_register_post_types() {

    $labels = [
        "name" => __( "Testimonials", "cb-expat2022" ),
        "singular_name" => __( "Testimonial", "cb-expat2022" ),
    ];
    
    $args = [
        "label" => __( "Testimonials", "cb-expat2022" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => false ,
        "query_var" => true,
        "supports" => [ "title" ],
        "show_in_graphql" => false,
    ];
    
    register_post_type( "testimonials", $args );

    $labels = [
        "name" => __( "Country Guides", "cb-expat2022" ),
        "singular_name" => __( "Country Guide", "cb-expat2022" ),
    ];
    
    $args = [
        "label" => __( "Country Guides", "cb-expat2022" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "menu_icon" => "dashicons-admin-site-alt",
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ['slug' => 'country-facts', 'with_front' => false],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "country", $args );

    $labels = [
        "name" => __( "Country Ranks", "expat" ),
        "singular_name" => __( "Country Rank", "expat" ),
    ];

    $args = [
        "label" => __( "Country Ranks", "expat" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => true,
        "rewrite" => [ "slug" => "ranks", "with_front" => false ],
        "query_var" => true,
        "menu_icon" => "dashicons-admin-site-alt",
        "supports" => [ "title", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "ranks", $args );


$labels = [
    'name'          => __( 'Country Guides NEW', 'expat' ),
    'singular_name' => __( 'Country Guide NEW', 'expat' ),
];

$args = [
    'label'               => __( 'Country Guides NEW', 'cb-expat2022' ),
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,      // keep singles accessible
    'show_ui'             => true,
    'show_in_rest'        => true,
    'has_archive'         => false,     // ← disables /expat-country-guides/ archive
    'rewrite'             => ['slug' => 'expat-country-guides', 'with_front' => false], // singles only
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-admin-site-alt',
    'show_in_nav_menus'   => true,
    'exclude_from_search' => false,     // set true if you don’t want them in site search
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    'hierarchical'        => false,
    'query_var'           => true,
    'supports'            => ['title','editor','thumbnail'],
];
register_post_type('expat-country-guides', $args);


//     $labels = [
//         "name" => __( "Brokers", "expat" ),
//         "singular_name" => __( "Broker", "expat" ),
//     ];

//     $args = [
//         "label" => __( "Brokers", "expat" ),
//         "labels" => $labels,
//         "description" => "",
//         "public" => true,
//         "publicly_queryable" => true,
//         "show_ui" => true,
//         "show_in_rest" => true,
//         "rest_base" => "",
//         "rest_controller_class" => "WP_REST_Posts_Controller",
//         "rest_namespace" => "wp/v2",
//         "has_archive" => false,
//         "show_in_menu" => true,
//         "show_in_nav_menus" => true,
//         "delete_with_user" => false,
//         "exclude_from_search" => false,
//         "capability_type" => "post",
//         "map_meta_cap" => true,
//         "hierarchical" => false,
//         "can_export" => true,
//         "rewrite" => [ "slug" => "brokers", "with_front" => true ],
//         "query_var" => true,
//         "menu_icon" => "dashicons-id",
//         "supports" => [ "title" ],
//         "show_in_graphql" => false,
//     ];

//     register_post_type( "broker", $args );
    
}
add_action( 'init', 'cb_register_post_types' );
