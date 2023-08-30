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
        <div class="be-recent-deal">
          <h3>Deals</h3>
          <ul>
          <?php 

          $args = array(         
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'post_type' => 'deal'	
            );
          
            $loop = new WP_Query( $args ); 
            while ( $loop->have_posts() ) : $loop->the_post(); 
            $deal_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            $price        = get_post_meta( get_the_ID(), 'deal_price', true );
            $price_tax    = get_field( 'deal_price_tax' );
            ?>
            <li class="deal-item">
              <div class="thumb">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $deal_featured_img_url; ?>" /></a>
              </div>
              <div class="content-d">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                <?php if ( !empty($price) ) : ?>
										<div class="deal-feature-item deal-price">
											From <span>$<?php echo $price; ?><?php if ( $price_tax ) : ?> inc taxes<?php endif; ?></span>
										</div>
									<?php endif; ?>
              </div>
            </li>
            <?php
          
            endwhile;
          ?>
          </ul>
        </div>
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
