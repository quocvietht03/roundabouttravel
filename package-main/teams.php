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
		"menu_icon" => "dashicons-tag",
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





?>
