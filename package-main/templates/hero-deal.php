<div class="deals-main">
	<section class="deals-hero-ss page-title-bar">
		<div class="container">
			<div class="hero-content">
				<h1 class="page-title">
					<?php
					if ( is_single() ) {
						$destinations = wp_get_post_terms( $post->ID, 'deal_destination' );
						$title        = !empty( $destinations ) ? $destinations[0]->name : get_the_title();
					} elseif ( is_tax() ) {
						$tax   = get_queried_object();
						$title = $tax->name;
					} else {
						$title = 'Airfare Deals';
					}
					echo $title;
					?>
				</h1>
				<div class="aioseo-breadcrumbs">
					<span class="aioseo-breadcrumb"><a href="/" title="Home">Home</a></span>
					<span class="aioseo-breadcrumb-separator">»</span><span class="aioseo-breadcrumb">Airfare Deals</span>
				</div>
			</div>
		</div>
	</section>
