<?php
namespace PJElementorWidgets\Widgets\DealsItem;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class PJ_DealsItem extends Widget_Base {

	public function get_name() {
		return 'pj-deals-item';
	}

	public function get_title() {
		return __( 'Deals Item', 'text-domain' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'roundabouttravel' ];
	}

	protected function get_supported_ids() {
		$supported_ids = [];

		$wp_query = new \WP_Query( array(
														'post_type' => 'deal',
														'post_status' => 'publish',
														'posts_per_page' => -1,
													) );

		if ( $wp_query->have_posts() ) {
	    while ( $wp_query->have_posts() ) {
        $wp_query->the_post();
        $supported_ids[get_the_ID()] = get_the_title();
	    }
		}

		return $supported_ids;
	}


	protected function register_layout_section_controls() {
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'text-domain' ),
			]
		);

    $this->add_control(
			'ids',
			[
				'label' => __( 'Id', 'text-domain' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_ids(),
				'label_block' => true,
				'multiple' => false,
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
			'bg_color',
			[
				'label' => __( 'Background Color', 'text-domain' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be-deal-item' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();
	}

	protected function register_controls() {
		$this->register_layout_section_controls();
		$this->register_design_latyout_section_controls();
	}
	public function query_posts() {
		$settings = $this->get_settings_for_display();

		$args = [
			'post_type' => 'deal',
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'post__in'   => array( $settings['ids'] ),
		];
		

		return $query = new \WP_Query( $args );
	}
  protected function render_post() {
		$settings = $this->get_settings_for_display();

		?>
      <article class="be-deal-item">

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
					</div>
					<div class="deal-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<div class="image-cover">
								<?php the_post_thumbnail( 'medium_large' ); ?>
							</div>
						</a>
					</div>
      </article>
		<?php
	}

	protected function render() {

	$query = $this->query_posts();
	//var_dump($query);
	if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();

				$this->render_post();

			}

	} else {
			// no posts found
	}

	wp_reset_postdata();
}

	protected function content_template() {

	}
}
