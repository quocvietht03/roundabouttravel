<?php
namespace PJElementorWidgets\Widgets\TeamsGridWithFilter;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class PJ_TeamsGridWithFilter extends Widget_Base {

	public function get_name() {
		return 'pj-teams-grid-with-filter';
	}

	public function get_title() {
		return __( 'Teams Grid With Filter', 'text-domain' );
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
			'taxonomy'   => 'team_category',
			'hide_empty' => false,
		) );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		?>
			<div class="teams-grid-with-filter">
				<div class="teams-grid-filter">
        <a class="filter-item active be-show-all" href="#all">all</a>
					<?php foreach ( $terms as $key => $term ) { ?>
						<a class="filter-item" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
					<?php } ?>
				</div>
				<div class="teams-grid-content">
					<?php
							$wp_query = new \WP_Query( array(
								'post_type'      => 'team',
								'posts_per_page' => $settings['posts_number'],

								'meta_query' => [
									'be_team_order' => [
										'key' => 'be-team-order',
										'compare' => 'EXISTS',
										'type' => 'NUMERIC', // makes orderby sort numerically instead of alphabetically
									],
								],
							
								'orderby' => [
									'be_team_order' => 'ASC', 
								],
							) );
							if ( $wp_query->have_posts() ) {
							?>
							<div class="teams-grid-items active" data-term="all">
								<div class="elementor-grid">
									<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
										<div class="teams-grid-item u--fadeInUp">
											<div class="team-thumbnail">
												<div class="image-cover">
													<?php the_post_thumbnail( 'medium_large' ); ?>
												</div>
											</div>
											<div class="team-content">
												<h3 class="team-title">
														<?php the_title(); ?>
												</h3>
                        <div class="team-info">
                          <div class="team-position"><?php the_field('be-team-position'); ?></div>
                          
                        </div>
												<div class="team-desc">
													<?php echo get_the_content(); ?>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<?php
							}
						foreach ( $terms as $key => $term ) {
							$wp_query = new \WP_Query( array(
								'post_type'      => 'team',
								'posts_per_page' => $settings['posts_number'],
								
								'tax_query'      => array(
									array(
										'taxonomy' => 'team_category',
										'field'    => 'slug',
										'terms'    => $term->slug
									)
								),
								'meta_query' => [
										'be_team_order' => [
											'key' => 'be-team-order',
											'compare' => 'EXISTS',
											'type' => 'NUMERIC', // makes orderby sort numerically instead of alphabetically
										],
									],
								
									'orderby' => [
										'be_team_order' => 'ASC', 
									],
							) );
							if ( $wp_query->have_posts() ) {
							?>
							<div class="teams-grid-items" data-term="<?php echo $term->slug; ?>">
								<div class="elementor-grid">
									<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
										<div class="teams-grid-item u--fadeInUp">
											<div class="team-thumbnail">
												<a href="<?php the_permalink(); ?>">
													<div class="image-cover">
														<?php the_post_thumbnail( 'medium_large' ); ?>
													</div>
												</a>
											</div>
											<div class="team-content">
												<h3 class="team-title">
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
												</h3>
                        <div class="team-info">
                          <div class="team-position"><?php the_field('be-team-position'); ?></div>
                          <div class="team-email"><a href=""><?php the_field('be-team-email'); ?></a></div>
                        </div>
												<div class="team-desc">
													<?php echo wp_trim_words( get_the_excerpt(), 35, '' ); ?>
												</div>
											</div>
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
