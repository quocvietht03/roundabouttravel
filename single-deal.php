<?php get_header(); ?>

	<?php
	$destinations = wp_get_post_terms( $post->ID, 'deal_destination' );
	$page_title        = !empty( $destinations ) ? $destinations[0]->name : get_the_title();

	$price        = get_post_meta( $post->ID, 'deal_price', true );
	$price_tax    = get_field( 'deal_price_tax' );
	$seasons      = get_post_meta( $post->ID, 'deal_seasons', true );
	$departure    = get_post_meta( $post->ID, 'deal_departure_ports', true );
	$book_by      = get_post_meta( $post->ID, 'deal_book_by', true );
	$deposit      = get_post_meta( $post->ID, 'deal_deposit', true );
	$pay_by       = get_post_meta( $post->ID, 'deal_payment_by', true );
	$change_fee   = get_post_meta( $post->ID, 'deal_change_fee', true );
	$lead_in_price   = get_post_meta( $post->ID, 'lead_in_price', true );
	$baggage   = get_post_meta( $post->ID, 'baggage', true );
	$classes      = wp_get_post_terms( $post->ID, 'deal_class' );
	$destinations = wp_get_post_terms( $post->ID, 'deal_destination' );
	$airlines     = wp_get_post_terms( $post->ID, 'deal_airline' );

	$class_titles       = array();
	$destination_titles = array();
	$airline_titles     = array();

	if ( !empty( $classes ) ) foreach ( $classes as $class ) $class_titles[] = $class->name;
	if ( !empty( $destinations ) ) foreach ( $destinations as $destination ) $destination_titles[] = $destination->name;
	if ( !empty( $airlines ) ) foreach ( $airlines as $airline ) $airline_titles[] = $airline->name;

	$booking_info    = array();
	$booking_info['class'] = $class_titles[0];
	$booking_info['destination'] = $destination_titles[0];
	$booking_info['airline'] = $airline_titles[0];
	$booking_info['url'] = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$booking_info = json_encode($booking_info);
	$booking_info = bin2hex($booking_info);
	?>

	<script>
	function rbt_createCookie( name, value, expires, path, domain, secure ) {
		var today = new Date();
		today.setTime( today.getTime() );
		if ( expires ) {
			expires = expires * 1000 * 60 * 60 * 24;
		}
		var expires_date = new Date( today.getTime() + (expires) );
		document.cookie = name + "=" +escape( value ) + ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + ( ( path ) ? ";path=" + path : "" ) + ( ( domain ) ? ";domain=" + domain : "" ) + ( ( secure ) ? ";secure" : "" );
	}
	function rbt_setBookingInfo() {
		var cName  = "rbtinfo";
		var cValue = "<?php echo $booking_info; ?>";
		rbt_createCookie( cName, cValue, 2, '/', '', '' );
	}
	</script>

	<main class="deal-main">
		<section class="deal-hero-ss">
			<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'full' );
				endif;
			?>
		</section>

		<!-- <section class="deal-header-ss">
			<div class="container">
				<div class="deal-header-content">
					<div class="deal-col-left">
						<h3 class="deal-title"><?php the_title(); ?></h3>
						<?php if ( get_field( 'subtitle' ) ) : ?>
							<div class="deal-subtitle"><?php the_field( 'subtitle' ); ?></div>
						<?php endif; ?>
						<div class="deal-summary">
								<?php the_field( 'summary' ); ?>
						</div>
					</div>
					<div class="deal-col-right">
						<?php if ( !empty( $airline_titles ) ) : ?>
							<div class="deal-feature deal-airl">
								<span>Airline:</span>
								<?php echo implode( ', ', $airline_titles ); ?>
							</div>
						<?php endif; ?>
						<?php if ( !empty( $destination_titles ) ) : ?>
							<div class="deal-feature  deal-dest">
								<span>Destination:</span>
								<?php echo implode( ', ', $destination_titles ); ?>
							</div>
						<?php endif; ?>
						<?php if ( !empty( $class_titles ) ) : ?>
							<div class="deal-feature deal-class">
								<span>Class:</span>
								<?php echo implode( ', ', $class_titles ); ?>
							</div>
						<?php endif; ?>
						<div class="deal-feature deal-price">
							From <span>$<?php echo $price; ?><?php if ( $price_tax ) : ?>inc taxes<?php endif; ?></span>
						</div>
						<div class="deal-enquiry">
							<a class="btn-enquiry" onclick="rbt_setBookingInfo();" href="<?php echo site_url( '/airfare-deals/price-my-airfare/' ); ?>">Enquire Now</a>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<section class="deal-main-ss">
			<div class="container">
				<div class="deal-main-wrap">
					<div class="deal-main-content">
						<h3 class="deal-title"><?php the_title(); ?></h3>
						<?php if ( get_field( 'subtitle' ) ) : ?>
							<div class="deal-subtitle"><?php the_field( 'subtitle' ); ?></div>
						<?php endif; ?>
						<div class="deal-summary">
								<?php the_field( 'summary' ); ?>
						</div>
						<div class="deal-post-content post-content-format">
							<?php the_content(); ?>
						</div>
						<div class="deal-note">
							<h3 class="deal-note-title">Note</h3>
							<div class="deal-note-list">
								<?php if ( !empty( $seasons ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Seasons:</span>
										<span class="value"><?php echo $seasons; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $departure ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Departure ports:</span>
										<span class="value"><?php echo $departure; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $book_by ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Book by:</span>
										<span class="value"><?php echo $book_by; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $deposit ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Deposit to book:</span>
										<span class="value"><?php echo $deposit; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $pay_by ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Full payment by:</span>
										<span class="value"><?php echo $pay_by; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $change_fee ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Change fee:</span>
										<span class="value"><?php echo $change_fee; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $lead_in_price ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Lead in price:</span>
										<span class="value"><?php echo $lead_in_price; ?></span>
									</div>
								<?php endif; ?>
								<?php if ( !empty( $baggage ) ) : ?>
									<div class="deal-note-item">
										<span class="label">Baggage:</span>
										<span class="value"><?php echo $baggage; ?></span>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="deal-share">
							<?php echo do_shortcode( '[addtoany]' ); ?>
						</div>
					</div>
					<div class="deal-main-sidebar">
						<div class="deal-sticky-sidebar">
							<div class="deal-enquiry-form">
								<div class="deal-feature-list">
									<?php if ( !empty( $airline_titles ) ) : ?>
										<div class="deal-feature-item deal-airl">
											<span class="label">Airline:</span>
											<span class="value"><?php echo implode( ', ', $airline_titles ); ?></span>
										</div>
									<?php endif; ?>
									<?php if ( !empty( $destination_titles ) ) : ?>
										<div class="deal-feature-item  deal-dest">
											<span class="label">Destination:</span>
											<span class="value"><?php echo implode( ', ', $destination_titles ); ?></span>
										</div>
									<?php endif; ?>
									<?php if ( !empty( $class_titles ) ) : ?>
										<div class="deal-feature-item deal-class">
											<span class="label">Class:</span>
											<span class="value"><?php echo implode( ', ', $class_titles ); ?></span>
										</div>
									<?php endif; ?>
									<?php if ( !empty($price) ) : ?>
										<div class="deal-feature-item deal-price">
											From <span>$<?php echo $price; ?><?php if ( $price_tax ) : ?>inc taxes<?php endif; ?></span>
										</div>
									<?php endif; ?>
								</div>

								<?php echo do_shortcode('[contact-form-7 id="9672" title="Enquiry Form"]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if ( have_rows( 'image_slider' ) ) : ?>
			<section class="deal-slider-ss">
				<div class="fullwidth">
					<div class="deal-slider-content">
						<?php if ( have_rows( 'image_slider' ) ) : ?>
							<div class="swiper">
							  <div class="swiper-wrapper">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="swiper-slide">
											<div class="cover-image">
												<?php the_post_thumbnail( 'deal' ); ?>
											</div>
										</div>
									<?php endif; ?>

									<?php while ( have_rows( 'image_slider' ) ) : the_row(); ?>
										<div class="swiper-slide">
											<div class="cover-image">
												<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'deal' ); ?>
											</div>
										</div>
									<?php endwhile; ?>
							  </div>
								<div class="swiper-pagination"></div>
							</div>
						<?php elseif ( has_post_thumbnail() ) : ?>
							<div class="cover-image">
								<?php the_post_thumbnail( 'deal' ); ?>
							</div>
						<?php else : ?>
							<div class="cover-image">
								<img src="<?php echo PJ_URI . 'assets/images/deal-placeholder.jpg'; ?>" alt="" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<section class="deal-trustpilot-ss">
			<div class="container">
				<div class="deal-trustpilot">
					<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
					<div class="trustpilot-widget" data-locale="en-GB" data-template-id="5406e65db0d04a09e042d5fc" data-businessunit-id="558011f70000ff0005803e84" data-style-height="28px" data-style-width="100%" data-theme="light"> <a href="https://uk.trustpilot.com/review/roundabouttravel.com.au" target="_blank" rel="noopener">Trustpilot</a> </div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
