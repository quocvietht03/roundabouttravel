<?php
//------------------------------------------------------------------------------
// Add custom Taxonomy to Post (Airline) & (Classes)
//------------------------------------------------------------------------------

add_action( 'init', 'add_post_class_taxonomy' );

function add_post_class_taxonomy() {

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

	register_taxonomy( 'post_class', array( 'post' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => 'reviews' ),
		'show_in_nav_menus' => false

	) );

}

add_action( 'init', 'post_airline_taxonomy' );

function post_airline_taxonomy() {

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

	register_taxonomy( 'post_airline', array( 'post' ), array(

		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'post-airlines' ),
		'show_in_nav_menus' => false

	) );

}

//------------------------------------------------------------------------------
// Add Custom Column to Post Page (Admin Portal)
//------------------------------------------------------------------------------

add_filter( 'manage_posts_columns', 'admin_custom_posts_columns' );

function admin_custom_posts_columns( $columns ) {

  $columns['post-airline'] = __( 'Categories Airlines' );
  $columns['post-class'] = __( 'Categories Classes' );
  return $columns;

}


add_action( 'manage_posts_custom_column',  'get_admin_custom_posts_columns' );

function get_admin_custom_posts_columns( $column ) {

    global $post;

	switch ( $column ) {

		case 'post-class' :

			$terms = get_the_terms( $post->ID, 'post_class' );

			if ( $terms ) foreach ( $terms as $term ) $brands[] = $term->name;

			if ( $brands ) echo implode( ', ', $brands );

			break;

		case 'post-airline' :

			$terms = get_the_terms( $post->ID, 'post_airline' );

			if ( $terms ) foreach ( $terms as $term ) $brands[] = $term->name;

			if ( $brands ) echo implode( ', ', $brands );

			break;

		default :

			break;


	}


}

add_action( 'restrict_manage_posts', 'filter_posts_by_taxonomies' , 10, 2);

function filter_posts_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'post' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'post_airline', 'post_class' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}

//------------------------------------------------------------------------------
// Search / Query Mods for Post -> post_airline & post_class
//------------------------------------------------------------------------------

add_action( 'pre_get_posts', 'custom_post_search' );

function custom_post_search( $query ) {

	if ( $query->is_main_query() && !is_admin() ) {

		if ( isset( $_GET['post_search_submitted'] ) ) {

			$tax_query = array(

				'relation' => 'AND'

			);

			if ( !empty( $_GET['post_search_class'] ) ) {

				array_push( $tax_query, array(

					'taxonomy' => 'post_class',
					'field'    => 'id',
					'terms'    => $_GET['post_search_class'],
					'operator' => 'IN'

				) );

			}

			if ( !empty( $_GET['post_search_airline'] ) ) {

				array_push( $tax_query, array(

					'taxonomy' => 'post_airline',
					'field'    => 'id',
					'terms'    => $_GET['post_search_airline'],
					'operator' => 'IN'

				) );

			}

            //process query
			if ( count( $tax_query ) > 1 ) {
			    $query->set( 'tax_query', $tax_query );
			}


		    if ( isset( $_GET['post_search_keyword'] ) && $_GET['post_search_keyword'] != "" ) {
		        $search = $_GET['post_search_keyword'];
                $query->set( 's', $search );
		    }

		}

	}

}
