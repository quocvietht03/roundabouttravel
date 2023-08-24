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

	<header class="be-page-header">
    <img src="<?php echo $featured_img_url ?>" />
  </header>

	<div class="be-page-content">
    <div class="container">
      <div class="be-content-inner post-content-format">
        <div class="be-top-heading">
          <?php the_title( '<h1 class="be-entry-title">', '</h1>' ); ?>
          <div class="be-meta-post">
            <span class="entry-date"><?php echo get_the_date(); ?></span>
            <?php
            $post_tags = get_the_tags();
            if ( ! empty( $post_tags ) ) {
              foreach( $post_tags as $post_tag ) {
                echo '<a class="be-tag" href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a>';
              }
            }
            ?>
          </div>
          
        </div>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>

        <?php 

        the_post_navigation(
          array(
            'next_text' => '<span class="meta-nav">Next post</span>',
            'prev_text' => '<span class="meta-nav">Previous post</span>',
          )
        );
        ?>
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
