<div class="item">				

    <div class="project-post scale-hover">

    <div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<?php 

$get_id_post_thumbnail = get_post_thumbnail_id();

echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

?>

</a>

</div>

        <div class="content"> 

                <h5 class="title border_eff">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h5>
                <div class="category-project"><?php echo esc_attr ( the_terms( get_the_ID(), 'project_category', '', ', ', '' ) ); ?></div>

        </div>

    </div>

</div>