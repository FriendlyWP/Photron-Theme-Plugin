<?php
/*
Template Name: Home Page
*/
 get_header(); ?>

			<div id="content">
				<?php // PARAMETERS LIST: https://developers.google.com/youtube/player_parameters#loop
				?>


				<?php 
				if (function_exists('get_field')) {
					

					if ( (get_field('video_type') == 'Playlist') && get_field('playlist_url')) {
						$playlistID = mkm_parse_url(get_field('playlist_url',false,false), 'list');
						$vidID = mkm_parse_url(get_field('playlist_url',false,false), 'v');
						//echo 'url=' . ;
						//echo 'vidid=' . $vidID;
						echo '<div class="video-container fullback"><iframe src="http://www.youtube.com/embed/' . $vidID . '?autoplay=1&enablejsapi=1&rel=0&showinfo=0&controls=0&loop=0&listType=playlist&list=' . $playlistID . '&wmode=transparent" frameborder="0" allowfullscreen></iframe>​</div>';
					} elseif ( (get_field('video_type') == 'Single Video') && get_field('video_url')) {
						$vidID = mkm_parse_url(get_field('video_url',false,false), 'v');
						echo '<div class="video-container fullback"><iframe src="http://www.youtube.com/embed/' . $vidID . '?autoplay=1&enablejsapi=1&rel=0&showinfo=0&controls=0&loop=0&playlist=' . $vidID . '&wmode=transparent" frameborder="0" allowfullscreen></iframe>​</div>';
					}

				}
				?>

					<div id="inner-content" class="wrap cf">

						<div id="main" class="main-content cf" role="main">

							<?php if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
							} ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">
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

					</div><!-- #inner-content -->
					
				
			
			</div><!-- #content -->

			<?php if (function_exists('get_field')) {

						if( have_rows('blocks') ) {
							echo '<div class="home-footer">';
							echo '<div class="home-blocks wrap cf">';

						    while ( have_rows('blocks') ) : the_row();

							
							if (get_sub_field('block')) {
									echo '<div>';
									echo '<h4>' . get_sub_field('block_title') . '</h4>';
										echo '<span>';
										echo get_sub_field('block');
										echo '</span>';
									echo '</div>';
								}

							

						endwhile;
							echo '</div></div>'; 
						}

					}
				?>

<?php get_footer(); ?>
