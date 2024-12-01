<div class="related-post">
        <?php wp_reset_postdata();
          $relateds = new WP_Query(
                  array(
                      'category__in'   => wp_get_post_categories( $post->ID ),
                      'posts_per_page' => 6,
                      'post__not_in'   => array( $post->ID )
                  )
              );

              if( $relateds->have_posts() ) { 
                  while( $relateds->have_posts() ) { 
                      $relateds->the_post(); ?>
                      <div class="item">
                        <div class="listing-detail">
                          <figure> 
                          <a href="<?php the_permalink(); ?>">
                                  <?php
                                  $attachid = get_post_thumbnail_id(get_the_ID());
                                  $altim = get_post_meta( trim($attachid), '_wp_attachment_image_alt', true);
                                  $image_Testi = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                  ?>
                                  <img src="<?php echo $image_Testi[0]; ?>" alt="<?php echo $altim;?>">    
                                  </a>
                          </figure>
                                <div class="blog-listing-content">
                                  <a href="<?php the_permalink(); ?>"><?php the_title();  ?></a><p></p><p><?php echo wp_trim_words( get_the_title(), 50 ); ?><a href="<?php the_permalink(); ?>"> Read More</a>
                                  </p><div class="detail-bottom"><p> 
                                  <span><i class="fas fa-user"></i>
                                  <?php the_author(); ?>
                                  </span>
                                      <span><i class="fas fa-calendar-alt"></i> <?php the_date( 'Y-m-d' ); ?></span> 
                                    </div>
                                  </div>
                            </div>
                        </div>
             <?php } wp_reset_postdata(); }  ?>
            </div>