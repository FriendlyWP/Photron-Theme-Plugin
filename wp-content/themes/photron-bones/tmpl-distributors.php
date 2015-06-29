<?php
/*
Template Name: Distributors Page
*/
get_header(); 

?>
	<div id="content">

		<div id="inner-content" class="wrap cf">
				
				<div id="main" class="main-content cf" role="main">
					<?php if (function_exists('get_field') && get_field('banner_image')) {
						//echo '<img class="banner-image" src="' . get_field('banner_image') . '" />';
					} ?>
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>

					<?php if (have_posts()) { 
						while (have_posts()) {
						the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">

							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

						</header> <?php // end article header ?>

						<section class="entry-content cf" itemprop="articleBody">
							<?php 
							
							$maincontent = get_the_content();

							
							// DROPDOWN AND LIST BEGINS
								echo '<div class="cf distributors-content">';
									echo '<div class="page-content">' . $maincontent . '</div>';
									echo '<div class="page-dropdown">';
										echo get_terms_dropdown_link('distributor_country', array('hide_empty=0'));
									echo '</div>';
								echo '</div>';
								
							?>
						</section> <?php // end article section ?>

					</article>

					

					<?php } //endwhile main loop
					} // endif main loop ?>

				</div>

				<?php  get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>