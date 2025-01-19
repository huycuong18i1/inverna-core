<?php 
global $post;
        $id = $post->ID;
        $termsArray = get_the_terms( $id, 'case_study_category' );
        $termsString = "";

        if ( $termsArray ) {
            foreach ( $termsArray as $term ) {
                $itemname = strtolower( $term->slug ); 
                $itemname = str_replace( ' ', '-', $itemname );
                $termsString .= $itemname.' ';
            }
        }
?>
<div class="item">				

    <div class="case-study-post">

    <div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<?php 

$get_id_post_thumbnail = get_post_thumbnail_id();

echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

?>

</a>

</div>

        <div class="content"> 

            <div class="category-case-study"><?php echo esc_attr ( the_terms( get_the_ID(), 'case_study_category', '', ', ', '' ) ); ?></div>
                <h5 class="title border_eff">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h5>
            <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'],10, '' ); ?></p>

            <?php if ( $settings['show_button'] == 'yes' ): ?>

                <div class="tf-button-container">

                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <span><?php echo esc_attr( $settings['button_text'] ); ?></span>  <?php echo \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>