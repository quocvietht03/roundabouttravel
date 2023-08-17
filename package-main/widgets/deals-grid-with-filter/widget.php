<?php
namespace PJElementorWidgets\Widgets\DealsGridWithFilter;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class PJ_DealsGridWithFilter extends Widget_Base {

	public function get_name() {
		return 'pj-deals-grid-with-filter';
	}

	public function get_title() {
		return __( 'Deals Grid With Filter', 'text-domain' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'text-domain' ),
			]
		);

		$this->add_control(
			'posts_number',
			[
				'label' => __( 'Posts Number', 'text-domain' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$terms = get_terms( array(
			'taxonomy'   => 'deal_class',
			'hide_empty' => false,
		) );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		?>
			<div class="deals-grid-with-filter">
				<div class="deals-grid-filter">
					<?php foreach ( $terms as $key => $term ) { ?>
						<a class="filter-item<?php if($key == 0) echo ' active'; ?>" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
					<?php } ?>
				</div>
				<div class="deals-grid-content">
					<?php
						foreach ( $terms as $key => $term ) {
							$wp_query = new \WP_Query( array(
								'post_type'      => 'deal',
								'posts_per_page' => $settings['posts_number'],
								'meta_key'       => 'deal_price',
								'orderby'        => 'meta_value_num',
								'order'          => 'ASC',
								'meta_query'     => array(
									array(
										'key'     => 'deal_featured',
										'value'   => '1',
										'compare' => '='
									),
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
								),
								'tax_query'      => array(
									array(
										'taxonomy' => 'deal_class',
										'field'    => 'slug',
										'terms'    => $term->slug
									)
								)
							) );

							if ( $wp_query->have_posts() ) {
							?>
							<div class="deals-grid-items<?php if($key == 0) echo ' active'; ?>" data-term="<?php echo $term->slug; ?>">
								<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
									<div class="deals-grid-item">
										<div class="deal-thumbnail">
											<a href="<?php the_permalink(); ?>">
												<div class="image-cover">
													<?php the_post_thumbnail( 'medium_large' ); ?>
												</div>
											</a>
										</div>
										<div class="deal-content">
											<h3 class="deal-title">
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
											<?php if ( !empty( get_field( 'deal_price' ) ) ) : ?>
												<div class="deal-price"><span>From</span> $<?php echo get_field( 'deal_price' ); ?></div>
											<?php endif; ?>

											<div class="deal-desc">
												<?php echo wp_trim_words( get_the_excerpt(), 15, '' ); ?>
											</div>
										</div>
										<?php if ( !empty( get_field( 'deal_book_by' ) ) ) : ?>
											<div class="deal-book-by"><span>Book by:</span> <?php echo get_field( 'deal_book_by' ); ?></div>
										<?php endif; ?>
									</div>
								<?php } ?>
							</div>
							<?php
							}
						}
					?>
				</div>
	    </div>
		<?php
		}
	}

	protected function content_template() {

	}
}
