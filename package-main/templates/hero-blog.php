<section class="posts-hero-ss page-title-bar">
	<div class="container">
		<div class="hero-content">
			<h1 class="page-title">
				<?php
					if ( is_tag() ) {
						$title = single_tag_title( '', false );
					} elseif ( is_tax() ) {
						$tax   = get_queried_object();
						$title = $tax->name;
					} else {
						$title = get_the_title( get_option( 'page_for_posts' ) );
					}
					echo $title;
				?>
			</h1>
			<?php echo do_shortcode('[aioseo_breadcrumbs]'); ?>
		</div>
	</div>
</section>
