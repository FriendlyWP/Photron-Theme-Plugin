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
								echo '<div class="cf distributors-list">';

								$custom_terms = get_terms('distributor_country');

								$count = 0;
								foreach($custom_terms as $custom_term) {
								    wp_reset_query();
								    $args = array(
								        'post_type' => 'distributor',
								        'tax_query' => array(
								            array(
								                'taxonomy' => 'distributor_country',
								                'field' => 'slug',
								                'terms' => $custom_term->slug,
								            ),
								        ),
								     );

								     $loop = new WP_Query($args);

								     if($loop->have_posts()) {
								     	echo '<div id="' . $custom_term->slug . '" class="js-box ' . $custom_term->slug . '" style="display:none;">';
								        $term_link = get_term_link($custom_term->slug, 'distributor_country');
                        echo '<h2><a href="' . $term_link . '">' . $custom_term->name . ' Distributors</a></h2>';

                        // SHOW US STATE DROPDOWN IF US 
                        /*if ( $custom_term->slug == 'united-states') {
                          echo '<div class="state-dropdown">';
                            echo get_terms_dropdown('distributor_state', array('hide_empty=0'), 'Choose your state');
                          echo '</div>';
                        }*/
								        while($loop->have_posts()) : $loop->the_post();
								        	$maplocation = get_field( 'map_address' );
								          
                          //$custom_states = get_the_terms($loop->ID, 'distributor_state');
                          //var_dump ($custom_states);
                          //$stateslug = '';
                          /*if ( $custom_states && !is_wp_error($custom_states)) {
                            echo '<div style="display:none;" class="js-box distrib-deet ';
                            foreach ($custom_states as $custom_state) {
                              echo $custom_state->slug . ' ';
                            }
                            echo '">';
                          } else {*/
                            echo '<div class="distrib-deet ' . $stateslug . '">';
                        //  }
								            
                    echo '<h3><a href="'.get_permalink().'"><i class="fa fa-link"></i> '.get_the_title().'</a></h3>'; ?>

                    <?php if (function_exists('get_field') && get_field('phone')) { ?>
                      <span class="distrib-info"><h6>Phone:</h6><?php the_field('phone'); ?><?php if (get_field('phone_2')) { echo ', ' . get_field('phone_2'); } ?></span>
                    <?php } ?>
                    <?php if (function_exists('get_field') && get_field('fax')) { ?>
                      <span class="distrib-info"><h6>Fax:</h6><?php the_field('fax'); ?></span>
                    <?php } ?>
                    <?php if ($maplocation['address']) { ?>
                      <span class="distrib-info"><h6>Address:</h6><a href="<?php the_permalink(); ?>"><?php echo $maplocation['address']; ?> <i class="fa fa-map-marker"></i></a></span>
                    <?php } ?>
                    
                    <?php if (function_exists('get_field') && get_field('url')) { ?>
                      <span class="distrib-info"><h6>Website:</h6><a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a></span>
                    <?php } ?>
                    <?php if (function_exists('get_field') && get_field('email')) { ?>
                      <?php $email = get_field('email'); ?>
                      <span class="distrib-info"><h6>Email:</h6><a href="mailto:<?php echo antispambot($email); ?>" target="_blank"><?php echo antispambot($email); ?></a></span>
                    <?php } 
                    echo '</div>'; // distrib-deet
								       
								       
								        endwhile;
								        //echo '</ul>';
								         echo '</div>';
								     }
								}
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