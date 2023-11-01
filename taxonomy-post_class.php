<?php get_header(); ?>
<?php $term_id = get_queried_object()->term_id;  ?>
<section class="posts-hero-ss page-title-bar">
	<div class="container">
		<div class="hero-content">
			<h1 class="page-title"><?php echo single_cat_title('' , true ); ?></h1>
			<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb">
				<a href="/" title="Home">Home</a></span><span class="aioseo-breadcrumb-separator"> » </span><span class="aioseo-breadcrumb"><?php echo single_cat_title('' , true ); ?></span>
			</div>		
		</div>
		<div class="be-review-swticher">
			<a href="/reviews/airfare/" class="be-review-airfare">
				<div class="airfare-icon"><img src='<?php echo get_template_directory_uri(); ?>/assets/images/plane-ticket.png' /></div>
				<span>Airfare</span>
			</a>
			<a href="/reviews/lounges/" class="be-review-lounge">
				<div class="lounge-icon"><img src='<?php echo get_template_directory_uri(); ?>/assets/images/airport.png' /></div>
				<span>Lounge</span>
			</a>
		</div>
	</div>
</section>

<div class="be-blog-main-ss">
	<div class="container">
		<section class="sidebar-blog-ss">
			<div class="be-sidebar-inner">
				<div class="posts-filter-form-wrap be-decktop-s">
					<form class="posts-filter-form" action="/reviews/" method="get">
						<h2 class="posts-filter-title-cc">ARTICLE FILTERS</h2>
						<input type="hidden" name="post_search_submitted" value="1" />
						<div class="form-field form-field-search">
							<input name="post_search_keyword" placeholder="Keyword" type="text" value="<?php echo $_GET['post_search_keyword']; ?>" />
						</div>
						<div class="form-field form-field-class">
							<?php
								wp_dropdown_categories( array(
									'show_option_all' => 'Class Types',
									'orderby'         => 'NAME',
									'hide_empty'      => false,
									'id'              => 'post_search_class',
									'name'            => 'post_search_class',
									'selected'        =>  $term_id,
									'taxonomy'        => 'post_class'
								) );
							?>
						</div>
						<div class="form-field form-field-airline">
							<?php
								wp_dropdown_categories( array(
									'show_option_all' => 'Airline',
									'orderby'         => 'NAME',
									'hide_empty'      => false,
									'id'              => 'post_search_airline',
									'name'            => 'post_search_airline',
									'selected'        => $_GET['post_search_airline'],
									'taxonomy'        => 'post_airline'
								) );
							?>
						</div>
						<div class="form-field form-field-submit">
							<input value="SEARCH" type="submit">
						</div>
					</form>
				</div>
				<?php dynamic_sidebar( 'sidebar-reviews' ); ?>
			</div>
		</section>
		<section class="posts-main-ss">
		<div class="posts-filter-form-wrap be-mobile-s">
					<form class="posts-filter-form" action="/reviews/" method="get">
						<h2 class="posts-filter-title-cc">ARTICLE FILTERS</h2>
						<input type="hidden" name="post_search_submitted" value="1" />
						<div class="form-field form-field-search">
							<input name="post_search_keyword" placeholder="Keyword" type="text" value="<?php echo $_GET['post_search_keyword']; ?>" />
						</div>
						<div class="form-field form-field-class">
							<?php
								wp_dropdown_categories( array(
									'show_option_all' => 'Class Types',
									'orderby'         => 'NAME',
									'hide_empty'      => false,
									'id'              => 'post_search_class',
									'name'            => 'post_search_class',
									'selected'        => $_GET['post_search_class'],
									'taxonomy'        => 'post_class'
								) );
							?>
						</div>
						<div class="form-field form-field-airline">
							<?php
								wp_dropdown_categories( array(
									'show_option_all' => 'Airline',
									'orderby'         => 'NAME',
									'hide_empty'      => false,
									'id'              => 'post_search_airline',
									'name'            => 'post_search_airline',
									'selected'        => $_GET['post_search_airline'],
									'taxonomy'        => 'post_airline'
								) );
							?>
						</div>
						<div class="form-field form-field-submit">
							<input value="SEARCH" type="submit">
						</div>
					</form>
				</div>
		<div class="posts-main-content">
			<div class="deals-results">
				<?php if ( have_posts() ) : ?>
					<div class="post-items">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="post-item">
								<div class="post-thumbnail">
									<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'medium_large' ); ?>
									<?php endif; ?>
									</a>
								</div>
								<div class="post-content">
									<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php echo get_the_title(); ?></h2></a>
									<div class="post-meta">
										<div class="post-date">
											<?php echo get_the_date("j M Y");?>
										</div>
										<?php the_tags('<ul class="post-tags"><li class="tag">','</li><li>','</li></ul>'); ?>
									</div>
									<div class="post-desc">
										<?php echo wp_trim_words( get_the_excerpt(), 40, ' ...' ); ?>
									</div>
									<div class="post-view-more">
										<a class="btn-view-more" href="<?php the_permalink(); ?>">View more</a>
									</div>
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
					<div class="not-found">Post not found!.</div>
				<?php endif; ?>
			</div>
			</div>		
		</section>
	</div>
</div>
<?php get_footer(); ?>
