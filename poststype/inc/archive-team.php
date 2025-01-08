<?php

/**

 * The template for displaying archive team.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package inverna

 */



get_header(); ?>

<?php 

$team_number_post = themesflat_get_opt( 'team_number_post' ) ? themesflat_get_opt( 'team_number_post' ) : 9;

$columns = themesflat_get_opt('team_grid_columns');

$orderby = themesflat_get_opt('team_order_by');

$order = themesflat_get_opt('team_order_direction');

$exclude = themesflat_get_opt('team_exclude');

$terms_slug = wp_list_pluck( get_terms( 'team_category','hide_empty=0'), 'slug' );



$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;



$args = array(

    'post_type' => 'team',

    'orderby'   => $orderby,

    'order' => $order,

    'paged' => $paged,

    'posts_per_page' => $team_number_post,

    'tax_query' => array(

        array(

            'taxonomy' => 'team_category',   

            'field'    => 'slug',                   

        	'terms'    => $terms_slug,

        ),

    ),

);	



if ( ! empty( $exclude ) ) {				

	if ( ! is_array( $exclude ) )

		$exclude = explode( ',', $exclude );



	$args['post__not_in'] = $exclude;

}



$query = new WP_Query( $args );

?>

<div class="themesflat-team-taxonomy pj-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main">

                            <div class="container-archive">

                                <?php 

                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post(); 

                                    global $post;

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

                                    ?>           

                                        <div class="item">

                                            <div class="team-post team-post-<?php the_ID(); ?>">

                                                <div class="features-post">

                                                    <a href="<?php echo get_the_permalink(); ?>">

                                                    <?php 

                                                        if ( has_post_thumbnail() ) { 

                                                            $themesflat_thumbnail = "themesflat-project-grid";                              

                                                            the_post_thumbnail( $themesflat_thumbnail );

                                                        }                                           

                                                    ?>

                                                    </a>

                                                    <?php if ( !empty($facebook_icon) || !empty($twitter_icon) || !empty($linkedin_icon) || !empty($youtube_icon) || !empty($custom1_icon) || !empty($custom2_icon )): ?>

                        <ul class="list-social">

                            <?php if ( !empty($facebook) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($facebook); ?>"><i class="icon-inverna-<?php echo esc_attr($facebook_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($twitter) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($twitter) ?>"><i class="icon-inverna-<?php echo esc_attr($twitter_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($linkedin) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($linkedin) ?>"><i class="icon-inverna-<?php echo esc_attr($linkedin_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($youtube) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($youtube) ?>"><i class="icon-inverna-<?php echo esc_attr($youtube_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($custom1) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($custom1) ?>"><i class="icon-inverna-<?php echo esc_attr($custom1_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($custom2) ): ?>

                                <li>

                                    <a href="<?php echo esc_url($custom2) ?>"><i class="icon-inverna-<?php echo esc_attr($custom2_icon); ?>"></i></a>

                                </li>

                            <?php endif; ?>

                        </ul>

                        <?php endif; ?>
                        <span class="plus"> <i class="icon-inverna-plus"></i> </span>

                                                </div>

                                                <div class="content"> 

                                                    <h5 class="title border_eff">

                                                        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>

                                                    </h5>

                                                    <div class="category-team"><?php echo esc_attr ( the_terms( get_the_ID(), 'team_category', '', ', ', '' ) ); ?></div>

                                                </div>

                                            </div>

                                        </div>                    

                                        <?php 

                                    endwhile; 

                                } else {

                                    get_template_part( 'template-parts/content', 'none' );

                                }

                                ?>            

                            </div>

                            <div class="text-center">

                                <?php 

                                themesflat_pagination_posttype($query, 'pages');

                                wp_reset_postdata();

                                ?> 



                            </div>

                        </main><!-- #main -->

                    </div><!-- #primary -->

                </div>

            </div>

        </div>

    </div>

</div><!-- /.themesflat-team-taxonomy -->

<?php get_footer(); ?>