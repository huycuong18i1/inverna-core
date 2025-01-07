<?php

get_header(); 

?>

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="wrap-content-area">

                <div id="primary" class="content-area">

                    <main id="main" class="main-content" role="main">

                        <div class="entry-content">

                            <?php while ( have_posts() ) : the_post(); 

								global $post;

								// information

								$facebook = get_post_meta($post->ID, 'facebook_team_value', true);

								$twitter = get_post_meta($post->ID, 'twitter_team_value', true);

								$linkedin = get_post_meta($post->ID, 'linkedin_team_value', true);

								$youtube = get_post_meta($post->ID, 'youtube_team_value', true);

								$custom1 = get_post_meta($post->ID, 'custom1_team_value', true);

								$custom2 = get_post_meta($post->ID, 'custom2_team_value', true);

								$facebook_icon = get_post_meta($post->ID, 'facebook_icon_value', true);

								$twitter_icon = get_post_meta($post->ID, 'twitter_icon_value', true);

								$linkedin_icon = get_post_meta($post->ID, 'linkedin_icon_value', true);

								$youtube_icon = get_post_meta($post->ID, 'youtube_icon_value', true);

								$custom1_icon = get_post_meta($post->ID, 'custom1_icon_value', true);

								$custom2_icon = get_post_meta($post->ID, 'custom2_icon_value', true);

								$data_description = get_post_meta($post->ID, 'description_team_value', true);

								$data_age = get_post_meta($post->ID, 'age_team_value', true);

								$data_email = get_post_meta($post->ID, 'email_team_value', true);

								$data_phone = get_post_meta($post->ID, 'phone_team_value', true);

								$data_location = get_post_meta($post->ID, 'location_team_value', true);

								$data_education = get_post_meta($post->ID, 'education_team_value', true);

								$data_experience = get_post_meta($post->ID, 'experience_team_value', true);

								$data_awards = get_post_meta($post->ID, 'awards_team_value', true);

								$data_yoex = get_post_meta($post->ID, 'yoex_team_value', true);

							?>



                            <div class="single-information-author">

                            <div class="content-left">
                                <div class="author">
                                    <div class="featured-post"><?php the_post_thumbnail('themesflat-team-single'); ?></div>
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <div class="category-team">
                                        <?php echo esc_attr ( the_terms( get_the_ID(), 'team_category', '', ', ', '' ) ); ?>
                                    </div>
                                </div>

                                <?php if(!empty($data_email) || !empty($data_phone) || !empty($data_location)): ?>
                                <div class="team-contact">
                                    <h5 class="title-label">
                                        <?php esc_html_e('Contact Me', 'themesflat-core') ?>
                                </h5>

                                    <?php if(!empty($data_email)): ?>

<div class="inner">

    <span><?php esc_html_e( 'Email Address', 'themesflat' ) ?></span>

    <h6><?php echo esc_html($data_email) ?></h6>

</div>

<?php endif; ?>

                                    <?php if(!empty($data_phone)): ?>

                                    <div class="inner">

                                        <span><?php esc_html_e( 'Need a Call', 'themesflat' ) ?></span>

                                        <h6><?php echo esc_html($data_phone) ?></h6>

                                    </div>

                                    <?php endif; ?>

                                    <?php if(!empty($data_location)): ?>



                                        <div class="inner">

                                            <span><?php esc_html_e( 'Location', 'themesflat' ) ?></span>

                                            <h6><?php echo esc_html($data_location) ?></h6>

                                        </div>

                                    <?php endif; ?>

                                </div>
                                <?php endif; ?>

                                <div class="team-social">

                                    <h5 class="title-label">
                                        <?php esc_html_e('Follow Us', 'themesflat-core') ?>
                                    </h5>

                                    <?php if ( !empty($facebook_icon) || !empty($twitter_icon) || !empty($linkedin_icon) || !empty($youtube_icon) || !empty($custom1_icon) || !empty($custom2_icon )): ?>

                                        <ul class="list-social">

                                            <?php if ( !empty($facebook) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($facebook); ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($facebook_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if ( !empty($twitter) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($twitter) ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($twitter_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if ( !empty($linkedin) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($linkedin) ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($linkedin_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if ( !empty($youtube) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($youtube) ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($youtube_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if ( !empty($custom1) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($custom1) ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($custom1_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if ( !empty($custom2) ): ?>
                                            
                                            <li>
                                            
                                                <a href="<?php echo esc_url($custom2) ?>"><i
                                            
                                                        class="icon-finwice-<?php echo esc_attr($custom2_icon); ?>"></i></a>
                                            
                                            </li>
                                            
                                            <?php endif; ?>
                                            
                                        </ul>
                                            
                                        <?php endif; ?>
                                </div>

                            </div>

                              <div class="content-right">
                                <?php the_content(); ?>
                              </div>                      
                                                

                            </div>


                            <?php endwhile; // end of the loop. ?>

                            <?php wp_reset_postdata(); ?>



                        </div><!-- ./entry-content -->

                    </main><!-- #main -->

                </div><!-- #primary -->

            </div>

        </div>

    </div>

</div>



<?php get_footer(); ?>