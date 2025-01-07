<?php

/**

 * The template for displaying archive project.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package finwice

 */



get_header(); ?>

<?php 

$project_number_post = themesflat_get_opt( 'project_number_post' ) ? themesflat_get_opt( 'project_number_post' ) : 6;

$columns = themesflat_get_opt('project_grid_columns');

$themesflat_paging_style = themesflat_get_opt('project_archive_pagination_style');

$orderby = themesflat_get_opt('project_order_by');

$order = themesflat_get_opt('project_order_direction');

$exclude = themesflat_get_opt('project_exclude');

$show_filter = themesflat_get_opt('project_show_filter');

$filter_category_order = themesflat_get_opt('project_filter_category_order');	

$terms_slug = wp_list_pluck( get_terms( 'project_category','hide_empty=0'), 'slug' );

$filters =      wp_list_pluck( get_terms( 'project_category','hide_empty=0'), 'name','slug' );

$show_filter_class = '';



$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



$query_args = array(

    'post_type' => 'project',

    'orderby'   => $orderby,

    'order' => $order,    

    'paged' => $paged,    

    'posts_per_page' => $project_number_post,  

    'tax_query' => array(

        array(

            'taxonomy' => 'project_category',   

            'field'    => 'slug',                   

        	'terms'    => $terms_slug,

        ),

    ),

);	



if ( ! empty( $exclude ) ) {				

	if ( ! is_array( $exclude ) )

		$exclude = explode( ',', $exclude );



	$query_args['post__not_in'] = $exclude;

}

$query = new WP_Query( $query_args );
$icon = \Elementor\Addon_Elementor_Icon_manager_finwice::render_icon( themesflat_get_opt_elementor('project_post_icon') );
?>



<div class="themesflat-project-taxonomy sv-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main"> 

                        <div class="tf-project-wrap style5">


                            <div class="wrap-project-post row column-3 ">

                                <?php 

                                

                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post();                	

                                    	?>           

                                        <div class="item">

                                            <div class="project-post project-post-<?php the_ID(); ?>">

                                            <div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<?php 

    if ( has_post_thumbnail() ) { 

        $themesflat_thumbnail = "themesflat-service-grid";                              

        the_post_thumbnail( $themesflat_thumbnail );

    }                                           

?>

</a>

</div>

                                            <div class="content"> 

                                            <?php if(!empty($icon)): ?>
                <div class="icon">
                    <?php echo $icon; ?>
                </div>
            <?php endif; ?>

            <h5 class="title border_eff">

                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>

            </h5>

                                                    <p class="description"><?php echo wp_trim_words( get_the_content(), 15, '' ); ?></p>
                                                    <div class="tf-button-container">

<a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">

    <span><?php esc_html_e('Read More', 'themesflat') ?></span>

    <i aria-hidden="true" class="icon-finwice-chevron-right"></i>

</a>

</div>
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


                            <?php 

                                themesflat_pagination_posttype($query);

                                wp_reset_postdata();

                            ?>  
                        </div>

                        </main><!-- #main -->

                    </div><!-- #primary -->

                </div>

            </div>

        </div>

    </div>

</div><!-- /.themesflat-project-taxonomy -->



<?php get_footer(); ?>