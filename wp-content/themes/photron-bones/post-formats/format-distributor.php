
              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">
                  <?php //echo get_template_part('content','map'); ?>

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
                    <?php } ?>

                    <?php
                    $custom_states = get_the_terms($post->ID, 'distributor_state');
                    if ( $custom_states && !is_wp_error($custom_states)) {
                        
                      foreach ($custom_states as $custom_state) {
                       
                        $state_list .= '<span class="item">' . $custom_state->name . '</span>';
                      }
                      if ( $state_list !== '' ) {
                        echo '<span class="distrib-info"><h6>Serves:</h6><span class="serveslist">' . $state_list . '</span></span>';
                      }

                    }
                   
                    
                    
                    ?>
                    
                    <h3>Contact</h3>
                    <?php 
                    echo do_shortcode('[gravityform id="5" title="false" description="false" tabindex="32"]');
                    // the content (pretty self explanatory huh)
                    the_content();
                  ?>
                </section> <?php // end article section ?>

               <!--  <footer class="article-footer">

                  <?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                  <p class="byline vcard">
                    <?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                  </p>

                </footer> <?php // end article footer ?> -->

                <?php // comments_template(); ?>

              </article> <?php // end article ?>