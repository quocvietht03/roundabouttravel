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
$be_team_position    = get_field( 'be-team-position' );
$be_team_email    = get_field( 'be-team-email' );
while ( have_posts() ) :
	the_post();
  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  //var_dump($featured_img_url);
	?>

<main id="content" <?php post_class(); ?>>

    <div class="be-team-title-bar">
      <div class="container">
        <h1>Meet the Team</h1>
        <?php echo do_shortcode('[aioseo_breadcrumbs]'); ?>
      </div>
    </div>

    <div class="container">
      <div class="be-content-inner post-content-format">
        <div class="be-team-info">
        <header class="be-page-header">
          <img src="<?php echo $featured_img_url ?>" />
        </header>
        <div class="be-page-content">
          <div class="be-top-heading">
            <?php the_title( '<h1 class="be-entry-title">', '</h1>' ); ?>
            <div class="be-meta-post">
              <div class="be_team_position"><?php echo $be_team_position ?></div>
              <a class="be_team_email" href="mailto:<?php echo $be_team_email ?>"><?php echo $be_team_email ?></a>
            </div>
            
          </div>
          <?php the_content(); ?>
        </div>
        </div>
        <?php 

          the_post_navigation(
            array(
              'next_text' => '<span class="meta-nav">Next team</span>',
              'prev_text' => '<span class="meta-nav">Previous team</span>',
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
            ?>
            <li class="deal-item">
              <div class="thumb">
                <img src="<?php echo $deal_featured_img_url; ?>" />
              </div>
              <div class="content-d">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
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

	<?php comments_template(); ?>

</main>

	<?php
endwhile;

get_footer();
