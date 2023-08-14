<?php

//-------------------------------------------------------------
// Deal Post Type
//-------------------------------------------------------------

add_action( 'init', 'rpjc_register_deal_post_type' );

function rpjc_register_deal_post_type() {

	$labels = array(

		'name'               => _x( 'Deals', 'deal' ),
		'singular_name'      => _x( 'Deal', 'deal' ),
		'add_new'            => _x( 'Add New', 'deal' ),
		'add_new_item'       => _x( 'Add New Deal', 'deal' ),
		'edit_item'          => _x( 'Edit Deal', 'deal' ),
		'new_item'           => _x( 'New Deal', 'deal' ),
		'view_item'          => _x( 'View Deal', 'deal' ),
		'search_items'       => _x( 'Search Deals', 'deal' ),
		'not_found'          => _x( 'No deals found', 'deal' ),
		'not_found_in_trash' => _x( 'No deals found in Trash', 'deal' ),
		'parent_item_colon'  => _x( 'Parent deal:', 'deal' ),
		'menu_name'          => _x( 'Deals', 'deal' )

	);

	$args = array(

		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 100,
		'menu_icon'           => 'dashicons-tag',
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'deals' ),
		'capability_type'     => 'post'

	);

	register_post_type( 'deal', $args );

}

//-------------------------------------------------------------
// Taxonomies
//-------------------------------------------------------------

add_action( 'init', 'rpjc_deal_class_taxonomy' );

function rpjc_deal_class_taxonomy() {

	$labels = array(

		'name'              => _x( 'Classes', 'taxonomy general name' ),
		'singular_name'     => _x( 'Class', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Classes' ),
		'all_items'         => __( 'All Classes' ),
		'parent_item'       => __( 'Parent Class' ),
		'parent_item_colon' => __( 'Parent Class:' ),
		'edit_item'         => __( 'Edit Class' ),
		'update_item'       => __( 'Update Class' ),
		'add_new_item'      => __( 'Add New Class' ),
		'new_item_name'     => __( 'New Class Name' ),

	);

	register_taxonomy( 'deal_class', array( 'deal' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'deal-classes' ),
		'show_in_nav_menus' => false

	) );

}

add_action( 'init', 'rpjc_deal_destination_taxonomy' );

function rpjc_deal_destination_taxonomy() {

	$labels = array(

		'name'              => _x( 'Destinations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Destinations' ),
		'all_items'         => __( 'All Destinations' ),
		'parent_item'       => __( 'Parent Destination' ),
		'parent_item_colon' => __( 'Parent Destination:' ),
		'edit_item'         => __( 'Edit Destination' ),
		'update_item'       => __( 'Update Destination' ),
		'add_new_item'      => __( 'Add New Destination' ),
		'new_item_name'     => __( 'New Destination Name' ),

	);

	register_taxonomy( 'deal_destination', array( 'deal' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'deal-destinations' ),
		'show_in_nav_menus' => false

	) );

}

add_action( 'init', 'rpjc_deal_airline_taxonomy' );

function rpjc_deal_airline_taxonomy() {

	$labels = array(

		'name'              => _x( 'Airlines', 'taxonomy general name' ),
		'singular_name'     => _x( 'Airline', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Airlines' ),
		'all_items'         => __( 'All Airlines' ),
		'parent_item'       => __( 'Parent Airline' ),
		'parent_item_colon' => __( 'Parent Airline:' ),
		'edit_item'         => __( 'Edit Airline' ),
		'update_item'       => __( 'Update Airline' ),
		'add_new_item'      => __( 'Add New Airline' ),
		'new_item_name'     => __( 'New Airline Name' ),

	);

	register_taxonomy( 'deal_airline', array( 'deal' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'deal-airlines' ),
		'show_in_nav_menus' => false

	) );

}

//-------------------------------------------------------------
// Admin Columns
//-------------------------------------------------------------

add_filter( 'manage_edit-deal_columns', 'rpjc_deal_edit_columns' );

function rpjc_deal_edit_columns( $columns ) {

    $columns = array(

		'cb'               => '<input type="checkbox" />',
		'title'            => __( 'Title' ),
		'deal-class'       => __( 'Class' ),
		'deal-destination' => __( 'Destination' ),
		'deal-airline'     => __( 'Airline' ),
		'deal-start'       => __( 'Start' ),
		'deal-end'         => __( 'End' ),
		'deal-bookby'      => __( 'Book by' ),
		'deal-featured'    => __( 'Featured' )

    );

    return $columns;

}

add_action( 'manage_posts_custom_column',  'rpjc_deal_custom_columns' );

