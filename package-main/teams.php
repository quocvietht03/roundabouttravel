<?php

//-------------------------------------------------------------
// Team Post Type
//-------------------------------------------------------------

add_action( 'init', 'rpjc_register_team_post_type' );

function rpjc_register_team_post_type() {
	$labels = [
		"name" => esc_html__( "Teams", "roundabout-travel" ),
		"singular_name" => esc_html__( "Team", "roundabout-travel" ),
	];

	$args = [
		"label" => esc_html__( "Team", "roundabout-travel" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"menu_position" => 100,
		"menu_icon" => "dashicons-groups",
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "teams", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( 'team', $args );

}

//-------------------------------------------------------------
// Taxonomies
//-------------------------------------------------------------

add_action( 'init', 'rpjc_team_category_taxonomy' );

function rpjc_team_category_taxonomy() {

	$labels = array(

		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),

	);

	register_taxonomy( 'team_category', array( 'team' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'team-categories' ),
		'show_in_nav_menus' => false

	) );

}



?>
