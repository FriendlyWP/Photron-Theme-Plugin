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
					} 

					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">

							<h1 class="page-title" itemprop="headline">Photron Distributors for <?php echo $term->name ?></h1>

						</header> <?php // end article header ?>

						<section class="entry-content cf" itemprop="articleBody">
							<?php 
							
							$maincontent = get_the_content();

							$args = array(
								        'post_type' => 'distributor',
								        'post_status' => 'publish',
								        'posts_per_page' => -1,
								        'tax_query' => array(
								        	array(
								        		'taxonomy' => 'distributor_country',
								        		'field' => 'slug',
								        		'terms' => $term->slug,
								        	)
								        ),
								     );

							$maploop = new WP_Query($args);


							if($maploop->have_posts()) {
								
								 echo '<div class="page-content">' . $maincontent . '</div>';
								 echo '<div class="cf distributors-list">';
			                      // SHOW US STATE DROPDOWN IF US 
			                        if ( $term->slug == 'united-states') {
			                          echo '<div class="state-dropdown">';
			                            echo get_terms_dropdown('distributor_state', array('hide_empty=0'), 'Choose your state');
			                          echo '</div>';
			                        }

								  while($maploop->have_posts()) {
									$maploop->the_post();
                    				
				                    if ( $term->slug == 'united-states') {
				                    	echo '<div style="display:none;" class="js-box distrib-deet ';
				                      	$custom_states = get_the_terms($maploop->ID, 'distributor_state');
				                      	if ( $custom_states && !is_wp_error($custom_states)) {
				                            
				                            foreach ($custom_states as $custom_state) {
				                              echo $custom_state->slug . ' ';
				                              $state_list .= '<span class="item">' . $custom_state->name . '</span>';
				                            }
				                           
				                          }
				                         echo '">';
				                    } else {
				                      echo '<div class="distrib-deet">';
				                    }
									
									$maplocation = get_field( 'map_address' );
								        
								    echo '<h3><a href="'.get_permalink().'" title="Contact ' . the_title_attribute( 'echo=0' ) . '">'.get_the_title().' <i class="orange fa fa-envelope-square"></i></a></h3>'; ?>

								    <?php if (function_exists('get_field') && get_field('phone')) { ?>
				                      <span class="distrib-info"><h6>Phone:</h6><?php the_field('phone'); ?><?php if (get_field('phone_2')) { echo ', ' . get_field('phone_2'); } ?></span>
				                    <?php } ?>
				                    <?php if (function_exists('get_field') && get_field('fax')) { ?>
				                      <span class="distrib-info"><h6>Fax:</h6><?php the_field('fax'); ?></span>
				                    <?php } ?>
				                    <?php if (function_exists('get_field') && get_field('url')) { ?>
				                      <span class="distrib-info"><h6>Website:</h6><a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a></span>
				                    <?php } ?>
				                    <?php if (function_exists('get_field') && get_field('email')) { ?>
				                      <?php $email = get_field('email'); ?>
				                      <span class="distrib-info"><h6>Email:</h6><a href="mailto:<?php echo antispambot($email); ?>" target="_blank"><?php echo antispambot($email); ?></a></span>
				                    <?php } 
				                    $distrib_id = get_the_ID();
				                    if (($term->slug == 'united-states') && ($distrib_id !== 245)) {
				                    	echo '<span class="distrib-info"><h6>Serves:</h6><span class="serveslist">' . $state_list . '</span></span>';
				                    }
				                    echo '</div>'; // distrib-deet
				                    $state_list = '';
				                     } // while maploop have_posts
								
								echo '</div>'; // distributors-list

							} // endif main maploop

							?>
						</section> <?php // end article section ?>

					</article>

					

					

				</div>

				<?php  get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>