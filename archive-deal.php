<?php get_header(); ?>

	<?php get_template_part( 'package-main/templates/hero', 'deal' ); ?>

		<section class="deals-main-ss">
			<div class="container">
				<div class="deals-main-content">
					<div class="deals-filter-form-wrap">
						<h2 class="deals-filter-title">Search Deals</h2>
						<form class="deals-filter-form" action="/deals/" method="get">
							<input type="hidden" name="deal_search_submitted" value="1" />
							<div class="form-field form-field-class">
								<label for="deal_search_class">Class Types</label>
								<?php
									wp_dropdown_categories( array(
										'show_option_all' => '-- Any --',
										'orderby'         => 'NAME',
										'hide_empty'      => false,
										'id'              => 'deal_search_class',
										'name'            => 'deal_search_class',
										'selected'        => $_GET['deal_search_class'],
										'taxonomy'        => 'deal_class'
									) );
								?>
							</div>
							<div class="form-field form-field-airline">
								<label for="deal_search_airline">Airline</label>
								<?php
									wp_dropdown_categories( array(
										'show_option_all' => '-- Any --',
										'orderby'         => 'NAME',
										'hide_empty'      => false,
										'id'              => 'deal_search_airline',
										'name'            => 'deal_search_airline',
										'selected'        => $_GET['deal_search_airline'],
										'taxonomy'        => 'deal_airline'
									) );
								?>
							</div>
							<div class="form-field form-field-sort">
								<label for="deal_search_sort">Sort by</label>
								<select name="deal_search_sort" id="deal_search_sort">
									<option value="price_asc" <?php selected( $_GET['deal_search_sort'], 'price_asc' ); ?>>Price Ascending</option>
									<option value="price_desc" <?php selected( $_GET['deal_search_sort'], 'price_desc' ); ?>>Price Descending</option>
									<option value="date_added" <?php selected( $_GET['deal_search_sort'], 'date_added' ); ?>>Date Added</option>
								</select>
							</div>
							<div class="form-field form-field-submit">
								<input value="SEARCH" type="submit">
							</div>
						</form>
					</div>

          <div class="deals-results">
            <?php if ( have_posts() ) : ?>
  						<div class="deal-items">
  							<?php while ( have_posts() ) : the_post(); ?>
  								<div class="deal-item">
  									<div class="deal-thumbnail">
  										<?php if ( has_post_thumbnail() ) : ?>
  											<?php the_post_thumbnail( 'medium_large' ); ?>
  										<?php endif; ?>
											<div class="deal-icon-box">
													<?php 
														$icon_box_item     = get_field( 'icon_box_item_i' );
														$text_box_item = get_field( 'text_box_item_i' );
														$icon_background_color = get_field( 'icon_background_color' );
														if ( !empty( $icon_box_item ) ) {
															?>
																<div class="deal-icon-box-item"><img style="background: <?php echo $icon_background_color; ?>" src="<?php echo $icon_box_item; ?>" /></div>
															<?php
														}
														if ( empty( $icon_box_item ) ) {
															?>
																<div class="deal-icon-box-item"><?php if ( !empty( $text_box_item ) ) { ?><div style="background: <?php echo $icon_background_color; ?>" class="text-item"><?php echo $text_box_item; ?></div><?php } ?></div>
															<?php
														}
													?>
											</div>
											<div class="deal-tags">
												<?php 
													$terms = wp_get_object_terms($post->ID, 'deal_tag', array('orderby' => 'term_id', 'order' => 'ASC') );
														if ( !empty( $terms ) ) :
															$be_tag = array();
															foreach ( $terms as $term ) {
																	$be_tag = $term->name;
																	$be_tag_slug = $term->slug;
																	echo '<a class="'. $be_tag_slug .'">'. $be_tag .'</a>';
															}
														endif;
    										?>
											</div>
  									</div>

  									<div class="deal-content">
  										<h2 class="deal-title"><?php the_title(); ?></h2>
                      <div class="deal-desc">
                        <?php echo wp_trim_words( get_the_excerpt(), 40, '' ); ?>
                      </div>
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

  									<div class="deal-view-more">
  										<a class="btn-view-more" href="<?php the_permalink(); ?>">View more</a>
  									</div>

  								</div>
  							<?php endwhile; ?>
  						</div>

              <div class="pagination-nav">
                <?php
                  $prev_text = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 443.52 443.52" style="enable-background:new 0 0 443.52 443.52;" xml:space="preserve">
                            			<path d="M143.492,221.863L336.226,29.129c6.663-6.664,6.663-17.468,0-24.132c-6.665-6.662-17.468-6.662-24.132,0l-204.8,204.8    c-6.662,6.664-6.662,17.468,0,24.132l204.8,204.8c6.78,6.548,17.584,6.36,24.132-0.42c6.387-6.614,6.387-17.099,0-23.712    L143.492,221.863z"/>
                            		</svg>';
                  $next_text = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 443.52 443.52" style="enable-background:new 0 0 443.52 443.52;" xml:space="preserve">
                            			<path d="M336.226,209.591l-204.8-204.8c-6.78-6.548-17.584-6.36-24.132,0.42c-6.388,6.614-6.388,17.099,0,23.712l192.734,192.734    L107.294,414.391c-6.663,6.664-6.663,17.468,0,24.132c6.665,6.663,17.468,6.663,24.132,0l204.8-204.8    C342.889,227.058,342.889,216.255,336.226,209.591z"/>
                            		</svg>';
              		$big  = 999999999;
              		$args = array(
              			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              			'total'     => $wp_query->max_num_pages,
              			'current'   => max( 1, get_query_var( 'paged' ) ),
              			'prev_text' => $prev_text,
              			'next_text' => $next_text,
              			'type'      => 'plain',

              		);

              		echo '<div class="paginate-links">' . paginate_links( $args ) . '</div>';
            		?>
              </div>
  					<?php else : ?>
  						<div class="no-results">Your search returned no results.</div>
  					<?php endif; ?>
          </div>
				</div>
			</div>
		</section>

    <section class="deals-trustpilot-ss">
			<div class="container">
        <!-- TrustBox widget - 0 -->
        <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    		<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="558011f70000ff0005803e84" data-style-height="140px" data-style-width="100%" data-theme="light" data-schema-type="Organization" data-stars="1,2,3,4,5">
    			<a href="https://www.trustpilot.com/review/roundabouttravel.com.au" target="_blank">Trustpilot</a>
    		</div>
    		<!-- End TrustBox widget -->
      </div>
    </section>
	</div>

<?php get_footer(); ?>
