<?php
/*
Template Name: Featured Content
*/
 get_header(); ?>

<div id="content">
	
		<div id="inner-content" class="full-width wrap cf">
			<?php
			 	// display either "slides" (images + links) from custom fields, or the featured image
			    //	get_template_part('loop', 'slides'); 
			?>

			<div id="main" class="main-content cf" role="main">
				

				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				} ?>

				<header class="article-header">

						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

					</header> <?php // end article header ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<section class="entry-content cf" itemprop="articleBody">

						<?php
						// check if the flexible content field has rows of data
						if( have_rows('featured_content_blocks') ) {
							echo '<div class="featured-blocks cf">';
						     // loop through the rows of data
						    while ( have_rows('featured_content_blocks') ) : the_row();
						    $link = get_sub_field('call_to_action_link');
						    $image = get_sub_field('image');
							$image_info =  wp_get_attachment_image_src( $image, 'footer-thumb' );
						    	echo '<div class="featured-block">';
						        	if (get_sub_field('sub_title')) {
						        		echo '<h5 class="sub-title"><a href="' . $link . '">' . get_sub_field('sub_title') . '</a></h5>';
						        	}
						        	if (get_sub_field('title')) {
						        		echo '<h3 class="main-title"><a href="' . $link . '">' . get_sub_field('title') . '</a></h3>';
						        	}
						        	
						        	if (get_sub_field('image')) {	
						        		echo '<a href="' . $link . '"><img class="featured-img" src="' . $image_info[0] . '" /></a>';
						        	}

					        		if (get_sub_field('text')) {
						        		echo get_sub_field('text');
						        	}
						        		
						        	echo '<a class="button" href="' . $link . '">' . get_sub_field('button_text') . '</a>';

						        echo '</div>';
					        

						    endwhile;
						    echo '</div>';
						}
						?>
						<?php
							the_content();
						?>
					</section> <?php // end article section ?>

				</article>

				

				<?php endwhile; else : ?>

						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
									<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>

				<?php endif; ?>

			</div>
		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>
