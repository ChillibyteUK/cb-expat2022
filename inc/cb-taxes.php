<?php

function cb_register_taxes() {

    $args2 = [
        "label" => __( "Continent", "cb-expat2022" ),
        "labels" => [
            "name" => __( "Continents", "cb-expat2022" ),
            "singular_name" => __( "Continent", "cb-expat2022" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "applications",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "continent", [ "country", "expat-country-guides" ], $args2 );

    $args = [
        "label" => __( "Subject", "cb-expat2022" ),
        "labels" => [
            "name" => __( "Subjects", "cb-expat2022" ),
            "singular_name" => __( "Subject", "cb-expat2022" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "applications",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "subject", [ "testimonials" ], $args );

}
add_action( 'init', 'cb_register_taxes' );