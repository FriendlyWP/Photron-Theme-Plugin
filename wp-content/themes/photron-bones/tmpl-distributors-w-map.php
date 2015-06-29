<?php
/*
Template Name: Distributors Page w/Map
*/
get_header(); 

// Custom css file to handle google maps display
	//wp_enqueue_style( 'gmaps', get_stylesheet_directory_uri() . '/library/css/google_maps.css' );

	

	// Google Maps API is dependency for gmaps script called above
	// Gmaps must be called AFTER the API, so we run the API as the dependency enqueued after gmaps

	// format to call Google Maps API
	// But with our correct API Key (for OrgSpring Use Only)
//	wp_enqueue_script( 'gmapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDkTLVaP1U3JBrrHGRoaL-oUbsHe4VANa4', array(), '1.0.0', false );

	// Custom script to handle rendering map, placement of markers, and html info windows
	//wp_enqueue_script( 'gmaps', get_stylesheet_directory_uri() . '/library/js/acfmap.js', array( 'gmapsapi' ), '1.0.0', false );
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
  (function($) {
/*
  *  render_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $el (jQuery element)
  *  @return  n/a
  */

  var $window = $(window);
   
  function render_map( $el ) {

    // var
    var $markers = $el.find('.marker');

    if ($window.width() > 1001) {
      var mmzoom = 2;
    }

    if ($window.width() < 1000 ) {
      var mmzoom = 1;
    }
    // vars
    var args = {
      zoom    : mmzoom,
      center    : new google.maps.LatLng(20, 10),
      zoomControl: true,
      mapTypeId : google.maps.MapTypeId.ROADMAP
    };

    // create map           
    var map = new google.maps.Map( $el[0], args);

    // add a markers reference
    map.markers = [];



    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });

    // center map
    //center_map( map );

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $marker (jQuery element)
  *  @param map (Google Map object)
  *  @return  n/a
  */


  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position  : latlng,
      map     : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content   : $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }



 

  /*
  *  document ready
  *
  *  This function will render each map when the document is ready (page has loaded)
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 5.0.0
  *
  *  @param n/a
  *  @return  n/a
  */

  $(document).ready(function(){
    // Execute on load
    //checkWidth();
    // Bind event listener
   // $(window).resize(checkWidth)

    $('.acf-map').each(function(){

      render_map( $(this) );

    });


  });

  })(jQuery);
</script>
             
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

							$args = array(
								        'post_type' => 'distributor',
								        'post_status' => 'publish',
								        'posts_per_page' => -1,
								     );

							$maploop = new WP_Query($args);

							echo '<div class="acf-map">';


							if($maploop->have_posts()) {
								  while($maploop->have_posts()) {
									$maploop->the_post();


								//	Get location coordinates from google maps field in ACF
								$maplocation = get_field( 'map_address' );
								if(function_exists('get_field') && get_field('email')) { $email = get_field('email'); }
								?>

								<div class="marker" style="display:none;" data-lat="<?php echo $maplocation['lat']; ?>" data-lng="<?php echo $maplocation[ 'lng' ]; ?>" data-icon="<?php echo get_stylesheet_directory_uri() . '/library/images/favicon-32x32.png'; ?>">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						 			<?php if (function_exists('get_field') && get_field('phone') ) { ?><div class="addl-data"><span>Phone: </span><?php the_field('phone'); ?></div><?php } ?>
						 			<?php if ( $email ) { ?><div class="addl-data"><span><a href="mailto:<?php echo antispambot($email); ?>" target="_blank">Email</a></span></div><?php } ?>
						 			<?php if (function_exists('get_field') && get_field('url') ) { ?><div class="addl-data"><span><a href="<?php the_field('url'); ?>" target="_blank">Website</a></span></div><?php } ?>
									<!-- <div class="location-image"><img src="<?php echo get_stylesheet_directory_uri() . '/library/images/favicon-32x32.png'; ?>" /></div> -->
						 
									<!-- <p><?php //echo $maplocation['address']; ?></p> -->
								</div>
							<?php } //endwhile maploop

								echo '</div><!-- .google-acfmap -->';
								 wp_reset_query();
							} // maploop
							
							// DROPDOWN AND LIST BEGINS
								echo '<div class="cf distributors-content">';
									echo '<div class="page-content">' . $maincontent . '</div>';
									echo '<div class="page-dropdown">';
										echo get_terms_dropdown('distributor_country', array('hide_empty=0'));
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