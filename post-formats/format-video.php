

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();


                  ?>
                  <?php 

                  if (function_exists('get_field')) {
                    $link = get_field('video_url', false, false);
                  } else {
                    $link = get_permalink();
                  }
                  if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { 
                    echo '<a href="' . $link . '" rel="lightbox-video-' . $count .'"><img src="' . $video_thumbnail . '" /></a>'; 
                  } 

                  if (function_exists('get_field') && get_field('video_description')) {
                    echo do_shortcode( get_field('video_description') );
                  }

                  if (function_exists('custom_taxonomies_terms_links')) {
                    echo custom_taxonomies_terms_links();
                  }

                  if (function_exists('get_field') && get_field('related_cameras'))  {
                        echo '<h6 class="taghead padtop">Camera Used</h6>';
                        $cameras = get_field('related_cameras');
                        foreach($cameras as $camera) {
                          echo '<a class="button blue" href="' . get_permalink($camera->ID) . '">' . get_the_title($camera->ID) . '</a>';
                        }

                      }  

                    ?>
                </section> <?php // end article section ?>

                <footer class="article-footer">
                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                </footer> <?php // end article footer ?>


              </article> <?php // end article ?>