function rpjc_deal_custom_columns( $column ) {

	global $post;

	$start_date = get_post_meta( $post->ID, 'deal_start', true );
	$end_date   = get_post_meta( $post->ID, 'deal_end', true );
	$book_by    = get_post_meta( $post->ID, 'deal_book_by', true );
	$featured   = get_post_meta( $post->ID, 'deal_featured', true );

	switch ( $column ) {

		case 'deal-class' :

			$terms = get_the_terms( $post->ID, 'deal_class' );

			if ( $terms ) foreach ( $terms as $term ) $brands[] = $term->name;

			if ( $brands ) echo implode( ', ', $brands );

			break;

		case 'deal-destination' :

			$terms = get_the_terms( $post->ID, 'deal_destination' );

			if ( $terms ) foreach ( $terms as $term ) $brands[] = $term->name;

			if ( $brands ) echo implode( ', ', $brands );

			break;

		case 'deal-airline' :

			$terms = get_the_terms( $post->ID, 'deal_airline' );

			if ( $terms ) foreach ( $terms as $term ) $brands[] = $term->name;

			if ( $brands ) echo implode( ', ', $brands );

			break;

		case 'deal-start' :

			if ( !empty( $start_date ) ) echo date( get_option( 'date_format' ), strtotime( $start_date ) );

			break;

		case 'deal-end' :

			if ( !empty( $end_date ) ) echo date( get_option( 'date_format' ), strtotime( $end_date ) );

			break;

		case 'deal-bookby' :

			if ( !empty( $book_by ) ) echo date( get_option( 'date_format' ), strtotime( $book_by ) );

			break;

		case 'deal-featured' :

			echo ( $featured == '1' ) ? 'Y' : 'N';

			break;

	}

}

add_filter( 'manage_edit-deal_sortable_columns', 'sortable_deal_column' );

function sortable_deal_column( $columns ) {

	$columns['deal-bookby'] = 'dealbookby';

	return $columns;

}

add_action( 'pre_get_posts', 'deal_book_by_sort' );

function deal_book_by_sort( $query ) {

	if ( !is_admin() ) return;

	$orderby = $query->get( 'orderby' );

	if ( 'dealbookby' == $orderby ) {

		$query->set( 'meta_key', 'deal_book_by' );
		$query->set( 'orderby', 'meta_value_num' );

	}

}

//------------------------------------------------------------------------------
// Search / Query Mods
//------------------------------------------------------------------------------

add_action( 'pre_get_posts', 'rpjc_deal_search' );

function rpjc_deal_search( $query ) {

	if ( $query->is_main_query() && !is_admin() ) {

		if ( isset( $_GET['deal_search_submitted'] ) || is_post_type_archive( 'deal' ) ) {

			$query->set( 'meta_query', array(

				array(
					'key'     => 'deal_start',
					'value'   => date( 'Ymd', time() ),
					'compare' => '<='
				),
				array(
					'key'     => 'deal_end',
					'value'   => date( 'Ymd', time() ),
					'compare' => '>='
				)

			) );

		}

		if ( isset( $_GET['deal_search_submitted'] ) ) {

			$tax_query = array(

				'relation' => 'AND'

			);

			if ( !empty( $_GET['deal_search_class'] ) ) {

				array_push( $tax_query, array(

					'taxonomy' => 'deal_class',
					'field'    => 'id',
					'terms'    => $_GET['deal_search_class'],
					'operator' => 'IN'

				) );

			}

			if ( !empty( $_GET['deal_search_destination'] ) ) {

				array_push( $tax_query, array(

					'taxonomy' => 'deal_destination',
					'field'    => 'id',
					'terms'    => $_GET['deal_search_destination'],
					'operator' => 'IN'

				) );

			}

			if ( !empty( $_GET['deal_search_airline'] ) ) {

				array_push( $tax_query, array(

					'taxonomy' => 'deal_airline',
					'field'    => 'id',
					'terms'    => $_GET['deal_search_airline'],
					'operator' => 'IN'

				) );

			}

			if ( count( $tax_query ) > 1 ) $query->set( 'tax_query', $tax_query );

			if ( !empty( $_GET['deal_search_sort'] ) ) {

				switch ( $_GET['deal_search_sort'] ) {

					case 'price_asc' :

						$query->set( 'meta_key', 'deal_price' );
						$query->set( 'orderby', 'meta_value_num' );
						$query->set( 'order', 'ASC' );

						break;

					case 'price_desc' :

						$query->set( 'meta_key', 'deal_price' );
						$query->set( 'orderby', 'meta_value_num' );
						$query->set( 'order', 'DESC' );

						break;

					case 'date_added' :

						$query->set( 'orderby', 'date' );

						break;

				}

			}

		} elseif ( is_post_type_archive( 'deal' ) ) {

			$query->set( 'meta_key', 'deal_price' );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'ASC' );

		}

	}

}

?>
