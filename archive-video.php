<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="main-content cf" role="main">
							<?php if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
							} ?>

							<?php if (is_category()) { ?>
								<h1 class="page-title">
									<?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="page-title">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif ( is_tax() ) { ?>
							    	<?php 
							    	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
							    	$title = $term->name; ?>
							    		<h1 class="page-title">
							    	    		<?php echo $title; ?>
							        	</h1>
							    <?php } elseif ( is_post_type_archive() ) { ?>
							    	<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
							    <?php } ?>
							    
							<?php if (is_category() && category_description()) { ?>
			                   	<div class="cat-desc"><?php echo category_description(); ?></div>
			                <?php } ?>

			                <?php if (is_tax() && ($term->description !== '')) { ?>
			                   	<div class="cat-desc"><?php echo $term->description; ?></div>
		                    <?php } ?>

							<?php if (have_posts()) {
								$count = '0';
								while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									
									
								</header>

								<section class="entry-content cf">

									<?php 

									if (function_exists('get_field')) {
										$link = get_field('video_url', false, false);
									} else {
										$link = get_permalink();
									}
									if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { 
										echo '<a href="' . $link . '" rel="lightbox-video-' . $count .'"><img src="' . $video_thumbnail . '" /></a>'; 
									} ?>
									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer">
									<?php echo 'Categories: <ul>' .  get_the_term_list( get_the_ID(), 'video_categories', '<li>', '</li><li>', '</li>' ) . '</ul>'; ?>
									<?php echo 'Tags: <ul>' .  get_the_term_list( get_the_ID(), 'video_tags', '<li>', '</li><li>', '</li>' ) . '</ul>'; ?>
								</footer>

							</article>

							<?php 
							$count++;
							endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php } else { ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php } ?>

						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
