<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

while ( have_posts() ) :
	the_post();
  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  //var_dump($featured_img_url);
	?>

<main id="content" <?php post_class(); ?>>

	<header class="be-page-header" style="background-image: url('<?php echo $featured_img_url ?>');">
    <div class="container">
		  <?php the_title( '<h1 class="be-entry-title">', '</h1>' ); ?>
    </div>
    </header>

	<div class="be-page-content">
    <div class="container">
      <div class="be-content-inner">
        <?php the_content(); ?>
        <div class="post-tags">
          <?php the_tags( '<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
        </div>
        <?php wp_link_pages(); ?>
      </div>
      <div class="be-sidebar">
        <div class="be-sidebar-inner">
          <?php dynamic_sidebar( 'sidebar-blog' ); ?>
        </div>
      </div>
    </div>
	</div>

	<?php comments_template(); ?>

</main>

	<?php
endwhile;

get_footer();
