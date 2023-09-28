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

	public function get_categories() {
		return [ 'roundabouttravel' ];
	}

	protected function register_layout_section_controls() {
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'text-domain' ),
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'text-domain' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'elementor-grid%s-',
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

	protected function register_design_latyout_section_controls() {
		$this->start_controls_section(
			'section_design_layout',
			[
				'label' => __( 'Layout', 'text-domain' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'column_gap',
			[
				'label' => __( 'Columns Gap', 'text-domain' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--grid-column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'row_gap',
			[
				'label' => __( 'Rows Gap', 'text-domain' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 35,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls() {
		$this->register_layout_section_controls();
		$this->register_design_latyout_section_controls();
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
								<div class="elementor-grid">
									<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
										<div class="deals-grid-item">
											<div class="deal-thumbnail">
												<a href="<?php the_permalink(); ?>">
													<div class="image-cover">
														<?php the_post_thumbnail( 'medium_large' ); ?>
													</div>
												</a>
												<div class="deal-icon-box">
													<?php 
														$icon_box_item     = get_field( 'icon_box_item_i' );
														$text_box_item = get_field( 'text_box_item_i' );
														$icon_background_color = get_field( 'icon_background_color' );
														?>
														<?php if ( !empty( $icon_box_item ) or !empty( $text_box_item )) { ?>
														<div class="deal-icon-box-item" style="background: <?php echo $icon_background_color; ?>"><img src="<?php echo $icon_box_item; ?>" /><span><?php echo $text_box_item; ?></span></div>
														<?php } ?>
												</div>
												<div class="deal-tags">
													<?php
														$p_id =  get_the_ID();
														$p_terms = wp_get_object_terms($p_id, 'deal_tag', array('orderby' => 'term_id', 'order' => 'ASC') );
															if ( !empty( $p_terms ) ) :
																$be_tag = array();
																foreach ( $p_terms as $p_term ) {
																		$be_tag = $p_term->name;
																		$be_tag_slug = $p_term->slug;
																		echo '<a class="'. $be_tag_slug .'">'. $be_tag .'</a>';
																}
															endif;
													?>
												</div>
											</div>
											<div class="deal-content">
												<h3 class="deal-title">
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
												</h3>
												<?php
													$price     = get_field( 'deal_price' );
				  								$price_tax = get_field( 'deal_price_tax' );
													if ( !empty( $price ) ) {
														?>
															<div class="deal-price"><span>From</span> $<?php echo $price; ?> <?php if ( $price_tax == '1' ) : ?>inc taxes<?php endif; ?></div>
														<?php
													}
												?>
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
