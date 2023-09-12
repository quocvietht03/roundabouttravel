<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.8.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

if ( ! function_exists( 'hello_elementor_add_description_meta_tag' ) ) {
	/**
	 * Add description meta tag with excerpt text.
	 *
	 * @return void
	 */
	function hello_elementor_add_description_meta_tag() {
		$post = get_queried_object();

		if ( is_singular() && ! empty( $post->post_excerpt ) ) {
			echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $post->post_excerpt ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'hello_elementor_add_description_meta_tag' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}

// Load Package Main.
require_once get_stylesheet_directory() . '/package-main/init-load.php';

if (function_exists("register_sidebar")) {
  register_sidebar();
}

function be_sidebar_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Blog', 'hello_elementor' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'hello_elementor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar News', 'hello_elementor' ),
			'id'            => 'sidebar-news',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'hello_elementor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Reviews', 'hello_elementor' ),
			'id'            => 'sidebar-reviews',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'hello_elementor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'be_sidebar_one_widgets_init' );

function create_shortcode_featured_news() {

	$subjects = get_field('be_featured_post'); //checkbox field, return format value only

	$meta_query = array('relation' => 'OR');
	foreach( $subjects as $subject ) :
			$meta_query[] = array(
					'key' => 'be_featured_post',
					'value' => $subject,
					'compare' => 'LIKE',
			);
	endforeach;
	
	$resource_args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'category_name' => 'news',
			'meta_query' => $meta_query,
	);
	
	$the_query = new WP_Query($resource_args);

	ob_start();
	if ( $the_query->have_posts() ) :
		echo "<ul class='be-shortcode-featured-post'>";
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			?>
				<li class="be-post-item">
					<div class="be-post-item-thumb">
						<?php if ( has_post_thumbnail() ) : ?>
  						<?php the_post_thumbnail( 'medium' ); ?>
  					<?php endif; ?>
					</div>
					<div class="be-post-item-meta">
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<span class="be-post-item-meta-date"><?php echo get_the_date(); ?></span>
					</div>
				</li>

		<?php endwhile;
		echo "</ul>";
		wp_reset_postdata();
	endif;
	$list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return


	ob_end_clean();


	return $list_post;
}
add_shortcode('featured_news', 'create_shortcode_featured_reviews');

function create_shortcode_featured_reviews() {

	$subjects = get_field('be_featured_post'); //checkbox field, return format value only

	$meta_query = array('relation' => 'OR');
	foreach( $subjects as $subject ) :
			$meta_query[] = array(
					'key' => 'be_featured_post',
					'value' => $subject,
					'compare' => 'LIKE',
			);
	endforeach;
	
	$resource_args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'category_name' => 'reviews',
			'meta_query' => $meta_query,
	);
	
	$the_query = new WP_Query($resource_args);

	ob_start();
	if ( $the_query->have_posts() ) :
		echo "<ul class='be-shortcode-featured-post'>";
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			?>
				<li class="be-post-item">
					<div class="be-post-item-thumb">
						<?php if ( has_post_thumbnail() ) : ?>
  						<?php the_post_thumbnail( 'medium' ); ?>
  					<?php endif; ?>
					</div>
					<div class="be-post-item-meta">
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<span class="be-post-item-meta-date"><?php echo get_the_date(); ?></span>
					</div>
				</li>

		<?php endwhile;
		echo "</ul>";
		wp_reset_postdata();
	endif;
	$list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return


	ob_end_clean();


	return $list_post;
}
add_shortcode('featured_reviews', 'create_shortcode_featured_reviews');