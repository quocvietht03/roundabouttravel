<?php get_header(); ?>

	<?php get_template_part( 'templates/hero', 'deal' ); ?>

<style>
    .dp_notice_box{
        display: flex;
        background: #fff;
        margin: 0 auto 70px auto;
        width: 100%;
        min-height: 70px;
    }
    .dp_notice_box .dp_icon {
        padding: 15px 0 0 0;
        border-radius: 3px 0px 0px 3px;
        text-align: center;
        font-size: 32px;
        background-color: #00adef;
        border-bottom: 3px solid #00418b;
        width: 30%;
        background-image: url(https://www.roundabouttravel.com.au/wp-content/uploads/2021/03/Deals_Intro_Icon_RAT.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: 120px;
    }
    .dp_notice_box .dp_info {
        -webkit-flex: 1;
        flex: 1;
        padding: 50px 50px 20px 50px;
        background: #F4F4F4;
        border-radius: 0px 3px 3px 0px;
        border: 1px solid #ecf0f1;
        border-bottom: 3px solid #c0cdd1;
        width: 70%;
    }
</style>

	<div class="main">

		<div class="container">

			<div class="content-narrow">

				<div id="main" role="main" class="clearfix">

				    <div class="dp_notice_box">
				        <div class="dp_icon">

				        </div>
				        <div class="dp_info">
				            <p>Round the world airfares are now on sale for departures until <?php echo date('F Y', mktime(0, 0, 0, date('m')+11, 1, date('Y'))); ?> with routes covering the most popular destinations in Europe and North America via major gateways in Asia.  </p>
										<p>Book in advance to secure availability and preferred dates. View fares below and contact our airfare specialists for more information.  </p>
				        </div>
				    </div>

					<div class="search_deal">

						<h2>- Search Deals -</h2>

						<form method="get" action="<?php bloginfo( 'url' ); ?>/deals/" class="clearfix clm4">

							<input type="hidden" name="deal_search_submitted" value="1" />

							<div class="box">

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

							<div class="box">

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

							<div class="box">

								<label for="deal_search_sort">Sort by</label>

								<select name="deal_search_sort" id="deal_search_sort">
									<option value="price_asc" <?php selected( $_GET['deal_search_sort'], 'price_asc' ); ?>>Price Ascending</option>
									<option value="price_desc" <?php selected( $_GET['deal_search_sort'], 'price_desc' ); ?>>Price Descending</option>
									<option value="date_added" <?php selected( $_GET['deal_search_sort'], 'date_added' ); ?>>Date Added</option>
								</select>

							</div>

							<div class="box">

								<span class="btn"><input value="SEARCH" type="submit"></span>

							</div>

						</form>

					</div>

					<?php if ( have_posts() ) : ?>

						<div class="deal_list">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php

								$price     = get_post_meta( $post->ID, 'deal_price', true );
								$price_tax = get_post_meta( $post->ID, 'deal_price_tax', true );

								?>

								<div class="deal clearfix">

									<p class="img">

										<?php if ( has_post_thumbnail() ) : ?>

											<?php the_post_thumbnail( 'deal-thumb' ); ?>

										<?php else : ?>

											<img src="<?php echo get_template_directory_uri(); ?>/img/img_deal01.jpg" alt="" />

										<?php endif; ?>

									</p>

									<div class="txt">

										<h2><?php the_title(); ?></h2>

										<?php the_excerpt(); ?>

										<p class="price"><span>From $<?php echo $price; ?></span> <?php if ( $price_tax == '1' ) : ?>inc taxes<?php endif; ?></p>

									</div>

									<div class="viewmore">

										<p class="btn"><a href="<?php the_permalink(); ?>">View more</a></p>

									</div>

								</div>

							<?php endwhile; ?>

						</div>

						<?php //wp_pagenavi(); ?>

					<?php else : ?>

						<p>Your search returned no results.</p>

					<?php endif; ?>

					<br><br><br>

					<!-- TrustBox widget - 0 -->
					<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="558011f70000ff0005803e84" data-style-height="140px" data-style-width="100%" data-theme="light" data-schema-type="Organization" data-stars="1,2,3,4,5">
					  <a href="https://www.trustpilot.com/review/roundabouttravel.com.au" target="_blank">Trustpilot</a>
					</div>
					<!-- End TrustBox widget -->

				</div><!--#main -->

			</div>

		</div>

	</div>

<?php get_footer(); ?>
